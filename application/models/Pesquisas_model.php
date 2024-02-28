<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesquisas_model extends CI_Model {

    public function searchAllTables($busca) {
        // Perform search across multiple tables
        $this->db->select('vendas.*, venda_produtos.*, produtos.*, clientes.*, parceiros.*');
        $this->db->from('vendas');
        $this->db->join('venda_produtos', 'venda_produtos.venda_produto_id_venda = vendas.venda_id');
        $this->db->join('produtos', 'produtos.produto_id = venda_produtos.venda_produto_id_produto');
        $this->db->join('clientes', 'clientes.cliente_id = vendas.venda_cliente_id');
        $this->db->join('parceiros', 'parceiros.parceiro_id = produtos.produto_parceiro_id');
        $this->db->like('vendas.venda_data_emissao', $busca);
        $this->db->or_like('vendas.venda_valor_total', $busca);
		$this->db->or_like('vendas.venda_pedido', $busca);
        $this->db->or_like('produtos.produto_codigo', $busca);
        $this->db->or_like('produtos.produto_descricao', $busca);
        $this->db->or_like('clientes.cliente_nome', $busca);
        $this->db->or_like('clientes.cliente_cpf_cnpj', $busca);
        $this->db->or_like('parceiros.parceiro_nome', $busca);
        $this->db->or_like('parceiros.parceiro_cpf_cnpj', $busca);

        $query = $this->db->get();
        return $query->result();
    }

}
