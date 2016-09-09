<h2>Delete player</h2>
<?php
if(isset($_SESSION['role']))
{ ?>
<table class="table table-responsive table-bordered">
  <thead>
    <tr><th>Surname</th><th>First Name</th><th>Email</th><th>Remove</th></tr>
  </thead>
  <tbody>
      <?php foreach ($players as $player): ?>
      <tr>
        <td class=""><?php echo $player['lName']; ?></td>
        <td class=""><?php echo $player['fName']; ?></td>
        <td class=""><?php echo $player['email']; ?></td>
        <td class="delete-submit"><?php $user_id = $player['id']; ?> <a href="<?php echo site_url('delete_users/?user_id='.$user_id);?>"><button class="btn btn-warning">Delete</button></a></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php } else {
  echo "You are not an admin, so you do not have access to this page <br>";
} ?>
