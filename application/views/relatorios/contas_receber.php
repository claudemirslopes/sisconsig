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


							<form action="" target="_blank" class="user" name="form_receber" enctype="multipart/form-data" method="post" accept-charset="utf-8">

								<fieldset class="border p-2" style="margin-top: -10px;">

									<legend class="font-small"><i class="fa fa-calendar-alt"></i></i>&nbsp;&nbsp;Escolha uma opção</legend>

									<div class="form-group row pt-3 pl-3">
										<div class="custom-control custom-radio col offset-md-1 mb-2">
											<input type="radio" id="customRadio1" name="contas" value="pagas" class="custom-control-input" checked="">
											<label class="custom-control-label" for="customRadio1">Contas pagas</label>
										</div>
										<div class="custom-control custom-radio ml-auto col mb-2">
											<input type="radio" id="customRadio2" name="contas" value="receber" class="custom-control-input">
											<label class="custom-control-label" for="customRadio2">Contas a receber</label>
										</div>
										<div class="custom-control custom-radio ml-auto col">
											<input type="radio" id="customRadio3" name="contas" value="vencidas" class="custom-control-input">
											<label class="custom-control-label" for="customRadio3">Contas vencidas</label>
										</div>

									</div>

								</fieldset>


								<div class="mt-3">
									<button class="btn btn-primary btn-sm mr-2 float-right"><i class="fa fa-list" aria-hidden="true"></i> Gerar relatório</button>
								</div>

							</form>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END MAIN CONTENT-->
