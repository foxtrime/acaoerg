<?php
// mail ( string to, string subject, string message [, string additional_headers [, string additional_parameters]])

$to = 'pieterveldman@gmail.com';
$subject = 'teste';
$msg = 'blah blah blah blah blah blah blah blah blah blah blah blah blah blah ';


$boundary = strtotime('NOW');

$headers = "From: Revista <revista@ergonomia.ufrj.br>\n";
$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-Type: multipart/mixed; boundary=\"" . $boundary . "\"\n";

$msg = "--" . $boundary . "\n";
$msg .= "Content-Type: text/plain; charset=\"iso-8859-1\"\n";
$msg .= "Content-Transfer-Encoding: quoted-printable\n\n";

$msg .= "Aqui eu escrevo o texto do email\n";

$msg .= "--" . $boundary . "\n";
$msg .= "Content-Transfer-Encoding: base64\n";
$msg .= "Content-Disposition: attachment; filename=\"imagem.gif\"\n\n";

ob_start();
   readfile("imagem.gif");
   $enc = ob_get_contents();
ob_end_clean();

$msg_temp = base64_encode($enc). "\n";
$tmp[1] = strlen($msg_temp);
$tmp[2] = ceil($tmp[1]/76);

for ($b = 0; $b <= $tmp[2]; $b++) {
    $tmp[3] = $b * 76;
    $msg .= substr($msg_temp, $tmp[3], 76) . "\n";
}

unset($msg_temp, $tmp, $enc);



if (mail($to, $subject, $msg, $headers)) {

//if (mail ( $to, $subject, $msg,'From: revista@ergonomia.ufrj.br ')) {
  echo 'email enviado com sucesso';
}else
{
    echo 'problemas';
}
?>
