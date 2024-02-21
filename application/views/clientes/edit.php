<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous"></script>
    <!-- Adicionando Javascript -->
<script>
$(document).ready(function() {
	function limpa_formulário_cep() {
		// Limpa valores do formulário de cep.
		$("#logradouro").val("");
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
				$("#logradouro").val("carregando...");
				$("#bairro").val("carregando...");
				$("#cidade").val("carregando...");
				$("#uf").val("carregando...");
				$("#ibge").val("carregando...");
				//Consulta o webservice viacep.com.br/
				$.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
					if (!("erro" in dados)) {
						//Atualiza os campos com os valores da consulta.
						$("#logradouro").val(dados.logradouro);
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
										<strong class="card-title mb-3"><i class="fa fa-check" aria-hidden="true"></i>&nbsp; <?php echo $titulo; ?></small></strong>
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
									
								
										<form method="post" name="form_edit" class="user" id="post">
											
											<fieldset class="border p-2" style="margin-top: -10px;">
												<legend class="font-small"><i class="fa fa-cogs"></i> Configurações</legend>
												<div class="form-row">
													<div class="form-group col-md-2">
														<label for="cliente_pessoa">Cliente Tipo <span style="color: red;font-weight: bold;">*</span></label>
														<select name="cliente_pessoa" class="form-control custom-select" id="cliente_pessoa" readonly="">
															<option readonly="" value="<?php echo ($cliente->cliente_pessoa == 1 ? '1' : '2'); ?>"><?php echo ($cliente->cliente_pessoa == 1 ? 'Pessoa Física' : 'Pessoa Jurídica'); ?></option>
														</select>
													</div>
													<div class="form-group col-md-4">
													<?php if ($cliente->cliente_pessoa == 1):  ?>
														<label for="cliente_cpf">CPF <span style="color: red;font-weight: bold;">*</span></label>
														<input type="text" name="cliente_cpf" class="form-control form-control-user cpfmask" id="cpf" placeholder="CPF" value="<?php echo $cliente->cliente_cpf_cnpj ?>">
														<?php echo form_error('cliente_cpf', '<small class="form-text text-danger">','</small>') ?>
													<?php else: ?>
														<label for="cliente_cnpj">CNPJ <span style="color: red;font-weight: bold;">*</span></label>
														<input type="text" name="cliente_cnpj" class="form-control form-control-user cnpjmask" id="cnpj" placeholder="CNPJ" value="<?php echo $cliente->cliente_cpf_cnpj ?>">
														<?php echo form_error('cliente_cnpj', '<small class="form-text text-danger">','</small>') ?>
													<?php endif; ?>                                    
													</div>
													<div class="form-group col-md-4">
													<?php if ($cliente->cliente_pessoa == 1):  ?>
														<label for="cliente_rg_ie">RG</label>
													<?php else: ?>
														<label for="cliente_rg_ie">Inscrição Estadual</label>
													<?php endif; ?>
														<input type="cliente_rg_ie" name="cliente_rg_ie" class="form-control form-control-user" id="cliente_rg_ie" placeholder="<?php echo ($cliente->cliente_pessoa == 1 ? 'RG' : 'IE') ?>" value="<?php echo $cliente->cliente_rg_ie ?>">
														<?php echo form_error('cliente_rg_ie', '<small class="form-text text-danger">','</small>') ?>
													</div>
													<div class="form-group col-md-2">
														<label for="cliente_ativo">Ativo <span style="color: red;font-weight: bold;">*</span></label>
														<select name="cliente_ativo" class="form-control custom-select" id="cliente_ativo">
															<option value="0" <?php echo ($cliente->cliente_ativo == 0) ? 'selected' : ''; ?>>Não</option>
															<option value="1" <?php echo ($cliente->cliente_ativo == 1) ? 'selected' : ''; ?>>Sim</option>
														</select>
													</div>
												</div>
											</fieldset>
											
											<fieldset class="mt-2 border p-2">
												<?php if ($cliente->cliente_pessoa == 1):  ?>
												<legend class="font-small"><i class="fa fa-user-circle"></i> Dados Pessoais</legend>
												<?php else: ?>
												<legend class="font-small"><i class="fa fa-industry"></i> Dados Empresariais</legend>
												<?php endif; ?>
												<div class="form-row">
													<div class="form-group col-md-5">
													<?php if ($cliente->cliente_pessoa == 1):  ?>
														<label for="cliente_nome">Nome <span style="color: red;font-weight: bold;">*</span></label>
													<?php else: ?>
														<label for="cliente_nome">Razão Social <span style="color: red;font-weight: bold;">*</span></label>
													<?php endif; ?>
														<input type="text" name="cliente_nome" class="form-control form-control-user" id="nome" placeholder="<?php echo ($cliente->cliente_pessoa == 1 ? 'Nome' : 'Razão Social') ?>" value="<?php echo $cliente->cliente_nome ?>">
														<?php echo form_error('cliente_nome', '<small class="form-text text-danger">','</small>') ?>
													</div>
													<div class="form-group col-md-7">
													<?php if ($cliente->cliente_pessoa == 1):  ?>
														<label for="cliente_sobrenome">Sobrenome <span style="color: red;font-weight: bold;">*</span></label>
													<?php else: ?>
														<label for="cliente_sobrenome">Nome Fantasia <span style="color: red;font-weight: bold;">*</span></label>
													<?php endif; ?>
														<input type="text" name="cliente_sobrenome" class="form-control form-control-user" id="fantasia" placeholder="<?php echo ($cliente->cliente_pessoa == 1 ? 'Sobrenome' : 'Nome Fantasia') ?>" value="<?php echo $cliente->cliente_sobrenome ?>">
														<?php echo form_error('cliente_sobrenome', '<small class="form-text text-danger">','</small>') ?>
													</div>
												</div>

												<div class="form-row">
													<div class="form-group col-md-2">
													<?php if ($cliente->cliente_pessoa == 1):  ?>
														<label for="cliente_data_nascimento">Data de Nascimento <span style="color: red;font-weight: bold;">*</span></label>
													<?php else: ?>
														<label for="cliente_data_nascimento">Data de abertura <span style="color: red;font-weight: bold;">*</span></label>
													<?php endif; ?>
														<input type="date" name="cliente_data_nascimento" class="form-control form-control-user" id="cliente_data_nascimento" placeholder="DN" value="<?php echo $cliente->cliente_data_nascimento ?>">
														<?php echo form_error('cliente_data_nascimento', '<small class="form-text text-danger">','</small>') ?>
													</div>
													<div class="form-group col-md-4">
														<label for="cliente_email">E-mail <span style="color: red;font-weight: bold;">*</span></label>
														<input type="email" name="cliente_email" class="form-control form-control-user" id="email" placeholder="E-mail" value="<?php echo $cliente->cliente_email ?>">
														<?php echo form_error('cliente_email', '<small class="form-text text-danger">','</small>') ?>
													</div>
													<div class="form-group col-md-3">
														<label for="cliente_telefone">Telefone Fixo <span style="color: red;font-weight: bold;">*</span></label>
														<input type="text" name="cliente_telefone" class="form-control form-control-user telefone" id="telefone" placeholder="Telefone Fixo" value="<?php echo $cliente->cliente_telefone ?>">
														<?php echo form_error('cliente_telefone', '<small class="form-text text-danger">','</small>') ?>
													</div>
													<div class="form-group col-md-3">
														<label for="cliente_celular">Celular <span style="color: red;font-weight: bold;">*</span></label>
														<input type="text" name="cliente_celular" class="form-control form-control-user celular" id="cliente_celular" placeholder="Celular" value="<?php echo $cliente->cliente_celular ?>">
														<?php echo form_error('cliente_celular', '<small class="form-text text-danger">','</small>') ?>
													</div>
												</div>
											</fieldset>
											
											<fieldset class="mt-2 border p-2">
												<legend class="font-small"><i class="fa fa-map-marker"></i> Informações de Endereço</legend>
												<div class="form-row">
													<div class="form-group col-md-2">
														<label for="cliente_cep">CEP <span style="color: red;font-weight: bold;">*</span></label>
														<input type="text" name="cliente_cep" class="form-control form-control-user cep" id="cep" placeholder="CEP" value="<?php echo $cliente->cliente_cep ?>">
														<?php echo form_error('cliente_cep', '<small class="form-text text-danger">','</small>') ?>
													</div>
													<div class="form-group col-md-9">
														<label for="cliente_endereco">Endereço <span style="color: red;font-weight: bold;">*</span></label>
														<input type="text" name="cliente_endereco" class="form-control form-control-user" id="logradouro" placeholder="Logradouro, rua, etc..." value="<?php echo $cliente->cliente_endereco ?>">
														<?php echo form_error('cliente_endereco', '<small class="form-text text-danger">','</small>') ?>
													</div>
													<div class="form-group col-md-1">
														<label for="cliente_numero_endereco">Nº</label>
														<input type="text" name="cliente_numero_endereco" class="form-control form-control-user" id="numero" placeholder="nº" value="<?php echo $cliente->cliente_numero_endereco ?>">
														<?php echo form_error('cliente_numero_endereco', '<small class="form-text text-danger">','</small>') ?>
													</div>
												</div>

												<div class="form-row">
													<div class="form-group col-md-5">
														<label for="cliente_complemento">Complemento</label>
														<input type="text" name="cliente_complemento" class="form-control form-control-user" id="complemento" placeholder="Complemento" value="<?php echo $cliente->cliente_complemento ?>">
														<?php echo form_error('cliente_complemento', '<small class="form-text text-danger">','</small>') ?>
													</div>
													<div class="form-group col-md-3">
														<label for="cliente_bairro">Bairro <span style="color: red;font-weight: bold;">*</span></label>
														<input type="text" name="cliente_bairro" class="form-control form-control-user" id="bairro" placeholder="Bairro" value="<?php echo $cliente->cliente_bairro ?>">
														<?php echo form_error('cliente_bairro', '<small class="form-text text-danger">','</small>') ?>
													</div>
													<div class="form-group col-md-3">
														<label for="cliente_cidade">Cidade <span style="color: red;font-weight: bold;">*</span></label>
														<input type="text" name="cliente_cidade" class="form-control form-control-user" id="cidade" placeholder="Cidade" value="<?php echo $cliente->cliente_cidade ?>">
														<?php echo form_error('cliente_cidade', '<small class="form-text text-danger">','</small>') ?>
													</div>
													<div class="form-group col-md-1">
														<label for="cliente_estado">UF <span style="color: red;font-weight: bold;">*</span></label>
														<select name="cliente_estado" class="form-control custom-select" id="uf">
															<option value="<?php echo $cliente->cliente_estado ?>"><?php echo $cliente->cliente_estado ?></option>
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
														<?php echo form_error('cliente_estado', '<small class="form-text text-danger">','</small>') ?>
													</div>
												</div>
											</fieldset>
											
											<fieldset class="mt-2 border p-2">
												<legend class="font-small"><i class="fa fa-sticky-note"></i> Observação</legend>
												<div class="form-row">
													<div class="form-group col-md-12">
														<textarea name="cliente_obs" rows="3" class="form-control form-control-user" id="cliente_obs" placeholder="Observação"><?php echo $cliente->cliente_obs ?></textarea>
														<?php echo form_error('cliente_obs', '<small class="form-text text-danger">','</small>') ?>
													</div>
												</div>
											</fieldset>
											
											<input type="hidden" name="cliente_id" value="<?php echo $cliente->cliente_id; ?>">
											<button type="submit" class="btn btn-primary btn-sm float-right mt-1"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar cliente</button>
										</form>
									</div>

								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->

<script type="text/javascript">
$("#cnpj").focusout(function(){
        //Início do Comando AJAX
        $.ajax({
            //O campo URL diz o caminho de onde virá os dados
            //É importante concatenar o valor digitado no CNPJ
            url: 'http://localhost/BluesunPlataforma/dados/cnpj.php?cnpj='+$("#cnpj").val(),
            //Atualização: caso use java, use cnpj.jsp, usando o outro exemplo.
            //Aqui você deve preencher o tipo de dados que será lido,
            //no caso, estamos lendo JSON.
            dataType: 'json',
            //SUCESS é referente a função que será executada caso
            //ele consiga ler a fonte de dados com sucesso.
            //O parâmetro dentro da função se refere ao nome da variável
            //que você vai dar para ler esse objeto.
            success: function(resposta){
                    //Confere se houve erro e o imprime
                    if(resposta.status == "ERROR"){
                            alert(resposta.message + "\nPor favor, digite os dados manualmente.");
                            $("#post #nome").focus().select();
                            return false;
                    }
                    //Agora basta definir os valores que você deseja preencher
                    //automaticamente nos campos acima.
                    $("#post #nome").val(resposta.nome);
                    $("#post #fantasia").val(resposta.fantasia);
                    $("#post #atividade").val(resposta.atividade_principal[0].text + " (" + resposta.atividade_principal[0].code + ")");
                    $("#post #telefone").val(resposta.telefone);
                    $("#post #email").val(resposta.email);
                    $("#post #logradouro").val(resposta.logradouro);
                    $("#post #complemento").val(resposta.complemento);
                    $("#post #bairro").val(resposta.bairro);
                    $("#post #cidade").val(resposta.municipio);
                    $("#post #uf").val(resposta.uf);
                    $("#post #cep").val(resposta.cep);
                    $("#post #numero").val(resposta.numero);
                }
            });
});
</script>
