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
							<strong class="card-title mb-3"><i class="fa fa-sticky-note" aria-hidden="true"></i>&nbsp; <?php echo $titulo; ?></small></strong>
							<div class="pull-right">
								<a href="<?php echo base_url('/'); ?>avisos/add"><button type="button" class="btn btn-outline-dark btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp; Novo aviso</button></a>
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
									<tr>
										<th class="text-center">#</th>
										<th>Assunto</th>
										<th class="text-center">Tipo</th>
										<th class="text-center">Ativo</th>
										<th class="text-center">Data</th>
										<th class="text-right">Ações</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($avisados as $avisado) : ?>
										<tr>
											<td class="text-center"><?php echo $avisado->avisado_id; ?></td>
											<td><?php echo $avisado->avisado_assunto; ?></td>
											<td class="text-center pr-4">
												<?php if ($avisado->avisado_tipo == 0) {
													echo '<span class="badge badge-warning btn-sm">Colaboradores</span>';
												} elseif ($avisado->avisado_tipo == 1) {
													echo '<span class="badge badge-info btn-sm">Clientes</span>';
												} else {
													echo '<span class="badge badge-secondary btn-sm">Todos</span>';
												}
												?>
											</td>
											<td class="text-center pr-4">
												<?php echo $avisado->avisado_ativa == 1 ? '<span class="badge badge-primary btn-sm">Sim</span>' : '<span class="badge badge-danger btn-sm">Não</span>' ?>
											</td>
											<td class="text-center pr-4"><?php echo formata_data_banco_com_hora($avisado->avisado_data_alteracao); ?></td>
											<style>
												.btn-danger {
													background: #B40404;
													border: solid 1px #B40404;
												}

												.btn-primary {
													background: #0B3861;
													border: solid 1px #0B3861;
												}
											</style>
											<td class="text-right">
												<a href="<?php echo base_url('avisos/edit/' . $avisado->avisado_id); ?>" class="btn btn-sm btn-primary" title="Editar"><i class="fa fa-pencil"></i></a>
												<a href="javascript(void)" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#avisado-<?php echo $avisado->avisado_id; ?>" title="Excluír"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
