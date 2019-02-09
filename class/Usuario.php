<?php 

class Usuario {

	private $idusuario, $login, $senha, $dtcadastro;


	public function __construct($login = "", $senha = ""){
		$this->setLogin($login);
		$this->setSenha($senha);
		$this->setDtcadastro(new DateTime());
	}

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

			$this->setData($results[0]);
		}

	}

	public static function getList(){

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios ORDER BY login;");

	}

	public static function search($login){

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios WHERE login LIKE :SEARCH ORDER BY login", array(
			':SEARCH'=>"%".$login."%"
		));

	}

	public function __toString(){

		return json_encode(array(
			"id"=>$this->getIdusuario(),
			"login"=>$this->getLogin(),
			"senha"=>$this->getSenha(),
			"cadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
		));
	}

	public function login($login, $password){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE login = :LOGIN AND senha = :SENHA", array(
			":LOGIN"=>$login,
			":SENHA"=>$password
		));

		//ou  isset($results))
		if(count($results)>0){

			$this->setData($results[0]);
		}
		else{
			throw new Exception("Login e/ou senha inválidos");

	}
	}	

	public function setData($data){
		$this->setIdusuario($data['id']);
		$this->setLogin($data['login']);
		$this->setSenha($data['senha']);
		$this->setDtcadastro(new DateTime($data['cadastro']));
	}

	public function insert(){
		$sql = new Sql();
								//procedure CALL, se for em SQLserver é EXECUTE
		$results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :SENHA)", array(
			':LOGIN'=>$this->getLogin(),
			':SENHA'=>$this->getSenha()

		));

		if(count($results)>0)
			$this->setData($results[0]);
		else{
			throw new Exception("Falha ao inserir dados");
		}
	}	

	public function update($login, $senha){
		$sql = new Sql();

		$this->setLogin($login);
		$this->setSenha($senha);

		$sql->query("UPDATE tb_usuarios SET login = :LOGIN, senha = :SENHA WHERE id = :ID", array(
			":LOGIN"=>$this->getLogin(),
			":SENHA"=>$this->getSenha(),
			":ID"=>$this->getIdusuario()
		));
	}

	public function delete(){

		$sql = new Sql();

		$sql->query("DELETE FROM tb_usuarios WHERE id = :ID", array(":ID"=>$this->getIdusuario()));

		$this->setIdusuario(0);
		$this->setLogin("");
		$this->setSenha("");
		$this->setDtcadastro(new DateTime());
	}

}

 ?>







