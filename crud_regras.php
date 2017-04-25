<?php

if ($_GET) {
	include_once('class.calculos.php');

	$oCrud = new Calculos();
	$oRegras = $oCrud->getRegras();
	$i = 0;
	foreach ( $oRegras as $aRegras ) { 
		if (empty($oRegras[$i]->Sigla)) {
			$oRegras[$i]->Sigla = utf8_encode($oRegras[$i]->Associacao);
		}
		$sProduto = $oRegras[$i]->Produto.' | '.$oRegras[$i]->ValorProduto.' | '.$oRegras[$i]->TaxaProduto;
		
		$oRegras[$i]->PK_Codigo 			= utf8_encode($oRegras[$i]->PK_Codigo);
		$oRegras[$i]->Produto 				= utf8_encode($sProduto);
		$oRegras[$i]->ValorProduto 			= utf8_encode($oRegras[$i]->ValorProduto);
		$oRegras[$i]->TaxaProduto 			= utf8_encode($oRegras[$i]->TaxaProduto);
		$oRegras[$i]->FK_Produto 			= utf8_encode($oRegras[$i]->FK_Produto);
		$oRegras[$i]->Associado 			= utf8_encode($oRegras[$i]->Associado);
		$oRegras[$i]->Associacao 			= utf8_encode($oRegras[$i]->Associacao);
		$oRegras[$i]->Sigla 				= utf8_encode($oRegras[$i]->Sigla);
		$oRegras[$i]->Conveniada 			= utf8_encode($oRegras[$i]->Conveniada);
		$oRegras[$i]->Condicao1 			= utf8_encode($oRegras[$i]->Condicao1);
		$oRegras[$i]->Condicao2 			= utf8_encode($oRegras[$i]->Condicao2);
		$oRegras[$i]->Condicao3 			= utf8_encode($oRegras[$i]->Condicao3);
		$oRegras[$i]->Condicao4 			= utf8_encode($oRegras[$i]->Condicao4);
		$oRegras[$i]->Condicao5 			= utf8_encode($oRegras[$i]->Condicao5);
		$oRegras[$i]->Lim_Qt_Compras 		= utf8_encode($oRegras[$i]->Lim_Qt_Compras);
		$i++;
	}	
	echo json_encode($oRegras);
}

if ($_POST) {
	$oRegras['PK_Codigo']			= utf8_decode($_POST['id']);
	$oRegras['FK_Produto'] 			= utf8_decode($_POST['FK_Produto']);
	$oRegras['FK_Associacao'] 		= utf8_decode($_POST['FK_Associacao']);
	$oRegras['FK_Associado'] 		= utf8_decode($_POST['FK_Associado']);
	$oRegras['FK_Conveniada'] 		= utf8_decode($_POST['FK_Conveniada']);
	$oRegras['FK_Incidencia'] 		= utf8_decode($_POST['FK_Incidencia']);
	$oRegras['Lim_Qt_Compras'] 		= utf8_decode($_POST['Lim_Qt_Compras']);
	
	if ($_POST['oper'] == 'add') {
	  	include_once('class.calculos.php');

  		$oCalculos = new Calculos();
  	  	$oCalculos->insertRegras($oRegras) ;	
	} elseif ($_POST['oper'] == 'edit') {

  		include_once('class.calculos.php');

  		$oCalculos = new Calculos();
  	  	$oRegras = $oCalculos->updateRegras($oRegras) ;	
	}  elseif ($_POST['oper'] == 'del') {
		include_once('class.calculos.php');

		$oCalculos = new Calculos();
  	  	$oCalculos->deleteRegras($_POST['id']);
	}
	// delete
}
