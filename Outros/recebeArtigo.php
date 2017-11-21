<?php
/*
echo "<pre>";
var_dump($_FILES['buscarArquivo']);
echo "</pre>";
*/

$arquivo = $_FILES['buscarArquivo'];

if($arquivo['type'] != "application/msword")
    echo "selecione pdf";
elseif($arquivo['size'] > 1048576)
    echo "muito grande";
else
    copy($arquivo['tmp_name'], "ArtigoEnviado/"); //caminho onde vai ser salvo

?>
