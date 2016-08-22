<h1>Enter results</h1>
<?php
if(isset($_SESSION['role']))
{ ?>
<div class="container-fluid">
<div class="row">
    <div class="col-md-6">
      <?php echo form_open('enter_results'); ?>
      <input type="hidden" name="year" value="<?php echo $year; ?>">
      <input type="hidden" name="month" value="<?php echo $month; ?>">
      <input type="hidden" name="div" value="1">
      <span class="lead"><strong>DIVISION 1</strong></span>
      <?php
      $data = array(
        'id' => 'div1',
        'type' => 'submit',
        'content' => 'Update Division 1',
        'class' => 'btn btn-info pull-right'
      );
      echo form_button($data);
      ?>
      <br><br>
      <table class="table table-responsive table-bordered">
        <thead>
          <tr><th>First Player</th><th>Score</th><th>Second Player</th><th>Score</th><th>Day</th></tr>
        </thead>
        <tbody>
          <?php $c = 1; foreach ($results as $result):
            if ($result['division'] == 1) {
          ?>
          <tr>
            <td>
              <?php
                foreach ($players as $player):
                  if ($player['id'] == $result['player1_id']) { echo $player['fName'] . " " . $player['lName']; }
                endforeach;
              ?>
            </td>
            <td><input type="number" min="0" max="5" class="text-center number-column" name="<?php $num = 'p1'. $c; echo $num; $c++ ?>" value="<?php echo set_value('$num', $result['player1_score']); ?>"></td>
            <td>
              <?php
                foreach ($players as $player):
                  if ($player['id'] == $result['player2_id']) { echo $player['fName'] . " " . $player['lName']; }
                endforeach;
              ?>
            </td>
            <td><input type="number" min="0" max="5" class="text-center number-column" name="<?php $num = 'p2'. $c; echo $num; $c++; ?>" value="<?php echo set_value('$num', $result['player2_score']); ?>"></td><td></td>

          </tr>
          <?php } $c = 1; endforeach;  ?>
        </tbody>
      </table>
    </div>
    <input type="hidden" name="num_records" value="<?php echo $c ?>">
    <?php echo form_close(); ?>
    <div class="col-md-6">
      <?php echo form_open(''); ?>
      <input type="hidden" name="year" value="<?php echo $year; ?>">
      <input type="hidden" name="month" value="<?php echo $month; ?>">
      <input type="hidden" name="div" value="2">
      <span class="lead"><strong>DIVISION 2</strong></span>
      <?php
      $data = array(
        'id' => 'div2',
        'type' => 'submit',
        'content' => 'Update Division 2',
        'class' => 'btn btn-info pull-right'
      );
      echo form_button($data);
      ?>
      <br><br>
      <table class="table table-responsive table-bordered">
        <thead>
          <tr><th>First Player</th><th>Score</th><th>Second Player</th><th>Score</th><th>Day</th></tr>
        </thead>
        <tbody>
          <?php $c = 1; foreach ($results as $result):
            if ($result['division'] == 2) {
          ?>
          <tr>
            <td>
              <?php
                foreach ($players as $player):
                  if ($player['id'] == $result['player1_id']) { echo $player['fName'] . " " . $player['lName']; }
                endforeach;
              ?>
            </td>
            <td><input type="number" min="0" max="5" class="text-center number-column" name="<?php $num = 'p1'. $c; echo $num; $c++ ?>" value="<?php echo set_value('$num', $result['player1_score']); ?>"></td>
            <td>
              <?php
                foreach ($players as $player):
                  if ($player['id'] == $result['player2_id']) { echo $player['fName'] . " " . $player['lName']; }
                endforeach;
              ?>
            </td>
            <td><input type="number" min="0" max="5" class="text-center number-column" name="<?php $num = 'p2'. $c; echo $num; $c++ ?>" value="<?php echo set_value('$num', $result['player2_score']); ?>"></td>
            <td></td>
          </tr>
          <?php } $c = 1; endforeach; ?>
        </tbody>
      </table>
    </div>
    <?php echo form_close(); ?>
  </div>

  </div>
  <div class="row">
    <div class="col-md-6">
      <?php echo form_open(''); ?>
      <input type="hidden" name="year" value="<?php echo $year; ?>">
      <input type="hidden" name="month" value="<?php echo $month; ?>">
      <input type="hidden" name="div" value="3">
      <span class="lead"><strong>DIVISION 3</strong></span>
      <?php
      $data = array(
        'id' => 'div3',
        'type' => 'submit',
        'content' => 'Update Division 3',
        'class' => 'btn btn-info pull-right'
      );
      echo form_button($data);
      ?>
      <br><br>
      <table class="table table-responsive table-bordered">
        <thead>
          <tr><th>First Player</th><th>Score</th><th>Second Player</th><th>Score</th><th>Day</th></tr>
        </thead>
        <tbody>
          <?php $c = 1; foreach ($results as $result):
            if ($result['division'] == 3) {
          ?>
          <tr>
            <td>
              <?php
                foreach ($players as $player):
                  if ($player['id'] == $result['player1_id']) { echo $player['fName'] . " " . $player['lName']; }
                endforeach;
              ?>
            </td>
            <td><input type="number" min="0" max="5" class="text-center number-column" name="<?php $num = 'p1'. $c; echo $num; $c++ ?>" value="<?php echo set_value('$num', $result['player1_score']); ?>"></td>
            <td>
              <?php
                foreach ($players as $player):
                  if ($player['id'] == $result['player2_id']) { echo $player['fName'] . " " . $player['lName']; }
                endforeach;
              ?>
            </td>
            <td><input type="number" min="0" max="5" class="text-center number-column" name="<?php $num = 'p1'. $c; echo $num; $c++ ?>" value="<?php echo set_value('$num', $result['player2_score']); ?>"></td>
            <td></td>
          </tr>
          <?php } $c = 1; endforeach; ?>
        </tbody>
      </table>
    </div>
    <?php echo form_close(); ?>
    <div class="col-md-6">
      <?php echo form_open(''); ?>
      <input type="hidden" name="year" value="<?php echo $year; ?>">
      <input type="hidden" name="month" value="<?php echo $month; ?>">
      <input type="hidden" name="div" value="4">
      <span class="lead"><strong>DIVISION 4</strong></span>
      <?php
      $data = array(
        'id' => 'div4',
        'type' => 'submit',
        'content' => 'Update Division 4',
        'class' => 'btn btn-info pull-right'
      );
      echo form_button($data);
      ?>
      <br><br>
      <table class="table table-responsive table-bordered">
        <thead>
          <tr><th>First Player</th><th>Score</th><th>Second Player</th><th>Score</th><th>Day</th></tr>
        </thead>
        <tbody>
          <?php $c = 1; foreach ($results as $result):
            if ($result['division'] == 4) {
          ?>
          <tr>
            <td>
              <?php
                foreach ($players as $player):
                  if ($player['id'] == $result['player1_id']) { echo $player['fName'] . " " . $player['lName']; }
                endforeach;
              ?>
            </td>
            <td><input type="number" min="0" max="5" class="text-center number-column" name="<?php $num = 'p1'. $c; echo $num; $c++ ?>" value="<?php echo set_value('$num', $result['player1_score']); ?>"></td>
            <td>
              <?php
                foreach ($players as $player):
                  if ($player['id'] == $result['player2_id']) { echo $player['fName'] . " " . $player['lName']; }
                endforeach;
              ?>
            </td>
            <td><input type="number" min="0" max="5" class="text-center number-column" name="<?php $num = 'p1'. $c; echo $num; $c++ ?>" value="<?php echo set_value('$num', $result['player2_score']); ?>"></td>
            <td></td>
          </tr>
          <?php } $c = 1; endforeach; ?>
        </tbody>
      </table>
    </div>
    <?php echo form_close(); ?>
  </div>
  <div class="row">
    <div class="col-md-6">
      <?php echo form_open(''); ?>
      <input type="hidden" name="year" value="<?php echo $year; ?>">
      <input type="hidden" name="month" value="<?php echo $month; ?>">
      <input type="hidden" name="div" value="5">
      <span class="lead"><strong>DIVISION 5</strong></span>
      <?php
      $data = array(
        'id' => 'div5',
        'type' => 'submit',
        'content' => 'Update Division 5',
        'class' => 'btn btn-info pull-right'
      );
      echo form_button($data);
      ?>
      <br><br>
      <table class="table table-responsive table-bordered">
        <thead>
          <tr><th>First Player</th><th>Score</th><th>Second Player</th><th>Score</th><th>Day</th></tr>
        </thead>
        <tbody>
          <?php $c = 1; foreach ($results as $result):
            if ($result['division'] == 5) {
          ?>
          <tr>
            <td>
              <?php
                foreach ($players as $player):
                  if ($player['id'] == $result['player1_id']) { echo $player['fName'] . " " . $player['lName']; }
                endforeach;
              ?>
            </td>
            <td><input type="number" min="0" max="5" class="text-center number-column" name="<?php $num = 'p1'. $c; echo $num; $c++ ?>" value="<?php echo set_value('$num', $result['player1_score']); ?>"></td>
            <td>
              <?php
                foreach ($players as $player):
                  if ($player['id'] == $result['player2_id']) { echo $player['fName'] . " " . $player['lName']; }
                endforeach;
              ?>
            </td>
            <td><input type="number" min="0" max="5" class="text-center number-column" name="<?php $num = 'p1'. $c; echo $num; $c++ ?>" value="<?php echo set_value('$num', $result['player2_score']); ?>"></td>
            <td></td>
          </tr>
          <?php } $c = 1; endforeach; ?>
        </tbody>
      </table>
    </div>
    <?php echo form_close(); ?>
    <div class="col-md-6">
      <?php echo form_open(''); ?>
      <input type="hidden" name="year" value="<?php echo $year; ?>">
      <input type="hidden" name="month" value="<?php echo $month; ?>">
      <input type="hidden" name="div" value="6">
      <span class="lead"><strong>DIVISION 6</strong></span>
      <?php
      $data = array(
        'id' => 'div6',
        'type' => 'submit',
        'content' => 'Update Division 6',
        'class' => 'btn btn-info pull-right'
      );
      echo form_button($data);
      ?>
      <br><br>
      <table class="table table-responsive table-bordered">
        <thead>
          <tr><th>First Player</th><th>Score</th><th>Second Player</th><th>Score</th><th>Day</th></tr>
        </thead>
        <tbody>
          <?php $c = 1; foreach ($results as $result):
            if ($result['division'] == 6) {
          ?>
          <tr>
            <td>
              <?php
                foreach ($players as $player):
                  if ($player['id'] == $result['player1_id']) { echo $player['fName'] . " " . $player['lName']; }
                endforeach;
              ?>
            </td>
            <td><input type="number" min="0" max="5" class="text-center number-column" name="<?php $num = 'p1'. $c; echo $num; $c++ ?>" value="<?php echo set_value('$num', $result['player1_score']); ?>"></td>
            <td>
              <?php
                foreach ($players as $player):
                  if ($player['id'] == $result['player2_id']) { echo $player['fName'] . " " . $player['lName']; }
                endforeach;
              ?>
            </td>
            <td><input type="number" min="0" max="5" class="text-center number-column" name="<?php $num = 'p1'. $c; echo $num; $c++ ?>" value="<?php echo set_value('$num', $result['player2_score']); ?>"></td>
            <td></td>
          </tr>

          <?php } $c = 1; endforeach; ?>
        </tbody>
      </table>
    </div>
    <?php echo form_close(); ?>
  </div>
  <br>
</div>
<?php } else {
  echo "You are not an admin, so you do not have access to this page <br>";
} ?>
