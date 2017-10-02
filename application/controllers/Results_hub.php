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
        $this->load->view('templates/header', $data);
        $this->load->view('admin_views/results_view', $data);
        $this->load->view('templates/footer', $data);

      }
    }

    public function make_viewable() {
      $year = date('Y');
      $month_num = date('m');
      if($month_num == '12') {
        $nextyear = intval($year) + 1;
        $year = strval($nextyear);
        $month_num = '01';
      } else {
        $month_num = intval($month_num) + 1;
        $month_num = ($month_num < 10) ? '0'.strval($month_num): strval($month_num);
      }
      $month = $this->users_model->get_month($month_num);
      $this->insert_model->update_viewable($year, $month);
      if ($month_num < 12) {
        $next_month_num = $month_num + 1;
        $next_year = $year;
      }
      else {
        $next_month_num = 1;
        $next_year = $year + 1;
      }
      $next_month = $this->users_model->get_month($next_month_num);
      $data['viewable'] = $this->users_model->get_viewable_state($next_year, $next_month);
      $data['divs_made_viewable'] = "Next month's divisions made viewable";
      $this->load->view('templates/header', $data);
      $this->load->view('admin_views/admin_home', $data);
      $this->load->view('templates/footer', $data);
    }

  }
