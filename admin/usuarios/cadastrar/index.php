<?php
chdir("../../../Conexao/");
    include_once("Conexao.class.php");
    include_once("../Users/Users.class.php");
    include_once("../Users/UsersDAO.class.php");
chdir(dirname(__FILE__));
error_reporting(0);

$login    = $_POST['login'];
$senha    = md5(strtolower(trim($_POST['senha'])));
$nome     = $_POST['nome'];
$formacao = $_POST['formacao'];
$local    = $_POST['localTrabalho'];
$email    = $_POST['email'];
$tipo     = $_POST['tipo'];

$Users = new Users();
$Users->cadastrar($login, $senha, $nome, $formacao, $local, $email, $tipo);

header("location: ../?cadastrou=true");

?>
