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

function verificar_email($email){
   $mail_correcto = 0;
   //verifico umas coisas
   if ((strlen($email) >= 6) && (substr_count($email,"@") == 1) && (substr($email,0,1) != "@") && (substr($email,strlen($email)-1,1) != "@")){
      if ((!strstr($email,"'")) && (!strstr($email,"\"")) && (!strstr($email,"\\")) && (!strstr($email,"\$")) && (!strstr($email," "))) {
         //vejo se tem caracter .
         if (substr_count($email,".")>= 1){
            //obtenho a terminação do dominio
            $term_dom = substr(strrchr ($email, '.'),1);
            //verifico que a terminação do dominio seja correcta
         if (strlen($term_dom)>1 && strlen($term_dom)<5 && (!strstr($term_dom,"@")) ){
            //verifico que o de antes do dominio seja correcto
            $antes_dom = substr($email,0,strlen($email) - strlen($term_dom) - 1);
            $caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1);
            if ($caracter_ult != "@" && $caracter_ult != "."){
               $mail_correcto = 1;
            }
         }
      }
   }
}
if ($mail_correcto)
   return 1;
else
   return 0;
}

//pego os dados enviados pelo formulario
$nome       = $_POST["nome"];
$email      = "revista@ergonomia.ufrj.br";
$mensagem   = "Atenção!! Artigo em anexo ";
$telefone   = $_POST["telefone"];
$email_from = $_POST["email_from"];

?>
<table border="0" width="98%" cellspacing="5" cellpadding="0"  vspace="0" hspace="0" class="tableConteudo" align="center">
<tr>
    <td align="center" class="text">
<?php

$arquivo = isset($_FILES["arquivo"]) ? $_FILES["arquivo"] : FALSE;

$erros = array();
    if(trim($nome) == ""){
        $erros[] = "Nome não informado";
    }
    if(trim($email_from) == ""){
        $erros[] = "E-mail não informado";
    } else
    if(verificar_email($email_from) == 0){
        $erros[] = "E-mail inválido";
    }
    if($arquivo['type'] != "application/msword"){
        $erros[] =  "Selecione um arquivo .doc";
    }
    if($arquivo['size'] > 2097152){
        $erros[] =  "Seu arquivo deve possuir no máxnimo 2M";
    }

    if(count($erros) == 0){

//formato o campo da mensagem

$texto ="<b>Nome:</b> ".$nome."<br>";
$texto.="<b>E-mail:</b> ".$email_from."<br>";
$texto.="<b>Telefone:</b> ".$telefone."<br><br>";
$texto.="<b>".$mensagem."</b>";
$texto   = wordwrap( $texto, 50, "", 1);


if(file_exists($arquivo["tmp_name"]) and !empty($arquivo)){

        $fp = fopen($_FILES["arquivo"]["tmp_name"],"rb");
        $anexo = fread($fp,filesize($_FILES["arquivo"]["tmp_name"]));
        $anexo = base64_encode($anexo);

fclose($fp);

$anexo = chunk_split($anexo);


$boundary = strtotime('NOW');

    $mens = "--$boundary\n";
    $mens .= "Content-Transfer-Encoding: 8bits\n";
    $mens .= "Content-Type: text/html; charset=\"ISO-8859-1\"\n\n"; //plain
    $mens .= "$texto\n";
    $mens .= "--$boundary\n";
        $mens .= "Content-Type: ".$arquivo["type"]."\n";
        $mens .= "Content-Disposition: attachment; filename=\"".$arquivo["name"]."\"\n";
        $mens .= "Content-Transfer-Encoding: base64\n\n";
        $mens .= "$anexo\n";
        $mens .= "--$boundary--\r\n";
/*
$headers  = "MIME-Version: 1.0\n";
$headers .= "From: \"$nome\" <$email_from>\r\n";
$headers .= "Content-type: multipart/mixed; boundary=\"$boundary\"\r\n";
$headers .= "$boundary\n";
*/


$headers = "From: '".$nome."' <".$email_from.">\n";
$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-Type: multipart/mixed; boundary=\"" . $boundary . "\"\n";


//envio o email com o anexo
mail($email,"RevistaOnLine - Artigo",$mens,$headers);

        echo"Artigo enviado com Sucesso!<br><br>";
        echo "Em breve entraremos em contato.<br><br><br>";
        echo "<p align='center'><button class='button' onClick=\"irParaPagina('index.php')\">Voltar</button></p>";

}

//se nao tiver anexo
else{
        echo "Você deve anexar um arquivo!";
        
}
}
else {
      foreach($erros as $erro){
    ?>
    <p align="center"><b><?=$erro?></b></p><br>
    <?php } ?>
    <p align='center'><button class='button' onClick="irParaPagina('subArtigo.php')">Voltar</button></p>
    <?php } ?>
    </td>
    </tr>
</table>
<?php
chdir("Conexao/");
    include_once("../template/templateIndDown.php");
chdir(dirname(__FILE__));
error_reporting(0);
?>
