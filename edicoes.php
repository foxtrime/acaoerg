<?php
header('Content-Type: text/html; charset=ISO-8859-1');
chdir("Conexao/");
    include_once("../template/templateIndTop.php");
    include_once("Conexao.class.php");
    include_once("../Exemplares/Exemplares.class.php");
    include_once("../Exemplares/ExemplaresDAO.class.php");
chdir(dirname(__FILE__));
error_reporting(0);



$idIdioma = $_GET['idIdioma']; // 1 = Port, 2 = Ingl e 3 = Espa
$Exemplares = new Exemplares();
?>
<table border="0" width="98%" cellspacing="5" cellpadding="0"  vspace="0" hspace="0" class="tableConteudo" align="center">
<tr><td class="titulo">Exemplares Publicados:</td></tr>
<tr valign="top">
    <td>
    <table border="0" width="100%" cellspacing="0" cellpadding="0"  vspace="0" hspace="0">
        <tr>
            <td>
            <table border="0" width="100%" cellspacing="0" cellpadding="2"  vspace="0" hspace="0">
            <?php
            $status = "Publicado";
            $dadosEspera = $Exemplares->getExemplarByStatus($status);
            foreach($dadosEspera as $idDados=> $dados){
              if($dados['vol'] == "1" && $dados['num'] == "1"){
              }else{
            ?>
            <tr>
                <td                    
                onClick="javascript:exibirConteudoEmContainer('exibirEdicao.php', 'container', 'idExemplar=<?=$idDados?>')"
                class="text"
                style="cursor:pointer;"
				>
					<a href="#container"> <b><?=$dados['nome']?></b> </a> - 	 
	 				<span style="font-size: 9px;">Vol <?=$dados['vol']?> N° <?=$dados['num']?> &nbsp;&nbsp;(<?=$dados['mes']?> <?=$dados['ano']?>)</span>
                </td>
            </tr>
            <tr><td height="5"></td></tr>
            <?php }} ?>
            </table>
            </td>
        </tr>
    </table>
    </td>
</tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="3" valign="top"><a name="container"></a><div id="container"></div></td></tr>
<tr><td colspan="3">&nbsp;</td></tr>
<?php
$status = "Em Espera";
$dadosEspera = $Exemplares->getExemplarByStatus($status);
$resultado = count($dadosEspera);
if($resultado != 0){
    echo "<tr><td colspan='3' class='titulo'>Em Publicação:</td></tr>";
    foreach($dadosEspera as $dados){ ?>
    <tr class="text">
        <td>
        <b><?=$dados['nome']?></b><br>
        Volume <?=$dados['vol']?> Número <?=$dados['num']?>&nbsp;&nbsp;(<?=$dados['mes']?> <?=$dados['ano']?>)
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
