<?php
if(isset($_SESSION['role']))
{ ?>
<div class="spacing-sides">
<h2>Delete player</h2>
<p><span class="warning">Note:</span></p>
<p>A player who has not yet activated their account will have 2 stars after the surname. At some stage,
   if they do not activate, you will need to delete them.</p>
<p>If someone loses their activation link for some reason, their account will need to be deleted before
  they can re-register with the same email address.</p>
  <p><span class="warning">Also remember:</span></p>
  <p>Players who leave the club must not be deleted for at least TWO years.</p>
</div>
<div class="container-fluid">
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr><th>Surname</th><th>First Name</th><th>Email</th><th>Remove</th></tr>
      </thead>
      <tbody>
          <?php foreach ($players as $player): ?>
          <tr>
            <td class=""><?php echo $player['lName']; if ($player['activated'] == 0) {echo "<span class='not-activated-star'>**</span>"; }?></td>
            <td class=""><?php echo $player['fName']; ?></td>
            <td class=""><?php echo $player['email']; ?></td>
            <td class="delete-submit"><?php $user_id = $player['id']; ?> <a href="<?php echo site_url('delete_users/?user_id='.$user_id);?>"><button class="btn btn-warning">Delete</button></a></td>
          </tr>
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
