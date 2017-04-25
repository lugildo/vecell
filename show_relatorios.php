<?php
if ($_GET['sConveniada'] == 1 ) {
	$sDiaCorte 		= $_GET['sDiaCorte'];
	$sMesComp  		= $_GET['sMesComp'];
	$sAno			= $_GET['sAno'];
	$sLojasProprias	= $_GET['sLojasProprias'];
	$sBloqueados	= $_GET['sBloqueados'];
	$sRescindidos	= $_GET['sRescindidos'];
	$iAssociacao	= $_GET['iAssociacao'];
	
	include_once('class.calculos.php');
	$oCalculos 		= new Calculos();
	$aConveniadas = $oCalculos->reportFechamentoConveniadas($iAssociacao, $sDiaCorte, $sMesComp, $sAno, $sLojasProprias, $sBloqueados, $sRescindidos);
	
	foreach ($aConveniadas as $iKeyConveniada => $aDadosConveniada) {
		$aFechamentoConveniada = $aDadosConveniada;
	}
	
	echo json_encode($aFechamentoConveniada);

}

if ($_GET['sTipo'] == 'analitico' AND $_GET['sConveniada'] ==0 ) {
	$sDiaCorte 		= $_GET['sDiaCorte'];
	$sMesComp  		= $_GET['sMesComp'];
	$sAno			= $_GET['sAno'];
	$sLojasProprias	= $_GET['sLojasProprias'];
	$sBloqueados	= $_GET['sBloqueados'];
	$sRescindidos	= $_GET['sRescindidos'];
	$iAssociacao	= $_GET['iAssociacao'];
	
	include_once('class.calculos.php');
	$oCalculos 		= new Calculos();
	$aFechamento = $oCalculos->reportFechamento($iAssociacao, $sDiaCorte, $sMesComp, $sAno, $sLojasProprias, $sBloqueados, $sRescindidos);
	
	
	
	echo json_encode($aFechamento);
}

if ($_GET['sTipo'] == 'conveniada' ) {
	include_once('class.calculos.php');
	$oCalculos 		= new Calculos();
	$oProdutos 		= $oCalculos->getProdutos();
	$oIncidencias 	= $oCalculos->getIncidencias();
	$oRegras 		= $oCalculos->getRegras();
	$oRegras 	= $oCalculos->getRegras(' WHERE a.FK_Associacao = '.$_GET['iAssociacao'] );
	if (!empty($oRegras)) {
		
		$sDiaIni = $_GET['sDiaCorte'] + 1;
		$sMesIni = $_GET['sMesComp'] - 1;
		if ($sMesIni < 1 ) {
			$sMesIni = 12 + $sMesIni;
			$sAnoIni = $_GET['sAno'] - 1;
		} else {
			$sAnoIni = $_GET['sAno'];
		}
		$sDataIni =  $sDiaIni.'/'.$sMesIni.'/'.$sAnoIni;
		$sDataFim = $_GET['sDiaCorte'].'/'.$_GET['sMesComp'].'/'.$_GET['sAno'];
		$oParcelas 		= $oCalculos->getParcelas('AND (TB_Parcelas.PK_NroParc > 0)', $sDataIni, $sDataFim, $_GET['iAssociacao']);
		setlocale(LC_MONETARY,"pt_BR", "ptb");
		foreach ($oRegras as $iKeyRegras => $aDadosRegras) {
			//echo '<pre>';
			//  print_r($oParcelas);
			//echo '<pre>';
			if (!empty($oParcelas)) {
				$i = 0;
				$iLimite = 0;
				foreach ($oParcelas as $iKeyParcelas => $aDadosParcelas){
					
					
					$aFechamento[$i]['conveniada'] 		= utf8_encode($aDadosParcelas->nm_conveniada);
					$aFechamento[$i]['valor'] 			+= $aDadosParcelas->vl_parcela;
					
					$i++;
				}
			}
		}
	}
	echo json_encode($aFechamento);
}
?>
