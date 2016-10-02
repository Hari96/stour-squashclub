<h2>Sending mail</h2>
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
        <input type="hidden" name="mail-type" value="players">
      </div>
    </div>
  </div>
  <p><strong>Choose player or players:</strong></p>
  <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead>
          <tr><th>Last Name</th><th>First Name</th><th>Email</th><th>Current division</th><th><label>Tick all&nbsp; </label><input type="checkbox" id="all-email"></th></tr>
        </thead>
        <tbody>
          <?php
          $c = 1;
          foreach ($players as $player):
            $data = array(
              'name' => 'ch' . $c,
              'class' => 'choose',
              'value' => 'y',
              'checked' => false
             );
             ?>
            <tr><td> <input type="text" name="<?php echo 'ln'.$c; ?>" value="<?php echo set_value('ln'.$c, $player['lName']); ?>"></td>
              <td><input type="text" name="<?php echo 'fn'.$c; ?>" value="<?php echo set_value('fn'.$c, $player['fName']); ?>"></td>
              <td><input type="email" name="<?php echo 'mail'.$c; ?>" value="<?php echo set_value('mail'.$c, $player['email']); ?>"></td>
              <td><input type="text" name="<?php echo 'div'.$c; ?>" value="<?php echo set_value('div'.$c, $player['current_league']); ?>"></td>
              <td><?php echo form_checkbox($data); ?></td></tr>
            <?php $c++;
            endforeach;
            ?>
          <input type="hidden" name="num" value="<?php echo $c; ?>">
        </tbody>
      </table>
  </div>
  <div>
  <?php
  echo form_submit('send_mail', 'Send mail', 'class="btn btn-primary pull-right"');
  echo form_close(); ?>
</div>
  <br><br>
  <?php } else { ?>
  <div class="spacing-sides">
  <img src="<?php echo base_url();?>images/web-lock.png"><br><br>
  <p class="text-warning">You are not an admin, so you do not have access to this page</p><br>
  <?php } ?>
  </div>
</div>
