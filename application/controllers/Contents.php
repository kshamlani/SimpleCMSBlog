<?php 
    class Contents extends CI_Controller{        
        public function index($offset = 0){
            
            // Pagination Config
            $config['base_url'] = base_url() . 'contents/index/';
            $config['total_rows'] = $this->db->count_all('contents');
            $config['per_page'] = 5;
            $config['uri_segment'] = 3;
            
            // Produces: class="pagination-link"
            $config['attributes'] = array('class' => 'pagination-link');
            
            // Init pagination
            $this->pagination->initialize($config);
            
            $data['title'] = 'Latest Contents';
            
            $data['contents'] = $this->content_model->get_contents(FALSE, $config['per_page'], $offset);
            
            $this->load->view('templates/header');
            $this->load->view('contents/index', $data);
            $this->load->view('templates/footer');
        }
        
        public function view($slug = NULL){
            $data['content'] = $this->content_model->get_contents($slug);
            
            $content_id = $data['content']['id'];
            $data['comments'] = $this->comment_model->get_comments($content_id);
                        
            if(empty($data['content'])){
				show_404();
			}
                       
			$data['title'] = $data['content']['title'];
            
			$this->load->view('templates/header');
			$this->load->view('contents/view', $data);
			$this->load->view('templates/footer');
        }
        
        public function create(){
            // check login
            if(!$this->session->userdata('logged_in')){
                redirect('admins/login');
            }
            
            $data['title'] = 'Create Content';
            
            $data['categories'] = $this->content_model->get_categories(); 
            
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('body', 'Body', 'required');
            
            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
			     $this->load->view('contents/create', $data);
			     $this->load->view('templates/footer');
            } else {
                // Upload Image
				$config['upload_path'] = './assets/images/contents';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';
				$this->load->library('upload', $config);
				if(!$this->upload->do_upload()){
					$errors = array('error' => $this->upload->display_errors());
					$content_image = 'noimage.jpg';
				} else {
					$data = array('upload_data' => $this->upload->data());
					$content_image = $_FILES['userfile']['name'];
				}
				$this->content_model->create_content($content_image);
                
                // set message
                $this->session->set_flashdata('content_created','Your content has been created');

                redirect('contents');
            }
        }
        
        public function delete($id){
            // check login
            if(!$this->session->userdata('logged_in')){
                redirect('admins/login');
            }
            
            $this->content_model->delete_content($id);
            
            // set message
                $this->session->set_flashdata('content_deleted','Your content has been deleted.');
            
            redirect('contents');
        }
        
        public function edit($slug){
            
            // check login
            if(!$this->session->userdata('logged_in')){
                redirect('admins/login');
            }
            
            $data['content'] = $this->content_model->get_contents($slug);
            
            // Check user
            // if($this->session->userdata('admin_id') != $this->content_model->get_contents($slug)['admin_id']){
            //     redirect('contents');
            // }
            
            $data['categories'] = $this->content_model->get_categories();
            
            if(empty($data['content'])){
				show_404();
			}
            
			$data['title'] = 'Edit Content';
			$this->load->view('templates/header');
			$this->load->view('contents/edit', $data);
			$this->load->view('templates/footer');
        }
        
        public function update(){
            // check login
            if(!$this->session->userdata('logged_in')){
                redirect('admins/login');
            }
            
            $this->content_model->update_content();
            
            // set message
                $this->session->set_flashdata('content_updated','Your content has been updated.');
            
            redirect('contents');
        }
        
    }
