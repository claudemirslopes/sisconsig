<?php

defined('BASEPATH') OR exit ('Ação não permitida');

class Fornecedores extends CI_Controller{
    
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
          $this->session->set_flashdata('info', 'Você não tem permissão para acessar o módulo de <b>Fornecedores</b>');
          redirect('home');
        }
        
        $this->load->model('home_model');
        
    }
    
    public function index() {
        
        $data = array(
            
            'titulo' => 'Fornecedores',
            
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
            
            'fornecedores' => $this->core_model->get_all('fornecedores'),
            
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
        
         // Carrega a view de fornecedores
        $this->load->view('layout/header', $data);
        $this->load->view('fornecedores/index');
        $this->load->view('layout/footer');
        
    }
    
    public function add() {

        $this->form_validation->set_rules('fornecedor_razao', 'razão social', 'trim|required|min_length[4]|max_length[200]');
        $this->form_validation->set_rules('fornecedor_nome_fantasia', 'fornecedor_nome_fantasia', 'trim|required|min_length[4]|max_length[145]');
        $this->form_validation->set_rules('fornecedor_cnpj', 'CNPJ', 'trim|required|min_length[18]|max_length[18]|is_unique[fornecedores.fornecedor_cnpj]|callback_valida_cnpj');
        $this->form_validation->set_rules('fornecedor_ie', 'IE', 'trim|max_length[20]|is_unique[fornecedores.fornecedor_ie]');
        $this->form_validation->set_rules('fornecedor_email', 'e-mail', 'trim|required|valid_email|max_length[50]|is_unique[fornecedores.fornecedor_email]');
        $this->form_validation->set_rules('fornecedor_contato', 'contato', 'trim|max_length[45]');            
        $this->form_validation->set_rules('fornecedor_telefone', 'telefone fixo', 'trim|max_length[14]|is_unique[fornecedores.fornecedor_telefone]');
        $this->form_validation->set_rules('fornecedor_celular', 'celular', 'trim|max_length[15]|is_unique[fornecedores.fornecedor_celular]');
        $this->form_validation->set_rules('fornecedor_cep', 'CEP', 'trim|required|max_length[10]');
        $this->form_validation->set_rules('fornecedor_endereco', 'endereço', 'trim|required|max_length[155]');
        $this->form_validation->set_rules('fornecedor_numero_endereco', 'número', 'trim|max_length[10]');
        $this->form_validation->set_rules('fornecedor_bairro', 'bairro', 'trim|required|max_length[45]');
        $this->form_validation->set_rules('fornecedor_complemento', 'complemento', 'trim|max_length[145]');
        $this->form_validation->set_rules('fornecedor_cidade', 'cidade', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('fornecedor_estado', 'estado', 'trim|required|exact_length[2]');
        $this->form_validation->set_rules('fornecedor_obs', 'observação', 'max_length[500]');

        if ($this->form_validation->run()) { 

            $data = elements(

                array(
                    'fornecedor_razao',
                    'fornecedor_nome_fantasia',
                    'fornecedor_cnpj',
                    'fornecedor_ie',
                    'fornecedor_email',
                    'fornecedor_contato',
                    'fornecedor_telefone',
                    'fornecedor_celular',
                    'fornecedor_cep',
                    'fornecedor_endereco',
                    'fornecedor_numero_endereco',
                    'fornecedor_bairro',
                    'fornecedor_complemento',
                    'fornecedor_cidade',
                    'fornecedor_estado',
                    'fornecedor_ativo',
                    'fornecedor_obs',
                ), $this->input->post()

        );

        // Colocar todo texto em maiúsculo
		// $data['fornecedor_estado'] = strtoupper($this->input->post('fornecedor_estado'));

        // Limpar dados maliciosos
        $data = html_escape($data);

        $this->core_model->insert('fornecedores', $data);

        redirect('fornecedores');

        } else {

            // Erro de validação
            $data = array(

            'titulo' => 'Cadastrar fornecedor',

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

            // Carrega a view de editar fornecedores
           $this->load->view('layout/header', $data);
           $this->load->view('fornecedores/add');
           $this->load->view('layout/footer');

        }        

}
    
    public function edit($fornecedor_id = NULL) {
        
        if (!$fornecedor_id || !$this->core_model->get_by_id('fornecedores', array('fornecedor_id' => $fornecedor_id))) {            
            $this->session->set_flashdata('error', 'Fornecedor não encontrado!');
            redirect('fornecedores');
        } else {
            
            $this->form_validation->set_rules('fornecedor_razao', 'razão social', 'trim|required|min_length[4]|max_length[200]');
            $this->form_validation->set_rules('fornecedor_nome_fantasia', 'fornecedor_nome_fantasia', 'trim|required|min_length[4]|max_length[145]');
            $this->form_validation->set_rules('fornecedor_cnpj', 'CNPJ', 'trim|required|min_length[18]|max_length[18]|callback_valida_cnpj');
            $this->form_validation->set_rules('fornecedor_ie', 'IE', 'trim|max_length[20]|callback_check_fornecedor_ie');
            $this->form_validation->set_rules('fornecedor_email', 'e-mail', 'trim|required|valid_email|max_length[50]|callback_check_fornecedor_email');
            $this->form_validation->set_rules('fornecedor_contato', 'contato', 'trim|max_length[45]');            
            $this->form_validation->set_rules('fornecedor_telefone', 'telefone fixo', 'trim|max_length[14]|callback_check_fornecedor_telefone');
            $this->form_validation->set_rules('fornecedor_celular', 'celular', 'trim|max_length[15]|callback_check_fornecedor_celular');
            $this->form_validation->set_rules('fornecedor_cep', 'CEP', 'trim|required|max_length[10]');
            $this->form_validation->set_rules('fornecedor_endereco', 'endereço', 'trim|required|max_length[155]');
            $this->form_validation->set_rules('fornecedor_numero_endereco', 'número', 'trim|max_length[10]');
            $this->form_validation->set_rules('fornecedor_bairro', 'bairro', 'trim|required|max_length[45]');
            $this->form_validation->set_rules('fornecedor_complemento', 'complemento', 'trim|max_length[145]');
            $this->form_validation->set_rules('fornecedor_cidade', 'cidade', 'trim|required|max_length[50]');
            $this->form_validation->set_rules('fornecedor_estado', 'estado', 'trim|required|exact_length[2]');
            $this->form_validation->set_rules('fornecedor_obs', 'observação', 'max_length[500]');
            
            if ($this->form_validation->run()) { 
                
                //Impedir que a fornecedor que está em uso seja desabilitada
                $fornecedor_ativo = $this->input->post('fornecedor_ativo');
                if ($this->db->table_exists('produtos')) {
                    if ($fornecedor_ativo == 0 && $this->core_model->get_by_id('produtos', array('produto_fornecedor_id' => $fornecedor_id, 'produto_ativo' => 1))) {
                        $this->session->set_flashdata('info', 'Esta fornecedor não pode ser desabilitado, pois está sendo usado na tabela <b>produtos</b>');
                        redirect('fornecedores');
                    }
                }
                
                $data = elements(

                    array(
                        'fornecedor_razao',
                        'fornecedor_nome_fantasia',
                        'fornecedor_cnpj',
                        'fornecedor_ie',
                        'fornecedor_email',
                        'fornecedor_contato',
                        'fornecedor_telefone',
                        'fornecedor_celular',
                        'fornecedor_cep',
                        'fornecedor_endereco',
                        'fornecedor_numero_endereco',
                        'fornecedor_bairro',
                        'fornecedor_complemento',
                        'fornecedor_cidade',
                        'fornecedor_estado',
                        'fornecedor_ativo',
                        'fornecedor_obs',
                    ), $this->input->post()

            );
            
            // Colocar todo texto em maiúsculo
			// $data['fornecedor_estado'] = strtoupper($this->input->post('fornecedor_estado'));
            
            // Limpar dados maliciosos
            $data = html_escape($data);
            
            $this->core_model->update('fornecedores', $data, array('fornecedor_id' => $fornecedor_id));
            
            redirect('fornecedores');
            
            } else {
                
                // Erro de validação
                $data = array(
            
                'titulo' => 'Atualizar fornecedor',

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

                'fornecedor' => $this->core_model->get_by_id('fornecedores', array('fornecedor_id' => $fornecedor_id)),

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

                // Carrega a view de editar fornecedores
               $this->load->view('layout/header', $data);
               $this->load->view('fornecedores/edit');
               $this->load->view('layout/footer');
                
            }
            
        }
        
        
    }
    
    public function del($fornecedor_id = NULL) {

        if (!$fornecedor_id || !$this->core_model->get_by_id('fornecedores', array('fornecedor_id' => $fornecedor_id))) {
            $this->session->set_flashdata('error', 'O fornecedor não foi encontrado');
            redirect('fornecedores');
        } else {
            $this->core_model->delete('fornecedores', array('fornecedor_id' => $fornecedor_id));
            redirect('fornecedores');
        }

    }
    
    public function check_fornecedor_ie($fornecedor_ie) {
        
        $fornecedor_id = $this->input->post('fornecedor_id');
        
        if ($this->core_model->get_by_id('fornecedores', array('fornecedor_ie' => $fornecedor_ie, 'fornecedor_id !=' => $fornecedor_id))) {
            $this->form_validation->set_message('check_fornecedor_ie', 'Este documento já está cadatrado na base de dados');
            return FALSE;
        } else {
            return TRUE;
        }
        
    }
    
    public function check_fornecedor_email($fornecedor_email) {
        
        $fornecedor_id = $this->input->post('fornecedor_id');
        
        if ($this->core_model->get_by_id('fornecedores', array('fornecedor_email' => $fornecedor_email, 'fornecedor_id !=' => $fornecedor_id))) {
            $this->form_validation->set_message('check_fornecedor_email', 'Este e-mail já está cadatrado na base de dados');
            return FALSE;
        } else {
            return TRUE;
        }
        
    }
    
    public function check_fornecedor_telefone($fornecedor_telefone) {
        
        $fornecedor_id = $this->input->post('fornecedor_id');
        
        if ($this->core_model->get_by_id('fornecedores', array('fornecedor_telefone' => $fornecedor_telefone, 'fornecedor_id !=' => $fornecedor_id))) {
            $this->form_validation->set_message('check_fornecedor_telefone', 'Este telefone já está cadatrado na base de dados');
            return FALSE;
        } else {
            return TRUE;
        }
        
    }
    
    public function check_fornecedor_celular($fornecedor_celular) {
        
        $fornecedor_id = $this->input->post('fornecedor_id');
        
        if ($this->core_model->get_by_id('fornecedores', array('fornecedor_celular' => $fornecedor_celular, 'fornecedor_id !=' => $fornecedor_id))) {
            $this->form_validation->set_message('check_fornecedor_celular', 'Este celular já está cadatrado na base de dados');
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

        if ($this->input->post('fornecedor_id')) {

            $fornecedor_id = $this->input->post('fornecedor_id');

            if ($this->core_model->get_by_id('fornecedores', array('fornecedor_id !=' => $fornecedor_id, 'fornecedor_cnpj' => $cnpj))) {
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

            if (!($cnpj[12] == $digito1) and ( $cnpj[13] == $digito2)) {
                $this->form_validation->set_message('valida_cnpj', 'Por favor digite um CNPJ válido');
                return false;
            } else {
                return true;
            }
        }
    }
    
//    public function getDados() {
//        
//        $cnpj = $this->input->post('fornecedor_cnpj');
//        
//        // Criar uma fonte de CURL
//        $ch = curl_init();
//        
//        // Setar a URL
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        
//        // Conteúdo de saída de string
//        $output = curl_exec($ch);
//        
//        // Fechar fonte do curl para liberar fontes do sistema
//        curl_close($ch);
//        
//        $data['dados'] = json_decode($output, TRUE);
//        
//        // Carrega a view de fornecedores
//        $this->load->view('layout/header', $data);
//        $this->load->view('fornecedores/index');
//        $this->load->view('layout/footer');
//        
//    }
    
}
