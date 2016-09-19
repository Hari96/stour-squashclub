<?php if (isset($success_message)) { ?>
<div class="message-box alert alert-success">
  <h3 style="color:green;"><?php echo $success_message; ?></h3>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>
<?php $success_message = '';} ?>
<?php if (isset($email_message)) { ?>
<div class="message-box alert alert-danger">
  <h3 style="color:red;"><?php echo $email_message; ?></h3>
  <a href="<?php echo base_url();?>user_update/user_account">Return to changing details</a>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>
<?php $email_message = '';} ?>
<?php if (isset($email_changed)) { ?>
<div class="message-box alert alert-danger">
  <h3 style="color:red;"><?php echo $email_changed; ?></h3>
  <a href="<?php echo base_url();?>model_views/view/login">Go to login page</a>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>
<?php $email_message = '';} ?>
<?php if (isset($password_changed)) { ?>
<div class="message-box alert alert-danger">
  <h3 style="color:red;"><?php echo $password_changed; ?></h3>
  <a href="<?php echo base_url();?>model_views/view/login">Go to login page</a>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>
<?php $email_message = '';} ?>
<?php if ( validation_errors() !== '') {?>
<div class="message-box alert alert-danger">
  <p>Contacting failed due to following errors:</p><?php echo validation_errors(); ?>
  <a href="<?php echo base_url();?>captcha_contact/form">Return to contact page</a>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>
<?php } ?>
<?php if (isset($message_sent)) { ?>
<div class="message-box alert alert-info">
  <h3 style="color:green;"><?php echo $message_sent ?></h3>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>
<?php $message_sent = '';} ?>
<h2>Home page</h2>
<div class="container-fluid">
<div class="row spacing-sides">
  <div class="col-md-4 table-responsive">
    <h3>Admin Announcements</h3>
      <?php echo form_open('');
      foreach ($announcements as $announcement):
      ?>
      <table class="table table-bordered">
      <tr><td><strong>Date:</strong><?php $date = date('d-m-Y', strtotime($announcement['date'])); echo " " . $date; ?></td><td><strong>Title:</strong><?php echo " " . $announcement['title']; ?></td></tr>
      <tr><td colspan="2"><strong>Announcement:</strong><?php echo " " . $announcement['comment']; ?></td></tr>
      </table>
      <hr class="line-style">
      <?php endforeach; echo form_close(); ?>
  </div>
  <div class="col-mod-8">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere dictum leo, eget iaculis velit facilisis ut. Nulla mattis magna vel lacus gravida elementum condimentum et justo. Donec sed nibh enim. Fusce blandit diam congue mi finibus, id fermentum nisi scelerisque. Morbi at nisl neque. Donec eget nunc non erat cursus aliquet non sit amet quam. Donec quis commodo urna. Curabitur sollicitudin tincidunt sem, sed ultrices sapien faucibus sit amet. In consectetur aliquam ante eget volutpat. In hac habitasse platea dictumst. Nullam nec tincidunt nunc. Mauris scelerisque urna nec dui elementum sagittis.

Etiam auctor pellentesque magna, a ultrices neque fringilla et. Aenean vitae turpis a tellus sodales ornare ut sed felis. Curabitur tristique blandit diam vitae scelerisque. Quisque et condimentum eros, id consectetur nibh. Cras vel condimentum nulla. Vestibulum posuere turpis id risus commodo, ut congue nisi tempus. Vivamus sollicitudin erat vel tortor aliquam placerat. Aliquam sed ornare nibh. Curabitur finibus placerat nibh, sit amet sagittis felis tincidunt vitae. Mauris vulputate tellus vitae ex blandit, non varius elit faucibus.

Praesent blandit nulla finibus sapien tincidunt, sit amet malesuada dui dignissim. Mauris eu risus a lorem laoreet tincidunt. Pellentesque dignissim mi metus, a interdum metus dignissim sed. Phasellus eget nibh justo. Sed venenatis erat nunc, ut posuere quam maximus lobortis. Duis semper facilisis lacinia. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eget ante et nisl tincidunt imperdiet a ac eros. Sed ornare semper metus, nec egestas velit. Sed gravida efficitur fringilla. Nam tincidunt libero quam, vel rhoncus neque dignissim ac. Curabitur eget elementum sapien. Quisque eu ipsum dolor. Morbi sit amet ligula ornare, dictum orci in, condimentum tellus. Integer mollis augue est, eu condimentum augue bibendum a.

  </div>
</div>
</div>
