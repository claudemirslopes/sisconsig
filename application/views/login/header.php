<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php echo (isset($titulo) ? '<title>SisConsig | ' . $titulo . '</title>' : '<title>SisConsig | Login</title>'); ?>

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

		.swing {
			animation: swing ease-in-out 1s infinite alternate;
			transform-origin: center -20px;
			float: left;
			box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
		}

		.swing img {
			border: 5px solid #f8f8f8;
			display: block;
		}

		.swing:after {
			content: '';
			position: absolute;
			width: 20px;
			height: 20px;
			border: 1px solid #999;
			top: -10px;
			left: 50%;
			z-index: 0;
			border-bottom: none;
			border-right: none;
			transform: rotate(45deg);
		}

		/* nail */
		.swing:before {
			content: '';
			position: absolute;
			width: 5px;
			height: 5px;
			top: -14px;
			left: 53%;
			z-index: 5;
			border-radius: 50% 50%;
			background: #fff;
		}

		@keyframes swing {
			0% {
				transform: rotate(3deg);
			}

			100% {
				transform: rotate(-3deg);
			}
		}
	</style>
</head>
