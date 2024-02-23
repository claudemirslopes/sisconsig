
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
									
								
										<form method="post" name="form_add" class="user">
											
											<fieldset class="border p-2" style="margin-top: -10px;">
												<legend class="font-small"><i class="fa fa-th-list"></i> Dados da forma de pagamento</legend>
												<div class="form-row">
													<div class="form-group col-md-6">
														<label for="forma_pagamento_nome">Nome <span style="color: red;font-weight: bold;">*</span></label> 
														<input type="text" name="forma_pagamento_nome" class="form-control form-control-user" id="forma_pagamento_nome" placeholder="Nome" value="<?php echo set_value('forma_pagamento_nome'); ?>">
														<?php echo form_error('forma_pagamento_nome', '<small class="form-text text-danger">','</small>') ?>
													</div>
													<div class="form-group col-md-4">
														<label for="forma_pagamento_aceita_parc">Aceita parcelamento? <span style="color: red;font-weight: bold;">*</span></label>
														<select name="forma_pagamento_aceita_parc" class="form-control custom-select" id="forma_pagamento_aceita_parc">
															<option value="0">Não</option>
															<option value="1">Sim</option>
														</select>
													</div>
													<div class="form-group col-md-2">
														<label for="forma_pagamento_ativa">Ativa <span style="color: red;font-weight: bold;">*</span></label>
														<select name="forma_pagamento_ativa" class="form-control custom-select" id="forma_pagamento_ativa">
															<option value="0">Não</option>
															<option value="1">Sim</option>
														</select>
													</div>
												</div>

											</fieldset>
											
											<button type="submit" class="btn btn-primary btn-sm float-right mt-1"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Cadastrar forma de pagamento</button>
										</form>
									</div>

								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
