<?php

defined('BASEPATH') OR exit('Ação não permitida');

    class Produtos_model extends CI_Model {
        
        public function get_all() {
            
            //Array de um select com JOIN na base de dados
            $this->db->select([
                'produtos.*',
                'categorias.categoria_id',
                'categorias.categoria_nome as categoria',
                'marcas.marca_id',
                'marcas.marca_nome as marca',
                'parceiros.parceiro_id',
                'parceiros.parceiro_sobrenome as parceiro',
            ]);
            
            //Aqui faz as ligações com LEFT JOIN nas tabelas (produtos, categorias, marcas e fornecedores)
            $this->db->join('categorias', 'categoria_id = produto_categoria_id', 'LEFT');
            $this->db->join('marcas', 'marca_id = produto_marca_id', 'LEFT');
            $this->db->join('parceiros', 'parceiro_id = produto_parceiro_id', 'LEFT');
            
            $this->db->order_by('produtos.produto_descricao', 'ASC');
            
            //Retorna todos os resultados na tabela produtos,
            return $this->db->get('produtos')->result();
            
        }
        
        public function update($produto_id, $diferenca) {
            
            $this->db->set('produto_qtde_estoque', 'produto_qtde_estoque - '.$diferenca, FALSE);
            $this->db->where('produto_id', $produto_id);
            $this->db->update('produtos');
            
        }
    }
        