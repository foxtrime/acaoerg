<?php
$compromisso = 'Um ser pluri celular é composto de várias Células!';
$texto = 'cel';

$_array_0 = array(
    'cel',
    'Cel',
    'CEl',
    'CEL',
    'cEL',
    'ceL',
    //
    'cél',
    'Cél',
    'CÉl',
    'CÉL',
    'cÉL',
    'céL',
);
$_array_1 = array();
foreach($_array_0 as $_cell)
    $_array_1[] = "/".$_cell."/";

$_array_2 = array();
foreach($_array_0 as $_cell)
    $_array_2[] = "<b>".$_cell."</b>";

echo preg_replace($_array_1, $_array_2, $compromisso);
?>