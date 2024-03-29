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
								<a href="<?php echo base_url('/'); ?>datasheets/add"><button type="button" class="btn btn-outline-dark btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp; Novo datasheet</button></a>
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

							<table id="example1" class="table table-striped table-bordered table-sm">
								<thead>
									<tr>
										<th class="text-center">#</th>
										<th>Arquivo</th>
										<th class="text-center">Ativo</th>
										<th class="text-right" style="padding-right: 10px;">Ações</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($datasheets as $datasheet) : ?>
										<tr>
											<td class="text-center"><?php echo $datasheet->datasheet_id; ?></td>
											<td><?php echo '<a href="" target="" class="text-dark">' . $datasheet->datasheet_nome . '</a>'; ?></td>
											<td class="text-center">
												<?php echo $datasheet->datasheet_ativo == 1 ? '<span class="badge badge-success btn-sm">Sim</span>' : '<span class="badge badge-danger btn-sm">Não</span>' ?>
											</td>
											<td class="text-right">
												<a href="<?php echo base_url('fornecedores/edit/' . $datasheet->datasheet_id); ?>" class="btn btn-sm btn-primary" title="Editar"><i class="fa fa-pencil"></i></a>
												<a href="javascript(void)" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#fornecedor-<?php echo $datasheet->datasheet_id; ?>" title="Excluír"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
