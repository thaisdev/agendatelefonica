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
        public function get(){
            $query = $this->db->get($this->__table);
            return $query->result_array();
        }
        
        /* function get_last_ten_entries()
        {
            $query = $this->db->get('entries', 10);
            return $query->result();
        }
    
        function insert_entry()
        {
            $this->title   = $_POST['title']; // please read the below note
            $this->content = $_POST['content'];
            $this->date    = time();
    
            $this->db->insert('entries', $this);
        }
    
        function update_entry()
        {
            $this->title   = $_POST['title'];
            $this->content = $_POST['content'];
            $this->date    = time();
    
            $this->db->update('entries', $this, array('id' => $_POST['id']));
        } */
    
    }
    
?>