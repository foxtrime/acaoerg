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

<table border="0" width="98%" cellspacing="5" cellpadding="0"  vspace="0" hspace="0" class="tableConteudo" align="center">
<form method="post" action="enviarCadastro.php">
<tr>
    <td class="titulo" align="right"><font color="red">*</font>Nome:</td>
    <td colspan="3"><input type="text" name="nome" size="48" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"> CADASTRO</td>
</tr>
<tr>
    <td class="titulo" align="right"><font color="red">*</font> E-mail:</td>
    <td colspan="3"><input type="text" name="email" size="48" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"></td>
</tr>
<tr>
    <td class="titulo" align="right">Organização:</td>
    <td colspan="3"><input type="text" name="organizacao" size="48" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"></td>
</tr>
<tr>
    <td class="titulo" align="right">Telefone:</td>
    <td width="25%"><input type="text" name="telefone" size="15" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"></td>
    <td class="titulo" width="15%" align="right">Assunto:</td>
    <td>
    <select name="assunto" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')">
        <option name="selecione">Selecione</option>
        <option name="duvida">Dúvida</option>
        <option name="informacao">Informação</option>
        <option name="sugestao">Sugestão</option>
        <option name="critica">Crítica</option>
    </td>
</tr>
<tr>
    <td class="titulo" align="right"><font color="red">*</font> Mensagem:</td>
    <td colspan="3"><textarea name="mensagem" cols="36" rows="5" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"></textarea></td>
</tr>
<tr><td colspan="4" align="right"><font color="red" face="verdana" size="1pt">(*) Preenchimento obrigatório</font></td></tr>
<tr><td colspan="4" align="center"><input type="submit" vlaue="Enviar"></td></tr>
</form>
</table>
<?php
chdir("Conexao/");
    include_once("../template/templateIndDown.php");
chdir(dirname(__FILE__));
error_reporting(0);
?>
