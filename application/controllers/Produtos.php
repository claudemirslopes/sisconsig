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
        
         // Carrega a view de produtos
        $this->load->view('layout/header', $data);
        $this->load->view('produtos/index');
        $this->load->view('layout/footer');
        
    }
    
    public function add() {

		$this->form_validation->set_rules('produto_categoria_id', 'categoria', 'trim|required');
		$this->form_validation->set_rules('produto_marca_id', 'marca', 'trim|required');
		$this->form_validation->set_rules('produto_parceiro_id', 'parceiro', 'trim|required');
		$this->form_validation->set_rules('produto_descricao', 'descrição', 'trim|required|min_length[4]|max_length[145]|is_unique[produtos.produto_descricao]');
		$this->form_validation->set_rules('produto_unidade', 'unidade', 'trim|required|min_length[2]|max_length[10]');
		$this->form_validation->set_rules('produto_codigo_barras', 'código de barras', 'trim|max_length[45]');
		$this->form_validation->set_rules('produto_ncm', 'ncm', 'trim|max_length[15]');
		$this->form_validation->set_rules('produto_preco_custo', 'preço de custo', 'trim|required|max_length[45]');
		$this->form_validation->set_rules('produto_preco_venda', 'preço de venda', 'trim|required|max_length[45]|callback_check_produto_preco_venda');
		$this->form_validation->set_rules('produto_estoque_minimo', 'estoque mínimo', 'trim|required|greater_than_equal_to[1]');
		$this->form_validation->set_rules('produto_qtde_estoque', 'quantidade estoque', 'trim|required');
		$this->form_validation->set_rules('produto_obs', 'observação', 'trim|max_length[500]');
		$this->form_validation->set_rules('produto_estado', 'estado', 'trim|required|min_length[2]');
		
		if ($this->form_validation->run()) {
			// Upload da imagem
			$config['upload_path'] = './public/images/produto/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = 2048; // 2MB
			$config['encrypt_name'] = TRUE;
	
			$this->load->library('upload', $config);
	
			if ($this->upload->do_upload('produto_img')) {
				$upload_data = $this->upload->data();
				$data['produto_img'] = $upload_data['file_name'];
	
				// Aqui você deve manipular os dados do formulário
				$data_formulario = elements(
					array(
						'produto_codigo',
						'produto_categoria_id',
						'produto_parceiro_id',
						'produto_marca_id',
						'produto_descricao',
						'produto_unidade',
						'produto_codigo_barras',
						'produto_ncm',
						'produto_preco_custo',
						'produto_preco_venda',
						'produto_estoque_minimo',
						'produto_qtde_estoque',
						'produto_codigo_interno',
						'produto_ativo',
						'produto_obs',
						'produto_estado',
					), $this->input->post()
				);
	
				// Limpar dados maliciosos
				$data_formulario = html_escape($data_formulario);
	
				// Combine os dados da imagem e do formulário
				$data = array_merge($data, $data_formulario);
	
				$this->core_model->insert('produtos', $data);
	
				redirect('produtos');
			} else {
				// Tratar erros de upload
				$data['upload_error'] = $this->upload->display_errors();
				// Carregar a view novamente com os dados do formulário e a mensagem de erro
				$data['titulo'] = 'Cadastrar produto';
				$data['produto_codigo'] = $this->core_model->generate_unique_code('produtos', 'numeric', 8, 'produto_codigo');
				$data['produto_codigo_interno'] = $this->core_model->generate_unique_code('produtos', 'numeric', 8, 'produto_codigo_interno');
	
				$data['marcas'] = $this->core_model->get_all('marcas', array('marca_ativa' => 1));
				$data['parceiros'] = $this->core_model->get_all('parceiros', array('parceiro_ativo' => 1));
				$data['categorias'] = $this->core_model->get_all('categorias', array('categoria_ativa' => 1));
	
				//CENTRAL DE NOTIFICAÇÕES

				$data['soma_vendas'] = $this->home_model->get_sum_vendas();
				$data['soma_servicos'] = $this->home_model->get_sum_ordem_servicos();
				$data['soma_receber'] = $this->home_model->get_sum_receber();
				$data['soma_pagar'] = $this->home_model->get_sum_pagar();
				$data['soma_produtos'] = $this->home_model->get_produtos_quantidade();
				$data['top_produtos'] = $this->home_model->get_produtos_mais_vendidos();
				$data['top_servicos'] = $this->home_model->get_servicos_mais_vendidos();
				$data['avisos_home'] = $this->home_model->get_avisos_home();

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

						$data['contador_notificacoes'] = $this->get_contador_notificacoes();
			
						$this->load->view('layout/header', $data);
						$this->load->view('produtos/add', $data);
						$this->load->view('layout/footer');
					}
				} else {
			//Erro de validação
	
			$data = array(
				'titulo' => 'Cadastrar produto',

				'scripts' => array(
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
				'avisos_home' => $this->home_model->get_avisos_home(),
	
				'produto_codigo' => $this->core_model->generate_unique_code('produtos', 'numeric', 8, 'produto_codigo'),
				'produto_codigo_interno' => $this->core_model->generate_unique_code('produtos', 'numeric', 8, 'produto_codigo_interno'),
	
				'marcas' => $this->core_model->get_all('marcas', array('marca_ativa' => 1)),
				'parceiros' => $this->core_model->get_all('parceiros', array('parceiro_ativo' => 1)),
				'categorias' => $this->core_model->get_all('categorias', array('categoria_ativa' => 1)),
			);

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

				$data['contador_notificacoes'] = $this->get_contador_notificacoes();
	
			$this->load->view('layout/header', $data);
			$this->load->view('produtos/add');
			$this->load->view('layout/footer');
		}
	}
	
	private function get_contador_notificacoes() {
		$contador_notificacoes = 0;
		if ($this->home_model->get_contas_receber_vencidas()) {
			$contador_notificacoes++;
		}
		if ($this->home_model->get_contas_pagar_vencidas()) {
			$contador_notificacoes++;
		}
		if ($this->home_model->get_contas_pagar_vencem_hoje()) {
			$contador_notificacoes++;
		}
		if ($this->home_model->get_contas_receber_vencem_hoje()) {
			$contador_notificacoes++;
		}
		if ($this->home_model->get_usuarios_desativados()) {
			$contador_notificacoes++;
		}
		if ($this->home_model->get_produtos_sem_estoque()) {
			$contador_notificacoes++;
		}
		if ($this->home_model->get_reclamacoes_pendentes()) {
			$contador_notificacoes++;
		}
		if ($this->ion_auth->is_admin() && $this->home_model->get_tickets_pendentes()) {
			$contador_notificacoes++;
		}
	
		return $contador_notificacoes;
	}
    
    public function edit($produto_id = NULL) {

		if (!$produto_id || !$this->core_model->get_by_id('produtos', array('produto_id' => $produto_id))) {
			$this->session->set_flashdata('error', 'Produto não encontrado!');
			redirect('produtos');
		} else {
			$this->form_validation->set_rules('produto_categoria_id', 'categoria', 'trim|required');
			$this->form_validation->set_rules('produto_marca_id', 'marca', 'trim|required');
			$this->form_validation->set_rules('produto_parceiro_id', 'parceiro', 'trim|required');
			$this->form_validation->set_rules('produto_descricao', 'descrição', 'trim|required|min_length[4]|max_length[145]');
			$this->form_validation->set_rules('produto_unidade', 'unidade', 'trim|required|min_length[2]|max_length[10]');
			$this->form_validation->set_rules('produto_codigo_barras', 'código de barras', 'trim|max_length[45]');
			$this->form_validation->set_rules('produto_ncm', 'ncm', 'trim|max_length[15]');
			$this->form_validation->set_rules('produto_preco_custo', 'preço de custo', 'trim|required|max_length[45]');
			$this->form_validation->set_rules('produto_preco_venda', 'preço de venda', 'trim|required|max_length[45]|callback_check_produto_preco_venda');
			$this->form_validation->set_rules('produto_estoque_minimo', 'estoque mínimo', 'trim|required|greater_than_equal_to[1]');
			$this->form_validation->set_rules('produto_qtde_estoque', 'quantidade estoque', 'trim|required');
			$this->form_validation->set_rules('produto_obs', 'observação', 'trim|max_length[500]');
			$this->form_validation->set_rules('produto_estado', 'estado', 'trim|required|min_length[2]');
	
			if ($this->form_validation->run()) {
				$data = elements(
					array(
						'produto_codigo',
						'produto_categoria_id',
						'produto_parceiro_id',
						'produto_marca_id',
						'produto_descricao',
						'produto_unidade',
						'produto_codigo_barras',
						'produto_ncm',
						'produto_preco_custo',
						'produto_preco_venda',
						'produto_estoque_minimo',
						'produto_qtde_estoque',
						'produto_codigo_interno',
						'produto_ativo',
						'produto_obs',
						'produto_estado',
					),
					$this->input->post()
				);
	
				// Upload da nova imagem
				if (!empty($_FILES['produto_img']['name'])) {
					// Verifica se já existe uma imagem associada ao produto
					$produto = $this->core_model->get_by_id('produtos', array('produto_id' => $produto_id));
					if ($produto->produto_img) {
						// Exclui a imagem anterior da pasta
						$imagem_antiga = './public/images/produto/' . $produto->produto_img;
						if (file_exists($imagem_antiga)) {
							unlink($imagem_antiga);
						}
					}
	
					$config['upload_path'] = './public/images/produto/';
					$config['allowed_types'] = 'gif|jpg|jpeg|png';
					$config['max_size'] = 2048; // 2MB
					$config['encrypt_name'] = TRUE;
	
					$this->load->library('upload', $config);
	
					if ($this->upload->do_upload('produto_img')) {
						$upload_data = $this->upload->data();
						$data['produto_img'] = $upload_data['file_name'];
					} else {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('produtos/edit/' . $produto_id);
					}
				}
	
				$data = html_escape($data);
	
				$this->core_model->update('produtos', $data, array('produto_id' => $produto_id));
	
				redirect('produtos');
	
			} else {
				// Erro de validação
				$data = array(
					'titulo' => 'Atualizar produto',

					'scripts' => array(
						'vendors/mask/jquery_3.2.1.min.js',
						'vendors/mask/jquery.mask.min.js',
						'vendors/mask/app.js',
					),
					'soma_vendas' => $this->home_model->get_sum_vendas(),
					'soma_servicos' => $this->home_model->get_sum_ordem_servicos(),
					'soma_receber' => $this->home_model->get_sum_receber(),
					'soma_pagar' => $this->home_model->get_sum_pagar(),
					'soma_produtos' => $this->home_model->get_produtos_quantidade(),
					'top_produtos' => $this->home_model->get_produtos_mais_vendidos(),
					'top_servicos' => $this->home_model->get_servicos_mais_vendidos(),
					'avisos_home' => $this->home_model->get_avisos_home(),
					'produto' => $this->core_model->get_by_id('produtos', array('produto_id' => $produto_id)),
					'marcas' => $this->core_model->get_all('marcas', array('marca_ativa' => 1)),
					'parceiros' => $this->core_model->get_all('parceiros', array('parceiro_ativo' => 1)),
					'categorias' => $this->core_model->get_all('categorias', array('categoria_ativa' => 1)),
				);
	
				//CENTRAL DE NOTIFICAÇÕES
				$contador_notificacoes = 0;
				if ($this->home_model->get_contas_receber_vencidas()) {
					$data['contas_receber_vencidas'] = TRUE;
					$contador_notificacoes++;
				}
				if ($this->home_model->get_contas_pagar_vencidas()) {
					$data['contas_pagar_vencidas'] = TRUE;
					$contador_notificacoes++;
				}
				if ($this->home_model->get_contas_pagar_vencem_hoje()) {
					$data['contas_pagar_vence_hoje'] = TRUE;
					$contador_notificacoes++;
				}
				if ($this->home_model->get_contas_receber_vencem_hoje()) {
					$data['contas_receber_vence_hoje'] = TRUE;
					$contador_notificacoes++;
				}
				if ($this->home_model->get_usuarios_desativados()) {
					$data['usuarios_desativados'] = TRUE;
					$contador_notificacoes++;
				}
				if ($this->home_model->get_produtos_sem_estoque()) {
					$data['produto_sem_estoque'] = TRUE;
					$contador_notificacoes++;
				}
				if ($this->home_model->get_reclamacoes_pendentes()) {
					$data['reclama_pendente'] = TRUE;
					$contador_notificacoes++;
				}
				if ($this->ion_auth->is_admin()) {
					if ($this->home_model->get_tickets_pendentes()) {
						$data['ticket_pendente'] = TRUE;
						$contador_notificacoes++;
					}
				}
	
				$data['contador_notificacoes'] = $contador_notificacoes;
	
				$this->load->view('layout/header', $data);
				$this->load->view('produtos/edit', $data);
				$this->load->view('layout/footer', $data);
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
