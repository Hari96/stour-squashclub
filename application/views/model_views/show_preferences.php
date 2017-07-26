<div class="container-fluid">
  
  <h2><?php echo "Preferences for " . $name; ?></h2>
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr><th>Days I can manage</th><th>My preferred day(s)</th><th>Times I can manage</th><th>My preferred time(s)</th></tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $day_output; ?></td><td><?php echo $day_pref_output; ?></td><td><?php echo $time_output; ?></td><td><?php echo $time_pref_output; ?></td>
        </tr>
      </tbody>
    </table>
  </div>
  <h3>Further comments:</h3>
  <?php echo $comments; ?>
</div>
