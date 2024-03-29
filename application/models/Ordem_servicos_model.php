<?php

defined('BASEPATH') OR exit('Ação não permitida');

    class Ordem_servicos_model extends CI_Model {
        
        public function get_all() {
            
            //Array de um select com JOIN na base de dados
            $this->db->select([
                'ordens_servicos.*',
                'parceiros.parceiro_id',
                'parceiros.parceiro_nome',
                'parceiros.parceiro_sobrenome',
                'formas_pagamentos.forma_pagamento_id',
                'formas_pagamentos.forma_pagamento_nome as forma_pagamento',
            ]);
            
            //Aqui faz as ligações com LEFT JOIN nas tabelas (ordens_servicos, parceiros e formas_pagamentos)
            $this->db->join('parceiros', 'parceiro_id = ordem_servico_parceiro_id', 'LEFT');
            $this->db->join('formas_pagamentos', 'forma_pagamento_id = ordem_servico_forma_pagamento_id', 'LEFT');
            
            //Retorna todos os resultados na tabela produtos,
            return $this->db->get('ordens_servicos')->result();
            
        }
        
        public function get_by_id($ordem_servico_id = NULL) {
 
            $this->db->select([
                'ordens_servicos.*',
                'parceiros.parceiro_id',
                'CONCAT (parceiros.parceiro_nome, " ", parceiros.parceiro_sobrenome) as parceiro_nome_completo',
                'parceiros.parceiro_cpf_cnpj',
                'parceiros.parceiro_celular',
                'formas_pagamentos.forma_pagamento_id',
                'formas_pagamentos.forma_pagamento_nome as forma_pagamento',
            ]);


            $this->db->where('ordem_servico_id', $ordem_servico_id);


            $this->db->join('parceiros', 'parceiro_id = ordem_servico_parceiro_id', 'LEFT');
            $this->db->join('formas_pagamentos', 'forma_pagamento_id = ordem_servico_forma_pagamento_id', 'LEFT');

            return $this->db->get('ordens_servicos')->row();
        }
        
        public function get_all_servicos_by_ordem($ordem_servico_id = NULL) {
            
            if ($ordem_servico_id) {
                $this->db->select([
                    'ordem_tem_servicos.*',
                    'servicos.servico_descricao'
                ]);
                
                $this->db->join('servicos', 'servico_id = ordem_ts_id_servico', 'LEFT');
                
                $this->db->where('ordem_ts_id_ordem_servico', $ordem_servico_id);
                
                return $this->db->get('ordem_tem_servicos')->result();
            }
            
        }
        
        public function delete_old_services($ordem_servico_id = NULL) {
            
            if ($ordem_servico_id) {
                $this->db->delete('ordem_tem_servicos', array('ordem_ts_id_ordem_servico' => $ordem_servico_id));
            }
            
        }
        
        public function get_all_servicos($ordem_servico_id = NULL) {
            
            if ($ordem_servico_id) {
                $this->db->select([
                    'ordem_tem_servicos.*',
                    'FORMAT(SUM(REPLACE(ordem_ts_valor_unitario, ",", "")), 2) as ordem_ts_valor_unitario',
//                    'FORMAT(SUM(REPLACE(ordem_ts_valor_total, ",", "")), 2) as ordem_ts_valor_total',
                    'servicos.servico_id',
                    'servicos.servico_descricao',
                ]);
                
                $this->db->join('servicos', 'servico_id = ordem_ts_id_servico', 'LEFT');
                $this->db->where('ordem_ts_id_ordem_servico', $ordem_servico_id);
                
                $this->db->group_by('ordem_ts_id_servico');
                
                return $this->db->get('ordem_tem_servicos')->result();
            }
            
        }
        
        public function get_valor_final_os($ordem_servico_id = NULL) {
            
            if ($ordem_servico_id) {
                $this->db->select([
                    'FORMAT(SUM(REPLACE(ordem_ts_valor_total, ",", "")), 2) as os_valor_total',
                ]);
                
                $this->db->join('servicos', 'servico_id = ordem_ts_id_servico', 'LEFT');
                $this->db->where('ordem_ts_id_ordem_servico', $ordem_servico_id);
                
            }
            
            return $this->db->get('ordem_tem_servicos')->row();
            
        }
        
        /* INÍCIO - Usado no relatório de os */
        public function gerar_relatorio_os($data_inicial = NULL, $data_final = NULL) {
            //Array de um select com JOIN na base de dados
            $this->db->select([
                'ordens_servicos.*',
                'parceiros.parceiro_id',
                'CONCAT (parceiros.parceiro_nome, " ", parceiros.parceiro_sobrenome) as parceiro_nome_completo',
                'formas_pagamentos.forma_pagamento_id',
                'formas_pagamentos.forma_pagamento_nome as forma_pagamento',
            ]);
            //Aqui faz as ligações com LEFT JOIN nas tabelas (vendas, parceiros e formas_pagamentos)
            $this->db->join('parceiros', 'parceiro_id = ordem_servico_parceiro_id', 'LEFT');
            $this->db->join('formas_pagamentos', 'forma_pagamento_id = ordem_servico_forma_pagamento_id', 'LEFT');
            
            if ($data_inicial && $data_final) {
                // Só verificar no elemento data, ignora a horas, por isso do 1 ao 10 (caracter)
                $this->db->where("SUBSTR(ordem_servico_data_emissao, 1, 10) >= '$data_inicial' AND SUBSTR(ordem_servico_data_emissao, 1, 10) <= '$data_final'");
            } else {
                $this->db->where("SUBSTR(ordem_servico_data_emissao, 1, 10) >= '$data_inicial'");
            }
            return $this->db->get('ordens_servicos')->result();
        }
        
        public function get_valor_final_relatorio($data_inicial = NULL, $data_final = NULL) {
            $this->db->select([
                'FORMAT(SUM(REPLACE(ordem_servico_valor_total, ",", "")), 2) as ordem_servico_valor_total',
            ]);
            if ($data_inicial && $data_final) {
                // Só verificar no elemento data, ignora a horas, por isso do 1 ao 10 (caracter)
                $this->db->where("SUBSTR(ordem_servico_data_emissao, 1, 10) >= '$data_inicial' AND SUBSTR(ordem_servico_data_emissao, 1, 10) <= '$data_final'");
            } else {
                $this->db->where("SUBSTR(ordem_servico_data_emissao, 1, 10) >= '$data_inicial'");
            }
            return $this->db->get('ordens_servicos')->row();
        }
        /* FIM - Usado no relatório de os */
    }
        