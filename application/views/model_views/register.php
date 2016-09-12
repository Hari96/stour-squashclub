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
<?php if (isset($message)) { ?>
<div class="message-box alert alert-success alert-dismissible">
<h3 style="color:green;"><?php echo $message; ?></h3>
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>
<?php $message = ''; } ?>
<div class="container-fluid">
  <div class="row">
    <section class="col-md-5">
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eu tristique eros. Aliquam posuere turpis sapien, at condimentum ex tincidunt bibendum. Aliquam malesuada, orci in vehicula euismod, lorem lectus eleifend augue, vel sollicitudin ligula turpis quis metus. Nulla pellentesque purus neque, quis dapibus tortor interdum non. Mauris id sem malesuada, pharetra leo id, vulputate est. Cras at diam vehicula, sagittis leo a, blandit neque. Fusce ac lacus ac dolor interdum egestas.

        Suspendisse sollicitudin sapien nulla, eu condimentum enim feugiat et. Etiam hendrerit sagittis pharetra. Sed in justo et nisl hendrerit pulvinar. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris condimentum ex non quam suscipit porta. Vestibulum elementum, erat eu tincidunt aliquet, lorem libero dignissim magna, a varius risus arcu quis ipsum. Vestibulum id sem sit amet justo dapibus sollicitudin. Praesent vestibulum magna vel libero tincidunt posuere id feugiat elit. Mauris massa ligula, posuere a accumsan eget, finibus vitae eros. Nullam pellentesque tempor risus, id malesuada risus sollicitudin a. Curabitur bibendum mattis commodo. Donec non tellus quis metus dictum sodales id non neque. Phasellus non elit venenatis tortor convallis rhoncus.
      </p>
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
                echo form_label('Password', 'password', $attributes);
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
