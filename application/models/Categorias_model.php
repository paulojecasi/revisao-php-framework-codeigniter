<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias_model extends CI_Controller {

	public $id;
	public $titulo; 

	public function __construct(){

		parent::__construct(); 

	}

	public function listar_categorias(){

		//consulta no banco ondenando pelo titulo (ASC= Crescente, DASC= Decrescente)
		$this->db->order_by('titulo','ASC'); 

		// vamos informar a tabela e trazer o resultado 
		return $this->db->get('categoria')->result(); 

	}


}