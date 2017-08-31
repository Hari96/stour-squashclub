<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Send_mails extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('users_model');
  }

  public function index() {
    $subject = $this->input->post('subject');
    $content = $this->input->post('content');
    if($content == "") {//only needed because of refresh causing problems
      $order_field = "current_league";//which field to order by
      $order_direction = "asc";// direction of sort
      $data['players'] = $this->users_model->get_players($order_field, $order_direction);
      $data['mail_no_content'] = "Message box was empty";
      $this->load->view('templates/header', $data);
      $this->load->view('admin_views/send_mail', $data);
      $this->load->view('templates/footer', $data);
    }
    if($subject == "") {//only needed because of refresh causing problems
      $order_field = "current_league";//which field to order by
      $order_direction = "asc";// direction of sort
      $data['players'] = $this->users_model->get_players($order_field, $order_direction);
      $data['mail_no_subject'] = "Please include a subject";
      $this->load->view('templates/header', $data);
      $this->load->view('admin_views/send_mail', $data);
      $this->load->view('templates/footer', $data);
    }
    if ($this->input->post('mail-type') == "players") {//sends mail to selection of players
      $email_arr = array();
      $name_arr = array();
      $c = 0;
      $num = $this->input->post('num');
      for ($i = 1; $i <= $num; $i++) {
        if ($this->input->post('ch' . $i) !== null) {
        //if ($this->input->post('ch' . $i) == 'y') {
          $email_arr[$c] = $this->input->post('mail'.$i);
          $name_arr[$c] = $this->input->post('fn'.$i);
          $c++;
        }
      }
      $subject.= " - from Stour Squash Club";
      for ($j = 0; $j < $c; $j++) {
        $message = "Hi ".$name_arr[$j].", a message from Squash Club Admin:\n\n";
        $message.= $content;
        mail($email_arr[$j], $subject, $message, "From: support@rgbmarketing.co.uk");
      }
      $year = date("Y");
      $data['year'] = $year;
      $month_num = date("m");
      $month = $this->users_model->get_month($month_num);
      $data['month'] = $month;
      $data['viewable'] = $this->users_model->get_viewable_state($year, $month);
      if($c == 0) {
        $data['mail_sent_message'] = "No mail sent";
      } else {
        $data['mail_sent_message'] = "Mail has been sent";
      }
    }//end of sending mail to selection of players
    else {//sending mail to all users
      $order_field = "lName";//which field to order by
      $order_direction = "asc";// direction of sort
      $users = $this->users_model->get_all_players($order_field, $order_direction);
      $subject.= " - from Stour Squash Club";
      foreach ($users as $user):
        $name = $user['fName'];
        $message = "Hi ". $name .", a message from Squash Club Admin:\n\n";
        $message.= $content;
        mail($user['email'], $subject, $message, "From: support@rgbmarketing.co.uk");
      endforeach;
      $data['all_mail_sent_message'] = "Mail has been sent to all";
    }
    //copy to admin
    $admin_email = "support@rgbmarketing.co.uk";
    $message = $content;
    $subject.= " - COPY TO ADMIN";
    mail($admin_email, $subject, $message);
    $admin_email = "";
    $this->load->view('templates/header', $data);
    $this->load->view('admin_views/admin_home', $data);
    $this->load->view('templates/footer', $data);
  }
}
