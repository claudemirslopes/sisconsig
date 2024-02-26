		<!-- PAGE CONTAINER-->
		<div class="page-container">
            <!-- Menu superior desktop -->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <!-- Search bar principal (Pesquisa) -->
                            <form class="form-header" method="GET" action="/visualizar/pesquisa">
                                <input class="au-input au-input--xl" type="text" name="busca" id="busca" placeholder="Pesquisar próxmos serviços.." />
                                <button type="submit" class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <!-- Fim do search bar (Pesquisa) -->
                            <div class="header-button">
                                <!-- Notificações de mensagens e outras -->
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
										<?php if(isset($contador_notificacoes) && $contador_notificacoes > 0): ?>
                                        <span class="quantity" style="width: 20px;height: 20px;line-height: 20px;">
											<b><?php echo $contador_notificacoes; ?></b>
                                        </span>
										<?php endif; ?>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
												<p><?php echo $contador_notificacoes > 1 ? 'Você tem <b>'.$contador_notificacoes.' notificações</b> importantes' : 'Você tem <b>'.$contador_notificacoes.' notificação importante</b>'; ?></p>
                                            </div>
											<?php if(isset($contas_receber_vencidas)): ?>
											<a href="<?php echo base_url('contas_receber'); ?>">
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-35">
                                                    <i class="zmdi zmdi-money-box"></i>
                                                </div>
                                                <div class="content">
													<p>Existem contas a vencer vencidas</p>
                                                </div>
                                            </div>
											</a>
											<?php endif; ?>
                                            <?php if(isset($contas_pagar_vencidas)): ?>
											<a href="<?php echo base_url('contas_pagar'); ?>">
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-35">
                                                    <i class="zmdi zmdi-money"></i>
                                                </div>
                                                <div class="content">
													<p>Existem contas a pagar vencidas</p>
                                                </div>
                                            </div>
											</a>
											<?php endif; ?>
                                            <?php if(isset($contas_receber_vence_hoje)): ?>
											<a href="<?php echo base_url('contas_receber'); ?>">
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-35">
                                                    <i class="zmdi zmdi-money-off"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Existem contas a receber que vencem hoje</p>
                                                </div>
                                            </div>
											</a>
											<?php endif; ?>
											<?php if(isset($contas_pagar_vence_hoje)): ?>
											<a href="<?php echo base_url('contas_pagar'); ?>">
                                            <div class="notifi__item">
                                                <div class="bg-c4 img-cir img-35">
													<i class="zmdi zmdi-card"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Existem contas a pagar que vencem hoje</p>
                                                </div>
                                            </div>
											</a>
											<?php endif; ?>
											<?php if(isset($usuarios_desativados)): ?>
											<a href="<?php echo base_url('usuarios'); ?>">
                                            <div class="notifi__item">
                                                <div class="bg-c5 img-cir img-35">
													<i class="zmdi zmdi-assignment-account"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Existem colaboradores desativados</p>
                                                </div>
                                            </div>
											</a>
											<?php endif; ?>
											<?php if(isset($produto_sem_estoque)): ?>
											<a href="<?php echo base_url('produtos'); ?>">
                                            <div class="notifi__item">
                                                <div class="bg-c6 img-cir img-35">
                                                    <i class="zmdi zmdi-shopping-cart"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Há produtos com estoque menor que o mínimo</p>
                                                </div>
                                            </div>
											</a>
											<?php endif; ?>
											<?php if(isset($reclama_pendente)): ?>
											<a href="<?php echo base_url('mensagens'); ?>">
                                            <div class="notifi__item">
                                                <div class="bg-c7 img-cir img-35">
                                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Há mensagens pendentes não finalizadas</p>
                                                </div>
                                            </div>
											</a>
											<?php endif; ?>
											<?php if(isset($ticket_pendente)): ?>
											<a href="<?php echo base_url('tickets'); ?>">
                                            <div class="notifi__item">
                                                <div class="bg-c8 img-cir img-35">
                                                    <i class="fa fa-ticket" aria-hidden="true"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Tem tickets pendentes não finalizados</p>
                                                </div>
                                            </div>
											</a>
											<?php endif; ?>
											<div class="notifi__footer">
                                                <a href="#">data atual: <?php echo formata_data_banco_sem_hora(date('Y-m-d')); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fim das notificações de mensagens e outras -->
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
											<?php $user = $this->ion_auth->user()->row(); ?>
											<?php if($user->foto_editor == 0) { ?>
												<img src="<?php echo base_url('public/images/usuarios/no.jpg'); ?>" style="border-radius: 45px;"  />
											<?php } else { ?>
												<img class="imagem1" src="<?php echo base_url('public/images/usuarios/'.$user->id.'.jpg'); ?>" style="border-radius: 45px;"  />
											<?php } ?>
                                        </div>
                                        <div class="content">
										<?php $user = $this->ion_auth->user()->row(); ?>
                                            <a class="js-acc-btn" href="#"><?php echo 'Olá, <b>'.$user->first_name.'</b>'; ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
													<?php $user = $this->ion_auth->user()->row(); ?>
													<?php if($user->foto_editor == 0) { ?>
														<img src="<?php echo base_url('public/images/usuarios/no.jpg'); ?>" style="border-radius: 45px;"  />
													<?php } else { ?>
														<img src="<?php echo base_url('public/images/usuarios/'.$user->id.'.jpg'); ?>" style="border-radius: 45px;"  />
													<?php } ?>
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name small">
													<?php $user = $this->ion_auth->user()->row(); ?>                        
                                                        <a href="#"><?php echo $user->first_name.'&nbsp;'.$user->last_name; ?></a>
                                                    </h5>
                                                    <span class="email"><small><?php echo $user->email; ?></small></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="<?php echo base_url('usuarios/edit/'.$this->session->userdata('user_id')); ?>">
                                                        <i class="zmdi zmdi-account"></i>Meu perfil</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="/visualizar/ver_logs">
                                                        <i class="zmdi zmdi-view-list-alt"></i>Logs de Acesso</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="sistema">
                                                        <i class="zmdi zmdi-settings"></i>Configurações</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="<?php echo base_url('login/logout'); ?>" data-toggle="modal"  data-target="#staticModal" aria-haspopup="true" aria-expanded="false">
                                                    <i class="zmdi zmdi-power"></i>Sair</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Fim do menu superior desktop -->
