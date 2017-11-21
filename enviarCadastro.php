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

$nome        = $_POST['nome'];
$email       = $_POST['email'];
$organizacao = $_POST['organizacao'];
$telefone    = $_POST['telefone'];
$assuntoEmail= $_POST['assunto'];
$mensagem    = $_POST['mensagem'];

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
?>
<table border="0" width="98%" cellspacing="5" cellpadding="0"  vspace="0" hspace="0" class="tableConteudo" align="center">
<tr>
    <td align="center" class="textHome">
    <?php
    function nomeMaiusculo($nome){
        $nome   = trim(strtolower($nome));
        $partes = Explode(" " , $nome);
        for ($i = 0; $i < count($partes); $i++){
            if(($partes[$i] == "da") or ($partes[$i]  == "de") or ($partes[$i]  == "e") or ($partes[$i]  == "das") or ($partes[$i]  == "dos")){
                continue;
                }
            $partes[$i] = ucfirst($partes[$i]);
            }
        $final = implode(" " , $partes);
        return $final;
      }

    $erros = array();
    if(trim($nome) == ""){
        $erros[] = "Nome não informado";
    }
    if(trim($email) == ""){
        $erros[] = "E-mail não informado";
    } else
    if(verificar_email($email) == 0){
        $erros[] = "E-mail inválido";
    }
    if(trim($mensagem) == ""){
        $erros[] = "Mensagem não digitada";
    }

    if(count($erros) == 0){
        $endereco[0] = "ce.rezende@gmail.com";
        $endereco[1] = "carlos@acheiauto.com";
        $assunto     = "RevistaOnLine";

        $texto       =
        "Nome:       $nome
        E-mail:      $email
        Organização: $organizacao
        Assunto:     $assuntoEmail
        Mensagem:    $mensagem
        Telefone:    $telefone";

        for($i = 0; $i < sizeof($endereco); $i++){
          mail($endereco[$i], $assunto, $texto, "from: $email");
        }

        $ano       = date("Y");
        $diaMes    = date("d");
        $diaSemana = array("Domingo","Segunda-feira","Terça-feira","Quarta-feira","Quinta-feira","Sexta-feira","Sábado");
        $mesAno    = Array("janeiro","fevereiro","março","abril","maio","junho","julho","agosto","setembro","outubro","novembro","dezembro");
        echo    '<p>Olá, ' . nomeMaiusculo($nome) . '! Sua mensagem foi enviada com sucesso.</p>
                <p> Enviaremos sua resposta para o e-mail: ' . $email .
                "</p><p>Obrigado.</p>";
        echo    '<p align="right">' . $diaSemana[date("w")] . ", " . $diaMes . " de " . $mesAno[date("n") -1] . " de " . $ano . ".</p><br><br>";
        ?>

        <p align='center'><button class='button' onClick="javascript:irParaPagina('cadastro.php')">Voltar</button></p>

    <?php
    } else {
      foreach($erros as $erro){
    ?>
    <p align="center"><b><?=$erro?></b></p><br>
    <?php } ?>
    <p align='center'><button class='button' onClick="irParaPagina('cadastro.php')">Voltar</button></p>
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
