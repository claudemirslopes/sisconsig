<!-- PARRA LATERAL - SIDEBAR -->
<?php $this->load->view('layout/sidebar') ?>
<!-- PARRA LATERAL - SIDEBAR -->

<!-- BARRA SUPERIOR - NAVBAR -->
<?php $this->load->view('layout/navbar') ?>
<!-- BARRA SUPERIOR - NAVBAR -->

<style>
	.badge-light {
		background: #D8D8D8;
		border: #D8D8D8;
		font-weight: 650;
	}
	.badge-primary{
		background: #007BFF;
		border: solid 1px #007BFF;
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
							<strong class="card-title mb-3"><i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp; <?php echo $titulo; ?></small></strong>
							<div class="pull-right">
								<a href="<?php echo base_url('/'); ?>vendas/add"><button type="button" class="btn btn-outline-dark btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp; Nova venda</button></a>
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

							<!-- Mensagem de info -->
							<?php if ($message = $this->session->flashdata('info')) : ?>
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
										<th class="d-none">#</th>
										<th class="text-left pl-2"">Emitida em</th>
										<th class="text-left">Código Venda</th>
										<th>Cliente</th>
										<th>Vendedor</th>
										<th>Valor Total</th>
										<th class="text-center">Forma de Pagamento</th>
										<th class="text-right">Ações</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($vendas as $venda) : ?>
										<tr>
											<td class="d-none"><?php echo $venda->venda_id; ?></td>
											<td class="text-left pl-2"><?php echo formata_data_banco_sem_hora($venda->venda_data_emissao); ?></td>
											<td class="text-left"><?php echo $venda->venda_pedido; ?></td>
											<td><?php 
											if($venda->cliente_pessoa == 1){
												echo $venda->cliente_nome . '&nbsp;' . $venda->cliente_sobrenome; 
											} else {
												echo $venda->cliente_sobrenome; 
											}
											?></td>
											<td><?php echo $venda->vendedor_nome_completo; ?></td>
											<td><?php echo 'R$ ' . number_format((float) $venda->venda_valor_total, 2, ',', '.'); ?></td>
											<td class="text-center pr-4">
												<?php
													if($venda->forma_pagamento == 'Dinheiro') {
												 		echo '<span class="badge badge-secondary btn-sm"><i class="fa fa-money" aria-hidden="true"></i> Dinheiro</span>';
													} elseif($venda->forma_pagamento == 'Débito') {
														echo '<span class="badge badge-danger btn-sm"><i class="fa fa-credit-card" aria-hidden="true"></i> Débito</span>';
													} elseif($venda->forma_pagamento == 'Crédito') {
														echo '<span class="badge badge-primary btn-sm"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Crédito</span>';
													} elseif($venda->forma_pagamento == 'PIX') {
														echo '<span class="badge badge-warning btn-sm"><i class="fa fa-qrcode" aria-hidden="true"></i> PIX</span>';
													} else {
														echo '---';
													}
												 ?>
											</td>
											<td class="text-right">
												<a href="<?php echo base_url('vendas/edit/' . $venda->venda_id); ?>" class="btn btn-sm btn-info" title="Ver"><i class="fa fa-eye"></i></a>
												<a href="<?php echo base_url('vendas/pdf/' . $venda->venda_id); ?>" target="_blank" class="btn btn-sm btn-success" title="Imprimir PDF"><i class="fa fa-file-pdf-o"></i></a>
												<a href="javascript(void)" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#venda-<?php echo $venda->venda_id; ?>" title="Excluír"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
