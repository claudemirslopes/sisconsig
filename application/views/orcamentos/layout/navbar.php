        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-hand-o-left"></i></a>
                    <div class="header-left">
<!--                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Pesquisar..." aria-label="Pesquisar">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>-->
                        
                        <style>
                             @keyframes fa-blink {
                                    0% { opacity: 1; }
                                    50% { opacity: 0.5; }
                                    100% { opacity: 0; }
                                }
                               .fa-blink {
                                  -webkit-animation: fa-blink .75s linear infinite;
                                  -moz-animation: fa-blink .75s linear infinite;
                                  -ms-animation: fa-blink .75s linear infinite;
                                  -o-animation: fa-blink .75s linear infinite;
                                  animation: fa-blink .1s linear infinite;
                               }
                               
                                .swing:hover
                                {
                                    -webkit-animation: swing 1s ease;
                                    animation: swing 1s ease;
                                    -webkit-animation-iteration-count: 1;
                                    animation-iteration-count: 1;
                                }
                                .imagem1{
                                    transition: all 1s;
                                    cursor: pointer;
                                }

                                .imagem1:hover{
                                    -webkit-transform: rotateZ(360deg);
                                    transform: rotateZ(360deg);
                                }
                                .imagem3{
                                    transition: all 0.5s;
                                    cursor: pointer;
                                }

                                .imagem3:hover{
                                    -webkit-transform: scale(1.1);
                                    transform: scale(1.1);
                                    background: #272C33
                                }
                                .bg-bluem {
                                    background: #0B2161;
                                    color: #fff;
                                    font-weight: bold;
                                }
                                .bg-bluem:hover {
                                    background: #0B2161;
                                    color: #fff;
                                    font-weight: bold;
                                }
                                .bg-bluec {
                                    background: #354880;
                                    color: #fff;
                                    font-weight: bold;
                                }
                                .bg-bluec:hover {
                                    background: #354880;
                                    color: #fff;
                                    font-weight: bold;
                                }
                                .externa {
                                    align-items: center;
                                    display: flex;
                                    flex-direction: row;
                                    flex-wrap: wrap;
                                    justify-content: center;
                                }
                                .interna {
                                    width: 200px; /* Valor da Largura do elemento */
                                }
                                .divbaixo {
                                    width: 60%;
                                    display: block;
                                    justify-content: center;
                                    align-items: center;
                                    flex-wrap: wrap;
                                    padding-top: 1px;
                                }
                                .textocima {
                                    position: absolute;
                                    margin-top: -30px;
                                    background: rgba(215, 40, 40, 0.9);
                                    color: #fff;
                                    font-weight: bolder;
                                    text-align: center;
                                }
                                .imagem6{
                                    transition: all .5s;
                                }
                                .imagem6:hover{
                                    -webkit-filter: drop-shadow(15px 7px 1px rgba(0,0,0,.5));
                                    filter: drop-shadow(15px 7px 1px rgba(0,0,0,.5));
                                    -webkit-transform: rotateZ(-360deg) scale(1.5);
                                    transform: rotateZ(-360deg) scale(1.5);
                                }
                        </style>
                        <?php // if(isset($contador_notificacoes) && $contador_notificacoes > 0): ?>
