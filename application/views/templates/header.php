<!DOCTYPE html>
<html lang="en-GB">
  <head>
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Stour Centre Squash Club - Ashford, Kent</title>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css" />
    <!-- SCRIPTS PLACED AT BOTTOM OF BODY
    <script src ="<?php echo base_url();?>assets/js/jquery.js"></script>
    <script src ="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src ="<?php echo base_url();?>assets/js/custom.js"></script>
  -->
  </head>
  <body>
    <nav class="navbar navbar-default navbar-fixed-top bg-navbar">

      <h1 class="text-center" id="head"><img src="<?php echo base_url();?>images/squash-racquets.png" alt="left header image">
        Stour Centre Squash Club - Ashford, Kent<img src="<?php echo base_url();?>images/squash-racquets.png" alt="right header image"></h1>

      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        </div>

        <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url();?>pages/view"><strong>Home</strong></a></li>
        <li><a href="<?php echo base_url();?>pages/view/about"><strong>About</strong></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><strong>Competitions</strong> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url();?>model_views/view/divisions">Current divisions</a></li>
            <li><a href="<?php echo base_url();?>display_results/initial_results">Results</a></li>
            <li><a href="<?php echo base_url();?>display_results/initial_tables">Tables</a></li>
            <li><a href="<?php echo base_url();?>player_profiles/load_profiles">Player's Profiles</a></li>
            <li><a href="<?php echo base_url();?>pages/view/details">Details and Rules</a></li>
            <li><a href="<?php echo base_url();?>pages/view/squash_rules">Rules of Squash</a></li>
          </ul>
        </li>
        <?php if(isset($_SESSION['email'])) { ?>
        <li><a href="http://www.stoursquashclub.co.uk/sqcl-forum/community"><strong>Forum</strong></a></li>
        <?php } ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><strong>Contacting</strong><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url();?>captcha_contact/form">Contact Form</a></li>
            <li><a href="<?php echo base_url();?>captcha_results/form">Results Form</a></li>
          </ul>
        </li>
        <?php if(isset($_SESSION['email'])) { ?>
          <li><a href="<?php echo base_url();?>user_update/user_account"><strong>Edit account</strong></a></li>
          <li><a href="<?php echo base_url();?>user_login/user_logout"><strong>Logout</strong></a></li>
        <?php }  else { ?>
        <li><a href="<?php echo base_url();?>model_views/view/login"><strong>Login</strong></a></li>
        <li><a href="<?php echo base_url();?>model_views/view/register"><strong>Signup</strong></a></li>
        <?php }
        if(isset($_SESSION['role'])) { ?>
        <li><a href="<?php echo base_url();?>player_admin/crud_view/admin_home"><strong>Admin</strong></a></li>
        <?php } ?>
      </ul>
      </div><!-- navbar-collapse-->
    </div><!--container-->
    </nav>
