<?php
header('Content-Type: text/html; charset=ISO-8859-1');
chdir("./Conexao/");
    include_once("Conexao.class.php");
    include_once("../Exemplares/Exemplares.class.php");
    include_once("../Exemplares/ExemplaresDAO.class.php");
    
    include_once("../Artigos/Artigos.class.php");
    include_once("../Artigos/ArtigosDAO.class.php");
    
chdir(dirname(__FILE__));
error_reporting(0);

$idIdioma = $_GET['idIdioma']; // 1 = Port, 2 = Ingl e 3 = Espa

$codExemplar = $_POST['idExemplar'];

$Exemplares = new Exemplares();
$Artigos    = new Artigos();

$dados 		   = $Exemplares->getExemplarByCod($codExemplar);
$dadosArtigo   = $Artigos->getArtigosByCodExemplar($codExemplar);

?>
<div class="bordaRevista">
<table border="0" width="100%" cellspacing="3" cellpadding="0" vspace="0" hspace="0">
<tr>
    <td align="center">
    <p class="tituloB"><?=$dados['nome']?></p>
    <p class="titulo">Volume <?=$dados['vol']?>, N&uacute;mero <?=$dados['num']?>, <?=$dados['mes']?>/<?=$dados['ano']?> ISSN <?=$dados['issn']?><br />
    <?=$dados['entid']?></p>
    </td>
    <td align="right" width="160"><img src="./admin/exemplar/cadastrar/capa/<?=$dados['capa']?>" width="150"></td>
</tr>
<tr><td colspan="2" class="divisoria"></td></tr>
<tr>
    <td colspan="2">
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
        <td align="center"><a href="./admin/artigo/cadastrar/artigos/<?=$dados['arquivo']?>" target="_blank"><img src="img/pdf.jpg" border="0"></a></td>
    </tr>
    <?php $i++; } ?>
    </table>
    </td>
</tr>
</table>
</div>