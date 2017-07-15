<?php
if(isset($_SESSION['logged_in'])) {
?>
<?php if ( validation_errors() !== '') {?>
  <div class="message-box alert alert-danger alert-dismissible">
  <p>Update of details failed due to following errors:</p><?php echo validation_errors(); ?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>
<?php } ?>
<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-2">
      <h2> Edit account details </h2>
      <?php echo form_open('user_update'); ?>
      <label class="required-star">indicates required field</label>
      <input type="hidden" name="id" value="<?php echo set_value('id', $id); ?>">
      <div class="form-group">
        <?php
          $attributes = array(
            'class' => 'required'
          );
          echo form_label('First Name', 'inputFirstName', $attributes);
          $data = array(
            'name' => 'inputFirstName',
            'class' => 'form-control',
            'value' => $firstname,
            'required' => 'required'
          );
          echo form_input($data);
          $attributes = array(
            'class' => 'required'
          );
          echo form_label('Last Name', 'inputLastName', $attributes);

          $data = array(
            'name' => 'inputLastName',
            'class' => 'form-control',
            'value' => $lastname,
            'required' => 'required'
          );
          echo form_input($data);
          $attributes = array(
            'class' => 'required'
          );
          echo form_label('Email', 'inputEmail', $attributes);
          $data = array(
            'type' => 'email',
            'name' => 'inputEmail',
            'class' => 'form-control',
            'value' => $email,
            'required' => 'required'
          );
          echo form_input($data);
          echo "<br>";
          echo form_label('New password', 'inputPassword');
          ?>
          <span>&nbsp;&nbsp;(Leave blank if you do not wish to change password)</span><br>
          <span class="smaller"><strong>8, or more, characters please</strong></span>
          <?php
          $data = array(
            'name' => 'inputPassword',
            'class' => 'form-control'
          );
          echo form_password($data);
          $attributes = array(
            'class' => 'required'
          );
          echo form_label('Confirm Password', 'confirmPassword', $attributes);
          ?>
          <span>&nbsp;&nbsp;(Only if changing password)</span>
          <?php
          $data = array(
            'name' => 'confirmPassword',
            'class' => 'form-control'
          );
          echo form_password($data);
          echo form_label('Mobile', 'inputMobile');
          $data = array(
            'type' => 'tel',
            'name' => 'inputMobile',
            'class' => 'form-control',
            'value' => $mobile
          );
          echo form_input($data);
          echo form_label('Landline', 'inputLandline');
          echo "<br>";
          $data = array(
            'type' => 'tel',
            'name' => 'inputLandline',
            'class' => 'form-control',
            'value' => $landline
          );
          echo form_input($data);
          echo "<br>";
          echo form_submit('user-update', 'Update', 'class="btn btn-primary"');
          echo form_reset('user-reset', 'Reset', 'class="btn btn-warning"');
          echo form_button('cancel-reg', 'Cancel', 'class="btn btn-info" id="cancel-reg"');
        ?>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
<?php } ?>
