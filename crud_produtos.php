<?php
if ($_GET) {
	include_once('class.calculos.php');

	$oCrud = new Calculos();
	$oProdutos = $oCrud->getProdutos();
	
	$i = 0;
	foreach ( $oProdutos as $aProdutos ) { 
		$oProdutos[$i]->PK_Codigo = utf8_encode($oProdutos[$i]->PK_Codigo);
		$oProdutos[$i]->Nome 		= utf8_encode($oProdutos[$i]->Nome);
		$oProdutos[$i]->Valor 		= utf8_encode($oProdutos[$i]->Valor);
		$oProdutos[$i]->Taxa 		= utf8_encode($oProdutos[$i]->Taxa);
		$i++;
	}	
	echo json_encode($oProdutos);
}

if ($_POST) {
	$oProdutos['PK_Codigo']	= utf8_decode($_POST['id']);
	if (($_POST['oper'] == 'add') or ($_POST['oper'] == 'edit')) {
		$oProdutos['Nome'] 		= utf8_decode($_POST['Nome']);
		$oProdutos['Valor'] 	= utf8_decode($_POST['Valor']);
		$oProdutos['Taxa'] 		= utf8_decode($_POST['Taxa']);
	}
	
	if ($_POST['oper'] == 'add') {
	  	include_once('class.calculos.php');

		$oCrud = new Calculos();
  	  	$oCrud->insertProdutos($oProdutos) ;	
	} elseif ($_POST['oper'] == 'edit') {

  		include_once('class.calculos.php');

		$oCrud = new Calculos();
  	  	$oCrud->updateProdutos($oProdutos) ;	
	} elseif ($_POST['oper'] == 'del') {
		include_once('class.calculos.php');

		$oCrud = new Calculos();
  	  	$oCrud->deleteProdutos($_POST['id']);
	}
}
?>
