<?php
chdir("../../../Conexao/");
    include_once("Conexao.class.php");
    include_once("../Exemplar/Exemplar.class.php");
    include_once("../Exemplar/ExemplarDAO.class.php");
chdir(dirname(__FILE__));
error_reporting(0);

$codExemplar  = $_GET['idExemplar'];

$Exemplar = new Exemplar();
$Exemplar->excluirExemplarByCod($codExemplar);

header("location: ../?excluiu=true");

?>
