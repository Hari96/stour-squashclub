<h1>Divisions for <?php
$partYear = substr_replace($year, "'", 0, 2);
echo ucfirst($month) . " " . $partYear;
?></h1>
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
                if(isset($_SESSION['logged_in'])) {
                  echo "<tr><td>" . $name . "</td><td>" . $mobile . "</td><td>" . $email . "</td></tr>";
                } else {
                  echo "<tr><td>" . $name . "</td><td><a href='login'>Login/Register</a> to view contact details</td><td><a href='login'>Login/Register</a> to view contact details</td></tr>";
                }
              }
            endforeach;
          ?>
        </tbody>
      </table>
    </section><!-- end of 9 col section -->
  </div><!-- end of row-->
  <br>
  <div class="row">
    <section class="col-md-4">
    </section>
    <section class="col-md-8">
      <span class="lead"><strong>DIVISION 2</strong></span>
      <table class="table table-responsive table-bordered">
        <thead>
          <tr><th>Player</th><th>Number</th><th>Email</th></tr>
        </thead>
        <tbody>
          <?php
            foreach ($leagues as $league):
              if ($league[$month] == 2) {
                foreach ($players as $player):
                  if ($player['id'] == $league['user_id']) {
                    $name = $player['fName'] . " " . $player['lName'];
                    $mobile = $player['mobile'];
                    $email = $player['email'];
                  }
                endforeach;
                if(isset($_SESSION['logged_in'])) {
                  echo "<tr><td>" . $name . "</td><td>" . $mobile . "</td><td>" . $email . "</td></tr>";
                } else {
                  echo "<tr><td>" . $name . "</td><td><a href='login'>Login/Register</a> to view contact details</td><td><a href='login'>Login/Register</a> to view contact details</td></tr>";
                }
              }
            endforeach;
          ?>
        </tbody>
      </table>
    </section><!-- end of 9 col section -->
  </div><!-- end of row-->
  <br>
  <div class="row">
    <section class="col-md-4">
    </section>
    <section class="col-md-8">
      <span class="lead"><strong>DIVISION 3</strong></span>
      <table class="table table-responsive table-bordered">
        <thead>
          <tr><th>Player</th><th>Number</th><th>Email</th></tr>
        </thead>
        <tbody>
          <?php
            foreach ($leagues as $league):
              if ($league[$month] == 3) {
                foreach ($players as $player):
                  if ($player['id'] == $league['user_id']) {
                    $name = $player['fName'] . " " . $player['lName'];
                    $mobile = $player['mobile'];
                    $email = $player['email'];
                  }
                endforeach;
                if(isset($_SESSION['logged_in'])) {
                  echo "<tr><td>" . $name . "</td><td>" . $mobile . "</td><td>" . $email . "</td></tr>";
                } else {
                  echo "<tr><td>" . $name . "</td><td><a href='login'>Login/Register</a> to view contact details</td><td><a href='login'>Login/Register</a> to view contact details</td></tr>";
                }
              }
            endforeach;
          ?>
        </tbody>
      </table>
    </section><!-- end of 9 col section -->
  </div><!-- end of row-->
  <br>
  <div class="row">
    <section class="col-md-4">
    </section>
    <section class="col-md-8">
      <span class="lead"><strong>DIVISION 4</strong></span>
      <table class="table table-responsive table-bordered">
        <thead>
          <tr><th>Player</th><th>Number</th><th>Email</th></tr>
        </thead>
        <tbody>
          <?php
            foreach ($leagues as $league):
              if ($league[$month] == 4) {
                foreach ($players as $player):
                  if ($player['id'] == $league['user_id']) {
                    $name = $player['fName'] . " " . $player['lName'];
                    $mobile = $player['mobile'];
                    $email = $player['email'];
                  }
                endforeach;
                if(isset($_SESSION['logged_in'])) {
                  echo "<tr><td>" . $name . "</td><td>" . $mobile . "</td><td>" . $email . "</td></tr>";
                } else {
                  echo "<tr><td>" . $name . "</td><td><a href='login'>Login/Register</a> to view contact details</td><td><a href='login'>Login/Register</a> to view contact details</td></tr>";
                }
              }
            endforeach;
          ?>
        </tbody>
      </table>
    </section><!-- end of 9 col section -->
  </div><!-- end of row-->
</div><!-- end of container -->
