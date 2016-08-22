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
        $num = 'p1' . $i;
        $score = $this->input->post($num);
      }
      for ($i = 1; $i <= $max; $i++) {
        $num = 'p2' . $i;
        $score = $this->input->post($num);
      }
    }
  }
