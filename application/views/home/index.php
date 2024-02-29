<!-- PARRA LATERAL - SIDEBAR -->
<?php $this->load->view('layout/sidebar') ?>
<!-- PARRA LATERAL - SIDEBAR -->

<!-- BARRA SUPERIOR - NAVBAR -->
<?php $this->load->view('layout/navbar') ?>
<!-- BARRA SUPERIOR - NAVBAR -->

<style>
	.chart {
		width: 100%;
		min-height: 200px;
		text-align: center;
		margin: auto;
	}

	.card-body {
		padding-bottom: 1px !important;
	}
</style>

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
							<strong class="card-title mb-3"><i class="fa fa-tachometer-alt" aria-hidden="true"></i>&nbsp; Painel Administrativo <small>(Dashboard do Sistema)</small></strong>
							<div class="pull-right">
								<a href="<?php echo base_url('/'); ?>vendas/add"><button type="button" class="btn btn-outline-dark btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp; Nova venda</button></a>
								<a href="<?php echo base_url('/'); ?>sistema" type="button" class="btn btn-outline-danger btn-sm" title="Configurações">
									<i class="fa fa-cogs" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row m-t-30">
				<!-- Mensagem de sucesso -->
				<?php if ($message = $this->session->flashdata('sucesso')) : ?>
					<div class="col-sm-6 col-lg-12">
						<div class="alert  alert-success alert-dismissible fade show " role="alert">
							<span class="badge badge-pill badge-success"><i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp;&nbsp;Sucesso</span>&nbsp;&nbsp;
							<?php echo $message; ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>
				<?php endif; ?>
				<!-- Mensagem de sucesso -->
				<!-- Mensagem de info -->
				<?php if ($message = $this->session->flashdata('info')) : ?>
					<div class="col-sm-6 col-lg-12">
						<div class="alert  alert-warning alert-dismissible fade show " role="alert">
							<span class="badge badge-pill badge-warning"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>&nbsp;&nbsp;Advertência</span>&nbsp;&nbsp;
							<?php echo $message; ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>
				<?php endif; ?>
				<!-- Mensagem de info -->
				<!-- Mensagem de erro -->
				<?php if ($message = $this->session->flashdata('error')) : ?>
					<div class="col-sm-6 col-lg-12">
						<div class="alert  alert-danger alert-dismissible fade show " role="alert">
							<span class="badge badge-pill badge-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;&nbsp;Atenção</span>&nbsp;&nbsp;
							<?php echo $message; ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>
				<?php endif; ?>
				<!-- Mensagem de erro -->
				<!-- Primeiro relatório - soma de vendas totais -->
				<div class="col-sm-6 col-lg-4" style="margin-top: -15px !important;">
					<div class="overview-item overview-item--c5">
						<div class="overview__inner">
							<div class="overview-box clearfix pb-2">
								<div class="icon" style="margin-top: -10px;">
									<i class="fa fa-shopping-cart" aria-hidden="true"></i>
								</div>
								<div class="text" style="margin-top: -20px;">
									<h2 style="font-size:1.4em;">
										<p><?php echo 'R$ ' . $soma_vendas->venda_valor_total; ?></p>
									</h2>
									<span style="font-size:1em;">Vendas total</span>
									<p><a class="btn btn-sm btn-outline-light btn-block" href="<?php echo base_url('vendas'); ?>" role="button">Ver todas...</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Segundo relatório - soma de contas a receber -->
				<div class="col-sm-6 col-lg-4" style="margin-top: -15px !important;">
					<div class="overview-item overview-item--c6">
						<div class="overview__inner">
							<div class="overview-box clearfix pb-2">
								<div class="icon" style="margin-top: -10px;">
									<i class="fa fa-cc-visa" aria-hidden="true"></i>
								</div>
								<div class="text" style="margin-top: -20px;">
									<h2 style="font-size:1.4em;">
										<p><?php echo 'R$ ' . $soma_receber->conta_receber_valor; ?></p>
									</h2>
									<span style="font-size:1em;">Contas a receber</span>
									<p><a class="btn btn-sm btn-outline-light btn-block" href="<?php echo base_url('contas_pagar'); ?>" role="button">Ver todas...</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Terceiro relatório - soma de contas a pagar -->
				<div class="col-sm-6 col-lg-4" style="margin-top: -15px !important;">
					<div class="overview-item overview-item--c7">
						<div class="overview__inner">
							<div class="overview-box clearfix pb-2">
								<div class="icon" style="margin-top: -10px;">
									<i class="fa fa-cc-mastercard" aria-hidden="true"></i>
								</div>
								<div class="text" style="margin-top: -20px;">
									<h2 style="font-size:1.4em;">
										<p><?php echo 'R$ ' . $soma_pagar->conta_pagar_valor; ?></p>
									</h2>
									<span style="font-size:1em;">Contas a pagar</span>
									<p><a class="btn btn-sm btn-outline-light btn-block" href="<?php echo base_url('contas_receber'); ?>" role="button">Ver todas...</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Quarto relatório - total de parceiros consignados -->
				<!-- <div class="col-sm-6 col-lg-4" style="margin-top: -15px !important;">
					<div class="overview-item overview-item--c5">
						<div class="overview__inner">
							<div class="overview-box clearfix pb-2">
								<div class="icon" style="margin-top: -10px;">
									<i class="fa fa-user-secret" aria-hidden="true"></i>
								</div>
								<div class="text" style="margin-top: -20px;">
									<h2 style="font-size:1.4em;">
										<p><?php echo $num_rows = $this->db->count_all_results('parceiros'); ?></p>
									</h2>
									<span style="font-size:1em;">Parceiros consignados</span>
									<p><a class="btn btn-sm btn-outline-light btn-block" href="<?php echo base_url('parceiros'); ?>" role="button">Ver todos...</a></p>
								</div>
							</div>
						</div>
					</div>
				</div> -->
				<!-- Quinto relatório - total de produtos no estoque -->
				<!-- <div class="col-sm-6 col-lg-4" style="margin-top: -15px !important;">
					<div class="overview-item overview-item--c6">
						<div class="overview__inner">
							<div class="overview-box clearfix pb-2">
								<div class="icon" style="margin-top: -10px;">
									<i class="fa fa-shopping-basket" aria-hidden="true"></i>
								</div>
								<div class="text" style="margin-top: -20px;">
									<h2 style="font-size:1.4em;">
										<p><?php echo $soma_produtos->prod_quant; ?></p>
									</h2>
									<span style="font-size:1em;">Produtos em estoque</span>
									<p><a class="btn btn-sm btn-outline-light btn-block" href="<?php echo base_url('produtos'); ?>" role="button">Ver todos...</a></p>
								</div>
							</div>
						</div>
					</div>
				</div> -->
				<!-- Sexto relatório - Total de clientes cadastrados -->
				<!-- <div class="col-sm-6 col-lg-4" style="margin-top: -15px !important;">
					<div class="overview-item overview-item--c7">
						<div class="overview__inner">
							<div class="overview-box clearfix pb-2">
								<div class="icon" style="margin-top: -10px;">
									<i class="fa fa-users" aria-hidden="true"></i>
								</div>
								<div class="text" style="margin-top: -20px;">
									<h2 style="font-size:1.4em;">
										<p><?php echo $count_clientes->total_clientes; ?></p>
									</h2>
									<span style="font-size:1em;">Clientes cadastrados</span>
									<p><a class="btn btn-sm btn-outline-light btn-block" href="<?php echo base_url('clientes'); ?>" role="button">Ver todos...</a></p>
								</div>
							</div>
						</div>
					</div>
				</div> -->

				<!-- Início do lado A | Dashboard para os usuários da plataforma -->
				<div class="content mt-1 col-lg-6" style="margin-top: -15px !important;">
					<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
					<script type="text/javascript">
						google.charts.load("current", {
							packages: ['corechart']
						});
						google.charts.setOnLoadCallback(drawChart);

						function drawChart() {
							var data = google.visualization.arrayToDataTable([
								["Element", "R$", {
									role: "style"
								}],
								["CRÉDITO", <?php echo $soma_vendas_credit->venda_valor_credit; ?>, "#FA5858"],
								["DÉBITO", <?php echo $soma_vendas_debit->venda_valor_debit; ?>, "#2E64FE"],
								["DINHEIRO", <?php echo $soma_vendas_cash->venda_valor_cash; ?>, "#DBA901"],
								["PIX", <?php echo $soma_vendas_pix->venda_valor_pix; ?>, "#088A68"]

							]);

							var view = new google.visualization.DataView(data);
							view.setColumns([0, 1,
								{
									calc: "stringify",
									sourceColumn: 1,
									type: "string",
									role: "annotation"
								},
								2
							]);

							var options = {
								title: "Formas de pagamentos mais utilizadas (R$)",
								bar: {
									groupWidth: "90%"
								},
								legend: {
									position: "none"
								},
							};
							var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
							chart.draw(view, options);
						}
					</script>
					<div class="card" style="margin-bottom: 25px !important;">
						<div id="columnchart_values" class="chart"></div>
					</div>
					<div class="card">
						<!-- Contador para verificar produtos mais vendidos -->
						<div class="col-sm-12">
							<div class="feed-box text-center">
								<section class="card mt-4">
									<div class="card-body" style="border: 1px solid #B5B5B5;">
										<div class="corner-ribon black-ribon">
											<i class="fa fa-shopping-cart"></i>
										</div>
										<a href="#">
											<img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="<?php echo base_url('public/images/icons/undraw_logistics_x4dc.svg'); ?>">
										</a>
										<h4>Vendas de Kits/Produtos</h4>
										<p>Top 10 dos produtos mais vendidos
											<hr />
										<table class="table table-striped table-borderless table-sm">
											<thead>
												<tr>
													<th scope="col" class="text-left">Descrição</th>
													<th scope="col">Qtde vendida</th>
												</tr>
											</thead>

											<tbody>
												<?php foreach ($top_produtos as $produto) : ?>
													<tr>
														<td class="text-left"><?php echo $produto->produto_descricao; ?></td>
														<td><?php echo '<span class="badge badge-success">' . $produto->quantidade_vendidos . '</span>'; ?></td>
													</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
										<hr />
										<a href="<?php echo base_url('vendas'); ?>">ver todos as vendas</a></p>
									</div>
								</section>
							</div>
						</div>
						<!-- Contador para verificar serviços (orçamentos) mais realizados -->
						<!-- <div class="col-sm-12">
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
										<p>Top 3 dos pedidos mais realizados
											<hr />
										<table class="table table-striped table-borderless table-sm">
											<thead>
												<tr>
													<th scope="col" class="text-left">Descrição</th>
													<th scope="col">Qtde realizada</th>
												</tr>
											</thead>

											<tbody>
												<?php foreach ($top_servicos as $servico) : ?>
													<tr>
														<td class="text-left"><?php echo $servico->servico_nome; ?></td>
														<td><?php echo '<span class="badge badge-info">' . $servico->quantidade_vendidos . '</span>'; ?></td>
													</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
										<hr />
										<a href="<?php echo base_url('os'); ?>">ver todos os pedidos</a></p>
									</div>
								</section>
							</div>
						</div> -->
					</div>
				</div>
				<!-- Fim do lado A | Dashboard para os usuários da plataforma -->

				<!-- Início do lado B | Avisos gerais para os colaboradores -->
				<div class="content mt-1 col-lg-6 pl-0" style="margin-top: -15px !important;">
					<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
					<script type="text/javascript">
						google.charts.load("current", {
							packages: ["corechart"]
						});
						google.charts.setOnLoadCallback(drawChart);

						function drawChart() {
							var data = google.visualization.arrayToDataTable([
								['Produtos', 'Quantidade'],

								<?php foreach ($five_produtos as $produto) : ?>['<?php echo $produto->produto_descricao; ?>', <?php echo $produto->quantidade_vendidos; ?>],
								<?php endforeach; ?>
							]);

							var options = {
								title: 'Top 5 Produtos mais vendidos (%)',
								pieHole: 0.4,
							};

							var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
							chart.draw(data, options);
						}
					</script>
					<div class="card" style="margin-bottom: 25px !important;">
						<div id="donutchart" class="chart"></div>
					</div>

					<?php foreach ($avisos_home as $avisado) : ?>
						<?php if ($avisado->avisado_tipo == 0 && $avisado->avisado_ativa == 1  || $avisado->avisado_tipo == 2 && $avisado->avisado_ativa == 1) : ?>
							<!-- Condição para mensagem no formato de vídeo -->
							<?php if ($avisado->avisado_formato == 1) { ?>
								<div class="col-md-12 pl-0 pr-0">
									<div class="card" style="border: 1px solid transparent;">
										<div class="card-header bg-white" style="border-bottom: 1px solid #B5B5B5;">
											<h4 class="text-light" style="font-size: 1.1em;"><?php echo $avisado->avisado_assunto; ?></h4>
										</div>
										<div class="card-body" style="border: 1px solid #B5B5B5;">
											<div class="embed-container mb-0" style="margin-top: -10px;">
												<?php echo htmlspecialchars_decode($avisado->avisado_mensagem); ?>
											</div>
										</div>
									</div>
								</div>
								<!-- Condição para mensagem no formato de texto -->
							<?php } elseif ($avisado->avisado_formato == 0) { ?>
								<div class="col-md-12 pl-0 pr-0">
									<div class="card" style="border: 1px solid transparent;">
										<div class="card-header bg-light" style="border-bottom: 1px solid #B5B5B5;">
											<h4 class="text-white" style="font-size: .9em;"><?php echo $avisado->avisado_assunto; ?></h4>
										</div>
										<div class="card-body" style="border: 1px solid #B5B5B5;">
											<span id=""><?php echo word_limiter($avisado->avisado_mensagem, 100) ?><br /> <a class="btn btn-info btn-sm float-right" href="javascript(void)" data-toggle="modal" data-target="#avisoModal-<?php echo $avisado->avisado_id; ?>">LER AVISO COMPLETO</a></span>
										</div>
									</div>
								</div>
							<?php } else { ?>
								<!-- Condição para mensagem no formato de imagem -->
								<div class="col-md-12 pl-0 pr-0">
									<div class="card" style="border: 1px solid transparent;">
										<div class="card-header bg-white" style="border-bottom: 1px solid #B5B5B5;">
											<h4 class="text-dark" style="font-size: 1.1em;"><?php echo $avisado->avisado_assunto; ?></h4>
										</div>
										<div class="card-body" style="border-top:none;margin-top: -25px !important;">
											<a href="javascript(void)" data-toggle="modal" data-target="#avisoModal2-<?php echo $avisado->avisado_id; ?>"><span id=""><?php echo $avisado->avisado_mensagem; ?></span></a>
										</div>
									</div>
								</div>
							<?php } ?>

						<?php endif; ?>
					<?php endforeach; ?>
				</div>
				<!-- Fim do lado B | Avisos gerais para os colaboradores -->
			</div>
		</div>
	</div>
</div>
<!-- END MAIN CONTENT-->
