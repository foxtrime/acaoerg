<?php
chdir("../../../Conexao/");
    include_once("Conexao.class.php");
    include_once("../Exemplar/Exemplar.class.php");
    include_once("../Exemplar/ExemplarDAO.class.php");
chdir(dirname(__FILE__));
error_reporting(0);

$nome = $_POST['nome'];
$issn = $_POST['issn'];
$entidade = $_POST['entidade'];
$mes = $_POST['mes'];
$ano = $_POST['ano'];
$numero = $_POST['numero'];
$volume = $_POST['volume'];
$status = $_POST['status'];

$Exemplar = new Exemplar();
$Exemplar->cadastrar($nome, $issn, $entidade, $mes, $ano, $numero, $volume, $status);

header("location: ../?cadastrou=true");

?>
