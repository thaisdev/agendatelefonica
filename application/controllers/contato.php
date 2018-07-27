<?php
    class Contato extends CI_Controller{

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
            var_dump($this->input());
            $this->load->view('header');
            $this->load->view('contato-form');
            $this->load->view('footer');
        }

    }
?>