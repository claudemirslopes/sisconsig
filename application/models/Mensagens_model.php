<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Mensagens_model extends CI_Model {

    public function get_all() {
            
            //Array de um select com JOIN na base de dados
            $this->db->select([
                'reclamacoes.*',
                'orcamentos.orc_id',
                'orcamentos.orc_codigo',
                'orcamentos.orc_cli_nome',
                'parceiros.parceiro_id',
                'CONCAT (parceiros.parceiro_nome, " ", parceiros.parceiro_sobrenome) as parceiro_nome_completo',
            ]);
            
            //Aqui faz as ligações com LEFT JOIN nas tabelas (reclamacoes, parceiros_franqueados, parceiros e os)
            $this->db->join('orcamentos', 'orc_id = reclama_orc_id', 'LEFT');
            $this->db->join('parceiros', 'parceiro_id = reclama_cli_id', 'LEFT');
            
            //Retorna todos os resultados na tabela produtos,
            return $this->db->get('reclamacoes')->result();
            
        }
        
    public function get_by_id($reclama_id = NULL) {
            
            //Array de um select com JOIN na base de dados
            $this->db->select([
                'reclamacoes.*',
                'orcamentos.orc_id',
                'orcamentos.orc_codigo',
                'orcamentos.orc_cli_nome',
                'parceiros.parceiro_id',
                'CONCAT (parceiros.parceiro_nome, " ", parceiros.parceiro_sobrenome) as parceiro_nome_completo',
            ]);
            
            $this->db->where('reclama_id', $reclama_id);
            //Aqui faz as ligações com LEFT JOIN nas tabelas (reclamacoes, parceiros_franqueados, parceiros e os)
            $this->db->join('orcamentos', 'orc_id = reclama_orc_id', 'LEFT');
            $this->db->join('parceiros', 'parceiro_id = reclama_cli_id', 'LEFT');
            
            //Retorna todos os resultados na tabela produtos,
            return $this->db->get('reclamacoes')->row();
            
        }

}

