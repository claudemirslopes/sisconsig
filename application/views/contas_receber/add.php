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


							<form method="post" name="form_edit" class="user">

								<fieldset class="border p-2" style="margin-top: -10px;">
									<legend class="font-small"><i class="fa fa-credit-card-alt"></i> Dados da conta</legend>
									<div class="form-row">
										<div class="form-group col-md-3">
											<label for="conta_receber_parceiro_id">Cliente <span style="color: red;font-weight: bold;">*</span></label><br>
											<select class="custom-select contas_receber" name="conta_receber_parceiro_id" required="">
												<?php foreach ($parceiros as $parceiro) : ?>
													<option value="<?php echo $parceiro->parceiro_id ?>"><?php echo $parceiro->parceiro_nome . '&nbsp;' . $parceiro->parceiro_sobrenome; ?></option>
												<?php endforeach; ?>
											</select>
											<?php echo form_error('conta_receber_parceiro_id', '<small class="form-text text-danger">', '</small>') ?>
										</div>
										<div class="form-group col-md-3">
											<label for="conta_receber_valor">Valor <span style="color: red;font-weight: bold;">*</span></label>
											<input type="text" name="conta_receber_valor" class="form-control  form-control-sm form-control-user money2" id="conta_receber_valor" placeholder="Ex: 99,99" value="<?php echo set_value('conta_receber_valor'); ?>">
											<?php echo form_error('conta_receber_valor', '<small class="form-text text-danger">', '</small>') ?>
										</div>
										<div class="form-group col-md-3">
											<label for="conta_receber_data_vencimento">Data de Vencimento <span style="color: red;font-weight: bold;">*</span></label>
											<input type="date" name="conta_receber_data_vencimento" class="form-control  form-control-sm form-control-user-date" id="conta_receber_data_vencimento" placeholder="Vencimento" value="<?php echo set_value('conta_receber_data_vencimento'); ?>">
											<?php echo form_error('conta_receber_data_vencimento', '<small class="form-text text-danger">', '</small>') ?>
										</div>
										<!--<div class="form-group col-md-2">
                                    <label for="conta_receber_data_pagamento">Data de Pagamento <span style="color: red;font-weight: bold;">*</span></label>
                                                                    <input type="date" name="conta_receber_data_pagamento" class="form-control  form-control-sm form-control-user-date" id="conta_receber_data_pagamento" placeholder="Pagamento" value="<?php echo set_value('conta_receber_data_pagamento'); ?>">
                                    <?php echo form_error('conta_receber_data_pagamento', '<small class="form-text text-danger">', '</small>') ?>
                                </div>-->
										<div class="form-group col-md-3">
											<label for="conta_receber_ativo">Situação <span style="color: red;font-weight: bold;">*</span></label>
											<select name="conta_receber_status" class="form-control  form-control-sm custom-select" id="conta_receber_ativo">
												<option value="0">Pendente</option>
												<option value="1">Paga</option>
											</select>
										</div>
									</div>

								</fieldset>

								<fieldset class="mt-2 border p-2">
									<legend class="font-small"><i class="fa fa-sticky-note"></i> Observação</legend>
									<div class="form-row">
										<div class="form-group col-md-12">
											<textarea name="conta_receber_obs" rows="5" class="form-control  form-control-sm form-control-user" id="conta_receber_obs" placeholder="Observação"><?php echo set_value('conta_receber_obs'); ?></textarea>
											<?php echo form_error('conta_receber_obs', '<small class="form-text text-danger">', '</small>') ?>
										</div>
									</div>
								</fieldset>

								<button type="submit" class="btn btn-primary btn-sm float-right mt-1"><i class="fa fa-plus" aria-hidden="true"></i> Cadastrar conta a receber</button>

							</form>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END MAIN CONTENT-->
