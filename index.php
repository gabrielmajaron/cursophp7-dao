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


$usuario = new Usuario();
$usuario->login("admin","admin");

echo $usuario;

 ?>	