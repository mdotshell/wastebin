<?php
    class Pastes_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }
        
        public function get_paste($pasteID = FALSE){
            if($pasteID === FALSE){
                $query = $this->db->get('PASTES');
                return $query->result_array();
            }
            
            $query = $this->db->get_where('PASTES', array('PASTE_ID' => $pasteID));
            return $query->row_array();
        }
        
        public function save_paste($pasteID){
            $this->load->helper('common_functions');
            
            if(!(empty($this->input->post('password')))){
                
                #Encrypt the password
                $salt = generateRandomString(10);
                $saltedPassword = $salt . $this->input->post('password');
                $password = password_hash($saltedPassword, PASSWORD_DEFAULT);
                
                #Encrypt the code
                if(!empty($this->input->post('code'))){
                    $code = $this->input->post('code');
                    $cipher_method = 'aes-256-ctr';
                    $enc_key = openssl_digest($this->input->post('password'), 'SHA256', TRUE);
                    $enc_iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher_method));
                    $code = openssl_encrypt($code, $cipher_method, $enc_key, 0, $enc_iv) . "::" . bin2hex($enc_iv);
                    //unset($code, $cipher_method, $enc_key, $enc_iv);
                }
            }
            else {
                $password = '';
                $salt = '';
                $code = htmlspecialchars($this->input->post('code'));
            }
            
            
            if(is_numeric($this->input->post('expireNumber'))){
                $expire_date = date("Y-m-d H:i", strtotime("+".$this->input->post('expireNumber').$this->input->post('expireUnit')));
            }
            else{
                $expire_date = "";
            }
            $data = array(
                'PASTE_ID' => $pasteID,
                'LANGUAGE' => $this->input->post('language'),   
                'THEME' => $this->input->post('theme'), 
                'PASSWORD' => $password, 
                'SALT' => $salt, 
                'CODE' => $code,
                'SUBMIT_TIME' =>  date("Y-m-d H:i"),
                'EXPIRE_TIME' => $expire_date
            );
           
            return $this->db->insert('PASTES',$data);
        }
        
        
        public function get_themes(){
            $query = $this->db->get('THEMES');
            return $query->result_array();
            // $query = $this->db->get_where('THEMES', array('LIGHT_DARK' => $$lightdark));
            // return $query->row_array();
        }
        
        public function get_languages(){
            $query = $this->db->get('LANGUAGES');
            return $query->result_array();
        }
        
    }
?>