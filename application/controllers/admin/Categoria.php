<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class categoria extends CI_Controller {

	public function __construct()
	{

		parent::__construct(); 

				// vamos chamar o model "Categorias_model" para listagem dos models cadastrados
				// como fosse:
				// modelcategorias = new Categorias_model(); 
		$this->load->model('categorias_model','modelcategorias');

				// vamos cria uma var "$categorias" e carrega-la com o resultado 
		$this->categorias = $this->modelcategorias->listar_categorias(); 

	}

	public function index()
	{

		// vamos carregar a biblioteca de TABELAS
		$this->load->library('table'); 

		$dados['categorias'] = $this->categorias; 

		// dados a serem enviados para o cabeçalho
		$dados['titulo'] 		= 'Painel de Controle';
		$dados['subtitulo'] = 'Categoria';

		$this->load->view('backend/template/html-header', $dados);
		$this->load->view('backend/template/template');
		$this->load->view('backend/categoria');
		$this->load->view('backend/template/html-footer'); 

	}

	public function inserir()
	{
		// validar form
		$this->load->library('form_validation');
		$this->form_validation->set_rules(
		'txt-categoria',        // id do input (template)
		'Nome da Categoria',		// nome da label (template)
		'required|min_length[3]|is_unique[categoria.titulo]'); //requerido|minimo 3 caract|
																													 //unico(nao repete o titulo
				
		if ($this->form_validation->run() == FALSE){

			$this->index();   // se nao validar, retorna para a pagina

		} else {

			$addcategoria_titulo= $this->input->post('txt-categoria');

			if ($this->modelcategorias->adicionar($addcategoria_titulo)){

				$mensagem ="Categoria Adicionada Com Sucesso !"; 

				// usando seção da framework (session)
				$this->session->set_userdata('mensagem',$mensagem); 

			} else {

				$mensagem = "Houve um erro ao adicionar Categoria !"; 

				$this->session->set_userdata('mensagemErro',$mensagem); 

			}


			redirect(base_url('admin/categoria'));

		}

	}

	public function excluir($id){

			if ($this->modelcategorias->excluir($id)){

				$mensagem ="Categoria Excluida Com Sucesso !"; 

				$this->session->set_userdata('mensagem',$mensagem); 

			} else {

				$mensagem ="Houve um ERRO ao Excluir Categoria !";

				$this->session->set_userdata('mensagemErro',$mensagem); 

			}

			redirect(base_url('admin/categoria'));

	}

}
