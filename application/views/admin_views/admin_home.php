<h2>Admin page</h2>
<?php
if(isset($_SESSION['role']))
{
  if ( validation_errors() !== '') {?>
  <div class="message-box alert alert-danger alert-dismissible"><p><?php echo $val_message ?></p>
    <?php echo validation_errors(); ?>
    <a href="<?php echo base_url(); echo $val_direct; ?>"> <?php echo $val_amessage; ?></a>
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  </div>
  <?php } ?>
<!-- successful update message-->
<?php if (isset($update_message)) { ?>
  <div class="message-box alert alert-success alert-dismissible">
    <h3 style="color:green;"><?php echo $update_message; ?></h3>
    <a href="<?php echo base_url();?>player_admin/crud_view/user_update">Return to update page</a>
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   </div>
<?php $update_message = ''; } ?>
<!-- successful update2 message-->
<?php if (isset($update2_message)) { ?>
  <div class="message-box alert alert-success alert-dismissible">
    <h3 style="color:green;"><?php echo $update2_message; ?></h3>
    <a href="<?php echo base_url();?>player_admin/crud_view/user_update2">Return to update page</a>
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   </div>
<?php $update2_message = ''; } ?>
<!-- repeated email address message-->
<?php if (isset($email_message)) { ?>
<div class="message-box alert alert-danger alert-dismissible">
  <h3 style="color:red;"><?php echo $email_message; ?></h3>
  <a href="<?php echo base_url();?>player_admin/crud_view/user_update">Return to update</a>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>
<?php $email_message = '';} ?>
<!-- successful delete message-->
<?php if (isset($delete_message)) { ?>
  <div class="message-box alert alert-success alert-dismissible">
    <h3 style="color:green;"><?php echo $delete_message; ?></h3>
    <a href="<?php echo base_url();?>player_admin/crud_view/user_delete">Return to delete page</a>
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   </div>
<?php $delete_message = ''; } ?>
<?php if (isset($leagues_message)) { ?>
 <div class="message-box alert alert-success alert-dismissible">
   <h3 style="color:green;"><?php echo $leagues_message; ?></h3>
   <a href="<?php echo base_url();?>player_admin/league_view/leagues_view">Return to league page</a>
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  </div>
<?php $leagues_message = ''; } ?>
<?php if (isset($divtoolarge_message)) { ?>
 <div class="message-box alert alert-danger alert-dismissible">
   <h3 style="color:red;"><?php echo $divtoolarge_message; ?></h3>
   <a href="<?php echo base_url();?>player_admin/league_view/leagues_view">Return to league page</a>
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  </div>
<?php $divtoolarge_message = ''; } ?>
<?php if (isset($announcement_message)) { ?>
 <div class="message-box alert alert-info alert-dismissible">
   <h3 style="color:green;"><?php echo $announcement_message; ?></h3>
   <a href="<?php echo base_url();?>player_admin/announcement_view/announcements_view">Return to announcements page</a>
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  </div>
<?php $announcement_message = ''; } ?>
<?php if (isset($mail_sent_message)) { ?>
 <div class="message-box alert alert-info alert-dismissible">
   <h3 style="color:green;"><?php echo $mail_sent_message; ?></h3>
   <a href="<?php echo base_url();?>player_admin/send_mail">Return to sending email page</a>
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  </div>
<?php $mail_sent_message = ''; } ?>
<?php if (isset($all_mail_sent_message)) { ?>
 <div class="message-box alert alert-info alert-dismissible">
   <h3 style="color:green;"><?php echo $all_mail_sent_message; ?></h3>
   <a href="<?php echo base_url();?>player_admin/mail_all">Return to sending email to all page</a>
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  </div>
<?php $all_mail_sent_message = ''; } ?>

<div class="container-fluid">
  <class="row">
    <div class="col-md-10 col-md-offset-1 table-responsive">
      <?php echo form_open('player_admin');
        if ($_SESSION['role'] == 1 || $_SESSION['activated'] == 1) {
      ?>
      <span><strong>Currently you will be included in playing lists</strong></span>&nbsp;<button type="submit" class="btn btn-primary">Remove from lists</button>
      <br><br>
      <?php
    } else if ($_SESSION['role'] == 2 || $_SESSION['activated'] == 2) { ?>
         <span><strong>Currently you will NOT be included in playing lists</strong></span>&nbsp;<button type="submit" class="btn btn-primary">Add to lists</button>
         <br><br>
      <?php } echo form_close(); ?>
      <table class="table table-striped table-bordered">
        <thead>
          <tr><th style="width:40%;">Task description</th><th style="width:60%;" colspan="3">Link</th></tr>
        </thead>
        <tbody>
          <tr>
            <td>You can update the main player details: <em>Names, mobile and email.</em> </td>
            <td colspan="3"><a href="<?php echo base_url();?>player_admin/crud_view/user_update">Update main player details</a></td>
          </tr>
          <tr>
            <td>You can update other player details: <em>Landline, age, level and league status (active or non-active).</em> </td>
            <td colspan="3"><a href="<?php echo base_url();?>player_admin/crud_view/user_update2">Update other player details</a></td>
          </tr>
          <tr>
            <td>You can delete a player and all their details. Be careful!</td>
            <td colspan="3"><a href="<?php echo base_url();?>player_admin/crud_view/user_delete">Go to player delete page</a></td>
          </tr>
          <tr>
            <td>You can allocate players to divisions and setup new leagues. Their current division will be shown so you will only have to change a few.</td>
            <td colspan="3"><a href="<?php echo base_url();?>player_admin/league_view/leagues_view">Start new leagues</a></td>
          </tr>
          <tr>
            <td>You can enter and update results for the current leagues.</td>
            <?php echo form_open('results_hub');?>
            <td>
              <?php
              echo form_label('Choose Year:', 'inputYear');
              $options = array(
                '0' => 'Choose the year',
                '2016' => '2016',
                '2017' => '2017',
                '2018' => '2018',
                '2019' => '2019',
                '2020' => '2020',
                '2021' => '2021',
                '2022' => '2022',
                '2023' => '2023',
                '2024' => '2024',
                '2025' => '2025',
                '2026' => '2026',
                '2027' => '2027'
              );
              echo form_dropdown('year', $options, 'Choose the year', 'class="form-control"');
              ?>
            </td>
            <td>
              <?php
              echo form_label('Choose Month:', 'inputMonth');
              $options = array(
                '0' => 'Choose the month',
                'jan' => 'Jan',
                'feb' => 'Feb',
                'mar' => 'Mar',
                'apr' => 'Apr',
                'may' => 'May',
                'jun' => 'Jun',
                'jul' => 'Jul',
                'aug' => 'Aug',
                'sep' => 'Sep',
                'oct' => 'Oct',
                'nov' => 'Nov',
                'dec' => 'Dec'
              );
              echo form_dropdown('month', $options, 'Choose the month', 'class="form-control"');
              ?>
            </td>
            <td>
              <?php
              $data = array(
                'id' => 'yearmonth',
                'type' => 'submit',
                'content' => 'Show results',
                'class' => 'btn btn-info'
              );
              echo form_button($data);
              ?>
            </td>
            <?php echo form_close(); ?>
          </tr>
          <tr>
            <td>Admin announcements can be made, which will be shown on the home page. The latest FIVE announcements are shown, the previous ones are deleted.</td>
            <td colspan="3"><a href="<?php echo base_url();?>player_admin/announcement_view/announcements_view">Admin announcements</a></td>
          </tr>
          <tr>
            <td>You can send emails to all, one, or some of the players. Copy will be sent to admin.</td>
            <td colspan="3"><a href="<?php echo base_url();?>player_admin/send_mail">Send an email to players</a></td>
          </tr>
          <tr>
            <td>This will send your mail to ALL users, including anyone not playing in leagues. Copy will be sent to admin.</td>
            <td colspan="3"><a href="<?php echo base_url();?>player_admin/mail_all">Send an email to all</a></td>
          </tr>
        </tbody>
      </table>
  </div>
</div>
<?php } else {
  echo "You are not an admin, so you do not have access to this page <br>";
} ?>
