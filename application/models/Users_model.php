<?php
class Users_model extends CI_Model {

  public function __construct() {
    $this->load->database();
  }

  public function get_players($order_field, $order_direction) {
    // ensure players are registered
    $this->db->where('activated', 1);
    $this->db->order_by($order_field, $order_direction);
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

  public function delete_user($user_id) {
    $this->db->where('id', $user_id);
    $this->db->delete('players');
  }

  public function check_other_emails($email, $user_id) {
    $this->db->where('id !=',$user_id);
    $this->db->where('email', $email);
    $query = $this->db->get('players');
    if($query->num_rows() == 1) {
      return true;
    } else {
      return false;
    }
  }

  public function find_players_in_div($div) {
    $this->db->where('current_league', $div);
    $this->db->order_by('lName');
    $query = $this->db->get('players');
    if($query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return false;
    }

  }

  public function get_current_results($year, $month, $div) {
    $this->db->where('year', $year);
    $this->db->where('month', $month);
    $this->db->where('division', $div);
    $query = $this->db->get('results');
    return $query->result_array();
  }

  public function get_names_from_id($player_id) {
    $this->db->where('id', $player_id);
    $query = $this->db->get('players');
    $row = $query->row();
    $fname = $row->fName;
    $lname = $row->lName;
    $player_name = $fname . " " . $lname;
    return $player_name;

  }




}
