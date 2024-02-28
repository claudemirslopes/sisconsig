
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
										<strong class="card-title mb-3"><i class="fa fa-product-hunt" aria-hidden="true"></i>&nbsp; <?php echo $titulo; ?></small></strong>
										<div class="pull-right">
											<a href="<?php echo base_url('/'); ?>produtos/add"><button type="button" class="btn btn-outline-dark btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp; Novo produto</button></a>
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
									
									
									<table id="example0" class="table table-striped table-bordered table-sm">
										<thead>
												<tr>
													<th class="text-center" style="display: none;">#</th>
													<th>Descrição</th>
													<th>Categoria</th>
													<th>Preço</th>
													<th class="text-center">Est. Mín.</th>
													<th class="text-center">Qtde</th>
													<th class="text-center">Ativo</th>
													<th class="text-right">Ações</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($produtos as $produto): ?>
												<tr>
													<td class="text-center" style="display: none;"><?php echo $produto->produto_id; ?></td>
													<td><?php echo $produto->produto_descricao; ?></td>
													<td><?php echo $produto->categoria; ?></td>
													<td><?php echo ('R$ '.$produto->produto_preco_venda); ?></td>
													<td class="text-center pr-4"><?php echo '<span class="badge badge-dark btn-sm">'.$produto->produto_estoque_minimo.'</span>'; ?></td>
													<td class="text-center pr-4">
														<?php 
															if ($produto->produto_estoque_minimo < $produto->produto_qtde_estoque){
																echo '<span class="badge badge-info btn-sm">'.$produto->produto_qtde_estoque.'</span>';
															}
															elseif ($produto->produto_estoque_minimo > $produto->produto_qtde_estoque){
																echo '<span class="badge badge-danger btn-sm">'.$produto->produto_qtde_estoque.'</span>';
															}
															else {
																echo '<span class="badge badge-warning btn-sm">'.$produto->produto_qtde_estoque.'</span>';
															}
														?>
													</td>
													<td class="text-center pr-4">
														<?php echo $produto->produto_ativo == 1 ? '<span class="badge badge-success btn-sm">Sim</span>' : '<span class="badge badge-secondary btn-sm">Não</span>' ?>
													</td>
													<td class="text-right">
														<style>
															.btn-soca {
																background: #D61B42;
																border: solid 1px #D61B42;
																color: #fff;
															}
															.btn-soca:hover {
																background: #B40404;
																border: solid 1px #B40404;
																color: #fff;
															}
															.btn-primary {
																background: #0B3861;
																border: solid 1px #0B3861;
															}
															.btn-primary:hover {
																background: #0B243B;
																border: solid 1px #0B243B;
															}
														</style>
														<a href="<?php echo base_url('produtos/edit/'.$produto->produto_id); ?>" class="btn btn-sm btn-primary" title="Editar"><i class="fa fa-pencil"></i></a>
														<a href="javascript(void)" class="btn btn-sm btn-soca" data-toggle="modal" data-target="#produto-<?php echo $produto->produto_id; ?>" title="Excluír"><i class="fa fa-trash" aria-hidden="true"></i></a>
													</td>
												</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
										<div class="text-left mt-4 small" style="color: #555;"><strong><span style="font-weight: bold;color: red;font-size: 1.5em;">*&nbsp;</span>Legenda:&nbsp;</strong><span style="color: #383d44;">[Refere-se a quantidade em estoque]</span>&nbsp;
											<span class="badge badge-info btn-sm">&nbsp;</span> Acima do estoque mínimo
											<span class="badge badge-warning btn-sm">&nbsp;</span>  Igual ao estoque mínimo
											<span class="badge badge-danger btn-sm">&nbsp;</span> Abaixo do estoque mínimo
									</div>								
										
									</div>							
									

								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
