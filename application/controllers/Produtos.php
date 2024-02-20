<?php

defined('BASEPATH') OR exit ('Ação não permitida');

class Produtos extends CI_Controller{
    
    public function __construct() {
        parent::__construct(); 
        
        // Definir se tem sessão aberta
        if (!$this->ion_auth->logged_in()){
            $this->session->set_flashdata('info', 'Sua sessão expirou, acesse novamente');
            redirect('login');
        }
        
        //Carrega o model diretamente no controller ao invés do autoload
        $this->load->model('produtos_model');
        $this->load->model('home_model');
        
    }
    
    public function index() {
        
        $data = array(
            
            'titulo' => 'Produtos',
            
            'styles' => array(
              'vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
              'vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css',
            ),
            
            'scripts' => array(
              'vendors/datatables.net/js/jquery.dataTables.min.js', 
              'vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
              
              'vendors/datatables.net/export/dataTables.buttons.min.js',
              'vendors/datatables.net/export/pdfmake.min.js',
              'vendors/datatables.net/export/vfs_fonts.js',
              'vendors/datatables.net/export/buttons.html5.min.js',
                
              'vendors/datatables.net-bs4/js/app.js',
              'vendors/datatables.net-buttons/js/dataTables.buttons.min.js',
              'vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js',
              'vendors/datatables.net-buttons/js/buttons.html5.min.js',
              'vendors/datatables.net-buttons/js/buttons.print.min.js',
              'vendors/datatables.net-buttons/js/buttons.colVis.min.js',
              'assets/js/init-scripts/data-table/datatables-init.js',       
            ),
            
            
            
            //Usa o model de produtos para dar JOIN nas tabelas
            'produtos' => $this->produtos_model->get_all(),
            
            // Home
            'soma_vendas' => $this->home_model->get_sum_vendas(),
            'soma_servicos' => $this->home_model->get_sum_ordem_servicos(),
            'soma_receber' => $this->home_model->get_sum_receber(),
            'soma_pagar' => $this->home_model->get_sum_pagar(),
            'soma_produtos' => $this->home_model->get_produtos_quantidade(),
            'top_produtos' => $this->home_model->get_produtos_mais_vendidos(),
            'top_servicos' => $this->home_model->get_servicos_mais_vendidos(),
            
        );
        
        //CENTRAL DE NOTIFICAÇÕES
        $contador_notificacoes = 0;
        if ($this->home_model->get_contas_receber_vencidas()) {
            
            $data['contas_receber_vencidas'] = TRUE;
            $contador_notificacoes ++;
        } 
//        else {
//            $data['contas_receber_vencidas'] = FALSE;
//        }
        if ($this->home_model->get_contas_pagar_vencidas()) {
            
            $data['contas_pagar_vencidas'] = TRUE;
            $contador_notificacoes ++;
        } 
//        else {
//            $data['contas_pagar_vencidas'] = FALSE;
//        }
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
        
//        echo '<pre>';
//        print_r($data['produtos']);
//        exit();
        
         // Carrega a view de produtos
        $this->load->view('layout/header', $data);
        $this->load->view('produtos/index');
        $this->load->view('layout/footer');
        
    }
    
