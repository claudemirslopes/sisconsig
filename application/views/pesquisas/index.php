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

						<div class="card-body" style="border: 1px solid #F7F7F7;">

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
										<th class="pl-2">Emitido em</th>
										<th class="text-left">Código</th>
										<th class="pl-2">Cliente</th>
										<th class="pl-2">Produto</th>
										<th class="pl-2">Consignado</th>
										<th class="pl-2">Vl. Total</th>
										<th class="text-center pl-2">Qty</th>
										<th class="text-right">Ações</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($pesquisas as $pesquisa) : ?>
										<tr>
											<td class="d-none"><?php echo $pesquisa->venda_id; ?></td>
											<td class="pl-2"><?php echo formata_data_banco_sem_hora($pesquisa->venda_data_emissao); ?></td>
											<td class="text-left"><?php echo $pesquisa->venda_pedido; ?></td>
											<td class="pl-2">
												<?php
												if($pesquisa->cliente_pessoa == 1) {
													echo $pesquisa->cliente_nome.' '.$pesquisa->cliente_sobrenome; ; 
												} else {
													echo $pesquisa->cliente_sobrenome; 
												}
												?>
											</td>
											<td class="pl-2"><?php echo $pesquisa->produto_descricao; ?></td>
											<td class="pl-2">
												<?php
												if($pesquisa->parceiro_pessoa == 1) {
													echo $pesquisa->parceiro_nome.' '.$pesquisa->parceiro_sobrenome; ; 
												} else {
													echo $pesquisa->parceiro_sobrenome; 
												}
												?>
											</td>
											<td class="pl-2"><?php echo 'R$ '.$pesquisa->venda_valor_total; ?></td>
											<td class="text-center"><?php echo $pesquisa->venda_produto_quantidade; ?></td>
											<td class="text-right">
												<a href="<?php echo base_url('vendas/edit/' . $pesquisa->venda_id); ?>" class="btn btn-sm btn-info" title="Ver"><i class="fa fa-eye"></i></a>
												<a href="<?php echo base_url('vendas/pdf/' . $pesquisa->venda_id); ?>" target="_blank" class="btn btn-sm btn-primary" title="Imprimir PDF"><i class="fa fa-file-pdf-o"></i></a>
												<!-- <a href="javascript(void)" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#venda-<?php echo $pesquisa->venda_id; ?>" title="Excluír"><i class="fa fa-trash" aria-hidden="true"></i></a> -->
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
