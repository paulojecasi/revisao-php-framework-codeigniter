<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

	public $id;
	public $nome;
	public $email;
	public $img;
	public $historico;
	public $user;
	public $senha;

	public function __construct(){

		parent::__construct(); 

	}

	public function listar_autor($id){
		// selecionar campos/colunas
		$this->db->select('id, nome, historico, img');
		// informar tabela
		$this->db->from('usuario');
		$this->db->where('id ='.$id); 
		return $this->db->get()->result(); 

	}


}