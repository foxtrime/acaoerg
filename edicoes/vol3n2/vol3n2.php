<?php
chdir("../../Conexao/");
    include_once("Conexao.class.php");
    include_once("../Exemplar/Exemplar.class.php");
    include_once("../Exemplar/ExemplarDAO.class.php");
    include_once("../Artigo/Artigo.class.php");
    include_once("../Artigo/ArtigoDAO.class.php");
chdir(dirname(__FILE__));
error_reporting(0);
$idIdioma = $_GET['idIdioma']; // 1 = Port, 2 = Ingl e 3 = Espa
$codExemplar = 11;

$Exemplar = new Exemplar();
$Artigo   = new Artigo();

$dadosExemplar = $Exemplar->getExemplarByCod($codExemplar);
$dadosArtigo   = $Artigo->getArtigosByCodExemplar($codExemplar);
?>
<div class="bordaRevista">
<table border="0" width="100%" cellspacing="3" cellpadding="0" vspace="0" hspace="0">
<tr>
    <td>
    <p class="tituloB"><?=$dadosExemplar['nome']?></p>
    <p class="titulo">Volume <?=$dadosExemplar['vol']?>, N&uacute;mero <?=$dadosExemplar['num']?>, <?=$dadosExemplar['mes']?>/<?=$dadosExemplar['ano']?> ISSN <?=$dadosExemplar['issn']?><br />
    <?=$dadosExemplar['entid']?></p>
    </td>
</tr>
<tr><td class="divisoria"></td></tr>
<tr>
    <td>
    <table border="0" width="100%" cellspacing="0" cellpadding="3" vspace="0" hspace="0">
    <tr>
        <td class="titulo">Artigo / Autor</td>
        <td class="titulo" width="55">Visualizar Resumo</td>
        <td class="titulo" width="45">Baixar Artigo</td>
    </tr>
    <?php
    $i = 0;
    foreach($dadosArtigo as $dados){
    $fundo = $i%2==0 ? "#eeeeee" : "#dddddd";
     ?>
    <tr bgcolor ="<?=$fundo?>">
        <td><div class="text"><?=$dados['tit']?></div><div class="autor"><?=$dados['aut']?></div></td>
        <td align="center" class="pointer" onClick="javascript:pop(<?=$dados['codArtigo']?>)"><img src="img/lupa.gif" border="0"></td>
        <td align="center"><a href="edicoes/vol3n2/artigos/<?=$dados['codArtigo']?>.pdf" target="_blank"><img src="img/pdf.jpg" border="0"></a></td>
    </tr>
    <?php $i++; } ?>
    </table>
    </td>
</tr>
</table>
</div>
