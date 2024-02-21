<?php

defined('BASEPATH') OR exit('Ação não permitida');

    class Vendas_model extends CI_Model {
        
        public function get_all() {
            
            //Array de um select com JOIN na base de dados
            $this->db->select([
                'vendas.*',
                'parceiros.parceiro_id',
                'parceiros.parceiro_nome',
                'parceiros.parceiro_sobrenome',
                'vendedores.vendedor_id',
                'vendedores.vendedor_codigo',
                'vendedores.vendedor_nome_completo',
                'formas_pagamentos.forma_pagamento_id',
                'formas_pagamentos.forma_pagamento_nome as forma_pagamento',
            ]);
            
            //Aqui faz as ligações com LEFT JOIN nas tabelas (vendas, parceiros e formas_pagamentos)
            $this->db->join('parceiros', 'parceiro_id = venda_parceiro_id', 'LEFT');
            $this->db->join('vendedores', 'vendedor_id = venda_vendedor_id', 'LEFT');
            $this->db->join('formas_pagamentos', 'forma_pagamento_id = venda_forma_pagamento_id', 'LEFT');
            
            //Retorna todos os resultados na tabela produtos,
            return $this->db->get('vendas')->result();
            
        }
        
        public function get_by_id($venda_id = NULL) {
            
            //Array de um select com JOIN na base de dados
            $this->db->select([
                'vendas.*',
                'parceiros.parceiro_id',
                'CONCAT (parceiros.parceiro_nome, " ", parceiros.parceiro_sobrenome) as parceiro_nome_completo',
                'parceiros.parceiro_cpf_cnpj',
                'parceiros.parceiro_celular',
                'vendedores.vendedor_id',
                'vendedores.vendedor_codigo',
                'vendedores.vendedor_nome_completo',
                'formas_pagamentos.forma_pagamento_id',
                'formas_pagamentos.forma_pagamento_nome as forma_pagamento',
            ]);
            
            $this->db->where('venda_id', $venda_id);
            //Aqui faz as ligações com LEFT JOIN nas tabelas (vendas, parceiros e formas_pagamentos)
            $this->db->join('parceiros', 'parceiro_id = venda_parceiro_id', 'LEFT');
            $this->db->join('vendedores', 'vendedor_id = venda_vendedor_id', 'LEFT');
            $this->db->join('formas_pagamentos', 'forma_pagamento_id = venda_forma_pagamento_id', 'LEFT');
            
            //Retorna todos os resultados na tabela produtos,
            return $this->db->get('vendas')->row();
            
        }
        
        public function get_all_produtos_by_venda($venda_id = NULL) {
            
            if ($venda_id) {
                $this->db->select([
                    'venda_produtos.*',
                    'produtos.produto_descricao'
                ]);
                
                $this->db->join('produtos', 'produto_id = venda_produto_id_produto', 'LEFT');
                
                $this->db->where('venda_produto_id_venda', $venda_id);
                
                return $this->db->get('venda_produtos')->result();
            }
            
        }
        
        public function delete_old_products($venda_id = NULL) {
            
            if ($venda_id) {
                $this->db->delete('venda_produtos', array('venda_produto_id_venda' => $venda_id));
            }
            
        }
        
        /* INÍCIO - Usados na impressão de PDF */
        public function get_all_produtos($venda_id = NULL) {
            
            if ($venda_id) {
                $this->db->select([
                    'venda_produtos.*',
                    'FORMAT(SUM(REPLACE(venda_produto_valor_unitario, ",", "")), 2) as venda_produto_valor_unitario',
                    'FORMAT(SUM(REPLACE(venda_produto_valor_total, ",", "")), 2) as venda_produto_total',
                    'FORMAT(SUM(REPLACE(venda_produto_valor_total, ",", "")), 2) as venda_valor_total',
                    'produtos.produto_id',
                    'produtos.produto_descricao',
                ]);
                
                $this->db->join('produtos', 'produto_id = venda_produto_id_produto', 'LEFT');
                $this->db->where('venda_produto_id_venda', $venda_id);
                
                $this->db->group_by('venda_produto_id_produto');
                
                return $this->db->get('venda_produtos')->result();
            }
            
        }
        
        public function get_valor_final_venda($venda_id = NULL) {
            
            if ($venda_id) {
                $this->db->select([
                    'FORMAT(SUM(REPLACE(venda_produto_valor_total, ",", "")), 2) as venda_valor_total',
                ]);
                
                $this->db->join('produtos', 'produto_id = venda_produto_id_produto', 'LEFT');
                $this->db->where('venda_produto_id_venda', $venda_id);
                
            }
            
            return $this->db->get('venda_produtos')->row();
            
        }
        /* FIM - Usados na impressão de PDF */
        
        
        /* INÍCIO - Usado no relatório de vendas */
        public function gerar_relatorio_vendas($data_inicial = NULL, $data_final = NULL) {
            //Array de um select com JOIN na base de dados
            $this->db->select([
                'vendas.*',
                'parceiros.parceiro_id',
                'CONCAT (parceiros.parceiro_nome, " ", parceiros.parceiro_sobrenome) as parceiro_nome_completo',
                'formas_pagamentos.forma_pagamento_id',
                'formas_pagamentos.forma_pagamento_nome as forma_pagamento',
            ]);
            //Aqui faz as ligações com LEFT JOIN nas tabelas (vendas, parceiros e formas_pagamentos)
            $this->db->join('parceiros', 'parceiro_id = venda_parceiro_id', 'LEFT');
            $this->db->join('formas_pagamentos', 'forma_pagamento_id = venda_forma_pagamento_id', 'LEFT');
            
            if ($data_inicial && $data_final) {
                // Só verificar no elemento data, ignora a horas, por isso do 1 ao 10 (caracter)
                $this->db->where("SUBSTR(venda_data_emissao, 1, 10) >= '$data_inicial' AND SUBSTR(venda_data_emissao, 1, 10) <= '$data_final'");
            } else {
                $this->db->where("SUBSTR(venda_data_emissao, 1, 10) >= '$data_inicial'");
            }
            return $this->db->get('vendas')->result();
        }
        
        public function get_valor_final_relatorio($data_inicial = NULL, $data_final = NULL) {
            $this->db->select([
                'FORMAT(SUM(REPLACE(venda_valor_total, ",", "")), 2) as venda_valor_total',
            ]);
            if ($data_inicial && $data_final) {
                // Só verificar no elemento data, ignora a horas, por isso do 1 ao 10 (caracter)
                $this->db->where("SUBSTR(venda_data_emissao, 1, 10) >= '$data_inicial' AND SUBSTR(venda_data_emissao, 1, 10) <= '$data_final'");
            } else {
                $this->db->where("SUBSTR(venda_data_emissao, 1, 10) >= '$data_inicial'");
            }
            return $this->db->get('vendas')->row();
        }
        /* FIM - Usado no relatório de vendas */
        
    }
        