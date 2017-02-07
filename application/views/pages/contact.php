<h2>Contact Page</h2>
<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title text-center">Contact form</h3>
        </div>
        <div class="panel-body">
          <?php echo form_open(''); ?>
          <label class="required-star">indicates required field</label>
          <div class="form-group">
            <?php
            $attributes = array(
              'class' => 'required'
            );
            echo form_label('Name', 'name', $attributes);
            $data = array(
              'name' => 'inputName',
              'class' => 'form-control',
              'required' => 'required',
              'id' => 'name',
              //'value' => $_SESSION['name']
            );
            echo form_input($data);
            echo "<br>";
            $attributes = array(
              'class' => 'required'
            );
            echo form_label('Email', 'inputEmail', $attributes);            
            $data = array(
              'type' => 'email',
              'name' => 'inputEmail',
              'class' => 'form-control',
              'required' => 'required',
              //'value' => $_SESSION['email']
            );
            echo form_input($data); ?>
            <br>
            <?php
            $attributes = array(
              'class' => 'required'
            );
            echo form_label('Message', 'inputText', $attributes);
            $data = array(
              'name' => 'inputText',
              'rows' => 6,
              'style' => 'width: 98%',
              'required' => 'required'
            );
            echo form_textarea($data);
            echo "<br><br>";
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
            echo form_submit('forgot_password', 'Send', 'class="btn btn-primary"');
            ?>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
