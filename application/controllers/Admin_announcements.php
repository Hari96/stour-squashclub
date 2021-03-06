<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_announcements extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('users_model');
    $this->load->model('insert_model');
  }

  public function index() {
    $this->session->set_userdata('announcements');
    $latest_title = $this->input->post('title1');
    $latest_comment = $this->input->post('content1');
    $date = date('Y-m-d');
    $data = array(
      'title' => $latest_title,
      'comment' => $latest_comment,
      'date' => $date
    );
    $this->insert_model->empty_announcements();
    $this->insert_model->insert_announcements($data);
    for ($i = 2; $i <= 5; $i++) {
       $title = $this->input->post('title' . $i);
       $comment = $this->input->post('content' . $i);
       $date = $this->input->post('date' . $i);
       $data = array(
         'title' => $title,
         'comment' => $comment,
         'date' => $date
         //'number' => $i
       );
       $this->insert_model->insert_announcements($data);
    }
    $data['announcement_message'] = "Latest announcement posted and oldest deleted";
    $this->session->unset_userdata('announcements');
    $year = date("Y");
    $data['year'] = $year;
    $month_num = date("m");
    $month = $this->users_model->get_month($month_num);
    $data['month'] = $month;
    $data['viewable'] = $this->users_model->get_viewable_state($year, $month);
    $this->load->view('templates/header', $data);
    $this->load->view('admin_views/admin_home', $data);
    $this->load->view('templates/footer', $data);
  }

}
