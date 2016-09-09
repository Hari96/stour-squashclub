<?php if (isset($no_email_message)) { ?>
<div class="message-box alert alert-danger">
  <h3 style="color:red;"><?php echo $no_email_message; ?></h3>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>
<?php $no_email_message = '';} ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title text-center">Password assistance</h3>
        </div>
        <div class="panel-body">
          <p>Enter the email address or mobile number associated with your account</p>
          <?php
          echo form_open('');
          echo form_label('Email or mobile phone number', 'email');
          $data = array(
            'type' => 'text',
            'name' => 'inputEmail',
            'class' => 'form-control',
            'required' => 'required',
            'id' => 'email'
          );
          echo form_input($data);
          echo "<br>";
          echo "<div class='image'>";
          // $image is the index of $data array. which will sent by controller.
          echo $image;
          echo "</div>";
          echo "<br>";
          echo "<a href='#' class ='refresh'><img id = 'ref_symbol' src =".base_url()."img/refresh.png></a>Get new captcha image";

          echo "<br>";
          echo "<br>";

          // Captcha word field.
          echo form_label('Enter letters from above:');
          echo "<br>";
          $data_captcha = array(
            'name' => 'captcha',
            'class' => 'input_box',
            'color' => 'white',
            'placeholder' => '',
            'id' => 'captcha'
          );
          echo form_input($data_captcha);
          echo "<br><br>";
          echo form_submit('forgot_password', 'Continue', 'class="btn btn-primary"');
          echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
