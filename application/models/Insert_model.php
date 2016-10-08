<?php

  class Insert_model extends CI_Model {

    public function form_insert($data) {
      $this->db->insert('players', $data);
    }

    public function code_insert($data_code) {
      $this->db->insert('activation', $data_code);
    }

    public function get_user_id() {
      $id = $this->db->insert_id();//insert_id() gets last user id
      return $id;
    }

    public function activation_insert($user_id, $league_player) {
      //$this->load->helper('date');
      $date = date('Y-m-d');
      $data_leagues = array(
        'user_id' => $user_id
      );
      if ($league_player == true) {
      $data = array(
        'activated' => 1,
        'JoinDate' => $date
      );
      $data_profiles = array(
        'user_id' => $user_id,
        'active' => 1
      );
      $this->db->insert('leagues', $data_leagues);// maybe not necessary?
      $this->db->insert('profiles', $data_profiles);//inserts user id into profiles table + indicates playing in league
    } else {
      $data = array(
        'activated' => 1,
        'JoinDate' => $date,
        'active' => 0
      );
    }
      $this->db->where('id', $user_id);
      $this->db->update('players', $data);
    }

    public function update_users($data, $user_id) {
      $this->db->where('id', $user_id);
      $this->db->update('players', $data);
    }

    public function update_leagues($data_leagues, $user_id, $year) {
      $this->db->where('user_id', $user_id);
      $league_name = 'leagues' . $year;
      $query = $this->db->get($league_name);
      if($query->num_rows() == 0 && $user_id != "") {
        $data = array(
          'user_id' => $user_id
        );
        $this->db->insert($league_name, $data);
      }
      $this->db->where('user_id', $user_id);
      $this->db->update($league_name, $data_leagues);

    }

    public function create_new_league($year) {
      $league_name = 'leagues' . $year;
      if ($this->db->table_exists($league_name)) {
        return true;
      } else {
        $base_league = 'leagues';
        $this->db->query("CREATE TABLE $league_name LIKE $base_league");
        $this->db->select('user_id');
        $query_leagues = $this->db->get('leagues');
        foreach ($query_leagues->result() as $row) {
          $id = $row->user_id;
          $data = array(
            'user_id' => $id
          );
          $this->db->insert($league_name, $data);
      }
    }
  }

  public function check_existence_of_results($year, $month) {
    $this->db->where('year', $year);
    $this->db->where('month', $month);
    $query = $this->db->get('months');
    if($query->num_rows() == 1) {
      return true;
    } else {
      return false;
    }
  }

  public function insert_into_results($year, $month, $divs, $player1_id, $player2_id) {
    $data = array(
      'year' => $year,
      'month' => $month,
      'division' => $divs,
      'player1_id' => $player1_id,
      'player2_id' => $player2_id
    );
    $this->db->insert('results', $data);
  }

  public function initiate_month_year($year, $month) {
    $months_data = array(
      'year' => $year,
      'month' => $month
    );
    $this->db->insert('months', $months_data);//insert month and year into 'months' table
  }

  public function get_id_from_results($year, $month, $rowNum) {// not using this function? - to be reomoved
    $this->db->where('year', $year);
    $this->db->where('month', $month);
    $query = $this->db->get('results');
    $row = $query->row($rowNum);
    $id = $row->id;
    return $id;
  }

  public function update_results($year, $month, $div, $player1_id, $player2_id, $player1_score, $player2_score, $date, $day) {
    $this->db->where('year', $year);
    $this->db->where('month', $month);
    $this->db->where('division', $div);
    $this->db->where('player1_id', $player1_id);
    $this->db->where('player2_id', $player2_id);
    $data = array(
      'player1_score' => $player1_score,
      'player2_score' => $player2_score,
      'date' => $date,
      'day' => $day
    );
    $this->db->update('results', $data);
  }

  public function update_profiles($user_id, $played, $won, $drawn, $lost, $average, $month, $day, $date) {
    $this->db->where('user_id', $user_id);
    $data = array(
      'played' => $played,
      'won' => $won,
      'drawn' => $drawn,
      'lost' => $lost,
      'average' => $average,
      'month' => $month,
      'day' => $day,
      'date' => $date
    );
    $this->db->update('profiles', $data);
  }

  public function update_active($email, $active) {//changes admin from active to inactive and vice versa
    if ($active == 1) {
      $active = 0;
      $admin_data = array(
        'email' => $email,
        'role' => 1,
        'logged_in' => TRUE,
        'activated' => 1,
        'active' => 0
      );
      $this->session->set_userdata($admin_data);
    } else {
      $active = 1;
      $admin_data = array(
        'email' => $email,
        'role' => 1,
        'logged_in' => TRUE,
        'activated' => 1,
        'active' => 1
      );
      $this->session->set_userdata($admin_data);
    }
    $this->db->where('email', $email);
    $data = array(
      'active' => $active
    );
    $this->db->update('players', $data);
  }

  public function empty_announcements() {
    $this->db->empty_table('admin_announcements');
    $this->db->query("ALTER TABLE admin_announcements AUTO_INCREMENT = 1");
  }

  public function insert_announcements($data) {
    $this->db->insert('admin_announcements', $data);
  }

  public function wordpress_insert($data, $email) {
    $db2 = $this->load->database('db2', TRUE);
    $db2->where('user_email', $email);
    $query = $db2->get('wp_users');
    if ($query->num_rows() == 0) {
    $db2->insert('wp_users', $data);
    $db2->select_max('userid');
	  $query2 = $db2->get('wp_wpforo_profiles');
	  $row = $query2->row_array();
	  $id = $row['userid'] + 1;
    $profile_data = array(
      'userid' => $id,
      'title' => 'member',
      'username' => $email,
      'groupid' => 3
    );
    $db2->insert('wp_wpforo_profiles', $profile_data);
    }
  }

  public function set_admin($id) {
    $data = array(
      'role' => 1
    );
    $this->db->where('id', $id);
    $this->db->update('players', $data);
  }

  public function unset_admin($id) {
    $this->db->where('id', $id);
    $data = array(
      'role' => 0
    );
    $this->db->update('players', $data);
  }

  public function set_forum_admin($email) {
    $db2 = $this->load->database('db2', TRUE);
    $data = array(
      'groupid' => 1
    );
    $db2->where('username', $email);
    $db2->update('wp_wpforo_profiles', $data);
  }

  public function unset_forum_admin($email) {
    $db2 = $this->load->database('db2', TRUE);
    $db2->where('id', $email);
    $data = array(
      'groupid' => 3
    );
    $db2->update('wp_wpforo_profiles', $data);
  }

  public function unactivate_user($user_id) {
    $this->db->where('id', $user_id);
    $query = $this->db->get('players');
    if ($query->row(0)->activated == 1) {
      $player_data = array(
        'activated' => 0,
        'active' => 2//someone who was once registered and active
      );
    } else {
      $player_data = array(
        'activated' => 0,
        'active' => 3//someone who was once registered, but was NEVER active
      );
    }
    $profile_data = array(
      'active' => 0
    );
    $this->db->where('id', $user_id);
    $this->db->update('players', $data);
    $this->db->where('user_id', $user_id);
    $this->db->update('profiles', $profile_data);
    //forum login needs cancelling!
  }

  public function insert_id_in_profiles($user_id) {
    $data = array(
      'user_id' => $user_id
    );
    $this->db->insert('profiles', $data);
  }

  public function activate_profile($data, $user_id) {
    $this->db->where('user_id', $user_id);
    $this->db->update('profiles', $data);
  }

}
