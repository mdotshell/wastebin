<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pastes extends CI_Controller {
	
	
    
	public function app($pasteID = '') {
		
		// Get languages and themes
		$data['themes'] = $this->pastes_model->get_themes();
		$data['languages'] = $this->pastes_model->get_languages();
		$data['unlocked'] = true;

	    // Check to see if the app was posted. If not, set my own aray. If so retrieve data from db model then load the view. If not, save post data, then reload the new url
         if (!($_SERVER['REQUEST_METHOD'] == "POST")) { 
	    	
	    	// If not posted to and no pasteID supplied set base defaults
	    	$data['unlocked'] = true;
	        if($pasteID == ''){
    	        $data['paste'] = array(
                    'LANGUAGE' => "markdown",   
                    'THEME' => "monokai", 
                    'CODE' => file_get_contents(APPPATH."../assets/formdat/welcome.md")
    	        );
	        }
	        
	        //If not posted to and pasteID is supplied, check if the paste has a password set on it
	        else{
	        	$data['paste'] = $this->pastes_model->get_paste($pasteID);
	        	
	        	// If password is set for the paste, and there's no unlock password set
	            if(!empty($data['paste']['PASSWORD'])){
	                $data['unlocked'] = false;
	            }
	        }

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
			    $this->form_validation->set_message('valid_base64', 'You must enter some code before submitting');
			    $this->form_validation->set_rules('language', 'Language', 'trim|required|alpha_dash|max_length[25]|encode_php_tags');
			    $this->form_validation->set_rules('theme','Theme','trim|required|alpha_dash|max_length[25]|encode_php_tags');
			    $this->form_validation->set_rules('code','Code','required|valid_base64');
			    $this->form_validation->set_rules('expire_time','Self Destruct','trim|alpha_numeric_spaces|max_length[20]|encode_php_tags');
			    $this->form_validation->set_rules('password','Password','min_length[5]|max_length[20]|encode_php_tags');
			    $this->form_validation->set_message('valid_base64', 'You must enter some code before submitting');

			    
	    		if ($this->form_validation->run() == TRUE){
		        	$pasteID = generateRandomString();
			        $this->pastes_model->save_paste($pasteID);
			        redirect('/'.$pasteID, 'refresh');
	    		}
	    		else{
	    			$data['paste'] = array(
	                    'LANGUAGE' => $this->input->post('language'),   
	                    'THEME' => $this->input->post('theme'), 
	                    'CODE' => $this->input->post('code')
    	        	);
	    			$data['hasErrors'] = true;
					$this->load->view('app',$data);
					$this->load->view('error',$data);
	    		}
	    	}
	    }
	}
	
	
}