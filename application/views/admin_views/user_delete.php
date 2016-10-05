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
<h2>Delete player</h2>
<p><span class="warning">Note:</span></p>
<p>A player who has not yet activated their account will have 2 stars after the surname. At some stage,
   if they do not activate, you will need to delete them.</p>
<p>If someone loses their activation link for some reason, their account will need to be deleted before
  they can re-register with the same email address.</p>
  <p>DELETING A PLAYER ACCOUNT INVOLVES DELETING ANY PART OF THE DATABASE HOLDING THE PLAYER'S DETAILS, WHICH MEANS THAT ALL PLAYER PROFILES WILL NOW BE BASED ON ONLY LAST TWO YEAR'S RESULTS, SO BE SURE!!</p>
  <p><span class="warning">Also remember:</span></p>
  <p>Players who leave the club <em>MUST NOT</em> be deleted for at least TWO years after they leave.</p>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-5 col-md-offset-4">
      <br><br>
      <p><strong><em>BEFORE YOU DELETE: Choose the current year from the dropdown box, and click Submit.</em></strong></p>
    </div>
    <div class="col-md-3">
  <?php
  echo form_open('');
  echo form_label('Year', 'year');
  $options = array(
    '0' => 'Choose the year',
    '2016' => '2016',
    '2017' => '2017',
    '2018' => '2018',
    '2019' => '2019',
    '2020' => '2020',
    '2021' => '2021',
    '2022' => '2022',
    '2023' => '2023',
    '2024' => '2024',
    '2025' => '2025',
    '2026' => '2026',
    '2027' => '2027'
  );
  $id = 'id="d_year"';
  echo form_dropdown('d_year', $options, 'Choose the year', 'class="form-control"', $id);
  echo "<br>";
  echo "<button type='submit' class='btn btn-info'>Submit</button>";
  echo form_close();
  ?>
  <br>
</div>
</div>
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
            <td class="delete-submit"><?php $user_id = $player['id']; ?> <a href="<?php echo site_url('delete_users/?user_id='.$user_id .', year ='.$year);?>"><button class="btn btn-warning">Delete</button></a></td>
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
