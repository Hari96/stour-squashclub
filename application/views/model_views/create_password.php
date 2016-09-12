<div class="container-fluid">
  <?php if ( validation_errors() !== '') {?>
  <div class="message-box alert alert-danger alert-dismissible">
  <p>Password creation failed due to following errors:</p><?php echo validation_errors(); ?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    </div>
  <?php } ?>
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title text-center">Enter a new password</h3>
        </div>
        <div class="panel-body">
          <?php echo form_open('new_password');?>
          <input type="hidden" name="id" value="<?php echo set_value('id', $user_id); ?>">
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
          <div class="spacing-top">
            <?php
              echo form_submit('password-create', 'Create', 'class="btn btn-primary"');
              echo form_reset('password-reset', 'Reset', 'class="btn btn-warning"');
              echo form_button('cancel', 'Cancel', 'class="btn btn-info" id="cancel-login"');
            ?>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
