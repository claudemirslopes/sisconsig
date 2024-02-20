<style>
    .form-control {
        border: 1px solid #585858;
    }
    .border {
        border: 1px solid #848484 !important;
    }
</style>

    <!-- PARRA LATERAL - SIDEBAR -->
    <?php $this->load->view('layout/sidebar') ?>
    <!-- PARRA LATERAL - SIDEBAR -->

    <!-- BARRA DIREITA -->

    <div id="right-panel" class="right-panel">

        <!-- BARRA SUPERIOR - NAVBAR -->
        <?php $this->load->view('layout/navbar') ?>
        <!-- BARRA SUPERIOR - NAVBAR -->

        <!-- MAIN CONTENT - CONTEÚDO PRINCIPAL -->
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1 style="font-size: 1.2em;">Plataforma Administrativa</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url('/'); ?>" style="color: #47AA0B;">Home</a></li>
                            <li><a href="#">Cadastros</a></li>
                            <li><a href="#">Pessoas</a></li>
                            <li><a href="<?php echo base_url('usuarios'); ?>">Colaboradores</a></li>
                            <li class="active"><?php echo $titulo; ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- content -->
        <div class="content mt-1">
            <div class="card">
                <div class="card-header bg-secondary text-light">
                    <strong class="card-title" v-if="headerText">Editar Colaborador</strong>
                    <a title="Voltar" href="<?php echo base_url('usuarios'); ?>" class="btn btn-light btn-sm float-right"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Voltar</a>
                </div>

                <div class="card-body" style="border: 1px solid #A4A4A4;">
                    <style type="text/css">
                        #container {
                          display: inline-block;
                          position: relative;
                        }

                        #container figcaption {
                          position: absolute;
                          top: 5px;
                          left: 5px;
                          font-size: .9em;
                          color: #FFC40D;
                          font-weight: bolder;
                          text-shadow: 0px 0px 2px black;
                          background: rgba(39,44,51, 0.5);
                          padding-left: 5px;
                          padding-right: 5px;
                          border-radius: 10px;
                        }
                        #linkmage {
                            color: #232323;
                            background: #ababab;
                            font-weight: bold;
                            padding: 5px;
                            font-size: .8em;
                            border-radius: 10px;
                        }
                        #linkmage:hover {
                            color: #ababab;
                            background: #232323;
                        }
                        </style>
                    <fieldset class="border p-2 col-md-2 float-left" style="margin-top: -10px;margin-bottom: 15px;">
                        <legend class="font-small"><i class="fa fa-picture-o"></i> Foto do perfil</legend>
                        <div class="form-row">
                            <div class="form-group col-md-12" style="height: 55px;">
                                <div class="text-center" style="width: 100%;height: 100%;">
                                    <?php if($usuario->foto_editor == 0) { ?>
                                        <a href="" data-toggle="modal" data-target="#foto">
                                        <figure id="container">
                                            <img src="<?php echo base_url('public/images/franquias/semFoto2.png'); ?>" alt="Logo" width="100%" height="80" style="background-color: #cdcdcd;margin-top: -8px;"/>
                                            <figcaption>ADD FOTO</figcaption>
                                        </figure></a>
                                    <?php } else { ?>
                                    <a href="" data-toggle="modal" data-target="#foto">
                                    <figure id="container">
                                        <img class="imagem1" src="<?php echo base_url('public/images/usuarios/'.$usuario->id.'.jpg'); ?>" class="text-center" alt="Logo" width="40%" height="60px" style="background-color: #cdcdcd;border-radius: 30px;"/>
                                        <figcaption>ALTERAR</figcaption>
                                    </figure></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="modal fade swing" id="foto" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
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
                                        <?php if($usuario->foto_editor == 0) { ?>
                                            <img src="<?php echo base_url('public/images/franquias/semFoto2.png'); ?>" alt="Logo" width="100%" height="100%" style="background-color: #cdcdcd;"/>
                                        <?php } else { ?>
                                        <figure id="container">
                                            <img class="imagem1" src="<?php echo base_url('public/images/usuarios/'.$usuario->id.'.jpg'); ?>" alt="Logo" width="50%" height="auto" style="background-color: #cdcdcd;"/>
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
                                        <small class="form-text text-danger text-center"><b>Formato aceito:</b> Somente JPG | <b>Medida:</b> 200x200</small>
                                    </div>
                                    <div class="modal-footer">
                                        <?php
                                            echo $divopen;
                                        ?>                                            
                                        <div class="float-right">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <?php
                                                $botao = array('name' => 'btn_adicionar', 'id' => 'btn_adicionar', 'class' => 'btn btn-info', 'value' => 'Add/Alterar Foto');
                                                echo form_submit($botao);
                                                echo $divclose;
                                                echo form_close();
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    <form method="post" name="form_edit" class="user">
                        <fieldset class="border p-2 col-md-10 float-right" style="margin-top: -10px;">
                            <legend class="font-small"><i class="fa fa-user-circle"></i> Dados pessoais</legend>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="nome">Nome <span style="color: red;font-weight: bold;">*</span></label>
                                    <input type="text" name="first_name" class="form-control form-control-user" id="nome" placeholder="Nome" value="<?php echo $usuario->first_name ?>">
                                    <?php echo form_error('first_name', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="sobrenome">Sobrenome <span style="color: red;font-weight: bold;">*</span></label>
                                    <input type="text" name="last_name" class="form-control form-control-user" id="sobrenome" placeholder="Sobrenome" value="<?php echo $usuario->last_name ?>">
                                    <?php echo form_error('last_name', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="sobrenome">Telefone <span style="color: red;font-weight: bold;">*</span></label>
                                    <input type="text" name="phone" class="form-control form-control-user celular" id="phone" placeholder="Telefone/Celular" value="<?php echo $usuario->phone ?>">
                                    <?php echo form_error('phone', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                            </div>
                        </fieldset>
                        
                        <fieldset class="border p-2" style="margin-top: 5px;clear: both;">
                            <legend class="font-small"><i class="fa fa-lock"></i> Dados de acesso</legend>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="email">E-mail <span style="color: red;font-weight: bold;">*</span></label>
                                    <input type="email" name="email" class="form-control form-control-user" id="email" placeholder="E-mail" value="<?php echo $usuario->email ?>">
                                    <?php echo form_error('email', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="username">Usuário <span style="color: red;font-weight: bold;">*</span></label>
                                    <input type="text" name="username" class="form-control form-control-user" id="username" placeholder="Nome de usuário" value="<?php echo $usuario->username ?>">
                                    <?php echo form_error('username', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="active">Ativo</label>
                                    <?php if($usuario->active == 0): ?>
                                    <select name="active" class="form-control form-control-user-date bg-danger text-light font-weight-bold" id="active" <?php echo (!$this->ion_auth->is_admin() ? 'disabled' : ''); ?>>
                                        <option value="0" <?php echo ($usuario->active == 0) ? 'selected' : ''; ?>>Não</option>
                                        <option value="1" <?php echo ($usuario->active == 1) ? 'selected' : ''; ?>>Sim</option>
                                    </select>
                                    <?php endif; ?>
                                    <?php if($usuario->active == 1): ?>
                                    <select name="active" class="form-control form-control-user-date bg-success text-light font-weight-bold" id="active" <?php echo (!$this->ion_auth->is_admin() ? 'disabled' : ''); ?>>
                                        <option value="0" <?php echo ($usuario->active == 0) ? 'selected' : ''; ?>>Não</option>
                                        <option value="1" <?php echo ($usuario->active == 1) ? 'selected' : ''; ?>>Sim</option>
                                    </select>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="perfil_usuario">Perfil de acesso</label>
                                    <select name="perfil_usuario" class="form-control custom-select" id="perfil_usuario" <?php echo (!$this->ion_auth->is_admin() ? 'disabled' : ''); ?>>
                                        <option value="1" <?php echo ($perfil_usuario->id == 1) ? 'selected' : ''; ?>>Administrador</option>
                                        <option value="2" <?php echo ($perfil_usuario->id == 2) ? 'selected' : ''; ?>>Comercial</option>
                                        <option value="3" <?php echo ($perfil_usuario->id == 3) ? 'selected' : ''; ?>>Gerência</option>
                                        <option value="4" <?php echo ($perfil_usuario->id == 4) ? 'selected' : ''; ?>>Logística</option>
                                        <option value="5" <?php echo ($perfil_usuario->id == 5) ? 'selected' : ''; ?>>Franquia</option>
                                        <option value="6" <?php echo ($perfil_usuario->id == 6) ? 'selected' : ''; ?>>Qualidade</option>
                                        <option value="7" <?php echo ($perfil_usuario->id == 7) ? 'selected' : ''; ?>>Financeiro</option>
                                        <option value="8" <?php echo ($perfil_usuario->id == 8) ? 'selected' : ''; ?>>Projeto</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="senha">Senha</label>
                                    <input type="password" name="password" class="form-control form-control-user" id="senha" placeholder="Senha">
                                    <small class="form-text text-info font-weight-bold">Deixe este campo em branco caso não queira trocar a senha</small>
                                    <?php echo form_error('password', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="recsenha">Confirme a senha</label>
                                    <input type="password" name="senha" class="form-control form-control-user" id="recsenha" placeholder="Repita a senha">
                                    <?php echo form_error('confirm_password', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                            </div>
                        </fieldset>

                        <input type="hidden" name="usuario_id" value="<?php echo $usuario->id; ?>">
                        <button type="submit" class="btn btn-primary btn-sm float-right mt-1"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar colaborador</button>
                    </form>
                </div>

            </div>

        </div>
