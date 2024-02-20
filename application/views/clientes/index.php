
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

                <div class="section__content section__content--p30">
                    <div class="container-fluid">
						<div class="row" style="margin-bottom: -25px;">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<strong class="card-title mb-3"><i class="fa fa-check" aria-hidden="true"></i>&nbsp; <?php echo $titulo; ?></small></strong>
										<div class="pull-right">
											<a href="<?php echo base_url('/'); ?>vendas/add"><button type="button" class="btn btn-outline-dark btn-sm"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;&nbsp; Novo Cliente</button></a>
											<a href="<?php echo base_url('/'); ?>sistema" type="button" class="btn btn-outline-danger btn-sm" title="Configurações">
												<i class="fa fa-cogs" aria-hidden="true"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
                        <div class="row m-t-25">
                            <!-- CONTEÚDO SERÁ COLOCADO AQUI -->
							<div class="content mt-1 col-lg-12" style="margin-top: -15px !important;">
								<div class="card">
									
									<div class="card-body" style="border: 1px solid #F7F7F7;">
									
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
													<th>Nome / Razão Social</th>
													<th>CPF / CNPJ</th>
													<th class="text-center">Tipo</th>
													<th>Físico / Jurídico</th>
													<th class="text-center">ID</th>
													<th class="text-center">Ativo</th>
													<th class="text-right">Ações</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($clientes as $cliente): ?>
												<tr>
													<td>
														<?php if ($cliente->cliente_pessoa == 1):  ?>
														<?php echo $cliente->cliente_nome ?>&nbsp;<?php echo $cliente->cliente_sobrenome ?>
														<?php else: ?>
														<?php echo $cliente->cliente_nome ?>
														<?php endif; ?>
													</td>
													<td><?php echo $cliente->cliente_cpf_cnpj ?></td>
													<td class="text-center">
														<?php 
															if ($cliente->cliente_tipo == 1) {
																echo '<span class="badge badge-info btn-sm">Franqueado</span>';
															} elseif ($cliente->cliente_tipo == 2) {
																echo '<span class="badge badge-secondary btn-sm">Integrador</span>';
															} elseif ($cliente->cliente_tipo == 0) {
																echo '<span class="badge badge-warning btn-sm">Cliente (Teste)</span>';
															} else {
																echo '<span class="badge badge-primary btn-sm">Distribuidor</span>';
															}
														?>
													</td>
													<td>
														<?php echo $cliente->cliente_pessoa == 1 ? 'Pessoa Física' : 'Pessoa Jurídica' ?>
													</td>
													<td class="text-center pr-4"><?php echo $cliente->cliente_id ?></td>
													<td class="text-center pr-4">
														<?php echo $cliente->cliente_ativo == 1 ? '<span class="badge badge-success btn-sm">Sim</span>' : '<span class="badge badge-danger btn-sm">Não</span>' ?>
													</td>
													<td class="text-right">
														<a href="<?php echo base_url('clientes/edit/'.$cliente->cliente_id); ?>" class="btn btn-sm btn-info" title="Editar"><i class="fa fa-pencil"></i></a>
														<a href="javascript(void)" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#cliente-<?php echo $cliente->cliente_id; ?>" title="Excluír"><i class="fa fa-user-times" aria-hidden="true"></i></a>
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
        