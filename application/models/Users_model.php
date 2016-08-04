<?php
class Users_model extends CI_Model {

  public function __construct() {
    $this->load->database();
  }

  public function get_players() {

    $query = $this->db->get('players');
    return $query->result_array();
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


}
