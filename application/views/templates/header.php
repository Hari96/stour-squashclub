<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset = "utf-8">
    <title>Stour Centre Squash Club</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css" />
    <script src ="<?php echo base_url();?>assets/js/jquery.js"></script>
    <script src ="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src ="<?php echo base_url();?>assets/js/custom.js"></script>

  </head>
  <body>
    <nav class="navbar navbar-default navbar-fixed-top">

      <h1 class="text-center" id="head">Stour Centre Squash Club</h1>

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
        <li><a href="<?php echo base_url();?>pages/view/home">Home</a></li>
        <li><a href="<?php echo base_url();?>pages/view/about">About</a></li>
        <li><a href="<?php echo base_url();?>model_views/view/divisions">Divisions</a></li>
        <li><a href="<?php echo base_url();?>model_views/view/results">Results</a></li>
        <li><a href="<?php echo base_url();?>model_views/view/tables">League tables</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url();?>pages/view/contact">Contact</a></li>
        <?php if(isset($_SESSION['email'])) { ?>
          <li><a href="<?php echo base_url();?>user_login/user_logout">Logout</a></li>
        <?php }  else { ?>
        <li><a href="<?php echo base_url();?>model_views/view/login">Login</a></li>
        <li><a href="<?php echo base_url();?>model_views/view/register">Signup</a></li>
        <?php }
        if(isset($_SESSION['role'])) { ?>
        <li><a href="<?php echo base_url();?>player_admin/crud_view/admin_home">Admin</a></li>
        <?php } ?>
      </ul>
      </div><!-- navbar-collapse-->
    </div><!--container-->
    </nav>
    
