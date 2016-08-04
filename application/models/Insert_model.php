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

    public function activate_user() {
      
    }



}
