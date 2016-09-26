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
      $this->db->insert('leagues', $data_leagues);// maybe not necessary?
      $this->db->insert('profiles', $data_leagues);//inserts user id into profiles table
    } else {
      $data = array(
        'activated' => 2,
        'JoinDate' => $date
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

  public function update_role($email, $role) {
    if ($role == 1) {
      $role = 2;
      $admin_data = array(
        'email' => $email,
        'role' => 2,
        'logged_in' => TRUE,
        'activated' => 2
      );
      $this->session->set_userdata($admin_data);
    } else if ($role == 2) {
      $role = 1;
      $admin_data = array(
        'email' => $email,
        'role' => 1,
        'logged_in' => TRUE,
        'activated' => 1
      );
      $this->session->set_userdata($admin_data);
    }
    $this->db->where('email', $email);
    $data = array(
      'role' => $role
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

  public function wordpress_insert($data) {
    $db2 = $this->load->database('db2', TRUE);
    $db2->insert('wp_users', $data);
  }

  public function set_admin($id) {
    $this->db->where('id', $id);
    $query = $this->db->get('players');
    $activated_val = $query->row(0)->activated;
    $role = 1;
    if ($activated_val == 2) {
      $role = 2;
    }
    $data = array(
      'role' => $role
    );
    $this->db->where('id', $id);
    $this->db->update('players', $data);
  }

}
