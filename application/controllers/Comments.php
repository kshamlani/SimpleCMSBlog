<?php   
    class Comments extends CI_Controller{
        public function create($content_id){
            $slug = $this->input->post('slug');
            $data['content'] = $this->content_model->get_contents($slug);
            
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('body', 'Body', 'required');
            
            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('contents/view', $data);
                $this->load->view('templates/footer');
            } else {
                $this->comment_model->create_comment($content_id);
                redirect('contents/'.$slug);
            }
        }
    }