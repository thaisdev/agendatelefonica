<?php
    /**
     * Contato
     * Classe do controller responsável pelo CRUD de contatos
     * @author Thaís Oliveira
     * @since 07/2018
     */
    class Contato extends CI_Controller{

        /**
         * __construct
         */
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            $this->load->view('header');
            $this->load->view('contato-lista');
            $this->load->view('footer');
        }

        public function adicionar(){
            $this->load->view('header');
            $this->load->view('contato-form');
            $this->load->view('footer');
        }

        public function editar($id){
            $this->load->view('header');
            $this->load->view('contato-form');
            $this->load->view('footer');
        }

        public function salvar(){
            var_dump($this->input->post());
            $this->load->view('header');
            $this->load->view('contato-form');
            $this->load->view('footer');
        }

    }
?>