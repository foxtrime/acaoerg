<?php
header('Content-Type: text/html; charset=ISO-8859-1');
chdir("../../../Conexao/");
    include_once("Conexao.class.php");
    include_once("../Artigo/Artigo.class.php");
    include_once("../Artigo/ArtigoDAO.class.php");
chdir(dirname(__FILE__));
error_reporting(0);

$codExemplar = $_POST['codExemplar'];
$tit         = $_POST['titulo'];
$aut         = $_POST['autores'];
$pagInicial  = $_POST['pagInicial'];
$pagFinal    = $_POST['pagFinal'];
$palChave    = $_POST['palChave'];
$status      = $_POST['status'];

$Artigo = new Artigo();
$Artigo->cadastrar($codExemplar, $tit, $aut, $pagInicial, $pagFinal, $palChave, $status);

header("location: ../?cadastrou=true");

?>
