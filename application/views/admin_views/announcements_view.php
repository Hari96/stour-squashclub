<h2>Admin announcements</h2>
<?php
if(isset($_SESSION['role']))
  { ?>
<div class="container-fluid">
  <?php echo form_open('admin_announcements');
  $data = array(
    'id' => 'latest',
    'type' => 'submit',
    'content' => 'Submit Latest Announcement',
    'class' => 'btn btn-info'
  );
  echo form_button($data);
  ?>
  <br><br>
  <div class="table-responsive">
    <table class="table table-bordered">
      <tr><td><input type="text" name="title1" size="50"></td><td><textarea name="content1" rows="5" cols="50"></textarea></td></tr>
      <tr><td colspan="2">Recent announcements</td></tr>
      <?php $c = 2; foreach ($comments as $comment):
      $title = "title" . $c;
      $content = "content" . $c;
      ?>
      <tr><td><input type="text" name="<?php echo $title; ?>" size="50" value="<?php echo $comment['title']; ?>"></td>
      <td><textarea name="<?php echo $content; ?>" rows="5" cols="50"><?php echo $comment['comment']; ?></textarea></td></tr>
    <?php $c++; endforeach; ?>
    </table>
  </div>
  <?php echo form_close(); ?>
</div>

<?php } else {
  echo "You are not an admin, so you do not have access to this page <br>";
} ?>
