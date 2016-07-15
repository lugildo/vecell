<?php
//header('Content-type: text/plain');

include_once('class.crud.php');

$combobox = $_GET['lookup'];

if ($combobox == "estados") {
	$oCrud = new Crud();
	$oEstados = $oCrud->getEstados('PK_Sigla IS NOT NULL' );
	foreach($oEstados as $iKey => $aDados) {
		$aEstados[$iKey] = utf8_encode($aDados->PK_Sigla);
	}
	unset($oCrud, $oEstados);
	echo json_encode($aEstados);
}

if ($combobox == "bancos") {
	$oCrud = new Crud();
	$oBancos = $oCrud->getBancos('PK_Codigo > 0' );

	foreach($oBancos as $iKey => $aDados) {
		$aBancos[$iKey] = utf8_encode($aDados->Nome);
	}
	unset($oCrud, $oBancos);
	echo json_encode($aBancos);
}

if ($combobox == "consultores") {
	echo "";
}

?>