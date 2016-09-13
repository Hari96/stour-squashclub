<h2>Player's profiles</h2>
<div class="container-fluid">
  <div class="row">
  <div class="col-md-12 table-responsive">
    <table class="table table-bordered spacing-top">
      <thead>
        <tr><th>Rank</th><th>Player</th><th>Played</th><th>Won</th><th>Drawn</th><th>Lost</th><th>Average</th><th>Last Played</th></tr>
      </thead>
      <tbody>
        <?php $c = 1; foreach ($profiles as $profile): ?>
          <tr>
            <td><?php echo $c . "."; ?></td>
            <?php foreach ($players as $player):
              if ($player['id'] == $profile['user_id']) {
                $name = $player['fName'] . " " . $player['lName'];
                echo "<td>" . $name . "</t>";
              }
             endforeach;
            ?>
            <td><?php echo $profile['played']; ?></td>
            <td><?php echo $profile['won']; ?></td>
            <td><?php echo $profile['drawn']; ?></td>
            <td><?php echo $profile['lost']; ?></td>
            <td><?php echo $profile['average']; ?></td>
            <?php $last_played = $profile['day'] . " " . $profile['date'] . " " . $profile['month']; ?>
            <td><?php echo $last_played; ?></td>
          </tr>
        <?php $c++; endforeach; ?>
      </tbody>
    </table>
    </div>
  </div>
</div>
