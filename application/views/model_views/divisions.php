<h1>Divisions page</h1>
<div class="container-fluid">
  <div class="row">
    <section class="col-md-4">
    </section>
    <section class="col-md-8">
      <span class="lead"><strong>DIVISION 1</strong></span>
      <table class="table table-responsive table-bordered">
        <thead>
          <tr><th>Player</th><th>Number</th><th>Email</th></tr>
        </thead>
        <tbody>
          <?php
            foreach ($leagues as $league):
              if ($league[$month] == 1) {
                foreach ($players as $player):
                  if ($player['id'] == $league['user_id']) {
                    $name = $player['fName'] . " " . $player['lName'];
                    $mobile = $player['mobile'];
                    $email = $player['email'];
                  }
                endforeach;
                echo "<tr><td>" . $name . "</td><td>" . $mobile . "</td><td>" . $email . "</td></tr>";
              }
            endforeach;
          ?>
        </tbody>
      </table>
    </section><!-- end of 9 col section -->
  </div><!-- end of row-->
</div><!-- end of container -->
