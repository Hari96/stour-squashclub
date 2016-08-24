<h1>Admin page</h1>
<?php
if(isset($_SESSION['role']))
{
  if ( validation_errors() !== '') {?>
  <div class="message-box alert alert-danger"><p><?php echo $val_message ?></p>
    <?php echo validation_errors(); ?>
    <a href="<?php echo base_url(); echo $val_direct; ?>"> <?php echo $val_amessage; ?></a>
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  </div>
  <?php } ?>
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
<?php if (isset($divtoolarge_message)) { ?>
 <div class="message-box alert alert-danger">
   <h3 style="color:red;"><?php echo $divtoolarge_message; ?></h3>
   <a href="<?php echo base_url();?>player_admin/league_view/leagues_view">Return to league page</a>
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  </div>
<?php $divtoolarge_message = ''; } ?>
<?php if (isset($results_message)) { ?>
 <div class="message-box alert alert-success">
   <h3 style="color:green;"><?php echo $results_message; ?></h3>
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  </div>
<?php $results_message = ''; } ?>

<div class="container-fluid">
  <table class="table table-responsive table-bordered">
    <thead>
      <tr><th>Task description</th><th colspan="3">Link</th></tr>
    </thead>
    <tbody>
      <tr>
        <td>text, text, text, text, text, text  </td>
        <td colspan="3"><a href="<?php echo base_url();?>player_admin/crud_view/user_update">Update a player</a></td>
      </tr>
      <tr>
        <td>text, text </td>
        <td colspan="3"><a href="<?php echo base_url();?>player_admin/crud_view/user_delete">Delete a player</a></td>
      </tr>
      <tr>
        <td>text, text</td>
        <td colspan="3"><a href="<?php echo base_url();?>player_admin/league_view/leagues_view">Start new leagues</a></td>
      </tr>
      <tr>
        <td>text, text</td>
        <?php echo form_open('results_hub');?>
        <td>
          <?php
          echo form_label('Choose Year:', 'inputYear');
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
          echo form_dropdown('year', $options, 'Choose the year', 'class="form-control"');
          ?>
        </td>
        <td>
          <?php
          echo form_label('Choose Month:', 'inputMonth');
          $options = array(
            '0' => 'Choose the month',
            'jan' => 'Jan',
            'feb' => 'Feb',
            'mar' => 'Mar',
            'apr' => 'Apr',
            'may' => 'May',
            'jun' => 'Jun',
            'jul' => 'Jul',
            'aug' => 'Aug',
            'sep' => 'Sep',
            'oct' => 'Oct',
            'nov' => 'Nov',
            'dec' => 'Dec'
          );
          echo form_dropdown('month', $options, 'Choose the month', 'class="form-control"');
          ?>
        </td>
        <td>
          <?php
          $data = array(
            'id' => 'yearmonth',
            'type' => 'submit',
            'content' => 'Show results',
            'class' => 'btn btn-info'
          );
          echo form_button($data);
          ?>
        </td>
        <?php echo form_close(); ?>
      </tr>
    </tbody>
  </table>
</div>
<?php } else {
  echo "You are not an admin, so you do not have access to this page <br>";
} ?>
