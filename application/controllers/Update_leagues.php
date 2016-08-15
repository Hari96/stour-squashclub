<?php
  class Update_leagues extends CI_Controller {

    function __construct() {
      parent::__construct();
      $this->load->model('insert_model');
      $this->load->model('users_model');
    }

    public function index() {
      for ($i = 1; $i <= 7; $i++) {
        $num = 'curr' . $i;
        $id = 'id' . $i;
        $league_num = $this->input->post($num);
        $user_id = $this->input->post($id);
        $data = array(
          'current_league' => $league_num
        );
        $this->insert_model->update_users($data, $user_id);
        $data['leagues_message'] = 'Leagues changed successfully';
        //Loading View
        $this->load->view('templates/header', $data);
        $this->load->view('admin_views/admin_home', $data);
        $this->load->view('templates/footer', $data);

      }

    }
  }
