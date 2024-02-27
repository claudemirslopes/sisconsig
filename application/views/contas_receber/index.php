
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
										<strong class="card-title mb-3"><i class="fa fa-cc-visa" aria-hidden="true"></i>&nbsp; <?php echo $titulo; ?></small></strong>
										<div class="pull-right">
											<a href="<?php echo base_url('/'); ?>contas_receber/add"><button type="button" class="btn btn-outline-dark btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp; Nova conta a receber</button></a>
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
									
									<!-- Mensagem de info -->
									<?php if ($message = $this->session->flashdata('info')): ?>
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
													<th>Cliente</th>
													<th>Valor</th>
													<th class="text-center">Data Venc.</th>
													<th class="text-center">Data Pagam.</th>
													<th class="text-center">Situação</th>
													<th class="text-right">Ações</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($contas_receber as $conta_receber): ?>
												<tr>
													<td class="text-center"><?php echo $conta_receber->conta_receber_id; ?></td>
													<td><?php 
													if($conta_receber->pessoa == 1){
														echo $conta_receber->nome.' '.$conta_receber->sobrenome; 
													} else {
														echo $conta_receber->sobrenome;
													}
													?></td>
													<td><?php echo ('R$ '.$conta_receber->conta_receber_valor); ?></td>
													<td class="text-center pr-4"><?php echo formata_data_banco_sem_hora($conta_receber->conta_receber_data_vencimento); ?></td>
													<td class="text-center pr-4"><?php echo ($conta_receber->conta_receber_status == 1 ? formata_data_banco_com_hora($conta_receber->conta_receber_data_pagamento) : 'Aguardando pagamento'); ?></td>
													<td class="text-center pr-4">
														<?php
															if ($conta_receber->conta_receber_status == 1) {
																echo '<span class="badge badge-success btn-sm">Paga</span>';
															} elseif (strtotime($conta_receber->conta_receber_data_vencimento) > strtotime(date('Y-m-d'))) {
																echo '<span class="badge badge-secondary btn-sm">Pendente</span>';
															} elseif (strtotime($conta_receber->conta_receber_data_vencimento) == strtotime(date('Y-m-d'))) {
																echo '<span class="badge badge-warning btn-sm">Vence hoje</span>';
															} else {
																echo '<span class="badge badge-danger btn-sm">Vencida</span>';
															}
														?>
													</td>
													<td class="text-right">
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
														<a href="<?php echo base_url('contas_receber/edit/'.$conta_receber->conta_receber_id); ?>" class="btn btn-sm btn-primary" title="Editar"><i class="fa fa-pencil"></i></a>
														<a href="javascript(void)" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#conta_receber-<?php echo $conta_receber->conta_receber_id; ?>" title="Excluír"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
