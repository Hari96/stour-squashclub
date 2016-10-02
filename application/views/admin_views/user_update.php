<h2>Update players</h2>
<?php
if(isset($_SESSION['role']))
{ ?>
<div class="container-fluid">
  <?php if ( validation_errors() !== '') { ?>
  <div class="message-box alert alert-danger alert-dismissible"><p>Update failed due to following errors:</p>
    <h3 style="color:red;"><?php echo validation_errors(); ?></h3>
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  </div>
  <?php } ?>
  <div class="table-responsive">
    <table class="table table-bordered table-striped">
      <thead>
        <tr><th class="wide">Surname</th><th class="wide">First Name</th><th class="wide">Mobile</th><th class="wider">Email</th><th class="narrow">Update</th></tr>
      </thead>
      <tbody>
          <?php foreach ($players as $player): ?>
            <?php echo form_open('update_users'); ?>
            <div class="form-group">
              <tr>
                <input type="hidden" name="user_id" value="<?php echo set_value('user_id', $player['id']); ?>">
                <td class="wide"><input type="text" class="form-control text-center" name="lastName" value="<?php echo set_value('lastName', $player['lName']); ?>"></td>
                <td class="wide"><input type="text" class="form-control text-center" name="firstName" value="<?php echo set_value('firstName', $player['fName']); ?>"></td>
                <td class="wide"><input type="text" class="form-control text-center" name="mobile" value="<?php echo set_value('mobile', $player['mobile']); ?>"></td>
                <td class="wider"><input type="text" class="form-control text-center" name="email" value="<?php echo set_value('email', $player['email']); ?>"></td>
                <td class=="narrow"><button type="submit" class="glyphicon glyphicon-ok" aria-hidden="true"></button><span class="sr-only">Update:</span></td>
              </tr>
            </div>
          <?php echo form_close(); ?>
          <?php endforeach; ?>
        </tbody>
    </table>
  </div>
  <?php } else { ?>
  <div class="spacing-sides">
  <img src="<?php echo base_url();?>images/web-lock.png"><br><br>
  <p class="text-warning">You are not an admin, so you do not have access to this page</p><br>
  <?php } ?>
</div>
