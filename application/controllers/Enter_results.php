<?php
  class Enter_results extends CI_Controller {

    function __construct() {
      parent::__construct();
      $this->load->model('insert_model');
      $this->load->model('users_model');
    }

    public function index() {
      $year = $this->input->post('year');
      echo "year: " . $year . "<br>";
      $month = $this->input->post('month');
      echo "month: " . $month . "<br>";
      $div = $this->input->post('div');
      echo "division: " . $div . "<br>";
      $max = $this->input->post('num_records');
      echo "num_records: " . $max . "<br>";
      for ($i = 1; $i <= $max; $i++) {
        $num1 = 'p1' . $i;
        $id1 = 'id1' . $i;
        $player1_score = $this->input->post($num1);
        $player1_id = $this->input->post($id1);
        echo "player 1 id: " . $player1_id . "<br>";
        echo "player 1 score: " . $player1_score . "<br>";
        $num2 = 'p2' . $i;
        $id2 = 'id2' . $i;
        $player2_score = $this->input->post($num2);
        $player2_id = $this->input->post($id2);
        echo "player 2 id: " . $player2_id . "<br>";
        echo "player 2 score: " . $player2_score . "<br>";
        $this->insert_model->update_results($year, $month, $div, $player1_id, $player2_id, $player1_score, $player2_score);
      }

    }
  }
