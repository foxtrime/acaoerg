<?php
chdir("../../../Conexao/");
    include_once("Conexao.class.php");
    include_once("../Resumo/Resumo.class.php");
    include_once("../Resumo/ResumoDAO.class.php");
chdir(dirname(__FILE__));
error_reporting(0);

$resumo   = $_POST['resumo'];
$email    = $_POST['email'];
$idArtigo = $_POST['idArtigo'];

//echo $resumo." - ".$email." - ".$idArtigo;

$Resumo = new Resumo();
$Resumo->cadastrar($resumo, $email, $idArtigo);

header("location: ../?cadastrou=true");
?>
