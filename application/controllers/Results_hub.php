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
        //for ($i = 1; $i <= 6; $i++) {
        $i = 1;
          $div = $i;
          //$results_array = $this->users_model->get_current_results($year, $month, $div);
          //$data['results'] = $this->users_model->get_current_results($year, $month, $div);
          /*foreach ($results_array as $row) {
            $player1_id = $row['player1_id'];
            $player1_name = $this->users_model->get_names_from_id($player1_id);
            echo $player1_name . "<br>";
            $player2_id = $row['player2_id'];
            $player2_name = $this->users_model->get_names_from_id($player2_id);
            echo $player2_name;
          }*/
      //  }
      }
    }
  }
