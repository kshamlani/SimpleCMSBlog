<?php
class Admin_model extends CI_Model{

    public function register($enc_password){

            // User data array..
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $enc_password
        );

            // Insert user
        return $this->db->insert('admins', $data);
    }

        // log in user
    public function login($username, $password){
            // validate
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $result = $this->db->get('admins');

        if($result->num_rows() == 1){
            return $result->row(0)->id;
        } else {
            return false;
        }
    }

        // check username exists
    public function check_username_exists($username){
        $query = $this->db->get_where('admins', array('username' => $username));

        if(empty($query -> row_array())){
            return true;
        } else {
            return false;
        }
    }

    public function get_all_admins(){
        $this->db->order_by('username');
        $query = $this->db->get('admins');
        return $query->result_array();
    }

    public function get_admin($id){
        $this->db->order_by('username');
        $this->db->where('id',$id);
        $query = $this->db->get('admins');
        return $query->result_array();
    }

    public function update_admin($id){

        $enc_password = md5($this->input->post('password'));
        $passlen = strlen($this->input->post('password'));

        if ($passlen > 0) {
            $this->db->set('password', $enc_password);
        }
        
        $this->db->set('username', $this->input->post('username'));
        $this->db->where('id', $id);
        return $this->db->update('admins');
    }

        // check username exists
public function check_email_exists($username){
    $this->db->select('*');
    $this->db->from('admins');
    $this->db->where('username', $username);
    $this->db->where_not_in('id', $this->input->post('id'));
    $query = $this->db->get()->result_array();
    if(empty($query)){
        return true;
    } else {
        return false;
    }
}

public function delete_admin($id){
    $this->db->where('id', $id);
    $this->db->delete('admins');
    return true;
}

}