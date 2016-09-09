<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title text-center">Enter a new password</h3>
        </div>
        <div class="panel-body">
          <?php echo form_open('');?>
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
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
