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
<div class="message-box alert alert-danger">
  <h3 style="color:red;"><?php echo $password_changed; ?></h3>
  <a href="<?php echo base_url();?>model_views/view/login">Go to login page</a>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>
<?php $email_message = '';} ?>
<div class="container">
<h2>Home page</h2>
</div>
