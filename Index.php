<?php 

require_once("config.php");

/*$sql= new Sql();
$usuarios = $sql->select("SELECT * FROM tb_usuarios");
echo json_encode($usuarios);*/

//Carrega um usuário
//$root = new Usuario();
//$root->loadById(1);
//echo $root;

//Carrega uma lista de usuários
//$lista = Usuario::getList();
//echo json_encode($lista);

//Carrega uma lista de usuários buscando pelo login
//$search = Usuario::search("ana");
//echo json_encode($search);

//Carrega um usuário usando o login e a senha
//$usuario = new Usuario();
//$usuario->login("USER","123");
//var_dump($usuario);

//Criando um novo usuario
//$aluno = new Usuario("cont", "233rdq");
//$aluno->insert();

//var_dump ($aluno);

$usuario = new Usuario();
$usuario->loadById(4);
$usuario->update("professor", "1234");

//var_dump($usuario);

echo $usuario;

 ?>