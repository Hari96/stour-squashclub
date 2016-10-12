<?php
$date = date('Y-m-d');
$year = date('Y', strtotime($date));
?>
<h2>Player profile <?php echo $year;?></h2>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-3">
    <p>Profile based on this year's results only.</p>
    <p><small>[Please note: If you have JavaScript disabled you will not see the overall analysis.]</small></p>
    </div>
    <div class="col-md-7 table-responsive">
      <?php
      echo "<h2>" . $fullname . "</h2>";
      if(isset($_SESSION['logged_in'])) {
        echo "<span>contact: " . $mobile . "</span>";
      } else {
      ?>
        <span>contact: <a href="<?php echo base_url(); ?>model_views/view/login">Log in/Register</a> to view contact details</span>
      <?php } ?>
      <table class="table table-bordered table-striped spacing-top">
        <thead>
          <tr class=""><th>Played</th><th>Won</th><th>Drawn</th><th>Lost</th><th>Average</th></tr>
        </thead>
        <tbody>
          <tr><td id="played"></td><td id="won"></td><td id="draw"></td><td id="loss"></td><td id="average"></td></tr>
        </tbody>
      </table>
      <table class="table table-bordered spacing-top">
        <thead>
        <tr class="bg-lgrey"><th>Division</th><th>Date</th><th></th><th>Opponent</th></tr>
      </thead>
      <tbody>
        <?php
        $month = ""; $p = 0; $w = 0; $l = 0; $d = 0; $a = 0;//played, win, loss, draw and average variables
        foreach($results as $result):
          if ($result['year'] == $year) {//just this year's results
            if ($result['player1_id'] == $id || $result['player2_id'] == $id) {
              if (!($result['player1_score'] == 0 && $result['player2_score'] == 0)) {
              if ($result['player1_id'] == $id) {
                $opponent_id = $result['player2_id'];
                $score = $result['player1_score'] . "-" . $result['player2_score'];
                if ($result['player1_score'] > $result['player2_score']) {
                  $bg = "bg-green";
                  $res = "WIN";
                  $w++; $p++;
                } else if ($result['player1_score'] < $result['player2_score']) {
                  $bg = "bg-red";
                  $res = "LOSS";
                  $l++; $p++;
                } else { $bg = "bg-blue"; $res = "DRAW"; $d++; $p++; }
                $year = $result['year'];
                foreach ($players as $player):
                  if ($player['id'] == $opponent_id) {
                    $name = $player['fName'] . " " . $player['lName'];
                  }
                endforeach;
              } else {
                $opponent_id = $result['player1_id'];
                $score = $result['player2_score'] . "-" . $result['player1_score'];
                if ($result['player2_score'] > $result['player1_score']) {
                  $bg = "bg-green";
                  $res = "WIN";
                  $w++; $p++;
                } else if ($result['player2_score'] < $result['player1_score']) {
                  $bg = "bg-red";
                  $res = "LOSS";
                  $l++; $p++;
                } else { $bg = "bg-blue"; $res = "DRAW"; $d++; $p++;}
                $year = $result['year'];
                foreach ($players as $player):
                  if ($player['id'] == $opponent_id) {
                    $name = $player['fName'] . " " . $player['lName'];
                  }
                endforeach;
              }
              $partYear = substr_replace($year, "'", 0, 2);
          ?>
          <tr>
            <?php if ($month != $result['month']) { echo "<td class='bg-lgrey'><strong>" . ucfirst($result['month']) . $partYear . "</strong><br><span id='profile-div'>Division " . $result['division'] . "</span></td>";
            } else { echo "<td></td>"; } ?>
            <td><?php echo $result['day'] . " " . $result['date'] . " " . ucfirst($result['month']); ?></td>
            <?php echo "<td class=" .$bg .">" . $res . " " .$score . "</td>"; ?>
            <td><a href="<?php echo site_url('player_profiles/current_year_profile/?user_id='.$opponent_id); ?>"><?php echo $name; ?></a></td>
          </tr>
          <?php  $month = $result['month'];
          }
        }
      }
        endforeach; ?>
        </tbody>
      </table>
      <?php echo form_open(''); if ($p == 0) { $a = 0; } else {$a = $w/$p * 100; $a = round($a, 2);} ?>
      <input type="hidden" id="pl" value="<?php echo $p; ?>">
      <input type="hidden" id="w" value="<?php echo $w; ?>">
      <input type="hidden" id="l" value="<?php echo $l; ?>">
      <input type="hidden" id="d" value="<?php echo $d; ?>">
      <input type="hidden" id="a" value="<?php echo $a; ?>">
      <script>
        var played = $('#pl').val(); $('#played').append(played);
        var won = $('#w').val(); $('#won').append(won);
        var drawn = $('#d').val(); $('#draw').append(drawn);
        var loss = $('#l').val(); $('#loss').append(loss);
        var average = $('#a').val(); $('#average').append(average + "%");
      </script>
      <?php
      echo form_close();
      ?>
    </div>
  </div>
</div>
