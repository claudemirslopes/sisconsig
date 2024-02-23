
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
									<?php if ($message = $this->session->flashdata('sucesso')): ?>
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
									<?php if ($message = $this->session->flashdata('error')): ?>
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
												<legend class="font-small"><i class="fa fa-credit-card"></i> Dados da conta</legend>
												<div class="form-row">
													<div class="form-group col-md-5">
														<label for="conta_pagar_fornecedor_id">Fornecedor <span style="color: red;font-weight: bold;">*</span></label> 
														<select style="pointer-events: none;touch-action: none;"  name="conta_pagar_fornecedor_id" class="custom-select">
															<?php foreach($fornecedores as $fornecedor): ?>
															<option value="<?php echo $fornecedor->fornecedor_id ?>" <?php echo ($fornecedor->fornecedor_id == $conta_pagar->conta_pagar_fornecedor_id ? 'selected' : ''); ?>><?php echo $fornecedor->fornecedor_nome_fantasia ?></option>
															<?php endforeach; ?>
														</select>
														<?php echo form_error('conta_pagar_fornecedor_id', '<small class="form-text text-danger">','</small>') ?>
													</div>
													<div class="form-group col-md-2">
														<label for="conta_pagar_valor">Valor <span style="color: red;font-weight: bold;">*</span></label>
														<input  <?php echo ($conta_pagar->conta_pagar_status == 1 ? 'readonly' : '');?> type="text" name="conta_pagar_valor" class="form-control form-control-user money2" id="conta_pagar_valor" placeholder="Ex: 99,99" value="<?php echo $conta_pagar->conta_pagar_valor; ?>">
														<?php echo form_error('conta_pagar_valor', '<small class="form-text text-danger">','</small>') ?>
													</div>
													<div class="form-group col-md-3">
														<label for="conta_pagar_data_vencimento">Data de Vencimento <span style="color: red;font-weight: bold;">*</span></label>
														<input type="date" name="conta_pagar_data_vencimento" class="form-control form-control-user-date" id="conta_pagar_data_vencimento" placeholder="Vencimento" value="<?php echo $conta_pagar->conta_pagar_data_vencimento; ?>">
														<?php echo form_error('conta_pagar_data_vencimento', '<small class="form-text text-danger">','</small>') ?>
													</div>
														<!--<div class="form-group col-md-2">
														<label for="conta_pagar_data_pagamento">Data de Pagamento <span style="color: red;font-weight: bold;">*</span></label>
														<input type="date" name="conta_pagar_data_pagamento" class="form-control form-control-user-date" id="conta_pagar_data_pagamento" placeholder="Pagamento" value="<?php echo $conta_pagar->conta_pagar_data_pagamento; ?>">
														<?php echo form_error('conta_pagar_data_pagamento', '<small class="form-text text-danger">','</small>') ?>
													</div>-->
													<div class="form-group col-md-2">
														<label for="conta_pagar_ativo">Situação <span style="color: red;font-weight: bold;">*</span></label>
														<select name="conta_pagar_status" class="form-control custom-select" id="conta_pagar_ativo">
															<option value="0" <?php echo ($conta_pagar->conta_pagar_status == 0) ? 'selected' : ''; ?>>Pendente</option>
															<option value="1" <?php echo ($conta_pagar->conta_pagar_status == 1) ? 'selected' : ''; ?>>Paga</option>
														</select>
													</div>
												</div>

											</fieldset>
											
											<fieldset class="mt-2 border p-2">
												<legend class="font-small"><i class="fa fa-sticky-note"></i> Observação</legend>
												<div class="form-row">
													<div class="form-group col-md-12">
														<textarea name="conta_pagar_obs" rows="5" class="form-control form-control-user" id="conta_pagar_obs" placeholder="Observação"><?php echo $conta_pagar->conta_pagar_obs ?></textarea>
														<?php echo form_error('conta_pagar_obs', '<small class="form-text text-danger">','</small>') ?>
													</div>
												</div>
											</fieldset>
											
											<input type="hidden" name="conta_pagar_id" value="<?php echo $conta_pagar->conta_pagar_id; ?>">
											<?php echo ($conta_pagar->conta_pagar_status == 1 ? '<button type="submit" class="btn btn-primary btn-sm float-right mt-1" style="display:none;" disabled><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar conta a pagar</button><span class="badge badge-light float-right mt-1"><i class="fa fa-thumbs-up" aria-hidden="true"></i>&nbsp;&nbsp;ESTA CONTA FOI PAGA NO DIA&nbsp;'.formata_data_banco_com_hora($conta_pagar->conta_pagar_data_pagamento).'</span>' : '<button type="submit" class="btn btn-primary btn-sm float-right mt-1"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar conta a pagar</button>'); ?>
											
										</form>
									</div>

								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
