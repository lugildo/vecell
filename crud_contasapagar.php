<?php

if ($_GET) {
	include_once('class.crud.finan.php');

	$oCrudFinan = new CrudFinan();
	$oCtaPagar  = $oCrudFinan->getCtaPagar();
	$aCtaPagar = '';

	$i = 0;
	foreach ( $oCtaPagar as $aCtaPagar ) { 

		$aCtaPagar[$i]->idcta_pagar			= utf8_encode($aCtaPagar[$i]->idcta_pagar);
		$aCtaPagar[$i]->nm_favorecido		= utf8_encode($aCtaPagar[$i]->nm_favorecido);
		$aCtaPagar[$i]->dt_vencimento		= utf8_encode($aCtaPagar[$i]->dt_vencimento);
		$aCtaPagar[$i]->vl_pagar			= utf8_encode($aCtaPagar[$i]->vl_pagar);
		$aCtaPagar[$i]->dt_pago				= utf8_encode($aCtaPagar[$i]->dt_pago);
		$aCtaPagar[$i]->cd_status			= utf8_encode($aCtaPagar[$i]->cd_status);
		$aCtaPagar[$i]->nm_ccusto			= utf8_encode($aCtaPagar[$i]->nm_ccusto);
		$aCtaPagar[$i]->nm_classificacao	= utf8_encode($aCtaPagar[$i]->nm_classificacao);
		$aCtaPagar[$i]->tx_obs				= utf8_encode($aCtaPagar[$i]->tx_obs);
		$aCtaPagar[$i]->nm_formapgto		= utf8_encode($aCtaPagar[$i]->nm_formapgto);
		$aCtaPagar[$i]->vl_pago				= utf8_encode($aCtaPagar[$i]->vl_pago);
		
		$i++;
 
	}	
	echo json_encode($aCtaPagar);
}

if ($_POST) {
	print_r($_POST);
	if($_POST['oper'] == 'add') {
		
		//$aInsertCtaPagar = json_decode($_POST, true);
		$aInsertCtaPagar = json_decode(json_encode( $_POST ), true );
		include_once('class.crud.finan.php');

		$oCrudFinan = new CrudFinan();
		$oCtaPagar  = $oCrudFinan->insertCtaPagar($aInsertCtaPagar);
		
	}
	// edit
	// insert
	// delete
}

?>