    public function add() {
        
        $this->form_validation->set_rules('produto_descricao', 'descrição', 'trim|required|min_length[4]|max_length[145]|is_unique[produtos.produto_descricao]');
        $this->form_validation->set_rules('produto_unidade', 'unidade', 'trim|required|min_length[2]|max_length[10]');
        $this->form_validation->set_rules('produto_codigo_barras', 'código de barras', 'trim|max_length[45]');
        $this->form_validation->set_rules('produto_ncm', 'ncm', 'trim|max_length[15]');
        $this->form_validation->set_rules('produto_preco_custo', 'preço de custo', 'trim|required|max_length[45]');
        $this->form_validation->set_rules('produto_preco_venda', 'preço de venda', 'trim|required|max_length[45]|callback_check_produto_preco_venda');
        $this->form_validation->set_rules('produto_estoque_minimo', 'estoque mínimo', 'trim|required|greater_than_equal_to[1]');
        $this->form_validation->set_rules('produto_qtde_estoque', 'quantidade estoque', 'trim|required');
        $this->form_validation->set_rules('produto_eficiência', 'eficiência', 'min_length[1]');
        $this->form_validation->set_rules('produto_obs', 'observação', 'trim|max_length[500]');
            
           
            if ($this->form_validation->run()) {
                
                $data = elements(

                    array(
                        'produto_codigo',
                        'produto_categoria_id',
                        'produto_fornecedor_id',
                        'produto_marca_id',
                        'produto_descricao',
                        'produto_unidade',
                        'produto_codigo_barras',
                        'produto_ncm',
                        'produto_preco_custo',
                        'produto_preco_venda',
                        'produto_estoque_minimo',
                        'produto_qtde_estoque',
                        'produto_potencia',
                        'produto_eficiencia',
                        'produto_codigo_interno',
                        'produto_ativo',
                        'produto_obs',
                    ), $this->input->post()

            );
            
            // Limpar dados maliciosos
            $data = html_escape($data);
            
            $this->core_model->insert('produtos', $data);
            
            redirect('produtos');
                
            } else {
                
                //Erro de validação
                
                $data = array(
            
                'titulo' => 'Cadatrar produto',

                'scripts' => array (
                    'vendors/mask/jquery_3.2.1.min.js',
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
                    
                'produto_codigo' => $this->core_model->generate_unique_code('produtos', 'numeric', 8, 'produto_codigo'),
                'produto_codigo_interno' => $this->core_model->generate_unique_code('produtos', 'numeric', 8, 'produto_codigo_interno'),
                
                'marcas' => $this->core_model->get_all('marcas', array('marca_ativa' => 1)),
                'fornecedores' => $this->core_model->get_all('fornecedores', array('fornecedor_ativo' => 1)),
                'categorias' => $this->core_model->get_all('categorias', array('categoria_ativa' => 1)),

            );
                
            //CENTRAL DE NOTIFICAÇÕES
            $contador_notificacoes = 0;
            if ($this->home_model->get_contas_receber_vencidas()) {

                $data['contas_receber_vencidas'] = TRUE;
                $contador_notificacoes ++;
            } 
    //        else {
    //            $data['contas_receber_vencidas'] = FALSE;
    //        }
            if ($this->home_model->get_contas_pagar_vencidas()) {

                $data['contas_pagar_vencidas'] = TRUE;
                $contador_notificacoes ++;
            } 
    //        else {
    //            $data['contas_pagar_vencidas'] = FALSE;
    //        }
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
            
            // Carrega a view de editar produtos
            $this->load->view('layout/header', $data);
            $this->load->view('produtos/add');
            $this->load->view('layout/footer');
                
            }        
    }
    
    public function edit($produto_id = NULL) {
        
        if (!$produto_id || !$this->core_model->get_by_id('produtos', array('produto_id' => $produto_id))) {            
            $this->session->set_flashdata('error', 'Produto não encontrado!');
            redirect('produtos');
        } else {
            
            $this->form_validation->set_rules('produto_descricao', 'descrição', 'trim|required|min_length[4]|max_length[145]|callback_check_produto_descricao');
            $this->form_validation->set_rules('produto_unidade', 'unidade', 'trim|required|min_length[2]|max_length[10]');
            $this->form_validation->set_rules('produto_codigo_barras', 'código de barras', 'trim|max_length[45]');
            $this->form_validation->set_rules('produto_ncm', 'ncm', 'trim|max_length[15]');
            $this->form_validation->set_rules('produto_preco_custo', 'preço de custo', 'trim|required|max_length[45]');
            $this->form_validation->set_rules('produto_preco_venda', 'preço de venda', 'trim|required|max_length[45]|callback_check_produto_preco_venda');
            $this->form_validation->set_rules('produto_estoque_minimo', 'estoque mínimo', 'trim|required|greater_than_equal_to[1]');
            $this->form_validation->set_rules('produto_qtde_estoque', 'quantidade estoque', 'trim|required');
            $this->form_validation->set_rules('produto_potencia', 'potência', 'trim');
            $this->form_validation->set_rules('produto_eficiência', 'eficiência', 'min_length[1]');
            $this->form_validation->set_rules('produto_codigo_interno', 'código interno', 'trim|required');
            $this->form_validation->set_rules('produto_obs', 'observação', 'trim|max_length[500]');
            
           
            if ($this->form_validation->run()) {
                
                $data = elements(

                    array(
                        'produto_codigo',
                        'produto_categoria_id',
                        'produto_fornecedor_id',
                        'produto_marca_id',
                        'produto_descricao',
                        'produto_unidade',
                        'produto_codigo_barras',
                        'produto_ncm',
                        'produto_preco_custo',
                        'produto_preco_venda',
                        'produto_estoque_minimo',
                        'produto_qtde_estoque',
                        'produto_potencia',
                        'produto_eficiencia',
                        'produto_codigo_interno',
                        'produto_ativo',
                        'produto_obs',
                    ), $this->input->post()

            );
            
            // Colocar todo texto em maiúsculo
//            $data['produto_estado'] = strtoupper($this->input->post('produto_estado'));
            
            // Limpar dados maliciosos
            $data = html_escape($data);
            
            $this->core_model->update('produtos', $data, array('produto_id' => $produto_id));
            
            redirect('produtos');
                
            } else {
                
                //Erro de validação
                
                $data = array(
            
                'titulo' => 'Atualizar produto',

                'scripts' => array (
                    'vendors/mask/jquery_3.2.1.min.js',
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

                'produto' => $this->core_model->get_by_id('produtos', array('produto_id' => $produto_id)),
                
                'marcas' => $this->core_model->get_all('marcas', array('marca_ativa' => 1)),
                'fornecedores' => $this->core_model->get_all('fornecedores', array('fornecedor_ativo' => 1)),
                'categorias' => $this->core_model->get_all('categorias', array('categoria_ativa' => 1)),
                
            );
                
            //CENTRAL DE NOTIFICAÇÕES
            $contador_notificacoes = 0;
            if ($this->home_model->get_contas_receber_vencidas()) {

                $data['contas_receber_vencidas'] = TRUE;
                $contador_notificacoes ++;
            } 
    //        else {
    //            $data['contas_receber_vencidas'] = FALSE;
    //        }
            if ($this->home_model->get_contas_pagar_vencidas()) {

                $data['contas_pagar_vencidas'] = TRUE;
                $contador_notificacoes ++;
            } 
    //        else {
    //            $data['contas_pagar_vencidas'] = FALSE;
    //        }
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
            
            // Carrega a view de editar produtos
            $this->load->view('layout/header', $data);
            $this->load->view('produtos/edit');
            $this->load->view('layout/footer');
                
            }
              
        }        
    }
    
    public function del($produto_id = NULL) {

        if (!$produto_id || !$this->core_model->get_by_id('produtos', array('produto_id' => $produto_id))) {
            $this->session->set_flashdata('error', 'O produto não foi encontrado');
            redirect('produtos');
        } else {
            $this->core_model->delete('produtos', array('produto_id' => $produto_id));
            redirect('produtos');
        }

    }
    
    public function check_produto_descricao($produto_descricao) {
        
        $produto_id = $this->input->post('produto_id');
        
        if ($this->core_model->get_by_id('produtos', array('produto_descricao' => $produto_descricao, 'produto_id !=' => $produto_id))) {
            $this->form_validation->set_message('check_produto_descricao', 'Este produto já existe em nossa base de dados');
            return FALSE;
        } else {
            return TRUE;
        }
        
    }
    
    public function check_produto_preco_venda($produto_preco_venda) {
        
        $produto_preco_custo = $this->input->post('produto_preco_custo');
        
        $produto_preco_custo = str_replace('.', '', $produto_preco_custo);
        $produto_preco_venda = str_replace('.', '', $produto_preco_venda);
        
        $produto_preco_custo = str_replace(',', '', $produto_preco_custo);
        $produto_preco_venda = str_replace(',', '', $produto_preco_venda);
        
        //DEBUG
//        if ($produto_preco_custo > $produto_preco_venda) {
//            echo 'Preçode custo: '.intval($produto_preco_custo);
//            echo '<br>';
//            echo 'Preçode venda: '.intval($produto_preco_venda);
//            exit();
//        } else {
//            exit('Verificar');
//        }
        
        if ($produto_preco_custo > $produto_preco_venda) {           
            $this->form_validation->set_message('check_produto_preco_venda', 'Preço de venda deve ser igual ou maior que o preço de custo');
            return FALSE;           
        } else {
            return TRUE;
        }
        
    }
    
}