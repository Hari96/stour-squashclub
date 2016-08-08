<?php
class Users_model extends CI_Model {

  public function __construct() {
    $this->load->database();
  }

  public function get_players() {

    $query = $this->db->get('players');
    return $query->result_array();
  }

  public function check_for_email($email) {

    $this->db->where('email', $email);
    $query = $this->db->get('players');
    if($query->num_rows() == 1) {
      return true;
    } else {
      return false;
    }
  }

  public function check_password($email, $password) {
    $this->db->where('email', $email);
    $query = $this->db->get('players');
    if($query->row(0)->password == $password) {
      return true;
    } else {
      return false;
    }
  }

  public function get_role($email) {
    $this->db->where('email', $email);
    $query = $this->db->get('players');
    if($query->row(0)->role == 1) {
      return true;
    } else {
      return false;
    }
  }


}
