<nav class="navbar navbar-expand-lg navbar-light bg-flat-color-warning" style="margin-top: -35px;margin-bottom: 25px;border-bottom: solid 1px #CDCDCD;border-top: solid 1px #FFF3CD;padding: 0 0 !important;">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav" id="prr" style="margin-left: 15px;">
						<?php $group = array(1, 3); if ($this->ion_auth->in_group($group)): ?>
						<li class="nav-item">
						<a class="nav-link text-dark" href="#" style="font-size: .9em;"><i class="fa fa-thumb-tack" aria-hidden="true"></i>&nbsp;&nbsp;Estimativa</a>
						</li>
						<li class="nav-item">
						<a class="nav-link text-dark" href="<?php echo base_url('projetos'); ?>" style="font-size: .9em;"><i class="fa fa-th" aria-hidden="true"></i>&nbsp;&nbsp;Projetos</a>
						</li>
						<li class="nav-item">
						<a class="nav-link text-dark" href="#" style="font-size: .9em;"><i class="fa fa-television" aria-hidden="true"></i>&nbsp;&nbsp;Controle</a>
						</li>
						<?php endif; ?>
						<li class="nav-item">
						<a class="nav-link text-dark" href="<?php echo base_url('reclamacoes'); ?>" style="font-size: .9em;"><i class="fa fa-bullhorn" aria-hidden="true"></i>&nbsp;&nbsp;Reclamações</a>
						</li>
						<?php $group = array(1, 3); if ($this->ion_auth->in_group($group)): ?>
						<li class="nav-item">
							<a class="nav-link text-dark" href="<?php echo base_url('relatorios'); ?>" style="font-size: .9em;"><i class="fa fa-list-ul" aria-hidden="true"></i>&nbsp;&nbsp;Relatórios</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-dark" href="<?php echo base_url('avisos'); ?>" style="font-size: .9em;"><i class="fa fa-sticky-note" aria-hidden="true"></i>&nbsp;&nbsp;Avisos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-dark" href="" style="font-size: .9em;">&nbsp;&nbsp;<i class="fa fa-arrows-v" aria-hidden="true"></i>&nbsp;&nbsp;</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: .9em;">Mais&nbsp;Cadastros&nbsp;&nbsp;</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="<?php echo base_url('datasheets'); ?>" style="font-size: .8em;"><i class="fa fa-th" aria-hidden="true"></i>&nbsp;&nbsp;Datasheets</a>
							<a class="dropdown-item" href="<?php echo base_url('kits'); ?>" style="font-size: .8em;"><i class="fa fa-archive" aria-hidden="true"></i>&nbsp;&nbsp;Kits Franqueados</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="<?php echo base_url('seguros'); ?>" style="font-size: .8em;"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;&nbsp;Seguro Blueprime</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link text-dark" href="" style="font-size: .9em;">&nbsp;&nbsp;<i class="fa fa-arrows-v" aria-hidden="true"></i>&nbsp;&nbsp;</a>
						</li>
						<li class="nav-item">
							<a class="btn btn-danger btn-sm mt-1" href="http://localhost/BluesunEAD/admin" target="_blank" style="font-size: .8em;"><i class="fa fa-mobile" aria-hidden="true" style="font-size: .9em !important;"></i>&nbsp;&nbsp;PLATAFORMA&nbsp;EAD</a>
						</li>&nbsp;&nbsp;
						<li class="nav-item">
							<a class="btn btn-secondary btn-sm mt-1" href="http://localhost/BluesunEAD/admin" target="_blank" style="font-size: .8em;"><i class="fa fa-cart-arrow-down" aria-hidden="true" style="font-size: .9em !important;"></i>&nbsp;&nbsp;E-COMMERCE</a>
						</li>
						<?php endif; ?>
					</ul>
				</div>            
			</nav> 
