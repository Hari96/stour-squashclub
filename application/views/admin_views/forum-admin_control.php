<h2>Creating new Forum admin</h2>
<?php
if(isset($_SESSION['role']))
{ ?>
<div class="container-fluid">
  <?php
  echo form_open('forum_admin_control');
  $count = 0;
  foreach ($forum_members as $forum_member):
    if ($forum_member['groupid'] == 1) {//one admin is website owner/designer
      $count++;
    }
  endforeach;
  if ($count == 2) {
    ?>
    <input type= "hidden" name="admin_choice" value="d">
    <?php
    echo form_submit('del_admin', 'Unset Admin', 'class="btn btn-primary pull-right"');
  } else {
    ?>
    <input type="hidden" name="admin_choice" value="c">
    <?php
    echo form_submit('new_admin', 'Create New Forum Admin', 'class="btn btn-primary pull-right"');
        }
  ?>
  <br clear="all"><br>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <p><span class="admin-star">*</span>&nbsp;Admin</p>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr><th>Last Name</th><th>First Name</th><th>Choose</th></tr>
          </thead>
          <tbody>
            <?php
            $c = 1;
            foreach ($players as $player):
              $data = array(
                'name' => 'admin',
                'class' => 'admin',
                'value' => 'ch'.$c
              );
              $groupid = 0;
              foreach ($forum_members as $forum_member):
                if ($forum_member['username'] == $player['email']) {
                  $groupid = $forum_member['groupid'];
                }
              endforeach;
            ?>
            <tr>
              <td><input type="text" name="<?php echo 'ln'.$c; ?>" value="<?php echo set_value('ln'.$c, $player['lName']); ?>"><?php if ($groupid == 1) { echo "<span class='admin-star'>&nbsp;*</span>"; } ?></td>
              <td> <input type="text" name="<?php echo 'fn'.$c; ?>" value="<?php echo set_value('fn'.$c, $player['fName']); ?>"></td>
              <td><?php echo form_radio($data); ?></td></tr>
              <?php $id = 'ch' .$c; ?>
              <input type="hidden" name="<?php echo $id; ?>" value="<?php echo set_value('$id', $player['email']); ?>">
            </tr>
          <?php $c++; endforeach; ?>
          <input type="hidden" name="num" value="<?php echo $c; ?>">
          </tbody>
        </table>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>


  <?php } else { ?>
  <div class="spacing-sides">
  <img src="<?php echo base_url();?>images/web-lock.png"><br><br>
  <p class="text-warning">You are not an admin, so you do not have access to this page</p><br>
  <?php } ?>
  </div>
</div>
