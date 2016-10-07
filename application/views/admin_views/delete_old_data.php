<?php
if(isset($_SESSION['role']))
{ ?>
<h2>Deleting old data</h2>
<div class="container-fluid">
  <?php if ( validation_errors() !== '') { ?>
  <div class="message-box alert alert-danger alert-dismissible"><p>Delete failed due to following errors:</p>
    <h3 style="color:red;"><?php echo validation_errors(); ?></h3>
    <a href="#" class="close" data-dismiss="alert" aria-label="close">Close &times;</a>
  </div>
  <?php } ?>
  <?php if (isset($wrong_year_message)) { ?>
  <div class="message-box alert alert-danger alert-dismissible">
    <h3 style="color:red;"><?php echo $wrong_year_message; ?></h3>
    <a href="#" class="close" data-dismiss="alert" aria-label="close">Close &times;</a>
  </div>
  <?php $wrong_year_message = '';} ?>
  <?php if (isset($not_ready_message)) { ?>
  <div class="message-box alert alert-info alert-dismissible">
    <h3 style="color:green;"><?php echo $not_ready_message; ?></h3>
    <a href="#" class="close" data-dismiss="alert" aria-label="close">Close &times;</a>
  </div>
  <?php $not_ready_message = '';} ?>
      <?php
      echo form_open('delete_old_data');
      $date = date('Y-m-d');
      $year = date('Y', strtotime($date));
      echo "<strong>Current Year is: " . $year . "</strong><br><br>";
      ?>
  <label class="required-star">indicates required field</label>
  <br>
  <div>
    <p class="warning">Choose the year you wish to delete before - this action will delete ALL data <strong><em>before</em></strong> the year you choose.</p>
  </div>
  <div class="row">
    <div class="col-md-6">
      <?php
      $attributes = array(
        'class' => 'required'
      );
      echo form_label('Year', 'year', $attributes);
      $options = array(
        '0' => 'Choose the year',
        $year - 2 => $year - 2,
        $year - 3 => $year - 3,
        $year - 4 => $year - 4,
        $year - 5 => $year - 5,
        $year - 6 => $year - 6
      );
      $id = 'id="year"';
      echo form_dropdown('year', $options, 'Choose the year', 'class="form-control"', $id);
      ?>
    </div>
    <div class="col-md-6">
      <br>
      <?php
      $data = array(
        'id' => 'del_old_data',
        'type' => 'submit',
        'content' => 'Delete chosen data',
        'class' => 'btn btn-lg btn-danger pull-left'
      );
      echo form_button($data);
      ?>
    </div>
  </div>
  <br>
  <?php echo form_close(); ?>
</div>
<?php } else { ?>
<div class="spacing-sides">
<img src="<?php echo base_url();?>images/web-lock.png"><br><br>
<p class="text-warning">You are not an admin, so you do not have access to this page</p><br>
<?php } ?>
</div>
