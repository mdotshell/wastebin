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
                $salt = generateRandomString(10);
                $saltedPassword = $salt . $this->input->post('password');
                $password = password_hash($saltedPassword, PASSWORD_DEFAULT);
            }
            else {
                $password = '';
                $salt = '';
            }
            if($this->input->post('expire_time') == "Never"){
                $expire_date = "";
            }
            else{
                $expire_date = date("Y-m-d H:i", strtotime("+".$this->input->post('expire_time')));
            }
            $data = array(
                'PASTE_ID' => $pasteID,
                'LANGUAGE' => $this->input->post('language'),   
                'THEME' => $this->input->post('theme'), 
                'PASSWORD' => $password, 
                'SALT' => $salt, 
                'CODE' => htmlspecialchars($this->input->post('code')),
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