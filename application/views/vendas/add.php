<!-- PARRA LATERAL - SIDEBAR -->
<?php $this->load->view('layout/sidebar') ?>
<!-- PARRA LATERAL - SIDEBAR -->

<!-- BARRA SUPERIOR - NAVBAR -->
<?php $this->load->view('layout/navbar') ?>
<!-- BARRA SUPERIOR - NAVBAR -->

<style>
	.select2-container .select2-selection--single .select2-selection__rendered {
		width: 578px !important;
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


							<form class="user" action="" id="form" name="form_add" enctype="multipart/form-data" method="post" accept-charset="utf-8">

								<fieldset id="vendas" class="border p-2" style="margin-top: -10px;">

									<legend class="font-small"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;Escolha os produtos</legend>

									<div class="form-group row">
										<div class="ui-widget col-lg-12 mb-1 mt-1">
											<input id="buscar_produtos" class="search form-control form-control-sm col-lg-12" placeholder="Que produto você está buscando?">
										</div>
									</div>


									<div class="table-responsive">
										<table id="table_produtos" class="table">
											<thead>
												<tr>
													<th></th>
													<th class="" style="width: 47%">Produto</th>
													<th class="text-right pr-2" style="width: 20%">Valor unitário</th>
													<th class="text-center" style="width: 8%">Qty</th>
													<th class="" style="width: 8%">% Desc</th>
													<th class="text-right pr-2" style="width: 15%">Total</th>
													<th class="" style="width: 25%"></th>
													<th class="" style="width: 25%"></th>
												</tr>
											</thead>
											<tbody id="lista_produtos" class="">

											</tbody>
											<tfoot>
												<tr class="">
													<td colspan="5" class="text-right border-0">
														<label class="font-weight-bold pt-1" for="total">Valor de desconto:</label>
													</td>
													<td class="text-right border-0">
														<input type="text" name="venda_valor_desconto" class="form-control form-control-sm form-control-user text-right pr-1" data-format="$ 0,0.00" data-cell="L1" data-formula="SUM(H1:H5)" readonly="">
													</td>
													<td class="border-0">&nbsp;</td>
												</tr>
												<tr class="">
													<td colspan="5" class="text-right border-0">
														<label class="font-weight-bold pt-1" for="total">Total a pagar:</label>
													</td>
													<td class="text-right border-0">
														<input type="text" name="venda_valor_total" class="form-control form-control-sm form-control-user text-right pr-1" data-format="$ 0,0.00" data-cell="G2" data-formula="SUM(F1:F5)" readonly="">
													</td>
													<td class="border-0">&nbsp;</td>
												</tr>
											</tfoot>
										</table>
									</div>

								</fieldset>

								<fieldset class="mt-4 border p-2">

									<legend class="font-small"><i class="fa fa-money"></i>&nbsp;&nbsp;Dados da venda</legend>

									<div class="">
										<div class="form-group row">

											<div class="col-sm-6 mb-1 mb-sm-0">
												<label class="small my-0">Escolha o parceiro <span class="text-danger">*</span></label><br>
												<select class="form-control form-control-sm custom-select contas_receber" id="venda_parceiro_id" name="venda_parceiro_id" required="">
													<option value="">Escolha</option>
													<?php foreach ($parceiros as $parceiro) : ?>
														<option value="<?php echo $parceiro->parceiro_id; ?>"><?php echo $parceiro->parceiro_nome . ' ' . $parceiro->parceiro_sobrenome . ' | CPF ou CNPJ: ' . $parceiro->parceiro_cpf_cnpj; ?></option>
													<?php endforeach; ?>
												</select>
												<?php echo form_error('venda_parceiro_id', '<div class="text-danger small">', '</div>') ?>
											</div>


											<div class="col-sm-6 mb-1 mb-sm-0">
												<label class="small my-0">Tipo da venda<span class="text-danger">*</span></label>
												<select class="form-control form-control-sm custom-select" id="venda_tipo" name="venda_tipo" required="">
													<option value="">Escolha...</option>
													<option value="1">Venda à vista</option>
													<option value="2">Venda à prazo</option>
												</select>
												<?php echo form_error('venda_tipo', '<div class="text-danger small">', '</div>') ?>
											</div>

										</div>

										<div class="form-group row">
											<div class="col-md-6">
												<label class="small my-0">Forma de pagamento <span class="text-danger">*</span></label><br>
												<select id="id_pagamento" class="form-control form-control-sm custom-select forma-pagamento" id="venda_forma_pagamento_id" name="venda_forma_pagamento_id" required="">
													<option value="">Escolha</option>
													<?php foreach ($formas_pagamentos as $forma_pagamento) : ?>
														<option value="<?php echo $forma_pagamento->forma_pagamento_id; ?>"><?php echo $forma_pagamento->forma_pagamento_nome; ?></option>
													<?php endforeach; ?>
												</select>
												<?php echo form_error('venda_forma_pagamento_id', '<div class="text-danger small">', '</div>') ?>
											</div>

											<div class="col-md-6">
												<label class="small my-0">Escolha o vendedor <span class="text-danger">*</span></label><br>
												<select id="id_vendedor" class="form-control form-control-sm custom-select vendedor" id="venda_vendedor_id" name="venda_vendedor_id" required="">
													<option value="">Escolha</option>
													<?php foreach ($vendedores as $vendedor) : ?>
														<option value="<?php echo $vendedor->vendedor_id; ?>"><?php echo $vendedor->vendedor_nome_completo . ' | ' . $vendedor->vendedor_codigo; ?></option>
													<?php endforeach; ?>
												</select>
												<?php echo form_error('venda_vendedor_id', '<div class="text-danger small">', '</div>') ?>
											</div>


										</div>

									</div>

								</fieldset>


								<div class="mt-3">
									<button class="btn btn-primary btn-sm mr-2" id="btn-cadastrar-venda" form="form">Cadastrar</button>
									<!--<a href="<?php echo base_url('vendas'); ?>" class="btn btn-secondary btn-sm">Voltar</a>-->
								</div>

							</form>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END MAIN CONTENT-->
