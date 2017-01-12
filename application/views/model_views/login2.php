<h2>Login Page</h2>
<?php if ( validation_errors() !== '') {?>
<div class="message-box alert alert-danger alert-dismissible">
  <p>Login failed due to following errors:</p><?php echo validation_errors(); ?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>
<?php } ?>
<?php if (isset($activation_message)) { ?>
<div class="message-box alert alert-info alert-dismissible">
  <h3 style="color:green;"><?php echo $activation_message; ?></h3>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>
<?php $activation_message = '';} ?>
<?php if (isset($no_email_message)) { ?>
<div class="message-box alert alert-danger alert-dismissible">
  <h3 style="color:red;"><?php echo $no_email_message; ?></h3>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>
<?php $no_email_message = '';} ?>
<?php if (isset($wrong_password_message)) { ?>
<div class="message-box alert alert-danger alert-dismissible">
  <h3 style="color:red;"><?php echo $wrong_password_message; ?></h3>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>
<?php $wrong_password_message = '';} ?>
<?php if (isset($changed_password)) { ?>
  <div class="message-box alert alert-success alert-dismissible">
    <p><?php echo $changed_password; ?></p>
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  </div>
  <?php $changed_password = ''; } ?>
  <?php if (isset($email_sent)) { ?>
  <div class="message-box alert alert-info alert-dismissible">
    <h3 style="color:green;"><?php echo $email_sent; ?></h3>
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  </div>
  <?php $email_sent = '';} ?>
  <?php if (isset($email_wrong)) { ?>
  <div class="message-box alert alert-danger alert-dismissible">
    <h3 style="color:red;"><?php echo $email_wrong; ?></h3>
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  </div>
  <?php $email_wrong = '';} ?>
  <?php if (isset($not_activated_message)) { ?>
  <div class="message-box alert alert-danger alert-dismissible">
    <h3 style="color:red;"><?php echo $not_activated_message; ?></h3>
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  </div>
  <?php $not_activated_message = '';} ?>
<div class="container-fluid">
  <div class="row">
    <section class="col-md-6">
      <p>
        Once you have signed up and activated your account you may login and use the site.
        If you have not yet registered then please visit the <a href="<?php echo base_url();?>model_views/view/register">Signup Page</a>.
      </p>
      <p>To register you need to provide your name, an active email address and a password. Your password needs to be a minimum of 8,
        and a maximum of 25, characters long.
      </p>
      <p>
      After completing the registration process you will need to activate your account by clicking on the link which will be sent to your
      email address.
      </p>
    </section>
    <section class="col-md-6">
      <?php echo form_open('user_login'); ?>
      <label class="required-star">indicates required field</label>
      <div class="form-group">
        <div class="spacing-bottom">
          <?php
            $attributes = array(
              'class' => 'required'
            );
            echo form_label('Email', 'inputEmail', $attributes);
            $data = array(
              'type' => 'email',
              'name' => 'inputEmail',
              'class' => 'form-control',
              'required' => 'required',
              'value' => $email
            );
            echo form_input($data);
          ?>
      </div>
      <div class="spacing-bottom">
        <?php
          $attributes = array(
            'class' => 'required'
          );
          echo form_label('Password', 'inputPassword', $attributes);
          $data = array(
            'name' => 'inputPassword',
            'class' => 'form-control',
            'required' => 'required'
          );
          echo form_password($data);
        ?>
      </div>
        <?php
          $attributes = array(
            'class' => 'required'
          );
          echo form_label('Confirm Password', 'confirmPassword', $attributes);
          $data = array(
            'name' => 'confirmPassword',
            'class' => 'form-control',
            'required' => 'required'
          );
          echo form_password($data);
        ?>
        <a href="<?php echo base_url();?>captcha_password/form" style="color:red; font-size: 1.1rem;">I forgot my password</a><br>
        <div class="spacing-top">

          <?php
            echo form_submit('user-login', 'Login', 'class="btn btn-primary"');
            echo form_reset('user-reset', 'Reset', 'class="btn btn-warning"');
            echo form_button('cancel-reg', 'Cancel', 'class="btn btn-info" id="cancel-login"');
          ?>
        </div>
      </div>
      <?php echo form_close(); ?>
    </section>
  </div>
</div>