<!--                            <div class="dropdown for-notification mt-2">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bell"></i>
                                    <span class="count bg-danger fa-blink"><b><?php echo $contador_notificacoes; ?></b></span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="notification">
                                    <p class="bg-danger text-light"><?php echo $contador_notificacoes > 1 ? 'Você tem <b>'.$contador_notificacoes.'</b> notificações importantes' : 'Você tem <b>'.$contador_notificacoes.'</b> notificação importante'; ?></p>
                                    <?php if(isset($contas_receber_vencidas)): ?>
                                    <a class="dropdown-item media bg-flat-color-light border-bottom" href="<?php echo base_url('contas_receber'); ?>">
                                            <i class="fa fa-dollar"></i>
                                            <p style="font-size: .9em;"><span style="font-size: .7em;"><?php echo formata_data_banco_sem_hora(date('Y-m-d')); ?></span> | Existem contas a receber vencidas</p>
                                        </a>
                                    <?php endif; ?>
                                    <?php if(isset($contas_pagar_vencidas)): ?>
                                    <a class="dropdown-item media bg-flat-color-light border-bottom" href="<?php echo base_url('contas_pagar'); ?>">
                                            <i class="fa fa-money"></i>
                                            <p style="font-size: .9em;"><span style="font-size: .7em;"><?php echo formata_data_banco_sem_hora(date('Y-m-d')); ?></span> | Existem contas a pagar vencidas</p>
                                        </a>
                                    <?php endif; ?>
                                    <?php if(isset($contas_pagar_vence_hoje)): ?>
                                    <a class="dropdown-item media bg-flat-color-light border-bottom" href="<?php echo base_url('contas_pagar'); ?>">
                                            <i class="fa fa-calendar-o"></i>
                                            <p style="font-size: .9em;"><span style="font-size: .7em;"><?php echo formata_data_banco_sem_hora(date('Y-m-d')); ?></span> | Existem contas a pagar que vencem hoje</p>
                                        </a>
                                    <?php endif; ?>
                                    <?php if(isset($contas_receber_vence_hoje)): ?>
                                    <a class="dropdown-item media bg-flat-color-light border-bottom" href="<?php echo base_url('contas_receber'); ?>">
                                            <i class="fa fa-calendar"></i>
                                            <p style="font-size: .9em;"><span style="font-size: .7em;"><?php echo formata_data_banco_sem_hora(date('Y-m-d')); ?></span> | Existem contas a receber que vencem hoje</p>
                                        </a>
                                    <?php endif; ?>
                                    <?php if(isset($usuarios_desativados)): ?>
                                    <a class="dropdown-item media bg-flat-color-light border-bottom" href="<?php echo base_url('usuarios'); ?>">
                                            <i class="fa fa-users"></i>
                                            <p style="font-size: .9em;"><span style="font-size: .7em;"><?php echo formata_data_banco_sem_hora(date('Y-m-d')); ?></span> | Existem colaboradores desativados</p>
                                        </a>
                                    <?php endif; ?>
                                    <?php if(isset($produto_sem_estoque)): ?>
                                    <a class="dropdown-item media bg-flat-color-light border-bottom" href="<?php echo base_url('produtos'); ?>">
                                            <i class="fa fa-shopping-basket"></i>
                                            <p style="font-size: .9em;"><span style="font-size: .7em;"><?php echo formata_data_banco_sem_hora(date('Y-m-d')); ?></span> | Há produtos com estoque menor que o mínimo</p>
                                        </a>
                                    <?php endif; ?>
                                    <?php if(isset($reclama_pendente)): ?>
                                    <a class="dropdown-item media bg-flat-color-light border-bottom" href="<?php echo base_url('reclamacoes'); ?>">
                                            <i class="fa fa-bullhorn"></i>
                                            <p style="font-size: .9em;"><span style="font-size: .7em;"><?php echo formata_data_banco_sem_hora(date('Y-m-d')); ?></span> | Tem reclamações pendentes não resolvidas</p>
                                        </a>
                                    <?php endif; ?>
                                    <?php if ($this->ion_auth->is_admin()): ?>
                                    <?php if(isset($ticket_pendente)): ?>
                                    <a class="dropdown-item media bg-flat-color-light border-bottom" href="<?php echo base_url('tickets'); ?>">
                                            <i class="fa fa-ticket"></i>
                                            <p style="font-size: .9em;"><span style="font-size: .7em;"><?php echo formata_data_banco_sem_hora(date('Y-m-d')); ?></span> | Tem tickets pendentes não finalizados</p>
                                        </a>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                <a class="dropdown-item media bg-dark text-light">
                                    <span class="message media-body text-center" style="font-weight: bold;">Central de notificações</span>
                                </a>
                                </div>
                            </div>-->
                        <?php // endif; ?>

