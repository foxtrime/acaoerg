<?php
chdir("../../../Conexao/");
    include_once("Conexao.class.php");
    include_once("../Resumo/Resumo.class.php");
    include_once("../Resumo/ResumoDAO.class.php");
chdir(dirname(__FILE__));
error_reporting(0);

$idResumo = $_GET['idResumo'];

//echo $idResumo;

$Resumo = new Resumo();
$Resumo->excluirResumoByCod($idResumo);

header("location: ../?excluiu=true");
?>
