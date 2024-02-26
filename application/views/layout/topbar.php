<nav class="navbar navbar-expand-lg navbar-light bg-flat-color-warning" style="margin-top: -35px;margin-bottom: 25px;border-bottom: solid 1px #CDCDCD;border-top: solid 1px #FFF3CD;padding: 0 0 !important;">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav" id="prr" style="margin-left: 15px;">
			<li class="nav-item">
				<a class="nav-link text-dark" href="<?php echo base_url('mensagens'); ?>" style="font-size: .9em;"><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp;Mensagens</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-dark" href="<?php echo base_url('avisos'); ?>" style="font-size: .9em;"><i class="fa fa-sticky-note" aria-hidden="true"></i>&nbsp;&nbsp;Avisos</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-dark" href="<?php echo base_url('notificacoes'); ?>" style="font-size: .9em;"><i class="fa fa-bullhorn" aria-hidden="true"></i>&nbsp;&nbsp;Notificações</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-dark" href="<?php echo base_url('usuarios/edit/'.$this->session->userdata('user_id')); ?>" style="font-size: .9em;"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;Meu Perfil</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-dark" href="#" style="font-size: .9em;"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;&nbsp;Ver Logs</a>
			</li>&nbsp;&nbsp;
			<li class="nav-item">
				<a class="btn btn-danger btn-sm mt-1" href="http://localhost/BluesunEAD/admin" target="_blank" style="font-size: .8em;"><i class="fa fa-tachometer" aria-hidden="true" style="font-size: .9em !important;"></i>&nbsp;&nbsp;PAINEL&nbsp;DO&nbsp;PARCEIRO</a>
			</li>&nbsp;&nbsp;
			<li class="nav-item">
				<a class="btn btn-secondary btn-sm mt-1" href="http://localhost/BluesunEAD/admin" target="_blank" style="font-size: .8em;"><i class="fa fa-cart-arrow-down" aria-hidden="true" style="font-size: .9em !important;"></i>&nbsp;&nbsp;E-COMMERCE</a>
			</li>
		</ul>
	</div>
</nav>
