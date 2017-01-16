<?php
if(isset($_SESSION['role']))
{
  if (isset($profiles_update_message)) { ?>
  <div class="message-box alert alert-success alert-dismissible">
    <h3 style="color:green;"><?php echo $profiles_update_message; ?></h3>
    <a href="#" style="color:red;" class="close" data-dismiss="alert" aria-label="close">close &times;</a>
   </div>
 <?php $profiles_update_messages = ''; } ?>
<h2>Results for <?php echo ucfirst($month) . " " . $year;?></h2>
<p class="warning"><strong>Please be sure that results are complete and accurate before updating profiles for each division.</strong></p>
<div class="container-fluid">
  <div class="row">
    <?php $updated = 0; //initialises 'profile updated' indicator ?>
    <div class="col-md-10 col-md-offset-1">
      <?php echo form_open('update_profiles'); ?>
      <input type="hidden" name="year" value="<?php echo $year; ?>">
      <input type="hidden" name="month" value="<?php echo $month; ?>">
      <input type="hidden" name="div" value="1">
      <span class="lead"><strong>DIVISION 1</strong></span>
      <?php
      foreach ($divisions as $division):
        if ($division['division'] == 1) {
          $updated = $division['profile_update'];//checks whether profile has been updated for this division
        }
    endforeach;
    if ($updated == 0) {
      $data = array(
        'id' => 'div1',
        'type' => 'submit',
        'content' => 'Update Profiles - Division 1',
        'class' => 'btn btn-info pull-right'
      );
      echo form_button($data);
    } else { ?>
      <button class="btn btn-success pull-right" disabled>Division 1 - profiles updated</button>
      <?php
    }
      ?>
      <br>
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
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
              <td class="score-col">
                <?php echo $result['player1_score']; ?>
                <input type="hidden" min="0" max="3" class="text-center score-input form-control" name="<?php $num1 = 'p1'. $c; echo $num1; ?>" value="<?php echo set_value('$num1', $result['player1_score']); ?>">
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
              <td class="score-col">
                <?php echo $result['player2_score']; ?>
                <input type="hidden" min="0" max="3" class="text-center score-input form-control" name="<?php $num2 = 'p2'. $c; echo $num2;  ?>" value="<?php echo set_value('$num2', $result['player2_score']); ?>">
              </td>
              <td class="date-col">
                <?php echo $result['date']; ?>
                <input type="hidden" min="0" max="31" class="date-input" name="<?php $date = 'date' . $c; echo $date; ?>" value="<?php echo set_value('$date', $result['date']); ?>">
              </td>
              <td class="day-col">
                <?php echo $result['day']; ?>
                <input type="hidden" name="<?php $day = 'day' . $c; echo $day; $c++; ?>" class="form-control text-center" value="<?php echo $result['day']; ?>">
              </td>
            </tr>
            <?php } endforeach;  ?>
          </tbody>
        </table>
      </div>
      <input type="hidden" name="num_records" value="<?php echo $c - 1; ?>">
      <?php echo form_close(); ?>
    </div>
  </div>
  <div class="row">
    <?php $updated = 0; //initialises 'profile updated' indicator ?>
    <div class="col-md-10 col-md-offset-1">
      <?php echo form_open('update_profiles'); ?>
      <input type="hidden" name="year" value="<?php echo $year; ?>">
      <input type="hidden" name="month" value="<?php echo $month; ?>">
      <input type="hidden" name="div" value="1">
      <span class="lead"><strong>DIVISION 2</strong></span>
      <?php
      foreach ($divisions as $division):
        if ($division['division'] == 2) {
          $updated = $division['profile_update'];//checks whether profile has been updated for this division
        }
    endforeach;
    if ($updated == 0) {
      $data = array(
        'id' => 'div1',
        'type' => 'submit',
        'content' => 'Update Profiles - Division 2',
        'class' => 'btn btn-info pull-right'
      );
      echo form_button($data);
    } else {  ?>
      <button class="btn btn-success pull-right" disabled>Division 2 - profiles updated</button>
      <?php
    } ?>
      <br>
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
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
              <td class="score-col">
                <?php echo $result['player1_score']; ?>
                <input type="hidden" min="0" max="3" class="text-center score-input form-control" name="<?php $num1 = 'p1'. $c; echo $num1; ?>" value="<?php echo set_value('$num1', $result['player1_score']); ?>">
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
              <td class="score-col">
                <?php echo $result['player2_score']; ?>
                <input type="hidden" min="0" max="3" class="text-center score-input form-control" name="<?php $num2 = 'p2'. $c; echo $num2;  ?>" value="<?php echo set_value('$num2', $result['player2_score']); ?>">
              </td>
              <td class="date-col">
                <?php echo $result['date']; ?>
                <input type="hidden" min="0" max="31" class="date-input" name="<?php $date = 'date' . $c; echo $date; ?>" value="<?php echo set_value('$date', $result['date']); ?>">
              </td>
              <td class="day-col">
                <?php echo $result['day']; ?>
                <input type="hidden" name="<?php $day = 'day' . $c; echo $day; $c++; ?>" class="form-control text-center" value="<?php echo $result['day']; ?>">
              </td>
            </tr>
            <?php } endforeach;  ?>
          </tbody>
        </table>
      </div>
      <input type="hidden" name="num_records" value="<?php echo $c - 1; ?>">
      <?php echo form_close(); ?>
    </div>
  </div>
  <div class="row">
    <?php $updated = 0; //initialises 'profile updated' indicator ?>
    <div class="col-md-10 col-md-offset-1">
      <?php echo form_open('update_profiles'); ?>
      <input type="hidden" name="year" value="<?php echo $year; ?>">
      <input type="hidden" name="month" value="<?php echo $month; ?>">
      <input type="hidden" name="div" value="1">
      <span class="lead"><strong>DIVISION 3</strong></span>
      <?php
      foreach ($divisions as $division):
        if ($division['division'] == 3) {
          $updated = $division['profile_update'];//checks whether profile has been updated for this division
        }
    endforeach;
    if ($updated == 0) {
      $data = array(
        'id' => 'div1',
        'type' => 'submit',
        'content' => 'Update Profiles - Division 3',
        'class' => 'btn btn-info pull-right'
      );
      echo form_button($data);
    } else { ?>
      <button class = "btn btn-success pull-right" disabled>Division 3 - profiles uopdated</button>
      <?php }
      ?>
      <br>
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
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
              <td class="score-col">
                <?php echo $result['player1_score']; ?>
                <input type="hidden" min="0" max="3" class="text-center score-input form-control" name="<?php $num1 = 'p1'. $c; echo $num1; ?>" value="<?php echo set_value('$num1', $result['player1_score']); ?>">
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
              <td class="score-col">
                <?php echo $result['player2_score']; ?>
                <input type="hidden" min="0" max="3" class="text-center score-input form-control" name="<?php $num2 = 'p2'. $c; echo $num2;  ?>" value="<?php echo set_value('$num2', $result['player2_score']); ?>">
              </td>
              <td class="date-col">
                <?php echo $result['date']; ?>
                <input type="hidden" min="0" max="31" class="date-input" name="<?php $date = 'date' . $c; echo $date; ?>" value="<?php echo set_value('$date', $result['date']); ?>">
              </td>
              <td class="day-col">
                <?php echo $result['day']; ?>
                <input type="hidden" name="<?php $day = 'day' . $c; echo $day; $c++; ?>" class="form-control text-center" value="<?php echo $result['day']; ?>">
              </td>
            </tr>
            <?php } endforeach;  ?>
          </tbody>
        </table>
      </div>
      <input type="hidden" name="num_records" value="<?php echo $c - 1; ?>">
      <?php echo form_close(); ?>
    </div>
  </div>
  <div class="row">
    <?php $updated = 0; //initialises 'profile updated' indicator ?>
    <div class="col-md-10 col-md-offset-1">
      <?php echo form_open('update_profiles'); ?>
      <input type="hidden" name="year" value="<?php echo $year; ?>">
      <input type="hidden" name="month" value="<?php echo $month; ?>">
      <input type="hidden" name="div" value="1">
      <span class="lead"><strong>DIVISION 4</strong></span>
      <?php
      foreach ($divisions as $division):
        if ($division['division'] == 4) {
          $updated = $division['profile_update'];//checks whether profile has been updated for this division
        }
    endforeach;
    if ($updated == 0) {
      $data = array(
        'id' => 'div1',
        'type' => 'submit',
        'content' => 'Update Profiles - Division 4',
        'class' => 'btn btn-info pull-right'
      );
      echo form_button($data);
    } else { ?>
      <button class = "btn btn-success pull-right" disabled>Division 4 - profiles updated</button>
      <?php }
      ?>
      <br>
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
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
              <td class="score-col">
                <?php echo $result['player1_score']; ?>
                <input type="hidden" min="0" max="3" class="text-center score-input form-control" name="<?php $num1 = 'p1'. $c; echo $num1; ?>" value="<?php echo set_value('$num1', $result['player1_score']); ?>">
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
              <td class="score-col">
                <?php echo $result['player2_score']; ?>
                <input type="hidden" min="0" max="3" class="text-center score-input form-control" name="<?php $num2 = 'p2'. $c; echo $num2;  ?>" value="<?php echo set_value('$num2', $result['player2_score']); ?>">
              </td>
              <td class="date-col">
                <?php echo $result['date']; ?>
                <input type="hidden" min="0" max="31" class="date-input" name="<?php $date = 'date' . $c; echo $date; ?>" value="<?php echo set_value('$date', $result['date']); ?>">
              </td>
              <td class="day-col">
                <?php echo $result['day']; ?>
                <input type="hidden" name="<?php $day = 'day' . $c; echo $day; $c++; ?>" class="form-control text-center" value="<?php echo $result['day']; ?>">
              </td>
            </tr>
            <?php } endforeach;  ?>
          </tbody>
        </table>
      </div>
      <input type="hidden" name="num_records" value="<?php echo $c - 1; ?>">
      <?php echo form_close(); ?>
    </div>
  </div>
  <div class="row">
    <?php $updated = 0; //initialises 'profile updated' indicator ?>
    <div class="col-md-10 col-md-offset-1">
      <?php echo form_open('update_profiles'); ?>
      <input type="hidden" name="year" value="<?php echo $year; ?>">
      <input type="hidden" name="month" value="<?php echo $month; ?>">
      <input type="hidden" name="div" value="1">
      <span class="lead"><strong>DIVISION 5</strong></span>
      <?php
      foreach ($divisions as $division):
        if ($division['division'] == 5) {
          $updated = $division['profile_update'];//checks whether profile has been updated for this division
        }
    endforeach;
    if ($updated == 0) {
      $data = array(
        'id' => 'div1',
        'type' => 'submit',
        'content' => 'Update Profiles - Division 5',
        'class' => 'btn btn-info pull-right'
      );
      echo form_button($data);
    } else { ?>
      <button class="btn btn-success pull-right" disabled>Division 5 - profiles updated</button>
      <?php }
      ?>
      <br>
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
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
              <td class="score-col">
                <?php echo $result['player1_score']; ?>
                <input type="hidden" min="0" max="3" class="text-center score-input form-control" name="<?php $num1 = 'p1'. $c; echo $num1; ?>" value="<?php echo set_value('$num1', $result['player1_score']); ?>">
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
              <td class="score-col">
                <?php echo $result['player2_score']; ?>
                <input type="hidden" min="0" max="3" class="text-center score-input form-control" name="<?php $num2 = 'p2'. $c; echo $num2;  ?>" value="<?php echo set_value('$num2', $result['player2_score']); ?>">
              </td>
              <td class="date-col">
                <?php echo $result['date']; ?>
                <input type="hidden" min="0" max="31" class="date-input" name="<?php $date = 'date' . $c; echo $date; ?>" value="<?php echo set_value('$date', $result['date']); ?>">
              </td>
              <td class="day-col">
                <?php echo $result['day']; ?>
                <input type="hidden" name="<?php $day = 'day' . $c; echo $day; $c++; ?>" class="form-control text-center" value="<?php echo $result['day']; ?>">
              </td>
            </tr>
            <?php } endforeach;  ?>
          </tbody>
        </table>
      </div>
      <input type="hidden" name="num_records" value="<?php echo $c - 1; ?>">
      <?php echo form_close(); ?>
    </div>
  </div>
  <div class="row">
    <?php $updated = 0; //initialises 'profile updated' indicator ?>
    <div class="col-md-10 col-md-offset-1">
      <?php echo form_open('update_profiles'); ?>
      <input type="hidden" name="year" value="<?php echo $year; ?>">
      <input type="hidden" name="month" value="<?php echo $month; ?>">
      <input type="hidden" name="div" value="1">
      <span class="lead"><strong>DIVISION 6</strong></span>
      <?php
      foreach ($divisions as $division):
        if ($division['division'] == 6) {
          $updated = $division['profile_update'];//checks whether profile has been updated for this division
        }
    endforeach;
    if ($updated == 0) {
      $data = array(
        'id' => 'div1',
        'type' => 'submit',
        'content' => 'Update Profiles - Division 6',
        'class' => 'btn btn-info pull-right'
      );
      echo form_button($data);
    } else { ?>
      <button class="btn btn-success pull-right" disabled>Division 6 - profiles updated</button>
      <?php }
      ?>
      <br>
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
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
              <td class="score-col">
                <?php echo $result['player1_score']; ?>
                <input type="hidden" min="0" max="3" class="text-center score-input form-control" name="<?php $num1 = 'p1'. $c; echo $num1; ?>" value="<?php echo set_value('$num1', $result['player1_score']); ?>">
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
              <td class="score-col">
                <?php echo $result['player2_score']; ?>
                <input type="hidden" min="0" max="3" class="text-center score-input form-control" name="<?php $num2 = 'p2'. $c; echo $num2;  ?>" value="<?php echo set_value('$num2', $result['player2_score']); ?>">
              </td>
              <td class="date-col">
                <?php echo $result['date']; ?>
                <input type="hidden" min="0" max="31" class="date-input" name="<?php $date = 'date' . $c; echo $date; ?>" value="<?php echo set_value('$date', $result['date']); ?>">
              </td>
              <td class="day-col">
                <?php echo $result['day']; ?>
                <input type="hidden" name="<?php $day = 'day' . $c; echo $day; $c++; ?>" class="form-control text-center" value="<?php echo $result['day']; ?>">
              </td>
            </tr>
            <?php } endforeach;  ?>
          </tbody>
        </table>
      </div>
      <input type="hidden" name="num_records" value="<?php echo $c - 1; ?>">
      <?php echo form_close(); ?>
    </div>
  </div>
</div>

<?php } else { ?>
<div class="spacing-sides">
<img src="<?php echo base_url();?>images/web-lock.png"><br><br>
<p class="text-warning">You are not an admin, so you do not have access to this page</p><br>
<?php } ?>
