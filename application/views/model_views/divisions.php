<h2>Divisions for <?php
$partYear = substr_replace($year, "'", 0, 2);
echo ucfirst($month) . " " . $partYear;
?></h2>
<div class="container-fluid">
  <div class="row">
    <section class="col-md-4 bg-lgrey spacing-top">
      <br>
      <p>Games to be played between first and last day of the above month.</p>
      <p>The League will be divided into divisions, with a maximum number of five players in each division.
        Each player is responsible for contacting another two players in his/her division, i.e:</p>
      <ul>
        <li>Player Number 1 contacts Numbers 2 and 3</li>
        <li>Player Number 2 contacts Numbers 3 and 4</li>
        <li>Player Number 3 contacts Numbers 4 and 5</li>
        <li>Player Number 4 contacts Numbers 5 and 1</li>
        <li>Player Number 5 contacts Numbers 1 and 2</li>
      </ul>
      <p>Opponents should be contacted at least one whole week before the session ends.</p>
      <p>Matches are to be played as agreed by the two players. If you are not contacted within the specified time you may claim the match 3-0.</p>
      <p><em>Booking courts:</em></p>
      <p>Ring Stour Centre reception 01233 663503, then press 0 to make a booking.</p>
      <p>If you are a member of the Stour Centre you should be able to check availability, and book via:
      <a href="https://ashfordleisuretrust.leisurecloud.net/Connect/mrmlogin.aspx">Ashford Leisure Trust</a></p>
      <p>Please report results using <a href="<?php echo base_url();?>captcha_results/form">Results Form.</a></p>
    </section>
    <section class="col-md-8 table-responsive">
      <span class="lead"><strong>DIVISION 1</strong></span>
      <table class="table table-bordered table-striped">
        <thead>
          <tr><th>No.</th><th>Player</th><th>Number</th><th>Email</th></tr>
        </thead>
        <tbody>
          <?php $c = 0;
            foreach ($leagues as $league):
              if ($league[$month] == 1) {
                $c++; $name = ""; $email = ""; $mobile = "";
                foreach ($players as $player):
                  if ($player['id'] == $league['user_id']) {
                    $name = $player['fName'] . " " . $player['lName'];
                    $mobile = $player['mobile'];
                    $email = $player['email'];
                  }
                endforeach;
                if(isset($_SESSION['logged_in'])) {
                  echo "<tr><td>" . $c . "</td><td>" . $name . "</td><td>" . $mobile . "</td><td>" . $email . "</td></tr>";
                } else {
                  echo "<tr><td>" . $c . "</td><td>" . $name . "</td><td><a href='login'>Login/Register</a> to view contact details</td><td><a href='login'>Login/Register</a> to view contact details</td></tr>";
                }
              }
            endforeach;
          ?>
        </tbody>
      </table>
    <!--</section> -->
  <!--</div>-->
  <br>
  <!--<div class="row">-->
    <!--<section class="col-md-4">
    </section>-->
    <!--<section class="col-md-8 table-responsive">-->
      <span class="lead"><strong>DIVISION 2</strong></span>
      <table class="table table-bordered table-striped">
        <thead>
          <tr><th>No.</th><th>Player</th><th>Number</th><th>Email</th></tr>
        </thead>
        <tbody>
          <?php $c = 0;
            foreach ($leagues as $league):
              if ($league[$month] == 2) {
                $c++;
                foreach ($players as $player):
                  if ($player['id'] == $league['user_id']) {
                    $name = $player['fName'] . " " . $player['lName'];
                    $mobile = $player['mobile'];
                    $email = $player['email'];
                  }
                endforeach;
                if(isset($_SESSION['logged_in'])) {
                  echo "<tr><td>" . $c . "</td><td>" . $name . "</td><td>" . $mobile . "</td><td>" . $email . "</td></tr>";
                } else {
                  echo "<tr><td>" . $c . "</td><td>" . $name . "</td><td><a href='login'>Login/Register</a> to view contact details</td><td><a href='login'>Login/Register</a> to view contact details</td></tr>";
                }
              }
            endforeach;
          ?>
        </tbody>
      </table>
  <!--  </section>-->
  <!--</div>-->
  <br>
<!--  <div class="row">
    <section class="col-md-4">
    </section>
    <section class="col-md-8 table-responsive">-->
      <span class="lead"><strong>DIVISION 3</strong></span>
      <table class="table table-bordered table-striped">
        <thead>
          <tr><th>No.</th><th>Player</th><th>Number</th><th>Email</th></tr>
        </thead>
        <tbody>
          <?php $c = 0;
            foreach ($leagues as $league):
              if ($league[$month] == 3) {
                  $c++;
                foreach ($players as $player):
                  if ($player['id'] == $league['user_id']) {
                    $name = $player['fName'] . " " . $player['lName'];
                    $mobile = $player['mobile'];
                    $email = $player['email'];
                  }
                endforeach;
                if(isset($_SESSION['logged_in'])) {
                  echo "<tr><td>" . $c . "</td><td>" . $name . "</td><td>" . $mobile . "</td><td>" . $email . "</td></tr>";
                } else {
                  echo "<tr><td>" . $c . "</td><td>" . $name . "</td><td><a href='login'>Login/Register</a> to view contact details</td><td><a href='login'>Login/Register</a> to view contact details</td></tr>";
                }
              }
            endforeach;
          ?>
        </tbody>
      </table>
    <!--</section>
  </div>-->
  <br>
  <!--<div class="row">
    <section class="col-md-4">
    </section>
    <section class="col-md-8 table-responsive">-->
      <span class="lead"><strong>DIVISION 4</strong></span>
      <table class="table table-bordered table-striped">
        <thead>
          <tr><th>No.</th><th>Player</th><th>Number</th><th>Email</th></tr>
        </thead>
        <tbody>
          <?php $c = 0;
            foreach ($leagues as $league):
              if ($league[$month] == 4) {
                $c++;
                foreach ($players as $player):
                  if ($player['id'] == $league['user_id']) {
                    $name = $player['fName'] . " " . $player['lName'];
                    $mobile = $player['mobile'];
                    $email = $player['email'];
                  }
                endforeach;
                if(isset($_SESSION['logged_in'])) {
                  echo "<tr><td>" . $c . "</td><td>" . $name . "</td><td>" . $mobile . "</td><td>" . $email . "</td></tr>";
                } else {
                  echo "<tr><td>" . $c . "</td><td>" . $name . "</td><td><a href='login'>Login/Register</a> to view contact details</td><td><a href='login'>Login/Register</a> to view contact details</td></tr>";
                }
              }
            endforeach;
          ?>
        </tbody>
      </table>
    </section><!-- end of 9 col section -->
  </div><!-- end of row-->
</div><!-- end of container -->
