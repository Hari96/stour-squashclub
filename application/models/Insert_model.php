<?php

  class Insert_model extends CI_Model {

    public function form_insert($data) {
      $this->db->insert('players', $data);
    }

    public function get_emails($email) {

      $this->db->where('email', $email);
      $query = $this->db->get('players');
      if($query->num_rows() == 1) {
        return true;
      } else {
        return false;
      }
    }

    public function get_id_from_code($code) {
      $this->db->where('activation_code', $code);
      $query = $this->db->get('activation');
      return $query->row(0)->user_id;

    }

    public function code_insert($data_code) {
      $this->db->insert('activation', $data_code);
    }

    public function get_user_id() {
      $id = $this->db->insert_id();//insert_id() gets last user id
      return $id;
    }

    public function activation_insert($user_id) {
      $this->load->helper('date');
      $data = array(
        'activated' => 1,
        'JoinDate' => NOW()
      );
      $this->db->where('id', $user_id);
      $this->db->insert('players', $data);

    }



}
