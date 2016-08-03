<?php
class Users_model extends CI_Model {

  public function __construct() {
    $this->load->database();
  }

  public function get_players() {

    $query = $this->db->get('players');
    return $query->result_array();
  }


}
