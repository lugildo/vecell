<?php
include_once('class.calculos.php');
$oCrud = new Calculos();
$oProdutos = $oCrud->getProdutos();
$oIncidencias = $oCrud->getIncidencias();
$oRegras = $oCrud->getRegras();
$oParcelas = $oCrud->getParcelas('AND (TB_Parcelas.PK_NroParc < 4)', '08/11/2016', '09/10/2016', 41);

/*    $mes = '02';      
    $ano = date("Y");
    $ultimo_dia = date("t", mktime(0,0,0,$mes,'01',$ano));
    echo $ultimo_dia;



echo '<pre>';
echo 'Produtos:<br>';
print_r($oProdutos);
echo 'Incidencias:<br>';
print_r($oIncidencias);
echo 'Regras:<br>';
print_r($oRegras);
*/
echo '<pre>';
echo 'Parcelas:<br>';
print_r($oParcelas);
echo '</pre>';

?>