<?

session_start();

if (isset($_SESSION["autenticado"]))
{
?>
<form action="gerenciar.php" method="post">
<input type="submit" value="Gerenciar">
</form>	
<?		
//	echo "usuario autenticado !!!\n\n\n";
//	echo '<script>window.location = \'mailer.php \'</script>';
	$template1 = file_get_contents ('form1.html');
echo '<br>';
echo '<center><h3><A HREF="/siserg/portal.php">Voltar</a>';
echo '&nbsp;&nbsp;&nbsp;<A HREF="/siserg/sair.php">Sair</a></h3></center><br>';

echo '<img src="http://www.ergonomia.ufrj.br/ceserg/images/logo_ceserg_col3.gif"><b>Enviar email para turma(s): </b></br>';

echo $template1;

print '<br>';
print '<form enctype="multipart/form-data" action="uploader.php" method="POST">';
print '<input type="hidden" name="MAX_FILE_SIZE" value="100000000" />';
print '<b>Escolha o arquivo a ser enviado <blink>(O NOME DO ARQUIVO NÃO DEVE CONTER ESPAÇOS !!!):</blink></b> &nbsp;&nbsp;<input name="uploadedfile" type="file" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
print '<br>(deixe em branco caso n&atilde;o deseje enviar nenhum anexo)<br><br><center>';
print '<input type="submit" value="Enviar email" />';
print '</center>';



}
else 
{
	echo "Usuario naum autenticado !!!\n\n\n";
	echo '<script>window.location = \'index.php \'</script>';

}


//echo '<html><head><title>SISERG - Cadastro Pessoal</title></head>';
//echo '<body>';
//echo '<h1><center>SISERG - Cadastro Pessoal</h1>';
//echo '<pre><center>';
//echo '<form method="POST" action="login.php">';
//echo 'Login<br><input type = "text" name="login">';echo "\n\n\n";

//echo 'Senha<br><input type = "password" name="password">';echo "\n\n\n";

//echo '<input type = "submit" value="enviar"></center>';



//echo '</form>';
//echo '<a href=pass.cgi>Obter minha senha</a>';

echo '</pre>';
echo '</body></html>';


?>
