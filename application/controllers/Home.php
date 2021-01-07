<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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

		$dados['categorias'] = $this->categorias; 

		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/template/home');
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/footer');
		$this->load->view('frontend/template/html-footer'); 

	}


}
