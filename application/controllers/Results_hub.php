<?php
  class Results_hub extends CI_Controller {

    function __construct() {
      parent::__construct();
      $this->load->model('insert_model');
      $this->load->model('users_model');
    }

    public function index() {
      $this->form_validation->set_rules('year','Year','required|min_length[4]|max_length[4]');
      $this->form_validation->set_rules('month','Month','required|min_length[3]|max_length[3]');
      if ($this->form_validation->run() == FALSE) {
        $data['val_message'] = "Display failed due to following errors:";
        $data['val_direct'] = "player_admin/league_view/results_view";
        $data['val_amessage'] = "Back to results";
        $this->load->view('templates/header', $data);
        $this->load->view('admin_views/admin_home', $data);
        $this->load->view('templates/footer', $data);
      } else {
        $year = $this->input->post('year');
        $month = $this->input->post('month');
        $data['results'] = $this->users_model->get_current_results($year, $month);
        $order_field = "id";
        $order_direction = "asc";
        $data['players'] = $this->users_model->get_players_for_profile($order_field, $order_direction);
        $data['year'] = $year;
        $data['month'] = $month;
        //$results = $this->users_model->get_current_results($year, $month);
        $this->load->view('templates/header', $data);
        $this->load->view('admin_views/results_view', $data);
        $this->load->view('templates/footer', $data);

      }
    }
  }
