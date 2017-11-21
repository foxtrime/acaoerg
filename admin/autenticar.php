<?php
chdir("../Conexao/");
    include_once("Conexao.class.php");
    include_once("../Users/Users.class.php");
    include_once("../Users/UsersDAO.class.php");
chdir(dirname(__FILE__));
error_reporting(1);

$Users   = new Users();
$user    = strtolower(trim($_POST['usuario']));
$senha   = md5(strtolower(trim($_POST['senha'])));

$listaDeUser = $Users->getUserByUserSenha($user, $senha);

if(isSet($listaDeUser[nome])){
  
  session_start();
  
  $_SESSION[nome] = $listaDeUser[nome];
  $_SESSION[tipo] = $listaDeUser[tipo];
  
  Header("Location: home/");
}
else{
  Header("Location: indexErro.php");
}
?>
