<?php
include("../template/templateTopAdmin.php");
?>
<?php
header('Content-Type: text/html; charset=ISO-8859-1');
chdir("../../Conexao/");
    include_once("Conexao.class.php");
    include_once("../Pagina/Pagina.class.php");
    include_once("../Pagina/PaginaDAO.class.php");
chdir(dirname(__FILE__));
error_reporting(0);
$Pagina = new Pagina();
$listaDeTextos  = $Pagina->getTextosByPagina($_GET['idPagina']);
?>

<table border="0" width="100%" cellspacing="5" cellpadding="0"  vspace="0" hspace="0" align="center" style="
    background-color:#eeeeee;
">
<tr><td colspan="2" class="tituloB" style="padding-left: 541px;">Editar Textos do Site</td></tr>
<tr><td colspan="2" class="tituloB">Guia de alteraçao de texto</td></tr>
<tr><td colspan="2" class="text">Para deixar o campo em branco é so apagar o conteudo</td></tr>
</tr>


<tr><td>          
     <?php 
        switch($_GET['idPagina']){
            case '1':
                echo "Id 1 , Grava texto em NEGRITO"; 
                echo "<br>";
                echo "Id 2 , Grava texto NORMAL";
                echo "<br>";
                echo "Id 3 , Grava texto em NEGRITO";
                echo "<br>";
                echo "Id 4 , Grava texto NORMAL";
                echo "<br>";
                echo "Id 16 , Grava texto NORMAL";
                echo "<br>";
                echo "Id 17 , Grava texto em NEGRITO";
                echo "<br>";
                echo "Id 18 , Grava texto NORMAL";
                echo "<br>";
                echo "Id 19 , Grava texto NORMAL";
                    break;
            case '3':
                echo "Id 7 , Grava texto em NEGRITO";
                echo "<br>";
                echo "Id 8 , Grava texto NORMAL";
                echo "<br>";
                echo "Id 6 , Grava texto em NEGRITO";
                echo "<br>";
                echo "Id 9 , Grava texto NORMAL";
                echo "<br>";
                echo "Id 10 , Grava texto NEGRITO";
                echo "<br>";
                echo "Id 11 , Grava texto em NORMAL";
                echo "<br>";
                echo "Id 12 , Grava texto NEGRITO";
                echo "<br>";
                echo "Id 13 , Grava texto NORMAL";
                    break;
            case '41':
               echo "NÃO ALTERAR E EQUIPE DE DESENVOLVIMENTO DO PROJETO ";
            }
         ?>   
</td></tr>
</form>
<tr><td colspan="2">&nbsp;</td></tr>
<tr>
    <td colspan="2">
    <?=$_GET['cadastrou']?"<p class='textAdminMensagem'>Textos cadastrados com sucesso!</p>":""?>
    <?=$_GET['alterou']?"<p class='textAdminMensagem'>Textos alterados com sucesso!</p>":""?>
    <?=$_GET['excluiu']?"<p class='textAdminMensagem'>Textos excluidos com sucesso!</p>":""?>
    </td>
</tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2" class="titulo">Lista de textos</td></tr>
<tr>
    <td colspan="2" class="bordaRevista">
    <table border="0" width="100%" cellspacing="3" cellpadding="0"  vspace="0" hspace="0">
        <tr align="center" class="textAdmin">
            <th>ID</th>
            <th>Português</th>
            <th>Inglês</th>
            <th>Espanhol</th>
            <th>Editar</th>
            
        </tr>
        <?php
        $i = 0;
        foreach($listaDeTextos as $idTexto => $textos){
        $fundo = $i%2==0 ?  "#ffffff" : "#dddddd";
        ?>
        <tr bgcolor="<?=$fundo?>"  align="center" class="textAdmin">
            <td><?=$idTexto?></td>
            <td><?=$textos['pt']?></td>
            <td><?=$textos['en']?></td>
            <td><?=$textos['es']?></td>
            <td><a href="alterar.php?idTexto=<?=$idTexto?>">Editar</a></td>
        </tr>
        <?php $i++; } ?>
    </table>
    </td>
</tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2"><a href="../home">Voltar</a></td></tr>
</table>
<script language="javascript"> selecionar(3); </script>
<?php
include("../template/templateDownAdmin.php");
?>
