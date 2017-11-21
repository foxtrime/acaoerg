<?php
chdir("../../../Conexao/");
    include_once("Conexao.class.php");
    include_once("../Users/Users.class.php");
    include_once("../Users/UsersDAO.class.php");
chdir(dirname(__FILE__));
error_reporting(0);

$codUsers  = $_GET['idUsers'];

$Users = new Users();
$Users->excluirUsersByCod($codUsers);

header("location: ../?excluiu=true");

?>
