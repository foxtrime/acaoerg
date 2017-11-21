<?php
chdir("../../../Conexao/");
    include_once("Conexao.class.php");
    include_once("../Pagina/Pagina.class.php");
    include_once("../Pagina/PaginaDAO.class.php");
chdir(dirname(__FILE__));
error_reporting(0);

$idPagina = $_POST['idPagina'];
$texto_pt = $_POST['texto_pt'];
$texto_en = $_POST['texto_en'];
$texto_es = $_POST['texto_es'];

$Pagina = new Pagina();
$Pagina->cadastrarTextos($texto_pt, $texto_en, $texto_es, $idPagina);

header("location: ../?idPagina=".$idPagina."&cadastrou=true");



?>
