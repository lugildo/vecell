<?php

if ($_GET) {
	include_once('class.crud.php');

	$oCrud = new Crud();
	$oProdutos = $oCrud->getProdutos();
	
	$i = 0;
	foreach ( $oProdutos as $aProdutos ) { 
		
		$oProdutos[$i]->PK_Codigo 			= utf8_encode($oProdutos[$i]->PK_Codigo);
		$oProdutos[$i]->Nome 				= utf8_encode($oProdutos[$i]->Nome);
		$oProdutos[$i]->Valor 				= utf8_encode($oProdutos[$i]->Valor);
		$oProdutos[$i]->Taxa 				= utf8_encode($oProdutos[$i]->Taxa);
		$i++;
	}	
	echo json_encode($oProdutos);
}

if ($_POST) {
	$oProdutos['PK_Codigo']			= utf8_decode($_POST['id']);
	$oProdutos['Nome'] 				= utf8_decode($_POST['Nome']);
	$oProdutos['Valor'] 				= utf8_decode($_POST['Valor']);
	$oProdutos['Taxa'] 				= utf8_decode($_POST['Taxa']);
	
	if ($_POST['oper'] == 'add') {
	  	include_once('class.crud.php');

  		$oCrud = new Crud();
  	  	$oCrud->insertProduoProdutostos($oProdutos) ;	
	} elseif ($_POST['oper'] == 'edit') {

  		include_once('class.crud.php');

  		$oCrud = new Crud();
  	  	$oProdutos = $oCrud->updateProdutos($oProdutos) ;	
	}
	// insert
	// delete
}

?>
