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
    <table class="table table-bordered">
      <thead>
        <tr><th class="wide">Surname</th><th class="wide">First Name</th><th class="wide">Land line</th><th class="narrow">Age</th><th class="narrow">Level</th><th class="narrow">Active?</th><th class="narrow">Update</th></tr>
      </thead>
      <tbody>
          <?php foreach ($players as $player): ?>
            <?php echo form_open('update_users2'); ?>
            <div class="form-group">
              <tr>
                <input type="hidden" name="user_id" value="<?php echo set_value('user_id', $player['id']); ?>">
                <td class="wide"><input type="text" class="form-control text-center" name="lastName" value="<?php echo set_value('lastName', $player['lName']); ?>"></td>
                <td class="wide"><input type="text" class="form-control text-center" name="firstName" value="<?php echo set_value('firstName', $player['fName']); ?>"></td>
                <td class="wide"><input type="text" class="form-control text-center" name="landline" value="<?php echo set_value('landline', $player['landline']); ?>"></td>
                <td class="narrow"><input type="text" class="form-control text-center" name="age" value="<?php echo set_value('age', $player['age']); ?>"></td>
                <td class="narrow"><input type="text" class="form-control text-center" name="standard" value="<?php echo set_value('standard', $player['standard']); ?>"></td>
                <?php if ($player['active'] == 1) {
                              $active = "Yes";
                            } else {
                              $active = "No";
                            }
                   ?>
                <td>
                  <?php
                  $options = array(
                    'Yes' => 'Yes',
                    'No' => 'No'
                  );
                  echo form_dropdown('activated', $options, $active, 'class="form-control"')
                  ?>
                </td>
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
