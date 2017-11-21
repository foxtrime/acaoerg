<?php
chdir("../../../Conexao/");
    include_once("Conexao.class.php");
    include_once("../Exemplares/Exemplares.class.php");
    include_once("../Exemplares/ExemplaresDAO.class.php");
chdir(dirname(__FILE__));
error_reporting(0);

$codExemplar  = $_GET['idExemplar'];

$Exemplares = new Exemplares();

$dados = $Exemplares->getExemplarByCod($codExemplar);

unlink("../cadastrar/capa/".$dados['capa']);

$Exemplares->excluirExemplarByCod($codExemplar);

header("location: ../?excluiu=true");
?>