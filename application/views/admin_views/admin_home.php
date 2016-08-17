<h1>Admin page</h1>
<?php
if(isset($_SESSION['role']))
{ ?>
<!-- successful update message-->
<?php if (isset($message)) { ?>
  <div class="message-box alert alert-success">
    <h3 style="color:green;"><?php echo $message; ?></h3>
    <a href="<?php echo base_url();?>player_admin/crud_view/user_update">Return to update page</a>
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   </div>
<?php $message = ''; } ?>
<!-- repeated email address message-->
<?php if (isset($email_message)) { ?>
<div class="message-box alert alert-danger">
  <h3 style="color:red;"><?php echo $email_message; ?></h3>
  <a href="<?php echo base_url();?>player_admin/crud_view/user_update">Return to update</a>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>
<?php $email_message = '';} ?>
<!-- successful delete message-->
<?php if (isset($delete_message)) { ?>
  <div class="message-box alert alert-success">
    <h3 style="color:green;"><?php echo $delete_message; ?></h3>
    <a href="<?php echo base_url();?>player_admin/crud_view/user_delete">Return to delete page</a>
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   </div>
<?php $delete_message = ''; } ?>
<?php if (isset($leagues_message)) { ?>
 <div class="message-box alert alert-success">
   <h3 style="color:green;"><?php echo $leagues_message; ?></h3>
   <a href="<?php echo base_url();?>player_admin/league_view/leagues_view">Return to league page</a>
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  </div>
<?php $leagues_message = ''; } ?>

<div class="container-fluid">
  <table class="table table-responsive table-bordered">
    <thead>
      <tr><th>Task description</th><th>Link</th></tr>
    </thead>
    <tbody>
      <tr>
        <td>text, text </td>
        <td><a href="<?php echo base_url();?>player_admin/crud_view/user_update">Update a player</a></td>
      </tr>
      <tr>
        <td>text, text </td>
        <td><a href="<?php echo base_url();?>player_admin/crud_view/user_delete">Delete a player</a></td>
      </tr>
      <tr>
        <td>text, text</td>
        <td><a href="<?php echo base_url();?>player_admin/league_view/leagues_view">Update leagues</a></td>
      </tr>
      <tr>
        <td>text, text</td>
        <td><a href="<?php echo base_url();?>player_admin/league_view/results_view">Enter results</a></td>
      </tr>
    </tbody>
  </table>
</div>
<?php } else {
  echo "You are not an admin, so you do not have access to this page";
} ?>
