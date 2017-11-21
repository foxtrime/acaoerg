<?php
header('Content-Type: text/html; charset=ISO-8859-1');
include("../template/templateTopAdmin.php");
?>
<?php
chdir("../../Conexao/");
    include_once("Conexao.class.php");
    include_once("../Users/Users.class.php");
    include_once("../Users/UsersDAO.class.php");
chdir(dirname(__FILE__));
//error_reporting(0);
$Users = new Users();

$listaDeUsers = $Users->getUsers();

if($_SESSION['tipo'] == 'manda_chuva'){

?>
<table border="0" width="100%" cellspacing="5" cellpadding="0"  vspace="0" hspace="0" align="center" style="
    background-color: #eeeeee;
">
<tr><td colspan="2" class="tituloB">Cadastro de Usuários</td></tr>
<tr><td colspan="2" class="titulo">Cadastrar novo Usuário</td></tr>
<form method="post" action="./cadastrar/index.php">
<tr>
    <td class="textAdmin" style="text-align: right;" width="30%">
    <input type="hidden" name="cadastrou" value="true" />Login:</td>
    <td><input type="text" name="login" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')" /></td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;">Senha:</td>
    <td><input type="password" name="senha" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')" /></td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;">Nome:</td>
    <td><input type="text" name="nome" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')" /></td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;">Formação:</td>
    <td><input type="text" name="formacao" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')" /></td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;">Local de Trabalho:</td>
    <td><input type="text" name="localTrabalho" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')" /></td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;">E-mail:</td>
    <td><input type="text" name="email" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')" /></td>
</tr>
<tr>
    <td class="textAdmin" style="text-align: right;">Tipo:</td>
    <td>
    <select name="tipo" onfocus="mudacor(this,'#BDE4F4')" onblur="mudacor(this,'white')" />
        <option value="autor">Autor</option>
        <option value="editor">Editor</option>
        <option value="manda_chuva">Administrador</option>
    </select>
    </td>
</tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2"><input type="submit" value="Cadastrar Usuário" /></td></tr>
</form>
<tr><td colspan="2">&nbsp;</td></tr>
<tr>
    <td colspan="2" >
    <?=isset($_GET['cadastrou'])?"<p class='textAdminMensagem'>Usuário cadastrado com sucesso!</p>":""?>
    <?=isset($_GET['alterou'])?"<p class='textAdminMensagem'>Usuário alterado com sucesso!</p>":""?>
    <?=isset($_GET['excluiu'])?"<p class='textAdminMensagem'>Usuário excluido com sucesso!</p>":""?>
    </td>
</tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2" class="titulo">Lista de Usuários</td></tr>
<tr>
    <td colspan="2" class="bordaRevista">
    <table border="0" width="100%" cellspacing="3" cellpadding="0"  vspace="0" hspace="0" align="center">
        <tr align="center" class="textAdmin">
            <th>ID</th>
            <th>Login</th>
<!--            <th>Senha</th>  -->
            <th>Nome</th>
            <th>Formação</th>
            <th>Local Trabalho</th>
            <th>E-mail</th>
            <th>Tipo</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
        <?php
        $i = 0;
        foreach($listaDeUsers as $idUsers=> $Users){
        $fundo = $i%2==0 ?  "#ffffff" : "#dddddd";
        ?>
        <tr bgcolor="<?=$fundo?>" align="center" class="textAdmin">
            <td><?=$idUsers?></td>
            <td><?=$Users['login']?></td>
<!--            <td><?=$Users['senha']?></td>  -->
            <td><?=$Users['nome']?></td>
            <td><?=$Users['form']?></td>
            <td><?=$Users['local']?></td>
            <td><?=$Users['email']?></td>
            <td><?=$Users['tipo']?></td>
            <td><a href="alterar.php?idUsers=<?=$idUsers?>">Editar</a></td>
            <td><a href='#' onclick="javascript:confirmar('excluir/?idUsers=' , '<?=$idUsers?>')">Excluir</a></td>
        </tr>
        <?php $i++; } ?>
    </table>
    </td>
</tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2"><a href="../home">Voltar</a></td></tr>
</table>
<?php }
else{
?>
<table border="0" width="100%" cellspacing="5" cellpadding="0"  vspace="0" hspace="0" align="center">
<tr height="50"><td class="msgErro">Você não tem permissão para acessar esta opção...</td><tr>
<tr height="30"><td><a href='../home/'>Voltar</a></td></tr>
</table>
<?php } ?>
<script language="javascript"> selecionar(1); </script>
<?php
include("../template/templateDownAdmin.php");
?>
