<?php
header('Content-Type: text/html; charset=ISO-8859-1');
chdir("../../Conexao/");
    include_once("Conexao.class.php");
    include_once("../Artigos/Artigos.class.php");
    include_once("../Artigos/ArtigosDAO.class.php");
        
    
    include_once("../Exemplares/Exemplares.class.php");
    include_once("../Exemplares/ExemplaresDAO.class.php");
	   
    include_once("../Util/Util.class.php");
chdir(dirname(__FILE__));
//error_reporting(0);

$Artigos = new Artigos();
$Exemplares = new Exemplares();
$Util   = new Util();

$listaDeExemplares = $Exemplares->getExemplares();

if(isSet($_POST['alterou'])){
    $Artigos->alterarArtigoByCod($_POST['codArtigo'], $_POST['codExemplar'], $_POST['titulo'], $_POST['email'], $_POST['autores'], $_POST['pagInicial'], $_POST['pagFinal'], $_POST['palChave'], $_POST['resumo'], $_POST['status']);
    header("location: ./?alterou=true");
    die();
}

include("../template/templateTopAdmin.php");

$dados = $Artigos->getArtigosByCod($_GET['idArtigo']);
?>

    <table border="0" width="100%" cellspacing="5" cellpadding="0"  vspace="0" hspace="0" align="center"  style="background-color: #eeeeee;">
    <tr><td colspan="2" class="titulo">Alterar Artigo</td></tr>
    <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
    <tr>
	    <td class="textAdmin" style="text-align: right;">
        <input type="hidden" name="alterou" value="true" />
        <input type="hidden" name="codArtigo" value="<?=$_GET['idArtigo']?>" />
		Exemplar:
		</td>
	    <td>	
		<select name="codExemplar" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')">	
		<?php
		foreach($listaDeExemplares as $idExemplar=> $exemplar){
			if($dados['codExemplar'] == $idExemplar){
		?>
		<option value="<?=$idExemplar?>" selected><?=$exemplar['nome']?></option>		
				
		<?php }else{ ?>
		<option value="<?=$idExemplar?>"><?=$exemplar['nome']?></option>
		<?php }} ?>
		</select>	
		</td>
	</tr>
    <tr>
        <td class="textAdmin" style="text-align: right;">
        Título:
        </td>
        <td><textarea name="titulo" cols="50" rows="2" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"><?=$dados['tit']?></textarea></td>
    </tr>
    <tr>
        <td class="textAdmin" style="text-align: right;">
        Email:
        </td>
        <td><textarea name="email" cols="50" rows="2" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"><?=$dados['email']?></textarea></td>
    </tr>
    <tr>
        <td class="textAdmin" style="text-align: right;">
        Autores:
        </td>
        <td><textarea name="autores" cols="50" rows="2" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"><?=$dados['aut']?></textarea></td>
    </tr>
    <tr>
        <td class="textAdmin" style="text-align: right;">
        Página Inicial:
        </td>
        <td><textarea name="pagInicial" cols="50" rows="1" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"><?=$dados['pagInicial']?></textarea></td>
    </tr>
    <tr>
        <td class="textAdmin" style="text-align: right;">
        Página Final:
        </td>
        <td><textarea name="pagFinal" cols="50" rows="1" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"><?=$dados['pagFinal']?></textarea></td>
    </tr>
    <tr>
        <td class="textAdmin" style="text-align: right;">
        Palavras Chave:
        </td>
        <td><textarea name="palChave" cols="50" rows="1" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"><?=$dados['palChave']?></textarea></td>
    </tr>
    <tr>
        <td class="textAdmin" style="text-align: right;">
        Resumo:
        </td>
        <td><textarea name="resumo" cols="50" rows="12" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"><?=$dados['resumo']?></textarea></td>
    </tr>
    <tr>
        <td>
        &nbsp;
        </td>
        <td style="text-indent:100px;"><a href="./formAlterarArtigo.php?idArtigo=<?=$_GET['idArtigo']?>">CLIQUE AQUI PARA ALTERAR ARQUIVO</a></td>
    </tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr><td colspan="2"><input type="submit" value="Alterar Artigo" /></td></tr>
    </form>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr><td colspan="2"><a href="./">Voltar</a></td></tr>
    </table>
    <script language="javascript"> selecionar(5); </script>
<?php
include("../template/templateDownAdmin.php");
?>
