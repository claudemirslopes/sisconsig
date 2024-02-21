<?php

defined('BASEPATH') OR exit ('Ação não permitida');

class Parceiros extends CI_Controller{
    
    public function __construct() {
        parent::__construct(); 
        
        // Definir se tem sessão aberta
        if (!$this->ion_auth->logged_in()){
            $this->session->set_flashdata('info', 'Sua sessão expirou, acesse novamente');
            redirect('login');
        }
        
        # multiple groups (by name)
        $group = array(1, 3);
        if (!$this->ion_auth->in_group($group)) {
          $this->session->set_flashdata('info', 'Você não tem permissão para acessar o módulo de <b>Autorizados</b>');
          redirect('home');
        }
        
        $this->load->model('parceiros_model');        
        $this->load->model('home_model');
        
    }
    
    public function index() {
        
        $data = array(
            
            'titulo' => 'Parceiros',
            
            'styles' => array(
			  'assets/datatables/datatables-bs4/css/dataTables.bootstrap4.min.css',
    		  'assets/datatables/datatables-responsive/css/responsive.bootstrap4.min.css',
              'assets/datatables/datatables-buttons/css/buttons.bootstrap4.min.css',
            ),
            
            'scripts' => array(
				'assets/datatables/datatables/jquery.dataTables.min.js',
				'assets/datatables/datatables/app.js',
				'assets/datatables/datatables-bs4/js/dataTables.bootstrap4.min.js',
				'assets/datatables/datatables-responsive/js/dataTables.responsive.min.js',
				'assets/datatables/datatables-responsive/js/responsive.bootstrap4.min.js',
				'assets/datatables/datatables-buttons/js/dataTables.buttons.min.js',
				'assets/datatables/datatables-buttons/js/buttons.bootstrap4.min.js',
				'assets/datatables/jszip/jszip.min.js',
				'assets/datatables/pdfmake/pdfmake.min.js',
				'assets/datatables/pdfmake/vfs_fonts.js',
				'assets/datatables/datatables-buttons/js/buttons.html5.min.js',
				'assets/datatables/datatables-buttons/js/buttons.print.min.js',
				'assets/datatables/datatables-buttons/js/buttons.colVis.min.js',
            ),
            
            
            // Home
            'soma_vendas' => $this->home_model->get_sum_vendas(),
            'soma_servicos' => $this->home_model->get_sum_ordem_servicos(),
            'soma_receber' => $this->home_model->get_sum_receber(),
            'soma_pagar' => $this->home_model->get_sum_pagar(),
            'soma_produtos' => $this->home_model->get_produtos_quantidade(),
            'top_produtos' => $this->home_model->get_produtos_mais_vendidos(),
            'top_servicos' => $this->home_model->get_servicos_mais_vendidos(), 
			'avisos_home' => $this->home_model->get_avisos_home(),
            
            'parceiros' => $this->parceiros_model->get_all('parceiros'),
            
        );
        
        //CENTRAL DE NOTIFICAÇÕES
        $contador_notificacoes = 0;
        if ($this->home_model->get_contas_receber_vencidas()) {
            
            $data['contas_receber_vencidas'] = TRUE;
            $contador_notificacoes ++;
        } 
        if ($this->home_model->get_contas_pagar_vencidas()) {
            
            $data['contas_pagar_vencidas'] = TRUE;
            $contador_notificacoes ++;
        } 
        if ($this->home_model->get_contas_pagar_vencem_hoje()) {
            
            $data['contas_pagar_vence_hoje'] = TRUE;
            $contador_notificacoes ++;
        }
        if ($this->home_model->get_contas_receber_vencem_hoje()) {
            
            $data['contas_receber_vence_hoje'] = TRUE;
            $contador_notificacoes ++;
        }
        if ($this->home_model->get_usuarios_desativados()) {
            
            $data['usuarios_desativados'] = TRUE;
            $contador_notificacoes ++;
        }
        if ($this->home_model->get_produtos_sem_estoque()) {
            
            $data['produto_sem_estoque'] = TRUE;
            $contador_notificacoes ++;
        }
        if ($this->home_model->get_reclamacoes_pendentes()) {
            
            $data['reclama_pendente'] = TRUE;
            $contador_notificacoes ++;
        }
        if ($this->ion_auth->is_admin()) {
           if ($this->home_model->get_tickets_pendentes()) {
            
                $data['ticket_pendente'] = TRUE;
                $contador_notificacoes ++;
            } 
        }
        
        
        $data['contador_notificacoes'] = $contador_notificacoes;
        
         // Carrega a view de parceiros
        $this->load->view('layout/header', $data);
        $this->load->view('parceiros/index');
        $this->load->view('layout/footer');
        
    }
    
