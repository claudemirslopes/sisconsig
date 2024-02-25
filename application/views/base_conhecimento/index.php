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
								<a href="<?php echo base_url('/'); ?>kb/add"><button type="button" class="btn btn-outline-dark btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp; Novo KB</button></a>
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


							<table id="example1" class="table table-striped table-bordered table-sm">
								<thead>
									<tr class="bg-dark text-light">
										<th style="font-size: .8em;">Listagem de KBs publicados</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($kbs as $kb) : ?>
										<tr>
											<td>
												<div class="col-md-12">
													<div class="card" style="border: 1px solid #B5B5B5;">
														<div class="card-header">
															<strong class="card-title">
																<?php echo $kb->kb_titulo; ?>
																<?php if ($kb->kb_tipo == 0) {
																	echo '<span class="badge badge-warning btn-sm float-right">Colaboradores</span>';
																} else {
																	echo '<span class="badge badge-secondary btn-sm float-right">Público</span>';
																}
																?>
															</strong>
														</div>
														<div class="card-body">
															<p class="card-text text-justify"><span class="badge badge-secondary float-left mt-1"><?php echo formata_data_banco_sem_hora($kb->kb_data_alteracao); ?></span> <a href="<?php echo base_url('kb/view/' . $kb->kb_id); ?>">&nbsp;<?php echo $kb->kb_resumo; ?>...</a>
																<?php if ($this->ion_auth->is_admin()) : ?>
																	<a href="<?php echo base_url('kb/edit/' . $kb->kb_id); ?>" class="btn btn-sm btn-primary float-right" title="Editar"><i class="fa fa-pencil"></i> Editar KB</a>
																<?php endif; ?>
															</p>
														</div>
													</div>
												</div>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END MAIN CONTENT-->
