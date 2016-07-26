<?php
include_once('class.calculos.php');
$oCrud = new Calculos();
$oProdutos = $oCrud->getProdutos();

echo '<pre>';
print_r($oProdutos);
echo '</pre>';
?>