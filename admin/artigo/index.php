<?php
include("../template/templateTopAdmin.php");
?>
<?php
header('Content-Type: text/html; charset=ISO-8859-1');
chdir("../../Conexao/");
    include_once("Conexao.class.php");
    include_once("../Artigos/Artigos.class.php");
    include_once("../Artigos/ArtigosDAO.class.php");
        
    
    include_once("../Exemplares/Exemplares.class.php");
    include_once("../Exemplares/ExemplaresDAO.class.php");
    
chdir(dirname(__FILE__));
error_reporting(0);

$Artigos = new Artigos();

$Exemplares = new Exemplares();

$listaDeExemplares = $Exemplares->getExemplares();

$dados = $Artigos->getArtigosBloco();
?>
<table border="0" width="100%" cellspacing="5" cellpadding="0"  vspace="0" hspace="0" align="center" style="
    background-color: #eeeeee;
">
<tr><td colspan="2" class="tituloB">Cadastro de Artigos</td></tr>
<tr><td colspan="2" class="titulo">Cadastrar novo Artigo</td></tr>
<tr>
	<td colspan="2">
		<?=$_GET['arquivo']?"<p class='msgErroForm'>Insira um Artigo!</p>":""?>
	</td>
</tr>
<form method="post" action="./cadastrar/index.php" enctype="multipart/form-data">
<tr>
    <td class="textAdmin" style="text-align: right;">Exemplar:</td>
    <td>	
	<select name="codExemplar" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')">	
	<?php
	foreach($listaDeExemplares as $idExemplar=> $exemplar){
	?>
	<option value="<?=$idExemplar?>"><?=$exemplar['nome']?></option>
	<?php } ?>
	</select>	
	</td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;">Título:</td>
    <td><textarea name="titulo" cols="50" rows="2" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"></textarea></td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;">Email:</td>
    <td><textarea name="email" cols="50" rows="2" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"></textarea></td>
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
    <td class="textAdmin" style="text-align: right;">Resumo:</td>
    <td><textarea name="resumo" cols="50" rows="12" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"></textarea></td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;">Palavras Chave:</td>
    <td>
    <select name="status" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')">
        <!-- <option value="Em Espera">Em Espera</option> -->
        <option value="Publicado">Publicado</option>
    </select>
    </td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;">Arquivo (PDF):</td>
    <td><input type = "file" name = "arquivo" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')" /></td>
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
            <!--<th>ID</th>-->
            <th>Exemplar</th>
            <th>Título</th>
            <th>Autores</th>
            <th>email</th>
            <th>Página</th>
            <th>Pal. Chave</th>
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
            <!--<td><?=$idArtigos?></td>-->
            <td><?=$dados['codExemplar']?></td>
            <td><a href="./cadastrar/artigos/<?=$dados['arquivo']?>"><?=$dados['tit']?></a></td>
            <td><?=$dados['aut']?></td>
            <td><?=$dados['email']?></td>
            <td><?=$dados['pagInicial']?> à <?=$dados['pagFinal']?></td>
            <td><?=$dados['palChave']?></td>
            <td><?=$dados['status']?></td>
            <td><a href="alterar.php?idArtigo=<?=$idArtigos?>">Editar</a></td>
            <?php
                if($_SESSION[tipo] == "manda_chuva"){
                  echo "<td><a href='#' onclick='javascript:confirmar(\"excluir/?idArtigo=\" , ".$idArtigos.")'>Excluir</a></td>";
                }
        
		if($dados['resumo'] != ""){?>
        </tr>
        
        <tr bgcolor="<?=$fundo?>"  class="textAdmin">
			<th>Resumo:</th>
			<td colspan="8"><?=$dados['resumo']?></td>
		</tr>
		<?php } ?>
		
        <tr><td class="divisoria" height="5" colspan="9"></td></tr>
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
