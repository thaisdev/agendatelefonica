<?php
    /**
     * Contato
     * Classe do controller responsável pelo CRUD de contatos
     * @author Thaís Oliveira
     * @since 07/2018
     */
    class Contatos extends CI_Controller{

        /**
         * __construct
         * Método construtor da classe sobrescreve construtor da classe pai
         * @author Thaís
         * @since 07/2018
         */
        public function __construct(){
            parent::__construct();
            //$this->load->model("Contatos_model");
        }

        /**
         * __loadView
         * Exibe o arquivo html informado entre os templates de header e footer
         * @author Thaís
         * @since 07/2018
         * @param String view
         * @see index | adicionar | editar
         */
        private function __loadView($view){
            // carrega o helper da url
            $this->load->helper('url');
            // adiciona o html do header
            $this->load->view('templates/header');
            // adiciona a página de conteúdo
            $this->load->view('contatos/'.$view);
            // adiona o html do footer
            $this->load->view('templates/footer');
        }

        /**
         * index
         * Método inicial que exibe a view de listagem de contatos
         * @author Thaís
         * @since 07/2018
         */
        public function index(){
            $this->load->model('Contatos_model');
            $retorno = $this->Contatos_model->get();
            var_dump($retorno);
            // carrega a view de listagem de contatos
            $this->__loadView('lista');
        }
        /**
         * __setValidation
         * Define a validação dos campos do formulário
         * @author thaís
         * @since 07/2018
         */
        private function __setValidation(){
            // define as regras de validação para os campos
            $validation = array(
                array(
                    'field' => "nome",
                    'label' => "nome",
                    'rules' => "required"
                ),
                array(
                    'field' => "telefone",
                    'label' => "telefone",
                    'rules' => "required"
                ),
            );
            // carrega o helper de validação do formulario e adiciona as regras
            $this->load->library('form_validation');
            $this->form_validation->set_rules($validation);
            $this->form_validation->set_message('required', 'O campo %s é obrigatório');

            // insere o erro em uma div de erros
            $this->form_validation->set_error_delimiters('<div class="error"><small>', '</small></div>');
        }

        /**
         * adicionar
         * Exibe a view de formulário para adicionar contato
         * @author Thaís
         * @since 07/2018
         */
        public function adicionar(){
            // carrega o helper de formulario para a view
            $this->load->helper('form');
            // carrega a view de formulário de contato
            $this->__loadView('form');
        }

        /**
         * editar
         * Exibe a view do formulário para editar o contato
         * @author Thaís
         * @since 07/2018
         */
        public function editar($id){
            // carrega a view de formulário de contato
            $this->__loadView('form/'.$id);
        }

        /**
         * salvar
         * Salva os dados do contato
         * @author Thaís
         * @since 07/2018
         */
        public function salvar(){
            $this->__setValidation();
            var_dump($this->form_validation->run());
            if($this->form_validation->run()){
                $dados = array(
                    'contato_id' => 0,
                    'desc_nome' => $this->input->post("nome"),
                    'hash_avatar' => "teste"
                );
                $this->load->model('Contatos_model');
                $retorno = $this->Contatos_model->save($dados);
                var_dump($retorno);
            }
            $this->__loadView('form');
        }

    }
?>