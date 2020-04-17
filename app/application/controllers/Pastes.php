<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pastes extends CI_Controller {

	public function app($pasteID = '') {
		$this->load->library('session');
		
		// Set variables
		$data['themes'] = $this->pastes_model->get_themes();
		$data['languages'] = $this->pastes_model->get_languages();
		$data['unlocked'] = true;
		$data['notfound'] = false;
		$data['incorrect_admin_password'] = false;
		$data['paste'] = array(
            'LANGUAGE' => "markdown",   
            'THEME' => "monokai", 
            'CODE' => file_get_contents(APPPATH."../assets/formdat/welcome.md")
    	);
    	
		
	    // Check to see if the app was posted. If so retrieve data from db model then load the view. If not, save post data, then reload the new url
         if (!($_SERVER['REQUEST_METHOD'] == "POST")) { 
	    	
	        //If not posted to and pasteID is supplied, check if the paste has a password set on it
	        if(!empty($pasteID)){
	        	
	        	$data['paste'] = $this->pastes_model->get_paste($pasteID);
	        	
	        	// If there is no data returned for the pasteID
	        	if($data['paste'] == false){
	        		$data['notfound'] = true;
	        	}
	        	
	        	// If password is set for the paste, and there's no unlock password set
	            if(!empty($data['paste']['PASSWORD'])){
	                $data['unlocked'] = false;
	            }
	        }
	        
			// Load the app with data
			$this->load->view('app',$data);

	    }
	    
	    
	    // Was posted to. Check if it was a password input post or a make new post
	    else {
	    	
	    	// If is posted and unlockPassword has a value, validate password and lock/unlock the code and view page
	    	if(!empty($this->input->post('unlockPassword')) || $this->input->post('unlockPassword') !== null ){
	        	$data['unlocked'] = false;
        		$data['paste'] = $this->pastes_model->get_paste($pasteID);
        		
        		#Verify and decrypt code
	    		if(password_verify ($data['paste']['SALT'].$this->input->post('unlockPassword'),$data['paste']['PASSWORD'])){
	    			
	    			#Decrypt the code
	    			$code = $data['paste']['CODE'];
	    			list($code, $enc_iv) = explode("::", $code);;
					$cipher_method = 'aes-256-ctr';
					$enc_key = openssl_digest($this->input->post('unlockPassword'), 'SHA256', TRUE);
					$data['paste']['CODE'] = openssl_decrypt($code, $cipher_method, $enc_key, 0, hex2bin($enc_iv));

					#Unlock the paste
	    			$data['unlocked'] = true;
            	}

    			$this->load->view('app',$data);
	    	}
	    	
	    	// It was posted to, but unlockPassword was not set, validate and create new entry
	    	else {
	    		
	    		// If there is an admin password environment variable set, show the login page
		        if(getenv("ADMIN_PASSWORD") && $this->session->userdata('logged_in') != true){
		        	if(!empty($this->input->post("admin_password")) && $this->input->post('admin_password') == $_ENV['ADMIN_PASSWORD']){
		        		$this->session->set_userdata('logged_in',true);
		        		$_POST = $this->session->userdata('paste_values');
		        	}
		        	else{
			        	if(empty($this->input->post('admin_password'))){
			        		$this->session->set_userdata('paste_values',$_POST);
			        	}
			        	else if (!empty($this->input->post("admin_password")) && $this->input->post('admin_password') != $_ENV['ADMIN_PASSWORD']){
	        				$data['incorrect_admin_password'] = true;
			        	}
	        			die($this->load->view('login', $data, TRUE));
		        	}
		        }
	    			
				# Form validation rules
			    $this->form_validation->set_message('valid_base64', 'You must enter some code before submitting');
			    $this->form_validation->set_rules('language', 'Language', 'trim|required|alpha_dash|max_length[25]|encode_php_tags');
			    $this->form_validation->set_rules('theme','Theme','trim|required|alpha_dash|max_length[25]|encode_php_tags');
			    $this->form_validation->set_rules('code','Code','required|valid_base64');
			    $this->form_validation->set_rules('expireNumber','Expire Time','trim|numeric|max_length[4]|encode_php_tags');
			    $this->form_validation->set_rules('expireUnit','Expire Unit','in_list[minutes,hours,days,weeks,months]|max_length[7]|encode_php_tags');
			    $this->form_validation->set_rules('password','Password','min_length[5]|max_length[20]|encode_php_tags');
			    $this->form_validation->set_message('valid_base64', 'You must enter some code before submitting');

				# Generate a new pasteID and save the paste to DB
	    		if ($this->form_validation->run() == TRUE){
		        	$pasteID = generateRandomString();
			        $this->pastes_model->save_paste($pasteID);
			        redirect('/'.$pasteID, 'refresh');
	    		}
	    		else{
	    			$data['hasErrors'] = true;
					$this->load->view('app',$data);
					$this->load->view('error',$data);
	    		}
	    	}
	    }
	}
}