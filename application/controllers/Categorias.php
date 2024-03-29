<?php

defined('BASEPATH') OR exit ('Ação não permitida');

class Categorias extends CI_Controller{
    
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
            
            'titulo' => 'Categorias',
            
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
            
            'categorias' => $this->core_model->get_all('categorias'),
            
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
        
         // Carrega a view de categorias
        $this->load->view('layout/header', $data);
        $this->load->view('categorias/index');
        $this->load->view('layout/footer');
        
    }
    
    public function add() {
        
        $this->form_validation->set_rules('categoria_nome', 'categoria', 'trim|required|min_length[4]|max_length[45]|is_unique[categorias.categoria_nome]');

        if ($this->form_validation->run()) { 

            $data = elements(

                array(
                    'categoria_nome',
                    'categoria_ativa',
                ), $this->input->post()

        );

        // Colocar todo texto em maiúsculo
        // $data['categoria_nome_completo'] = strtoupper($this->input->post('categoria_nome_completo'));

        // Limpar dados maliciosos
        $data = html_escape($data);

        $this->core_model->insert('categorias', $data);

        redirect('categorias');

        } else {

            // Erro de validação
            $data = array(

            'titulo' => 'Cadastrar categoria',
                
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

            // Carrega a view de editar categorias
           $this->load->view('layout/header', $data);
           $this->load->view('categorias/add');
           $this->load->view('layout/footer');

        }        

    }
    
    public function edit($categoria_id = NULL) {
        
        if (!$categoria_id || !$this->core_model->get_by_id('categorias', array('categoria_id' => $categoria_id))) {            
            $this->session->set_flashdata('error', 'Categoria não encontrado!');
            redirect('categorias');
        } else {
            
            
            $this->form_validation->set_rules('categoria_nome', 'categoria', 'trim|required|min_length[4]|max_length[45]|callback_check_categoria_nome');
            
            if ($this->form_validation->run()) { 
                
                
                //Impedir que a categoria que está em uso seja desabilitada
                $categoria_ativa = $this->input->post('categoria_ativa');
                if ($this->db->table_exists('produtos')) {
                    if ($categoria_ativa == 0 && $this->core_model->get_by_id('produtos', array('produto_categoria_id' => $categoria_id, 'produto_ativo' => 1))) {
                        $this->session->set_flashdata('info', 'Esta categoria não pode ser desabilitada, pois está sendo usado na tabela <b>produtos</b>');
                        redirect('categorias');
                    }
                }
                
                $data = elements(

                    array(
                        'categoria_nome',
                        'categoria_ativa',
                    ), $this->input->post()

            );
            $data = html_escape($data);
            
            $this->core_model->update('categorias', $data, array('categoria_id' => $categoria_id));
            
            redirect('categorias');
            
            } else {
                
                // Erro de validação
                $data = array(
            
                'titulo' => 'Atualizar categoria',
                    
                // Home
                'soma_vendas' => $this->home_model->get_sum_vendas(),
                'soma_servicos' => $this->home_model->get_sum_ordem_servicos(),
                'soma_receber' => $this->home_model->get_sum_receber(),
                'soma_pagar' => $this->home_model->get_sum_pagar(),
                'soma_produtos' => $this->home_model->get_produtos_quantidade(),
                'top_produtos' => $this->home_model->get_produtos_mais_vendidos(),
                'top_servicos' => $this->home_model->get_servicos_mais_vendidos(), 
				'avisos_home' => $this->home_model->get_avisos_home(),

                'categoria' => $this->core_model->get_by_id('categorias', array('categoria_id' => $categoria_id)),

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

                // Carrega a view de editar categorias
               $this->load->view('layout/header', $data);
               $this->load->view('categorias/edit');
               $this->load->view('layout/footer');
                
            }
            
        }
        
        
    }
    
    public function del($categoria_id = NULL) {

        if (!$categoria_id || !$this->core_model->get_by_id('categorias', array('categoria_id' => $categoria_id))) {
            $this->session->set_flashdata('error', 'A categoria não foi encontrado');
            redirect('categorias');
        } else {
            $this->core_model->delete('categorias', array('categoria_id' => $categoria_id));
            redirect('categorias');
        }

    }
    
    public function check_categoria_nome($categoria_nome) {
        
        $categoria_id = $this->input->post('categoria_id');
        
        if ($this->core_model->get_by_id('categorias', array('categoria_nome' => $categoria_nome, 'categoria_id !=' => $categoria_id))) {
            $this->form_validation->set_message('check_categoria_nome', 'Esta categoria já existe em nossa base de dados');
            return FALSE;
        } else {
            return TRUE;
        }
        
    }
    
}
