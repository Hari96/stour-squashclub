<h2>Sending mail to all</h2>
<?php
if(isset($_SESSION['role']))
{ ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="form-group">
        <label class="required-star">indicates required field</label>
        <?php
        echo form_open('send_mails');
        $attributes = array(
          'class' => 'required'
        );
        echo form_label('Subject', 'subject', $attributes);
        $data = array(
          'name' => 'subject',
          'class' => 'form-control',
          'required' => 'required',
          'id' => 'subject',
          'maxlength' => '150'
        );
        echo form_input($data);
        echo "<br>";
        echo form_label('Content', 'content', $attributes);
        $data = array(
          'name' => 'content',
          'class' => 'form-control',
          'required' => 'required',
          'id' => 'content',
          'rows' => '8',
          'cols' => '150'
        );
        echo form_textarea($data);
        ?>
        <input type="hidden" name="mail-type" value="all">
      </div>
    </div>
  </div>
  <?php echo form_submit('send_mail', 'Send mail to all', 'class="btn btn-primary pull-right"');
  echo form_close(); ?>
  <?php } else { ?>
  <div class="spacing-sides">
  <img src="<?php echo base_url();?>images/web-lock.png"><br><br>
  <p class="text-warning">You are not an admin, so you do not have access to this page</p><br>
  <?php } ?>
  </div>
</div>
