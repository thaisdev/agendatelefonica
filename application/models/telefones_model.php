<?php
    /**
     * Model Telefones_model
     * Classe responsável pelo model do CRUD de telefones
     * @author Thaís Oliveira
     * @since 07/2018
     */
    class Telefones_model extends CI_Model {

        // nome da tabela no BD
        private $__table = "telefones";
        // nome do campo identificador da tabela
        private $__table_id = "telefone_id";
        // lista dos nomes dos campos no BD e definição de seus apelidos utilizados no model/controller
        private $__fields = array(
            'Tipo' => "flg_tipo",
            'Numero' => "num_telefone",
            'ContatoId' => "contato_id"
        );
    
        /**
         * __construct
         * Construtor da classe que sobrescreve o construtor da classe pai do framework
         * @author Thaís Oliveira
         * @since 07/2018
         */
        public function __construct() {
            // Call the Model constructor
            parent::__construct();
        }

        /**
         * get
         * Devolve uma lista dos telefones do BD
         * @author Thaís Oliveira
         * @since 07/2018
         */
        public function get(){
            $query = $this->db->get($this->__table);
            return $query->result_array();
        }
        
        /**
         * save
         * Salva os dados do telefone
         * @author Thaís Oliveira
         * @since 07/2018
         */
        public function save($dados){
            $dados["telefone_id"] = 2;
            if ($dados["telefone_id"]){
                return $this->db->replace($this->__table, $dados);
            }
            return $this->db->insert($this->__table, $dados);
        }

        /**
         * delete
         * Apaga um registro do banco
         * @author Thaís Oliveira
         * @since 07/2018
         */
        public function delete($where){
            return $this->db->delete($this->__table, $where);
        }
    
    }
    
?>