<?php
chdir("../../../Conexao/");
    include_once("Conexao.class.php");
    include_once("../Exemplares/Exemplares.class.php");
    include_once("../Exemplares/ExemplaresDAO.class.php");
chdir(dirname(__FILE__));
error_reporting(0);

$Exemplares   = new Exemplares();

$arquivo    = $_FILES["arquivo"];
$idExemplar = $_POST['idExemplar'];

//echo $arquivo["size"]." - ".$idEvento." - ".$idEvento."<br><br><br>";


//se existir o arquivo
if($arquivo["size"] != 0){
  $pasta_dir = "cadastrar/capa/";  //diretorio dos arquivos, se nao existir a pasta ele cria uma
  if(!file_exists($pasta_dir)){
    mkdir($pasta_dir);
  }
  $arquivo_nome = $pasta_dir . $arquivo["name"];
  // Tamanho máximo do arquivo (em bytes)
  $config["tamanho"] = 1048576;
  if($arquivo){
    // Verifica se o mime-type do arquivo é de imagem
    if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp|jpg|png)$", $arquivo["type"])){
      $erro[] = "Arquivo em formato inválido! A imagem deve ser jpg, jpeg,
       bmp, gif ou png. Envie outro arquivo.";
    }
    else
    {
      // Verifica tamanho do arquivo
      if($arquivo["size"] > $config["tamanho"]){
        $erro[] = "Arquivo em tamanho muito grande!
        A imagem deve ser de no máximo 2M bytes.
        Envie outro arquivo";
      }
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
      preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $arquivo_nome, $ext);
      // Gera um nome único para a imagem
      $imagem_nome = md5(uniqid(time())) . "." . $ext[1];
      // Caminho de onde a imagem ficará
      $imagem_dir = "capa/" . $imagem_nome;
      // Faz o upload da imagem
      move_uploaded_file($arquivo["tmp_name"], $imagem_dir);

      $dados = $Exemplares->getExemplarByCod($idExemplar);
      
	  unlink("capa/".$dados['capa']);
      
      $Exemplares->alterarLogoById($idExemplar, $imagem_nome);

      header("location: ../?alterou=true");
//    echo "<meta http-equiv='refresh' content='3' />";
    }
  }
}
else{
  header("location: ../formAlterarcapa.php?idExemplar=".$idExemplar."&select=0");
}

?>
