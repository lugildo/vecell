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

// ------------------------------------------------------------------
// TODO GUGU 22092016
// ------------------------------------------------------------------
if ($combobox == "produtos") {
	$oCrud = new Crud();
	$oProdutos = $oCrud->getProdutos('PK_Codigo > 0' );

	foreach($oProdutos as $iKey => $aDados) {
		$aProdutos[$iKey] = utf8_encode($aDados->Nome);
	}
	unset($oCrud, $oProdutos);
	echo json_encode($aProdutos);
}


if ($combobox == "associacoes") {
	$oCrud = new Crud();
	$oAssociacoes = $oCrud->getAssociacoes();

	foreach($oAssociacoes as $iKey => $aDados) {
		$aAssociacoes[$iKey] = utf8_encode($aDados->Nome);
	}
	unset($oCrud, $oAssociacoes);
	echo json_encode($aAssociacoes);
}


if ($combobox == "associados") {
	$oCrud = new Crud();
	$oAssociados = $oCrud->getAssociados('PK_Codigo > 0' );

	foreach($oAssociados as $iKey => $aDados) {
		$aAssociados[$iKey] = utf8_encode($aDados->Nome);
	}
	unset($oCrud, $oAssociados);
	echo json_encode($aAssociados);
}


if ($combobox == "conveniadas") {
	echo "";
}


if ($combobox == "incidencias") {
	echo "";
}

// ------------------------------------------------------------------
// END TODO GUGU 22092016
// ------------------------------------------------------------------

?>