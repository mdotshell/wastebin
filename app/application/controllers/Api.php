<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	
	
    
	public function get($pasteID = '') {
	    if(!empty($pasteID)){
	        $paste = $this->pastes_model->get_paste($pasteID);
	        if(is_array($paste)){
	            unset($paste['id']);
	            unset($paste['PASSWORD']);
                unset($paste['SALT']);
    	        echo json_encode($paste);
	        }
	    }
	    else{
	        show_404();
	    }
	}
	
	public function new(){
	    if(!$_SERVER['REQUEST_METHOD'] == "POST"){
	        echo "This API is intended to be submitted to by post. Values submitted should be: 'code' -> in base64 format,";
	    }
	    echo "yooo";
	}


}
?>