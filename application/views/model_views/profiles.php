<h2>Player's profiles</h2>
<div class="container-fluid">
  <p>Includes players who have left, or are no longer active. Results will be kept for at least two years after a player leaves the club. </p>
  <p>Analysis given here runs over the full period since site started.</p>
  <p><strong>Click on a player to view all their results and their player profile</strong>
  (Individual player profiles run over this year plus previous year).</p>
  <div class="row">
  <div class="col-md-12 table-responsive">
    <table class="table table-bordered table-striped spacing-top">
      <thead>
        <tr><th>Rank</th><th>Player</th><th>Played</th><th>Won</th><th>Drawn</th><th>Lost</th><th>Average</th><th>Last Played</th></tr>
      </thead>
      <tbody>
        <?php $c = 1; foreach ($profiles as $profile): ?>
          <tr>
            <td><?php echo $c . "."; ?></td>
            <?php foreach ($players as $player):
              if ($player['id'] == $profile['user_id']) {
                $user_id = $player['id'];
                $name = $player['fName'] . " " . $player['lName'];
                ?>
                <td><a href="<?php echo site_url('player_profiles/player_profile/?user_id='.$user_id); ?>"><?php echo $name; ?></a></td>
            <?php  }
             endforeach;
            ?>
            <td><?php echo $profile['played']; ?></td>
            <td><?php echo $profile['won']; ?></td>
            <td><?php echo $profile['drawn']; ?></td>
            <td><?php echo $profile['lost']; ?></td>
            <td><?php echo $profile['average'] . "%"; ?></td>
            <?php $last_played = $profile['day'] . " " . $profile['date'] . " " . $profile['month']; ?>
            <td><?php echo $last_played; ?></td>
          </tr>
        <?php $c++; endforeach; ?>
      </tbody>
    </table>
    </div>
  </div>
</div>
