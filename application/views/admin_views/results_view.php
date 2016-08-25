<?php
if(isset($_SESSION['role']))
{
   if (isset($results_message)) { ?>
   <div class="message-box alert alert-success">
     <h3 style="color:green;"><?php echo $results_message; ?></h3>
     <a href="#" style="color:red;" class="close" data-dismiss="alert" aria-label="close">close &times;</a>
    </div>
  <?php $results_message = ''; } ?>
<h1>Results for <?php echo ucfirst($month) . " " . $year;?></h1>
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
            <tr><th>First Player</th><th>Score</th><th>Second Player</th><th>Score</th><th>Date</th><th>Day</th></tr>
          </thead>
          <tbody>
            <?php $c = 1; foreach ($results as $result):
              if ($result['division'] == 1) {
            ?>
            <tr>
              <td class="name-col">
                <?php
                  foreach ($players as $player):
                    if ($player['id'] == $result['player1_id']) { echo $player['fName'] . " " . $player['lName'];
                ?>
                <input type="hidden" name="<?php $id1 = 'id1' . $c; echo $id1; ?>" value="<?php echo $player['id']; ?>">
                  <?php  }
                  endforeach;
                ?>
              </td>
              <td class="score-col"><input type="number" min="0" max="3" class="text-center score-input form-control" name="<?php $num1 = 'p1'. $c; echo $num1; ?>" value="<?php echo set_value('$num1', $result['player1_score']); ?>">
              </td>
              <td class="name-col">
                <?php
                  foreach ($players as $player):
                    if ($player['id'] == $result['player2_id']) { echo $player['fName'] . " " . $player['lName'];
                ?>
                <input type="hidden" name="<?php $id2 = 'id2' . $c; echo $id2; ?>" value="<?php echo $player['id']; ?>">
                <?php  }
                  endforeach;
                ?>
              </td>
              <td class="score-col"><input type="number" min="0" max="3" class="text-center score-input form-control" name="<?php $num2 = 'p2'. $c; echo $num2;  ?>" value="<?php echo set_value('$num2', $result['player2_score']); ?>">
              </td>
              <td class="date-col">
                <input type="number" min="0" max="31" class="date-input" name="<?php $date = 'date' . $c; echo $date; ?>" value="<?php echo set_value('$date', $result['date']); ?>">
              </td>
              <td class="day-col">
                <?php
                  $sel = $result['day'];
                  if ($sel == "") {
                ?>
                <select name="<?php $day = 'day' . $c; echo $day; $c++; ?>">
                  <option value="d">Choose day</option>
                  <option value="Mon">Mon</option>
                  <option value="Tue">Tue</option>
                  <option value="Wed">Wed</option>
                  <option value="Thu">Thu</option>
                  <option value="Fri">Fri</option>
                  <option value="Sat">Sat</option>
                  <option value="Sun">Sun</option>
                </select>
                <?php } else { ?>
                  <input type="text" name="<?php $day = 'day' . $c; echo $day; $c++; ?>" class="form-control text-center" value="<?php echo $sel; ?>">
                <?php } ?>
              </td>
            </tr>
            <?php } endforeach;  ?>
          </tbody>
        </table>
        <input type="hidden" name="num_records" value="<?php echo $c - 1; ?>">
        <?php echo form_close(); ?>
      </div>
      <div class="col-md-6">
        <?php echo form_open('enter_results'); ?>
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
            <tr><th>First Player</th><th>Score</th><th>Second Player</th><th>Score</th><th>Date</th><th>Day</th></tr>
          </thead>
          <tbody>
            <?php $c = 1; foreach ($results as $result):
              if ($result['division'] == 2) {
            ?>
            <tr>
              <td class="name-col">
                <?php
                  foreach ($players as $player):
                    if ($player['id'] == $result['player1_id']) { echo $player['fName'] . " " . $player['lName'];
                ?>
                <input type="hidden" name="<?php $id1 = 'id1' . $c; echo $id1; ?>" value="<?php echo $player['id']; ?>">
                  <?php  }
                  endforeach;
                ?>
              </td>
              <td class="score-col"><input type="number" min="0" max="3" class="text-center score-input form-control" name="<?php $num1 = 'p1'. $c; echo $num1; ?>" value="<?php echo set_value('$num1', $result['player1_score']); ?>">
              </td>
              <td class="name-col">
                <?php
                  foreach ($players as $player):
                    if ($player['id'] == $result['player2_id']) { echo $player['fName'] . " " . $player['lName'];
                ?>
                <input type="hidden" name="<?php $id2 = 'id2' . $c; echo $id2; ?>" value="<?php echo $player['id']; ?>">
                <?php  }
                  endforeach;
                ?>
              </td>
              <td class="score-col"><input type="number" min="0" max="3" class="text-center score-input form-control" name="<?php $num2 = 'p2'. $c; echo $num2; ?>" value="<?php echo set_value('$num2', $result['player2_score']); ?>">
              </td>
              <td class="date-col">
                <input type="number" min="0" max="31" class="date-input" name="<?php $date = 'date' . $c; echo $date; ?>" value="<?php echo set_value('$date', $result['date']); ?>">
              </td>
              <td class="day-col">
                <?php
                  $sel = $result['day'];
                  if ($sel == "") {
                ?>
                <select name="<?php $day = 'day' . $c; echo $day; $c++; ?>">
                  <option value="d">Choose day</option>
                  <option value="Mon">Mon</option>
                  <option value="Tue">Tue</option>
                  <option value="Wed">Wed</option>
                  <option value="Thu">Thu</option>
                  <option value="Fri">Fri</option>
                  <option value="Sat">Sat</option>
                  <option value="Sun">Sun</option>
                </select>
                <?php } else { ?>
                  <input type="text" name="<?php $day = 'day' . $c; echo $day; $c++; ?>" class="form-control text-center" value="<?php echo $sel; ?>">
                <?php } ?>
              </td>
            </tr>
            <?php } endforeach;  ?>
          </tbody>
        </table>
        <input type="hidden" name="num_records" value="<?php echo $c - 1; ?>">
        <?php echo form_close(); ?>
      </div>
    </div>
  <div class="row">
    <div class="col-md-6">
      <?php echo form_open('enter_results'); ?>
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
          <tr><th>First Player</th><th>Score</th><th>Second Player</th><th>Score</th><th>Date</th><th>Day</th></tr>
        </thead>
        <tbody>
          <?php $c = 1; foreach ($results as $result):
            if ($result['division'] == 3) {
          ?>
          <tr>
            <td class="name-col">
              <?php
                foreach ($players as $player):
                  if ($player['id'] == $result['player1_id']) { echo $player['fName'] . " " . $player['lName'];
              ?>
              <input type="hidden" name="<?php $id1 = 'id1' . $c; echo $id1; ?>" value="<?php echo $player['id']; ?>">
                <?php  }
                endforeach;
              ?>
            </td>
            <td class="score-col"><input type="number" min="0" max="3" class="text-center score-input form-control" name="<?php $num1 = 'p1'. $c; echo $num1; ?>" value="<?php echo set_value('$num1', $result['player1_score']); ?>">
            </td>
            <td class="name-col">
              <?php
                foreach ($players as $player):
                  if ($player['id'] == $result['player2_id']) { echo $player['fName'] . " " . $player['lName'];
              ?>
              <input type="hidden" name="<?php $id2 = 'id2' . $c; echo $id2; ?>" value="<?php echo $player['id']; ?>">
              <?php  }
                endforeach;
              ?>
            </td>
            <td class="score-col"><input type="number" min="0" max="3" class="text-center score-input form-control" name="<?php $num2 = 'p2'. $c; echo $num2; ?>" value="<?php echo set_value('$num2', $result['player2_score']); ?>">
            </td>
            <td class="date-col">
              <input type="number" min="0" max="31" class="date-input" name="<?php $date = 'date' . $c; echo $date; ?>" value="<?php echo set_value('$date', $result['date']); ?>">
            </td>
            <td class="day-col">
              <?php
                $sel = $result['day'];
                if ($sel == "") {
              ?>
              <select name="<?php $day = 'day' . $c; echo $day; $c++; ?>">
                <option value="d">Choose day</option>
                <option value="Mon">Mon</option>
                <option value="Tue">Tue</option>
                <option value="Wed">Wed</option>
                <option value="Thu">Thu</option>
                <option value="Fri">Fri</option>
                <option value="Sat">Sat</option>
                <option value="Sun">Sun</option>
              </select>
              <?php } else { ?>
                <input type="text" name="<?php $day = 'day' . $c; echo $day; $c++; ?>" class="form-control text-center" value="<?php echo $sel; ?>">
              <?php } ?>
            </td>
          </tr>
          <?php } endforeach;  ?>
        </tbody>
      </table>
      <input type="hidden" name="num_records" value="<?php echo $c - 1; ?>">
      <?php echo form_close(); ?>
    </div>
    <div class="col-md-6">
      <?php echo form_open('enter_results'); ?>
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
          <tr><th>First Player</th><th>Score</th><th>Second Player</th><th>Score</th><th>Date</th><th>Day</th></tr>
        </thead>
        <tbody>
          <?php $c = 1; foreach ($results as $result):
            if ($result['division'] == 4) {
          ?>
          <tr>
            <td class="name-col">
              <?php
                foreach ($players as $player):
                  if ($player['id'] == $result['player1_id']) { echo $player['fName'] . " " . $player['lName'];
              ?>
              <input type="hidden" name="<?php $id1 = 'id1' . $c; echo $id1; ?>" value="<?php echo $player['id']; ?>">
                <?php  }
                endforeach;
              ?>
            </td>
            <td class="score-col"><input type="number" min="0" max="3" class="text-center score-input form-control" name="<?php $num1 = 'p1'. $c; echo $num1; ?>" value="<?php echo set_value('$num1', $result['player1_score']); ?>">
            </td>
            <td class="name-col">
              <?php
                foreach ($players as $player):
                  if ($player['id'] == $result['player2_id']) { echo $player['fName'] . " " . $player['lName'];
              ?>
              <input type="hidden" name="<?php $id2 = 'id2' . $c; echo $id2; ?>" value="<?php echo $player['id']; ?>">
              <?php  }
                endforeach;
              ?>
            </td>
            <td class="score-col"><input type="number" min="0" max="3" class="text-center score-input form-control" name="<?php $num2 = 'p2'. $c; echo $num2; ?>" value="<?php echo set_value('$num2', $result['player2_score']); ?>">
            </td>
            <td class="date-col">
              <input type="number" min="0" max="31" class="date-input" name="<?php $date = 'date' . $c; echo $date; ?>" value="<?php echo set_value('$date', $result['date']); ?>">
            </td>
            <td class="day-col">
              <?php
                $sel = $result['day'];
                if ($sel == "") {
              ?>
              <select name="<?php $day = 'day' . $c; echo $day; $c++; ?>">
                <option value="d">Choose day</option>
                <option value="Mon">Mon</option>
                <option value="Tue">Tue</option>
                <option value="Wed">Wed</option>
                <option value="Thu">Thu</option>
                <option value="Fri">Fri</option>
                <option value="Sat">Sat</option>
                <option value="Sun">Sun</option>
              </select>
              <?php } else { ?>
                <input type="text" name="<?php $day = 'day' . $c; echo $day; $c++; ?>" class="form-control text-center" value="<?php echo $sel; ?>">
              <?php } ?>
            </td>
          </tr>
          <?php } endforeach;  ?>
        </tbody>
      </table>
      <input type="hidden" name="num_records" value="<?php echo $c - 1; ?>">
      <?php echo form_close(); ?>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <?php echo form_open('enter_results'); ?>
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
          <tr><th>First Player</th><th>Score</th><th>Second Player</th><th>Score</th><th>Date</th><th>Day</th></tr>
        </thead>
        <tbody>
          <?php $c = 1; foreach ($results as $result):
            if ($result['division'] == 5) {
          ?>
          <tr>
            <td class="name-col">
              <?php
                foreach ($players as $player):
                  if ($player['id'] == $result['player1_id']) { echo $player['fName'] . " " . $player['lName'];
              ?>
              <input type="hidden" name="<?php $id1 = 'id1' . $c; echo $id1; ?>" value="<?php echo $player['id']; ?>">
                <?php  }
                endforeach;
              ?>
            </td>
            <td class="score-col"><input type="number" min="0" max="3" class="text-center score-input form-control" name="<?php $num1 = 'p1'. $c; echo $num1; ?>" value="<?php echo set_value('$num1', $result['player1_score']); ?>">
            </td>
            <td class="name-col">
              <?php
                foreach ($players as $player):
                  if ($player['id'] == $result['player2_id']) { echo $player['fName'] . " " . $player['lName'];
              ?>
              <input type="hidden" name="<?php $id2 = 'id2' . $c; echo $id2; ?>" value="<?php echo $player['id']; ?>">
              <?php  }
                endforeach;
              ?>
            </td>
            <td class="score-col"><input type="number" min="0" max="3" class="text-center score-input form-control" name="<?php $num2 = 'p2'. $c; echo $num2; ?>" value="<?php echo set_value('$num2', $result['player2_score']); ?>">
            </td>
            <td class="date-col">
              <input type="number" min="0" max="31" class="date-input" name="<?php $date = 'date' . $c; echo $date; ?>" value="<?php echo set_value('$date', $result['date']); ?>">
            </td>
            <td class="day-col">
              <?php
                $sel = $result['day'];
                if ($sel == "") {
              ?>
              <select name="<?php $day = 'day' . $c; echo $day; $c++; ?>">
                <option value="d">Choose day</option>
                <option value="Mon">Mon</option>
                <option value="Tue">Tue</option>
                <option value="Wed">Wed</option>
                <option value="Thu">Thu</option>
                <option value="Fri">Fri</option>
                <option value="Sat">Sat</option>
                <option value="Sun">Sun</option>
              </select>
              <?php } else { ?>
                <input type="text" name="<?php $day = 'day' . $c; echo $day; $c++; ?>" class="form-control text-center" value="<?php echo $sel; ?>">
              <?php } ?>
            </td>
          </tr>
          <?php } endforeach;  ?>
        </tbody>
      </table>
      <input type="hidden" name="num_records" value="<?php echo $c - 1; ?>">
      <?php echo form_close(); ?>
    </div>
    <div class="col-md-6">
      <?php echo form_open('enter_results'); ?>
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
          <tr><th>First Player</th><th>Score</th><th>Second Player</th><th>Score</th><th>Date</th><th>Day</th></tr>
        </thead>
        <tbody>
          <?php $c = 1; foreach ($results as $result):
            if ($result['division'] == 6) {
          ?>
          <tr>
            <td class="name-col">
              <?php
                foreach ($players as $player):
                  if ($player['id'] == $result['player1_id']) { echo $player['fName'] . " " . $player['lName'];
              ?>
              <input type="hidden" name="<?php $id1 = 'id1' . $c; echo $id1; ?>" value="<?php echo $player['id']; ?>">
                <?php  }
                endforeach;
              ?>
            </td>
            <td class="score-col"><input type="number" min="0" max="3" class="text-center score-input form-control" name="<?php $num1 = 'p1'. $c; echo $num1; ?>" value="<?php echo set_value('$num1', $result['player1_score']); ?>">
            </td>
            <td class="name-col">
              <?php
                foreach ($players as $player):
                  if ($player['id'] == $result['player2_id']) { echo $player['fName'] . " " . $player['lName'];
              ?>
              <input type="hidden" name="<?php $id2 = 'id2' . $c; echo $id2; ?>" value="<?php echo $player['id']; ?>">
              <?php  }
                endforeach;
              ?>
            </td>
            <td class="score-col"><input type="number" min="0" max="3" class="text-center score-input form-control" name="<?php $num2 = 'p2'. $c; echo $num2; ?>" value="<?php echo set_value('$num2', $result['player2_score']); ?>">
            </td>
            <td class="date-col">
              <input type="number" min="0" max="31" class="date-input" name="<?php $date = 'date' . $c; echo $date; ?>" value="<?php echo set_value('$date', $result['date']); ?>">
            </td>
            <td class="day-col">
              <?php
                $sel = $result['day'];
                if ($sel == "") {
              ?>
              <select name="<?php $day = 'day' . $c; echo $day; $c++; ?>">
                <option value="d">Choose day</option>
                <option value="Mon">Mon</option>
                <option value="Tue">Tue</option>
                <option value="Wed">Wed</option>
                <option value="Thu">Thu</option>
                <option value="Fri">Fri</option>
                <option value="Sat">Sat</option>
                <option value="Sun">Sun</option>
              </select>
              <?php } else { ?>
                <input type="text" name="<?php $day = 'day' . $c; echo $day; $c++; ?>" class="form-control text-center" value="<?php echo $sel; ?>">
              <?php } ?>
            </td>
          </tr>
          <?php } endforeach;  ?>
        </tbody>
      </table>
      <input type="hidden" name="num_records" value="<?php echo $c - 1; ?>">
      <?php echo form_close(); ?>
    </div>
  </div>
  <br>
</div>
<?php } else {
  echo "You are not an admin, so you do not have access to this page <br>";
} ?>
