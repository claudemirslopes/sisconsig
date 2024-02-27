
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
										<strong class="card-title mb-3"><i class="fa fa-users" aria-hidden="true"></i>&nbsp; <?php echo $titulo; ?></small></strong>
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
										<form method="post" name="form_add" class="user">
											<div class="form-row">
												<div class="form-group col-md-5">
													<label for="nome">Nome <span style="color: red;font-weight: bold;">*</span></label>
													<input type="text" name="first_name" class="form-control form-control-user" id="nome" placeholder="Nome" value="<?php echo set_value('first_name'); ?>">
													<?php echo form_error('first_name', '<small class="form-text text-danger">','</small>') ?>
												</div>
												<div class="form-group col-md-5">
													<label for="sobrenome">Sobrenome <span style="color: red;font-weight: bold;">*</span></label>
													<input type="text" name="last_name" class="form-control form-control-user" id="sobrenome" placeholder="Sobrenome" value="<?php echo set_value('last_name'); ?>">
													<?php echo form_error('last_name', '<small class="form-text text-danger">','</small>') ?>
												</div>
												<div class="form-group col-md-2">
													<label for="sobrenome">Telefone <span style="color: red;font-weight: bold;">*</span></label>
													<input type="text" name="phone" class="form-control form-control-user celular" id="phone" placeholder="Telefone/Celular" value="<?php echo set_value('phone'); ?>">
													<?php echo form_error('phone', '<small class="form-text text-danger">','</small>') ?>
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-md-4">
													<label for="email">E-mail <span style="color: red;font-weight: bold;">*</span></label>
													<input type="email" name="email" class="form-control form-control-user" id="email" placeholder="E-mail" value="<?php echo set_value('email'); ?>">
													<?php echo form_error('email', '<small class="form-text text-danger">','</small>') ?>
												</div>
												<div class="form-group col-md-3">
													<label for="username">Usuário <span style="color: red;font-weight: bold;">*</span></label>
													<input type="text" name="username" class="form-control form-control-user" id="username" placeholder="Nome de usuário" value="<?php echo set_value('username'); ?>">
													<?php echo form_error('username', '<small class="form-text text-danger">','</small>') ?>
												</div>
												<div class="form-group col-md-2">
													<label for="active">Ativo <span style="color: red;font-weight: bold;">*</span></label>
													<select name="active" class="form-control custom-select" id="active">
														<option value="0">Não</option>
														<option value="1" selected="">Sim</option>
													</select>
												</div>
												<div class="form-group col-md-3">
													<label for="perfil_usuario">Perfil de acesso <span style="color: red;font-weight: bold;">*</span></label>
													<select name="perfil_usuario" class="form-control custom-select" id="perfil_usuario">
														<option value="1">Administrador</option>
														<option value="2" selected="">Comercial</option>
														<option value="3">Gerência</option>
														<option value="4">Logística</option>
														<option value="5">Franquia</option>
														<option value="6">Qualidade</option>
														<option value="7">Financeiro</option>
														<option value="8">Projeto</option>
													</select>
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-md-6">
													<label for="senha">Senha <span style="color: red;font-weight: bold;">*</span></label>
													<input type="password" name="password" class="form-control form-control-user" id="senha" placeholder="Senha">
													<?php echo form_error('password', '<small class="form-text text-danger">','</small>') ?>
												</div>
												<div class="form-group col-md-6">
													<label for="recsenha">Confirme a senha <span style="color: red;font-weight: bold;">*</span></label>
													<input type="password" name="senha" class="form-control form-control-user" id="recsenha" placeholder="Repita a senha">
													<?php echo form_error('confirm_password', '<small class="form-text text-danger">','</small>') ?>
												</div>
											</div>
											
											<input type="hidden" name="id_nivacesso" value="1">

											<button type="submit" class="btn btn-primary btn-sm float-right"><i class="fa fa-user-plus" aria-hidden="true"></i> Adicionar colaborador</button>
										</form>
									</div>

								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
        