<?php
header('Content-Type: text/html; charset=ISO-8859-1');
chdir("Conexao/");
    include_once("../template/templateIndTop.php");
    include_once("Conexao.class.php");
    include_once("../Pagina/Pagina.class.php");
    include_once("../Pagina/PaginaDAO.class.php");
chdir(dirname(__FILE__));
error_reporting(0);
$idPagina = 1;
$idIdioma = $_GET['idIdioma']; // 1 = Port, 2 = Ingl e 3 = Espa

$Pagina = new Pagina($idPagina,$idIdioma);
$Pagina->carregarTextos();

?>

<script>

function mudacor(ref,cor){

ref.style.backgroundColor=cor;

}

</script>

<table border="1" width="98%" cellspacing="5" cellpadding="0"  vspace="0" hspace="0" class="tableConteudo" align="center">
<form method="post" action="#">
<tr>
    <td class="titulo" align="right">Usuário:</td>
    <td><input type="text" name="nome" size="48" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"></td>
    <td class="linkForm">esqueci minha senha</td>
</tr>
<tr>
    <td class="titulo" align="right">Senha:</td>
    <td><input type="text" name="email" size="48" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"></td>
    <td class="linkForm" onClick="javascript:irParaPagina('cadastro.php')">cadastro</td>
</tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="3" align="center"><input type="submit" value="Logar"></td></tr>
</form>
</table>
<?php
chdir("Conexao/");
    include_once("../template/templateIndDown.php");
chdir(dirname(__FILE__));
error_reporting(0);
?>
