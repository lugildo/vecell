<?php
include_once('class.crud.php');
$oCrud 			= new Crud();
$oAssociacoes	= $oCrud->getAssociacoes('WHERE z.Dia_Corte = 10');
unset($oCrud);
include_once('class.calculos.php');
$oCalculos 		= new Calculos();
$oProdutos 		= $oCalculos->getProdutos();
$oIncidencias 	= $oCalculos->getIncidencias();
$oRegras 		= $oCalculos->getRegras();

/*    $mes = '02';      
    $ano = date("Y");
    $ultimo_dia = date("t", mktime(0,0,0,$mes,'01',$ano));
    echo $ultimo_dia;



//echo '<pre>';
//echo 'Produtos:<br>';
//print_r($oProdutos);
//echo 'Incidencias:<br>';
//print_r($oIncidencias);
//echo 'Regras:<br>';
//print_r($oRegras);

echo '<pre>';
echo 'Parcelas:<br>';
print_r($oParcelas);
echo '</pre>';
echo '<pre>';
echo 'Associações:<br>';
print_r($oAssociacoes);
echo '</pre>';
*/


foreach ($oAssociacoes as $iKey => $aDados) {
	//echo $aDados->PK_Codigo.' | '.$aDados->Dia_Corte.'<br>';
	
	$oRegras 	= $oCalculos->getRegras(' WHERE a.FK_Associacao = '.$aDados->PK_Codigo );
	if (!empty($oRegras)) {
		
		$oParcelas 		= $oCalculos->getParcelas('AND (TB_Parcelas.PK_NroParc > 0)', '11/11/2016', '12/10/2016', $aDados->PK_Codigo);
		foreach ($oRegras as $iKeyRegras => $aDadosRegras) {
			//echo '<pre>';
			//  print_r($aDadosRegras);
			//echo '<pre>';
			if (!empty($oParcelas)) {
				$i = 0;
				$iLimite = 0;
				foreach ($oParcelas as $iKeyParcelas => $aDadosParcelas){
					
					$aFechamento[$aDadosParcelas->cd_siglaassociacao][$aDadosParcelas->nm_associado][$i]['associado'] 		= $aDadosParcelas->nm_associado;
					$aFechamento[$aDadosParcelas->cd_siglaassociacao][$aDadosParcelas->nm_associado][$i]['matricula'] 		= $aDadosParcelas->id_matricula;
					$aFechamento[$aDadosParcelas->cd_siglaassociacao][$aDadosParcelas->nm_associado][$i]['limite']	 		= $aDadosParcelas->vl_limite;
					$aFechamento[$aDadosParcelas->cd_siglaassociacao][$aDadosParcelas->nm_associado][$i]['fone']	 		= $aDadosParcelas->tx_fone;
					$aFechamento[$aDadosParcelas->cd_siglaassociacao][$aDadosParcelas->nm_associado][$i]['celular']	 		= $aDadosParcelas->tx_celular;
					$aFechamento[$aDadosParcelas->cd_siglaassociacao][$aDadosParcelas->nm_associado][$i]['email']	 		= $aDadosParcelas->tx_email;
					$aFechamento[$aDadosParcelas->cd_siglaassociacao][$aDadosParcelas->nm_associado][$i]['datacompra'] 		= $aDadosParcelas->dt_compra;
					$aFechamento[$aDadosParcelas->cd_siglaassociacao][$aDadosParcelas->nm_associado][$i]['conveniada'] 		= $aDadosParcelas->nm_conveniada;
					$aFechamento[$aDadosParcelas->cd_siglaassociacao][$aDadosParcelas->nm_associado][$i]['associacao'] 		= $aDadosParcelas->cd_siglaassociacao;
					$aFechamento[$aDadosParcelas->cd_siglaassociacao][$aDadosParcelas->nm_associado][$i]['codigoliberacao'] = $aDadosParcelas->cd_liberacao;
					$aFechamento[$aDadosParcelas->cd_siglaassociacao][$aDadosParcelas->nm_associado][$i]['valorparcela'] 	= $aDadosParcelas->vl_parcela;
					$aFechamento[$aDadosParcelas->cd_siglaassociacao][$aDadosParcelas->nm_associado][$i]['numeroparcela'] 	= $aDadosParcelas->nr_parcela.'/'.$aDadosParcelas->nr_totalparcelas;
					
					$i++;
				}
			}
		}
		
	}
}
/*
if ($aDadosParcelas->nr_parcela == 1) {
							if($iLimite < 4) {
								if ($aDadosRegras->TaxaProduto > 0) {
									$aFechamento[$aDadosParcelas->cd_siglaassociacao][$aDadosParcelas->nm_associado][$i]['produto'] 	= $aDadosRegras->Produto;
									$aFechamento[$aDadosParcelas->cd_siglaassociacao][$aDadosParcelas->nm_associado][$i]['valor'] 		= ($aDadosParcelas->vl_parcela * $aDadosRegras->TaxaProduto) * 100 .'<br>';
								}
								if ($aDadosRegras->ValorProduto > 0) {
									$aFechamento[$aDadosParcelas->cd_siglaassociacao][$aDadosParcelas->nm_associado][$i]['produto'] 	= $aDadosRegras->Produto;
									$aFechamento[$aDadosParcelas->cd_siglaassociacao][$aDadosParcelas->nm_associado][$i]['valor'] 		= $aDadosRegras->ValorProduto.'<br>';
								}	
							}
							
						} 
*/
echo '<pre>';
	print_r($aFechamento);
echo '</pre>';



/*
1) buscar as associações e retornar id e dia de corte
2) buscar movimentação de compras no período de fechamento, para cada associação
3) buscar regras a serem calculadas
4) buscar associados e aplicar cálculo de regras
*/

?>