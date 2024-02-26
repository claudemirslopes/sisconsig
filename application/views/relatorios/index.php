<!-- PARRA LATERAL - SIDEBAR -->
<?php $this->load->view('layout/sidebar') ?>
<!-- PARRA LATERAL - SIDEBAR -->

<!-- BARRA SUPERIOR - NAVBAR -->
<?php $this->load->view('layout/navbar') ?>
<!-- BARRA SUPERIOR - NAVBAR -->

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
							<strong class="card-title mb-3"><i class="fa fa-check" aria-hidden="true"></i>&nbsp; <?php echo $titulo; ?></small></strong>
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

						<div class="card-body" style="border: 1px solid #f7f7f7;">

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

							<!-- Mensagem de info -->
							<?php if ($message = $this->session->flashdata('info')) : ?>
								<div class="alert  alert-warning alert-dismissible fade show " role="alert">
									<span class="badge badge-pill badge-warning"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>&nbsp;&nbsp;Advertência</span>&nbsp;&nbsp;
									<?php echo $message; ?>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
							<?php endif; ?>
							<!-- Mensagem de info -->

							<div class="row">
								<div class="col-md-6">
									<aside class="profile-nav alt">
										<section class="card" style="border: 1px solid #B5B5B5;">
											<div class="card-header user-header alt bg-light">
												<div class="media">
													<a href="#">
														<img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="<?php echo base_url('public/images/icons/vendas.svg'); ?>">
													</a>
													<div class="media-body">
														<h3 class="text-dark display-6" style="font-size: 1.4em;">Vendas</h3>
														<p>gerar relatório de vendas</p>
													</div>
												</div>
												<a href="<?php echo base_url('relatorios/vendas'); ?>" class="btn btn-outline-secondary btn-icon-split btn-lg btn-block">
													<span class="icon text-secondary-50" style="float: left;">
														<i class="fa fa-list"></i>
													</span>
													<span class="text" style="font-size: .7em;">&nbsp;Relatório de Vendas</span></span>
												</a>
											</div>
										</section>
									</aside>
								</div>
								<div class="col-md-6">
									<aside class="profile-nav alt">
										<section class="card" style="border: 1px solid #B5B5B5;">
											<div class="card-header user-header alt bg-light">
												<div class="media">
													<a href="#">
														<img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="<?php echo base_url('public/images/icons/servicos.svg'); ?>">
													</a>
													<div class="media-body">
														<h3 class="text-dark display-6" style="font-size: 1.4em;">Ordem de Serviços</h3>
														<p>gerar relatório de ordem de serviços</p>
													</div>
												</div>
												<a href="<?php echo base_url('relatorios/os'); ?>" class="btn btn-outline-secondary btn-icon-split btn-lg btn-block">
													<span class="icon text-secondary-50" style="float: left;">
														<i class="fa fa-list"></i>
													</span>
													<span class="text" style="font-size: .7em;">&nbsp;Relatório de Ordem de Serviços</span>
												</a>
											</div>
										</section>
									</aside>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<aside class="profile-nav alt">
										<section class="card" style="border: 1px solid #B5B5B5;">
											<div class="card-header user-header alt bg-light">
												<div class="media">
													<a href="#">
														<img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="<?php echo base_url('public/images/icons/contareceber.svg'); ?>">
													</a>
													<div class="media-body">
														<h3 class="text-dark display-6" style="font-size: 1.4em;">Contas a Receber</h3>
														<p>gerar relatório de contas a receber</p>
													</div>
												</div>
												<a href="<?php echo base_url('relatorios/receber'); ?>" class="btn btn-outline-secondary btn-icon-split btn-lg btn-block">
													<span class="icon text-secondary-50" style="float: left;">
														<i class="fa fa-list"></i>
													</span>
													<span class="text" style="font-size: .7em;">&nbsp;Relatório de Contas a Receber</span>
												</a>
											</div>
										</section>
									</aside>
								</div>
								<div class="col-md-6">
									<aside class="profile-nav alt">
										<section class="card" style="border: 1px solid #B5B5B5;">
											<div class="card-header user-header alt bg-light">
												<div class="media">
													<a href="#">
														<img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="<?php echo base_url('public/images/icons/contapagar.svg'); ?>">
													</a>
													<div class="media-body">
														<h3 class="text-dark display-6" style="font-size: 1.4em;">Contas a Pagar</h3>
														<p>gerar relatório de contas a pagar</p>
													</div>
												</div>
												<a href="<?php echo base_url('relatorios/pagar'); ?>" class="btn btn-outline-secondary btn-icon-split btn-lg btn-block">
													<span class="icon text-secondary-50" style="float: left;">
														<i class="fa fa-list"></i>
													</span>
													<span class="text" style="font-size: .7em;">&nbsp;Relatório de Contas a Pagar</span>
												</a>
											</div>
										</section>
									</aside>
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
