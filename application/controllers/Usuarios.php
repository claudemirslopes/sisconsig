<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Usuarios extends CI_Controller {
    
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
        
        if (!$this->ion_auth->is_admin()) {
            $this->session->set_flashdata('info', 'Você não tem permissão para acessar o módulo de <b>Usuários</b>');
            redirect('home');
        }
        
        $data = array(
            
            'titulo' => 'Colaboradores',
            
            'styles' => array(
              'vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
              'vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css',
            ),
            
            'scripts' => array(
              'vendors/datatables.net/js/jquery.dataTables.min.js', 
              'vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
              'vendors/datatables.net-bs4/js/app.js',
              'vendors/datatables.net-buttons/js/dataTables.buttons.min.js',
              'vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js',
              'vendors/datatables.net-buttons/js/buttons.html5.min.js',
              'vendors/datatables.net-buttons/js/buttons.print.min.js',
              'vendors/datatables.net-buttons/js/buttons.colVis.min.js',
              'assets/js/init-scripts/data-table/datatables-init.js',  
            ),
            
            // Home
            'soma_vendas' => $this->home_model->get_sum_vendas(),
            'soma_servicos' => $this->home_model->get_sum_ordem_servicos(),
            'soma_receber' => $this->home_model->get_sum_receber(),
            'soma_pagar' => $this->home_model->get_sum_pagar(),
            'soma_produtos' => $this->home_model->get_produtos_quantidade(),
            'top_produtos' => $this->home_model->get_produtos_mais_vendidos(),
            'top_servicos' => $this->home_model->get_servicos_mais_vendidos(), 
            
            'usuarios' => $this->ion_auth->users()->result(),
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
        
        /* echo '<pre>';
        print_r($data['usuarios']);
        exit(); */
        
        $this->load->view('layout/header', $data);
        $this->load->view('usuarios/index');
        $this->load->view('layout/footer');
        
    }
    
    public function add() {
        
        if (!$this->ion_auth->is_admin()) {
            $this->session->set_flashdata('info', 'Voce não tem permissão para acessar o módulo de <b>Usuários</b>');
            redirect('home');
        }
        
        $this->form_validation->set_rules('first_name', 'nome', 'trim|required');
        $this->form_validation->set_rules('last_name', 'sobrenome', 'trim|required');
        $this->form_validation->set_rules('phone', 'Telefone', 'trim|required');
        $this->form_validation->set_rules('email', 'e-mail', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('username', 'usuário', 'trim|required|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'senha', 'required|min_length[5]|max_length[255]');
        $this->form_validation->set_rules('senha', 'confirme a senha', 'matches[password]');
        
        if ($this->form_validation->run()) {
            
            $username = $this->security->xss_clean($this->input->post('username'));
            $password = $this->security->xss_clean($this->input->post('password'));
            $email = $this->security->xss_clean($this->input->post('email'));
            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'phone' => $this->input->post('phone'),
                'username' => $this->input->post('username'),
                'senha' => sha1($this->input->post('senha')),
                'id_nivacesso' => $this->input->post('id_nivacesso'),
                'active' => $this->input->post('active'),
                );
            $group = array($this->input->post('perfil_usuario')); // Sets user to admin.
            
            $additional_data = $this->security->xss_clean($additional_data);
            
            $group = $this->security->xss_clean($group);

            if ($this->ion_auth->register($username, $password, $email, $additional_data, $group)) {
                
                $this->session->set_flashdata('sucesso', 'Usuário adicionado com sucesso');
                
            } else {
                
                $this->session->set_flashdata('error', 'Erro ao adicionar usuário');
                
            }
            
            redirect('usuarios');
            
        } else {
            
            // Erro de validação
            
            $data = array(
                'titulo' => 'Cadastrar colaborador',
                
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
            
            $this->load->view('layout/header', $data);
            $this->load->view('usuarios/add');
            $this->load->view('layout/footer');
            
        }
        
    }

    public function edit($usuario_id = NULL) {
        
        // Se não for admin e tentar editar outro usuário
        if (!$this->ion_auth->is_admin()) {
            if (($this->session->userdata('user_id') != $usuario_id)) {
                $this->session->set_flashdata('error', 'Voce não tem permissão para editar um usuário diferente do seu');
                redirect('home');
            }
        }
        
    	if (!$usuario_id || !$this->ion_auth->user($usuario_id)->row()) {
            
            $this->session->set_flashdata('error', 'Usuário não foi encontrado');
            redirect('usuarios');

        } else {
            
        $this->form_validation->set_rules('first_name', 'nome', 'trim|required');
        $this->form_validation->set_rules('last_name', 'sobrenome', 'trim|required');
        $this->form_validation->set_rules('phone', 'Telefone', 'trim|required');
        $this->form_validation->set_rules('email', 'e-mail', 'trim|required|valid_email|callback_email_check');
        $this->form_validation->set_rules('username', 'usuário', 'trim|required|callback_username_check');
        $this->form_validation->set_rules('password', 'senha', 'min_length[5]|max_length[255]');
        $this->form_validation->set_rules('senha', 'confirme a senha', 'matches[password]');

        if ($this->form_validation->run()) {
            
//            echo '<pre>';
//            print_r($this->input->post());
//            exit();
            
            $data = elements(
                    
                    array(
                        'first_name',
                        'last_name',
                        'phone',
                        'email',
                        'username',
                        'active',
                        'password',
                        'senha',
                    ), $this->input->post()
                    
            );
            $data['senha'] = sha1($this->input->post('senha'));
            if (!$this->ion_auth->is_admin()) {
                unset($data['active']);
            }
            
            $data = $this->security->xss_clean($data);
            
            /* Verifica se foi passado o password */
            $password = $this->input->post('password');
            
            if (!$password) {
                
                unset($data['password']);
                
            }
            
            $senha = $this->input->post('senha');
            
            if (!$senha) {
                
                unset($data['senha']);
                
            }
            
            if ($this->ion_auth->update($usuario_id, $data)) {
                
                $perfil_usuario_db = $this->ion_auth->get_users_groups($usuario_id)->row();
                
                $perfil_usuario_post = $this->input->post('perfil_usuario');
                
                if ($this->ion_auth->is_admin()) {
                    /* Se for diferente atualiza o grupo */
                if ($perfil_usuario_db->id != $perfil_usuario_post) {
                    
                        $this->ion_auth->remove_from_group($perfil_usuario_db->id, $usuario_id);
                        $this->ion_auth->add_to_group($perfil_usuario_post, $usuario_id);

                    }
                }
                
                
                $this->session->set_flashdata('sucesso', 'Dados salvos com sucesso!');
                
            } else {
                
                $this->session->set_flashdata('error', 'Erro ao salvar os dados!');
                
            }
            
            if ($this->ion_auth->is_admin()) {
                redirect('usuarios');
            } else {
              redirect('home');  
            }
            
        } else {
            
            $data = array(
            'titulo' => 'Editar colaborador',
                
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
                
            'usuario' => $this->ion_auth->user($usuario_id)->row(),
            'perfil_usuario' => $this->ion_auth->get_users_groups($usuario_id)->row(),
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

            $this->load->view('layout/header', $data);
            $this->load->view('usuarios/edit');
            $this->load->view('layout/footer');
            
            }

        }

    }
    
    public function del($usuario_id = NULL) {
        
        if (!$this->ion_auth->is_admin()) {
            $this->session->set_flashdata('info', 'Voce não tem permissão para acessar o módulo de <b>Usuários</b>');
            redirect('home');
        }
        
        if (!$usuario_id || !$this->ion_auth->user($usuario_id)->row()) {
            $this->session->set_flashdata('error', 'Usuário não encontrado"');
            redirect('usuarios');            
        }
        
        if ($this->ion_auth->is_admin($usuario_id)) {            
            $this->session->set_flashdata('error', 'O administrador não pode ser excluído');
            redirect('usuarios');              
        }
        
        if ($this->ion_auth->delete_user($usuario_id)) {
            $this->session->set_flashdata('sucesso', 'O usuário foi excluído com sucesso');
            redirect('usuarios');
        } else {
            $this->session->set_flashdata('error', 'O usuário não pode ser excluído');
            redirect('usuarios');
        }
        
    }
    
    public function email_check($email) {
        
        $usuario_id = $this->input->post('usuario_id');
        
        if ($this->core_model->get_by_id('users', array('email' => $email, 'id !=' => $usuario_id))) {
            
            $this->form_validation->set_message('email_check', 'Esse e-mail já existe!');
            
            return FALSE;
            
        } else {
            
            return TRUE;
            
        }
        
    }
    
    public function username_check($username) {
        
        $usuario_id = $this->input->post('usuario_id');
        
        if ($this->core_model->get_by_id('users', array('username' => $username, 'id !=' => $usuario_id))) {
            
            $this->form_validation->set_message('username_check', 'Esse usuário já existe!');
            
            return FALSE;
            
        } else {
            
            return TRUE;
            
        }
        
    }
    
    public function nova_foto() {
        
        $this->load->model('usuarios_model', 'modelusuarios');
        
        $id = $this->input->post('id');
        $config['image_library'] = 'gd2';
        $config['upload_path'] = './public/images/usuarios';
        $config['allowed_types'] = 'jpg';
        $config['file_name'] = $id.".jpg";
        $config['overwrite'] = TRUE;
        $this->load->library('image_lib', $config);

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            echo $this->upload->display_errors();
        } else {
            $config2['source'] = './public/images/usuarios/'.$id.'.jpg';
            $config2['create_thumb'] = FALSE;
            $config2['width'] = 200;
            $config2['height'] = 200;

            $this->load->library('image_lib', $config2);

            if ($this->image_lib->resize()) {

                if ($this->modelusuarios->alterar_img($id)) {
                    redirect ('usuarios/edit/'.$id,'refresh');
                } else {
                    echo 'Houve um erro no sistema!';
                }

            } else {
                echo $this->image_lib->display_errors();
            }
        }
        
    }
    
}
