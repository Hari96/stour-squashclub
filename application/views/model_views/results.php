<h1>Results</h1>
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
  <div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-8">
      <span class="lead"><strong>DIVISION 1</strong></span>
      <table class="table table-responsive table-bordered">
        <thead>
          <tr><th></th>
          <?php $c = 0; $nameArr = array(); $idArr = array();
            foreach ($players as $player):
              if ($player['current_league'] == 1) {
                $name = $player['fName'] . " " . $player['lName'];
                $idArr[$c] = $player['id'];
                echo "<th>" . $player['lName'] . "</th>";
                $nameArr[$c] = $name;
                $c++;
            }
            endforeach; ?>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php
          for ($i = 0; $i < $c; $i++) {
            echo "<tr> <td>" . $nameArr[$i] . "</td>";
            $total = 0;
            for ($j = 0; $j < $c; $j++) {
              echo "<td>";
              if ($idArr[$i] == $idArr[$j]) {
                echo "-";
              } else {
                foreach ($results as $result):
                  if ($result['division'] == 1) {
                    if ($idArr[$i] == $result['player1_id']) {
                      if ($idArr[$j] == $result['player2_id']) {
                        $total= $total + $result['player1_score'];
                        echo $result['player1_score'];
                      }
                    }
                    if ($idArr[$i] == $result['player2_id']) {
                      if ($idArr[$j] == $result['player1_id']) {
                        $total= $total + $result['player2_score'];
                        echo $result['player2_score'];
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
    <div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-8">
      <span class="lead"><strong>DIVISION 2</strong></span>
      <table class="table table-responsive table-bordered">
        <thead>
          <tr><th></th>
          <?php $c = 0; $nameArr = array(); foreach ($players as $player):
            if ($player['current_league'] == 2) {
              $name = $player['fName'] . " " . $player['lName'];
              echo "<th>" . $player['lName'] . "</th>";
              $nameArr[$c] = $name;
              $c++;
            }
            endforeach; ?>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php
          for ($i = 0; $i < $c; $i++) {
            echo "<tr> <td>" . $nameArr[$i] . "</td>";
            for ($j = 0; $j < $c; $j++) {
              echo "<td></td>";
            }
            echo "<td></td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-8">
      <span class="lead"><strong>DIVISION 3</strong></span>
      <table class="table table-responsive table-bordered">
        <thead>
          <tr><th></th>
          <?php $c = 0; $nameArr = array(); foreach ($players as $player):
            if ($player['current_league'] == 3) {
              $name = $player['fName'] . " " . $player['lName'];
              echo "<th>" . $player['lName'] . "</th>";
              $nameArr[$c] = $name;
              $c++;
            }
            endforeach; ?>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php
          for ($i = 0; $i < $c; $i++) {
            echo "<tr> <td>" . $nameArr[$i] . "</td>";
            for ($j = 0; $j < $c; $j++) {
              echo "<td></td>";
            }
            echo "<td></td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-8">
      <span class="lead"><strong>DIVISION 4</strong></span>
      <table class="table table-responsive table-bordered">
        <thead>
          <tr><th></th>
          <?php $c = 0; $nameArr = array(); foreach ($players as $player):
            if ($player['current_league'] == 4) {
              $name = $player['fName'] . " " . $player['lName'];
              echo "<th>" . $player['lName'] . "</th>";
              $nameArr[$c] = $name;
              $c++;
            }
            endforeach; ?>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php
          for ($i = 0; $i < $c; $i++) {
            echo "<tr> <td>" . $nameArr[$i] . "</td>";
            for ($j = 0; $j < $c; $j++) {
              echo "<td></td>";
            }
            echo "<td></td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
