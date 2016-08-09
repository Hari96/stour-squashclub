<h1>User details</h1>
<table class="table table-responsive table-bordered">
  <thead>
    <tr><th>No.</th><th>Player</th><th>Mobile</th><th>Land line</th><th>Email</th><th>Age</th><th>Standard</th</tr>
  </thead>
  <tbody>
  <?php foreach ($players as $player): echo "<tr><td class='nums'>".$player['id']."</td><td class='text'>".$player['fName']." ".$player['lName']."</td><td class='text'>".$player['mobile']."</td><td class='text'>".$player['landline']."</td><td class='email'>".$player['email']."</td><td class='nums'>".$player['age']."</td><td class='nums'>".$player['standard']."</td></tr>"?>
  <?php endforeach; ?>
</tbody>
</table>
