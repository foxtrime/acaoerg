<?php
include("../template/templateTopAdmin.php");
?>
<?php
header('Content-Type: text/html; charset=ISO-8859-1');
chdir("../../Conexao/");
    include_once("Conexao.class.php");
    include_once("../Exemplares/Exemplares.class.php");
    include_once("../Exemplares/ExemplaresDAO.class.php");
chdir(dirname(__FILE__));
//error_reporting(0);
$Exemplares = new Exemplares();

$listaDeExemplares = $Exemplares->getExemplares();
?>
<table border="0" width="100%" cellspacing="5" cellpadding="0"  vspace="0" hspace="0" align="center" style="
    background-color: #eeeeee;
">
<tr><td colspan="2" class="tituloB">Cadastro de Exemplares</td></tr>    
<tr><td colspan="2" class="titulo">Cadastrar novo Exemplar</td></tr>
<tr>
	<td colspan="2">
		<?=isset($_GET['arquivo'])?"<p class='msgErroForm'>Insira uma capa!</p>":""?>
	</td>
</tr>
<form method="post" action="./cadastrar/index.php" enctype="multipart/form-data">
<tr>
    <td class="textAdmin" style="text-align: right;" width="30%">
    <input type="hidden" name="cadastrou" value="true" />Nome do Exemplar:</td>
    <td><input type="text" name="nome" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')" /></td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;">ISSN:</td>
    <td><input type="text" name="issn"  onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')" /></td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;">Entidade Mantenedora:</td>
    <td><input type="text" name="entidade" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')" /></td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;">Mês do Exemplar:</td>
    <td><input type="text" name="mes" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')" /></td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;">Ano do Exemplar:</td>
    <td><input type="text" name="ano" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')" /></td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;">Número do Exemplar:</td>
    <td><input type="text" name="numero" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')" /></td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;">Volume do Exemplar:</td>
    <td><input type="text" name="volume" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')" /></td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;">Status:</td>
    <td>
    <select name="status" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')" />
       <!--  <option value="Em Espera">Em Espera</option> -->
        <option value="Publicado">Publicado</option>
    </select>
    </td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;">Capa:</td>
    <td class="msgErroForm"><input type="file" name="arquivo" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')" /> Tamanho sugerido: 205 X 300 px</td>
</tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2"><input type="submit" value="Cadastrar Exemplar" /></td></tr>
</form>
<tr><td colspan="2">&nbsp;</td></tr>
<tr>
    <td colspan="2">
    <?=isset($_GET['cadastrou'])?"<p class='textAdminMensagem'>Exemplar cadastrado com sucesso!</p>":""?>
    <?=isset($_GET['alterou'])?"<p class='textAdminMensagem'>Exemplar alterado com sucesso!</p>":""?>
    <?=isset($_GET['excluiu'])?"<p class='textAdminMensagem'>Exemplar excluido com sucesso!</p>":""?>
    </td>
</tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2" class="titulo">Lista de Exemplares</td></tr>
<tr>
    <td colspan="2" class="bordaRevista">
    <table border="0" width="100%" cellspacing="3" cellpadding="0"  vspace="0" hspace="0" align="center">
        <tr align="center" class="textAdmin">
            <!--<th>ID</th>-->
            <th>Capa</th>
            <th>Nome</th>
            <th>ISSN</th>
            <th>Entidade Mantenedora</th>
            <th>Mês</th>
            <th>Ano</th>
            <th>Número</th>
            <th>Volume</th>
            <th>Status</th>
            <th>Editar</th>
            <?php
                if($_SESSION['tipo'] == "manda_chuva"){
                  echo "<th>Excluir</th>";
                }
            ?>
        </tr>
        <?php
        $i = 0;
        foreach($listaDeExemplares as $idExemplar=> $exemplar){
        $fundo = $i%2==0 ?  "#ffffff" : "#dddddd";
        ?>
        <tr bgcolor="<?=$fundo?>" align="center" class="textAdmin">
            <!--<td><?=$idExemplar?></td>-->
            <td><img src="cadastrar/capa/<?=$exemplar['capa']?>" width="50"></td>
            <td><?=$exemplar['nome']?></td>
            <td><?=$exemplar['issn']?></td>
            <td><?=$exemplar['entid']?></td>
            <td><?=$exemplar['mes']?></td>
            <td><?=$exemplar['ano']?></td>
            <td><?=$exemplar['num']?></td>
            <td><?=$exemplar['vol']?></td>
            <td><?=$exemplar['status']?></td>
            <td><a href="alterar.php?idExemplar=<?=$idExemplar?>">Editar</a></td>
            <?php
                if($_SESSION['tipo'] == "manda_chuva"){
                  echo "<td><a href='#' onclick='javascript:confirmar(\"excluir/?idExemplar=\" , ".$idExemplar.")'>Excluir</a></td>";
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
<script language="javascript"> selecionar(4); </script>
<?php
include("../template/templateDownAdmin.php");
?>
