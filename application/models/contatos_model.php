<?php
    /**
     * Model Contatos_model
     * Classe responsável pelo model do CRUD de contatos
     * @author Thaís Oliveira
     * @since 07/2018
     */
    class Contatos_model extends CI_Model {

        // nome da tabela no BD
        private $__table = "contatos";
        // nome do campo identificador da tabela
        private $__table_id = "contato_id";
        // lista dos nomes dos campos no BD e definição de seus apelidos utilizados no model/controller
        private $__fields = array(
            'Nome' => "desc_nome",
            'Avatar' => "hash_avatar"
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
         * Devolve uma lista dos contatos do BD
         * @author Thaís Oliveira
         * @since 07/2018
         */
        public function get($where = array()){
            // monta o select com inner join
            $this->db->select('*');    
            $this->db->from($this->__table);
            $this->db->join('telefones', 'telefones.contato_id = contatos.contato_id');
            // faz a busca com where se necessário
            if($where){
                $query = $this->db->get_where($this->__table, $where);
            } else {
                $query = $this->db->get();
            }
            // agrupa o resultado e retorna
            return $this->__groupResults($query->result_array());
        }

        /**
         * __groupResults
         * Agrupa os resultados pelo id do contato
         * @author Thaís Oliveira
         * @since 07/2018
         */
        private function __groupResults($rows){
            // inicializa o array de retorno
            $dados = array();
            // itera o array de resultados
            foreach($rows as $row){
                // adiciona os dados do registro no array de retorno, colocando o contato_id como chave
                $dados[$row["contato_id"]]["nome"] = $row["desc_nome"];
                $dados[$row["contato_id"]]["telefones"][$row["telefone_id"]]["numero"] = $row["desc_telefone"];
                $dados[$row["contato_id"]]["telefones"][$row["telefone_id"]]["tipo"] = $row["flg_tipo"];
            }
            return $dados;
        }
        
        /**
         * save
         * Salva os dados do contato
         * @author Thaís Oliveira
         * @since 07/2018
         */
        public function save($dados){
            if ($dados["contato_id"]){
                return $this->db->replace($this->__table, $dados);
            }
            $this->db->insert($this->__table, $dados);
            return $this->db->insert_id();
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