<!--                        <div class="dropdown for-message mt-2">
                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                id="message"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ti-email"></i>
                                <span class="count bg-primary">4</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
                                <p class="red">Você tem 4 e-mails não lidos</p>
                                <a class="dropdown-item media bg-flat-color-dark" href="#">
                                <span class="photo media-left"><img alt="avatar" src="<?php echo base_url('public/images/avatar/avatar2.jpg'); ?>"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Claudemir Lopes</span>
                                    <span class="time float-right">Há 2 min</span>
                                        <p>Configurações do sistema</p>
                                </span>
                            </a>
                                <a class="dropdown-item media bg-flat-color-info" href="#">
                                <span class="photo media-left"><img alt="avatar" src="<?php echo base_url('public/images/avatar/avatar.jpg'); ?>"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Eliane Rocha</span>
                                    <span class="time float-right">Há 5 min</span>
                                        <p>Hospedagem da plataforma</p>
                                </span>
                            </a>
                                <a class="dropdown-item media bg-flat-color-warning" href="#">
                                <span class="photo media-left"><img alt="avatar" src="<?php echo base_url('public/images/avatar/avatar3.png'); ?>"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Luiz Roberto Cerol</span>
                                    <span class="time float-right">Há 10 min</span>
                                        <p>Sobre o script de PHP</p>
                                </span>
                            </a>
                                <a class="dropdown-item media bg-flat-color-info" href="#">
                                <span class="photo media-left"><img alt="avatar" src="<?php echo base_url('public/images/avatar/4.jpg'); ?>"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Raquel Santos</span>
                                    <span class="time float-right">Há 15 min</span>
                                        <p>Página não está abrindo</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-light" href="email_entrada.php">
                                <span class="message media-body text-center" style="font-weight: bold;">Ver todos</span>
                            </a>
                            </div>
                        </div>-->
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                                                
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php if($this->session->userdata('userlogado')->cliente_img == 0) { ?>
                            <img class="user-avatar rounded-circle imagem1" src="<?php echo base_url('public/images/logo_bsum01.jpg'); ?>" alt="User Avatar">
                            <?php } else { ?>
                            <img class="user-avatar rounded-circle" src="<?php echo base_url('public/images/perfil/'.$this->session->userdata('userlogado')->cliente_img.'.jpg'); ?>" alt="User Avatar">
                            <?php } ?>
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="<?php echo base_url('orcamentos/perfil/'); ?>"><i class="fa fa-user"></i> Meu&nbsp;perfil</a>
                            <a class="nav-link" href="<?php echo base_url('orcamentos/empresa/'); ?>"><i class="fa fa-building"></i> Empresa</a>
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#staticModal"><i class="fa fa-sign-out"></i> Sair</a>
                        </div>
                    </div>

                    <div class="float-right text-secondary-50 pr-4" style="line-height: 37px;color: #fff;">
                        Olá <b><?php echo $this->session->userdata('userlogado')->cliente_responsavel; ?>
                        </b>
                        
                        <i class="flag-icon flag-icon-br ml-2"></i>
                    </div>

                </div>

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
                                <a class="btn btn-danger btn-sm" href="<?php echo base_url('orcamentos/usuarios/logout'); ?>" role="button">Sair</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FIM MODAL LOGOUT -->

            </div>

        </header><!-- /header -->
        <!-- Header-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-top: -5px;margin-bottom: 1px;background: #fcfcfc;color: #333;border-bottom: solid 1px #eee;border-top: solid 1px #ccc;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav" id="prr" style="margin-left: 15px;">
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo base_url('orcamentos/vendedores'); ?>" style="font-size: .9em;"><i class="ti-comments-smiley" style="fon-size: 1em;"></i>&nbsp;&nbsp;Vendedores</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo base_url('orcamentos/seguros'); ?>" style="font-size: .9em;"><i class="ti-lock" style="fon-size: 1em;"></i>&nbsp;&nbsp;Seguro&nbsp;Blueprime</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo base_url('orcamentos/datasheets'); ?>" style="font-size: .9em;"><i class="ti-layout-grid3" style="fon-size: 1em;"></i>&nbsp;&nbsp;Datasheets</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('orcamentos/kits'); ?>" style="font-size: .9em;"><i class="ti-archive" style="fon-size: 1em;"></i>&nbsp;&nbsp;Kits&nbsp;Franqueados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" style="font-size: .9em;"><big><span class="badge badge-info"><i class="ti-tablet" style="fon-size: 1em;"></i>&nbsp;&nbsp;CURSO&nbsp;ONLINE</span></big></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" style="font-size: .9em;"><big><span class="badge badge-secondary"><i class="ti-shopping-cart" style="fon-size: 1em;"></i>&nbsp;&nbsp;E-COMMERCE</span></big></a>
                    </li>
                </ul>
            </div>            
        </nav>  