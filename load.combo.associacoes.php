<?php
//header('Content-type: text/plain');

include_once('class.crud.php');

$combobox  = $_GET['lookup'];
$sDiaCorte = $_GET['sdiacorte'];

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

if ($combobox == "produtos") {
	include_once('class.calculos.php');

	$oCrud = new Calculos();
	$oProdutos = $oCrud->getProdutos();
	
	$i = 0;
	foreach ( $oProdutos as $aProdutos ) { 
		$oProdutos[$i]->PK_Codigo 	= utf8_encode($oProdutos[$i]->PK_Codigo);
		$oProdutos[$i]->Nome 		= utf8_encode($oProdutos[$i]->Nome);
		$oProdutos[$i]->Valor 		= utf8_encode($oProdutos[$i]->Valor);
		$oProdutos[$i]->Taxa 		= utf8_encode($oProdutos[$i]->Taxa);
		$i++;
	}	
	echo json_encode($oProdutos);
}

if ($combobox == "associacoes") {
	$oCrud = new Crud();
	$sWhere = '(z.Dia_Corte = '.$sDiaCorte.')';
	$oAssociacoes = $oCrud->getComboAssociacoes($sWhere);
	
	$i = 0;
	foreach($oAssociacoes as $aDados) {
		$oAssociacoes[$i]->PK_Codigo = utf8_encode($oAssociacoes[$i]->PK_Codigo);
		$oAssociacoes[$i]->Nome = utf8_encode($oAssociacoes[$i]->Nome);
		if (empty($oAssociacoes[$i]->Sigla)) {
			$oAssociacoes[$i]->Sigla 	= $oAssociacoes[$i]->Nome;
		} else {
			$oAssociacoes[$i]->Sigla 	= utf8_encode($oAssociacoes[$i]->Sigla);
		}
		$i++;
	}
	echo json_encode($oAssociacoes);
}

?>