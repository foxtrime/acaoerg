<?php
$compromisso = 'Um ser pluri celular � composto de v�rias C�lulas!';
$texto = 'cel';

$_array_0 = array(
    'cel',
    'Cel',
    'CEl',
    'CEL',
    'cEL',
    'ceL',
    //
    'c�l',
    'C�l',
    'C�l',
    'C�L',
    'c�L',
    'c�L',
);
$_array_1 = array();
foreach($_array_0 as $_cell)
    $_array_1[] = "/".$_cell."/";

$_array_2 = array();
foreach($_array_0 as $_cell)
    $_array_2[] = "<b>".$_cell."</b>";

echo preg_replace($_array_1, $_array_2, $compromisso);
?>