
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
										<strong class="card-title mb-3"><i class="fa fa-tachometer-alt" aria-hidden="true"></i>&nbsp; Painel Administrativo <small>(Dashboard do Sistema)</small></strong>
										<div class="pull-right">
											<a href="<?php echo base_url('/'); ?>vendas/add"><button type="button" class="btn btn-outline-dark btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp; Realizar nova venda</button></a>
											<a href="<?php echo base_url('/'); ?>sistema" type="button" class="btn btn-outline-danger btn-sm" title="Configurações">
												<i class="fa fa-cogs" aria-hidden="true"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
                        <div class="row m-t-25">
							<!-- Início do lado A | Dashboard para os usuários da plataforma -->
							<div class="content mt-1 col-lg-7" style="margin-top: -15px !important;">
								<div class="card">
									<div class="card-header" style="background: #cdcdcd;">
										<strong class="card-title" v-if="headerText">Dashboard</strong>
									</div>

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
										
										<!-- Contador para valores de vendas -->
										<div class="row">
											<div class="col-sm-6">
												<div class="card text-white bg-flat-color-5 imagem3">
													<div class="card-body pb-0">
														<div class="dropdown float-right" style="z-index: 0 !important;">
															<button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton1" data-toggle="dropdown">
																<i class="fa fa-cog"></i>
															</button>
															<div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
																<div class="dropdown-menu-content" style="color: #FF6900;">
																	<a class="dropdown-item" href="<?php echo base_url('vendas'); ?>">Ver Todas</a>
																	<a class="dropdown-item" href="<?php echo base_url('vendas/add'); ?>">Adicionar</a>
																</div>
															</div>
														</div>
														<h4 class="mb-0">
															<span class="text-light" style="font-size: .8em;"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Total de vendas</span><hr/>
															<center><span class="count text-light"><?php echo 'R$ '.$soma_vendas->venda_valor_total; ?></span></center>
														</h4>
														<p class="text-light small mb-2" style="text-align: center;">vendidos</p>
													</div>
												</div>
											</div>
											<!-- Contador para valores de contas a receber -->
											<div class="col-sm-6">
												<div class="card text-white bg-flat-color-2 imagem3">
													<div class="card-body pb-0">
														<div class="dropdown float-right">
															<button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton1" data-toggle="dropdown">
																<i class="fa fa-cog"></i>
															</button>
															<div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
																<div class="dropdown-menu-content">
																	<a class="dropdown-item" href="<?php echo base_url('contas_receber'); ?>">Ver todas</a>
																	<a class="dropdown-item" href="<?php echo base_url('contas_receber/add'); ?>">Adicionar</a>
																</div>
															</div>
														</div>
														<h4 class="mb-0">
															<span class="text-light" style="font-size: .8em;"><i class="fa fa-dollar" aria-hidden="true"></i> Contas a Receber</span><hr/>
															<center><span class="count text-light"><?php echo 'R$ '.$soma_receber->conta_receber_valor; ?></span></center>
														</h4>
														<p class="text-light small mb-2" style="text-align: center;">total a receber</p>
													</div>
												</div>
											</div>
										</div>											
										<!-- Contador para valores de contas a pagar -->
										<div class="row">
											<div class="col-sm-6">
												<div class="card text-white bg-flat-color-4 imagem3">
													<div class="card-body pb-0">
														<div class="dropdown float-right">
															<button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton1" data-toggle="dropdown">
																<i class="fa fa-cog"></i>
															</button>
															<div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
																<div class="dropdown-menu-content">
																	<a class="dropdown-item" href="<?php echo base_url('contas_pagar'); ?>">Ver Todas</a>
																	<a class="dropdown-item" href="<?php echo base_url('contas_pagar/add'); ?>">Adicionar</a>
																</div>
															</div>
														</div>
														<h4 class="mb-0">
															<span class="text-light" style="font-size: .8em;"><i class="fa fa-money" aria-hidden="true"></i> Contas a Pagar</span><hr/>
															<center><span class="count text-light"><?php echo 'R$ '.$soma_pagar->conta_pagar_valor; ?></span></center>
														</h4>
														<p class="text-light small mb-2" style="text-align: center;">total a pagar</p>
													</div>
												</div>
											</div>
											<!-- Contador para valores de informações de OS (Orçamentos) -->
											<div class="col-sm-6">
												<div class="card text-white bg-flat-color-6 imagem3">
													<div class="card-body pb-0">
														<div class="dropdown float-right">
															<button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton1" data-toggle="dropdown">
																<i class="fa fa-cog"></i>
															</button>
															<div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
																<div class="dropdown-menu-content">
																	<a class="dropdown-item" href="<?php echo base_url('os'); ?>">Ver Todas</a>
																	<a class="dropdown-item" href="<?php echo base_url('os/add'); ?>">Adicionar</a>
																</div>
															</div>
														</div>
														<h4 class="mb-0">
															<span class="text-light" style="font-size: .8em;"><i class="fa fa-cogs" aria-hidden="true"></i> Pedidos de Parceiros</span><hr/>
															<center><span class="count text-light"><?php echo 'R$ '.$soma_servicos->ordem_servico_valor_total; ?></span></center>
														</h4>
														<p class="text-light small mb-2" style="text-align: center;">total cobrado</p>
													</div>
												</div>
											</div>
										</div>
										<!-- Contador para verificar número de parceiros -->
										<div class="row">
											<div class="col-sm-6">
												<div class="card text-white bg-flat-color-1 imagem3">
													<div class="card-body pb-0">
														<div class="dropdown float-right">
															<button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton1" data-toggle="dropdown">
																<i class="fa fa-cog"></i>
															</button>
															<div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
																<div class="dropdown-menu-content">
																	<a class="dropdown-item" href="<?php echo base_url('parceiros'); ?>">Ver Todas</a>
																	<a class="dropdown-item" href="<?php echo base_url('parceiros/add'); ?>">Adicionar</a>
																</div>
															</div>
														</div>
														<h4 class="mb-0">
															<span class="text-light" style="font-size: .8em;"><i class="fa fa-users" aria-hidden="true"></i> Franqueados</span><hr/>
															<center><span class="count text-light" style=""><?php echo $num_rows = $this->db->count_all_results('parceiros'); ?></span></center>
														</h4>
														<p class="text-light small mb-2" style="text-align: center;">total de autorizados</p>
													</div>
												</div>
											</div>
											<!-- Contador para verificar produtos em estoque -->
											<div class="col-sm-6">
												<div class="card text-white bg-flat-color-9 imagem3">
													<div class="card-body pb-0">
														<div class="dropdown float-right">
															<button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton1" data-toggle="dropdown">
																<i class="fa fa-cog"></i>
															</button>
															<div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
																<div class="dropdown-menu-content">
																	<a class="dropdown-item" href="<?php echo base_url('produtos'); ?>">Ver Todas</a>
																	<a class="dropdown-item" href="<?php echo base_url('produtos/add'); ?>">Adicionar</a>
																</div>
															</div>
														</div>
														<h4 class="mb-0">
															<span class="text-light" style="font-size: .8em;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Produtos e Peças</span><hr/>
															<center><span class="count text-light" style=""><?php echo $soma_produtos->prod_quant; ?></span></center>
														</h4>
														<p class="text-light small mb-2" style="text-align: center;">total em estoque</p>
													</div>
												</div>
											</div>
										</div>
										<!-- Contador para verificar produtos mais vendidos -->
										<div class="col-sm-12">
											<div class="feed-box text-center">
												<section class="card">
													<div class="card-body" style="border: 1px solid #B5B5B5;">
														<div class="corner-ribon black-ribon">
															<i class="fa fa-shopping-cart"></i>
														</div>
														<a href="#">
															<img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="<?php echo base_url('public/images/icons/undraw_logistics_x4dc.svg'); ?>">
														</a>
														<h4>Vendas de Kits/Produtos</h4>
														<p>Top 3 dos produtos mais vendidos<hr/>
														<table class="table table-striped table-borderless table-sm">
															<thead>
															<tr>
																<th scope="col" class="text-left">Descrição</th>
																<th scope="col">Qtde vendida</th>
															</tr>
															</thead>
															
															<tbody>
															<?php foreach ($top_produtos as $produto): ?>
															<tr>
																<td class="text-left"><?php echo $produto->produto_descricao; ?></td>
																<td><?php echo '<span class="badge badge-success">'.$produto->quantidade_vendidos.'</span>'; ?></td>
															</tr>
															<?php endforeach; ?>
															</tbody>
														</table><hr/>
														<a href="<?php echo base_url('vendas'); ?>">ver todos as vendas</a></p>
													</div>
												</section>
											</div>
										</div>
										<!-- Contador para verificar serviços (orçamentos) mais realizados -->
										<div class="col-sm-12">
											<div class="feed-box text-center">
												<section class="card">
													<div class="card-body" style="border: 1px solid #B5B5B5;">
														<div class="corner-ribon black-ribon">
															<i class="fa fa-cogs"></i>
														</div>
														<a href="#">
															<img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="<?php echo base_url('public/images/icons/undraw_multitasking_hqg3.svg'); ?>">
														</a>
														<h4>Pedidos/Orçamentos</h4>
														<p>Top 3 dos pedidos mais realizados<hr/>
														<table class="table table-striped table-borderless table-sm">
															<thead>
															<tr>
																<th scope="col" class="text-left">Descrição</th>
																<th scope="col">Qtde realizada</th>
															</tr>
															</thead>
															
															<tbody>
															<?php foreach ($top_servicos as $servico): ?>
															<tr>
																<td class="text-left"><?php echo $servico->servico_nome; ?></td>
																<td><?php echo '<span class="badge badge-info">'.$servico->quantidade_vendidos.'</span>'; ?></td>
															</tr>
															<?php endforeach; ?>
															</tbody>
														</table><hr/>
														<a href="<?php echo base_url('os'); ?>">ver todos os pedidos</a></p>
													</div>
												</section>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Fim do lado A | Dashboard para os usuários da plataforma -->

							<!-- Início do lado B | Avisos gerais para os colaboradores -->
							<div class="content mt-1 col-lg-5 pl-0" style="margin-top: -15px !important;">
								<div class="card">
									<div class="card-header bg-flat-color-4 text-light">
										<strong class="card-title" v-if="headerText">Avisos da Plataforma Administrativa</strong>
									</div>
									<div class="card-body" style="border: 1px solid #F7F7F7;border-top: none;">
										
										<?php foreach ($avisos_home as $avisado): ?>
										<?php if($avisado->avisado_tipo == 0 && $avisado->avisado_ativa == 1  || $avisado->avisado_tipo == 2 && $avisado->avisado_ativa == 1): ?>
										<!-- Condição para mensagem no formato de vídeo -->
										<?php if($avisado->avisado_formato == 1) { ?>
										<div class="col-md-12 pl-0 pr-0">
											<div class="card">
											<div class="card-header bg-secondary text-light">
												<h4 class="text-light" style="font-size: 1.1em;"><?php echo $avisado->avisado_assunto; ?></h4>                            </div> 
												<div class="card-body" style="border: 1px solid #B5B5B5;">
													<div class="embed-container mb-0" style="margin-top: -10px;">
														<?php echo htmlspecialchars_decode($avisado->avisado_mensagem); ?>
													</div>
												</div>
											</div>
										</div>
										<!-- Condição para mensagem no formato de texto -->
										<?php } elseif($avisado->avisado_formato == 0) { ?>
										<div class="col-md-12 pl-0 pr-0">
											<div class="card">
											<div class="card-header bg-secondary text-light">
												<h4 class="text-light" style="font-size: .9em;"><?php echo $avisado->avisado_assunto; ?></h4>                          </div> 
												<div class="card-body" style="border: 1px solid #B5B5B5;">
													<span id=""><?php echo word_limiter($avisado->avisado_mensagem, 100) ?><br/> <a class="btn btn-info btn-sm float-right" href="javascript(void)" data-toggle="modal" data-target="#avisoModal-<?php echo $avisado->avisado_id; ?>">LER AVISO COMPLETO</a></span>
												</div>
											</div>
										</div>
										<?php } else { ?>
										<!-- Condição para mensagem no formato de imagem -->
										<div class="col-md-12 pl-0 pr-0">
											<div class="card">
											<div class="card-header bg-secondary text-light">
												<h4 class="text-light" style="font-size: 1.1em;"><?php echo $avisado->avisado_assunto; ?></h4>                          
											</div> 
												<div class="card-body" style="border: 1px solid #B5B5B5;">
													<a href="javascript(void)" data-toggle="modal" data-target="#avisoModal2-<?php echo $avisado->avisado_id; ?>"><span id=""><?php echo $avisado->avisado_mensagem; ?></span></a>
												</div>
											</div>
										</div>
										<?php } ?>
										
										<?php endif; ?>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
							<!-- Fim do lado B | Avisos gerais para os colaboradores -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
        