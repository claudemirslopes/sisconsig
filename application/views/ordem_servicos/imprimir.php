<!-- PARRA LATERAL - SIDEBAR -->
<?php $this->load->view('layout/sidebar') ?>
<!-- PARRA LATERAL - SIDEBAR -->

<!-- BARRA SUPERIOR - NAVBAR -->
<?php $this->load->view('layout/navbar') ?>
<!-- BARRA SUPERIOR - NAVBAR -->

<style>
	.timd1 {
		background: #F8F9FA;
	}

	.timd1:hover {
		background: #DC3545;
	}

	.timd2 {
		background: #F8F9FA;
	}

	.timd2:hover {
		background: #28A745;
	}

	.timd3 {
		background: #F8F9FA;
	}

	.timd3:hover {
		background: #17A2B8;
	}
</style>

<!-- MAIN CONTENT-->
<div class="main-content">

	<!-- BARRA SUPERIOR - TOPBAR -->
	<?php $this->load->view('layout/topbar') ?>
	<!-- BARRA SUPERIOR - TOPBAR -->

	<div class="section__content section__content--p30" style="margin-top: -8px !important;">
		<div class="container-fluid">
			<div class="row" style="margin-bottom: -25px;">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<strong class="card-title mb-3"><i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp; <?php echo $titulo; ?></small></strong>
							<div class="pull-right">
								<!-- <a href="<?php echo base_url('/'); ?>vendas/add"><button type="button" class="btn btn-outline-dark btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp; Realizar nova venda</button></a> -->
								<a href="#" type="button" class="btn btn-outline-danger btn-sm" title="Página anterior" onclick="voltar()">
									<i class="fa fa-angle-left" aria-hidden="true"></i></a>
								<script>
									function voltar() {
										window.history.back();
									}
								</script>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row m-t-25">
				<!-- CONTEÚDO SERÁ COLOCADO AQUI -->
				<div class="content mt-1 col-lg-12" style="margin-top: -15px !important;">
					<div class="card">

						<div class="card-body" style="border: 1px solid #A4A4A4;">

							<!-- Mensagem de sucesso -->
							<?php if ($message = $this->session->flashdata('sucesso')) : ?>
								<div class="alert  alert-success alert-dismissible fade show " role="alert">
									<span class="badge badge-pill badge-success"><i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp;&nbsp;Sucesso</span>&nbsp;&nbsp;
									<?php echo $message; ?>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
							<?php endif; ?>
							<!-- Mensagem de sucesso -->

							<!-- Mensagem de erro -->
							<?php if ($message = $this->session->flashdata('error')) : ?>
								<div class="alert  alert-danger alert-dismissible fade show " role="alert">
									<span class="badge badge-pill badge-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;&nbsp;Atenção</span>&nbsp;&nbsp;
									<?php echo $message; ?>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
							<?php endif; ?>
							<!-- Mensagem de erro -->

							<div class="row">
								<div class="col-md-4">
									<div class="card">
										<div class="card-body text-white timd1" style="border: 1px solid #f7f7f7;">
											<a href="<?php echo base_url('os/pdf/' . $ordem_servico->ordem_servico_id); ?>" target="_blank" class="btn btn-danger btn-icon-split btn-lg btn-block">
												<span class="icon text-white-50" style="float: left;">
													<i class="fa fa-print"></i>
												</span>
												<span class="text">&nbsp;Imprimir OS <span style="font-size: .6em;"><i class="fa fa-file-pdf-o"></i></span></span>
											</a>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card">
										<div class="card-body text-white timd2" style="border: 1px solid #f7f7f7;">
											<a href="<?php echo base_url('os/add'); ?>" class="btn btn-success btn-icon-split btn-lg btn-block">
												<span class="icon text-white-50" style="float: left;">
													<i class="fa fa-plus-square"></i>
												</span>
												<span class="text">&nbsp;Cadastrar OS</span>
											</a>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card">
										<div class="card-body text-white timd3" style="border: 1px solid #f7f7f7;">
											<a href="<?php echo base_url('os'); ?>" class="btn btn-info btn-icon-split btn-lg btn-block">
												<span class="icon text-white-50" style="float: left;">
													<i class="fa fa-list"></i>
												</span>
												<span class="text">&nbsp;Listar OS</span>
											</a>
										</div>
									</div>
								</div>

							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END MAIN CONTENT-->
