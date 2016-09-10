<h2>Login Page</h2>
<div class="container">
  <div class="row">
    <section class="col-md-6">
      <?php if ( validation_errors() !== '') {?>
      <div class="message-box alert alert-danger">
        <p>Login failed due to following errors:</p><?php echo validation_errors(); ?>
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      </div>
      <?php } ?>
      <?php if (isset($activation_message)) { ?>
      <div class="message-box alert alert-info">
        <h3 style="color:green;"><?php echo $activation_message; ?></h3>
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      </div>
      <?php $activation_message = '';} ?>
      <?php if (isset($no_email_message)) { ?>
      <div class="message-box alert alert-danger">
        <h3 style="color:red;"><?php echo $no_email_message; ?></h3>
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      </div>
      <?php $no_email_message = '';} ?>
      <?php if (isset($wrong_password_message)) { ?>
      <div class="message-box alert alert-danger">
        <h3 style="color:red;"><?php echo $wrong_password_message; ?></h3>
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      </div>
      <?php $wrong_password_message = '';} ?>
      <?php if (isset($changed_password)) { ?>
        <div class="message-box alert alert-success">
          <p><?php echo $changed_password; ?></p>
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        </div>
        <?php $changed_password = ''; } ?>
        <?php if (isset($email_sent)) { ?>
        <div class="message-box alert alert-info">
          <h3 style="color:green;"><?php echo $email_sent; ?></h3>
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        </div>
        <?php $email_sent = '';} ?>
      <p>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eu tristique eros. Aliquam posuere turpis sapien, at condimentum ex tincidunt bibendum. Aliquam malesuada, orci in vehicula euismod, lorem lectus eleifend augue, vel sollicitudin ligula turpis quis metus. Nulla pellentesque purus neque, quis dapibus tortor interdum non. Mauris id sem malesuada, pharetra leo id, vulputate est. Cras at diam vehicula, sagittis leo a, blandit neque. Fusce ac lacus ac dolor interdum egestas.

      Suspendisse sollicitudin sapien nulla, eu condimentum enim feugiat et. Etiam hendrerit sagittis pharetra. Sed in justo et nisl hendrerit pulvinar. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris condimentum ex non quam suscipit porta. Vestibulum elementum, erat eu tincidunt aliquet, lorem libero dignissim magna, a varius risus arcu quis ipsum. Vestibulum id sem sit amet justo dapibus sollicitudin. Praesent vestibulum magna vel libero tincidunt posuere id feugiat elit. Mauris massa ligula, posuere a accumsan eget, finibus vitae eros. Nullam pellentesque tempor risus, id malesuada risus sollicitudin a. Curabitur bibendum mattis commodo. Donec non tellus quis metus dictum sodales id non neque. Phasellus non elit venenatis tortor convallis rhoncus.
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
              'required' => 'required'
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
        <a href="<?php echo base_url();?>captcha_controller/form" style="color:red; font-size: 1.1rem;">I forgot my password</a><br>
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
