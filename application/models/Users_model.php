<?php
class Users_model extends CI_Model {

  public function __construct() {
    $this->load->database();
  }

  public function get_id_from_code($code) {
    $this->db->where('activation_code', $code);
    $query = $this->db->get('activation');
    return $query->row(0)->user_id;
  }

  public function get_players($order_field, $order_direction) {//gets active players, including active admins
    $this->db->where('activated', 1);
    $this->db->where('active', 1);
    $this->db->order_by($order_field, $order_direction);
    $query = $this->db->get('players');
    return $query->result_array();
  }

  public function get_players_for_profile($order_field, $order_direction) {//gets players who are active or have been active
    $this->db->where('activated !=', 2);//excluding players who have never become active
    $this->db->where('active !=', 3);//exclude players who have left but were never active
    $this->db->order_by($order_field, $order_direction);
    $query = $this->db->get('players');
    return $query->result_array();
  }

  public function get_all_players($order_field, $order_direction) {//gets all players, not admins and not those who have left
    $this->db->where('role', 0);
    $this->db->where('active !=', 2);//not players who left and were active
    $this->db->where('active !=', 3);//not players who left but were never active
    $this->db->order_by($order_field, $order_direction);
    $query = $this->db->get('players');
    return $query->result_array();
  }

  public function get_all_players_and_admins($order_field, $order_direction) {
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
    if($query->row(0)->password === $password) {
      return true;
    } else {
      return false;
    }
  }

  public function check_if_activated($email) {
    $this->db->where('email', $email);
    $query = $this->db->get('players');
    if($query->row(0)->activated == 1 || $query->row(0)->activated == 2) {
      return true;
    } else {
      return false;
    }
  }

  public function get_role($email) {
    $this->db->where('email', $email);
    $query = $this->db->get('players');
    if($query->row(0)->role == 1) {
      $role = 1;
      return $role;
    } else if($query->row(0)->role == 2) {
        $role = 2;
        return $role;
      } else {
    return false;
    }
  }

  public function delete_user($user_id) {//needs lot more thought!!
    $this->db->where('id', $user_id);
    $this->db->delete('players');
    $this->db->where('user_id', $user_id);
    $this->delete('profiles');
  }

  public function check_other_emails($email, $user_id) {
    $this->db->where('id !=', $user_id);
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
    $this->db->order_by('lName', 'asc');
    $query = $this->db->get('players');
    if($query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return false;
    }
  }

  public function delete_set_of_players($year, $month) {
    $this->db->where('year', $year);
    $this->db->where('month', $month);
    $this->db->delete('results');
    $query = $this->db->query("SELECT MAX(id) AS id FROM results");
    $row = $query->row();
    $max = $row->id;
    $max = $max + 1;
    $query = $this->db->query("ALTER TABLE results AUTO_INCREMENT = $max");//ensures id continues from last, without gap
  }

  public function get_results() {
    $query = $this->db->get('results');
    return $query->result_array();
  }

  public function get_results_from_recent() {
    $this->db->order_by("id", "desc");
    $query = $this->db->get('results');
    return $query->result_array();
  }

  public function get_current_results($year, $month) {
    $this->db->where('year', $year);
    $this->db->where('month', $month);
    $this->db->order_by('division', 'asc');
    $query = $this->db->get('results');
    $row = $query->row();
    return $query->result_array();
  }

  public function get_name_from_id($player_id) {
    $this->db->where('id', $player_id);
    $query = $this->db->get('players');
    $row = $query->row();
    $fname = $row->fName;
    $lname = $row->lName;
    $player_name = $fname . " " . $lname;
    return $player_name;
  }

  public function get_mobile_from_id($player_id) {
    $this->db->where('id', $player_id);
    $query = $this->db->get('players');
    $row = $query->row();
    $mobile = $row->mobile;
    return $mobile;
  }

  public function get_current_period() {
    $this->db->order_by('id', 'desc');
    $query = $this->db->get('months');
	  $row = $query->row();
    return $row;

  }

  public function get_leagues($year) {
    $league_name = "leagues" . $year;
    $query = $this->db->get($league_name);
    $row = $query->row();
    return $query->result_array();
  }

  public function getNamesFromEmail($email) {
    $this->db->where('email', $email);
    $query = $this->db->get('players');
    $row = $query->row();
    return $row;
  }

  public function get_id_from_email($email) {
    $this->db->where('email', $email);
    $query = $this->db->get('players');
    $row = $query->row();
    $id = $row->id;
    return $id;
  }

  public function get_player_profiles($order_field, $order_direction) {
    $this->db->order_by($order_field, $order_direction);
    $query = $this->db->get('profiles');
    return $query->result_array();
  }

  public function get_player_profile($user_id) {
    $this->db->where('user_id', $user_id);
    $query = $this->db->get('profiles');
    $row = $query->row();
    return $row;
  }

  public function check_id_in_profiles($user_id) {
    $this->db->where('user_id', $user_id);
    $query = $this->db->get('profiles');
    if(empty($query->result())) {
      return false;
    } else {
      return true;
    }
  }

  public function get_div_for_player($email) {
    $this->db->where('email', $email);
    $query = $this->db->get('players');
    $row = $query->row();
    $div = $row->current_league;
    return $div;
  }

  public function get_announcements() {
    $query = $this->db->get('admin_announcements');
    return $query->result_array();
  }

}
