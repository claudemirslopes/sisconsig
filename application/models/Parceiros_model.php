<?php

defined('BASEPATH') OR exit('Ação não permitida');

    class Parceiros_model extends CI_Model {
        
        public function get_all() {
            
            //Array de um select com JOIN na base de dados
            $this->db->select([
                'parceiros.*',
            ]);
            
            $this->db->order_by('parceiros.parceiro_nome', 'ASC');
            
            //Retorna todos os resultados na tabela produtos,
            return $this->db->get('parceiros')->result();
            
        }
    }
        