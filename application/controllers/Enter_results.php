<?php
  class Enter_results extends CI_Controller {

    function __construct() {
      parent::__construct();
      $this->load->model('insert_model');
      $this->load->model('users_model');
    }

    public function index() {
      $year = $this->input->post('year');
      $month = $this->input->post('month');
      $div = $this->input->post('div');
      $max = $this->input->post('num_records');
      for ($i = 1; $i <= $max; $i++) {
        $num1 = 'p1' . $i;
        $id1 = 'id1' . $i;
        $player1_score = $this->input->post($num1);
        $player1_id = $this->input->post($id1);
        $num2 = 'p2' . $i;
        $id2 = 'id2' . $i;
        $player2_score = $this->input->post($num2);
        $player2_id = $this->input->post($id2);
        $dat = 'date' . $i;
        $date = $this->input->post($dat);
        $d = 'day' . $i;
        $day = $this->input->post($d);
        if ($day == "d") {
          $day = "";
        }
        $this->insert_model->update_results($year, $month, $div, $player1_id, $player2_id, $player1_score, $player2_score, $date, $day);
      }
      $data['results_message'] = "Results have been updated";
      $this->load->view('templates/header', $data);
      $this->load->view('admin_views/admin_home', $data);
      $this->load->view('templates/footer', $data);

    }
  }
