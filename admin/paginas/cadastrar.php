<?php
header('Content-Type: text/html; charset=ISO-8859-1');
chdir("../../Conexao/");
    include_once("Conexao.class.php");
    include_once("../Pagina/Pagina.class.php");
    include_once("../Pagina/PaginaDAO.class.php");
chdir(dirname(__FILE__));
//error_reporting(0);
$Pagina = new Pagina();
$listaDePaginas = $Pagina->getPaginas();

if(isSet($_POST['cadastrou'])){
    $Pagina->cadastrar($_POST['pagina']);
    header("location: ./cadastrar.php?cadastrou=true");
}
include("../template/templateTopAdmin.php");

if($_SESSION['tipo'] == 'manda_chuva'){

?>
<table border="0" width="100%" cellspacing="5" cellpadding="0"  vspace="0" hspace="0" align="center">
<tr><td class="tituloB" colspan="2">Cadastro de Páginas</td><tr>
<tr><td class="titulo" colspan="2">Cadastrar nova página</td></tr>
<form method="post" action="./cadastrar.php">
<tr>
    <td class="textAdmin" style="text-align: right;" width="20%">
    <input type="hidden" name="cadastrou" value="true" />
    Página:
    </td>
    <td><input type="text" name="pagina" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')" /></td>
<tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2"><input type="submit" value="Cadastrar Página" /></td></tr>
</tr>
</form>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2"><?=isSet($_GET['cadastrou'])?"<p class='textAdminMensagem'>Página cadastrada com sucesso!</p>":""?></td><tr>
<tr><td colspan="2">&nbsp;</td><tr>
<tr><td colspan="2" class="titulo">Lista de páginas</td><tr>
<tr>
    <td class="bordaRevista">
    <table border="0" width="100%" cellspacing="3" cellpadding="0"  vspace="0" hspace="0">
        <tr class="textAdmin">
            <th>ID</th>
            <th>Página</th>
        </tr>
        <?php
        $i = 0;
        foreach($listaDePaginas as $idPagina=> $pagina){
        $fundo = $i%2==0 ? "#ffffff" : "#dddddd";
        ?>
        <tr bgcolor="<?=$fundo?>"  align="center" class="textAdmin">
            <td><?=$idPagina?></td>
            <td><?=$pagina?></td>
        </tr>
        <?php $i++; } ?>
    </table>
    </td>
    <td>&nbsp;</td>
</tr>
<tr><td colspan="2">&nbsp;</td><tr>
<tr><td colspan="2"><a href="../home">Voltar</a></td><tr>
</table>
<?php }
else{
?>
<table border="0" width="100%" cellspacing="5" cellpadding="0"  vspace="0" hspace="0" align="center">
<tr height="50"><td class="msgErro">Você não tem permissão para acessar esta opção...</td><tr>
<tr height="30"><td><a href='../home/'>Voltar</a></td></tr>
</table>
<?php } ?>
<script language="javascript"> selecionar(2); </script>
<?php
include("../template/templateDownAdmin.php");
?>
