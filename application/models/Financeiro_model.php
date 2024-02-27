<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Financeiro_model extends CI_Model {

    public function get_all_pagar() {
        
        $this->db->select([
            'contas_pagar.*',
            'parceiro_id',
            'parceiro_nome as nome',
            'parceiro_sobrenome as sobrenome',
			'parceiro_pessoa as pessoa',
        ]);
        
        $this->db->join('parceiros', 'parceiro_id = conta_pagar_parceiro_id', 'LEFT');
        return $this->db->get('contas_pagar')->result();
        
    }
    
    public function get_all_receber() {
        
        $this->db->select([
            'contas_receber.*',
            'cliente_id',
            'cliente_nome as nome',
            'cliente_sobrenome as sobrenome',
            'cliente_pessoa as pessoa',
        ]);
        
        $this->db->join('clientes', 'cliente_id = conta_receber_cliente_id', 'LEFT');
        return $this->db->get('contas_receber')->result();
        
    }
    
    // Começo da utilização de relatórios
    public function get_contas_receber_relatorio($conta_receber_status = NULL, $data_vencimento = NULL) {
        
        $this->db->select([
            'contas_receber.*',
            'cliente_id',
            'clientes.cliente_nome as nome', 
			'clientes.cliente_sobrenome as sobrenome',
            'cliente_pessoa as pessoa',
        ]);
        
        $this->db->where('conta_receber_status', $conta_receber_status);
        $this->db->join('clientes', 'cliente_id = conta_receber_cliente_id', 'LEFT');
        
        if ($data_vencimento) {
            date_default_timezone_set('America/Sao_Paulo');
            $this->db->where('conta_receber_data_vencimento <', date('Y-m-d'));
        }
        
        return $this->db->get('contas_receber')->result();
        
    }
    
    public function get_sum_contas_receber_relatorio($conta_receber_status = NULL, $data_vencimento = NULL) {
        
        $this->db->select([
            'FORMAT(SUM(REPLACE(conta_receber_valor, ",", "")), 2) as conta_receber_valor_total',
        ]);
        
        $this->db->where('conta_receber_status', $conta_receber_status);
        
        if ($data_vencimento) {
            date_default_timezone_set('America/Sao_Paulo');
            $this->db->where('conta_receber_data_vencimento <', date('Y-m-d'));
        }
        
        return $this->db->get('contas_receber')->row();
        
    }
    
    public function get_contas_pagar_relatorio($conta_pagar_status = NULL, $data_vencimento = NULL) {
        
        $this->db->select([
            'contas_pagar.*',
            'parceiro_id',
            'parceiro_nome',
            'parceiro_sobrenome',
            'parceiro_cpf_cnpj',
			'parceiro_pessoa',
        ]);
        
        $this->db->where('conta_pagar_status', $conta_pagar_status);
        $this->db->join('parceiros', 'parceiro_id = conta_pagar_parceiro_id', 'LEFT');
        
        if ($data_vencimento) {
            date_default_timezone_set('America/Sao_Paulo');
            $this->db->where('conta_pagar_data_vencimento <', date('Y-m-d'));
        }
        
        return $this->db->get('contas_pagar')->result();
        
    }
    
    public function get_sum_contas_pagar_relatorio($conta_pagar_status = NULL, $data_vencimento = NULL) {
        
        $this->db->select([
            
            'FORMAT(SUM(REPLACE(conta_pagar_valor, ",", "")), 2) as conta_pagar_valor_total',
        ]);
        
        $this->db->where('conta_pagar_status', $conta_pagar_status);
        
        if ($data_vencimento) {
            date_default_timezone_set('America/Sao_Paulo');
            $this->db->where('conta_pagar_data_vencimento <', date('Y-m-d'));
        }
        
        return $this->db->get('contas_pagar')->row();
        
    }
    // Fim da utilização de relatórios

}

