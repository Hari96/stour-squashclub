<h1>User details</h1>

<table class="table table-responsive table-bordered">
  <thead>
    <tr><th class="wide">Surname</th><th class="wide">First Name</th><th class="wide">Mobile</th><th class="wide">Land line</th><th class="wider">Email</th><th class="narrow">Age</th><th class="narrow">Level</th><th class="narrow">Update</th><th class="narrow">Remove</th></tr>
  </thead>
  <tbody>
    <?php echo form_open('update_users'); ?>
    <div class="form-group">
      <?php foreach ($players as $player): ?>
      <tr>
        <input type="hidden" name="user_id" value="<?php set_value('user_id', $player['id']); ?>">
        <td class="wide"><input type="text" class="form-control text-center" name="lastName" value="<?php echo set_value('lastName', $player['lName']); ?>"></td>
        <td class="wide"><input type="text" class="form-control text-center" name="firstName" value="<?php echo set_value('firstName', $player['fName']); ?>"></td>
        <td class="wide"><input type="text" class="form-control text-center" name="mobile" value="<?php echo set_value('mobile', $player['mobile']); ?>"></td>
        <td class="wide"><input type="text" class="form-control text-center" name="landline" value="<?php echo set_value('landline', $player['landline']); ?>"></td>
        <td class="wider"><input type="text" class="form-control text-center" name="email" value="<?php echo set_value('email', $player['email']); ?>"></td>
        <td class="narrow"><input type="text" class="form-control text-center" name="age" value="<?php echo set_value('age', $player['age']); ?>"></td>
        <td class="narrow"><input type="text" class="form-control text-center" name="standard" value="<?php echo set_value('standard', $player['standard']); ?>"></td>
        <td class=="narrow"><button type="submit" class="glyphicon glyphicon-ok" aria-hidden="true"></button><span class="sr-only">Update:</span></td>
        <td class="narrow"><button type="submit" class="glyphicon glyphicon-remove" aria-hidden="true"></button><span class="sr-only">Remove:</span></td>
      </tr>
      <?php endforeach; ?>
      </div>
        <?php echo form_close(); ?>
    </tbody>
</table>
