	<!-- INÍCIO MODAL LOGOUT -->
	<div class="modal fade swing" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
		<div class="modal-dialog modal-sm" role="document">
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
	<?php foreach ($avisos_home as $avisado): ?>
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
	<?php foreach ($avisos_home as $avisado): ?>
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


	<!-- Modal de exclusão de parceiros -->
	<?php
    if (current_url() == base_url('/parceiros')):
    foreach ($parceiros as $parceiro): 		
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
                    <a href="<?php echo base_url('parceiros/del/'.$parceiro->parceiro_id); ?>" class="btn btn-danger btn-sm">Confirmar</a>
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
    if (current_url() == base_url('/vendedores')):
	foreach ($vendedores as $vendedor):	
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
					<a href="<?php echo base_url('vendedores/del/'.$vendedor->vendedor_id); ?>" class="btn btn-danger btn-sm">Confirmar</a>
				</div>
			</div>
		</div>
	</div>
	<?php
    endforeach; 
    endif;
    ?>
	<!-- Fim Modal de exclusão de vendedores -->
