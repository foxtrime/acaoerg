<?php
chdir("Conexao/");
    include_once("../template/templateIndTop.php");
    include_once("Conexao.class.php");
    include_once("../Exemplar/Exemplar.class.php");
    include_once("../Exemplar/ExemplarDAO.class.php");
chdir(dirname(__FILE__));
error_reporting(0);

$idIdioma = $_GET['idIdioma']; // 1 = Port, 2 = Ingl e 3 = Espa
$Exemplar = new Exemplar();
?>
<table border="0" width="98%" cellspacing="5" cellpadding="0"  vspace="0" hspace="0" class="tableConteudo" align="center">
<tr><td class="titulo">Exemplares Publicados:</td></tr>
<tr valign="top">
    <td>
    <table border="0" width="100%" cellspacing="0" cellpadding="0"  vspace="0" hspace="0">
        <tr>
            <td width="300">
            <table border="0" width="100%" cellspacing="0" cellpadding="2"  vspace="0" hspace="0">
            <?php
            $status = "Publicado";
            $dadosEspera = $Exemplar->getExemplarByStatus($status);
            $i = 1;
            foreach($dadosEspera as $dados){
              if($dados['vol'] == "1" && $dados['num'] == "1"){
              }else{
            ?>
            <tr>
                <td
                    class="textMenuEdicoes"
                    id ="<?=$i?>"
                    onMouseOver="javascript:exibir(<?=$dados['vol']?>,<?=$dados['num']?>,<?=$i?>)"
                    onClick="javascript:executar('edicoes/vol<?=$dados['vol']?>n<?=$dados['num']?>/vol<?=$dados['vol']?>n<?=$dados['num']?>.php'),exibirOnClick(<?=$dados['vol']?>,<?=$dados['num']?>,<?=$i?>)"
                    onMouseOut="ocultar(<?=$i?>)"
                    <?=$i==1 ? "style='border-top: 3px solid #aaaaaa;'" : ""?>>
                    <div>Volume <?=$dados['vol']?> Número <?=$dados['num']?> &nbsp;&nbsp;(<?=$dados['mes']?> <?=$dados['ano']?>)</div>
                    <div><b><?=$dados['nome']?></b></div>
                </td>
            </tr>
            <?php $i++; }} ?>
            </table>
            </td>
            <td align="center" id="revista" class="revista"></td>
        </tr>
    </table>
    </td>
</tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="3" valign="top"><a name="container"></a><div id="container"></div></td></tr>
<tr><td colspan="3">&nbsp;</td></tr>
<?php
$status = "Em Espera";
$dadosEspera = $Exemplar->getExemplarByStatus($status);
$resultado = count($dadosEspera);
if($resultado != 0){
    echo "<tr><td colspan='3' class='titulo'>Em Publicação:</td></tr>";
    foreach($dadosEspera as $dados){ ?>
    <tr class="text">
        <td>
        Volume <?=$dados['vol']?> Número <?=$dados['num']?>&nbsp;&nbsp;(<?=$dados['mes']?> <?=$dados['ano']?>)<br>
        <?=$dados['nome']?>
        </td>
    </tr>
<?php }} ?>
</table>
<script language="javascript"> selecionar(5); </script>
<?php
chdir("Conexao/");
    include_once("../template/templateIndDown.php");
chdir(dirname(__FILE__));
error_reporting(0);
?>
