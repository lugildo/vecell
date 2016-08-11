<?php
include_once('class.calculos.php');
$oCrud = new Calculos();
$oProdutos = $oCrud->getProdutos();
$oIncidencias = $oCrud->getIncidencias();
$oRegras = $oCrud->getRegras();
$oParcelas = $oCrud->getParcelas('AND (TB_Parcelas.PK_NroParc > 0)', '08/20/2016', '09/19/2016', 60);

echo '<pre>';
echo 'Produtos:<br>';
print_r($oProdutos);
echo 'Incidencias:<br>';
print_r($oIncidencias);
echo 'Regras:<br>';
print_r($oRegras);
echo 'Parcelas:<br>';
print_r($oParcelas);
echo '</pre>';
?>