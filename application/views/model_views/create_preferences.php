<div class="container-fluid">
  <p class="lead red-font">I am hoping that this facility will be helpful when arranging your games. Please put some thought into your choices. Only one preference each is possible for day and time</p>
  <h1>Preferences - <?php echo $name ?></h1>
  <div>
  There are two courts and 45-minute sessions run as follows:<br>
  Weekdays: First session starts 08:30, Last session starts 21:15<br>
  Saturday: First session starts 09:00, Last session starts 15:45<br>
  Sunday: First session starts 09:00, Last session starts 20:15
  </div>
  <br>
  <?php echo form_open('Player_preferences') ;?>
  <input type="hidden" name="user_id" value="<?php echo set_value('user_id', $user_id); ?>">
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr><th colspan="3">DAY</th><th colspan="3">TIME</th></tr>
      </thead>
      <tbody>
        <tr><td>Can Manage</td><td></td><td>Preference</td><td>Can Manage</td><td></td><td>Preference</td></tr>
        <tr>
          <td><input type="checkbox" name="mon" value="1" <?php if ($mon == 1) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
          <td>Mon</td>
          <td><input type="radio" name = "day_pref" value="1" <?php if ($day_pref == 1) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
          <td><input type="checkbox" name="t1" value="1" <?php if ($t1 == 1) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
          <td>08:30 - 10:00</td>
          <td><input type="radio" name = "time_pref" value="1" <?php if ($time_pref == 1) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
        </tr>
        <tr>
          <td><input type="checkbox" name="tue" value="1" <?php if ($tue == 1) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
          <td>Tue</td>
          <td><input type="radio" name = "day_pref" value="2" <?php if ($day_pref == 2) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
          <td><input type="checkbox" name="t2" value="1" <?php if ($t2 == 1) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
          <td>10:00 - 12:00</td>
          <td><input type="radio" name = "time_pref" value="2" <?php if ($time_pref == 2) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
        </tr>
        <tr>
          <td><input type="checkbox" name="wed" value="1" <?php if ($wed == 1) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
          <td>Wed</td>
          <td><input type="radio" name = "day_pref" value="3" <?php if ($day_pref == 3) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
          <td><input type="checkbox" name="t3" value="1" <?php if ($t3 == 1) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
          <td>12:00 - 14:00</td>
          <td><input type="radio" name = "time_pref" value="3" <?php if ($time_pref == 3) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
        </tr>
        <tr>
          <td><input type="checkbox" name="thu" value="1" <?php if ($thu == 1) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
          <td>Thu</td>
          <td><input type="radio" name = "day_pref" value="4" <?php if ($day_pref == 4) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
          <td><input type="checkbox" name="t4" value="1" <?php if ($t4 == 1) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
          <td>14:00 -  16:00</td>
          <td><input type="radio" name = "time_pref" value="4" <?php if ($time_pref == 4) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
        </tr>
        <tr>
          <td><input type="checkbox" name="fri" value="1" <?php if ($fri == 1) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
          <td>Fri</td>
          <td><input type="radio" name = "day_pref" value="5" <?php if ($day_pref == 5) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
          <td><input type="checkbox" name="t5" value="1" <?php if ($t5 == 1) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
          <td>16:00 - 18:00</td>
          <td><input type="radio" name = "time_pref" value="5" <?php if ($time_pref == 5) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
        </tr>
        <tr>
          <td><input type="checkbox" name="sat" value="1" <?php if ($sat == 1) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
          <td>Sat</td>
          <td><input type="radio" name = "day_pref" value="6" <?php if ($day_pref == 6) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
          <td><input type="checkbox" name="t6" value="1" <?php if ($t6 == 1) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
          <td>18:00 - 20:00</td>
          <td><input type="radio" name = "time_pref" value="6" <?php if ($time_pref == 6) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
        </tr>
        <tr>
          <td><input type="checkbox" name="sun" value="1" <?php if ($sun == 1) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
          <td>Sun</td>
          <td><input type="radio" name = "day_pref" value="7" <?php if ($day_pref == 7) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
          <td><input type="checkbox" name="t7" value="1" <?php if ($t7 == 1) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
          <td>20:00 onwards</td>
          <td><input type="radio" name = "time_pref" value="7" <?php if ($time_pref == 7) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
        </tr>
        <tr>
          <td></td>
          <td>Don't Mind</td>
          <td><input type="radio" name = "day_pref" value="8" <?php if ($day_pref == 8) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
          <td></td>
          <td>Don't Mind</td>
          <td><input type="radio" name = "time_pref" value="8" <?php if ($time_pref == 8) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
        </tr>
        <tr>
          <td></td>
          <td>Any weekday</td>
          <td><input type="radio" name = "day_pref" value="9" <?php if ($day_pref == 9) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
          <td></td>
          <td>Mornings</td>
          <td><input type="radio" name = "time_pref" value="9" <?php if ($time_pref == 9) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
        </tr>
        <tr>
          <td></td>
          <td>Weekends</td>
          <td><input type="radio" name = "day_pref" value="10" <?php if ($day_pref == 10) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
          <td></td>
          <td>Afternoons</td>
          <td><input type="radio" name = "time_pref" value="10" <?php if ($time_pref == 10) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td>Evenings</td>
          <td><input type="radio" name = "time_pref" value="11" <?php if ($time_pref == 11) { $checked = "checked";} else { $checked="";} echo $checked; ?>></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="row">
    <div class="col-md-8">
      <p>If necessary enter further information below (keep as short as possible)</p>
      <textarea name="comments" rows="5" cols="60"><?php echo $comments; ?></textarea>
    </div>
    <div class="col-md-4 spacing-top">
      <button type="submit" class="btn btn-primary">Submit preferences</button>
    </div>
</div>
  <?php echo form_close(); ?>
</div>
