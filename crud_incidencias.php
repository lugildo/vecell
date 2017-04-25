<?php

if ($_GET) {
	include_once('class.calculos.php');

	$oCrud = new Calculos();
	$oIncidencias = $oCrud->getIncidencias();
	
	$i = 0;
	foreach ( $oIncidencias as $aIncidencias ) { 
		
		$oIncidencias[$i]->PK_Codigo 			= utf8_encode($oIncidencias[$i]->PK_Codigo);
		$oIncidencias[$i]->FK_Produto 			= utf8_encode($oIncidencias[$i]->FK_Produto);
		$oIncidencias[$i]->Condicao1 			= utf8_encode($oIncidencias[$i]->Condicao1);
		$oIncidencias[$i]->Condicao2 			= utf8_encode($oIncidencias[$i]->Condicao2);
		$oIncidencias[$i]->Condicao3 			= utf8_encode($oIncidencias[$i]->Condicao3);
		$oIncidencias[$i]->Condicao4 			= utf8_encode($oIncidencias[$i]->Condicao4);
		$oIncidencias[$i]->Condicao5 			= utf8_encode($oIncidencias[$i]->Condicao5);
		$oIncidencias[$i]->Produto	 			= utf8_encode($oIncidencias[$i]->Nome).' | Valor: '. utf8_encode($oIncidencias[$i]->Valor).' | Taxa: '.utf8_encode($oIncidencias[$i]->Taxa);
		$oIncidencias[$i]->Valor	 			= utf8_encode($oIncidencias[$i]->Valor);
		$oIncidencias[$i]->Taxa	 				= utf8_encode($oIncidencias[$i]->Taxa);
		$oIncidencias[$i]->Nome	 				= utf8_encode($oIncidencias[$i]->Nome);
		$i++;
	}	
	echo json_encode($oIncidencias);
}

if ($_POST) {
	$oIncidencias['PK_Codigo']			= utf8_decode($_POST['id']);
	if (($_POST['oper'] == 'add') or ($_POST['oper'] == 'edit')) {
		$oIncidencias['FK_Produto'] 		= utf8_decode($_POST['FK_Produto']);
		if (!empty($_POST['Condicao1'])) {
			$oIncidencias['Condicao1'] = utf8_decode($_POST['Condicao1']);
		} else {
			$oIncidencias['Condicao1'] = '0';
		}
		if (!empty($_POST['Condicao2'])) {
			$oIncidencias['Condicao2'] = utf8_decode($_POST['Condicao2']);
		} else {
			$oIncidencias['Condicao2'] = '0';
		}
		if (!empty($_POST['Condicao3'])) {
			$oIncidencias['Condicao3'] = utf8_decode($_POST['Condicao3']);
		} else {
			$oIncidencias['Condicao3'] = '0';
		}
		if (!empty($_POST['Condicao4'])) {
			$oIncidencias['Condicao4'] = utf8_decode($_POST['Condicao4']);
		} else {
			$oIncidencias['Condicao4'] = '0';
		}
		if (!empty($_POST['Condicao5'])) {
			$oIncidencias['Condicao5'] = utf8_decode($_POST['Condicao5']);
		} else {
			$oIncidencias['Condicao5'] = '0';
		}
	}
	
	if ($_POST['oper'] == 'add') {
	  	include_once('class.calculos.php');

  		$oCrud = new Calculos();
  	  	$oCrud->insertIncidencias($oIncidencias) ;	
	} elseif ($_POST['oper'] == 'edit') {

  		include_once('class.calculos.php');

  		$oCrud = new Calculos();
  	  	$oIncidencias = $oCrud->updateIncidencias($oIncidencias) ;	
	} elseif ($_POST['oper'] == 'del') {
		include_once('class.calculos.php');

		$oCrud = new Calculos();
  	  	$oCrud->deleteIncidencias($_POST['id']);
	}
}
