<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Metas tags requeridas-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SisCadPro">
    <meta name="author" content="Claudemir Lopes">
    <meta name="keywords" content="siscadpro, sistema, agendamento, cadastro, servicos, profissionais">

    <!-- Título da página-->
    <?php echo (isset($titulo) ? '<title>SisConsig | '.$titulo.'</title>' : '<title>SisConsig | Administrativo</title>'); ?>

    <!-- Fontfaces CSS-->
    <link href="<?php echo base_url('public/css/font-face.css'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo base_url('public/vendor/font-awesome-4.7/css/font-awesome.min.css'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo base_url('public/vendor/font-awesome-5/css/fontawesome-all.min.css'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo base_url('public/vendor/mdi-font/css/material-design-iconic-font.min.css'); ?>" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?php echo base_url('public/vendor/bootstrap-4.1/bootstrap.min.css'); ?>" rel="stylesheet" media="all">

    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url('public/datatables/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/datatables/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/datatables/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">

    <!-- public/vendor CSS-->
    <link href="<?php echo base_url('public/vendor/animsition/animsition.min.css'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo base_url('public/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo base_url('public/vendor/wow/animate.css'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo base_url('public/vendor/css-hamburgers/hamburgers.min.css'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo base_url('public/vendor/slick/slick.css'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo base_url('public/vendor/perfect-scrollbar/perfect-scrollbar.css'); ?>" rel="stylesheet" media="all">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css'); ?>"> -->

    <!-- Main CSS-->
    <link href="<?php echo base_url('public/css/custom.css'); ?>" rel="stylesheet" media="all">
    <link href="<?php echo base_url('public/css/theme.css'); ?>" rel="stylesheet" media="all">

    <!-- Script do textarea editor TynyMCE -->
    <script src="<?php echo base_url('public/lib/tinymce/tinymce.min.js'); ?>"></script>
        <script>
            tinymce.init({
                selector: 'textarea#editable',
                theme: 'modern',
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
                ],
                toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
                image_advtab: true,
                templates: [
                    {title: 'Test template 1', content: 'Test 1'},
                    {title: 'Test template 2', content: 'Test 2'}
                ],
                content_css: [
                    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                    '//www.tinymce.com/css/codepen.min.css'
                ]
            });
        </script>

    <!-- Favicons do site -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('public/favicon.ico'); ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url('public/apple-icon-64x64.png'); ?>">

	<?php if (isset($styles)): ?>
		<?php foreach ($styles as $style): ?>
			<link rel="stylesheet" href="<?php echo base_url('public/'.$style); ?>">
		<?php endforeach; ?>
	<?php endif; ?>

	<!-- Adicione a definição da variável BASE_URL após incluir os estilos -->
	<script>var BASE_URL = "<?php echo base_url(); ?>";</script>
	<style>
		.swing {
			animation: swing ease-in-out 1s infinite alternate;
			transform-origin: center -20px;
			/* float: left; */
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
			border: 1px solid #ccc;
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
			left: 52.5%;
			z-index: 5;
			border-radius: 50% 50%;
			background: #FF9D02;
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

<body class="animsition">
    <div class="page-wrapper">
