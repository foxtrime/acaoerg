<?php
header('Content-Type: text/html; charset=ISO-8859-1');
chdir("../../../Conexao/");
    include_once("Conexao.class.php");
    include_once("../Artigos/Artigos.class.php");
    include_once("../Artigos/ArtigosDAO.class.php");
chdir(dirname(__FILE__));
error_reporting(0);

$Artigos  = new Artigos();

$arquivo  = $_FILES["arquivo"];
$idArtigo = $_POST['idArtigo'];

//echo $arquivo["size"]." - ".$idEvento." - ".$idEvento."<br><br><br>";


//se existir o arquivo
if($arquivo["size"] != 0){
  $pasta_dir = "artigos/";  //diretorio dos arquivos, se nao existir a pasta ele cria uma
  if(!file_exists($pasta_dir)){
    mkdir($pasta_dir);
  }
  $arquivo_nome = $pasta_dir . $arquivo["name"];
  // Tamanho máximo do arquivo (em bytes)
  $config["tamanho"] = 104857634;
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

      $dados = $Artigos->getArtigosByCod($idArtigo);
      
      unlink("artigos/".$dados['arquivo']);
      
      $Artigos->alterarArtigoById($idArtigo, $imagem_nome);

      header("location: ../?alterou=true");
//    echo "<meta http-equiv='refresh' content='3' />";
    }
  }
else{
  header("location: ../formAlterarArtigo.php?idArtigo=".$idArtigo."&select=0");
}

?>
