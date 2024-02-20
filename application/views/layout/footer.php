        <!-- END PAGE CONTAINER-->
        </div>

    </div>

	<!-- CONTEUDO DOS MODAIS -->
	<?php $this->load->view('layout/modais') ?>
	<!-- CONTEUDO DOS MODAIS -->

	<!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/a8568f4b07.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <!-- Jquery JS-->
    <script src="<?php echo base_url('public/vendor/jquery-3.2.1.min.js'); ?>"></script>
    <!-- Bootstrap JS-->
    <script src="<?php echo base_url('public/vendor/bootstrap-4.1/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/vendor/bootstrap-4.1/bootstrap.min.js'); ?>"></script>
    <!-- Vendor JS       -->
    <script src="<?php echo base_url('public/vendor/slick/slick.min.js'); ?>">
    </script>
    <script src="<?php echo base_url('public/vendor/wow/wow.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/vendor/animsition/animsition.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js'); ?>">
    </script>
    <script src="<?php echo base_url('public/vendor/counter-up/jquery.waypoints.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/vendor/counter-up/jquery.counterup.min.js'); ?>">
    </script>
    <script src="<?php echo base_url('public/vendor/circle-progress/circle-progress.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/vendor/perfect-scrollbar/perfect-scrollbar.js'); ?>"></script>
    <script src="<?php echo base_url('public/vendor/chartjs/Chart.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/vendor/select2/select2.min.js'); ?>">
    </script>

    <!-- Main JS-->
    <script src="<?php echo base_url('public/js/main.js'); ?>"></script>

	<?php if (isset($scripts)): ?>
    
		<?php foreach ($scripts as $script): ?>

			<script src="<?php echo base_url('public/'.$script); ?>"></script>

		<?php endforeach; ?>

	<?php endif; ?>

</body>

</html>
<!-- end document-->
