<h2>Report Results</h2>
<div class="container">
  <?php if(isset($_SESSION['logged_in'])) { ?>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title text-center">Results Form</h3>
        </div>
        <div class="panel-body">
          <?php echo form_open(''); ?>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr><th>Reporting player</th><th>Opponent</th><th>Result</th></tr>
              </thead>
              <tbody>
                <?php $c = 0; foreach ($players as $player):
                  if ($player['email'] != $_SESSION['email']) {
                    $name = $player['fName'] . " " . $player['lName'];
                    $res = "r" . $c;
                    $n = "n" . $c;
                    ?>
                    <input name="<?php echo $n; ?>" type="hidden" value="<?php echo $name; ?>">
                    <tr><td> <?php echo $_SESSION['name']; ?> </td><td><?php echo $name; ?></td>
                    <td><select name="<?php echo $res; ?>">
                      <option value='0'>Not reporting</option>
                      <option value='3-0'>3-0</option>
                      <option value='3-1'>3-1</option>
                      <option value='3-2'>3-2</option>
                      <option value='0-3'>0-3</option>
                      <option value='1-3'>1-3</option>
                      <option value='2-3'>2-3</option>
                      <option value='1-1'>1-1</option>
                      <option value='2-2'>2-2</option>
                      <option value='2-1'>2-1</option>
                      <option value='2-0'>2-0</option>
                      <option value='1-0'>1-0</option>
                      <option value='1-2'>1-2</option>
                      <option value='0-2'>0-2</option>
                      <option value='0-1'>0-1</option>
                    </select></td></tr>
                  <?php $c++; } endforeach;
                  echo "<input name='count' type= 'hidden' value = $c>";
                  ?>
              </tbody>
            </table>
        </div>
<?php } ?>
