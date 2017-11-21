<?php
include("../template/templateTopAdmin.php");
?>
<?php
header('Content-Type: text/html; charset=ISO-8859-1');
chdir("../../Conexao/");
    include_once("Conexao.class.php");
    include_once("../Artigo/Artigo.class.php");
    include_once("../Artigo/ArtigoDAO.class.php");
    include_once("../Resumo/Resumo.class.php");
    include_once("../Resumo/ResumoDAO.class.php");
chdir(dirname(__FILE__));
error_reporting(0);

$Artigo = new Artigo();
$Resumo = new Resumo();

$dados = $Resumo->getResumo();
?>
<table border="0" width="100%" cellspacing="5" cellpadding="0"  vspace="0" hspace="0" align="center" style="
    background-color: #eeeeee;
">
<tr><td colspan="2" class="tituloB">Cadastro de Resumos</td></tr>
<tr><td colspan="2" class="titulo">Cadastrar novo Resumo</td></tr>
<form method="post" action="./cadastrar/index.php">
<tr>
    <td class="textAdmin" style="text-align: right;">Resumo:</td>
    <td><textarea name="resumo" cols="50" rows="6" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"></textarea></td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;">E-mail:</td>
    <td><textarea name="email" cols="50" rows="1" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"></textarea></td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;">ID Artigo:</td>
    <td><textarea name="idArtigo" cols="50" rows="1" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"></textarea></td>
</tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2"><input type="submit" value="Cadastrar Resumo" /></td></tr>
</form>
<tr><td colspan="2">&nbsp;</td></tr>
<tr>
    <td colspan="2">
    <?=$_GET['cadastrou']?"<p class='textAdminMensagem'>Resumo cadastrado com sucesso!</p>":""?>
    <?=$_GET['alterou']?"<p class='textAdminMensagem'>Resumo alterado com sucesso!</p>":""?>
    <?=$_GET['excluiu']?"<p class='textAdminMensagem'>Resumo excluido com sucesso!</p>":""?>
    </td>
</tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2" class="titulo">Lista de Resumos</td></tr>
<tr>
    <td colspan="2" class="bordaRevista">
    <table border="0" width="100%" cellspacing="3" cellpadding="0"  vspace="0" hspace="0">
        <tr align="center" class="textAdmin">
            <th>ID</th>
            <th>Título</th>
            <th>Autores</th>
            <th>Resumo</th>
            <th>E-mail</th>
            <th>ID Artigo</th>
            <th>Editar</th>
            <?php
                if($_SESSION[tipo] == "manda_chuva"){
                  echo "<th>Excluir</th>";
                }
            ?>
        </tr>
        <?php
        $i = 0;
        foreach($dados as $dados){
        $fundo = $i%2==0 ? "#ffffff" : "#dddddd";
        ?>
        <tr bgcolor="<?=$fundo?>" align="center" class="textAdmin">
            <td><?=$dados['id']?></td>
            <td><?=$dados['tit']?></td>
            <td><?=$dados['aut']?></td>
            <td><?=$dados['resumo']?></td>
            <td><?=$dados['email']?></td>
            <td><?=$dados['idArtigo']?></td>
            <td><a href="alterar.php?idArtigo=<?=$dados['idArtigo']?>">Editar</a></td>
            <?php
                if($_SESSION[tipo] == "manda_chuva"){
                  echo "<td><a href='#' onclick='javascript:confirmar(\"excluir/?idResumo=\" , ".$dados['id'].")'>Excluir</a></td>";
                }
            ?>
        </tr>
        <?php $i++; } ?>
    </table>
    </td>
</tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2"><a href="../home">Voltar</a></td></tr>
</table>
<script language="javascript"> selecionar(6); </script>
<?php
include("../template/templateDownAdmin.php");
?>
