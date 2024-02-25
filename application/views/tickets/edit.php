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
							<strong class="card-title mb-3"><i class="fa fa-ticket" aria-hidden="true"></i>&nbsp; <?php echo $titulo; ?></small></strong>
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
									<legend class="font-small"><i class="fa fa-th-list"></i> Dados do ticket</legend>

									<div class="form-row">
										<div class="form-group col-md-1">
											<label for="ticket_codigo">Ticket <span style="color: red;font-weight: bold;">*</span></label>
											<input type="text" name="ticket_codigo" class="form-control form-control-user bg-dark text-light" id="ticket_codigo" value="<?php echo $ticket->ticket_codigo; ?>" readonly="">
										</div>
										<div class="form-group col-md-3">
											<label for="ticket_user_id">Colaborador <span style="color: red;font-weight: bold;">*</span></label>
											<select style="pointer-events: none;touch-action: none;" name="ticket_user_id" class="form-control custom-select bg-light" id="ticket_user_id">
												<?php foreach ($users as $user) : ?>
													<option value="<?php echo $user->id ?>" <?php echo ($user->id == $ticket->ticket_user_id ? 'selected' : ''); ?>><?php echo $user->first_name . ' ' . $user->last_name ?></option>
												<?php endforeach; ?>
											</select>
										</div>
										<div class="form-group col-md-4">
											<label for="ticket_assunto">Assunto <span style="color: red;font-weight: bold;">*</span></label>
											<input type="text" name="ticket_assunto" class="form-control form-control-user" id="ticket_assunto" placeholder="Assunto" value="<?php echo $ticket->ticket_assunto; ?>">
											<?php echo form_error('servico_nome', '<small class="form-text text-danger">', '</small>') ?>
										</div>
										<div class="form-group col-md-2">
											<label for="ticket_status">Prioridade <span style="color: red;font-weight: bold;">*</span></label>

											<?php if ($ticket->ticket_prioridade == 0) : ?>
												<select name="ticket_prioridade" class="form-control form-control-user-date bg-secondary text-light font-weight-bold" id="ticket_prioridade">
													<option value="0" <?php echo ($ticket->ticket_prioridade == 0) ? 'selected' : ''; ?>>Baixa</option>
													<option value="1" <?php echo ($ticket->ticket_prioridade == 1) ? 'selected' : ''; ?>>Média</option>
													<option value="2" <?php echo ($ticket->ticket_prioridade == 2) ? 'selected' : ''; ?>>Alta</option>
												</select>
											<?php endif; ?>
											<?php if ($ticket->ticket_prioridade == 1) : ?>
												<select name="ticket_prioridade" class="form-control form-control-user-date bg-warning text-dark font-weight-bold" id="ticket_prioridade">
													<option value="0" <?php echo ($ticket->ticket_prioridade == 0) ? 'selected' : ''; ?>>Baixa</option>
													<option value="1" <?php echo ($ticket->ticket_prioridade == 1) ? 'selected' : ''; ?>>Média</option>
													<option value="2" <?php echo ($ticket->ticket_prioridade == 2) ? 'selected' : ''; ?>>Alta</option>
												</select>
											<?php endif; ?>
											<?php if ($ticket->ticket_prioridade == 2) : ?>
												<select name="ticket_prioridade" class="form-control form-control-user-date bg-danger text-light font-weight-bold" id="ticket_prioridade">
													<option value="0" <?php echo ($ticket->ticket_prioridade == 0) ? 'selected' : ''; ?>>Baixa</option>
													<option value="1" <?php echo ($ticket->ticket_prioridade == 1) ? 'selected' : ''; ?>>Média</option>
													<option value="2" <?php echo ($ticket->ticket_prioridade == 2) ? 'selected' : ''; ?>>Alta</option>
												</select>
											<?php endif; ?>
										</div>
										<div class="form-group col-md-2">
											<label for="ticket_status">Situação <span style="color: red;font-weight: bold;">*</span></label>

											<?php if ($ticket->ticket_status == 0) : ?>
												<select name="ticket_status" class="form-control form-control-user-date bg-warning text-dark font-weight-bold" id="ticket_status">
													<option value="0" <?php echo ($ticket->ticket_status == 0) ? 'selected' : ''; ?>>Pendente</option>
													<option value="1" <?php echo ($ticket->ticket_status == 1) ? 'selected' : ''; ?>>Resolvido</option>
												</select>
											<?php endif; ?>
											<?php if ($ticket->ticket_status == 1) : ?>
												<select name="ticket_status" class="form-control form-control-user-date bg-success text-light font-weight-bold" id="ticket_status">
													<option value="0" <?php echo ($ticket->ticket_status == 0) ? 'selected' : ''; ?>>Pendente</option>
													<option value="1" <?php echo ($ticket->ticket_status == 1) ? 'selected' : ''; ?>>Resolvido</option>
												</select>
											<?php endif; ?>
										</div>
									</div>
								</fieldset>

								<fieldset class="mt-2 border p-2">
									<legend class="font-small"><i class="fa fa-bullhorn"></i> Mensagem do chamado</legend>
									<div class="form-row">
										<div class="form-group col-md-12">
											<textarea name="ticket_mensagem" rows="3" class="form-control form-control-user bg-light" id="ticket_mensagem" readonly=""><?php echo $ticket->ticket_mensagem; ?></textarea>
											<?php echo form_error('ticket_mensagem', '<small class="form-text text-danger">', '</small>') ?>
										</div>
									</div>
								</fieldset>

								<fieldset class="mt-2 border p-2">
									<legend class="font-small"><i class="fa fa-comments"></i> Responder chamado <span class="text-danger font-weight-bold">*</span></legend>
									<div class="form-row">
										<div class="form-group col-md-12">
											<textarea name="ticket_resposta" rows="3" class="form-control form-control-user" id="ticket_resposta" placeholder="Responder ticket"><?php echo $ticket->ticket_resposta; ?></textarea>
											<?php echo form_error('ticket_resposta', '<small class="form-text text-danger">', '</small>') ?>
										</div>
									</div>
								</fieldset>

								<input type="hidden" name="ticket_id" value="<?php echo $ticket->ticket_id; ?>">

								<?php echo ($ticket->ticket_status == 1 ? '<button type="submit" class="btn btn-primary btn-sm float-right mt-1" style="display:none;" disabled><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Enviar resposta</button><span class="badge badge-light float-right mt-1"><i class="fa fa-thumbs-up" aria-hidden="true"></i>&nbsp;&nbsp;ESTE TICKET <b>(CHAMADO)</b> JÁ FOI RESOLVIDO NO DIA&nbsp;' . formata_data_banco_com_hora($ticket->ticket_data_alteracao) . '</span>' : '<button type="submit" class="btn btn-primary btn-sm float-right mt-1"><i class="fa fa-ticket" aria-hidden="true"></i> Enviar resposta</button>'); ?>
							</form>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END MAIN CONTENT-->
