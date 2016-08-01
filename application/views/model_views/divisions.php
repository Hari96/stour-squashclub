<table>
  <tr><th>No.</th><th>Player</th><th>Number</th></tr>
  <?php foreach ($players as $player): echo "<tr><td>".$player['id']."</td><td>".
  $player['fName']." ".$player['lName']."</td><td>".$player['mobile']."</td></tr>"?>
  <?php endforeach; ?>
</table>
