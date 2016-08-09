<h1>Divisions page</h1>
<table class="table table-responsive table-bordered">
  <thead>
    <tr><th>No.</th><th>Player</th><th>Number</th><th>Current league</th></tr>
  </thead>
  <tbody>
  <?php foreach ($players as $player): echo "<tr><td>".$player['id']."</td><td>".
  $player['fName']." ".$player['lName']."</td><td>".$player['mobile']."</td><td>".$player['current_league']."</td></tr>"?>
  <?php endforeach; ?>
</tbody>
</table>
