<?php

  class Insert_model extends CI_Model {

    public function form_insert($data) {
      $this->db->insert('players', $data);
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
      //$this->load->helper('date');
      $date = date('Y-m-d');
      $data = array(
        'activated' => 1,
        'JoinDate' => $date
      );
      $data_leagues = array(
        'user_id' => $user_id
      );
      $this->db->where('id', $user_id);
      $this->db->update('players', $data);
      $this->db->insert('leagues', $data_leagues);

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

  public function get_id_from_results($year, $month, $rowNum) {
    $this->db->where('year', $year);
    $this->db->where('month', $month);
    $query = $this->db->get('results');
    $row = $query->row($rowNum);
    $id = $row->id;
    return $id;
  }

  /*public function update_results_info($divs, $player1_id, $player2_id, $id) {// may be needed later??
    $this->db->where('id', $id);
    $data = array(
      'division' => $divs,
      'player1_id' => $player1_id,
      'player2_id' => $player2_id
    );
    $this->db->update('results', $data);
  }*/

}
