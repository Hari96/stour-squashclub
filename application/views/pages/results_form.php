<?php if(isset($_SESSION['logged_in'])) { ?>
          <?php
          echo "<div class='image'>";
          // $image is the index of $data array. which will sent by controller.
          echo $image;
          echo "</div>";
          echo "<br>";
          echo "<a href='#' class ='refresh'><img id = 'ref_symbol' src =".base_url()."img/refresh.png></a>Get new captcha image";

          echo "<br>";
          echo "<br>";

          // Captcha word field.
          echo form_label('Enter letters from above:');
          echo "<br>";
          $data_captcha = array(
            'name' => 'captcha',
            'class' => 'input_box',
            'color' => 'white',
            'placeholder' => '',
            'id' => 'captcha'
          );
          echo form_input($data_captcha);
          echo "<br><br>";
          echo form_submit('forgot_password', 'Send result(s)', 'class="btn btn-primary"');
          ?>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
  <?php }  else {
    echo "You need to be logged in to use this results form";
    } ?>
</div>
