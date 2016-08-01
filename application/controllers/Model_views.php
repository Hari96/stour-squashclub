<?php
class Model_views extends CI_Controller {
  public function view($page = 'register') {
    if (!file_exists(APPPATH.'views/model_views/'.$page.'.php')) {
      // whoops don't have a page for that!
      show_404();
    }

    $data['title'] = ucfirst($page); // Capitalize the first letter

    $data['players'] = $this->users_model->get_players();
    $data['title'] = 'Players List';

    $this->load->view('templates/header', $data);
    $this->load->view('model_views/'.$page, $data);
    $this->load->view('templates/footer', $data);

  }

  public function __construct() {
    parent::__construct();
    $this->load->model('users_model');
    $this->load->helper('url_helper');
  }

  public function insert($fname, $lname, $password, $mobile, $landline, $email, $age, $standard ) {

    $this->users_model->create_users([
      'fName' => $fname,
      'lName' => $lname,
      'password' => $password,
      'mobile' => $mobile,
      'landline' => $landline,
      'email' => $email,
      'age' => $age,
      'standard' => $standard

    ]);

  }

}
