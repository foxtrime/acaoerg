<?php
chdir("../../../Conexao/");
    include_once("Conexao.class.php");
    include_once("../Pagina/Pagina.class.php");
    include_once("../Pagina/PaginaDAO.class.php");
chdir(dirname(__FILE__));
error_reporting(0);

$idTexto  = $_GET['idTexto'];
$idPagina = $_GET['idPagina'];

$Pagina = new Pagina();
$Pagina->excluirTextosById($idTexto);

header("location: ../?idPagina=".$idPagina."&excluiu=true");



?>
