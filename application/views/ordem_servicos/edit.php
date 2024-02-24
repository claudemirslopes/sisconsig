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
	#lista_servicos > tr > td:nth-child(2) > input{
		background-color: #FAFAFA !important;
	}
	#lista_servicos > tr > td:nth-child(3) > input{
		background-color: #FAFAFA !important;
	}
	#lista_servicos > tr > td:nth-child(6) > input{
		background-color: #FAFAFA !important;
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


							<form class="user" action="" id="form" name="form_edit" enctype="multipart/form-data" method="post" accept-charset="utf-8">


								<fieldset id="vendas" class="border p-2" style="margin-top: -10px;">

									<legend class="font-small"><i class="fa fa-cogs"></i>&nbsp;&nbsp;Escolha os serviços</legend>

									<div class="form-group row">
										<div class="ui-widget col-lg-10 mb-1 mt-1">
											<input id="buscar_servicos" class="search form-control form-control-sm col-lg-12" placeholder="Que serviço você está buscando?">
										</div>
										<div class="ui-widget col-lg-2 mb-1 mt-1">
											<input class="form-control form-control-sm bg-dark text-light text-center" name="ordem_servico_pedido" value="<?php echo $ordem_servico->ordem_servico_pedido; ?>" readonly="">
											<small class="form-text text-muted">Número do pedido</small>
										</div>
									</div>


									<div class="table-responsive">
										<table id="table_servicos" class="table">
											<thead>
												<tr>
													<th></th>
													<th class="" style="width: 47%">Serviço</th>
													<th class="text-right pr-2" style="width: 20%">Valor unitário</th>
													<th class="text-center" style="width: 8%">Qty</th>
													<th class="" style="width: 8%">% Desc</th>
													<th class="text-right pr-2" style="width: 15%">Total</th>
													<th class="" style="width: 25%"></th>
													<th class="" style="width: 25%"></th>
												</tr>
											</thead>
											<tbody id="lista_servicos" class="">

												<?php if (isset($os_tem_servicos)) : ?>

													<?php $i = 0; ?>

													<?php foreach ($os_tem_servicos as $os_servico) : ?>

														<?php $i++; ?>

														<tr>
															<td><input type="hidden" name="servico_id[]" value="<?php echo $os_servico->ordem_ts_id_servico ?>" data-cell="A<?php echo $i; ?>" data-format="0" readonly></td>
															<td><input title="Descrição do servico" type="text" name="servico_descricao[]" value="<?php echo $os_servico->servico_descricao ?>" class="servico_descricao form-control form-control-sm form-control-user input-sm" data-cell="B<?php echo $i; ?>" readonly></td>
															<td><input title="Valor unitário do servico" name="servico_preco[]" value="<?php echo $os_servico->ordem_ts_valor_unitario ?>" class="form-control form-control-user form-control-sm input-sm text-right money pr-1" data-cell="C<?php echo $i; ?>" data-format="R$ 0,0.00" readonly></td>
															<td><input title="Digite a quantidade apenas em número inteiros" type="text" inputmode="numeric" pattern="[-+]?[0-9]*[.,]?[0-9]+" name="servico_quantidade[]" value="<?php echo $os_servico->ordem_ts_quantidade ?>" class="qty form-control form-control-user form-control-sm text-center" data-cell="D<?php echo $i; ?>" data-format="0[.]00" required></td>
															<td><input title="Insira o desconto" name="servico_desconto[]" class="form-control form-control-user form-control-sm input-sm text-right" value="<?php echo $os_servico->ordem_ts_valor_desconto ?>" data-cell="E<?php echo $i; ?>" data-format="0,0[.]00 %" required></td>
															<td><input title="Valor total do servico selecionado" name="servico_item_total[]" value="<?php echo $os_servico->ordem_ts_valor_total ?>" class="form-control form-control-user form-control-sm input-sm text-right pr-1" data-cell="F<?php echo $i; ?>" data-format="R$ 0,0.00" data-formula="D<?php echo $i; ?>*(C<?php echo $i; ?>-(C<?php echo $i; ?>*E<?php echo $i; ?>))" readonly></td>
															<td class="text-center"><input type="hidden" name="valor_desconto_servico[]" data-cell="H<?php echo $i; ?>" data-format="R$ 0,0.00" data-formula="((C<?php echo $i; ?>*D<?php echo $i; ?>)-F<?php echo $i; ?>)"><button title="Remover o servico" class="btn-remove btn btn-sm btn-primary"><i class="fa fa-trash"></i></button></td>
														</tr>


													<?php endforeach; ?>

												<?php endif; ?>

											</tbody>
											<tfoot>
												<tr class="">
													<td colspan="5" class="text-right border-0">
														<label class="font-weight-bold pt-1" for="total">Valor de desconto:</label>
													</td>
													<td class="text-right border-0">
														<input type="text" name="ordem_servico_valor_desconto" class="form-control form-control-user form-control-sm text-right pr-1" data-format="$ 0,0.00" data-cell="L1" data-formula="SUM(H1:H5)" readonly="">
													</td>
													<td class="border-0">&nbsp;</td>
												</tr>
												<tr class="">
													<td colspan="5" class="text-right border-0">
														<label class="font-weight-bold pt-1" for="total">Total a pagar:</label>
													</td>
													<td class="text-right border-0">
														<input type="text" name="ordem_servico_valor_total" class="form-control form-control-user form-control-sm text-right pr-1" data-format="$ 0,0.00" data-cell="G2" data-formula="SUM(F1:F5)" readonly="">
													</td>
													<td class="border-0">&nbsp;</td>
												</tr>
											</tfoot>
										</table>
									</div>

								</fieldset>

								<fieldset class="mt-4 border p-2">

									<legend class="font-small"><i class="fa fa-list-alt"></i>&nbsp;&nbsp;Dados da ordem</legend>

									<div class="">
										<div class="form-group row">

											<div class="col-sm-6 mb-1 mb-sm-0">
												<label class="small my-0">Escolha o parceiro <span class="text-danger">*</span></label><br>
												<select class="form-control form-control-sm custom-select contas_receber" name="ordem_servico_parceiro_id" required="">
													<?php foreach ($parceiros as $parceiro) : ?>
														<option value="<?php echo $parceiro->parceiro_id; ?>" <?php echo ($parceiro->parceiro_id == $ordem_servico->ordem_servico_parceiro_id ? 'selected' : '') ?>><?php echo $parceiro->parceiro_nome . ' ' . $parceiro->parceiro_sobrenome . ' | CPF ou CNPJ: ' . $parceiro->parceiro_cpf_cnpj; ?></option>
													<?php endforeach; ?>
												</select>
												<?php echo form_error('ordem_servico_parceiro_id', '<div class="text-danger small">', '</div>') ?>
											</div>

											<div class="col-md-3">
												<label class="small my-0">Forma de pagamento <span class="text-danger">*</span></label>
												<select id="id_pagamento" class="form-control form-control-sm custom-select forma-pagamento" name="ordem_servico_forma_pagamento_id">
													<option value="">Escolha</option>
													<?php foreach ($formas_pagamentos as $forma_pagamento) : ?>
														<option value="<?php echo $forma_pagamento->forma_pagamento_id; ?>" <?php echo ($forma_pagamento->forma_pagamento_id == $ordem_servico->ordem_servico_forma_pagamento_id ? 'selected' : '') ?>><?php echo $forma_pagamento->forma_pagamento_nome; ?></option>
													<?php endforeach; ?>
												</select>
												<?php echo form_error('ordem_servico_forma_pagamento_id', '<div class="text-danger small">', '</div>') ?>
											</div>

											<div class="col-md-3">
												<label class="small my-0">Status da ordem <span class="text-danger">*</span></label>
												<select class="form-control form-control-sm custom-select" name="ordem_servico_status">
													<option value="0" <?php echo $ordem_servico->ordem_servico_status == 0 ? 'selected' : '' ?>>Aberta</option>
													<option value="1" <?php echo $ordem_servico->ordem_servico_status == 1 ? 'selected' : '' ?>>Fechada</option>
												</select>
											</div>

										</div>

										<div class="form-group row">

											<div class="col-sm-6 mb-1 mb-sm-0">
												<label class="small my-0">Equipamento <span class="text-danger">*</span></label>
												<input type="text" class="form-control form-control-sm  form-control-user" value="<?php echo set_value('ordem_servico_equipamento', $ordem_servico->ordem_servico_equipamento); ?>" name="ordem_servico_equipamento" required="">
												<?php echo form_error('ordem_servico_equipamento', '<div class="text-danger small">', '</div>') ?>
											</div>

											<div class="col-sm-3 mb-1 mb-sm-0">
												<label class="small my-0">Marca <span class="text-danger">*</span></label>
												<input type="text" class="form-control form-control-sm form-control-user" value="<?php echo set_value('ordem_servico_marca_equipamento', $ordem_servico->ordem_servico_marca_equipamento); ?>" name="ordem_servico_marca_equipamento" required="">
												<?php echo form_error('ordem_servico_marca_equipamento', '<div class="text-danger small">', '</div>') ?>
											</div>

											<div class="col-sm-3 mb-1 mb-sm-0">
												<label class="small my-0">Modelo <span class="text-danger">*</span></label>
												<input type="text" class="form-control form-control-sm form-control-user" value="<?php echo set_value('ordem_servico_modelo_equipamento', $ordem_servico->ordem_servico_modelo_equipamento); ?>" name="ordem_servico_modelo_equipamento" required="">
												<?php echo form_error('ordem_servico_modelo_equipamento', '<div class="text-danger small">', '</div>') ?>
											</div>

										</div>

										<div class="form-group row">

											<div class="col-sm-6 mb-1 mb-sm-0">
												<label class="small my-0">Defeitos <span class="text-danger">*</span></label>
												<input type="text" class="form-control form-control-sm form-control-user" value="<?php echo set_value('ordem_servico_defeito', $ordem_servico->ordem_servico_defeito); ?>" name="ordem_servico_defeito" required="">
												<?php echo form_error('ordem_servico_defeito', '<div class="text-danger small">', '</div>') ?>
											</div>

											<div class="col-sm-6 mb-1 mb-sm-0">
												<label class="small my-0">Acessórios <span class="text-danger">*</span></label>
												<input type="text" class="form-control form-control-sm form-control-user" value="<?php echo set_value('ordem_servico_acessorios', $ordem_servico->ordem_servico_acessorios); ?>" name="ordem_servico_acessorios" required="">
												<?php echo form_error('ordem_servico_acessorios', '<div class="text-danger small">', '</div>') ?>
											</div>

										</div>
										<div class="form-group row">

											<div class="col-sm-12 mb-1 mb-sm-0">
												<label class="small my-0">Observações <span class="text-danger"></span></label>
												<textarea type="text" class="form-control form-control-sm form-control-user" value="" name="ordem_servico_obs"><?php echo set_value('ordem_servico_obs', $ordem_servico->ordem_servico_obs); ?></textarea>
											</div>

										</div>

									</div>

								</fieldset>

								<input type="hidden" name="ordem_servico_id" value="<?php echo $ordem_servico->ordem_servico_id ?>" />

								<div class="mt-3">
									<!--<button class="btn btn-primary btn-sm mr-2" id="btn-cadastrar-venda" form="form" <?php echo ($ordem_servico->ordem_servico_status == 1 ? 'disabled' : ''); ?>><?php echo ($ordem_servico->ordem_servico_status == 1 ? 'Paga' : 'Salvar'); ?></button>-->
									<?php echo ($ordem_servico->ordem_servico_status == 1 ? '<button type="submit" class="btn btn-primary btn-sm float-right mt-1" style="display:none;" disabled><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar OS</button><span class="badge badge-light float-right mt-1"><i class="fa fa-thumbs-up" aria-hidden="true"></i>&nbsp;&nbsp;ESTA OS FOI FECHADA NO DIA&nbsp;' . formata_data_banco_com_hora($ordem_servico->ordem_servico_data_alteracao) . '</span>' : '<button type="submit" class="btn btn-primary btn-sm float-right mt-1" id="btn-cadastrar-venda" form="form"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Salvar OS</button>'); ?>
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
