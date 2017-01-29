<h2>Start/update next month's league</h2>
<?php
if(isset($_SESSION['role']))
  { ?>
  <div class="container-fluid">
    <?php echo form_open('update_leagues'); ?>
    <div class="row">
      <div class="col-md-3">
        <?php
        echo form_hidden('leagues', 'new');
        echo form_label('Year: '.$year, 'year');
        echo form_hidden('year', $year);
        echo "<br><br>";
        echo form_label('Month: '.ucfirst($month), 'month');
        echo form_hidden('month', $month);
        echo "<br><br>";
        echo "<button type='submit' class='btn btn-info'>Update</button>";
        ?>
    </div>
    <div class="col-md-9 table-responsive">
      <table class="table table-bordered spacing-top">
        <thead>
          <tr><th>Player</th><th>Number</th><th>Email</th><th>Current division</th></tr>
        </thead>

        <tbody>
          <?php $c = 1; foreach ($players as $player):
            if ($player['current_league']%2 == 0) { $divclass = "bg-even"; } else { $divclass = "bg-odd"; }
          ?>
            <tr class="<?php echo $divclass ?>">
              <input type="hidden" name="<?php $id = 'id' . $c; echo $id; ?>" value="<?php echo set_value('$id', $player['id']); ?>">
              <td><?php echo $player['fName'] . " " . $player['lName']; ?></td>
              <td> <?php echo $player['mobile']; ?></td>
              <td><?php echo $player['email']; ?></td>
              <td><input type="number" min="0" max="8" class="text-center number-column" name="<?php $num = 'curr'.$c; echo $num; $c++; ?>" value="<?php echo set_value('$num', $player['current_league']); ?>"></td>
            </tr>
          <?php endforeach; ?>
      </tbody>
      </table>
    </div>
    </div>
    <input type="hidden" name="num_records" value="<?php echo $c ?>">

    <?php echo form_close(); $c = 1; ?>
    <br>
    <?php } else { ?>
    <div class="spacing-sides">
    <img src="<?php echo base_url();?>images/web-lock.png"><br><br>
    <p class="text-warning">You are not an admin, so you do not have access to this page</p><br>
    <?php } ?>
    </div>
  </div>
