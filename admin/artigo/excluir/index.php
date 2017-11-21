<?php
header('Content-Type: text/html; charset=ISO-8859-1');
chdir("../../../Conexao/");
    include_once("Conexao.class.php");
    include_once("../Artigos/Artigos.class.php");
    include_once("../Artigos/ArtigosDAO.class.php");
chdir(dirname(__FILE__));
error_reporting(0);

$idArtigo  = $_GET['idArtigo'];

$Artigos = new Artigos();

$dados = $Artigos->getArtigosByCod($idArtigo);

unlink("../cadastrar/artigos/".$dados['arquivo']);

$Artigos->excluirArtigoByCod($idArtigo);

header("location: ../?excluiu=true");
?>