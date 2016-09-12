<h2>League Tables for <?php
$partYear = substr_replace($year, "'", 0, 2);
echo ucfirst($month) . " " . $partYear;
?></h2>
<div class="container-fluid">
  <?php echo form_open('display_results') ;?>
  <input type="hidden" name="display" value="tables">
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
        'content' => 'Show tables',
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
          <tr><th>Player</th><th>Played</th><th>Won</th><th>Drawn</th><th>Lost</th><th>Points</th></tr>
        </thead>
        <tbody>
          <?php
          $c = 0;
            foreach ($leagues as $league):
              if ($league[$month] == 1) {
                $gamesWon = 0; $gamesLost = 0; $gamesDrawn = 0; $gamesPlayed = 0; $score= 0; $tScore = 0;
                echo "<tr>";
                foreach ($players as $player):
                  if ($player['id'] == $league['user_id']) {
                    $name = $player['fName'] . " " . $player['lName'];
                    echo "<td>" . $name . "</td>";
                  }
                endforeach;
                foreach ($results as $result):
                  if ($result['division'] == 1) {
                    if ($result['player1_id'] == $league['user_id']) {
                      if ($result['player1_score'] == 3) {
                        $gamesWon++;
                        $gamesPlayed++;
                        switch ($result['player2_score']) {
                          case 0: $score = 6;
                          break;
                          case 1: $score = 5;
                          break;
                          case 2: $score = 4;
                          break;
                        }
                        $tScore = $tScore + $score;
                      } else {
                        if ($result['player2_score'] == 3) {
                          $gamesLost++;
                          $gamesPlayed++;
                          switch ($result['player1_score']) {
                            case 0: $score = 0;
                            break;
                            case 1: $score = 1;
                            break;
                            case 2: $score = 2;
                            break;
                          }
                          $tScore = $tScore + $score;
                        } else {
                          if (($result['player1_score'] == $result['player2_score']) && ($result['player1_score'] != 0 && $result['player2_score'] != 0)) {
                            $gamesDrawn++;
                            $gamesPlayed++;
                            $tScore = $tScore + 3;
                          }
                        }
                      }
                    }
                    if ($result['player2_id'] == $league['user_id']) {
                      if ($result['player2_score'] == 3) {
                        $gamesWon++;
                        $gamesPlayed++;
                        switch ($result['player1_score']) {
                          case 0: $score = 6;
                          break;
                          case 1: $score = 5;
                          break;
                          case 2: $score = 4;
                          break;
                        }
                        $tScore = $tScore + $score;
                      } else {
                        if ($result['player1_score'] == 3) {
                          $gamesLost++;
                          $gamesPlayed++;
                          switch ($result['player2_score']) {
                            case 0: $score = 0;
                            break;
                            case 1: $score = 1;
                            break;
                            case 2: $score = 2;
                            break;
                          }
                          $tScore = $tScore + $score;
                        } else {
                          if (($result['player2_score'] == $result['player1_score']) && ($result['player2_score'] != 0 && $result['player1_score'] != 0)) {
                            $gamesDrawn++;
                            $gamesPlayed++;
                            $tScore = $tScore + 3;
                          }
                        }
                      }
                    }
                   }
                endforeach;
                echo "<td>" . $gamesPlayed . "</td><td>" . $gamesWon . "</td><td>" . $gamesDrawn . "</td><td>" . $gamesLost . "</td><td>" . $tScore . "</td></tr>";
              }
            endforeach;
          ?>
        </tbody>
      </table>
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
        <tr><th>Player</th><th>Played</th><th>Won</th><th>Drawn</th><th>Lost</th><th>Points</th></tr>
      </thead>
      <tbody>
        <?php
        $c = 0;
          foreach ($leagues as $league):
            if ($league[$month] == 2) {
              $gamesWon = 0; $gamesLost = 0; $gamesDrawn = 0; $gamesPlayed = 0; $score= 0; $tScore = 0;
              echo "<tr>";
              foreach ($players as $player):
                if ($player['id'] == $league['user_id']) {
                  $name = $player['fName'] . " " . $player['lName'];
                  echo "<td>" . $name . "</td>";
                }
              endforeach;
              foreach ($results as $result):
                if ($result['division'] == 2) {
                  if ($result['player1_id'] == $league['user_id']) {
                    if ($result['player1_score'] == 3) {
                      $gamesWon++;
                      $gamesPlayed++;
                      switch ($result['player2_score']) {
                        case 0: $score = 6;
                        break;
                        case 1: $score = 5;
                        break;
                        case 2: $score = 4;
                        break;
                      }
                      $tScore = $tScore + $score;
                    } else {
                      if ($result['player2_score'] == 3) {
                        $gamesLost++;
                        $gamesPlayed++;
                        switch ($result['player1_score']) {
                          case 0: $score = 0;
                          break;
                          case 1: $score = 1;
                          break;
                          case 2: $score = 2;
                          break;
                        }
                        $tScore = $tScore + $score;
                      } else {
                        if (($result['player1_score'] == $result['player2_score']) && ($result['player1_score'] != 0 && $result['player2_score'] != 0)) {
                          $gamesDrawn++;
                          $gamesPlayed++;
                          $tScore = $tScore + 3;
                        }
                      }
                    }
                  }
                  if ($result['player2_id'] == $league['user_id']) {
                    if ($result['player2_score'] == 3) {
                      $gamesWon++;
                      $gamesPlayed++;
                      switch ($result['player1_score']) {
                        case 0: $score = 6;
                        break;
                        case 1: $score = 5;
                        break;
                        case 2: $score = 4;
                        break;
                      }
                      $tScore = $tScore + $score;
                    } else {
                      if ($result['player1_score'] == 3) {
                        $gamesLost++;
                        $gamesPlayed++;
                        switch ($result['player2_score']) {
                          case 0: $score = 0;
                          break;
                          case 1: $score = 1;
                          break;
                          case 2: $score = 2;
                          break;
                        }
                        $tScore = $tScore + $score;
                      } else {
                        if (($result['player2_score'] == $result['player1_score']) && ($result['player2_score'] != 0 && $result['player1_score'] != 0)) {
                          $gamesDrawn++;
                          $gamesPlayed++;
                          $tScore = $tScore + 3;
                        }
                      }
                    }
                  }
                 }
              endforeach;
              echo "<td>" . $gamesPlayed . "</td><td>" . $gamesWon . "</td><td>" . $gamesDrawn . "</td><td>" . $gamesLost . "</td><td>" . $tScore . "</td></tr>";
            }
          endforeach;
        ?>
      </tbody>
    </table>
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
        <tr><th>Player</th><th>Played</th><th>Won</th><th>Drawn</th><th>Lost</th><th>Points</th></tr>
      </thead>
      <tbody>
        <?php
        $c = 0;
          foreach ($leagues as $league):
            if ($league[$month] == 3) {
              $gamesWon = 0; $gamesLost = 0; $gamesDrawn = 0; $gamesPlayed = 0; $score= 0; $tScore = 0;
              echo "<tr>";
              foreach ($players as $player):
                if ($player['id'] == $league['user_id']) {
                  $name = $player['fName'] . " " . $player['lName'];
                  echo "<td>" . $name . "</td>";
                }
              endforeach;
              foreach ($results as $result):
                if ($result['division'] == 3) {
                  if ($result['player1_id'] == $league['user_id']) {
                    if ($result['player1_score'] == 3) {
                      $gamesWon++;
                      $gamesPlayed++;
                      switch ($result['player2_score']) {
                        case 0: $score = 6;
                        break;
                        case 1: $score = 5;
                        break;
                        case 2: $score = 4;
                        break;
                      }
                      $tScore = $tScore + $score;
                    } else {
                      if ($result['player2_score'] == 3) {
                        $gamesLost++;
                        $gamesPlayed++;
                        switch ($result['player1_score']) {
                          case 0: $score = 0;
                          break;
                          case 1: $score = 1;
                          break;
                          case 2: $score = 2;
                          break;
                        }
                        $tScore = $tScore + $score;
                      } else {
                        if (($result['player1_score'] == $result['player2_score']) && ($result['player1_score'] != 0 && $result['player2_score'] != 0)) {
                          $gamesDrawn++;
                          $gamesPlayed++;
                          $tScore = $tScore + 3;
                        }
                      }
                    }
                  }
                  if ($result['player2_id'] == $league['user_id']) {
                    if ($result['player2_score'] == 3) {
                      $gamesWon++;
                      $gamesPlayed++;
                      switch ($result['player1_score']) {
                        case 0: $score = 6;
                        break;
                        case 1: $score = 5;
                        break;
                        case 2: $score = 4;
                        break;
                      }
                      $tScore = $tScore + $score;
                    } else {
                      if ($result['player1_score'] == 3) {
                        $gamesLost++;
                        $gamesPlayed++;
                        switch ($result['player2_score']) {
                          case 0: $score = 0;
                          break;
                          case 1: $score = 1;
                          break;
                          case 2: $score = 2;
                          break;
                        }
                        $tScore = $tScore + $score;
                      } else {
                        if (($result['player2_score'] == $result['player1_score']) && ($result['player2_score'] != 0 && $result['player1_score'] != 0)) {
                          $gamesDrawn++;
                          $gamesPlayed++;
                          $tScore = $tScore + 3;
                        }
                      }
                    }
                  }
                 }
              endforeach;
              echo "<td>" . $gamesPlayed . "</td><td>" . $gamesWon . "</td><td>" . $gamesDrawn . "</td><td>" . $gamesLost . "</td><td>" . $tScore . "</td></tr>";
            }
          endforeach;
        ?>
      </tbody>
    </table>
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
        <tr><th>Player</th><th>Played</th><th>Won</th><th>Drawn</th><th>Lost</th><th>Points</th></tr>
      </thead>
      <tbody>
        <?php
        $c = 0;
          foreach ($leagues as $league):
            if ($league[$month] == 4) {
              $gamesWon = 0; $gamesLost = 0; $gamesDrawn = 0; $gamesPlayed = 0; $score = 0; $tScore = 0;
              echo "<tr>";
              foreach ($players as $player):
                if ($player['id'] == $league['user_id']) {
                  $name = $player['fName'] . " " . $player['lName'];
                  echo "<td>" . $name . "</td>";
                }
              endforeach;
              foreach ($results as $result):
                if ($result['division'] == 4) {
                  if ($result['player1_id'] == $league['user_id']) {
                    if ($result['player1_score'] == 3) {
                      $gamesWon++;
                      $gamesPlayed++;
                      switch ($result['player2_score']) {
                        case 0: $score = 6;
                        break;
                        case 1: $score = 5;
                        break;
                        case 2: $score = 4;
                        break;
                      }
                      $tScore = $tScore + $score;
                    } else {
                      if ($result['player2_score'] == 3) {
                        $gamesLost++;
                        $gamesPlayed++;
                        switch ($result['player1_score']) {
                          case 0: $score = 0;
                          break;
                          case 1: $score = 1;
                          break;
                          case 2: $score = 2;
                          break;
                        }
                        $tScore = $tScore + $score;
                      } else {
                        if (($result['player1_score'] == $result['player2_score']) && ($result['player1_score'] != 0 && $result['player2_score'] != 0)) {
                          $gamesDrawn++;
                          $gamesPlayed++;
                          $tScore = $tScore + 3;
                        }
                      }
                    }
                  }
                  if ($result['player2_id'] == $league['user_id']) {
                    if ($result['player2_score'] == 3) {
                      $gamesWon++;
                      $gamesPlayed++;
                      switch ($result['player1_score']) {
                        case 0: $score = 6;
                        break;
                        case 1: $score = 5;
                        break;
                        case 2: $score = 4;
                        break;
                      }
                      $tScore = $tScore + $score;
                    } else {
                      if ($result['player1_score'] == 3) {
                        $gamesLost++;
                        $gamesPlayed++;
                        switch ($result['player2_score']) {
                          case 0: $score = 0;
                          break;
                          case 1: $score = 1;
                          break;
                          case 2: $score = 2;
                          break;
                        }
                        $tScore = $tScore + $score;
                      } else {
                        if (($result['player2_score'] == $result['player1_score']) && ($result['player2_score'] != 0 && $result['player1_score'] != 0)) {
                          $gamesDrawn++;
                          $gamesPlayed++;
                          $tScore = $tScore + 3;
                        }
                      }
                    }
                  }
                 }
              endforeach;
              echo "<td>" . $gamesPlayed . "</td><td>" . $gamesWon . "</td><td>" . $gamesDrawn . "</td><td>" . $gamesLost . "</td><td>" . $tScore . "</td></tr>";
            }
          endforeach;
        ?>
      </tbody>
    </table>
  </div>
</div>
</div>
