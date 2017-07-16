<div class="container-fluid">
  <p class="lead red-font">NOTE: This page is currently under construction.
    Eventually players will be able to set and edit their preferences for days and times.</p>
  <h1>Preferences - <?php echo $name ?></h1>
  <div>
  There are two courts and 45-minute sessions run as follows:<br>
  Weekdays: First session starts 08:30, Last session starts 21:15<br>
  Saturday: First session starts 09:00, Last session starts 15:45<br>
  Sunday: First session starts 09:00, Last session starts 20:15
  </div>
  <br>
  <?php echo form_open('Player_preferences') ;?>
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr><th colspan="3">DAY</th><th colspan="3">TIME</th></tr>
      </thead>
      <tbody>
        <tr><td>Can Manage</td><td></td><td>Preference</td><td>Can Manage</td><td></td><td>Preference</td></tr>
        <tr>
          <td><input type="checkbox" name="mon" <?php if ($mon == 1) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
          <td>Mon</td>
          <td></td>
          <td><input type="checkbox" name="t1" <?php if ($t1 == 1) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
          <td>08:30 - 10:00</td>
          <td></td>
        </tr>
        <tr>
          <td><input type="checkbox" name="tue" <?php if ($tue == 1) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
          <td>Tue</td>
          <td></td>
          <td><input type="checkbox" name="t2" <?php if ($t2 == 1) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
          <td>10:00 - 12:00</td>
          <td></td>
        </tr>
        <tr>
          <td><input type="checkbox" name="wed" <?php if ($wed == 1) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
          <td>Wed</td>
          <td></td>
          <td><input type="checkbox" name="t3" <?php if ($t3 == 1) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
          <td>12:00 - 14:00</td>
          <td></td>
        </tr>
        <tr>
          <td><input type="checkbox" name="thu" <?php if ($thu == 1) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
          <td>Thu</td>
          <td></td>
          <td><input type="checkbox" name="t4" <?php if ($t4 == 1) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
          <td>14:00 -  16:00</td>
          <td></td>
        </tr>
        <tr>
          <td><input type="checkbox" name="fri" <?php if ($fri == 1) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
          <td>Fri</td>
          <td></td>
          <td><input type="checkbox" name="t5" <?php if ($t5 == 1) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
          <td>16:00 - 18:00</td>
          <td></td>
        </tr>
        <tr>
          <td><input type="checkbox" name="sat" <?php if ($sat == 1) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
          <td>Sat</td>
          <td></td>
          <td><input type="checkbox" name="t6" <?php if ($t6 == 1) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
          <td>18:00 - 20:00</td>
          <td></td>
        </tr>
        <tr>
          <td><input type="checkbox" name="sun" <?php if ($sun == 1) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
          <td>Sun</td>
          <td></td>
          <td><input type="checkbox" name="t7" <?php if ($t7 == 1) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
          <td>20:00 onwards</td>
          <td></td>
        </tr>
        <tr><td></td><td>Don't Mind</td><td></td><td></td><td>Don't Mind</td><td></td></tr>
        <tr><td></td><td>Any weekday</td><td></td><td></td><td>Mornings</td><td></td></tr>
        <tr><td></td><td>Weekends</td><td></td><td></td><td>Afternoons</td><td></td></tr>
        <tr><td></td><td></td><td></td><td></td><td>Evenings</td><td></td></tr>
      </tbody>
    </table>
  </div>
  <?php echo form_close(); ?>
</div>
