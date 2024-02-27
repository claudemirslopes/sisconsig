
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
										<strong class="card-title mb-3"><i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp; <?php echo $titulo; ?></small></strong>
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
												<legend class="font-small"><i class="fa fa-th-list"></i> Dados do serviço</legend>
												<div class="form-row">
													<div class="form-group col-md-8">
														<label for="servico_nome">Nome do Serviço <span style="color: red;font-weight: bold;">*</span></label> 
														<input type="text" name="servico_nome" class="form-control form-control-user" id="servico_nome" placeholder="Nome do Serviço" value="<?php echo set_value('servico_nome'); ?>">
														<?php echo form_error('servico_nome', '<small class="form-text text-danger">','</small>') ?>
													</div>
													<div class="form-group col-md-2">
														<label for="servico_preco">Preço <span style="color: red;font-weight: bold;">*</span></label>
														<input type="text" name="servico_preco" class="form-control form-control-user money" id="servico_preco" placeholder="Ex: 99,99" value="<?php echo set_value('servico_preco'); ?>">
														<?php echo form_error('servico_preco', '<small class="form-text text-danger">','</small>') ?>
													</div>
													<div class="form-group col-md-2">
														<label for="servico_ativo">Ativo <span style="color: red;font-weight: bold;">*</span></label>
														<select name="servico_ativo" class="form-control custom-select" id="servico_ativo">
															<option value="0">Não</option>
															<option value="1">Sim</option>
														</select>
													</div>
												</div>

											</fieldset>
											
											<fieldset class="mt-2 border p-2">
												<legend class="font-small"><i class="fa fa-sticky-note"></i> Descrição</legend>
												<div class="form-row">
													<div class="form-group col-md-12">
														<textarea name="servico_descricao" rows="3" class="form-control form-control-user" id="servico_descricao" placeholder="Descrição"><?php echo set_value('servico_descricao'); ?></textarea>
														<?php echo form_error('servico_descricao', '<small class="form-text text-danger">','</small>') ?>
													</div>
												</div>
											</fieldset>
											
											<button type="submit" class="btn btn-primary btn-sm float-right mt-1"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Adicionar servico</button>
										</form>
									</div>

								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
