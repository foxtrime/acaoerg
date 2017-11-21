<?php
session_start();

unset($_SESSION[nome]);
unset($_SESSION[tipo]);

Header("Location: ../");

?>
