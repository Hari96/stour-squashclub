<?php
  class Profiles_update extends CI_Controller {

    function __construct() {
      parent::__construct();
      $this->load->model('users_model');
    }

    public function index() {
      $this->form_validation->set_rules('year','Year','required|min_length[4]|max_length[4]');
      $this->form_validation->set_rules('month','Month','required|min_length[3]|max_length[3]');
      if ($this->form_validation->run() == FALSE) {
        $data['val_message'] = "Display failed due to following errors:";
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
        $data['divisions'] = $this->users_model->get_divs($year, $month);
        $this->load->view('templates/header', $data);
        $this->load->view('admin_views/profiles_update_view', $data);
        $this->load->view('templates/footer', $data);

      }
    }

  }
