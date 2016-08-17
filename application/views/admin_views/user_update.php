<h1>Update players</h1>
<?php
if(isset($_SESSION['role']))
{ ?>
<div class="container-fluid">
  <?php if ( validation_errors() !== '') {?>
<div style="color:red;"><p>Update failed due to following errors:</p><?php echo validation_errors(); ?></div>
<?php } ?>

<table class="table table-responsive table-bordered">
  <thead>
    <tr><th class="wide">Surname</th><th class="wide">First Name</th><th class="wide">Mobile</th><th class="wide">Land line</th><th class="wider">Email</th><th class="narrow">Age</th><th class="narrow">Level</th><th class="narrow">Update</th></tr>
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
            <td class="wide"><input type="text" class="form-control text-center" name="landline" value="<?php echo set_value('landline', $player['landline']); ?>"></td>
            <td class="wider"><input type="text" class="form-control text-center" name="email" value="<?php echo set_value('email', $player['email']); ?>"></td>
            <td class="narrow"><input type="text" class="form-control text-center" name="age" value="<?php echo set_value('age', $player['age']); ?>"></td>
            <td class="narrow"><input type="text" class="form-control text-center" name="standard" value="<?php echo set_value('standard', $player['standard']); ?>"></td>
            <td class=="narrow"><button type="submit" class="glyphicon glyphicon-ok" aria-hidden="true"></button><span class="sr-only">Update:</span></td>
          </tr>
      </div>
      <?php echo form_close(); ?>
      <?php endforeach; ?>

    </tbody>
</table>
</div>
<?php } else {
  echo "You are not an admin, so you do not have access to this page";
} ?>
