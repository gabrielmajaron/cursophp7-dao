<?php 

class Usuario {

	private $idusuario, $login, $senha, $dtcadastro;

	public function getIdusuario()
	{
	    return $this->idusuario;
	}
	 
	public function setIdusuario($idusuario)
	{
	    $this->idusuario = $idusuario;
	    return $this;
	}

	public function getLogin()
	{
	    return $this->login;
	}
	 
	public function setLogin($login)
	{
	    $this->login = $login;
	    return $this;
	}

	public function getSenha()
	{
	    return $this->senha;
	}
	 
	public function setSenha($senha)
	{
	    $this->senha = $senha;
	    return $this;
	}

	public function getDtcadastro()
	{
	    return $this->dtcadastro;
	}
	 
	public function setDtcadastro($dtcadastro)
	{
	    $this->dtcadastro = $dtcadastro;
	    return $this;
	}

	public function loadById($id)
	{
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE id = :ID", array(
			":ID"=>$id
		));

		//ou  isset($results))
		if(count($results)>0){
			$row = $results[0];

			$this->setIdusuario($row['id']);
			$this->setLogin($row['login']);
			$this->setSenha($row['senha']);
			$this->setDtcadastro(new DateTime($row['cadastro']));
		}

	}

	public function __toString(){

		return json_encode(array(
			"id"=>$this->getIdusuario(),
			"login"=>$this->getLogin(),
			"senha"=>$this->getSenha(),
			"cadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
		));
	}


}

 ?>







