<h2>Results for <?php
$partYear = substr_replace($year, "'", 0, 2);
echo ucfirst($month) . " " . $partYear;
?></h2>
<div class="container-fluid">
  <?php echo form_open('display_results') ;?>
  <input type="hidden" name="display" value="results">
  <div class="row spacing-bottom">
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
  <div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-8 table-responsive">
      <span class="lead"><strong>DIVISION 1</strong></span>
      <table class="table table-bordered">
        <thead>
          <tr><th colspan="4"><span class="pull-left"><?php echo ucfirst($month) . " " . $year; ?></span></th></tr>
        </thead>
        <tbody>
          <?php
          foreach ($results as $result):
            if ($result['division'] == 1 && ($result['player1_score'] != 0 || $result['player2_score'] != 0)) {
              foreach ($players as $player):
                if ($player['id'] == $result['player1_id']) {
                  $player1 = $player['fName'] . " " . $player['lName'];
                }
                if ($player['id'] == $result['player2_id']) {
                  $player2 = $player['fName'] . " " . $player['lName'];
                }
              endforeach;
            echo "<tr><td>" . $result['day'] . " " . $result['date'] . "</td><td>" . $player1 . "</td><td>" . $result['player1_score'] . "-" . $result['player2_score'] . "</td><td>" . $player2 . "</td></tr>";
          }
          endforeach;
          ?>
        </tbody>
      </table>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr><th></th>
            <?php $c = 0; $nameArr = array(); $idArr = array();
            foreach ($leagues as $league):
              if ($league[$month] == 1) {
                foreach ($players as $player):
                  if($player['id'] == $league['user_id']) {
                    $fName = $player['fName'];
                    $lName = $player['lName'];
                    $name = $fName . " " . $lName;
                    $nameArr[$c] = $name;
                    $idArr[$c] = $player['id'];
                    $c++;
                  }
                endforeach;
                echo "<th>" . $lName . "</th>";
              }
            endforeach;
            ?>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <?php
            for ($i = 0; $i < $c; $i++) {
              echo "<tr> <td>" . $nameArr[$i] . "</td>";
              $total = 0; $player1_score = 0; $player2_score = 0;
              for ($j = 0; $j < $c; $j++) {
                echo "<td>";
                if ($idArr[$i] == $idArr[$j]) {
                  echo "-";
                } else {
                  foreach ($results as $result):
                    if ($result['division'] == 1) {
                      if ($idArr[$i] == $result['player1_id']) {
                        if ($idArr[$j] == $result['player2_id']) {
                          if ($result['player1_score'] == 3){
                            switch($result['player2_score']) {
                              case 0:
                              $player1_score = 6;
                              $player2_score = 0;
                              break;
                              case 1:
                              $player1_score = 5;
                              $player2_score = 1;
                              break;
                              case 2:
                              $player1_score = 4;
                              $player2_score = 2;
                            }
                          }
                          if ($result['player1_score'] == 2) {
                            switch($result['player2_score']) {
                              case 0:
                              $player1_score = 5;
                              $Player2_score = 1;
                              break;
                              case 1:
                              $player1_score = 4;
                              $player2_score = 2;
                              break;
                              case 2:
                              $player1_score = 3;
                              $player2_score = 3;
                              break;
                              case 3:
                              $player1_score = 2;
                              $player2_score = 4;
                            }
                          }
                          if ($result['player1_score'] == 1) {
                            switch($result['player2_score']) {
                              case 0:
                              $player1_score = 4;
                              $Player2_score = 2;
                              break;
                              case 1:
                              $player1_score = 3;
                              $player2_score = 3;
                              break;
                              case 2:
                              $player1_score = 2;
                              $player2_score = 4;
                              case 3:
                              $player1_score = 1;
                              $player2_score = 5;
                            }
                          }
                          if ($result['player1_score'] == 0) {
                            switch($result['player2_score']) {
                              case 1:
                              $player1_score = 2;
                              $Player2_score = 4;
                              break;
                              case 2:
                              $player1_score = 1;
                              $player2_score = 5;
                              break;
                              case 3:
                              $player1_score = 0;
                              $player2_score = 6;
                            }
                          }
                          $total= $total + $player1_score;
                          echo $player1_score;
                        }
                      }
                      if ($idArr[$i] == $result['player2_id']) {
                        if ($idArr[$j] == $result['player1_id']) {
                          if ($result['player2_score'] == 3){
                            switch($result['player1_score']) {
                              case 0:
                              $player2_score = 6;
                              $player1_score = 0;
                              break;
                              case 1:
                              $player2_score = 5;
                              $player1_score = 1;
                              break;
                              case 2:
                              $player2_score = 4;
                              $player1_score = 2;
                            }
                          }
                          if ($result['player2_score'] == 2) {
                            switch($result['player1_score']) {
                              case 0:
                              $player2_score = 5;
                              $player1_score = 1;
                              break;
                              case 1:
                              $player2_score = 4;
                              $player1_score = 2;
                              break;
                              case 2:
                              $player2_score = 3;
                              $player1_score = 3;
                              break;
                              case 3:
                              $player2_score = 2;
                              $player1_score = 4;
                            }
                          }
                          if ($result['player2_score'] == 1) {
                            switch($result['player1_score']) {
                              case 0:
                              $player2_score = 4;
                              $player1_score = 2;
                              break;
                              case 1:
                              $player2_score = 3;
                              $player1_score = 3;
                              break;
                              case 2:
                              $player2_score = 2;
                              $player1_score = 4;
                              break;
                              case 3:
                              $player2_score = 1;
                              $player1_score = 5;
                            }
                          }
                          if ($result['player2_score'] == 0) {
                            switch($result['player1_score']) {
                              case 1:
                              $player2_score = 2;
                              $player1_score = 4;
                              break;
                              case 2:
                              $player2_score = 1;
                              $player1_score = 5;
                              break;
                              case 3:
                              $player2_score = 0;
                              $player1_score = 6;
                            }
                          }
                          $total= $total + $player2_score;
                          echo $player2_score;
                        }
                      }
                    }
                  endforeach;
                }
                echo "</td>";
                }
                echo "<td>" . $total . "</td></tr>";
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <br>
    <div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-8 table-responsive">
      <span class="lead"><strong>DIVISION 2</strong></span>
      <table class="table table-bordered">
        <thead>
          <tr><th colspan="4"><span class="pull-left"><?php echo ucfirst($month) . " " . $year; ?></span></th></tr>
        </thead>
        <tbody>
          <?php
          foreach ($results as $result):
            if ($result['division'] == 2 && ($result['player1_score'] != 0 || $result['player2_score'] != 0)) {
              foreach ($players as $player):
                if ($player['id'] == $result['player1_id']) {
                  $player1 = $player['fName'] . " " . $player['lName'];
                }
                if ($player['id'] == $result['player2_id']) {
                  $player2 = $player['fName'] . " " . $player['lName'];
                }
              endforeach;
            echo "<tr><td>" . $result['day'] . " " . $result['date'] . "</td><td>" . $player1 . "</td><td>" . $result['player1_score'] . "-" . $result['player2_score'] . "</td><td>" . $player2 . "</td></tr>";
          }
          endforeach;
          ?>
        </tbody>
      </table>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr><th></th>
              <?php $c = 0; $nameArr = array(); $idArr = array();
              foreach ($leagues as $league):
                if ($league[$month] == 2) {
                  foreach ($players as $player):
                    if($player['id'] == $league['user_id']) {
                      $fName = $player['fName'];
                      $lName = $player['lName'];
                      $name = $fName . " " . $lName;
                      $nameArr[$c] = $name;
                      $idArr[$c] = $player['id'];
                      $c++;
                    }
                  endforeach;
                  echo "<th>" . $lName . "</th>";
                }
              endforeach;
              ?>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <?php
            for ($i = 0; $i < $c; $i++) {
              echo "<tr> <td>" . $nameArr[$i] . "</td>";
              $total = 0; $player1_score = 0; $player2_score = 0;
              for ($j = 0; $j < $c; $j++) {
                echo "<td>";
                if ($idArr[$i] == $idArr[$j]) {
                  echo "-";
                } else {
                  foreach ($results as $result):
                    if ($result['division'] == 2) {
                        if ($idArr[$i] == $result['player1_id']) {
                          if ($idArr[$j] == $result['player2_id']) {
                            if ($result['player1_score'] == 3){
                              switch($result['player2_score']) {
                                case 0:
                                $player1_score = 6;
                                $player2_score = 0;
                                break;
                                case 1:
                                $player1_score = 5;
                                $player2_score = 1;
                                break;
                                case 2:
                                $player1_score = 4;
                                $player2_score = 2;
                              }
                            }
                            if ($result['player1_score'] == 2) {
                              switch($result['player2_score']) {
                                case 0:
                                $player1_score = 5;
                                $Player2_score = 1;
                                break;
                                case 1:
                                $player1_score = 4;
                                $player2_score = 2;
                                break;
                                case 2:
                                $player1_score = 3;
                                $player2_score = 3;
                                break;
                                case 3:
                                $player1_score = 2;
                                $player2_score = 4;
                              }
                            }
                            if ($result['player1_score'] == 1) {
                              switch($result['player2_score']) {
                                case 0:
                                $player1_score = 4;
                                $Player2_score = 2;
                                break;
                                case 1:
                                $player1_score = 3;
                                $player2_score = 3;
                                break;
                                case 2:
                                $player1_score = 2;
                                $player2_score = 4;
                                case 3:
                                $player1_score = 1;
                                $player2_score = 5;
                              }
                            }
                            if ($result['player1_score'] == 0) {
                              switch($result['player2_score']) {
                                case 1:
                                $player1_score = 2;
                                $Player2_score = 4;
                                break;
                                case 2:
                                $player1_score = 1;
                                $player2_score = 5;
                                break;
                                case 3:
                                $player1_score = 0;
                                $player2_score = 6;
                              }
                            }
                            $total= $total + $player1_score;
                            echo $player1_score;
                          }
                        }
                        if ($idArr[$i] == $result['player2_id']) {
                          if ($idArr[$j] == $result['player1_id']) {
                            if ($result['player2_score'] == 3){
                              switch($result['player1_score']) {
                                case 0:
                                $player2_score = 6;
                                $player1_score = 0;
                                break;
                                case 1:
                                $player2_score = 5;
                                $player1_score = 1;
                                break;
                                case 2:
                                $player2_score = 4;
                                $player1_score = 2;
                              }
                            }
                            if ($result['player2_score'] == 2) {
                              switch($result['player1_score']) {
                                case 0:
                                $player2_score = 5;
                                $player1_score = 1;
                                break;
                                case 1:
                                $player2_score = 4;
                                $player1_score = 2;
                                break;
                                case 2:
                                $player2_score = 3;
                                $player1_score = 3;
                                break;
                                case 3:
                                $player2_score = 2;
                                $player1_score = 4;
                              }
                            }
                            if ($result['player2_score'] == 1) {
                              switch($result['player1_score']) {
                                case 0:
                                $player2_score = 4;
                                $player1_score = 2;
                                break;
                                case 1:
                                $player2_score = 3;
                                $player1_score = 3;
                                break;
                                case 2:
                                $player2_score = 2;
                                $player1_score = 4;
                                break;
                                case 3:
                                $player2_score = 1;
                                $player1_score = 5;
                              }
                            }
                            if ($result['player2_score'] == 0) {
                              switch($result['player1_score']) {
                                case 1:
                                $player2_score = 2;
                                $player1_score = 4;
                                break;
                                case 2:
                                $player2_score = 1;
                                $player1_score = 5;
                                break;
                                case 3:
                                $player2_score = 0;
                                $player1_score = 6;
                              }
                            }
                            $total= $total + $player2_score;
                            echo $player2_score;
                          }
                        }
                      }
                  endforeach;
                }
                echo "</td>";
                }
                echo "<td>" . $total . "</td></tr>";
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-8 table-responsive">
      <span class="lead"><strong>DIVISION 3</strong></span>
      <table class="table table-bordered">
        <thead>
          <tr><th colspan="4"><span class="pull-left"><?php echo ucfirst($month) . " " . $year; ?></span></th></tr>
        </thead>
        <tbody>
          <?php
          foreach ($results as $result):
            if ($result['division'] == 3 && ($result['player1_score'] != 0 || $result['player2_score'] != 0)) {
              foreach ($players as $player):
                if ($player['id'] == $result['player1_id']) {
                  $player1 = $player['fName'] . " " . $player['lName'];
                }
                if ($player['id'] == $result['player2_id']) {
                  $player2 = $player['fName'] . " " . $player['lName'];
                }
              endforeach;
            echo "<tr><td>" . $result['day'] . " " . $result['date'] . "</td><td>" . $player1 . "</td><td>" . $result['player1_score'] . "-" . $result['player2_score'] . "</td><td>" . $player2 . "</td></tr>";
          }
          endforeach;
          ?>
        </tbody>
      </table>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr><th></th>
              <?php $c = 0; $nameArr = array(); $idArr = array();
              foreach ($leagues as $league):
                if ($league[$month] == 3) {
                  foreach ($players as $player):
                    if($player['id'] == $league['user_id']) {
                      $fName = $player['fName'];
                      $lName = $player['lName'];
                      $name = $fName . " " . $lName;
                      $nameArr[$c] = $name;
                      $idArr[$c] = $player['id'];
                      $c++;
                    }
                  endforeach;
                  echo "<th>" . $lName . "</th>";
                }
              endforeach;
              ?>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <?php
            for ($i = 0; $i < $c; $i++) {
              echo "<tr> <td>" . $nameArr[$i] . "</td>";
              $total = 0; $player1_score = 0; $player2_score = 0;
              for ($j = 0; $j < $c; $j++) {
                echo "<td>";
                if ($idArr[$i] == $idArr[$j]) {
                  echo "-";
                } else {
                  foreach ($results as $result):
                    if ($result['division'] == 3) {
                        if ($idArr[$i] == $result['player1_id']) {
                          if ($idArr[$j] == $result['player2_id']) {
                            if ($result['player1_score'] == 3){
                              switch($result['player2_score']) {
                                case 0:
                                $player1_score = 6;
                                $player2_score = 0;
                                break;
                                case 1:
                                $player1_score = 5;
                                $player2_score = 1;
                                break;
                                case 2:
                                $player1_score = 4;
                                $player2_score = 2;
                              }
                            }
                            if ($result['player1_score'] == 2) {
                              switch($result['player2_score']) {
                                case 0:
                                $player1_score = 5;
                                $Player2_score = 1;
                                break;
                                case 1:
                                $player1_score = 4;
                                $player2_score = 2;
                                break;
                                case 2:
                                $player1_score = 3;
                                $player2_score = 3;
                                break;
                                case 3:
                                $player1_score = 2;
                                $player2_score = 4;
                              }
                            }
                            if ($result['player1_score'] == 1) {
                              switch($result['player2_score']) {
                                case 0:
                                $player1_score = 4;
                                $Player2_score = 2;
                                break;
                                case 1:
                                $player1_score = 3;
                                $player2_score = 3;
                                break;
                                case 2:
                                $player1_score = 2;
                                $player2_score = 4;
                                case 3:
                                $player1_score = 1;
                                $player2_score = 5;
                              }
                            }
                            if ($result['player1_score'] == 0) {
                              switch($result['player2_score']) {
                                case 1:
                                $player1_score = 2;
                                $Player2_score = 4;
                                break;
                                case 2:
                                $player1_score = 1;
                                $player2_score = 5;
                                break;
                                case 3:
                                $player1_score = 0;
                                $player2_score = 6;
                              }
                            }
                            $total= $total + $player1_score;
                            echo $player1_score;
                          }
                        }
                        if ($idArr[$i] == $result['player2_id']) {
                          if ($idArr[$j] == $result['player1_id']) {
                            if ($result['player2_score'] == 3){
                              switch($result['player1_score']) {
                                case 0:
                                $player2_score = 6;
                                $player1_score = 0;
                                break;
                                case 1:
                                $player2_score = 5;
                                $player1_score = 1;
                                break;
                                case 2:
                                $player2_score = 4;
                                $player1_score = 2;
                              }
                            }
                            if ($result['player2_score'] == 2) {
                              switch($result['player1_score']) {
                                case 0:
                                $player2_score = 5;
                                $player1_score = 1;
                                break;
                                case 1:
                                $player2_score = 4;
                                $player1_score = 2;
                                break;
                                case 2:
                                $player2_score = 3;
                                $player1_score = 3;
                                break;
                                case 3:
                                $player2_score = 2;
                                $player1_score = 4;
                              }
                            }
                            if ($result['player2_score'] == 1) {
                              switch($result['player1_score']) {
                                case 0:
                                $player2_score = 4;
                                $player1_score = 2;
                                break;
                                case 1:
                                $player2_score = 3;
                                $player1_score = 3;
                                break;
                                case 2:
                                $player2_score = 2;
                                $player1_score = 4;
                                break;
                                case 3:
                                $player2_score = 1;
                                $player1_score = 5;
                              }
                            }
                            if ($result['player2_score'] == 0) {
                              switch($result['player1_score']) {
                                case 1:
                                $player2_score = 2;
                                $player1_score = 4;
                                break;
                                case 2:
                                $player2_score = 1;
                                $player1_score = 5;
                                break;
                                case 3:
                                $player2_score = 0;
                                $player1_score = 6;
                              }
                            }
                            $total= $total + $player2_score;
                            echo $player2_score;
                          }
                        }
                      }
                  endforeach;
                }
                echo "</td>";
                }
                echo "<td>" . $total . "</td></tr>";
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-8 table-responsive">
      <span class="lead"><strong>DIVISION 4</strong></span>
      <table class="table table-bordered">
        <thead>
          <tr><th colspan="4"><span class="pull-left"><?php echo ucfirst($month) . " " . $year; ?></span></th></tr>
        </thead>
        <tbody>
          <?php
          foreach ($results as $result):
            if ($result['division'] == 4 && ($result['player1_score'] != 0 || $result['player2_score'] != 0)) {
              foreach ($players as $player):
                if ($player['id'] == $result['player1_id']) {
                  $player1 = $player['fName'] . " " . $player['lName'];
                }
                if ($player['id'] == $result['player2_id']) {
                  $player2 = $player['fName'] . " " . $player['lName'];
                }
              endforeach;
            echo "<tr><td>" . $result['day'] . " " . $result['date'] . "</td><td>" . $player1 . "</td><td>" . $result['player1_score'] . "-" . $result['player2_score'] . "</td><td>" . $player2 . "</td></tr>";
          }
          endforeach;
          ?>
        </tbody>
      </table>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr><th></th>
              <?php $c = 0; $nameArr = array(); $idArr = array();
              foreach ($leagues as $league):
                if ($league[$month] == 4) {
                  foreach ($players as $player):
                    if($player['id'] == $league['user_id']) {
                      $fName = $player['fName'];
                      $lName = $player['lName'];
                      $name = $fName . " " . $lName;
                      $nameArr[$c] = $name;
                      $idArr[$c] = $player['id'];
                      $c++;
                    }
                  endforeach;
                  echo "<th>" . $lName . "</th>";
                }
              endforeach;
              ?>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <?php
            for ($i = 0; $i < $c; $i++) {
              echo "<tr> <td>" . $nameArr[$i] . "</td>";
              $total = 0; $player1_score = 0; $player2_score = 0;
              for ($j = 0; $j < $c; $j++) {
                echo "<td>";
                if ($idArr[$i] == $idArr[$j]) {
                  echo "-";
                } else {
                  foreach ($results as $result):
                    if ($result['division'] == 4) {
                        if ($idArr[$i] == $result['player1_id']) {
                          if ($idArr[$j] == $result['player2_id']) {
                            if ($result['player1_score'] == 3){
                              switch($result['player2_score']) {
                                case 0:
                                $player1_score = 6;
                                $player2_score = 0;
                                break;
                                case 1:
                                $player1_score = 5;
                                $player2_score = 1;
                                break;
                                case 2:
                                $player1_score = 4;
                                $player2_score = 2;
                              }
                            }
                            if ($result['player1_score'] == 2) {
                              switch($result['player2_score']) {
                                case 0:
                                $player1_score = 5;
                                $Player2_score = 1;
                                break;
                                case 1:
                                $player1_score = 4;
                                $player2_score = 2;
                                break;
                                case 2:
                                $player1_score = 3;
                                $player2_score = 3;
                                break;
                                case 3:
                                $player1_score = 2;
                                $player2_score = 4;
                              }
                            }
                            if ($result['player1_score'] == 1) {
                              switch($result['player2_score']) {
                                case 0:
                                $player1_score = 4;
                                $Player2_score = 2;
                                break;
                                case 1:
                                $player1_score = 3;
                                $player2_score = 3;
                                break;
                                case 2:
                                $player1_score = 2;
                                $player2_score = 4;
                                case 3:
                                $player1_score = 1;
                                $player2_score = 5;
                              }
                            }
                            if ($result['player1_score'] == 0) {
                              switch($result['player2_score']) {
                                case 1:
                                $player1_score = 2;
                                $Player2_score = 4;
                                break;
                                case 2:
                                $player1_score = 1;
                                $player2_score = 5;
                                break;
                                case 3:
                                $player1_score = 0;
                                $player2_score = 6;
                              }
                            }
                            $total= $total + $player1_score;
                            echo $player1_score;
                          }
                        }
                        if ($idArr[$i] == $result['player2_id']) {
                          if ($idArr[$j] == $result['player1_id']) {
                            if ($result['player2_score'] == 3){
                              switch($result['player1_score']) {
                                case 0:
                                $player2_score = 6;
                                $player1_score = 0;
                                break;
                                case 1:
                                $player2_score = 5;
                                $player1_score = 1;
                                break;
                                case 2:
                                $player2_score = 4;
                                $player1_score = 2;
                              }
                            }
                            if ($result['player2_score'] == 2) {
                              switch($result['player1_score']) {
                                case 0:
                                $player2_score = 5;
                                $player1_score = 1;
                                break;
                                case 1:
                                $player2_score = 4;
                                $player1_score = 2;
                                break;
                                case 2:
                                $player2_score = 3;
                                $player1_score = 3;
                                break;
                                case 3:
                                $player2_score = 2;
                                $player1_score = 4;
                              }
                            }
                            if ($result['player2_score'] == 1) {
                              switch($result['player1_score']) {
                                case 0:
                                $player2_score = 4;
                                $player1_score = 2;
                                break;
                                case 1:
                                $player2_score = 3;
                                $player1_score = 3;
                                break;
                                case 2:
                                $player2_score = 2;
                                $player1_score = 4;
                                break;
                                case 3:
                                $player2_score = 1;
                                $player1_score = 5;
                              }
                            }
                            if ($result['player2_score'] == 0) {
                              switch($result['player1_score']) {
                                case 1:
                                $player2_score = 2;
                                $player1_score = 4;
                                break;
                                case 2:
                                $player2_score = 1;
                                $player1_score = 5;
                                break;
                                case 3:
                                $player2_score = 0;
                                $player1_score = 6;
                              }
                            }
                            $total= $total + $player2_score;
                            echo $player2_score;
                          }
                        }
                      }                        
                  endforeach;
                }
                echo "</td>";
                }
                echo "<td>" . $total . "</td></tr>";
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
