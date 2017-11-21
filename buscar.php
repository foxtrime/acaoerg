<?php
header('Content-Type: text/html; charset=ISO-8859-1');
chdir("Conexao/");
    include_once("../template/templateIndTop.php");
    include_once("Conexao.class.php");
    include_once("../Busca/Busca.class.php");
    include_once("../Busca/BuscaDAO.class.php");
chdir(dirname(__FILE__));
error_reporting(0);
$idIdioma = $_GET['idIdioma']; // 1 = Port, 2 = Ingl e 3 = Espa

$pesquisa = strtolower(trim($_POST['busca']));

$Busca = new Busca();
$dadosBusca = $Busca->getArtigosByBusca($pesquisa);

$resultado = count($dadosBusca);

?>

<table border="0" width="98%" cellspacing="5" cellpadding="0"  vspace="0" hspace="0" class="tableConteudo" align="center">
<tr>
    <td colspan="4" align="right" class="textBuscaTop">
    <?php echo "Encontramos <b>" .$resultado. "</b> resultados para <b>" .$_POST['busca']. "</b>"; ?>
    </td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr><td><div class="bordaRevista">
<table border="0" width="100%" cellspacing="0" cellpadding="5"  vspace="0" hspace="0" class="tableConteudo">
<?php
$i = 0;
foreach($dadosBusca as $buscar){
$fundo = $i%2==0 ? "#eeeeee" : "#dddddd";
?>
<tr class="textBusca" bgcolor="<?=$fundo?>">
    <td rowspan="2"><b>Ano:</b><br><?=$buscar[ano]?></td>
    <td><b>Volume</b> <?=$buscar[vol]?>, <b>Número</b> <?=$buscar[num]?></td>
    <td><b>Palavra Chave:</b><?=$buscar[pal]?></td>
    <td rowspan="2"><b>Pdf:</b><br><a href='edicoes/vol<?=$buscar[vol]?>n<?=$buscar[num]?>/artigos/<?=$buscar[cod]?>.pdf' target='_blank'><img src="img/pdf.jpg" border="0"></a></td>
</tr>
<tr class="textBusca" bgcolor="<?=$fundo?>">
    <td><b>Título:</b><br><?=$Busca->boldBusca($buscar[tit], $pesquisa)?></td>
    <td><b>Autor:</b><br><?=$Busca->boldBusca($buscar[aut], $pesquisa)?></td>
</tr>
<?php $i++; }
/******************
** Paginacao

$maximoRegistrosPorPagina = 5;
$quantidadePaginas = ceil($resultado / $maximoRegistrosPorPagina); // ceil Arredonda pra cima

if(!isSet($_GET['pagina'])){
    $inicio   = 0;
    $pagina   = 1;
} else {
    $pagina   = $_GET['pagina'];
    $inicio   = ($pagina-1) * $maximoRegistrosPorPagina;
}

echo "<tr>";

echo "<td class='textoHomeTitulo' width='22%'>Páginas: ";
for($i = 1; $i <= $quantidadePaginas; $i++){
  if($i == $pagina) echo " " . $i . " ";
  else echo "<a href='./?pagina=".$i."'>".$i."</a> ";
}

********************/
?>


</td></tr></table></div></td></tr>
</table>
<?php
chdir("Conexao/");
    include_once("../template/templateIndDown.php");
chdir(dirname(__FILE__));
error_reporting(0);
?>
