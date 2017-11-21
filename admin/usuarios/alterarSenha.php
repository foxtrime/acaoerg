<?php
header('Content-Type: text/html; charset=ISO-8859-1');
chdir("../../Conexao/");
    include_once("Conexao.class.php");
    include_once("../Users/Users.class.php");
    include_once("../Users/UsersDAO.class.php");
    include_once("../Util/Util.class.php");
chdir(dirname(__FILE__));
//error_reporting(0);

$idUsers = $_GET['idUsers'];
$retorno = false;

$Users   = new Users();
$Util   = new Util();

if(isSet($_POST['alterou']) && $_POST['novaSenha']==$_POST['confirme']){
    $senhaCript = md5(strtolower(trim($_POST['novaSenha'])));
    $Users->alterarSenhaByCod($_POST['idUsers'], $senhaCript);
    header("location: ./?alterou=true");
    die();
}elseif(isSet($_POST['alterou'])){
  $retorno = true;
}

include("../template/templateTopAdmin.php");

$textos = $Users->getUsersByCod($idUsers);
?>

<table border="0" width="100%" cellspacing="5" cellpadding="0"  vspace="0" hspace="0" align="center">
<tr>
    <td class="titulo" colspan="2">Alterar Senha Usuário</td>
</tr>
<form method="post" action="<?=$PHP_SELF?>">
<tr>
    <td class="textAdmin" style="text-align: right;">
    <input type="hidden" name="alterou" value="true" />
    <input type="hidden" name="idUsers" value="<?=$_GET['idUsers']?>" />
    Digite Nova Senha:
    </td>
    <td><input type="password" name="novaSenha" /></td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;" width="30%">Confirme:</td>
    <td><input type="password" name="confirme" /></td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td id="msgErro" colspan="2" class="msgErro" height="20">
    <?php
    if($retorno == true)
      echo "Senha não confere.";
    else
      echo "&nbsp;";
    ?>
    </td>
</tr>
<tr><td colspan="2"><input type="submit" value="Alterar Senha" /></td></tr>
</form>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2"><a href="./">Voltar</a></td></tr>
</table>
<script language="javascript"> selecionar(1); </script>
<?php
include("../template/templateDownAdmin.php");
?>
