<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php echo (isset($titulo) ? '<title>SiscadPro | '.$titulo.'</title>' : '<title>SiscadPro | Login</title>'); ?>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('public/plugins/fontawesome-free/css/all.min.css'); ?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('public/dist/css/adminlte.min.css'); ?>">
  
  <!-- Favicons do site -->
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('public/favicon.ico'); ?>">
  <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url('public/apple-icon-64x64.png'); ?>">
  <style>
      body {
            background: url(<?php echo base_url('public/images/background3.jpg'); ?>) no-repeat center center fixed;
             -webkit-background-size: cover;
             -moz-background-size: cover;
             -o-background-size: cover;
             background-size: cover;
            /* background: #E5E9EC; */
       }
       .form-signin {
            background: rgba(255, 255, 255, 0.7);
        }
        .alert-danger {
            background-color: #F5A9A9 !important;
            border-color: #F5A9A9 !important;
            color: #333 !important;
            text-align: center;
        } 
        .alert-warning {
            background-color: #F3E2A9 !important;
            border-color: #F3E2A9 !important;
            color: #333 !important;
            text-align: center;
        }
	  @-webkit-keyframes swing
	  {
		  15%
		  {
			  -webkit-transform: translateX(5px);
			  transform: translateX(5px);
		  }
		  30%
		  {
			  -webkit-transform: translateX(-5px);
			  transform: translateX(-5px);
		  }
		  50%
		  {
			  -webkit-transform: translateX(3px);
			  transform: translateX(3px);
		  }
		  65%
		  {
			  -webkit-transform: translateX(-3px);
			  transform: translateX(-3px);
		  }
		  80%
		  {
			  -webkit-transform: translateX(2px);
			  transform: translateX(2px);
		  }
		  100%
		  {
			  -webkit-transform: translateX(0);
			  transform: translateX(0);
		  }
	  }
	  @keyframes swing
	  {
		  15%
		  {
			  -webkit-transform: translateX(5px);
			  transform: translateX(5px);
		  }
		  30%
		  {
			  -webkit-transform: translateX(-5px);
			  transform: translateX(-5px);
		  }
		  50%
		  {
			  -webkit-transform: translateX(3px);
			  transform: translateX(3px);
		  }
		  65%
		  {
			  -webkit-transform: translateX(-3px);
			  transform: translateX(-3px);
		  }
		  80%
		  {
			  -webkit-transform: translateX(2px);
			  transform: translateX(2px);
		  }
		  100%
		  {
			  -webkit-transform: translateX(0);
			  transform: translateX(0);
		  }
	  }
	  .swing:hover
	  {
		  -webkit-animation: swing 1s ease;
		  animation: swing 1s ease;
		  -webkit-animation-iteration-count: 1;
		  animation-iteration-count: 1;
	  }
  </style>
</head>

