<?php
    class Categories extends CI_Controller{
        
        public function index(){
            $data['title'] = 'Categories';
            $data['categories'] = $this->category_model->get_categories();
            
            $this->load->view('templates/header');
            $this->load->view('categories/index', $data);
            $this->load->view('templates/footer');
        }
        
        public function create(){
            // check login
            if(!$this->session->userdata('logged_in')){
                redirect('admins/login');
            }
            
            $data['title'] = 'Create Category';
            
            $this->form_validation->set_rules('name', 'Name', 'required');
            
            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('categories/create', $data);
                $this->load->view('templates/footer');
            } else {
                $this->category_model->create_category();
                
                // set message
                $this->session->set_flashdata('success_flag','Your Category has been created');
                
                redirect('categories');
            }
        }
        
        public function contents($id){
            $data['title'] = $this->category_model->get_category($id)->name;
            
            $data['contents'] = $this->content_model->get_contents_by_category($id);
            
            $this->load->view('templates/header');
            $this->load->view('contents/index', $data);
            $this->load->view('templates/footer');
        }
        
         public function delete($id){
            // check login
            if(!$this->session->userdata('logged_in')){
                redirect('admins/login');
            }
            
            $this->category_model->delete_category($id);
            
            // set message
                $this->session->set_flashdata('danger_flag','Your category has been deleted.');
            
            redirect('categories');
        }
    }