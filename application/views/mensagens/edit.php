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
							<strong class="card-title mb-3"><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp; <?php echo $titulo; ?></small></strong>
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
									<legend class="font-small"><i class="fa fa-th-list"></i> Dados do parceiro e pedido</legend>

									<div class="form-row">
										<div class="form-group col-md-2">
											<label for="reclama_orc_id">Orcamento <span style="color: red;font-weight: bold;">*</span></label>
											<select style="pointer-events: none;touch-action: none;font-size: .9em;" name="reclama_orc_id" class="form-control form-control-sm form-control-user-date bg-dark text-light font-weight-bold" id="reclama_orc_id">
												<?php foreach ($orcamentos as $orcamento) : ?>
													<option value="<?php echo $orcamento->orc_id ?>" <?php echo ($orcamento->orc_id == $reclama->reclama_orc_id ? 'selected' : ''); ?>><?php echo $orcamento->orc_codigo ?></option>
												<?php endforeach; ?>
											</select>
										</div>
										<div class="form-group col-md-5">
											<label for="reclama_cli_id">Autorizado <span style="color: red;font-weight: bold;">*</span></label>
											<select style="pointer-events: none;touch-action: none;" name="reclama_cli_id" class="form-control form-control-sm custom-select bg-light" id="reclama_cli_id">
												<?php foreach ($parceiros as $parceiro) : ?>
													<option value="<?php echo $parceiro->parceiro_id ?>" <?php echo ($parceiro->parceiro_id == $reclama->reclama_cli_id ? 'selected' : ''); ?>><?php echo $parceiro->parceiro_nome ?></option>
												<?php endforeach; ?>
											</select>
										</div>
										<div class="form-group col-md-5">
											<label for="reclama_orc_id">Parceiro <span style="color: red;font-weight: bold;">*</span></label>
											<select style="pointer-events: none;touch-action: none;" name="" class="form-control form-control-sm custom-select" id="reclama_orc_id" disabled="">
												<?php foreach ($orcamentos as $orcamento) : ?>
													<option <?php echo ($orcamento->orc_id == $reclama->reclama_orc_id ? 'selected' : ''); ?>><?php echo $orcamento->orc_cli_nome ?></option>
												<?php endforeach; ?>
											</select>
										</div>
										<div class="form-group col-md-3">
											<label for="reclama_status">Ativo <span style="color: red;font-weight: bold;">*</span></label>
											<?php if ($reclama->reclama_status == 0) : ?>
												<select name="reclama_status" class="form-control form-control-sm form-control-user-date bg-danger text-light font-weight-bold" id="produto_ativo">
													<option value="0" <?php echo ($reclama->reclama_status == 0) ? 'selected' : ''; ?>>Pendente</option>
													<option value="1" <?php echo ($reclama->reclama_status == 1) ? 'selected' : ''; ?>>Resolvido</option>
												</select>
											<?php endif; ?>
											<?php if ($reclama->reclama_status == 1) : ?>
												<select name="reclama_status" class="form-control form-control-sm form-control-user-date bg-info text-light font-weight-bold" id="produto_ativo">
													<option value="0" <?php echo ($reclama->reclama_status == 0) ? 'selected' : ''; ?>>Pendente</option>
													<option value="1" <?php echo ($reclama->reclama_status == 1) ? 'selected' : ''; ?>>Resolvido</option>
												</select>
											<?php endif; ?>
										</div>
										<div class="form-group col-md-9">
											<label for="reclama_status">Ativo <span style="color: red;font-weight: bold;">*</span></label>
											<?php if ($reclama->reclama_tipo == 'R') : ?>
												<select name="reclama_tipo" class="form-control form-control-sm form-control-user-date text-light font-weight-bold" id="produto_ativo" style="background: #610B0B;">
													<option value="R" <?php echo ($reclama->reclama_tipo == 'R') ? 'selected' : ''; ?>>Mensagem</option>
													<option value="S" <?php echo ($reclama->reclama_tipo == 'S') ? 'selected' : ''; ?>>Sugestão</option>
													<option value="E" <?php echo ($reclama->reclama_tipo == 'E') ? 'selected' : ''; ?>>Elogio</option>
												</select>
											<?php endif; ?>
											<?php if ($reclama->reclama_tipo == 'S') : ?>
												<select name="reclama_tipo" class="form-control form-control-sm form-control-user-date text-light font-weight-bold" id="produto_ativo" style="background: #0B243B;">
													<option value="R" <?php echo ($reclama->reclama_tipo == 'R') ? 'selected' : ''; ?>>Mensagem</option>
													<option value="S" <?php echo ($reclama->reclama_tipo == 'S') ? 'selected' : ''; ?>>Sugestão</option>
													<option value="E" <?php echo ($reclama->reclama_tipo == 'E') ? 'selected' : ''; ?>>Elogio</option>
												</select>
											<?php endif; ?>
											<?php if ($reclama->reclama_tipo == 'E') : ?>
												<select name="reclama_tipo" class="form-control form-control-sm form-control-user-date text-light font-weight-bold" id="produto_ativo" style="background: #0B3B24;">
													<option value="R" <?php echo ($reclama->reclama_tipo == 'R') ? 'selected' : ''; ?>>Mensagem</option>
													<option value="S" <?php echo ($reclama->reclama_tipo == 'S') ? 'selected' : ''; ?>>Sugestão</option>
													<option value="E" <?php echo ($reclama->reclama_tipo == 'E') ? 'selected' : ''; ?>>Elogio</option>
												</select>
											<?php endif; ?>
										</div>
									</div>
								</fieldset>

								<fieldset class="mt-2 border p-2">
									<legend class="font-small"><i class="fa fa-bullhorn"></i> Mensagem</legend>
									<div class="form-row">
										<div class="form-group col-md-12">
											<textarea name="reclama_obs" rows="3" class="form-control form-control-sm form-control-user bg-light" id="reclama_obs" readonly=""><?php echo $reclama->reclama_obs; ?></textarea>
											<?php echo form_error('reclama_obs', '<small class="form-text text-danger">', '</small>') ?>
										</div>
									</div>
								</fieldset>

								<fieldset class="mt-2 border p-2">
									<legend class="font-small"><i class="fa fa-comments"></i> Responder reclamação <span class="text-danger font-weight-bold">*</span></legend>
									<div class="form-row">
										<div class="form-group col-md-12">
											<textarea name="reclama_retorno_obs" rows="3" class="form-control form-control-sm form-control-user" id="reclama_obs" placeholder="Responder reclamação"><?php echo $reclama->reclama_retorno_obs; ?></textarea>
											<?php echo form_error('reclama_retorno_obs', '<small class="form-text text-danger">', '</small>') ?>
										</div>
									</div>
								</fieldset>

								<input type="hidden" name="reclama_id" value="<?php echo $reclama->reclama_id; ?>">

								<?php echo ($reclama->reclama_status == 1 ? '<button type="submit" class="btn btn-primary btn-sm float-right mt-1" style="display:none;" disabled><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Enviar resposta</button><span class="badge badge-light float-right mt-1"><i class="fa fa-thumbs-up" aria-hidden="true"></i>&nbsp;&nbsp;ESTA MENSAGEM JÁ FOI RESOLVIDA NO DIA&nbsp;' . formata_data_banco_com_hora($reclama->reclama_data_alteracao) . '</span>' : '<button type="submit" class="btn btn-primary btn-sm float-right mt-1"><i class="fa fa-comments" aria-hidden="true"></i> Enviar resposta</button>'); ?>
							</form>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END MAIN CONTENT-->
