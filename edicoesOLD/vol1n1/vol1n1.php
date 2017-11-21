<?php
chdir("../../Conexao/");
    include_once("Conexao.class.php");
    include_once("../Exemplar/Exemplar.class.php");
    include_once("../Exemplar/ExemplarDAO.class.php");
chdir(dirname(__FILE__));
error_reporting(0);
$idIdioma = $_GET['idIdioma']; // 1 = Port, 2 = Ingl e 3 = Espa
$codExemplar = 1;
$Exemplar = new Exemplar();

$dados = $Exemplar->getExemplarByCod($codExemplar);
?>
<div class="bordaRevista">
<table border="0" width="100%" cellspacing="3" cellpadding="0" vspace="0" hspace="0">
<tr>
    <td>
    <p class="tituloB"><?=$dados['nome']?></p>
    <p class="titulo">Volume <?=$dados['vol']?>, N&uacute;mero <?=$dados['num']?>, <?=$dados['mes']?>/<?=$dados['ano']?> ISSN <?=$dados['issn']?><br />
    <?=$dados['entid']?></p>
    </td>
</tr>
</table>
</div>
