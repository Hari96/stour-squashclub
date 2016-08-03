<?php

  class Insert_model extends CI_Model {

    public function form_insert($data) {
      $this->db->insert('players', $data);
    }

}
