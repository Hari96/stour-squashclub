<h2>Report Results</h2>
<div class="container">
  <?php if(isset($_SESSION['logged_in'])) { ?>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title text-center">Results form</h3>
        </div>
        <div class="panel-body">
          <?php echo form_open(''); ?>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr><th>Reporting player</th><th>Opponent</th><th>Result</th></tr>
              </thead>
              <tbody>
                <?php foreach ($players as $player):
                  if ($player['email'] != $_SESSION['email']) {
                    echo "<tr><td>" . $_SESSION['name'] . "</td><td>" . $player['fName'] . " " . $player['lName'] . "</td><td></td></tr>";
                  } endforeach; ?>
              </tbody>
            </table>
        </div>
<?php } ?>
