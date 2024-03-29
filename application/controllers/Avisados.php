<?php

defined('BASEPATH') OR exit ('Ação não permitida');

class Avisados extends CI_Controller{
    
    public function __construct() {
        parent::__construct(); 
        
        // Definir se tem sessão aberta
        if (!$this->ion_auth->logged_in()){
            $this->session->set_flashdata('info', 'Sua sessão expirou, acesse novamente');
            redirect('login');
        }
        
        $this->load->model('home_model');
        
    }
    
    public function index() {
        
        $data = array(
            
            'titulo' => 'Avisos',
            
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
            
            'avisados' => $this->core_model->get_all('avisados'),
            
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
        
         // Carrega a view de avisados
        $this->load->view('layout/header', $data);
        $this->load->view('avisados/index');
        $this->load->view('layout/footer');
        
    }
    
    public function add() {
        
        $this->form_validation->set_rules('avisado_assunto', 'assunto', 'trim|required|min_length[3]|max_length[60]');
        $this->form_validation->set_rules('avisado_mensagem', 'mensagem', 'required|min_length[10]');

        if ($this->form_validation->run()) { 
            // Teste para ver se valida
//                exit('Validado');

            $data = elements(

                array(
                    'avisado_assunto',
                    'avisado_mensagem',
                    'avisado_tipo',
                    'avisado_formato',
                    'avisado_ativa',
                ), $this->input->post()

        );

        // Colocar todo texto em maiúsculo
        // $data['avisado_nome_completo'] = strtoupper($this->input->post('avisado_nome_completo'));

        // Limpar dados maliciosos
		// $data = html_escape($data);

        $this->core_model->insert('avisados', $data);

        redirect('avisados');

        } else {

            // Erro de validação
            $data = array(

            'titulo' => 'Cadastrar Aviso',
                
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

            // Carrega a view de editar avisados
           $this->load->view('layout/header', $data);
           $this->load->view('avisados/add');
           $this->load->view('layout/footer');

        }        

    }
    
    public function edit($avisado_id = NULL) {
        
        if (!$avisado_id || !$this->core_model->get_by_id('avisados', array('avisado_id' => $avisado_id))) {            
            $this->session->set_flashdata('error', 'Aviso não encontrado!');
            redirect('avisados');
        } else {
            
            
            $this->form_validation->set_rules('avisado_assunto', 'assunto', 'trim|required|min_length[3]|max_length[60]');
            $this->form_validation->set_rules('avisado_mensagem', 'mensagem', 'required|min_length[10]');
            
            if ($this->form_validation->run()) { 
                
                $data = elements(

                    array(
                        'avisado_assunto',
                        'avisado_mensagem',
                        'avisado_tipo',
                        'avisado_formato',
                        'avisado_ativa',
                    ), $this->input->post()

            );
            
            // Colocar todo texto em maiúsculo
		    // $data['avisado_estado'] = strtoupper($this->input->post('avisado_estado'));
            
            // Limpar dados maliciosos
			// $data = html_escape($data);
            
            $this->core_model->update('avisados', $data, array('avisado_id' => $avisado_id));
            
            redirect('avisados');
            
            } else {
                
                // Erro de validação
                $data = array(
            
                'titulo' => 'Atualizar Aviso',
                    
                // Home
                'soma_vendas' => $this->home_model->get_sum_vendas(),
                'soma_servicos' => $this->home_model->get_sum_ordem_servicos(),
                'soma_receber' => $this->home_model->get_sum_receber(),
                'soma_pagar' => $this->home_model->get_sum_pagar(),
                'soma_produtos' => $this->home_model->get_produtos_quantidade(),
                'top_produtos' => $this->home_model->get_produtos_mais_vendidos(),
                'top_servicos' => $this->home_model->get_servicos_mais_vendidos(), 
				'avisos_home' => $this->home_model->get_avisos_home(),

                'avisado' => $this->core_model->get_by_id('avisados', array('avisado_id' => $avisado_id)),

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

                // Carrega a view de editar avisados
               $this->load->view('layout/header', $data);
               $this->load->view('avisados/edit');
               $this->load->view('layout/footer');
                
            }
            
        }
        
        
    }
    
    public function del($avisado_id = NULL) {

        if (!$avisado_id || !$this->core_model->get_by_id('avisados', array('avisado_id' => $avisado_id))) {
            $this->session->set_flashdata('error', 'O aviso não foi encontrado');
            redirect('avisados');
        } else {
            $this->core_model->delete('avisados', array('avisado_id' => $avisado_id));
            redirect('avisados');
        }

    }
    
}
