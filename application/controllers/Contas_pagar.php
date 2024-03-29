<?php

defined('BASEPATH') OR exit ('Ação não permitida');

class Contas_pagar extends CI_Controller{
    
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
          $this->session->set_flashdata('info', 'Você não tem permissão para acessar o módulo <b>Financeiro</b>');
          redirect('home');
        }
        
        $this->load->model('financeiro_model');
        $this->load->model('home_model');
        
    }
    
    public function index() {
        
        $data = array(
            
            'titulo' => 'Contas a Pagar',
            
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
            
            'contas_pagar' => $this->financeiro_model->get_all_pagar(),
            
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
        
         // Carrega a view de contas_pagar
        $this->load->view('layout/header', $data);
        $this->load->view('contas_pagar/index');
        $this->load->view('layout/footer');
        
    }
    
    public function add() {
        
        // formn_validation
            $this->form_validation->set_rules('conta_pagar_parceiro_id', 'parceiro', 'trim|required|max_length[15]');
            $this->form_validation->set_rules('conta_pagar_data_vencimento', 'data de vencimento', 'trim|required');
            $this->form_validation->set_rules('conta_pagar_valor', 'valor', 'trim|required');
            $this->form_validation->set_rules('conta_pagar_obs', 'observação', 'max_length[100]');
            
            if ($this->form_validation->run()) { 
                
                $data = elements(

                    array(
                        'conta_pagar_parceiro_id',
                        'conta_pagar_data_vencimento',
                        'conta_pagar_valor',
                        'conta_pagar_status',
                        'conta_pagar_obs',
                    ), $this->input->post()

            );
                
            $conta_pagar_status = $this->input->post('conta_pagar_status');
            
            if ($conta_pagar_status == 1) {
                $data['conta_pagar_data_pagamento'] = date('Y-m-d H:i:s');
            }
            
            // Limpar dados maliciosos
            $data = html_escape($data);
            
            $this->core_model->insert('contas_pagar', $data);
            
            redirect('contas_pagar');
            
            } else {
            
            $data = array(
            
                'titulo' => 'Cadastrar Conta a Pagar',
                
                'styles' => array(
                    'vendors/select2/select2.min.css',
                    'vendors/autocomplete/jquery-ui.css',
                    'vendors/autocomplete/estilo.css',
                ),

                'scripts' => array (
                    'vendors/autocomplete/jquery-migrate.js', //Nesta ordem
                    'vendors/calcx/jquery-calx-sample-2.2.8.min.js',
                    'vendors/calcx/os.js',
                    'vendors/select2/select2.min.js',
                    'vendors/select2/app.js',
                    'vendors/autocomplete/jquery-ui.js',
                    'vendors/mask/jquery.mask.min.js',
                    'vendors/mask/app.js',
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

                'parceiros' => $this->core_model->get_all('parceiros', array('parceiro_ativo' => 1)),

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

                // Carrega a view de editar contas_pagar
               $this->load->view('layout/header', $data);
               $this->load->view('contas_pagar/add');
               $this->load->view('layout/footer');
               
            }
                
    }
    
    public function edit($conta_pagar_id = NULL) {
        
        if (!$conta_pagar_id || !$this->core_model->get_by_id('contas_pagar', array('conta_pagar_id' => $conta_pagar_id))) {            
            $this->session->set_flashdata('error', 'Conta a pagar não encontrada!');
            redirect('contas_pagar');
        } else {
            
            // formn_validation
            $this->form_validation->set_rules('conta_pagar_parceiro_id', 'parceiro', 'trim|required|max_length[15]');
            $this->form_validation->set_rules('conta_pagar_data_vencimento', 'data de vencimento', 'trim|required');
            $this->form_validation->set_rules('conta_pagar_valor', 'valor', 'trim|required');
            $this->form_validation->set_rules('conta_pagar_obs', 'observação', 'max_length[100]');
            
            if ($this->form_validation->run()) { 
                
                $data = elements(

                    array(
                        'conta_pagar_parceiro_id',
                        'conta_pagar_data_vencimento',
                        'conta_pagar_valor',
                        'conta_pagar_status',
                        'conta_pagar_obs',
                    ), $this->input->post()

            );
                
            $conta_pagar_status = $this->input->post('conta_pagar_status');
            
            if ($conta_pagar_status == 1) {
                $data['conta_pagar_data_pagamento'] = date('Y-m-d H:i:s');
            }
            
            // Limpar dados maliciosos
            $data = html_escape($data);
            $this->core_model->update('contas_pagar', $data, array('conta_pagar_id' => $conta_pagar_id));
            
            redirect('contas_pagar');
            
            } else {
            
            $data = array(
            
                'titulo' => 'Atualizar Conta a Pagar',
                
                'styles' => array(
                    'vendors/select2/select2.min.css',
                    'vendors/autocomplete/jquery-ui.css',
                    'vendors/autocomplete/estilos.css',
                ),

                'scripts' => array (
                    'vendors/autocomplete/jquery-migrate.js', //Nesta ordem
                    'vendors/calcx/jquery-calx-sample-2.2.8.min.js',
                    'vendors/calcx/os.js',
                    'vendors/select2/select2.min.js',
                    'vendors/select2/app.js',
                    'vendors/autocomplete/jquery-ui.js',
                    'vendors/mask/jquery.mask.min.js',
                    'vendors/mask/app.js',
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

                'conta_pagar' => $this->core_model->get_by_id('contas_pagar', array('conta_pagar_id' => $conta_pagar_id)),
                'parceiros' => $this->core_model->get_all('parceiros'),

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

                // Carrega a view de editar contas_pagar
               $this->load->view('layout/header', $data);
               $this->load->view('contas_pagar/edit');
               $this->load->view('layout/footer');
               
            }
            
        }
                
    }
    
    public function del($conta_pagar_id = NULL) {

        if (!$conta_pagar_id || !$this->core_model->get_by_id('contas_pagar', array('conta_pagar_id' => $conta_pagar_id))) {
            $this->session->set_flashdata('error', 'A conta não foi encontrada');
            redirect('contas_pagar');
        } 
        if ($this->core_model->get_by_id('contas_pagar', array('conta_pagar_id' => $conta_pagar_id, 'conta_pagar_status' => 0))) {
            $this->session->set_flashdata('info', 'Esta conta não pode ser excluída, pois ainda está em aberto');
            redirect('contas_pagar');
        } 
        
            $this->core_model->delete('contas_pagar', array('conta_pagar_id' => $conta_pagar_id));
            redirect('contas_pagar');

    }
    
}
