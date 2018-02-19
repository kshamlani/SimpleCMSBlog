<?php
class Admins extends CI_Controller{

    public function register(){
        $data['title'] = 'Sign Up';

        $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

        if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header');
            $this->load->view('admins/register', $data);
            $this->load->view('templates/footer');
        } else {
                // Encrypt Password
            $enc_password = md5($this->input->post('password'));

            $this->admin_model->register($enc_password);

                // set message
            $this->session->set_flashdata('success_flag','You are now registered, You can now log in');

            redirect('contents');
        }
    }

        // Log in User
    public function login(){
        $data['title'] = 'Login';

        $this->form_validation->set_rules('username', 'Username', 'required');

        $this->form_validation->set_rules('password', 'Password', 'required');


        if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header');
            $this->load->view('admins/login', $data);
            $this->load->view('templates/footer');
        } else {

            $username = $this->input->post('username');
				// Get and encrypt the password
            $password = md5($this->input->post('password'));
				// Login user
            $admin_id = $this->admin_model->login($username, $password);

            if($admin_id){
					// Create session

               $user_data = array(
                  'admin_id' => $admin_id,
                  'username' => $username,
                  'logged_in' => true
              );

               $this->session->set_userdata($user_data);

					// Set message
               $this->session->set_flashdata('success_flag', 'You are now logged in');

               redirect('contents');
           } else {
					// Set message
               $this->session->set_flashdata('danger_flag', 'Login is invalid');

               redirect('admins/login');

           }
       }
   }

        // logout user
   public function logout(){
                // unset user data
    $this->session->unset_userdata('logged_in');
    $this->session->unset_userdata('admin_id');
    $this->session->unset_userdata('username');

                // Set message
    $this->session->set_flashdata('warning_flag', 'Logged out');

    redirect('admins/login');
}

            // Check if Username exists..
public function check_username_exists($username){
    $this->form_validation->set_message('check_username_exists', 'Username already exists.');
    if($this->admin_model->check_username_exists($username)){
        return true;
    } else {
        return false;
    }
}

public function edit_admins(){
    if(!$this->session->userdata('logged_in')){
        redirect('admins/login');
    }

    $data['title'] = 'Edit Admins';

    $data['admins'] = $this->admin_model->get_all_admins();

    $this->load->view('templates/header');
    $this->load->view('admins/edit_admins', $data);
    $this->load->view('templates/footer');
}

public function edit_admin($id = NULL){
    if(!$this->session->userdata('logged_in')){
        redirect('admins/login');
    }

    if(!isset($id)){
        redirect('edit-admins');
    }

    $this->form_validation->set_rules('username', 'Username', 'required|callback_check_email_exists');


    if($this->form_validation->run() === FALSE){
        $data['admin'] = $this->admin_model->get_admin($id);

        $this->load->view('templates/header');
        $this->load->view('admins/edit_admin', $data);
        $this->load->view('templates/footer');
    } else {

        $info = $this->input->post();

        if ($info['password'] != $info['password2']) {
            $this->session->set_flashdata('warning_flag','Password does not matches.');
            redirect($_SERVER['HTTP_REFERER']); // redirects to same page.
        } else {
            $this->admin_model->update_admin($id);
            $this->session->set_flashdata('success_flag','Admin account updated.');
            redirect('contents');
        }

    }

}

public function check_email_exists($username){
    $this->form_validation->set_message('check_email_exists', 'Username already exists.');
    if($this->admin_model->check_email_exists($username)){
        return true;
    } else {
        return false;
    }
}

public function delete_admin($id = NULL){
            // check login
    if(!$this->session->userdata('logged_in')){
        redirect('admins/login');
    }

    if(!isset($id)){
        redirect('edit-admins');
    }

    $this->admin_model->delete_admin($id);

            // set message
    $this->session->set_flashdata('danger_flag','Admin has been deleted.');

    redirect('edit-admins');
}
}