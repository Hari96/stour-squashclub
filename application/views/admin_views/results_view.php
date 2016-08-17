<h1>Enter results</h1>
<?php
if(isset($_SESSION['role']))
{ ?>
<div class="container-fluid">
  <?php echo form_open(''); ?>
  <div class="row">
    <div class="col-md-6">
      <?php
      echo form_label('Year', 'inputYear');
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
    </div>
    <div class="col-md-6">
      <?php
      echo form_label('Month', 'inputMonth');
      $options = array(
        '0' => 'Choose the month',
        '1' => 'Jan',
        '2' => 'Feb',
        '3' => 'Mar',
        '4' => 'Apr',
        '5' => 'May',
        '6' => 'Jun',
        '7' => 'Jul',
        '8' => 'Aug',
        '9' => 'Sep',
        '10' => 'Oct',
        '11' => 'Nov',
        '12' => 'Dec'
      );
      echo form_dropdown('month', $options, 'Choose the month', 'class="form-control"');
      ?>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <h3>DIVISION 1</h3>
      <table class="table table-responsive table-bordered">
        <thead>
          <tr><th>First Player</th><th>Score</th><th>Second Player</th><th>Score</th></tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
    <div class="col-md-6">
      <h3>DIVISION 2</h3>
      <table class="table table-responsive table-bordered">
        <thead>
          <tr><th>First Player</th><th>Score</th><th>Second Player</th><th>Score</th></tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <h3>DIVISION 3</h3>
      <table class="table table-responsive table-bordered">
        <thead>
          <tr><th>First Player</th><th>Score</th><th>Second Player</th><th>Score</th></tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
    <div class="col-md-6">
      <h3>DIVISION 4</h3>
      <table class="table table-responsive table-bordered">
        <thead>
          <tr><th>First Player</th><th>Score</th><th>Second Player</th><th>Score</th></tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <h3>DIVISION 5</h3>
      <table class="table table-responsive table-bordered">
        <thead>
          <tr><th>First Player</th><th>Score</th><th>Second Player</th><th>Score</th></tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
    <div class="col-md-6">
      <h3>DIVISION 6</h3>
      <table class="table table-responsive table-bordered">
        <thead>
          <tr><th>First Player</th><th>Score</th><th>Second Player</th><th>Score</th></tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
  <?php echo form_close(); $c = 1; ?>
  <br>
</div>
<?php } else {
  echo "You are not an admin, so you do not have access to this page";
} ?>
