<?php
chdir("Conexao/");
    include_once("../template/templateIndTop.php");
    include_once("Conexao.class.php");
    include_once("../Pagina/Pagina.class.php");
    include_once("../Pagina/PaginaDAO.class.php");
chdir(dirname(__FILE__));
error_reporting(0);
$idPagina = 17;
$idIdioma = $_GET['idIdioma']; // 1 = Port, 2 = Ingl e 3 = Espa

$Pagina = new Pagina($idPagina,$idIdioma);
$Pagina->carregarTextos();

?>
<table border="0" width="98%" cellspacing="5" cellpadding="0"  vspace="0" hspace="0" class="tableConteudo" align="center">
<tr><td class="text"><?=$Pagina->textos[29]?></td></tr>
<tr><td>&nbsp;</td></tr>
<tr>
    <td class="titulo" align="center">
    <div  class="bordaRevista" style="width: 87%;">
    <table border="0" width="70%" cellspacing="5" cellpadding="0"  vspace="0" hspace="0" class="tableConteudo" align="center">
    <form method="post" action="recebeArtigo.php"  enctype="multipart/form-data">
    <tr>
        <td class="titulo" align="right" width="10%"><font color="red">*</font> Nome:</td>
        <td><input type="text" name="nome" size="48" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"></td>
    </tr>
    <tr>
        <td class="titulo" align="right"><font color="red">*</font> E-mail:</td>
        <td><input type="text" name="email" size="48" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"></td>
    </tr>
    <tr>
        <td class="titulo" align="right">Telefone:</td>
        <td width="25%"><input type="text" name="telefone" size="15" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')"></td>
    </tr>
    <tr>
        <td class="titulo" align="right"><font color="red">*</font> Artigo:</td>
        <td>
        <input type="file" name="buscarArquivo" size="48" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')" />
        </td>
    </tr>
    <tr><td colspan="2" align="right"><font color="red" face="verdana" size="1pt">(*) Preenchimento obrigatório</font></td></tr>
    <tr>
        <td colspan="2" align="center">
        <input type="submit" value="Enviar">&nbsp;&nbsp;&nbsp;
        <input type="reset" value="Limpar">
        </td>
    </tr>
    </form>
    </table>
    </div>
    </td>
</tr>
<tr><td>&nbsp;</td></tr>
</table>
<?php
chdir("Conexao/");
    include_once("../template/templateIndDown.php");
chdir(dirname(__FILE__));
error_reporting(0);
?>
