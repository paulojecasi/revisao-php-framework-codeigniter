<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publicacoes_model extends CI_Model {

	public $id;
	public $categoria; 
	public $titulo;
	public $subtitulo;
	public $conteudo;
	public $data; 
	public $img;
	public $user; 


	public function __construct(){

		parent::__construct(); 

	}

	public function destaques_home(){

		// aqui vamos informar quantas informações(linhas) da tabela será listados
		$this->db->limit(4); 

		//consulta no banco ondenando pelo titulo (ASC= Crescente, DESC= Decrescente)
		$this->db->order_by('data','DESC');  

		// vamos informar a tabela e trazer o resultado 
		return $this->db->get('postagens')->result();

	}


}