<?php

defined('BASEPATH') OR exit ('Ação não permitida');

class Cadastro extends CI_Controller{
    
    public function __construct() {
        parent::__construct(); 
        
        $this->load->model('orcamentos/home_model');
        
    }
    
    public function index() {

        $this->form_validation->set_rules('cliente_tipo', 'tipo', 'trim|required|exact_length[1]');
        $this->form_validation->set_rules('cliente_nome', 'nome', 'trim|required|min_length[4]|max_length[45]');
        $this->form_validation->set_rules('cliente_sobrenome', 'sobrenome', 'trim|required|min_length[4]|max_length[150]');
        $this->form_validation->set_rules('cliente_data_nascimento', 'data de nascimento', 'required');
        $cliente_pessoa = $this->input->post('cliente_pessoa');
        if ($cliente_pessoa == 1) {
            $this->form_validation->set_rules('cliente_cpf', 'CPF', 'trim|required|min_length[14]|max_length[14]|is_unique[clientes.cliente_cpf_cnpj]|callback_valida_cpf');
        } else {
            $this->form_validation->set_rules('cliente_cnpj', 'CNPJ', 'trim|required|min_length[18]|max_length[18]|is_unique[clientes.cliente_cpf_cnpj]|callback_valida_cnpj');
        }
        $this->form_validation->set_rules('cliente_rg_ie', 'RG/IE', 'trim|max_length[20]|is_unique[clientes.cliente_rg_ie]');
        $this->form_validation->set_rules('cliente_email', 'e-mail', 'trim|required|valid_email|max_length[50]|is_unique[clientes.cliente_email]');            
        if ($this->input->post('cliente_telefone')) {
            $this->form_validation->set_rules('cliente_telefone', 'telefone fixo', 'trim|max_length[14]|is_unique[clientes.cliente_telefone]');
        }
        if ($this->input->post('cliente_celular')) {
            $this->form_validation->set_rules('cliente_celular', 'celular', 'trim|max_length[15]|is_unique[clientes.cliente_celular]');
        }
        $this->form_validation->set_rules('cliente_responsavel', 'responsável', 'trim|required|min_length[4]|max_length[250]');
        $this->form_validation->set_rules('cliente_cep', 'CEP', 'trim|required|max_length[10]');
        $this->form_validation->set_rules('cliente_endereco', 'endereço', 'trim|required|max_length[155]');
        $this->form_validation->set_rules('cliente_numero_endereco', 'número', 'trim|max_length[10]');
        $this->form_validation->set_rules('cliente_bairro', 'bairro', 'trim|required|max_length[45]');
        $this->form_validation->set_rules('cliente_complemento', 'complemento', 'trim|max_length[145]');
        $this->form_validation->set_rules('cliente_cidade', 'cidade', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('cliente_estado', 'estado', 'trim|required|exact_length[2]');
        $this->form_validation->set_rules('cliente_obs', 'observação', 'max_length[500]');
        $this->form_validation->set_rules('cliente_user', 'Usuário', 'required|min_length[3]|is_unique[clientes.cliente_user]');
        $this->form_validation->set_rules('cliente_senha', 'Senha', 'required|min_length[5]');
        $this->form_validation->set_rules('cliente_senha_repete', 'Confirmar Senha', 'matches[cliente_senha]');

        if ($this->form_validation->run()) { 
            // Teste para ver se valida
//                exit('Validado');
            
            $data = elements(

                array(
                    'cliente_pessoa',
                    'cliente_tipo',
                    'cliente_nome',
                    'cliente_sobrenome',
                    'cliente_data_nascimento',
                    'cliente_rg_ie',
                    'cliente_email',
                    'cliente_telefone',
                    'cliente_celular',
                    'cliente_responsavel',
                    'cliente_cep',
                    'cliente_endereco',
                    'cliente_numero_endereco',
                    'cliente_bairro',
                    'cliente_complemento',
                    'cliente_cidade',
                    'cliente_estado',
                    'cliente_ativo',
                    'cliente_obs',
                    'cliente_user',
                ), $this->input->post()
                    
        );
        
        if ($cliente_pessoa == 1) {
            $data['cliente_cpf_cnpj'] = $this->input->post('cliente_cpf');
        } else {
            $data['cliente_cpf_cnpj'] = $this->input->post('cliente_cnpj');
        }
        $data['cliente_senha'] = sha1($this->input->post('cliente_senha'));

        // Colocar todo texto em maiúsculo
//            $data['cliente_estado'] = strtoupper($this->input->post('cliente_estado'));

        // Limpar dados maliciosos
        $data = html_escape($data);

        $this->core_model->insert('clientes', $data);
        
        $this->session->set_flashdata('info', 'Cadastro efetuado com sucesso!');
        redirect('orcamentos/login');

        } else {

            // Erro de validação
            $data = array(

            'titulo' => 'Cadastro',
                
            'cliente' => $this->core_model->get_all('clientes'),

        );

            // Carrega a view de editar clientes
           $this->load->view('orcamentos/cadastro/index', $data);

        }        

    }
    
    public function check_rg_ie($cliente_rg_ie) {
        if ($this->input->post('cliente_rg_ie') != NULL) {
            $cliente_id = $this->input->post('cliente_id');
        
            if ($this->core_model->get_by_id('clientes', array('cliente_rg_ie' => $cliente_rg_ie, 'cliente_id !=' => $cliente_id))) {
                $this->form_validation->set_message('check_rg_ie', 'Este documento já está cadatrado na base de dados');
                return FALSE;
            } else {
                return TRUE;
            }
        }
    }
    
    public function check_email($cliente_email) {
        
        $cliente_id = $this->input->post('cliente_id');
        
        if ($this->core_model->get_by_id('clientes', array('cliente_email' => $cliente_email, 'cliente_id !=' => $cliente_id))) {
            $this->form_validation->set_message('check_email', 'Este e-mail já está cadatrado na base de dados');
            return FALSE;
        } else {
            return TRUE;
        }
        
    }
    
    public function check_user($cliente_user) {
        
        $cliente_id = $this->input->post('cliente_id');
        
        if ($this->core_model->get_by_id('clientes', array('cliente_user' => $cliente_user, 'cliente_id !=' => $cliente_id))) {
            $this->form_validation->set_message('check_user', 'Este usuário já está cadatrado na base de dados');
            return FALSE;
        } else {
            return TRUE;
        }
        
    }
    
    public function check_telefone($cliente_telefone) {
        
        $cliente_id = $this->input->post('cliente_id');
        
        if ($this->core_model->get_by_id('clientes', array('cliente_telefone' => $cliente_telefone, 'cliente_id !=' => $cliente_id))) {
            $this->form_validation->set_message('check_telefone', 'Este telefone já está cadatrado na base de dados');
            return FALSE;
        } else {
            return TRUE;
        }
        
    }
    
    public function check_celular($cliente_celular) {
        
        $cliente_id = $this->input->post('cliente_id');
        
        if ($this->core_model->get_by_id('clientes', array('cliente_celular' => $cliente_celular, 'cliente_id !=' => $cliente_id))) {
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

        if ($this->input->post('cliente_id')) {

            $cliente_id = $this->input->post('cliente_id');

            if ($this->core_model->get_by_id('clientes', array('cliente_id !=' => $cliente_id, 'cliente_cpf_cnpj' => $cnpj))) {
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

            if (!($cnpj{12} == $digito1) and ( $cnpj{13} == $digito2)) {
                $this->form_validation->set_message('valida_cnpj', 'Por favor digite um CNPJ válido');
                return false;
            } else {
                return true;
            }
        }
    }
    
    public function valida_cpf($cpf) {

        if ($this->input->post('cliente_id')) {

            $cliente_id = $this->input->post('cliente_id');

            if ($this->core_model->get_by_id('clientes', array('cliente_id !=' => $cliente_id, 'cliente_cpf_cnpj' => $cpf))) {
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