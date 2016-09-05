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
          <?php echo form_open('lost_password');
          echo form_label('Email or mobile phone number', 'email');
          $data = array(
            'type' => 'text',
            'name' => 'inputEmail',
            'class' => 'form-control',
            'required' => 'required',
            'id' => 'email'
          );
          echo form_input($data);
          ?>
          <br>
          <p>Enter the digits you see below</p>
          <img src="<?php echo base_url();?>assets/php/verificationimage.php?<?php echo rand(0,9999);?>" alt="verification digits, type them in the box" width="80" height="24"><br><br>
          <label>Type numbers</label><br>
          <input name="verif_box" type="text" id="verif_box" style="padding:2px; border:1px solid #CCCCCC; width:180px; height:24px;font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">
          <br><br>
          <?php echo form_submit('forgot_password', 'Continue', 'class="btn btn-primary"');
          echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
