<?php
include_once('class.calculos.php');
$oCrud = new Calculos();
//$oProdutos = $oCrud->getProdutos();
$oProdutos = $oCrud->getParcelas('AND (TB_Parcelas.PK_NroParc > 0)', '08/25/2016', '09/25/2016', 0010);

echo '<pre>';
print_r($oProdutos);
echo '</pre>';
?>