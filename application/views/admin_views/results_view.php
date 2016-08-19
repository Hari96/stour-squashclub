<h1>Enter results</h1>
<?php
if(isset($_SESSION['role']))
{ ?>
<div class="container-fluid">
  <?php echo form_open('results_hub'); ?>
  <div class="row">
    <div class="col-md-3">
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
    <div class="col-md-3">
      <?php
      echo form_label('Month', 'inputMonth');
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
    </div>
    <div class="col-md-6">
      <?php
      $attributes = array(
        'class' => 'emphasis'
      );
      echo form_label('Click to display divisions', 'month_year', $attributes);
      echo "<br>";
      $data = array(
        'id' => 'month_year',
        'type' => 'submit',
        'content' => 'Display',
        'class' => 'btn btn-info'
      );
      echo form_button($data);
      ?>
    </div>
  </div>
  <?php echo form_close(); ?>
  <div class="row">
    <div class="col-md-6">
      <h3>DIVISION 1</h3>
      <?php echo form_open(''); ?>
      <table class="table table-responsive table-bordered">
        <thead>
          <tr><th>First Player</th><th>Score</th><th>Second Player</th><th>Score</th><th>Day</th></tr>
        </thead>
        <tbody>
          <tr><td>1</td><td></td><td>2</td><td></td><td></td></tr>
          <tr><td>1</td><td></td><td>3</td><td></td><td></td></tr>
          <tr><td>1</td><td></td><td>4</td><td></td><td></td></tr>
          <tr><td>1</td><td></td><td>5</td><td></td><td></td></tr>
          <tr><td>1</td><td></td><td>6</td><td></td><td></td></tr>
          <tr><td>2</td><td></td><td>3</td><td></td><td></td></tr>
          <tr><td>2</td><td></td><td>4</td><td></td><td></td></tr>
          <tr><td>2</td><td></td><td>5</td><td></td><td></td></tr>
          <tr><td>2</td><td></td><td>6</td><td></td><td></td></tr>
          <tr><td>3</td><td></td><td>4</td><td></td><td></td></tr>
          <tr><td>3</td><td></td><td>5</td><td></td><td></td></tr>
          <tr><td>3</td><td></td><td>6</td><td></td><td></td></tr>
          <tr><td>4</td><td></td><td>5</td><td></td><td></td></tr>
          <tr><td>4</td><td></td><td>6</td><td></td><td></td></tr>
          <tr><td>5</td><td></td><td>6</td><td></td><td></td></tr>
        </tbody>
      </table>
    </div>
    <?php echo form_close(); ?>
    <div class="col-md-6">
      <h3>DIVISION 2</h3>
      <?php echo form_open(''); ?>
      <table class="table table-responsive table-bordered">
        <thead>
          <tr><th>First Player</th><th>Score</th><th>Second Player</th><th>Score</th><th>Day</th></tr>
        </thead>
        <tbody>
          <tr><td>1</td><td></td><td>2</td><td></td><td></td></tr>
          <tr><td>1</td><td></td><td>3</td><td></td><td></td></tr>
          <tr><td>1</td><td></td><td>4</td><td></td><td></td></tr>
          <tr><td>1</td><td></td><td>5</td><td></td><td></td></tr>
          <tr><td>1</td><td></td><td>6</td><td></td><td></td></tr>
          <tr><td>2</td><td></td><td>3</td><td></td><td></td></tr>
          <tr><td>2</td><td></td><td>4</td><td></td><td></td></tr>
          <tr><td>2</td><td></td><td>5</td><td></td><td></td></tr>
          <tr><td>2</td><td></td><td>6</td><td></td><td></td></tr>
          <tr><td>3</td><td></td><td>4</td><td></td><td></td></tr>
          <tr><td>3</td><td></td><td>5</td><td></td><td></td></tr>
          <tr><td>3</td><td></td><td>6</td><td></td><td></td></tr>
          <tr><td>4</td><td></td><td>5</td><td></td><td></td></tr>
          <tr><td>4</td><td></td><td>6</td><td></td><td></td></tr>
          <tr><td>5</td><td></td><td>6</td><td></td><td></td></tr>
        </tbody>
      </table>
    </div>
    <?php echo form_close(); ?>
  </div>
  <div class="row">
    <div class="col-md-6">
      <?php
      $data = array(
        'id' => 'div1',
        'type' => 'submit',
        'content' => 'Update Division 1',
        'class' => 'btn btn-info'
      );
      echo form_button($data);
      ?>
    </div>
    <div class="col-md-6">
      <?php
      $data = array(
        'id' => 'div2',
        'type' => 'submit',
        'content' => 'Update Division 2',
        'class' => 'btn btn-info'
      );
      echo form_button($data);
      ?>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <h3>DIVISION 3</h3>
      <?php echo form_open(''); ?>
      <table class="table table-responsive table-bordered">
        <thead>
          <tr><th>First Player</th><th>Score</th><th>Second Player</th><th>Score</th><th>Day</th></tr>
        </thead>
        <tbody>
          <tr><td>1</td><td></td><td>2</td><td></td><td></td></tr>
          <tr><td>1</td><td></td><td>3</td><td></td><td></td></tr>
          <tr><td>1</td><td></td><td>4</td><td></td><td></td></tr>
          <tr><td>1</td><td></td><td>5</td><td></td><td></td></tr>
          <tr><td>1</td><td></td><td>6</td><td></td><td></td></tr>
          <tr><td>2</td><td></td><td>3</td><td></td><td></td></tr>
          <tr><td>2</td><td></td><td>4</td><td></td><td></td></tr>
          <tr><td>2</td><td></td><td>5</td><td></td><td></td></tr>
          <tr><td>2</td><td></td><td>6</td><td></td><td></td></tr>
          <tr><td>3</td><td></td><td>4</td><td></td><td></td></tr>
          <tr><td>3</td><td></td><td>5</td><td></td><td></td></tr>
          <tr><td>3</td><td></td><td>6</td><td></td><td></td></tr>
          <tr><td>4</td><td></td><td>5</td><td></td><td></td></tr>
          <tr><td>4</td><td></td><td>6</td><td></td><td></td></tr>
          <tr><td>5</td><td></td><td>6</td><td></td><td></td></tr>

        </tbody>
      </table>
    </div>
    <?php echo form_close(); ?>
    <div class="col-md-6">
      <h3>DIVISION 4</h3>
      <?php echo form_open(''); ?>
      <table class="table table-responsive table-bordered">
        <thead>
          <tr><th>First Player</th><th>Score</th><th>Second Player</th><th>Score</th><th>Day</th></tr>
        </thead>
        <tbody>
          <tr><td>1</td><td></td><td>2</td><td></td><td></td></tr>
          <tr><td>1</td><td></td><td>3</td><td></td><td></td></tr>
          <tr><td>1</td><td></td><td>4</td><td></td><td></td></tr>
          <tr><td>1</td><td></td><td>5</td><td></td><td></td></tr>
          <tr><td>1</td><td></td><td>6</td><td></td><td></td></tr>
          <tr><td>2</td><td></td><td>3</td><td></td><td></td></tr>
          <tr><td>2</td><td></td><td>4</td><td></td><td></td></tr>
          <tr><td>2</td><td></td><td>5</td><td></td><td></td></tr>
          <tr><td>2</td><td></td><td>6</td><td></td><td></td></tr>
          <tr><td>3</td><td></td><td>4</td><td></td><td></td></tr>
          <tr><td>3</td><td></td><td>5</td><td></td><td></td></tr>
          <tr><td>3</td><td></td><td>6</td><td></td><td></td></tr>
          <tr><td>4</td><td></td><td>5</td><td></td><td></td></tr>
          <tr><td>4</td><td></td><td>6</td><td></td><td></td></tr>
          <tr><td>5</td><td></td><td>6</td><td></td><td></td></tr>
        </tbody>
      </table>
    </div>
    <?php echo form_close(); ?>
  </div>
  <div class="row">
    <div class="col-md-6">
      <?php
      $data = array(
        'id' => 'div3',
        'type' => 'submit',
        'content' => 'Update Division 3',
        'class' => 'btn btn-info'
      );
      echo form_button($data);
      ?>
    </div>
    <div class="col-md-6">
      <?php
      $data = array(
        'id' => 'div4',
        'type' => 'submit',
        'content' => 'Update Division 4',
        'class' => 'btn btn-info'
      );
      echo form_button($data);
      ?>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <h3>DIVISION 5</h3>
      <?php echo form_open(''); ?>
      <table class="table table-responsive table-bordered">
        <thead>
          <tr><th>First Player</th><th>Score</th><th>Second Player</th><th>Score</th><th>Day</th></tr>
        </thead>
        <tbody>
          <tr><td>1</td><td></td><td>2</td><td></td><td></td></tr>
          <tr><td>1</td><td></td><td>3</td><td></td><td></td></tr>
          <tr><td>1</td><td></td><td>4</td><td></td><td></td></tr>
          <tr><td>1</td><td></td><td>5</td><td></td><td></td></tr>
          <tr><td>1</td><td></td><td>6</td><td></td><td></td></tr>
          <tr><td>2</td><td></td><td>3</td><td></td><td></td></tr>
          <tr><td>2</td><td></td><td>4</td><td></td><td></td></tr>
          <tr><td>2</td><td></td><td>5</td><td></td><td></td></tr>
          <tr><td>2</td><td></td><td>6</td><td></td><td></td></tr>
          <tr><td>3</td><td></td><td>4</td><td></td><td></td></tr>
          <tr><td>3</td><td></td><td>5</td><td></td><td></td></tr>
          <tr><td>3</td><td></td><td>6</td><td></td><td></td></tr>
          <tr><td>4</td><td></td><td>5</td><td></td><td></td></tr>
          <tr><td>4</td><td></td><td>6</td><td></td><td></td></tr>
          <tr><td>5</td><td></td><td>6</td><td></td><td></td></tr>
        </tbody>
      </table>
    </div>
    <?php echo form_close(); ?>
    <div class="col-md-6">
      <h3>DIVISION 6</h3>
      <?php echo form_open(''); ?>
      <table class="table table-responsive table-bordered">
        <thead>
          <tr><th>First Player</th><th>Score</th><th>Second Player</th><th>Score</th><th>Day</th></tr>
        </thead>
        <tbody>
          <tr><td>1</td><td></td><td>2</td><td></td><td></td></tr>
          <tr><td>1</td><td></td><td>3</td><td></td><td></td></tr>
          <tr><td>1</td><td></td><td>4</td><td></td><td></td></tr>
          <tr><td>1</td><td></td><td>5</td><td></td><td></td></tr>
          <tr><td>1</td><td></td><td>6</td><td></td><td></td></tr>
          <tr><td>2</td><td></td><td>3</td><td></td><td></td></tr>
          <tr><td>2</td><td></td><td>4</td><td></td><td></td></tr>
          <tr><td>2</td><td></td><td>5</td><td></td><td></td></tr>
          <tr><td>2</td><td></td><td>6</td><td></td><td></td></tr>
          <tr><td>3</td><td></td><td>4</td><td></td><td></td></tr>
          <tr><td>3</td><td></td><td>5</td><td></td><td></td></tr>
          <tr><td>3</td><td></td><td>6</td><td></td><td></td></tr>
          <tr><td>4</td><td></td><td>5</td><td></td><td></td></tr>
          <tr><td>4</td><td></td><td>6</td><td></td><td></td></tr>
          <tr><td>5</td><td></td><td>6</td><td></td><td></td></tr>
        </tbody>
      </table>
    </div>
    <?php echo form_close(); ?>
  </div>
  <div class="row">
    <div class="col-md-6">
      <?php
      $data = array(
        'id' => 'div5',
        'type' => 'submit',
        'content' => 'Update Division 5',
        'class' => 'btn btn-info'
      );
      echo form_button($data);
      ?>
    </div>
    <div class="col-md-6">
      <?php
      $data = array(
        'id' => 'div6',
        'type' => 'submit',
        'content' => 'Update Division 6',
        'class' => 'btn btn-info'
      );
      echo form_button($data);
      ?>
    </div>
  </div>
  <br>
</div>
<?php } else {
  echo "You are not an admin, so you do not have access to this page";
} ?>
