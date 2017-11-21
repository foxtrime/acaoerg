<?php
// mail ( string to, string subject, string message [, string additional_headers [, string additional_parameters]])
phpinfo();
//echo ini_get('sendmail_from');


/*
$teste = ini_set('sendmail_from','revista@ergonomia.ufrj.br');
if ($teste){
  echo 'parametro alterado.'.$teste."<br />\n";
}else{
  echo 'parametro nao alterado.'."<br />\n";
}

$teste = ini_set('sendmail_from','revista@ergonomia.ufrj.br');
if ($teste){
  echo 'parametro alterado.'.$teste."<br />\n";
}else{
  echo 'parametro nao alterado.'."<br />\n";
}
*/

if (mail ( 'pieterveldman@gmail.com', 'teste', 'blah blah blah blah blah blah blah blah blah blah blah blah blah blah '
,'From: revista@ergonomia.ufrj.br ')) {
  echo 'email enviado com sucesso';
}else
{
    echo 'problemas';
}
?>
