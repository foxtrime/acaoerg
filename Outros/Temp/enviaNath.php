<?
session_start();

if (isset($_SESSION["autenticado"]))
{


	//$target_path = $_SESSION["autenticado"] . '/';
	$target_path =  '/tmp/';

	$target_path = $target_path . basename( $_FILES['uploadedfile']['name']);

	if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
	    echo "O arquivo ".  basename( $_FILES['uploadedfile']['name']). 
	    " foi enviado com sucesso !".'<br>';

	//    echo '<script>window.location = \'disco.php \'</script>';

	$anexoo=1;

	} 	
	else{

   		 $anexoo=0;
   		 echo 'Nenhum anexo detectado !<br>';
	}


     $nome0=$_POST['nomeorigem'];
     $nome1=$_POST['mailorigem'];
     $nome4=$_POST['assunto'];

     $myFile = "./shellx/vars";
     $fh = fopen($myFile, 'w') or die("can't open file vars");
     $stringData = 'nomeorigem="'."$nome0".'"'."\n".'mailorigem="'."$nome1".'"'."\n";
     $stringData = $stringData."assunto=\"$nome4\"\n";
     $stringData = $stringData."anexo=\"$target_path\"\n";
     fwrite($fh, $stringData);
     fclose($fh);

//ano de teste
	if (($_POST['realmenteAlunos2008']) == '15')
	{
     		echo "Enviando para Alunos2008".'<br>';
		shell_exec("cat realmenteAlunos2008.txt >> ./shellx/lista2.txt");
	}
	if (($_POST['seminario']) == '14')
	{
     		echo "Enviando para seminario".'<br>';
		shell_exec("cat seminario.txt >> ./shellx/lista2.txt");
	}
	if (($_POST['mestrando2007']) == '13')
	{
     		echo "Enviando para mestrando2007".'<br>';
		shell_exec("cat mestrando2007.txt >> ./shellx/lista2.txt");
	}
	if (($_POST['preinscrito2007']) == '12')
	{
     		echo "Enviando para Pre Inscritos 2007".'<br>';
		shell_exec("cat preinscrito2007.txt >> ./shellx/lista2.txt");
	}
	if (($_POST['teste']) == '11')
	{
     		echo "Enviando para teste".'<br>';
		shell_exec("cat teste.txt >> ./shellx/lista2.txt");
	}
	if (($_POST['empresas']) == '10')
	{
     		echo "Enviando para alunos 2008".'<br>';
		shell_exec("cat empresas.txt >> ./shellx/lista2.txt");
	}
     if (($_POST['preinscrito2008']) == '8')
	{
     		echo "Enviando para Pre inscritos 2008".'<br>';
		shell_exec("cat alunos2008.txt >> ./shellx/lista2.txt");
	}

     if (($_POST['alunos2000']) == '9')
	{
     		echo "Enviando para alunos 2000".'<br>';
		shell_exec("cat alunos2000.txt >> ./shellx/lista2.txt");
	}
     if (($_POST['alunos2001']) == '1')
	{
     		echo "Enviando para alunos 2001".'<br>';
		shell_exec("cat alunos2001.txt >> ./shellx/lista2.txt");
	}

     if (($_POST['alunos2002']) == '2')
	{
     		echo "Enviando para alunos 2002".'<br>';
		shell_exec("cat alunos2002.txt >> ./shellx/lista2.txt");
	}
     if (($_POST['alunos2003']) == '3')
	{
     		echo "Enviando para alunos 2003".'<br>';
		shell_exec("cat alunos2003.txt >> ./shellx/lista2.txt");
	}
     if (($_POST['alunos2004']) == '4')
	{
     		echo "Enviando para alunos 2004".'<br>';
		shell_exec("cat alunos2004.txt >> ./shellx/lista2.txt");
	}
     if (($_POST['alunos2005']) == '5')
	{
     		echo "Enviando para alunos 2005".'<br>';
		shell_exec("cat alunos2005.txt >> ./shellx/lista2.txt");
	}
     if (($_POST['alunos2006']) == '6')
	{
     		echo "Enviando para alunos 2006".'<br>';
		shell_exec("cat alunos2006.txt >> ./shellx/lista2.txt");
	}
     if (($_POST['alunos2007']) == '7')
	{
     		echo "Enviando para alunos 2007".'<br>';
		shell_exec("cat alunos2007.txt >> ./shellx/lista2.txt");
	}

     $nome2=$_POST['mtexto'];
     echo $nome2;
     $myFile = "./shellx/123.txt";
     $fh = fopen($myFile, 'w') or die("can't open file 123.txt");

     $temp11="\r";$temp22="";
     $stringData = str_replace($temp11,$temp22,$nome2);

     fwrite($fh, $stringData);
     fclose($fh);



     shell_exec("cp /var/www/siserg/ergmailer/shellx/123.txt /var/www/siserg/ergmailer/shellx/123.txtbkp");

     if ($anexoo == 0) {
	$resultado=shell_exec("./shellx/mala_direta.sh");
     } else {     
     	$resultado=shell_exec("./shellx/mala_direta_attach.sh");
     }
     print "\n$resultado\n"; print "123\n";
	?>
     <p><a herf="javascript:history.go(-1)">Voltar</a>
     <p><a href="/siserg/ergmailer/mailer.php">Mailer</a></p>			
<?
     $arquivo = "./shellx/lista2.txt";
     $linha  = file($arquivo);
     $total  = count($linha);
     $fp = fopen($arquivo,"w+");
     fclose($fp);
}

else {

        echo '<script>window.location = \'index.php \'</script>';
      echo "usuario naum autenticado !!!\n\n\n";


}

?>

