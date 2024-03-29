<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Home_model extends CI_Model {
        
    public function get_sum_vendas() {
		$this->db->select([
			'SUM(REPLACE(venda_valor_total, ",", "")) as venda_valor_total',
		]);
		
		$result = $this->db->get('vendas')->row();
		
		if ($result) {
			$formatted_value = number_format($result->venda_valor_total, 2, ',', '.');
			$result->venda_valor_total = $formatted_value;
		}
		
		return $result;
	}

	public function get_sum_vendas_credit() {
        
        $this->db->select([
            'SUM(venda_valor_total) as venda_valor_credit',
        ]);
		$this->db->where('venda_forma_pagamento_id', 2); // Condição adicionada
        
        return $this->db->get('vendas')->row();
        
    }

	public function get_sum_vendas_debit() {
        
        $this->db->select([
            'SUM(venda_valor_total) as venda_valor_debit',
        ]);
		$this->db->where('venda_forma_pagamento_id', 3); // Condição adicionada
        
        return $this->db->get('vendas')->row();
        
    }

	public function get_sum_vendas_cash() {
        
        $this->db->select([
            'SUM(venda_valor_total) as venda_valor_cash',
        ]);
		$this->db->where('venda_forma_pagamento_id', 1); // Condição adicionada
        
        return $this->db->get('vendas')->row();
        
    }

	public function get_sum_vendas_pix() {
        
        $this->db->select([
            'SUM(venda_valor_total) as venda_valor_pix',
        ]);
		$this->db->where('venda_forma_pagamento_id', 4); // Condição adicionada
        
        return $this->db->get('vendas')->row();
        
    }	
    
    public function get_sum_ordem_servicos() {
		$this->db->select([
			'SUM(REPLACE(ordem_servico_valor_total, ",", "")) as ordem_servico_valor_total',
		]);
		
		$result = $this->db->get('ordens_servicos')->row();
		
		if ($result) {
			$formatted_value = number_format($result->ordem_servico_valor_total, 2, ',', '.');
			$result->ordem_servico_valor_total = $formatted_value;
		}
		
		return $result;
	}
	
    
    public function get_sum_receber() {
		$this->db->select([
			'SUM(REPLACE(conta_receber_valor, ",", "")) as conta_receber_valor',
		]);
		
		$this->db->where('conta_receber_status', 0);
		
		$result = $this->db->get('contas_receber')->row();
		
		if ($result) {
			$formatted_value = number_format($result->conta_receber_valor, 2, ',', '.');
			$result->conta_receber_valor = $formatted_value;
		}
		
		return $result;
	}
	
	public function get_sum_pagar() {
		$this->db->select([
			'SUM(REPLACE(conta_pagar_valor, ",", "")) as conta_pagar_valor',
		]);
		
		$this->db->where('conta_pagar_status', 0);
		
		$result = $this->db->get('contas_pagar')->row();
		
		if ($result) {
			$formatted_value = number_format($result->conta_pagar_valor, 2, ',', '.');
			$result->conta_pagar_valor = $formatted_value;
		}
		
		return $result;
	}
	
    
    public function get_contas_pagar_vencem_hoje() {
        
        $this->db->select([
            'contas_pagar.*',
            'fornecedor_id',
            'fornecedor_nome_fantasia as fornecedor',
        ]);
        
        $this->db->where('conta_pagar_status', 0);
        $this->db->where('conta_pagar_data_vencimento =', date('Y-m-d'));
        
        $this->db->join('fornecedores', 'fornecedor_id = conta_pagar_fornecedor_id', 'LEFT');
        return $this->db->get('contas_pagar')->result();
        
    }
    
    public function get_contas_receber_vencem_hoje() {
        
        $this->db->select([
            'contas_receber.*',
            'parceiro_id',
            'CONCAT (parceiros.parceiro_nome, " ", parceiros.parceiro_sobrenome) as parceiro_nome_completo',
        ]);
        
        $this->db->where('conta_receber_status', 0);
        $this->db->where('conta_receber_data_vencimento =', date('Y-m-d'));
        
        $this->db->join('parceiros', 'parceiro_id = conta_receber_parceiro_id', 'LEFT');
        return $this->db->get('contas_receber')->result();
        
    }
    
    public function get_produtos_mais_vendidos() {
        
        $this->db->select([
            'venda_produtos.*',
            'SUM(venda_produto_quantidade) as quantidade_vendidos',
            'produtos.produto_id',
            'produtos.produto_descricao',
        ]);
        
        $this->db->join('produtos', 'produto_id = venda_produto_id_produto', 'LEFT');
        
        $this->db->limit(10);
        $this->db->group_by('venda_produto_id_produto');
        $this->db->order_by('quantidade_vendidos', 'DESC');
        
        return $this->db->get('venda_produtos')->result();
        
    }

	public function get_produtos_mais_fives() {
        
        $this->db->select([
            'venda_produtos.*',
            'SUM(venda_produto_quantidade) as quantidade_vendidos',
            'produtos.produto_id',
            'produtos.produto_descricao',
        ]);
        
        $this->db->join('produtos', 'produto_id = venda_produto_id_produto', 'LEFT');
        
        $this->db->limit(5);
        $this->db->group_by('venda_produto_id_produto');
        $this->db->order_by('quantidade_vendidos', 'DESC');
        
        return $this->db->get('venda_produtos')->result();
        
    }
    
    public function get_servicos_mais_vendidos() {
        
        $this->db->select([
            'ordem_tem_servicos.*',
            'SUM(ordem_ts_quantidade) as quantidade_vendidos',
            'servicos.servico_id',
            'servicos.servico_nome',
        ]);
        
        $this->db->join('servicos', 'servico_id = ordem_ts_id_servico', 'LEFT');
        
        $this->db->limit(3);
        $this->db->group_by('ordem_ts_id_servico');
        $this->db->order_by('quantidade_vendidos', 'DESC');
        
        return $this->db->get('ordem_tem_servicos')->result();
        
    }
    
    public function get_usuarios_desativados() {
        
        $this->db->where('active', 0);
        return $this->db->get('users')->row();
        
    }
    
    public function get_contas_receber_vencidas() {
        
        $this->db->where('conta_receber_data_vencimento <', date('Y-m-d'));
        $this->db->where('conta_receber_status', 0);
        
        return $this->db->get('contas_receber')->row();
    }
    
    public function get_contas_pagar_vencidas() {
        
        $this->db->where('conta_pagar_data_vencimento <', date('Y-m-d'));
        $this->db->where('conta_pagar_status', 0);
        
        return $this->db->get('contas_pagar')->row();
        
    }
    
    public function get_produtos_quantidade() {
        
        $this->db->select([
            'SUM(produtos.produto_qtde_estoque) as prod_quant',
        ]);
                
        return $this->db->get('produtos')->row();
        
    }
    
    public function get_produtos_sem_estoque() {
        
        $this->db->where('produto_qtde_estoque <', 5);
        $this->db->where('produto_ativo', 1);
        
        return $this->db->get('produtos')->row();
    }
    
    public function get_reclamacoes_pendentes() {
        
        $this->db->where('reclama_status =', 0);
        
        return $this->db->get('reclamacoes')->row();
    }
    
    public function get_tickets_pendentes() {
        
        $this->db->where('ticket_status =', 0);
        
        return $this->db->get('tickets')->row();
    }
    
    public function get_avisos_home() {
        
        $this->db->select([
            'avisados.*',
        ]);
        
        $this->db->limit(5);
        $this->db->order_by('avisado_id', 'DESC');
        
        return $this->db->get('avisados')->result();
        
    }

	public function get_count_clientes() {
		$this->db->select('COUNT(cliente_id) as total_clientes');
		$this->db->where('cliente_ativo', 1);
		$query = $this->db->get('clientes');
		return $query->row(); // Alterado de result() para row()
	}
    
    
}
