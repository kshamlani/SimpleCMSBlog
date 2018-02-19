<?php
    class Comment_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }
        
        public function create_comment($content_id){
            $data = array(
                'content_id' => $content_id,
                'name' => $this->input->post('name'),            
                'email' => $this->input->post('email'),            
                'body' => $this->input->post('body')            
            );
            
            return $this->db->insert('comments', $data);
        }
        
        public function get_comments($content_id){
            $query = $this->db->get_where('comments', array('content_id' => $content_id));
            return $query->result_array();
        }
    }
