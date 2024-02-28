
        <!-- PARRA LATERAL - SIDEBAR -->
		<?php $this->load->view('layout/sidebar') ?>
		<!-- PARRA LATERAL - SIDEBAR -->

        <!-- BARRA SUPERIOR - NAVBAR -->
        <?php $this->load->view('layout/navbar') ?>
        <!-- BARRA SUPERIOR - NAVBAR -->

		<style>
			.select2-container .select2-selection--single .select2-selection__rendered {
				width: 355px !important;
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
										<strong class="card-title mb-3"><i class="fa fa-product-hunt" aria-hidden="true"></i>&nbsp; <?php echo $titulo; ?></small></strong>
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

									<?php 
									if (isset($upload_error)) : ?>
										<div class="alert alert-danger" role="alert">
											<?php echo $upload_error; ?>
										</div>
									<?php endif; 
									?>
									
								
										<form method="post" name="form_add" class="user" enctype="multipart/form-data">
											
											<fieldset class="border p-2" style="margin-top: -10px;">
												<legend class="font-small"><i class="fa fa-th-list"></i> Dados principais</legend>
												
												<div class="form-row">
													<div class="form-group col-md-2">
														<label for="produto_codigo">Código <span style="color: red;font-weight: bold;">*</span></label>
														<input type="text" name="produto_codigo" class="form-control form-control-sm form-control-user text-center bg-dark text-light font-weight-bold" id="produto_codigo" value="<?php echo $produto_codigo; ?>" readonly="">
													</div>
													<div class="form-group col-md-6">
														<label for="produto_descricao">Nome do Produto <span style="color: red;font-weight: bold;">*</span></label> 
														<input type="text" name="produto_descricao" class="form-control form-control-sm form-control-user" id="produto_descricao" placeholder="Descrição" value="<?php echo set_value('produto_descricao'); ?>">
														<?php echo form_error('produto_descricao', '<small class="form-text text-danger">','</small>') ?>
													</div>
													<div class="form-group col-md-4">
														<label for="produto_img">Imagem <span style="color: red;font-weight: bold;">*</span></label> 
														<input type="file" name="produto_img" class="form-control form-control-sm form-control-user">
														<?php echo form_error('produto_img', '<small class="form-text text-danger">','</small>') ?>
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col-md-4">
														<label for="produto_parceiro_id">Parceiro consignado <span style="color: red;font-weight: bold;">*</span></label> 
														<select name="produto_parceiro_id" class="form-control form-control-sm custom-select contas_pagar" id="produto_parceiro_id">
															<option value="0">Selecione o parceiro</option>
															<?php foreach($parceiros as $parceiro): ?>
															<option value="<?php echo $parceiro->parceiro_id ?>"><?php 
																if($parceiro->parceiro_pessoa == 1){
																	echo $parceiro->parceiro_nome.' '.$parceiro->parceiro_sobrenome;
																} else {
																	echo $parceiro->parceiro_sobrenome;
																}
																?></option>
															<?php endforeach; ?>
														</select>
													</div>
													<div class="form-group col-md-4">
														<label for="produto_marca_id">Marca <span style="color: red;font-weight: bold;">*</span></label>
														<select name="produto_marca_id" class="form-control form-control-sm custom-select" id="produto_marca_id">
															<option value="0">Selecione a marca</option>
															<?php foreach($marcas as $marca): ?>
															<option value="<?php echo $marca->marca_id ?>"><?php echo $marca->marca_nome; ?></option>
															<?php endforeach; ?>
														</select>                                    
													</div>
													<div class="form-group col-md-4">
														<label for="produto_categoria_id">Categoria <span style="color: red;font-weight: bold;">*</span></label> 
														<select name="produto_categoria_id" class="form-control form-control-sm custom-select" id="produto_categoria_id">
															<option value="0">Selecione a categoria</option>
															<?php foreach($categorias as $categoria): ?>
															<option value="<?php echo $categoria->categoria_id ?>"><?php echo $categoria->categoria_nome ?></option>
															<?php endforeach; ?>
														</select>
													</div>
												</div>

											</fieldset>
											
											<fieldset class="mt-2 border p-2">
												<legend class="font-small"><i class="fa fa-th-list"></i> Outras informações</legend>
												
												<div class="form-row">
													<div class="form-group col-md-1">
														<label for="produto_unidade">Unid. <span style="color: red;font-weight: bold;">*</span></label> 
														<input type="text" name="produto_unidade" value="Un" class="form-control form-control-sm form-control-user" id="produto_unidade" placeholder="Unidade, Kilo, Grama, etc..." value="<?php echo set_value('produto_unidade'); ?>">
														<?php echo form_error('produto_unidade', '<small class="form-text text-danger">','</small>') ?>
													</div>
													<div class="form-group col-md-3">
														<label for="produto_ncm">NCM <small style="color: #777;">(Nome Comum do Mercosul)</small></label> 
														<input type="text" name="produto_ncm" class="form-control form-control-sm form-control-user" id="produto_ncm" placeholder="NCM" value="<?php echo set_value('produto_ncm'); ?>">
														<?php echo form_error('produto_ncm', '<small class="form-text text-danger">','</small>') ?>
													</div>
													<div class="form-group col-md-2">
														<label for="produto_preco_custo">Preço custo <span style="color: red;font-weight: bold;">*</span></label>
														<input type="text" name="produto_preco_custo" class="form-control form-control-sm form-control-user money" id="produto_preco_custo" placeholder="Ex: 99,99" value="<?php echo set_value('produto_preco_custo'); ?>">
														<?php echo form_error('produto_preco_custo', '<small class="form-text text-danger">','</small>') ?>
													</div>
													<div class="form-group col-md-2">
														<label for="produto_preco_venda">Preço venda <span style="color: red;font-weight: bold;">*</span></label>
														<input type="text" name="produto_preco_venda" class="form-control form-control-sm form-control-user money" id="produto_preco_venda" placeholder="Ex: 99,99" value="<?php echo set_value('produto_preco_venda'); ?>">
														<?php echo form_error('produto_preco_venda', '<small class="form-text text-danger">','</small>') ?>
													</div>
													<div class="form-group col-md-4">
														<label for="produto_estado">Estado do produto <span style="color: red;font-weight: bold;">*</span></label> 
														<select name="produto_estado" class="form-control form-control-sm custom-select" id="produto_categoria_id">
															<option value="">Selecione o estado do produto</option>
															<option value="Usado">Usado</option>
															<option value="Novo">Novo</option>
														</select>
														<?php echo form_error('produto_estado', '<small class="form-text text-danger">','</small>') ?>
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col-md-3">
														<label for="produto_codigo_interno">Código Interno</label> 
														<input type="text" name="produto_codigo_interno" class="form-control form-control-sm form-control-user" id="produto_codigo_interno" placeholder="Código Interno" id="produto_codigo_interno" value="<?php echo 'SC-'.$produto_codigo_interno; ?>" readonly="">
														<?php echo form_error('produto_codigo_interno', '<small class="form-text text-danger">','</small>') ?>
													</div>
													<div class="form-group col-md-3">
														<label for="produto_codigo_barras">Código de Barras</label> 
														<input type="text" name="produto_codigo_barras" class="form-control form-control-sm form-control-user" id="produto_codigo_barras" placeholder="Código de Barras" value="<?php echo set_value('produto_codigo_barras'); ?>">
														<?php echo form_error('produto_codigo_barras', '<small class="form-text text-danger">','</small>') ?>
													</div>
													<div class="form-group col-md-2">
														<label for="produto_estoque_minimo">Est. mínimo <span style="color: red;font-weight: bold;">*</span></label> 
														<input type="number" name="produto_estoque_minimo" class="form-control form-control-sm form-control-user" id="produto_estoque_minimo" placeholder="Estoque Mínimo" value="<?php echo set_value('produto_estoque_minimo'); ?>">
														<?php echo form_error('produto_estoque_minimo', '<small class="form-text text-danger">','</small>') ?>
													</div>
													<div class="form-group col-md-2">
														<label for="produto_qtde_estoque">Qtde estoque <span style="color: red;font-weight: bold;">*</span></label> 
														<input type="number" name="produto_qtde_estoque" class="form-control form-control-sm form-control-user" id="produto_qtde_estoque" placeholder="Qtde Estoque" value="<?php echo set_value('produto_qtde_estoque'); ?>">
														<?php echo form_error('produto_qtde_estoque', '<small class="form-text text-danger">','</small>') ?>
													</div>
													<div class="form-group col-md-2">
														<label for="produto_ativo">Ativo <span style="color: red;font-weight: bold;">*</span></label>
														<select name="produto_ativo" class="form-control form-control-sm custom-select" id="produto_ativo">
															<option value="0">Não</option>
															<option value="1" selected="">Sim</option>
														</select>
													</div>
												</div>
												
											</fieldset>
											
											<fieldset class="mt-2 border p-2">
												<legend class="font-small"><i class="fa fa-sticky-note"></i> Observação</legend>
												<div class="form-row">
													<div class="form-group col-md-12">
														<textarea name="produto_obs" rows="3" class="form-control form-control-sm form-control-user" id="produto_obs" placeholder="Observação"><?php echo set_value('produto_obs'); ?></textarea>
														<?php echo form_error('produto_obs', '<small class="form-text text-danger">','</small>') ?>
													</div>
												</div>
											</fieldset>
											
											<button type="submit" class="btn btn-primary btn-sm float-right mt-1"><i class="fa fa-plus" aria-hidden="true"></i> Cadatrar produto</button>
										</form>
									</div>

								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
