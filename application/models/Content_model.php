<?php
    class Content_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }
        
        public function get_contents($slug = FALSE, $limit = FALSE, $offset = FALSE){
            
            if($limit){
                $this->db->limit($limit, $offset);
            }
            
            if($slug === FALSE){
                $this->db->order_by('contents.id', 'DESC');
                $this->db->join('categories', 'categories.id = contents.category_id');
                $query = $this->db->get('contents');
                return $query->result_array();
            }
            
            $query = $this->db->get_where('contents', array('slug' => $slug));
            return $query -> row_array();
        }
        
        public function create_content($content_image){
            $slug = url_title($this->input->post('title'));
            
            $data = array(
            'title' => $this->input->post('title'), 
            'slug' => $slug, 
            'body' => $this->input->post('body'),
            'category_id' => $this->input->post('category_id'),
            'admin_id' => $this->session->userdata('admin_id'),
            'content_image' => $content_image
            );
            
            return $this->db->insert('contents', $data);
        }
        
        public function delete_content($id){
			$image_file_name = $this->db->select('content_image')->get_where('contents', array('id' => $id))->row()->content_image;
			$cwd = getcwd(); // save the current working directory
			$image_file_path = $cwd."\\assets\\images\\contents\\";
			chdir($image_file_path);
			unlink($image_file_name);
			chdir($cwd); // Restore the previous working directory
			$this->db->where('id', $id);
			$this->db->delete('contents');
			return true;
		}

        
        public function update_content(){
            $slug = url_title($this->input->post('title'));
            
            $data = array(
            'title' => $this->input->post('title'), 'slug' => $slug, 
            'body' => $this->input->post('body'),
            'category_id' => $this->input->post('category_id')
            );
            
            $this->db->where('id', $this->input->post('id'));
            return $this->db->update('contents', $data);
        }
        
        public function get_categories(){
            $this->db->order_by('name');
            $query = $this->db->get('categories');
            return $query->result_array();
        }
        
        public function get_contents_by_category($category_id){
            $this->db->order_by('contents.id', 'DESC');
            $this->db->join('categories', 'categories.id = contents.category_id');
            $query = $this->db->get_where('contents', array('category_id' => $category_id));
            return $query->result_array();
            
        }
    }
