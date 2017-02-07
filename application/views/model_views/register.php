<h2>Register Page</h2>
<?php if ( validation_errors() !== '') { ?>
<div class="message-box alert alert-danger alert-dismissible"><p>Registration failed due to following errors:</p>
  <h3 style="color:red;"><?php echo validation_errors(); ?></h3>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>
<?php } ?>
<?php if (isset($email_message)) { ?>
<div class="message-box alert alert-danger alert-dismissible">
<h3 style="color:red;"><?php echo $email_message; ?></h3>
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>
<?php $email_message = '';} ?>
<div class="container-fluid">
  <div class="row">
    <section class="col-md-5">
      <p>Welcome to our registration page. If you are wanting to play squash regularly, whatever your standard, please register.</p>
      <p>By registering you will be able to login to gain access to our forum and see contact details for any opponents</p>
      <p><strong>Important:</strong></p>
      <ul>
        <li>Please include a mobile number. It is not a compulsory part of registering but is the main (and the most convenient) way for players to communicate with each other.</li>
        <li>You don't necessarily have to play in one of our leagues when you register, you can <em>opt not to be in a league</em>, at least initially, by <strong><em>unchecking</em></strong> the option at bottom of the form.</li>
        <li>If you are brand new to the club you may wish to give an indication of your standard (definitely not necessary). Please look at <a href="<?php echo base_url();?>pages/view/details">The details page</a> to help decide which number to use.</li>
      </ul>
      <p>After registering you will be sent an activation link to the provided email address. Once you have clicked on this link you will be able to login.</p>
      <p>If you want to visit the forum, you can login using your email address as your username.</p>
    </section><!--end of left hand section-->
    <section class="col-md-7">
      <?php echo form_open('insert_users'); ?>
        <div class="form-group">
          <label class="required-star">indicates required field</label>
          <div class="row spacing-bottom">
            <div class="col-md-6">
              <?php
                $attributes = array(
                  'class' => 'required'
                );
                echo form_label('First Name', 'firstName', $attributes);
                $data = array(
                  'name' => 'inputFirstName',
                  'class' => 'form-control',
                  'required' => 'required',
                  'id' => 'firstName'
                );
                echo form_input($data);
              ?>
            </div>
            <div class="col-md-6">
              <?php
                $attributes = array(
                  'class' => 'required'
                );
                echo form_label('Last Name', 'lastName', $attributes);
                $data = array(
                  'name' => 'inputLastName',
                  'class' => 'form-control',
                  'required' => 'required',
                  'id' => 'lastName'
                );
                echo form_input($data);
              ?>
            </div>
          </div>
          <div class="row spacing-bottom">
            <div class="col-md-12">
              <?php
                $attributes = array(
                  'class' => 'required'
                );
                echo form_label('Email', 'email', $attributes);
                $data = array(
                  'type' => 'email',
                  'name' => 'inputEmail',
                  'class' => 'form-control',
                  'required' => 'required',
                  'id' => 'email'
                );
                echo form_input($data);
              ?>
            </div>
          </div>
          <div class="row spacing-bottom">
            <div class="col-md-6">
              <?php
                $attributes = array(
                  'class' => 'required',
                  'for' => 'password'
                );
                echo form_label('Password (8 or more characters)', 'password', $attributes);
                $data = array(
                  'name' => 'inputPassword',
                  'class' => 'form-control',
                  'required' => 'required',
                  'id' => 'password'
                );
                echo form_password($data);
              ?>
            </div>
            <div class="col-md-6">
              <?php
                $attributes = array(
                  'class' => 'required'
                );
                echo form_label('Confirm Password', 'confirmPassword', $attributes);
                $data = array(
                  'name' => 'confirmPassword',
                  'class' => 'form-control',
                  'required' => 'required',
                  'id' => 'confirmPassword'
                );
                echo form_password($data);
              ?>
            </div>
          </div>
          <div class="row spacing-bottom">
            <div class="col-md-6">
              <?php
                echo form_label('Mobile', 'mobile');
                $data = array(
                  'type' => 'tel',
                  'name' => 'inputMobile',
                  'class' => 'form-control',
                  'id' => 'mobile'
                );
                echo form_input($data);
              ?>
            </div>
            <div class="col-md-6">
              <?php
                echo form_label('Landline', 'landline');
                $data = array(
                  'type' => 'tel',
                  'name' => 'inputLandline',
                  'class' => 'form-control',
                  'id' => 'landline'
                );
                echo form_input($data);
              ?>
            </div>
          </div>
          <div class="row spacing-bottom">
            <div class="col-md-6">
              <?php
                echo form_label('Age Group', 'age');
                $options = array(
                  '0' => 'Choose your age group',
                  '1' => 'Under 16',
                  '2' => '16 - Under 40',
                  '3' => '40 - Under 60',
                  '4' => '60 or Over 60'
                );
                $id = 'id = "age"';
                echo form_dropdown('age', $options, 'Choose your age group', 'class="form-control"', $id);
              ?>
            </div>
            <div class=col-md-6>
              <?php
                echo form_label('Standard', 'standard');
                $options = array(
                  '0' => 'Choose your standard',
                  '1' => '1',
                  '2' => '2',
                  '3' => '3',
                  '4' => '4'
                );
                $id = 'id="standard"';
                echo form_dropdown('standard', $options, 'Choose your standard', 'class="form-control"', $id);
              ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <span><strong>Please <em>uncheck</em> if you DO NOT wish to be included in the league for next session:</strong></span>
              <?php
              $data = array(
               'name' => 'league_player',
               'value' => 'league',
               'checked' => TRUE
             );
             echo form_checkbox($data);
             ?>
            </div>
          </div>
          <div class="spacing-top">
            <?php
              echo form_submit('user-submit', 'Submit', 'class="btn btn-primary"');
              echo form_reset('user-reset', 'Reset', 'class="btn btn-warning"');
              echo form_button('cancel-reg', 'Cancel', 'class="btn btn-info" id="cancel-reg"');
            ?>
          </div>
        </div>
      <?php echo form_close(); ?>
    </section><!--end of form section-->

  </div>
<div>
