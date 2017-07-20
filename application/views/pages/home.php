<?php if (isset($results_sent_message)) { ?>
<div class="message-box alert alert-success alert-dismissible">
<h3 style="color:green;"><?php echo $results_sent_message; ?></h3>
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>
<?php $results_sent_message = ''; } ?>
<?php if (isset($reg_message)) { ?>
<div class="message-box alert alert-success alert-dismissible">
<h3 style="color:green;"><?php echo $reg_message; ?></h3>
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>
<?php $reg_message = ''; } ?>
<?php if (isset($success_message)) { ?>
<div class="message-box alert alert-success">
  <h3 style="color:green;"><?php echo $success_message; ?></h3>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>
<?php $success_message = '';} ?>
<?php if (isset($email_message)) { ?>
<div class="message-box alert alert-danger">
  <h3 style="color:red;"><?php echo $email_message; ?></h3>
  <a href="<?php echo base_url();?>user_update/user_account">Return to changing details</a>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>
<?php $email_message = '';} ?>
<?php if (isset($email_changed)) { ?>
<div class="message-box alert alert-danger">
  <h3 style="color:red;"><?php echo $email_changed; ?></h3>
  <a href="<?php echo base_url();?>model_views/view/login">Go to login page</a>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>
<?php $email_message = '';} ?>
<?php if (isset($password_changed)) { ?>
<div class="message-box alert alert-success">
  <h3 style="color:green;"><?php echo $password_changed; ?></h3>
  <a href="<?php echo base_url();?>model_views/view/login">Go to login page</a>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>
<?php $email_message = '';} ?>
<?php if ( validation_errors() !== '') {?>
<div class="message-box alert alert-danger">
  <p>Contacting failed due to following errors:</p><?php echo validation_errors(); ?>
  <a href="<?php echo base_url();?>captcha_contact/form">Return to contact page</a>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>
<?php } ?>
<?php if (isset($message_sent)) { ?>
<div class="message-box alert alert-info">
  <h3 style="color:green;"><?php echo $message_sent; ?></h3>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>
<?php $message_sent = '';} ?>
<?php if (isset($pref_message)) { ?>
<div class="message-box alert alert-info">
  <h3 style="color:green;"><?php echo $pref_message; ?></h3>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>
<?php $message_sent = '';} ?>
<div class="container-fluid">
  <div class="row spacing-sides spacing-top">
    <div class="col-md-4 table-responsive scroll">
      <h3>Admin Announcements</h3>
        <?php echo form_open('');
        foreach ($announcements as $announcement):
        ?>
        <table class="table table-bordered">
        <tr><td><strong>Date:</strong><?php $date = date('d-m-Y', strtotime($announcement['date'])); echo " " . $date; ?></td><td><strong>Title:</strong><?php echo " " . $announcement['title']; ?></td></tr>
        <tr><td colspan="2"><strong>Announcement:</strong><?php echo " " . $announcement['comment']; ?></td></tr>
        </table>
        <hr class="line-style">
        <?php endforeach; echo form_close(); ?>
    </div>
    <div class="col-md-7">
      <div class="well text-center">
        <p>Welcome to the Stour Centre Squash Club, games are played at:</p>
        <p><strong>The Stour Centre, Station Approach, Ashford, Kent, TN23 1ET</strong>.</p>
        <p>Stour Centre reception: <strong>01233 663503</strong>, then press 0 to make a booking.</p>
        <p>If you are a member of the Stour Centre you should be able to check availability, and book via: <br><a class="larger" href="https://ashfordleisuretrust.leisurecloud.net/Connect/mrmlogin.aspx">Ashford Leisure Trust</a></p>
        </div>
      <br>
      <p>You are welcome to join this site by <a href="<?php echo base_url();?>model_views/view/register">signing up</a>, where you will be asked for a live email address and a password as a minimum.</p>
      <p>After signing up, an activation link will be sent to your email address - once you have activated your acount you will be able
      to login and view the full site.</p>
      <br>
      <p>When signing up you can choose whether you wish to be included in future competitions.</p>
      <p>Once you are activated the admin will automatically be informed and, if you have opted to be included in competitions,
      the admin will include you in a future league.</p>
      <p>Initially you will be placed in a lower league but please see:
      <a href="<?php echo base_url(); ?>pages/view/details">General Details</a> for information about possibly joining a higher league.</p>
      <br>
      <h3>Coaching</h3>
      Coaching takes place regularly on a Saturday - details to follow.
    </div>
  </div>
</div>
