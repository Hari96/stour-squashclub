<?php
if(isset($_SESSION['role']))
{ ?>
<div class="spacing-sides">
  <?php
  $year = "";
  if(isset($_POST['d_year'])) {
    $year = $_POST['d_year'];
  }
  ?>
<h2>Delete unactivated players</h2>
<p><span class="warning">Note:</span></p>
<p>The list below is players who have not activated since registering.</p>
<p>If someone loses their activation link for some reason, their account will need to be deleted before
  they can re-register with the same email address.</p>
</div>
<br>
<div class="container-fluid">
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr><th>Surname</th><th>First Name</th><th>Email</th><th>SignUp Date</th><th>Remove</th></tr>
      </thead>
      <tbody>
          <?php foreach ($players as $player):
            if ($player['activated'] == 0) {?>
          <tr>
            <td class=""><?php echo $player['lName']; ?></td>
            <td class=""><?php echo $player['fName']; ?></td>
            <td class=""><?php echo $player['email']; ?></td>
            <td class=""><?php echo $player['SignUpDate']; ?></td>
            <td class="delete-submit"><?php $user_id = $player['id']; ?> <a href="<?php echo site_url('delete_users/?user_id='.$user_id); ?>"><button class="btn btn-warning">Delete</button></a></td>
          </tr>
        <?php } endforeach; ?>
      </tbody>
    </table>
  </div>
  <?php } else { ?>
  <div class="spacing-sides">
  <img src="<?php echo base_url();?>images/web-lock.png"><br><br>
  <p class="text-warning">You are not an admin, so you do not have access to this page</p><br>
  <?php } ?>
</div>
