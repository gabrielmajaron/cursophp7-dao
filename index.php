<?php 

require_once("config.php");

// sem DAO
//$sql = new Sql();
//$usuarios = $sql->select("SELECT * FROM tb_usuarios");
//echo json_encode($usuarios);

// com DAO
// carrega 1 registro
//$usu = new Usuario();
//$usu->loadById(1);
//echo $usu;

// Carrega uma lista de usuarios
// metodo estatico
//$lista = Usuario::getList();
//echo json_encode($lista);

// Carrega uma lista de usuarios buscando pelo login (que contenha "a")
//$search = Usuario::search("a");
//echo json_encode($search);

// carrega usuario verificando o usuario e senha
//$usuario = new Usuario();
//$usuario->login("admin","admin");
//echo $usuario;

//$aluno = new Usuario();
//$aluno->setLogin("aluno");
//$aluno->setSenha("123456");
//$aluno->insert(); // obs. internamente é chamado uma procedure!
//echo $aluno;


// update
//$usuario->loadById(2);
//$usuario->update("professor","!@#¨!@#");
//echo $usuario;


//delete com busca (podemos usar também o loadById) $aluno->loadById(2);
//$alunos = Usuario::search("aluno");
//if(isset($alunos))
//{
	//$aluno = new Usuario("","");
	//$aluno->setIdUsuario($alunos[0]["id"]);
//
	//$aluno->delete();
	//echo "Deletou";
//}
//else
	//echo "Usuario \"Aluno\" não encontrado";



 ?>	