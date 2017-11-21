<?php
chdir("../../../Conexao/");
    include_once("Conexao.class.php");
    include_once("../Artigo/Artigo.class.php");
    include_once("../Artigo/ArtigoDAO.class.php");
chdir(dirname(__FILE__));
error_reporting(0);

$idArtigo  = $_GET['idArtigo'];

$Artigo = new Artigo();
$Artigo->excluirArtigoByCod($idArtigo);

header("location: ../?excluiu=true");

?>
