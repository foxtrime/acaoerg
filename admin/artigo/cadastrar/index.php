<?php
header('Content-Type: text/html; charset=ISO-8859-1');
chdir("../../../Conexao/");
    include_once("Conexao.class.php");
    include_once("../Artigos/Artigos.class.php");
    include_once("../Artigos/ArtigosDAO.class.php");
chdir(dirname(__FILE__));
error_reporting(0);

$Artigos = new Artigos();

$codExemplar = $_POST['codExemplar'];
$tit         = $_POST['titulo'];
$aut         = $_POST['autores'];
$pagInicial  = $_POST['pagInicial'];
$pagFinal    = $_POST['pagFinal'];
$palChave    = $_POST['palChave'];
$status      = $_POST['status'];  
$email       = $_POST['email'];
$resumo      = $_POST['resumo'];
$arquivo     = $_FILES['arquivo'];

//echo $codExemplar." - ".$tit." - ".$aut." - ".$pagInicial." - ".$pagFinal." - ".$palChave." - ".$status." - ".$email." - ".$resumo." - ".$arquivo;

//se existir o arquivo
if($arquivo["size"] != 0){
  $pasta_dir = "artigos/";  //diretorio dos arquivos, se nao existir a pasta ele cria uma
  if(!file_exists($pasta_dir)){
    mkdir($pasta_dir);
  }
  $arquivo_nome = $arquivo["name"];
  // Tamanho máximo do arquivo (em bytes)
  $config["tamanho"] = 1073741824;
    // Verifica tamanho do arquivo
    if($arquivo["size"] > $config["tamanho"]){
      $erro[] = "Arquivo tem tamanho muito grande!
      O Software deve ser de no máximo 2M bytes.";
    }
    // Imprime as mensagens de erro
    if(sizeof($erro)){
      foreach($erro as $err){
        echo " - " . $err . "<BR>";
      }
      echo "<a href='../'>Voltar</a>";
    }
    // Verificação de dados OK, nenhum erro ocorrido, executa então o upload...
    else{
    	
      // Pega extensão do arquivo
      preg_match("/\.(pdf){1}$/i", $arquivo_nome, $ext);
      // Gera um nome único para a imagem
      $imagem_nome = md5(uniqid(time())) . "." . $ext[1];
      // Caminho de onde a imagem ficará
      $imagem_dir = "artigos/" . $imagem_nome;
      // Faz o upload da imagem
      move_uploaded_file($arquivo["tmp_name"], $imagem_dir);

      $Artigos->cadastrar($codExemplar, $tit, $aut, $pagInicial, $pagFinal, $palChave, $status, $email, $resumo, $imagem_nome);

      header("location: ../?cadastrou=true");
//    echo "<meta http-equiv='refresh' content='3' />";
    }
}
else{
  header("location: ../?arquivo=true");
}
?>