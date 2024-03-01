	<!-- INÍCIO MODAL LOGOUT -->
	<div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
		<div class="modal-dialog modal-sm swing" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticModalLabel">Sair do sistema</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>
						Deseja mesmo encerrar a sessão?
					</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Não</button>
					<a class="btn btn-danger btn-sm" href="<?php echo base_url('login/logout'); ?>" role="button">Sair</a>
				</div>
			</div>
		</div>
	</div>
	<!-- FIM MODAL LOGOUT -->

	<!-- Início do modal de avisos da plataforma -->
	<?php foreach ($avisos_home as $avisado) : ?>
		<div class="modal fade" style="background: rgba(52,58,64, 0.7);" id="avisoModal-<?php echo $avisado->avisado_id; ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content bg-light">
					<div class="modal-header bg-danger">
						<h5 class="modal-title text-light" id="staticModalLabel" style="font-size: 1.2em;"><?php echo $avisado->avisado_assunto; ?></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<?php echo $avisado->avisado_mensagem; ?>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Fechar</button>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
	<?php foreach ($avisos_home as $avisado) : ?>
		<div class="modal fade" id="avisoModal2-<?php echo $avisado->avisado_id; ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<?php echo $avisado->avisado_mensagem; ?>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
	<!-- Fim do modal de avisos da plataforma -->

	<!-- Modal de exclusão de clientes -->
	<?php
	if (current_url() == base_url('/clientes')) :
		foreach ($clientes as $cliente) :
	?>
			<div class="modal fade" id="cliente-<?php echo $cliente->cliente_id; ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="staticModalLabel">Excluir cliente</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>
								Deseja mesmo excluir este cliente?
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
							<a href="<?php echo base_url('clientes/del/' . $cliente->cliente_id); ?>" class="btn btn-danger btn-sm">Confirmar</a>
						</div>
					</div>
				</div>
			</div>
	<?php
		endforeach;
	endif;
	?>
	<!-- Fim Modal de exclusão de clientes -->

	<!-- Modal de exclusão de parceiros -->
	<?php
	if (current_url() == base_url('/parceiros')) :
		foreach ($parceiros as $parceiro) :
	?>
			<div class="modal fade" id="parceiro-<?php echo $parceiro->parceiro_id; ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="staticModalLabel">Excluir autorizado</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>
								Deseja mesmo excluir este parceiro?
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
							<a href="<?php echo base_url('parceiros/del/' . $parceiro->parceiro_id); ?>" class="btn btn-danger btn-sm">Confirmar</a>
						</div>
					</div>
				</div>
			</div>
	<?php
		endforeach;
	endif;
	?>
	<!-- Fim Modal de exclusão de parceiros -->

	<!-- Modal de exclusão de vendedores -->
	<?php
	if (current_url() == base_url('/vendedores')) :
		foreach ($vendedores as $vendedor) :
	?>
			<div class="modal fade" id="vendedor-<?php echo $vendedor->vendedor_id; ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="staticModalLabel">Excluír vendedor</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>
								Deseja mesmo excluír este vendedor?
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
							<a href="<?php echo base_url('vendedores/del/' . $vendedor->vendedor_id); ?>" class="btn btn-danger btn-sm">Confirmar</a>
						</div>
					</div>
				</div>
			</div>
	<?php
		endforeach;
	endif;
	?>
	<!-- Fim Modal de exclusão de vendedores -->

	<!-- Modal de exclusão de usuarios -->
	<?php
	if (current_url() == base_url('/usuarios')) :
		foreach ($usuarios as $user) :
	?>
			<div class="modal fade" id="user-<?php echo $user->id; ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="staticModalLabel">Excluír colaborador</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>
								Deseja mesmo excluír este colaborador?
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
							<a href="<?php echo base_url('usuarios/del/' . $user->id); ?>" class="btn btn-danger btn-sm">Confirmar</a>
						</div>
					</div>
				</div>
			</div>
	<?php
		endforeach;
	endif;
	?>
	<!-- Fim Modal de exclusão de usuarios -->

	<!-- Modal de adição de foto usuarios -->
	<div class="modal fade" id="foto" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="mediumModalLabel">Foto do Perfil</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center">
					<div style="width: 100%;height: 100%;">
						<?php if ($usuario->foto_editor == 0) { ?>
							<img src="<?php echo base_url('public/images/franquias/semFoto2.png'); ?>" alt="Logo" width="100%" height="100%" style="background-color: #cdcdcd;" />
						<?php } else { ?>
							<figure id="container">
								<img class="imagem1" src="<?php echo base_url('public/images/usuarios/' . $usuario->id . '.jpg'); ?>" alt="Logo" width="50%" height="auto" style="background-color: #cdcdcd;" />
							</figure>
						<?php } ?>
					</div>
				</div>
				<div class="modal-body">
					<?php
					$divopen = '<div class="form-group col-md-12">';
					$divclose = '</div>';
					echo form_open_multipart('usuarios/nova_foto');
					echo form_hidden('id', $usuario->id);
					echo $divopen;
					$imagem = array('name' => 'userfile', 'id' => 'userfile', 'class' => 'form-control');
					echo form_upload($imagem);
					echo $divclose;
					?>
					<small class="form-text text-danger text-center" style="font-size: .6em !important;"><b>Form. aceito:</b> Somente JPG | <b>Med.:</b> 200x200</small>
				</div>
				<div class="modal-footer">
					<?php
					echo $divopen;
					?>
					<div class="float-right">
						<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
						<?php
						$botao = array('name' => 'btn_adicionar', 'id' => 'btn_adicionar', 'class' => 'btn btn-info btn-sm', 'value' => 'Add/Alterar Foto');
						echo form_submit($botao);
						echo $divclose;
						echo form_close();
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Fim Modal de adição de foto usuarios -->

	<!-- Modal de exclusão de categorias -->
	<?php
	if (current_url() == base_url('/categorias')) :
		foreach ($categorias as $categoria) :
	?>
			<div class="modal fade" id="categoria-<?php echo $categoria->categoria_id; ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="staticModalLabel">Excluír categoria</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>
								Deseja mesmo excluír esta categoria?
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
							<a href="<?php echo base_url('categorias/del/' . $categoria->categoria_id); ?>" class="btn btn-danger btn-sm">Confirmar</a>
						</div>
					</div>
				</div>
			</div>
	<?php
		endforeach;
	endif;
	?>
	<!-- Fim Modal de exclusão de categorias -->

	<!-- Modal de exclusão de marcas -->
	<?php
	if (current_url() == base_url('/marcas')) :
		foreach ($marcas as $marca) :
	?>
			<div class="modal fade" id="marca-<?php echo $marca->marca_id; ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="staticModalLabel">Excluír marca</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>
								Deseja mesmo excluír esta marca?
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
							<a href="<?php echo base_url('marcas/del/' . $marca->marca_id); ?>" class="btn btn-danger btn-sm">Confirmar</a>
						</div>
					</div>
				</div>
			</div>
	<?php
		endforeach;
	endif;
	?>
	<!-- Fim Modal de exclusão de marcas -->

	<!-- Modal de exclusão de produtos -->
	<?php
	if (current_url() == base_url('/produtos')) :
		foreach ($produtos as $produto) :
	?>
			<div class="modal fade" id="produto-<?php echo $produto->produto_id; ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="staticModalLabel">Excluír produto</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>
								Deseja mesmo excluír este produto?
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
							<a href="<?php echo base_url('produtos/del/' . $produto->produto_id); ?>" class="btn btn-danger btn-sm">Confirmar</a>
						</div>
					</div>
				</div>
			</div>
	<?php
		endforeach;
	endif;
	?>
	<!-- Fim Modal de exclusão de produtos -->

	<!-- Modal de exclusão de serviços -->
	<?php
	if (current_url() == base_url('/servicos')) :
		foreach ($servicos as $servico) :
	?>
			<div class="modal fade" id="servico-<?php echo $servico->servico_id; ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="staticModalLabel">Excluír serviço</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>
								Deseja mesmo excluír este serviço?
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
							<a href="<?php echo base_url('servicos/del/' . $servico->servico_id); ?>" class="btn btn-danger btn-sm">Confirmar</a>
						</div>
					</div>
				</div>
			</div>
	<?php
		endforeach;
	endif;
	?>
	<!-- Fim Modal de exclusão de serviços -->

	<!-- Modal de exclusão de fornecedores -->
	<?php
	if (current_url() == base_url('/fornecedores')) :
		foreach ($fornecedores as $fornecedor) :
	?>
			<div class="modal fade" id="fornecedor-<?php echo $fornecedor->fornecedor_id; ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="staticModalLabel">Excluír fornecedor</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>
								Deseja mesmo excluír este fornecedor?
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
							<a href="<?php echo base_url('fornecedores/del/' . $fornecedor->fornecedor_id); ?>" class="btn btn-danger btn-sm">Confirmar</a>
						</div>
					</div>
				</div>
			</div>
	<?php
		endforeach;
	endif;
	?>
	<!-- Fim Modal de exclusão de serviços -->

	<!-- Modal de exclusão de contas a pagar -->
	<?php
	if (current_url() == base_url('/contas_pagar')) :
		foreach ($contas_pagar as $conta_pagar) :
	?>
			<div class="modal fade" id="conta_pagar-<?php echo $conta_pagar->conta_pagar_id; ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="staticModalLabel">Excluír conta?</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>
								Deseja mesmo excluír esta conta?
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
							<a href="<?php echo base_url('contas_pagar/del/' . $conta_pagar->conta_pagar_id); ?>" class="btn btn-danger btn-sm">Confirmar</a>
						</div>
					</div>
				</div>
			</div>
	<?php
		endforeach;
	endif;
	?>
	<!-- Fim Modal de exclusão de contas a pagar -->

	<!-- Modal de exclusão de contas a receber -->
	<?php
	if (current_url() == base_url('/contas_receber')) :
		foreach ($contas_receber as $conta_receber) :
	?>
			<div class="modal fade" id="conta_receber-<?php echo $conta_receber->conta_receber_id; ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="staticModalLabel">Excluír conta?</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>
								Deseja mesmo excluír esta conta?
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
							<a href="<?php echo base_url('contas_receber/del/' . $conta_receber->conta_receber_id); ?>" class="btn btn-danger btn-sm">Confirmar</a>
						</div>
					</div>
				</div>
			</div>
	<?php
		endforeach;
	endif;
	?>
	<!-- Fim Modal de exclusão de contas a receber -->

	<!-- Modal de exclusão de formas de pagamentos-->
	<?php
	if (current_url() == base_url('/modulo')) :
		foreach ($formas_pagamentos as $forma_pagamento) :
	?>
			<div class="modal fade" id="forma_pagamento-<?php echo $forma_pagamento->forma_pagamento_id; ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="staticModalLabel">Excluír forma de pagamento</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>
								Deseja mesmo excluír esta forma de pagamento?
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
							<a href="<?php echo base_url('modulo/del/' . $forma_pagamento->forma_pagamento_id); ?>" class="btn btn-danger btn-sm">Confirmar</a>
						</div>
					</div>
				</div>
			</div>
	<?php
		endforeach;
	endif;
	?>
	<!-- Fim Modal de exclusão de formas de pagamentos -->

	<!-- Modal de exclusão de os-->
	<?php
	if (current_url() == base_url('/os')) :
		foreach ($ordens_servicos as $os) :
	?>
			<div class="modal fade" id="servico-<?php echo $os->ordem_servico_id; ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="staticModalLabel">Excluír ordem de serviço</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>
								Deseja mesmo excluír esta ordem de servico?
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
							<a href="<?php echo base_url('os/del/' . $os->ordem_servico_id); ?>" class="btn btn-danger btn-sm">Confirmar</a>
						</div>
					</div>
				</div>
			</div>
	<?php
		endforeach;
	endif;
	?>
	<!-- Fim Modal de exclusão de os -->

	<!-- Modal de exclusão de vendas-->
	<?php
	if (current_url() == base_url('/vendas')) :
		foreach ($vendas as $venda) :
	?>
			<div class="modal fade" id="venda-<?php echo $venda->venda_id; ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="staticModalLabel">Excluír venda</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>
								Deseja mesmo excluír esta venda?
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
							<a href="<?php echo base_url('vendas/del/' . $venda->venda_id); ?>" class="btn btn-danger btn-sm">Confirmar</a>
						</div>
					</div>
				</div>
			</div>
	<?php
		endforeach;
	endif;
	?>
	<!-- Fim Modal de exclusão de vendas -->


	<!-- Modal de exclusão de tickets-->
	<?php
	if (current_url() == base_url('/tickets')) :
		foreach ($tickets as $ticket) :
	?>
			<div class="modal fade" id="ticket-<?php echo $ticket->ticket_id; ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="staticModalLabel">Excluír ticket</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>
								Deseja mesmo excluír este ticket?
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
							<a href="<?php echo base_url('tickets/del/' . $ticket->ticket_id); ?>" class="btn btn-danger btn-sm">Confirmar</a>
						</div>
					</div>
				</div>
			</div>
	<?php
		endforeach;
	endif;
	?>
	<!-- Fim Modal de exclusão de tickets -->

	<!-- Modal de exclusão de mensagens -->
	<?php
	if (current_url() == base_url('/mensagens')) :
		foreach ($reclamacoes as $reclama) :
	?>
			<div class="modal fade" id="reclama-<?php echo $reclama->reclama_id; ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="staticModalLabel">Excluír mensagem</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>
								Deseja mesmo excluír esta mensagem?
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
							<a href="<?php echo base_url('reclamacoes/del/' . $reclama->reclama_id); ?>" class="btn btn-danger btn-sm">Confirmar</a>
						</div>
					</div>
				</div>
			</div>
	<?php
		endforeach;
	endif;
	?>
	<!-- Fim Modal de exclusão de mensagens -->

	<!-- Modal de exclusão de avisos-->
	<?php
	if (current_url() == base_url('/avisos')) :
		foreach ($avisados as $avisado) :
	?>
			<div class="modal fade" id="avisado-<?php echo $avisado->avisado_id; ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="staticModalLabel">Excluír aviso</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>
								Deseja mesmo excluír este aviso?
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
							<a href="<?php echo base_url('avisos/del/' . $avisado->avisado_id); ?>" class="btn btn-danger btn-sm">Confirmar</a>
						</div>
					</div>
				</div>
			</div>
	<?php
		endforeach;
	endif;
	?>
	<!-- Fim Modal de exclusão de avisos -->

	<!-- Modal de exclusão de datasheets-->
	<?php
	if (current_url() == base_url('/datasheets')) :
		foreach ($datasheets as $datasheet) :
	?>
			<div class="modal fade" id="datasheet-<?php echo $datasheet->datasheet_id; ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="staticModalLabel">Excluír arquivo datasheet</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p>
								Deseja mesmo excluír este arquivo?
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
							<a href="<?php echo base_url('datasheets/del/' . $datasheet->datasheet_id); ?>" class="btn btn-danger btn-sm">Confirmar</a>
						</div>
					</div>
				</div>
			</div>
	<?php
		endforeach;
	endif;
	?>
	<!-- Fim Modal de exclusão de datasheets -->
