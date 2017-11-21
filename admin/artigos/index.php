<?php
include("../template/templateTopAdmin.php");
?>
<?php
header('Content-Type: text/html; charset=ISO-8859-1');
chdir("../../Conexao/");
    include_once("Conexao.class.php");
    include_once("../Artigo/Artigo.class.php");
    include_once("../Artigo/ArtigoDAO.class.php");
chdir(dirname(__FILE__));
error_reporting(0);

$Artigo = new Artigo();
$dados = $Artigo->getArtigos();
?>
<table border="0" width="100%" cellspacing="5" cellpadding="0"  vspace="0" hspace="0" align="center" style="
    background-color: #eeeeee;
">
<tr><td colspan="2" class="tituloB">Cadastro de Artigos</td></tr>
<tr><td colspan="2" class="titulo">Cadastrar novo Artigo</td></tr>
<form method="post" action="./cadastrar/index.php">
<tr>
    <td class="textAdmin" style="text-align: right;">Código do Exemplar:</td>
    <td><textarea name="codExemplar" cols="50" rows="1" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"></textarea></td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;">Título:</td>
    <td><textarea name="titulo" cols="50" rows="2" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"></textarea></td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;">Autores:</td>
    <td><textarea name="autores" cols="50" rows="2" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"></textarea></td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;">Página Inicial:</td>
    <td><textarea name="pagInicial" cols="50" rows="1" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"></textarea></td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;">Página Final:</td>
    <td><textarea name="pagFinal" cols="50" rows="1" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"></textarea></td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;">Palavras Chave:</td>
    <td><textarea name="palChave" cols="50" rows="1" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"></textarea></td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;">Palavras Chave:</td>
    <td>
    <select name="status" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')">
        <option value="Em Espera">Em Espera</option>
        <option value="Publicado">Publicado</option>
    </select>
    </td>
</tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2"><input type="submit" value="Cadastrar Artigo" /></td></tr>
</form>
<tr><td colspan="2">&nbsp;</td></tr>
<tr>
    <td colspan="2">
    <?=$_GET['cadastrou']?"<p class='textAdminMensagem'>Artigo cadastrado com sucesso!</p>":""?>
    <?=$_GET['alterou']?"<p class='textAdminMensagem'>Artigo alterado com sucesso!</p>":""?>
    <?=$_GET['excluiu']?"<p class='textAdminMensagem'>Artigo excluido com sucesso!</p>":""?>
    </td>
</tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2" class="titulo">Lista de Artigos</td></tr>
<tr>
    <td colspan="2" class="bordaRevista">
    <table border="0" width="100%" cellspacing="3" cellpadding="0"  vspace="0" hspace="0">
        <tr align="center" class="textAdmin">
            <th>ID</th>
            <th>Cód. Exemplar</th>
            <th>Título</th>
            <th>Autores</th>
            <th>Página Inicial</th>
            <th>Página Final</th>
            <th>Palavras Chave</th>
            <th>Status</th>
            <th>Editar</th>
            <?php
                if($_SESSION[tipo] == "manda_chuva"){
                  echo "<th>Excluir</th>";
                }
            ?>
        </tr>
        <?php
        $i = 0;
        foreach($dados as $idArtigos => $dados){
        $fundo = $i%2==0 ? "#ffffff" : "#dddddd";
        ?>
        <tr bgcolor="<?=$fundo?>" align="center" class="textAdmin">
            <td><?=$idArtigos?></td>
            <td><?=$dados['codExemplar']?></td>
            <td><?=$dados['tit']?></td>
            <td><?=$dados['aut']?></td>
            <td><?=$dados['pagInicial']?></td>
            <td><?=$dados['pagFinal']?></td>
            <td><?=$dados['palChave']?></td>
            <td><?=$dados['status']?></td>
            <td><a href="alterar.php?idArtigo=<?=$idArtigos?>">Editar</a></td>
            <?php
                if($_SESSION[tipo] == "manda_chuva"){
                  echo "<td><a href='#' onclick='javascript:confirmar(\"excluir/?idArtigo=\" , ".$idArtigos.")'>Excluir</a></td>";
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
<script language="javascript"> selecionar(5); </script>
<?php
include("../template/templateDownAdmin.php");
?>
