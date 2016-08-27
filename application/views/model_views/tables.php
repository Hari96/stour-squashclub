<h1>Result Tables</h1>
<div class="container-fluid">
  <div class="row spacing-bottom">
    <?php echo form_open('') ;?>
    <div class="col-md-2">
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
      echo form_dropdown('year', $options, $year, 'class="form-control"');
      ?>
    </div>
    <div class="col-md-2">
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
      echo form_dropdown('month', $options, $month, 'class="form-control"');
      ?>
    </div>
    <div class="col-md-2 spacing-top">
      <?php
      $data = array(
        'id' => 'yearmonth',
        'type' => 'submit',
        'content' => 'Show results',
        'class' => 'btn btn-info'
      );
      echo form_button($data);
      echo form_close(); ?>
    </div>
    <div class="col-md-6">
    </div>
  </div>
  <br>
  <span class="lead"><strong>DIVISION 1</strong></span>
  <div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-8">
      <table class="table table-responsive table-bordered">
        <thead>
          <tr><th>Player</th><th>Played</th><th>Won</th><th>Draw</th><th>Lost</th><th>Points</th></tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</div>
