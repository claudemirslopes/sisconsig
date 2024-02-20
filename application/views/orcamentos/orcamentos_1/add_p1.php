<script src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous"></script>
    <!-- Adicionando Javascript -->
    <script>
    $(document).ready(function() {
        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#rua").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#uf").val("");
            $("#ibge").val("");
        }       
        //Quando o campo cep perde o foco.
        $("#cep").blur(function() {
            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');
            //Verifica se campo cep possui valor informado.
            if (cep != "") {
                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;
                //Valida o formato do CEP.
                if(validacep.test(cep)) {
                    //Preenche os campos com "carregando..." enquanto consulta webservice.
                    $("#rua").val("carregando...");
                    $("#bairro").val("carregando...");
                    $("#cidade").val("carregando...");
                    $("#uf").val("carregando...");
                    $("#ibge").val("carregando...");
                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#rua").val(dados.logradouro);
                            $("#bairro").val(dados.bairro);
                            $("#cidade").val(dados.localidade);
                            $("#uf").val(dados.uf);
                            $("#ibge").val(dados.ibge);
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            alert("CEP não encontrado.");
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });
    });
    </script>
<style>
    .form-control {
        border: 1px solid #585858;
    }
    .border {
        border: 1px solid #848484 !important;
    }
</style>
    <!-- PARRA LATERAL - SIDEBAR -->
    <?php $this->load->view('orcamentos/layout/sidebar') ?>
    <!-- PARRA LATERAL - SIDEBAR -->

    <!-- BARRA DIREITA -->

    <div id="right-panel" class="right-panel">

        <!-- BARRA SUPERIOR - NAVBAR -->
        <?php $this->load->view('orcamentos/layout/navbar') ?>
        <!-- BARRA SUPERIOR - NAVBAR -->

        <!-- MAIN CONTENT - CONTEÚDO PRINCIPAL -->
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1 style="font-size: 1.2em;">Plataforma de Orçamentos</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url('orcamentos/home'); ?>" style="color: #47AA0B;">Home</a></li>
<!--                            <li><a href="#">Cadastros</a></li>
                            <li><a href="#">Pessoas</a></li>-->
                            <li><a href="<?php echo base_url('orcamentos/orcamentos'); ?>">Orçamentos</a></li>
                            <li class="active"><?php echo $titulo; ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="content">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="progress" style="background-color: #dcdcdc;height: 25px;">
                        <div class="progress-bar progress-bar-striped progress-bar-animated font-weight-bold bg-success text-light" role="progressbar" style="width: 25%;font-size: 1.2em;-webkit-text-stroke-width: .1px;-webkit-text-stroke-color: #ffffff;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">PASSO 1 [25%]</div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- content -->
        <div class="content mt-2">
            <div class="card">
                <div class="card-header bg-secondary text-light">
                    <strong class="card-title" v-if="headerText">Criar Orçamento | INFORMAÇÕES DO CLIENTE</strong>
                    <span class="float-right">
                       <a title="Voltar" href="<?php echo base_url('orcamentos/orcamentos'); ?>" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Voltar</a>
                    </span>
                </div>
                
                <div class="card-body" style="border: 1px solid #A4A4A4;">
                
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
                
                    <form method="post" name="form_add" class="user">
                        
                        <fieldset class="border p-2 fset" style="margin-top: -10px;">
                            <legend class="font-small"><i class="fa fa-address-card"></i> Tipo de pessoa</legend>
                            <div class="custom-control custom-radio custom-control-inline mt-2">
                                <input type="radio" id="pessoa_fisica" name="orc_cli_pessoa" class="custom-control-input" value="1" <?php echo set_checkbox('orc_cli_pessoa', '1') ?> checked="">
                                <label class="custom-control-label pt-1" for="pessoa_fisica">Pessoa Física</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="pessoa_juridica" name="orc_cli_pessoa" class="custom-control-input" value="2" <?php echo set_checkbox('orc_cli_pessoa', '2') ?> >
                                <label class="custom-control-label pt-1" for="pessoa_juridica">Pessoa Jurídica</label>
                            </div>
                        </fieldset>
                        
                        <fieldset class="mt-2 border p-2">
                            <legend class="font-small"><i class="fa fa-cogs"></i> Configurações</legend>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <div class="pessoa_fisica">
                                        <label for="orc_cli_cpf">CPF <span style="color: red;font-weight: bold;">*</span></label>
                                        <input type="text" name="orc_cli_cpf" class="form-control form-control-user cpfmask" id="orc_cli_cpf" placeholder="CPF" value="<?php echo set_value('orc_cli_cpf'); ?>">           
                                        <?php echo form_error('orc_cli_cpf', '<small class="form-text text-danger">','</small>') ?>
                                    </div>
                                    <div class="pessoa_juridica">
                                        <label for="orc_cli_cnpj">CNPJ <span style="color: red;font-weight: bold;">*</span></label>
                                        <input type="text" name="orc_cli_cnpj" class="form-control form-control-user cnpjmask" id="orc_cli_cnpj" placeholder="CNPJ" value="<?php echo set_value('orc_cli_cnpj'); ?>">
                                        <?php echo form_error('orc_cli_cnpj', '<small class="form-text text-danger">','</small>') ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="orc_cli_uniconsum">Unidade Consumidora <span style="color: red;font-weight: bold;">*</span></label>
                                    <input type="text" name="orc_cli_uniconsum" class="form-control form-control-user" id="uncon" placeholder="Unidade Consumidora" value="<?php echo set_value('orc_cli_uniconsum'); ?>">
                                    <?php echo form_error('orc_cli_uniconsum', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="orc_status">Ativo <span style="color: red;font-weight: bold;">*</span></label>
                                    <select name="orc_status" class="form-control custom-select" id="orc_status">
                                        <option value="0">Não</option>
                                        <option value="1" selected="">Sim</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="orc_codigo">Orçamento nº <span style="color: red;font-weight: bold;">*</span></label>
                                    <input type="text" name="orc_codigo" class="form-control form-control-user-date bg-dark text-light font-weight-bold" id="orc_codigo" value="<?php echo $orc_codigo; ?>" readonly="">
                                </div>
                            </div>
                        </fieldset>
                        
                        <fieldset class="mt-2 border p-2">
                            <legend class="font-small"><i class="fa fa-user-circle"></i> Dados Pessoais/Empresariais</legend>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="pessoa_fisica" for="orc_cli_nome">Nome <span style="color: red;font-weight: bold;">*</span></label>
                                    <label class="pessoa_juridica" for="orc_cli_nome">Razão Social <span style="color: red;font-weight: bold;">*</span></label>
                                    <input type="text" name="orc_cli_nome" class="form-control form-control-user" id="orc_cli_nome" placeholder="Nome/Razão Social" value="<?php echo set_value('orc_cli_nome'); ?>">
                                    <?php echo form_error('orc_cli_nome', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="orc_cli_email">E-mail <span style="color: red;font-weight: bold;">*</span></label>
                                    <input type="email" name="orc_cli_email" class="form-control form-control-user" id="orc_cli_email" placeholder="E-mail" value="<?php echo set_value('orc_cli_email'); ?>">
                                    <?php echo form_error('orc_cli_email', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="orc_cli_telcel">Telefone/Celular <span style="color: red;font-weight: bold;">*</span></label>
                                    <input type="text" name="orc_cli_telcel" class="form-control form-control-user celular" id="orc_cli_telcel" placeholder="Telefone/Celular" value="<?php echo set_value('orc_cli_telcel'); ?>">
                                    <?php echo form_error('orc_cli_telcel', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                            </div>
                        </fieldset>
                        
                        <fieldset class="mt-2 border p-2">
                            <legend class="font-small"><i class="fa fa-map-marker"></i> Informações de Endereço</legend>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="orc_cli_cep">CEP <span style="color: red;font-weight: bold;">*</span></label>
                                    <input type="text" name="orc_cli_cep" class="form-control form-control-user cep" id="cep" placeholder="CEP" value="<?php echo set_value('orc_cli_cep'); ?>">
                                    <?php echo form_error('orc_cli_cep', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                                <div class="form-group col-md-9">
                                    <label for="orc_cli_endereco">Endereço <span style="color: red;font-weight: bold;">*</span></label>
                                    <input type="text" name="orc_cli_endereco" class="form-control form-control-user" id="rua" placeholder="Logradouro, rua, etc..." value="<?php echo set_value('orc_cli_endereco'); ?>">
                                    <?php echo form_error('orc_cli_endereco', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                                <div class="form-group col-md-1">
                                    <label for="orc_cli_numero">Nº</label>
                                    <input type="text" name="orc_cli_numero" class="form-control form-control-user" id="numero" placeholder="nº" value="<?php echo set_value('orc_cli_numero'); ?>">
                                    <?php echo form_error('orc_cli_numero', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="orc_cli_complemento">Complemento</label>
                                    <input type="text" name="orc_cli_complemento" class="form-control form-control-user" id="complemento" placeholder="Complemento" value="<?php echo set_value('orc_cli_complemento'); ?>">
                                    <?php echo form_error('orc_cli_complemento', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="orc_cli_bairro">Bairro <span style="color: red;font-weight: bold;">*</span></label>
                                    <input type="text" name="orc_cli_bairro" class="form-control form-control-user" id="bairro" placeholder="Bairro" value="<?php echo set_value('orc_cli_bairro'); ?>">
                                    <?php echo form_error('orc_cli_bairro', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="orc_cli_cidade">Cidade <span style="color: red;font-weight: bold;">*</span></label>
                                    <input type="text" name="orc_cli_cidade" class="form-control form-control-user" id="cidade" placeholder="Cidade" value="<?php echo set_value('orc_cli_cidade'); ?>">
                                    <?php echo form_error('orc_cli_cidade', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                                <div class="form-group col-md-1">
                                    <label for="orc_cli_estado">UF <span style="color: red;font-weight: bold;">*</span></label>
                                    <select name="orc_cli_estado" class="form-control custom-select" id="uf">
                                        <option disabled="" selected="">Selecione</option>
                                        <option value="AC">AC</option>
                                        <option value="AL">AL</option>
                                        <option value="AP">AP</option>
                                        <option value="AM">AM</option>
                                        <option value="BA">BA</option>
                                        <option value="CE">CE</option>
                                        <option value="DF">DF</option>
                                        <option value="ES">ES</option>
                                        <option value="GO">GO</option>
                                        <option value="MA">MA</option>
                                        <option value="MT">MT</option>
                                        <option value="MS">MS</option>
                                        <option value="MG">MG</option>
                                        <option value="PA">PA</option>
                                        <option value="PB">PB</option>
                                        <option value="PR">PR</option>
                                        <option value="PE">PE</option>
                                        <option value="PI">PI</option>
                                        <option value="RJ">RJ</option>
                                        <option value="RN">RN</option>
                                        <option value="RS">RS</option>
                                        <option value="RO">RO</option>
                                        <option value="RR">RR</option>
                                        <option value="SC">SC</option>
                                        <option value="SP">SP</option>
                                        <option value="SE">SE</option>
                                        <option value="TO">TO</option>
                                    </select>   
                                    <?php echo form_error('orc_cli_estado', '<small class="form-text text-danger">','</small>') ?>
                                </div>
                            </div>
                        </fieldset>
                        <input type="hidden" name="orc_cli_cliente_id" value="<?php echo $this->session->userdata('userlogado')->cliente_id; ?>">
                        
                        <button type="submit" class="btn btn-primary btn-sm float-right mt-3" style="width: 100%;font-size: 1.5em;">PRÓXIMO PASSO&nbsp;&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                    </form>
                </div>

            </div>

        </div>
