<h2>Player profile</h2>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-3">
    Content
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
      <table class="table table-bordered spacing-top">
        <thead>
        <tr class="bg-lgrey"><th>Division</th><th>Date</th><th></th><th>Opponent</th></tr>
      </thead>
      <tbody>
        <?php $month = ""; foreach($results as $result):
          if ($result['player1_id'] == $id || $result['player2_id'] == $id) {
            if ($result['player1_id'] == $id) {
              $opponent_id = $result['player2_id'];
              $score = $result['player1_score'] . "-" . $result['player2_score'];
              if ($result['player1_score'] > $result['player2_score']) {
                $bg = "bg-green";
                $res = "WIN";
              } else if ($result['player1_score'] < $result['player2_score']) {
                $bg = "bg-red";
                $res = "LOSS";
              } else { $bg = "bg-blue"; $res = "DRAW"; }
              $year = $result['year'];
              foreach ($players as $player):
                if ($player['id'] == $opponent_id) {
                  $name = $player['fName'] . " " . $player['lName'];
                }
              endforeach;
            } else {
              $opponent_id = $result['player1_id'];
              $score = $result['player2_score'] . "-" . $result['player1_score'];
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
          <td><?php echo $name; ?></td>
        </tr>
        <?php  $month = $result['month']; }
        ?>
        <?php endforeach; ?>
      </tbody>
      </table>
    </div>
  </div>
</div>
