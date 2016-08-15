<h1>Users with leagues</h1>
<div class="container-fluid">
  <?php echo form_open('update_leagues'); ?>
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
      echo "<br>";
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
  <div class="col-md-9">
    <table class="table table-responsive table-bordered spacing-top">
      <thead>
        <tr><th>Player</th><th>Number</th><th>Email</th><th>Current league</th></tr>
      </thead>

      <tbody>
        <?php $c = 1; foreach ($players as $player): ?>
          <tr> <input type="hidden" name="<?php $id = 'id' . $c; echo $id; ?>" value="<?php echo set_value('$id', $player['id']); ?>"></td><td><?php echo $player['fName'] . ", " . $player['lName']; ?><td> <?php echo $player['mobile']; ?></td><td><?php echo $player['email']; ?></td><td><input type="number" class="text-center number-column" name="<?php $num = 'curr'.$c; echo $num; $c++; ?>" value="<?php echo set_value('$num', $player['current_league']); ?>"></td></tr>
        <?php endforeach; ?>
    </tbody>
    </table>
  </div>
  </div>
  <button type="submit" class="btn btn-info">Update</button>
  <?php echo form_close(); $c = 1; ?>
</div>