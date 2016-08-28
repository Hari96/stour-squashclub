<?php
  class Display_results extends CI_Controller {

    function __construct() {
      parent::__construct();
      $this->load->model('users_model');
    }

    public function index() {
      $year = $this->input->post('year');
      $month = $this->input->post('month');
      $data['year'] = $year;
      $data['month'] = $month;
      $order_field = "id";
      $order_direction = "asc";
      $data['players'] = $this->users_model->get_players($order_field, $order_direction);
      $data['results'] = $this->users_model->get_current_results($year, $month);
      $data['leagues'] = $this->users_model->get_leagues($year);
      if ($this->input->post('display') == "results") {
        $this->load->view('templates/header', $data);
        $this->load->view('model_views/results', $data);
        $this->load->view('templates/footer', $data);
      }
      if ($this->input->post('display') == "tables") {
        $this->load->view('templates/header', $data);
        $this->load->view('model_views/tables', $data);
        $this->load->view('templates/footer', $data);
      }
    }

    public function initial_results() {
      $row = $this->users_model->get_current_period();
      $year = $row->year;
      $month = $row->month;
      $data['year'] = $year;
      $data['month'] = $month;
      $order_field = "id";
      $order_direction = "asc";
      $data['players'] = $this->users_model->get_players($order_field, $order_direction);
      $data['results'] = $this->users_model->get_current_results($year, $month);
      $data['leagues'] = $this->users_model->get_leagues($year);
      $this->load->view('templates/header', $data);
      $this->load->view('model_views/results', $data);
      $this->load->view('templates/footer', $data);
    }

    public function initial_tables() {
      $row = $this->users_model->get_current_period();
      $year = $row->year;
      $month = $row->month;
      $data['year'] = $year;
      $data['month'] = $month;
      $order_field = "id";
      $order_direction = "asc";
      $data['players'] = $this->users_model->get_players($order_field, $order_direction);
      $data['results'] = $this->users_model->get_current_results($year, $month);
      $data['leagues'] = $this->users_model->get_leagues($year);
      $this->load->view('templates/header', $data);
      $this->load->view('model_views/tables', $data);
      $this->load->view('templates/footer', $data);
    }

  }
