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

    public function update_leagues($data, $user_id, $year) {
      $this->load->dbforge();
      $this->db->where('user_id', $user_id);
      $league_name = 'leagues' . $year;
      if ($this->db->table_exists($league_name)) {
        $this->db->update($league_name, $data);
      } else {
        $base_league = 'leagues';
        $this->db->query("CREATE TABLE $league_name LIKE $base_league");//need now to initiate new table with all id's
      }
    }



}
