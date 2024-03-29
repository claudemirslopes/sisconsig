<?php

defined('BASEPATH') OR exit ('Ação não permitida');

class Base_conhecimento extends CI_Controller{
    
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
            
            'titulo' => 'Base de Conhecimento',
            
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
            
            'kbs' => $this->core_model->get_all('kbs'),
            
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
        
         // Carrega a view de kbs
        $this->load->view('layout/header', $data);
        $this->load->view('base_conhecimento/index');
        $this->load->view('layout/footer');
        
    }
    
    public function add() {
        
        $this->form_validation->set_rules('kb_titulo', 'título', 'trim|required|min_length[3]|max_length[200]');
        $this->form_validation->set_rules('kb_resumo', 'resumo', 'trim|required|min_length[3]|max_length[500]');
        $this->form_validation->set_rules('kb_texto', 'texto', 'trim|required|min_length[5]');

        if ($this->form_validation->run()) { 
            // Teste para ver se valida
//                exit('Validado');

            $data = elements(

                array(
                    'kb_titulo',
                    'kb_resumo',
                    'kb_texto',
                    'kb_tipo',
                    'kb_ativo',
                ), $this->input->post()

        );

        // Colocar todo texto em maiúsculo
        // $data['kb_nome_completo'] = strtoupper($this->input->post('kb_nome_completo'));

        // Limpar dados maliciosos
		// $data = html_escape($data);

        $this->core_model->insert('kbs', $data);

        redirect('base_conhecimento');

        } else {

            // Erro de validação
            $data = array(

            'titulo' => 'Publicar KB',
                
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

            // Carrega a view de editar kbs
           $this->load->view('layout/header', $data);
           $this->load->view('base_conhecimento/add');
           $this->load->view('layout/footer');

        }        

    }
    
    public function edit($kb_id = NULL) {
        
        if (!$kb_id || !$this->core_model->get_by_id('kbs', array('kb_id' => $kb_id))) {            
            $this->session->set_flashdata('error', 'Aviso não encontrado!');
            redirect('kbs');
        } else {
            
            
            $this->form_validation->set_rules('kb_titulo', 'título', 'trim|required|min_length[3]|max_length[200]');
            $this->form_validation->set_rules('kb_resumo', 'resumo', 'trim|required|min_length[3]|max_length[500]');
            $this->form_validation->set_rules('kb_texto', 'texto', 'trim|required|min_length[5]');
            
            if ($this->form_validation->run()) { 
                
                $data = elements(

                    array(
                        'kb_titulo',
                        'kb_resumo',
                        'kb_texto',
                        'kb_tipo',
                        'kb_ativo',
                    ), $this->input->post()

            );
            
            // Colocar todo texto em maiúsculo
			// $data['kb_estado'] = strtoupper($this->input->post('kb_estado'));
            
            // Limpar dados maliciosos
			// $data = html_escape($data);
            
            $this->core_model->update('kbs', $data, array('kb_id' => $kb_id));
            
            redirect('base_conhecimento');
            
            } else {
                
                // Erro de validação
                $data = array(
            
                'titulo' => 'Editar KB',
                    
                // Home
                'soma_vendas' => $this->home_model->get_sum_vendas(),
                'soma_servicos' => $this->home_model->get_sum_ordem_servicos(),
                'soma_receber' => $this->home_model->get_sum_receber(),
                'soma_pagar' => $this->home_model->get_sum_pagar(),
                'soma_produtos' => $this->home_model->get_produtos_quantidade(),
                'top_produtos' => $this->home_model->get_produtos_mais_vendidos(),
                'top_servicos' => $this->home_model->get_servicos_mais_vendidos(), 
				'avisos_home' => $this->home_model->get_avisos_home(),

                'kb' => $this->core_model->get_by_id('kbs', array('kb_id' => $kb_id)),

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

                // Carrega a view de editar kbs
               $this->load->view('layout/header', $data);
               $this->load->view('base_conhecimento/edit');
               $this->load->view('layout/footer');
                
            }
            
        }
        
        
    }
    
    public function view($kb_id = NULL) {
        
        if (!$kb_id || !$this->core_model->get_by_id('kbs', array('kb_id' => $kb_id))) {            
            $this->session->set_flashdata('error', 'Aviso não encontrado!');
            redirect('kbs');
        } else {
            
            
            $this->form_validation->set_rules('kb_titulo', 'título', 'trim|required|min_length[3]|max_length[200]');
            $this->form_validation->set_rules('kb_resumo', 'resumo', 'trim|required|min_length[3]|max_length[500]');
            $this->form_validation->set_rules('kb_texto', 'texto', 'trim|required|min_length[5]');
            
            if ($this->form_validation->run()) { 
                
                $data = elements(

                    array(
                        'kb_titulo',
                        'kb_resumo',
                        'kb_texto',
                        'kb_tipo',
                        'kb_ativo',
                    ), $this->input->post()

            );
            
            // Colocar todo texto em maiúsculo
			// $data['kb_estado'] = strtoupper($this->input->post('kb_estado'));
            
            // Limpar dados maliciosos
			// $data = html_escape($data);
            
            $this->core_model->update('kbs', $data, array('kb_id' => $kb_id));
            
            redirect('base_conhecimento');
            
            } else {
                
                // Erro de validação
                $data = array(
            
                'titulo' => 'KB Publicado',
                    
                // Home
                'soma_vendas' => $this->home_model->get_sum_vendas(),
                'soma_servicos' => $this->home_model->get_sum_ordem_servicos(),
                'soma_receber' => $this->home_model->get_sum_receber(),
                'soma_pagar' => $this->home_model->get_sum_pagar(),
                'soma_produtos' => $this->home_model->get_produtos_quantidade(),
                'top_produtos' => $this->home_model->get_produtos_mais_vendidos(),
                'top_servicos' => $this->home_model->get_servicos_mais_vendidos(), 
				'avisos_home' => $this->home_model->get_avisos_home(),

                'kb' => $this->core_model->get_by_id('kbs', array('kb_id' => $kb_id)),

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

                // Carrega a view de editar kbs
               $this->load->view('layout/header', $data);
               $this->load->view('base_conhecimento/view');
               $this->load->view('layout/footer');
                
            }
            
        }
        
        
    }
    
}
