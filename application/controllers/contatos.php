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
            // carrega os models utilizados
            $this->load->model("Contatos_model");
        }

        /**
         * __loadView
         * Exibe o arquivo html informado entre os templates de header e footer
         * @author Thaís
         * @since 07/2018
         * @param String view
         * @see index | adicionar | editar
         */
        private function __loadView($view, $dados = array()){
            // inicializa variavel com os parametros do footer
            $footerParams = array('view' => $view);
            // carrega o helper da url
            $this->load->helper('url');
            // adiciona o html do header
            $this->load->view('templates/header');
            // adiciona a página de conteúdo
            $this->load->view('contatos/'.$view, $dados);
            // adiona o html do footer
            $this->load->view('templates/footer', $footerParams);
        }

        /**
         * index
         * Método inicial que exibe a view de listagem de contatos
         * @author Thaís
         * @since 07/2018
         */
        public function index(){
            $contatos = $this->__getAll();
            // carrega a view de listagem de contatos
            $this->__loadView('lista', array('contatos' => $contatos));
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
                )
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
            // busca o contato pelo id
            $contatos = $this->Contatos_model->get(array('contato_id' => $id));
            // carrega o helper de formulario para a view
            $this->load->helper('form');
            // carrega a view de formulário de contato
            $this->__loadView('form', array('contato' => $contatos[0]));
        }

        /**
         * salvar
         * Salva os dados do contato
         * @author Thaís
         * @since 07/2018
         */
        public function salvar(){
            // adiciona a validacao
            $this->__setValidation();
            // inicializa os parametros enviados para a view
            $params = array();
            // valida o formulario
            if($this->form_validation->run()){
                // verifica se foi informado pelo menos um telefone
                $telefones = $this->input->post("telefones");
                if(end($telefones)["tipo"] && end($telefones)["numero"]){
                    // monta os dados para salvar o contato
                    $dados = array(
                        'contato_id' => 0,
                        'desc_nome' => $this->input->post("nome")
                    );
                    // carrega o model de contatos
                    $this->load->model('Contatos_model');
                    // salva os dados do contato
                    $contato_id = $this->Contatos_model->save($dados);
                    // se obteve sucesso
                    if($contato_id){
                        // carrega o model de telefones
                        $this->load->model('Telefones_model');
                        // percorre a lista de telefones para salvar
                        foreach ($telefones as $value) {
                            // monta os dados
                            $telefone = array(
                                'telefone_id' => 0,
                                'contato_id' => $contato_id,
                                'flg_tipo' => $value["tipo"],
                                'desc_telefone' => $value["numero"]
                            );
                            // salva o telefone
                            $this->Telefones_model->save($telefone);
                        }
                        // monta os parametros para a view
                        $params['response'] = true; 
                        $params['msg'] = "Dados salvos com successo!";
                    }
                } else {
                    // informa o erro nos parametros da view
                    $params['response'] = false;
                    $params['msg'] = "Informe pelo menos um telefone";
                }
            }
            $this->__loadView('form', $params);
        }

        /**
         * __getAll
         * Busca todos os contatos no BD
         * @author Thaís Oliveira
         * @since 07/2018
         */
        private function __getAll(){
            // busca os contatos
            return $this->Contatos_model->get();
        }

        /**
         * excluir
         * Exclui um registro pelo id
         * @author Thaís
         * @since 07/2018
         */
        public function excluir($id){
            // monta o where
            $where = array('contato_id' => $id);
            // apaga o contato e os telefones relacionados a ele
            $retorno = $this->Contatos_model->delete($where);
            // retorna a view de listagem com a resposta da exclusão
            $params = array(
                'response' => $retorno,
                'msg' => ( $retorno ? "Registro(s) excluído(s) com sucesso!" : "Falha ao excluir registro(s)!" ),
                'contatos' => $this->__getAll()
            );
            $this->__loadView('lista', $params);
        }

    }
?>