    public function add() {

        $this->form_validation->set_rules('parceiro_tipo', 'tipo', 'trim|required|exact_length[1]');
        $this->form_validation->set_rules('parceiro_nome', 'nome', 'trim|required|min_length[4]|max_length[45]');
        $this->form_validation->set_rules('parceiro_sobrenome', 'sobrenome', 'trim|required|min_length[4]|max_length[150]');
        $this->form_validation->set_rules('parceiro_data_nascimento', 'data de nascimento', 'required');
        $parceiro_pessoa = $this->input->post('parceiro_pessoa');
        if ($parceiro_pessoa == 1) {
            $this->form_validation->set_rules('parceiro_cpf', 'CPF', 'trim|required|min_length[14]|max_length[14]|is_unique[parceiros.parceiro_cpf_cnpj]|callback_valida_cpf');
        } else {
            $this->form_validation->set_rules('parceiro_cnpj', 'CNPJ', 'trim|required|min_length[18]|max_length[18]|is_unique[parceiros.parceiro_cpf_cnpj]|callback_valida_cnpj');
        }
        $this->form_validation->set_rules('parceiro_rg_ie', 'RG/IE', 'trim|max_length[20]|is_unique[parceiros.parceiro_rg_ie]');
        $this->form_validation->set_rules('parceiro_email', 'e-mail', 'trim|required|valid_email|max_length[50]|is_unique[parceiros.parceiro_email]');            
        if ($this->input->post('parceiro_telefone')) {
            $this->form_validation->set_rules('parceiro_telefone', 'telefone fixo', 'trim|max_length[14]|is_unique[parceiros.parceiro_telefone]');
        }
        if ($this->input->post('parceiro_celular')) {
            $this->form_validation->set_rules('parceiro_celular', 'celular', 'trim|max_length[15]|is_unique[parceiros.parceiro_celular]');
        }
        $this->form_validation->set_rules('parceiro_responsavel', 'responsável', 'trim|required|min_length[4]|max_length[250]');
        $this->form_validation->set_rules('parceiro_cep', 'CEP', 'trim|required|max_length[10]');
        $this->form_validation->set_rules('parceiro_endereco', 'endereço', 'trim|required|max_length[155]');
        $this->form_validation->set_rules('parceiro_numero_endereco', 'número', 'trim|max_length[10]');
        $this->form_validation->set_rules('parceiro_bairro', 'bairro', 'trim|required|max_length[45]');
        $this->form_validation->set_rules('parceiro_complemento', 'complemento', 'trim|max_length[145]');
        $this->form_validation->set_rules('parceiro_cidade', 'cidade', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('parceiro_estado', 'estado', 'trim|required|exact_length[2]');
        $this->form_validation->set_rules('parceiro_obs', 'observação', 'max_length[500]');
        $this->form_validation->set_rules('parceiro_user', 'Usuário', 'required|min_length[3]|is_unique[parceiros.parceiro_user]');
        $this->form_validation->set_rules('parceiro_senha', 'Senha', 'required|min_length[5]');
        $this->form_validation->set_rules('parceiro_senha_repete', 'Confirmar Senha', 'matches[parceiro_senha]');

        if ($this->form_validation->run()) { 
            
            $data = elements(

                array(
                    'parceiro_pessoa',
                    'parceiro_tipo',
                    'parceiro_nome',
                    'parceiro_sobrenome',
                    'parceiro_data_nascimento',
                    'parceiro_rg_ie',
                    'parceiro_email',
                    'parceiro_telefone',
                    'parceiro_celular',
                    'parceiro_responsavel',
                    'parceiro_cep',
                    'parceiro_endereco',
                    'parceiro_numero_endereco',
                    'parceiro_bairro',
                    'parceiro_complemento',
                    'parceiro_cidade',
                    'parceiro_estado',
                    'parceiro_ativo',
                    'parceiro_obs',
                    'parceiro_user',
                ), $this->input->post()
                    
        );
        
        if ($parceiro_pessoa == 1) {
            $data['parceiro_cpf_cnpj'] = $this->input->post('parceiro_cpf');
        } else {
            $data['parceiro_cpf_cnpj'] = $this->input->post('parceiro_cnpj');
        }
        $data['parceiro_senha'] = sha1($this->input->post('parceiro_senha'));

        // Colocar todo texto em maiúsculo
        //    $data['parceiro_estado'] = strtoupper($this->input->post('parceiro_estado'));

        // Limpar dados maliciosos
        $data = html_escape($data);

        $this->core_model->insert('parceiros', $data);

        redirect('parceiros');

        } else {

            // Erro de validação
            $data = array(

            'titulo' => 'Cadastrar parceiro',

            'scripts' => array (
                'vendors/mask/jquery_3.2.1.min.js',
                'vendors/mask/jquery.maskedinput.min.js',
                'assets/js/parceiros.js',
            ),
                
            // Home
            'soma_vendas' => $this->home_model->get_sum_vendas(),
            'soma_servicos' => $this->home_model->get_sum_ordem_servicos(),
            'soma_receber' => $this->home_model->get_sum_receber(),
            'soma_pagar' => $this->home_model->get_sum_pagar(),
            'soma_produtos' => $this->home_model->get_produtos_quantidade(),
            'top_produtos' => $this->home_model->get_produtos_mais_vendidos(),
            'top_servicos' => $this->home_model->get_servicos_mais_vendidos(), 
			'avisos_home' => $this->home_model->get_avisos_home(),

        );
            
        //CENTRAL DE NOTIFICAÇÕES
        $contador_notificacoes = 0;
        if ($this->home_model->get_contas_receber_vencidas()) {
            
            $data['contas_receber_vencidas'] = TRUE;
            $contador_notificacoes ++;
        } 
        if ($this->home_model->get_contas_pagar_vencidas()) {
            
            $data['contas_pagar_vencidas'] = TRUE;
            $contador_notificacoes ++;
        } 
        if ($this->home_model->get_contas_pagar_vencem_hoje()) {
            
            $data['contas_pagar_vence_hoje'] = TRUE;
            $contador_notificacoes ++;
        }
        if ($this->home_model->get_contas_receber_vencem_hoje()) {
            
            $data['contas_receber_vence_hoje'] = TRUE;
            $contador_notificacoes ++;
        }
        if ($this->home_model->get_usuarios_desativados()) {
            
            $data['usuarios_desativados'] = TRUE;
            $contador_notificacoes ++;
        }
        if ($this->home_model->get_produtos_sem_estoque()) {
            
            $data['produto_sem_estoque'] = TRUE;
            $contador_notificacoes ++;
        }
        if ($this->home_model->get_reclamacoes_pendentes()) {
            
            $data['reclama_pendente'] = TRUE;
            $contador_notificacoes ++;
        }
        if ($this->ion_auth->is_admin()) {
           if ($this->home_model->get_tickets_pendentes()) {
            
                $data['ticket_pendente'] = TRUE;
                $contador_notificacoes ++;
            } 
        }
        
        
        $data['contador_notificacoes'] = $contador_notificacoes;

            // Carrega a view de editar parceiros
           $this->load->view('layout/header', $data);
           $this->load->view('parceiros/add');
           $this->load->view('layout/footer');

        }        

	}
    
    public function edit($parceiro_id = NULL) {
        
        if (!$parceiro_id || !$this->core_model->get_by_id('parceiros', array('parceiro_id' => $parceiro_id))) {            
            $this->session->set_flashdata('error', 'Autorizado não encontrado!');
            redirect('parceiros');
        } else {
            
            $this->form_validation->set_rules('parceiro_tipo', 'tipo', 'trim|required|exact_length[1]');
            $this->form_validation->set_rules('parceiro_nome', 'nome', 'trim|required|min_length[4]|max_length[45]');
            $this->form_validation->set_rules('parceiro_sobrenome', 'sobrenome', 'trim|required|min_length[4]|max_length[150]');
            $this->form_validation->set_rules('parceiro_data_nascimento', 'data de nascimento', 'required');
            $parceiro_pessoa = $this->input->post('parceiro_pessoa');
            if ($parceiro_pessoa == 1) {
                $this->form_validation->set_rules('parceiro_cpf', 'CPF', 'trim|required|min_length[14]|max_length[14]|callback_valida_cpf');
            } else {
                $this->form_validation->set_rules('parceiro_cnpj', 'CNPJ', 'trim|required|min_length[18]|max_length[18]|callback_valida_cnpj');
            }
            $this->form_validation->set_rules('parceiro_rg_ie', 'RG/IE', 'trim|max_length[20]|callback_check_rg_ie');
            $this->form_validation->set_rules('parceiro_email', 'e-mail', 'trim|required|valid_email|max_length[50]|callback_check_email');            
            if ($this->input->post('parceiro_telefone')) {
                $this->form_validation->set_rules('parceiro_telefone', 'telefone fixo', 'trim|max_length[14]|callback_check_telefone');
            }
            if ($this->input->post('parceiro_celular')) {
                $this->form_validation->set_rules('parceiro_celular', 'celular', 'trim|max_length[15]|callback_check_celular');
            }
            $this->form_validation->set_rules('parceiro_responsavel', 'responsável', 'trim|required|min_length[4]|max_length[250]');
            $this->form_validation->set_rules('parceiro_cep', 'CEP', 'trim|required|max_length[10]');
            $this->form_validation->set_rules('parceiro_endereco', 'endereço', 'trim|required|max_length[155]');
            $this->form_validation->set_rules('parceiro_numero_endereco', 'número', 'trim|max_length[10]');
            $this->form_validation->set_rules('parceiro_bairro', 'bairro', 'trim|required|max_length[45]');
            $this->form_validation->set_rules('parceiro_complemento', 'complemento', 'trim|max_length[145]');
            $this->form_validation->set_rules('parceiro_cidade', 'cidade', 'trim|required|max_length[50]');
            $this->form_validation->set_rules('parceiro_estado', 'estado', 'trim|required|exact_length[2]');
            $this->form_validation->set_rules('parceiro_obs', 'observação', 'max_length[500]');
            $this->form_validation->set_rules('parceiro_user', 'Usuário', 'required|min_length[3]|callback_check_user');
            $this->form_validation->set_rules('parceiro_senha', 'Senha', 'min_length[5]');
            $this->form_validation->set_rules('parceiro_senha_repete', 'Confirmar Senha', 'matches[parceiro_senha]');
            
            if ($this->form_validation->run()) { 
                
                $parceiro_ativo = $this->input->post('parceiro_ativo');
                if ($this->db->table_exists('contas_receber')) {
                    if ($parceiro_ativo == 0 && $this->core_model->get_by_id('contas_receber', array('conta_receber_parceiro_id' => $parceiro_id, 'conta_receber_status' => 0))) {
                        $this->session->set_flashdata('info', 'Este parceiro não pode ser desabilitado. (Existe pendências em <b>Contas a Receber</b>)');
                        redirect('parceiros');
                    }
                }
                
                $data = elements(

                    array(
                        'parceiro_pessoa',
                        'parceiro_tipo',
                        'parceiro_nome',
                        'parceiro_sobrenome',
                        'parceiro_data_nascimento',
                        'parceiro_rg_ie',
                        'parceiro_email',
                        'parceiro_telefone',
                        'parceiro_celular',
                        'parceiro_responsavel',
                        'parceiro_cep',
                        'parceiro_endereco',
                        'parceiro_numero_endereco',
                        'parceiro_bairro',
                        'parceiro_complemento',
                        'parceiro_cidade',
                        'parceiro_estado',
                        'parceiro_ativo',
                        'parceiro_obs',
                        'parceiro_user',
                    ), $this->input->post()

            );
                
            if ($parceiro_pessoa == 1) {
                $data['parceiro_cpf_cnpj'] = $this->input->post('parceiro_cpf');
            } else {
                $data['parceiro_cpf_cnpj'] = $this->input->post('parceiro_cnpj');
            }
            $data['parceiro_senha'] = sha1($this->input->post('parceiro_senha'));
            
            // Colocar todo texto em maiúsculo
        	// $data['parceiro_estado'] = strtoupper($this->input->post('parceiro_estado'));
            
            // Limpar dados maliciosos
            $data = html_escape($data);
            $password = $this->input->post('parceiro_senha');
            if (!$password) { 
                unset($data['parceiro_senha']);
            }
            
            $this->core_model->update('parceiros', $data, array('parceiro_id' => $parceiro_id));
            
            redirect('parceiros');
            
            } else {
                
                // Erro de validação
                $data = array(
            
                'titulo' => 'Atualizar parceiro',

                'scripts' => array (
                    'vendors/mask/jquery_3.2.1.min.js',
                    'vendors/mask/jquery.maskedinput.min.js',
                ),
                    
                // Home
                'soma_vendas' => $this->home_model->get_sum_vendas(),
                'soma_servicos' => $this->home_model->get_sum_ordem_servicos(),
                'soma_receber' => $this->home_model->get_sum_receber(),
                'soma_pagar' => $this->home_model->get_sum_pagar(),
                'soma_produtos' => $this->home_model->get_produtos_quantidade(),
                'top_produtos' => $this->home_model->get_produtos_mais_vendidos(),
                'top_servicos' => $this->home_model->get_servicos_mais_vendidos(), 
				'avisos_home' => $this->home_model->get_avisos_home(),

                'parceiro' => $this->core_model->get_by_id('parceiros', array('parceiro_id' => $parceiro_id)),

            );
                
            //CENTRAL DE NOTIFICAÇÕES
            $contador_notificacoes = 0;
            if ($this->home_model->get_contas_receber_vencidas()) {

                $data['contas_receber_vencidas'] = TRUE;
                $contador_notificacoes ++;
            } 
            if ($this->home_model->get_contas_pagar_vencidas()) {

                $data['contas_pagar_vencidas'] = TRUE;
                $contador_notificacoes ++;
            } 
            if ($this->home_model->get_contas_pagar_vencem_hoje()) {

                $data['contas_pagar_vence_hoje'] = TRUE;
                $contador_notificacoes ++;
            }
            if ($this->home_model->get_contas_receber_vencem_hoje()) {

                $data['contas_receber_vence_hoje'] = TRUE;
                $contador_notificacoes ++;
            }
            if ($this->home_model->get_usuarios_desativados()) {

                $data['usuarios_desativados'] = TRUE;
                $contador_notificacoes ++;
            }
            if ($this->home_model->get_produtos_sem_estoque()) {

                $data['produto_sem_estoque'] = TRUE;
                $contador_notificacoes ++;
            }
            if ($this->home_model->get_reclamacoes_pendentes()) {

                $data['reclama_pendente'] = TRUE;
                $contador_notificacoes ++;
            }
            if ($this->ion_auth->is_admin()) {
               if ($this->home_model->get_tickets_pendentes()) {

                    $data['ticket_pendente'] = TRUE;
                    $contador_notificacoes ++;
                } 
            }


            $data['contador_notificacoes'] = $contador_notificacoes;

                // Carrega a view de editar parceiros
               $this->load->view('layout/header', $data);
               $this->load->view('parceiros/edit');
               $this->load->view('layout/footer');
                
            }
            
        }
        
        
    }
    
    public function del($parceiro_id = NULL) {

        if (!$parceiro_id || !$this->core_model->get_by_id('parceiros', array('parceiro_id' => $parceiro_id))) {
            $this->session->set_flashdata('error', 'O parceiro não foi encontrado');
            redirect('parceiros');
        } else {
            $this->core_model->delete('parceiros', array('parceiro_id' => $parceiro_id));
            redirect('parceiros');
        }

    }
    
    public function check_rg_ie($parceiro_rg_ie) {
        if ($this->input->post('parceiro_rg_ie') != NULL) {
            $parceiro_id = $this->input->post('parceiro_id');
        
            if ($this->core_model->get_by_id('parceiros', array('parceiro_rg_ie' => $parceiro_rg_ie, 'parceiro_id !=' => $parceiro_id))) {
                $this->form_validation->set_message('check_rg_ie', 'Este documento já está cadatrado na base de dados');
                return FALSE;
            } else {
                return TRUE;
            }
        }
    }
    
    public function check_email($parceiro_email) {
        
        $parceiro_id = $this->input->post('parceiro_id');
        
        if ($this->core_model->get_by_id('parceiros', array('parceiro_email' => $parceiro_email, 'parceiro_id !=' => $parceiro_id))) {
            $this->form_validation->set_message('check_email', 'Este e-mail já está cadatrado na base de dados');
            return FALSE;
        } else {
            return TRUE;
        }
        
    }
    
    public function check_user($parceiro_user) {
        
        $parceiro_id = $this->input->post('parceiro_id');
        
        if ($this->core_model->get_by_id('parceiros', array('parceiro_user' => $parceiro_user, 'parceiro_id !=' => $parceiro_id))) {
            $this->form_validation->set_message('check_user', 'Este usuário já está cadatrado na base de dados');
            return FALSE;
        } else {
            return TRUE;
        }
        
    }
    
    public function check_telefone($parceiro_telefone) {
        
        $parceiro_id = $this->input->post('parceiro_id');
        
        if ($this->core_model->get_by_id('parceiros', array('parceiro_telefone' => $parceiro_telefone, 'parceiro_id !=' => $parceiro_id))) {
            $this->form_validation->set_message('check_telefone', 'Este telefone já está cadatrado na base de dados');
            return FALSE;
        } else {
            return TRUE;
        }
        
    }
    
    public function check_celular($parceiro_celular) {
        
        $parceiro_id = $this->input->post('parceiro_id');
        
        if ($this->core_model->get_by_id('parceiros', array('parceiro_celular' => $parceiro_celular, 'parceiro_id !=' => $parceiro_id))) {
            $this->form_validation->set_message('check_celular', 'Este celular já está cadatrado na base de dados');
            return FALSE;
        } else {
            return TRUE;
        }
        
    }
    
    public function valida_cnpj($cnpj) {

        // Verifica se um número foi informado
        if (empty($cnpj)) {
            $this->form_validation->set_message('valida_cnpj', 'Por favor digite um CNPJ válido');
            return false;
        }

        if ($this->input->post('parceiro_id')) {

            $parceiro_id = $this->input->post('parceiro_id');

            if ($this->core_model->get_by_id('parceiros', array('parceiro_id !=' => $parceiro_id, 'parceiro_cpf_cnpj' => $cnpj))) {
                $this->form_validation->set_message('valida_cnpj', 'Esse CNPJ já existe');
                return FALSE;
            }
        }

        // Elimina possivel mascara
        $cnpj = preg_replace("/[^0-9]/", "", $cnpj);
        $cnpj = str_pad($cnpj, 14, '0', STR_PAD_LEFT);


        // Verifica se o numero de digitos informados é igual a 11 
        if (strlen($cnpj) != 14) {
            $this->form_validation->set_message('valida_cnpj', 'Por favor digite um CNPJ válido');
            return false;
        }

        // Verifica se nenhuma das sequências invalidas abaixo 
        // foi digitada. Caso afirmativo, retorna falso
        else if ($cnpj == '00000000000000' ||
                $cnpj == '11111111111111' ||
                $cnpj == '22222222222222' ||
                $cnpj == '33333333333333' ||
                $cnpj == '44444444444444' ||
                $cnpj == '55555555555555' ||
                $cnpj == '66666666666666' ||
                $cnpj == '77777777777777' ||
                $cnpj == '88888888888888' ||
                $cnpj == '99999999999999') {
            $this->form_validation->set_message('valida_cnpj', 'Por favor digite um CNPJ válido');
            return false;

            // Calcula os digitos verificadores para verificar se o
            // CPF é válido
        } else {

            $j = 5;
            $k = 6;
            $soma1 = "";
            $soma2 = "";

            for ($i = 0; $i < 13; $i++) {

                $j = $j == 1 ? 9 : $j;
                $k = $k == 1 ? 9 : $k;

                //$soma2 += ($cnpj{$i} * $k);

                //$soma2 = intval($soma2) + ($cnpj{$i} * $k); //Para PHP com versão < 7.4
                $soma2 = intval($soma2) + ($cnpj[$i] * $k); //Para PHP com versão > 7.4

                if ($i < 12) {
                    //$soma1 = intval($soma1) + ($cnpj{$i} * $j); //Para PHP com versão < 7.4
                    $soma1 = intval($soma1) + ($cnpj[$i] * $j); //Para PHP com versão > 7.4
                }

                $k--;
                $j--;
            }

            $digito1 = $soma1 % 11 < 2 ? 0 : 11 - $soma1 % 11;
            $digito2 = $soma2 % 11 < 2 ? 0 : 11 - $soma2 % 11;

            if (!($cnpj[12] == $digito1) and ($cnpj[13] == $digito2)) {
                $this->form_validation->set_message('valida_cnpj', 'Por favor digite um CNPJ válido');
                return false;
            } else {
                return true;
            }
        }
    }
    
    public function valida_cpf($cpf) {

        if ($this->input->post('parceiro_id')) {

            $parceiro_id = $this->input->post('parceiro_id');

            if ($this->core_model->get_by_id('parceiros', array('parceiro_id !=' => $parceiro_id, 'parceiro_cpf_cnpj' => $cpf))) {
                $this->form_validation->set_message('valida_cpf', 'Este CPF já existe');
                return FALSE;
            }
        }

        $cpf = str_pad(preg_replace('/[^0-9]/', '', $cpf), 11, '0', STR_PAD_LEFT);
        // Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
        if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999') {

            $this->form_validation->set_message('valida_cpf', 'Por favor digite um CPF válido');
            return FALSE;
        } else {
            // Calcula os números para verificar se o CPF é verdadeiro
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {

                    $d += $cpf[$c] * (($t + 1) - $c); 
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf[$c] != $d) {
                    $this->form_validation->set_message('valida_cpf', 'Por favor digite um CPF válido');
                    return FALSE;
                }
            }
            return TRUE;
        }
    }
    
}
