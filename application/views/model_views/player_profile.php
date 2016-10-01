<h2>Player profile</h2>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-3">
    Content
    </div>
    <div class="col-md-7 table-responsive">
      <?php
      echo "<h2>" . $fullname . "</h2>";
      echo "<span>contact: " . $mobile . "</span>";
      ?>
      <table class="table table-bordered spacing-top">
        <thead>
        <tr><th>Division</th><th>Date</th><th></th><th>Opponent</th></tr>
      </thead>
      <tbody>
        <?php foreach($results as $result):
          if ($result['player1_id'] == $id || $result['player2_id'] == $id) {
            if ($result['player1_id'] == $id) {
              $opponent_id = $result['player2_id'];
              $score = $result['player1_score'] . "-" . $result['player2_score'];
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
          <td><?php echo "<strong>" . ucfirst($result['month']) . $partYear . "</strong><br><span id='profile-div'>Division " . $result['division'] . "</span>"; ?></td>
          <td><?php echo $result['day'] . " " . $result['date'] . " " . $result['month']; ?></td>
          <td><?php echo $score; ?></td>
          <td><?php echo $name; ?></td>
        </tr>
        <?php  }
        ?>
        <?php endforeach; ?>
      </tbody>
      </table>
    </div>
  </div>
</div>
