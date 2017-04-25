<?php
/**
* Classe para controle das regras de cálculos de fechamento 
* @author Luciano Terres <lucianoterresrosa@gmail.com>
* @version 0.1 
* @copyright  GPL © 2016, vecell card. 
* @access public  
**/
class Calculos {
	var $sHost = "dbsq0002.whservidor.com.br";
	var $sUser = "vecell";
	var $sPass = "maka951";
	var $sBase = "vecell";
	var $oCon;
		
	function __construct() {
        $this->connect();		
	}
	
	// No contrutor da classe faremos a conexão ao banco de dados
	function connect() {
		try { 
			$this->oCon = new PDO("dblib:host=$this->sHost; dbname=$this->sBase", $this->sUser, $this->sPass); 
		} 
		catch(PDOException $ex){ 
			die("Failed to connect to the database: " . $ex->getMessage());
		} 
		$this->oCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		$this->oCon->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
	}
	
	/**    INÍCIO CRUD DE REGRAS    **/
	// Função para listar regras
	function getRegras($sWhere = ' WHERE a.PK_Codigo > 0 ') {
		try {
			$oResult = $this->oCon->query(" SELECT 	a.PK_Codigo, 
													a.FK_Produto, 
													a.FK_Associacao, 
													a.FK_Associado, 
													a.FK_Conveniada, 
													a.FK_Incidencia, 
													b.Nome as Produto, 
													b.Valor as ValorProduto, 
													b.Taxa as TaxaProduto, 
													c.Sigla, 
													c.Nome as Associacao, 
													d.Nome as Conveniada, 
													f.Nome as Associado,
													e.Condicao1, 
													e.Condicao2, 
													e.Condicao3, 
													e.Condicao4, 
													e.Condicao5, 
													a.Lim_Qt_Compras
											  FROM TB_Regras as a
											 LEFT JOIN TB_Produtos 		as b on	(b.PK_Codigo = a.FK_Produto)
											 LEFT JOIN TB_Associacoes 	as c on	(c.PK_Codigo = a.FK_Associacao)
											 LEFT JOIN TB_Conveniadas 	as d on (d.PK_Codigo = a.FK_Conveniada)
											 LEFT JOIN TB_Incidencias 	as e on (e.PK_Codigo = a.FK_Incidencia)
											 LEFT JOIN TB_CLientes 		as f on (f.PK_Matricula = a.FK_Associado AND f.FK_Assoc = a.FK_Associacao)
											 ".$sWhere."
											 " ); 
											 
										  
			if($oResult)
				{
					//percorre os resultados via o fetch()
					$oRegras = $oResult->fetchAll(PDO::FETCH_OBJ);
				}

		} catch(PDOException $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}

		return $oRegras;
	}
	
	// Função para atualizar regras
	function updateRegras($aUpdateRegras) {
		
		$sSQL = " UPDATE TB_Regras 
					 SET	FK_Produto		= ".$aUpdateRegras['FK_Produto'].", 																
							FK_Associacao	= ".$aUpdateRegras['FK_Associacao'].", 															
							FK_Associado	= ".$aUpdateRegras['FK_Associado'].",
							FK_Conveniada	= ".$aUpdateRegras['FK_Conveniada'].",
							FK_Incidencia	= ".$aUpdateRegras['FK_Incidencia'].",
							Lim_Qt_Compras	= ".$aUpdateRegras['Lim_Qt_Compras']."
				   WHERE ( PK_Codigo = ".$aUpdateRegras['PK_Codigo'].") ";
		
												  echo "<pre>";
													print_r($sSQL);
												  echo "<pre>";												  										 
		try {
			$oUpdateRegras = $this->oCon->prepare($sSQL); 
			$oUpdateRegras->execute();
		} catch(PDOException $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}

		return true;
	}
	
	// Função para inserir regras
	function insertRegras($aInsertRegras) {
		try {
			$oInsertRegras = $this->oCon->prepare(" Declare @id numeric(3,0);
															SELECT @id = max(PK_Codigo) + 1 from TB_Regras;
															INSERT INTO TB_Regras 
													            (	PK_Codigo, FK_Produto, FK_Associacao, FK_Associado, FK_Conveniada, FK_Incidencia, Lim_Qt_Compras)
														 VALUES (	@id,
																	".$aInsertRegras['FK_Produto'].", 
																	".$aInsertRegras['FK_Associacao'].", 
																	".$aInsertRegras['FK_Associado'].",  
																	".$aInsertRegras['FK_Conveniada'].",  
																	".$aInsertRegras['FK_Incidencia'].",  
																	".$aInsertRegras['Lim_Qt_Compras']." ) 
												  "); 
			$oInsertRegras->execute();
		} catch(PDOException $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}

		return true; 
	}
	
	// Função para excluir regras
	function deleteRegras($iIdRegra) {
		try {
			$oDeleteRegra = $this->oCon->prepare(" DELETE FROM TB_Regras 
							  						      WHERE PK_Codigo = ".$iIdRegra." "); 
			$oDeleteRegra->execute();
		} catch(PDOException $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}

		return true;
	}
	/**    FIM CRUD DE REGRAS    **/
	
	/**    INÍCIO CRUD DE INCIDENCIAS    **/
	// Função para listar incidencias
	function getIncidencias($sWhere = ' WHERE a.PK_Codigo > 0 ') {
		try {
			$oResult = $this->oCon->query(" SELECT a.PK_Codigo, a.FK_Produto, a.Condicao1, a.Condicao2, a.Condicao3, a.Condicao4, a.Condicao5,
												   b.Nome, b.Valor, b.Taxa
											  FROM TB_Incidencias as a
											 INNER JOIN TB_Produtos as b on (b.PK_Codigo = a.FK_Produto)
											  ".$sWhere."
											 " ); 
										  
			if($oResult)
				{
					//percorre os resultados via o fetch()
					$oIncidencias = $oResult->fetchAll(PDO::FETCH_OBJ);
				}

		} catch(PDOException $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}

		return $oIncidencias;
	}
	
	// Função para atualizar incidencias
	function updateIncidencias($aUpdateIncidencias) {
		
		$sSQL = " UPDATE TB_Incidencias 
					 SET	FK_Produto	= ".$aUpdateIncidencias['FK_Produto'].", 																
							Condicao1	= '".$aUpdateIncidencias['Condicao1']."', 																
							Condicao2	= '".$aUpdateIncidencias['Condicao2']."', 																
							Condicao3	= '".$aUpdateIncidencias['Condicao3']."', 																
							Condicao4	= '".$aUpdateIncidencias['Condicao4']."', 																
							Condicao5	= '".$aUpdateIncidencias['Condicao5']."'
				   WHERE ( PK_Codigo = ".$aUpdateIncidencias['PK_Codigo'].") ";
		//echo $sSQL;											  										 
		try {
			$oUpdateIncidencias = $this->oCon->prepare($sSQL); 
			$oUpdateIncidencias->execute();
		} catch(PDOException $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}

		return true;
	}
	
	// Função para inserir incidencias
	function insertIncidencias($aInsertIncidencias) {
		try {
			$oInsertIncidencias = $this->oCon->prepare(" 	Declare @id numeric(3,0);
															SELECT @id = max(PK_Codigo) + 1 from TB_Incidencias;
															INSERT INTO TB_Incidencias 
													                 (	PK_Codigo, FK_Produto, Condicao1, Condicao2, Condicao3, Condicao4, Condicao5)
															  VALUES (	@id,
																		".$aInsertIncidencias['FK_Produto'].", 
																		".$aInsertIncidencias['Condicao1'].", 
																		".$aInsertIncidencias['Condicao2'].", 
																		".$aInsertIncidencias['Condicao3'].", 
																		".$aInsertIncidencias['Condicao4'].", 
																		".$aInsertIncidencias['Condicao5']." ) 
														"); 
														
	echo '<pre>';
	print_r($oInsertIncidencias);
	echo '<pre>';
			$oInsertIncidencias->execute();
		} catch(PDOException $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}

		return true; 
	}
	
	// Função para excluir incidencias
	function deleteIncidencias($iIdIncidencia) {
		try {
			$oDeleteIncidencia = $this->oCon->prepare(" DELETE FROM TB_Incidencias 
							  						      WHERE PK_Codigo = ".$iIdIncidencia." "); 
			$oDeleteIncidencia->execute();
		} catch(PDOException $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}

		return true;
	}
	/**    FIM CRUD DE INCIDENCICAS    **/

	/**    INÍCIO CRUD DE PRODUTOS    **/
	// Função para buscar produtos	
	function getProdutos($sWhere = ' WHERE PK_Codigo > 0 ') {
		try {
			$oResult = $this->oCon->query(" SELECT PK_Codigo,
				 									 Nome,
													 Valor,
													 Taxa
				                                FROM TB_Produtos 
			                                  ".$sWhere." 
											   order by Nome ASC");
			if($oResult)
				{
					$oProdutos = $oResult->fetchAll(PDO::FETCH_OBJ);
				}
		} catch(PDOException $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}

		return $oProdutos;
	}
	
	// Função para atualizar produtos
	function updateProdutos($aUpdateProdutos) {
		
		$sSQL = " UPDATE TB_Produtos 
					 SET	Nome	= '".$aUpdateProdutos['Nome']."', 																
							Valor	= '".$aUpdateProdutos['Valor']."', 																
							Taxa	= '".$aUpdateProdutos['Taxa']."'
				   WHERE ( PK_Codigo = ".$aUpdateProdutos['PK_Codigo'].") ";
														  										 
		try {
			$oUpdateProdutos = $this->oCon->prepare($sSQL); 
			$oUpdateProdutos->execute();
		} catch(PDOException $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}

		return true;
	}
	
	// Função para inserir produtos
	function insertProdutos($aInsertProdutos) {
		try {
			$oInsertProdutos = $this->oCon->prepare("   Declare @id numeric(3,0);
														SELECT @id = max(PK_Codigo) + 1 from TB_Produtos;
														INSERT INTO TB_Produtos 
													                 (PK_Codigo, Nome, Valor, Taxa)
															  VALUES (@id, '".$aInsertProdutos['Nome']."', ".$aInsertProdutos['Valor'].", ".$aInsertProdutos['Taxa']."); "); 
			
			$oInsertProdutos->execute();
		} catch(PDOException $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}

		return true; 
	}
	
	// Função para excluir produtos
	function deleteProdutos($iIdProduto) {
		try {
			$oDeleteProduto = $this->oCon->prepare(" DELETE FROM TB_Produtos 
							  						      WHERE PK_Codigo = ".$iIdProduto." "); 
			echo '<pre>';
			print_r($oDeleteProduto);
			echo '<pre>';
			
			$oDeleteProduto->execute();
		} catch(PDOException $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}

		return true;
	}
	/**    FIM CRUD DE PRODUTOS    **/
	
	// Função para listar Movimento de produtos
	function getMovProdutos() {
		try {
			$oResult = $this->oCon->query(" SELECT *
											  FROM TB_Mov_Produtos " ); 
										  
			if($oResult)
				{
					//percorre os resultados via o fetch()
					$oMovProdutos = $oResult->fetchAll(PDO::FETCH_OBJ);
				}

		} catch(PDOException $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}

		return $oMovProdutos;
	}
	
	// Função para calcular incidencias e registrar na tabela de movimento de produtos
	function calculaIncidencia($aIncidencia, $aParametros) {
		foreach ($aIncidencia as $iKey => $iCond) { 
			switch ($iCond) {
				case 1:
					// TAUC sobre a primeira parcela
					foreach ($aParametros as $iKeyPar => $aDados) {
						$fValorParcelas = $this->getParcelas('AND (TB_Parcelas.PK_NroParc > 0)', $aDados['dt_corte_ini'], $aDados['dt_corte_fim'], $aDados['fk_associacao']);
					}
					break;
				case 2:
					// TAUC sobre a primeira parcela limitada a um número de parcela especificado no contrato
					foreach ($aParametros as $iKeyPar => $aDados) {
						$fValorParcelas = $this->getParcelas('AND (TB_Parcelas.PK_NroParc < 4)', $aDados['dt_corte_ini'], $aDados['dt_corte_fim'], $aDados['fk_associacao']);
					}
					break;
				case 3:
					// MENSALIDADE todos os associados ativos
					break;
				case 4:
					// MENSALIDADE todos os associados ativos com transação financeira, exceto seguro
					break;
				case 5:
					// MENSALIDADE todos os associados ativos com transação financeira
					break;
				case 6:
					// MENSALIDADE todos os associados ativos com nova compra no mês
					break;
				case 7:
					// SEGURO
					break;
				case 8:
					// SERVIÇOS ex. extrato
					break;
				case 9:
					// OUTRAS DESPESAS ex. motoboy
					break;
				case 10:
					// ASSISTENCIA FUNERAL
					break;
			}
		}
		return true;
	}
	
		
	// Função para buscar parcelas
	// $iNumParc = 0  => buscar todas
	function getParcelas($sWhereParc, $dDtCorteIni, $dDtCorteFim, $iFkAssociacao, $sWhere="AND (TB_Conveniadas.Loja_Assoc = Cast('0' as bit))") {
		try {
			$oResult = $this->oCon->query(" SELECT 
													TB_Ordens_Compra.PK_CtOrdem AS 'cd_liberacao', ' ' + Convert(Char(10), 
													TB_Ordens_Compra.Data, 103) + ' ' AS 'dt_compra', 
													TB_Ordens_Compra.Condicoes AS 'nr_totalparcelas', 
													TB_Ordens_Compra.Vlr_Tot AS 'vl_total', 
													TB_Ordens_Compra.Origem AS 'tx_origem', 
													IsNull(TB_Conveniadas.PK_Codigo, '0') AS 'id_conveniada', 
													IsNull(TB_Conveniadas.Nome, 'NAO LOCALIZADO') AS 'nm_conveniada', 
													IsNull(TB_Clientes.PK_Matricula, '0') AS 'id_matricula', 
													IsNull(TB_Clientes.Nome, 'NAO LOCALIZADO') AS 'nm_associado', 
													IsNull(TB_Clientes.Lim_Credito, '0') AS 'vl_limite', 
													IsNull(TB_Clientes.Email, 'NAO INFORMADO') AS 'tx_email', 
													IsNull(TB_Clientes.Fone, '0') AS 'tx_fone', 
													IsNull(TB_Clientes.Celular, '0') AS 'tx_celular', 
													IsNull(TB_Associacoes.PK_Codigo, '0') AS 'id_associacao', 
													IsNull(TB_Associacoes.Sigla, 'NAO LOCALIZADO') AS 'cd_siglaassociacao', 
													TB_Parcelas.PK_NroParc AS 'nr_parcela', ' ' + Convert(Char(10), 
													TB_Parcelas.Data, 103) + ' ' AS 'dt_parcela', 
													TB_Parcelas.Valor AS 'vl_parcela' 
											  FROM  TB_Ordens_Compra 
														LEFT JOIN TB_Conveniadas ON (TB_Ordens_Compra.PK_Conveniada = TB_Conveniadas.PK_Codigo) 
														LEFT JOIN TB_Clientes ON ((TB_Ordens_Compra.PK_Associado = TB_Clientes.PK_Matricula) AND (TB_Ordens_Compra.PK_Associacao = TB_Clientes.FK_Assoc)) 
														LEFT JOIN TB_Associacoes ON (TB_Ordens_Compra.PK_Associacao = TB_Associacoes.PK_Codigo) 
														INNER JOIN TB_Parcelas ON (TB_Ordens_Compra.PK_CtOrdem = TB_Parcelas.PK_CtOrdem) 
											 WHERE (TB_Ordens_Compra.PK_CtOrdem > 0) 
													AND (TB_Parcelas.Data >= Cast('".$dDtCorteIni."' as DateTime)) 
													AND (TB_Parcelas.Data <= Cast('".$dDtCorteFim."' as DateTime)) 
													AND (TB_Associacoes.PK_Codigo = ".$iFkAssociacao.")
													".$sWhere."
													AND (TB_Ordens_Compra.PK_CtOrdem NOT IN (
															SELECT TB_Historicos.PK_CtOrdem_Ref
															FROM TB_Historicos
													))
													AND (TB_Ordens_Compra.Vlr_Tot >0)
													".$sWhereParc."
											 ORDER BY TB_Clientes.Nome, TB_Ordens_Compra.PK_CtOrdem ASC, TB_Parcelas.PK_NroParc ASC;
										" ); 
										
										/*echo '<pre>';
										print_r($oResult);
										echo '<pre>';*/
			if($oResult)
				{
					//percorre os resultados via o fetch()
					$oParcelas = $oResult->fetchAll(PDO::FETCH_OBJ);
				}

		} catch(PDOException $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}

		return $oParcelas;
	}
	
	
	// TO DO GUGU
	function getCondicao () {
		$aCondicao = array(	1 => 'TAUC sobre a primeira parcela',
							2 => 'teste');
		
	}
	
	function reportFechamento ($iAssociacao, $sDiaCorte, $sMesComp, $sAno, $sLojasProprias, $sBloqueados, $sRescindidos) {
		$oRegras 		= $this->getRegras(' WHERE a.FK_Associacao = '.$iAssociacao );
		if (!empty($oRegras)) {
			
			$sDiaIni = $sDiaCorte + 1;
			$sMesIni = $sMesComp - 1;
			if ($sMesIni < 1 ) {
				$sMesIni = 12 + $sMesIni;
				$sAnoIni = $sAno - 1;
			} else {
				$sAnoIni = $sAno;
			}
			$sDataIni = $sMesIni.'/'.$sDiaIni.'/'.$sAnoIni;
			$sDataFim = $sMesComp.'/'.$sDiaCorte.'/'.$sAno;
			if ($sLojasProprias == 'sim') {
				$sWhere = "AND ((IsNull(TB_Conveniadas.Loja_Assoc, Cast('0' as bit)) = Cast('1' as Bit)) OR IsNull(TB_Conveniadas.Loja_Assoc, Cast('0' as bit)) = Cast('0' as Bit))";
			} else {
				$sWhere = " AND IsNull(TB_Conveniadas.Loja_Assoc, Cast('0' as bit)) = Cast('0' as Bit)";
			}
			
			if ($sBloqueados == 'sim') {
				$sWhere .= "AND ((IsNull(TB_Clientes.Bloq, Cast('0' as bit)) = Cast('1' as Bit)) OR IsNull(TB_Clientes.Bloq, Cast('0' as bit)) = Cast('0' as Bit))";
			} else {
				$sWhere .= "AND IsNull(TB_Clientes.Bloq, Cast('0' as bit)) = Cast('0' as Bit)";
			}
			
			if ($sRescindidos == 'sim') { 
				$sWhere .= "AND ((IsNull(TB_Clientes.Rescisao, Cast('0' as bit)) = Cast('1' as Bit)) OR IsNull(TB_Clientes.Rescisao, Cast('0' as bit)) = Cast('0' as Bit))";
			} else {
				$sWhere .= " AND IsNull(TB_Clientes.Rescisao, Cast('0' as bit)) = Cast('0' as Bit)";
			}
			 
			
			$oParcelas 		= $this->getParcelas('AND (TB_Parcelas.PK_NroParc > 0)', $sDataIni, $sDataFim, $iAssociacao, $sWhere);
			setlocale(LC_MONETARY,"pt_BR", "ptb");
			
			foreach ($oRegras as $iKeyRegras => $aDadosRegras) {
				
				if (!empty($oParcelas)) {
					$i = 0;
					$iLimite = 0;
					foreach ($oParcelas as $iKeyParcelas => $aDadosParcelas){
						if ($aDadosParcelas->nr_parcela == 1 AND $aDadosParcelas->nm_conveniada != 'VECELL - TAUC') {
							$aCalculaIncidencia[$aDadosParcelas->id_matricula][$aDadosParcelas->cd_liberacao]['nr_parcela']			= $aDadosParcelas->nr_parcela;
								$aCalculaIncidencia[$aDadosParcelas->id_matricula][$aDadosParcelas->cd_liberacao]['vl_parcela']		= $aDadosParcelas->vl_parcela;
								$aCalculaIncidencia[$aDadosParcelas->id_matricula][$aDadosParcelas->cd_liberacao]['dt_parcela']		= $aDadosParcelas->dt_parcela;
								$aCalculaIncidencia[$aDadosParcelas->id_matricula]['iQtdParcelas'][$aDadosParcelas->cd_liberacao] 	= 1;
								$aCalculaIncidencia[$aDadosParcelas->id_matricula]['id_matricula']									= $aDadosParcelas->id_matricula;
								$aCalculaIncidencia[$aDadosParcelas->id_matricula]['cd_liberacao']									= $aDadosParcelas->cd_liberacao;
								$aCalculaIncidencia[$aDadosParcelas->id_matricula]['nm_associado']									= $aDadosParcelas->nm_associado;
								$aCalculaIncidencia[$aDadosParcelas->id_matricula]['vl_limite']										= number_format($aDadosParcelas->vl_limite, 2, ',', '.');
								$aCalculaIncidencia[$aDadosParcelas->id_matricula]['tx_fone']										= $aDadosParcelas->tx_fone;
								$aCalculaIncidencia[$aDadosParcelas->id_matricula]['tx_celular']									= $aDadosParcelas->tx_celular;
								$aCalculaIncidencia[$aDadosParcelas->id_matricula]['tx_email']										= $aDadosParcelas->tx_email;
								$aCalculaIncidencia[$aDadosParcelas->id_matricula]['cd_siglaassociacao']							= $aDadosParcelas->cd_siglaassociacao;
						}
						
						// seguro
						if($aDadosRegras->Produto == 'Angelus Capemisa' AND $aDadosRegras->FK_Associado == $aDadosParcelas->id_matricula) { 
							$aCalculaSeguro[$aDadosParcelas->id_matricula]['iQtdParcelas']			= 1;
							$aCalculaSeguro[$aDadosParcelas->id_matricula]['id_matricula']			= $aDadosParcelas->id_matricula;
							$aCalculaSeguro[$aDadosParcelas->id_matricula]['cd_liberacao']			= $aDadosParcelas->cd_liberacao;
							$aCalculaSeguro[$aDadosParcelas->id_matricula]['nm_associado']			= $aDadosParcelas->nm_associado;
							$aCalculaSeguro[$aDadosParcelas->id_matricula]['vl_limite']				= number_format($aDadosParcelas->vl_limite, 2, ',', '.');
							$aCalculaSeguro[$aDadosParcelas->id_matricula]['tx_fone']				= $aDadosParcelas->tx_fone;
							$aCalculaSeguro[$aDadosParcelas->id_matricula]['tx_celular']			= $aDadosParcelas->tx_celular;
							$aCalculaSeguro[$aDadosParcelas->id_matricula]['tx_email']				= $aDadosParcelas->tx_email;
							$aCalculaSeguro[$aDadosParcelas->id_matricula]['cd_siglaassociacao']	= $aDadosParcelas->cd_siglaassociacao;
							$aCalculaSeguro[$aDadosParcelas->id_matricula]['valorparcela']			= $aDadosRegras->ValorProduto;
						}
						
						
						// mensalidade
						if ($aDadosRegras->Produto == 'Mensalidade' AND $aDadosParcelas->nm_conveniada != 'SEGURO CAPEMISA') {
							$aCalculaMensalidade[$aDadosParcelas->id_matricula]['nr_parcela']		= $aDadosParcelas->nr_parcela;
							$aCalculaMensalidade[$aDadosParcelas->id_matricula]['valorparcela']		= $aDadosRegras->ValorProduto;
							$aCalculaMensalidade[$aDadosParcelas->id_matricula]['vl_parcela']		= $aDadosRegras->ValorProduto;
							$aCalculaMensalidade[$aDadosParcelas->id_matricula]['dt_parcela']		= $aDadosParcelas->dt_parcela;
							$aCalculaMensalidade[$aDadosParcelas->id_matricula]['iQtdParcelas'] 	= 1;
							$aCalculaMensalidade[$aDadosParcelas->id_matricula]['id_matricula']		= $aDadosParcelas->id_matricula;
							$aCalculaMensalidade[$aDadosParcelas->id_matricula]['cd_liberacao']		= $aDadosParcelas->cd_liberacao;
							$aCalculaMensalidade[$aDadosParcelas->id_matricula]['nm_associado']		= $aDadosParcelas->nm_associado;
							$aCalculaMensalidade[$aDadosParcelas->id_matricula]['vl_limite']		= number_format($aDadosParcelas->vl_limite, 2, ',', '.');
							$aCalculaMensalidade[$aDadosParcelas->id_matricula]['tx_fone']			= $aDadosParcelas->tx_fone;
							$aCalculaMensalidade[$aDadosParcelas->id_matricula]['tx_celular']		= $aDadosParcelas->tx_celular;
							$aCalculaMensalidade[$aDadosParcelas->id_matricula]['tx_email']			= $aDadosParcelas->tx_email;
							$aCalculaMensalidade[$aDadosParcelas->id_matricula]['cd_siglaassociacao']	= $aDadosParcelas->cd_siglaassociacao;
						}
						
						$aFechamento[$i]['associado'] 		= utf8_encode($aDadosParcelas->nm_associado);
						$aFechamento[$i]['matricula'] 		= utf8_encode($aDadosParcelas->id_matricula);
						$aFechamento[$i]['limite']	 		= utf8_encode(number_format($aDadosParcelas->vl_limite, 2, ',', '.'));
						$aFechamento[$i]['fone']	 		= utf8_encode($aDadosParcelas->tx_fone);
						$aFechamento[$i]['celular']	 		= utf8_encode($aDadosParcelas->tx_celular);
						$aFechamento[$i]['email']	 		= utf8_encode($aDadosParcelas->tx_email);
						$aFechamento[$i]['datacompra'] 		= utf8_encode($aDadosParcelas->dt_compra);
						$aFechamento[$i]['dataparcela'] 	= utf8_encode($aDadosParcelas->dt_parcela);
						$aFechamento[$i]['conveniada'] 		= utf8_encode($aDadosParcelas->nm_conveniada);
						$aFechamento[$i]['associacao'] 		= utf8_encode($aDadosParcelas->cd_siglaassociacao);
						$aFechamento[$i]['codigoliberacao'] = utf8_encode($aDadosParcelas->cd_liberacao);
						$aFechamento[$i]['valorparcela'] 	= utf8_encode(number_format($aDadosParcelas->vl_parcela, 2, ',', '.'));
						$aFechamento[$i]['valorparcelacalculo'] 	= $aDadosParcelas->vl_parcela;
						$aFechamento[$i]['numeroparcela'] 	= utf8_encode($aDadosParcelas->nr_parcela.'/'.$aDadosParcelas->nr_totalparcelas);
						
						$i++;
					}
									
					// Calcular incidencias
					if (!empty($aCalculaIncidencia)) {
						foreach ($aCalculaIncidencia as $iKeyCalcula => $aDadosCalcula) {
							
							$fSomaParcelas=0.0;
							$fSomaProdutos=0.0;	
							
							if ($aDadosRegras->Produto == 'TAUC'){
								if ($aDadosRegras->TaxaProduto) {
									
									 //refazer regra
								
								} elseif (($aDadosRegras->ValorProduto)) {
									
									
									$iQtdParcelas = count($aDadosCalcula['iQtdParcelas']);
								
										if ($iQtdParcelas <= $aDadosRegras->Lim_Qt_Compras) {
											$fSomaProdutos = $aDadosRegras->ValorProduto * $iQtdParcelas;
										} else {
											$fSomaProdutos = $aDadosRegras->ValorProduto * $aDadosRegras->Lim_Qt_Compras;
										}
										$aCalculaIncidencia[$iKeyCalcula]['TAUC'] = $fSomaProdutos;
										
									//$aCalculaIncidencia[$iKeyCalcula][$aDadosRegras->Produto] = $aDadosRegras->ValorProduto;
										
								}
							} elseif ($aDadosRegras->Produto == 'Mensalidade') {
								$aCalculaIncidencia[$iKeyCalcula][$aDadosRegras->Produto] = $aDadosRegras->ValorProduto;
							} /* else {
								if ($aDadosRegras->TaxaProduto) {
									
									 //refazer regra
								
								} elseif (($aDadosRegras->ValorProduto)) {
									
									$aCalculaIncidencia[$iKeyCalcula][$aDadosRegras->Produto] = $aDadosRegras->ValorProduto;
										
								}
							}*/
						}
						
						$j = count($aFechamento);
						foreach ($aCalculaIncidencia as $iKey => $aDadosFinal) {
							if ($aDadosRegras->Produto == 'TAUC'){
								$aFechamento[$j]['associado'] 			= utf8_encode($aDadosFinal['nm_associado']);
								$aFechamento[$j]['matricula'] 			= utf8_encode($aDadosFinal['id_matricula']);
								$aFechamento[$j]['limite']	 			= utf8_encode($aDadosFinal['vl_limite']);
								$aFechamento[$j]['fone']	 			= utf8_encode($aDadosFinal['tx_fone']);
								$aFechamento[$j]['celular']	 			= utf8_encode($aDadosFinal['tx_celular']);
								$aFechamento[$j]['email']	 			= utf8_encode($aDadosFinal['tx_email']);
								$aFechamento[$j]['datacompra'] 			= utf8_encode('N/A');
								$aFechamento[$j]['dataparcela'] 		= utf8_encode('N/A');
								$aFechamento[$j]['conveniada'] 			= utf8_encode('TAUC');
								$aFechamento[$j]['associacao'] 			= utf8_encode($aDadosFinal['cd_siglaassociacao']);
								$aFechamento[$j]['codigoliberacao'] 	= utf8_encode($aDadosFinal['cd_liberacao']);
								$aFechamento[$j]['valorparcela'] 		= utf8_encode(number_format($aDadosFinal['TAUC'], 2, ',', '.'));
								$aFechamento[$j]['valorparcelacalculo'] = $aDadosFinal['TAUC'];
								$aFechamento[$j]['numeroparcela'] 	= 1;
							}
							$j++;
						}
					}	
				}	
			}
		}
		// Calcular seguro
				
		$h = count($aFechamento);
		if (!empty($aCalculaSeguro)) {
			
			foreach ($aCalculaSeguro as $iKeySeguro => $aDadosSeguro) {
				$aFechamento[$h]['associado'] 			= utf8_encode($aDadosSeguro['nm_associado']);
				$aFechamento[$h]['matricula'] 			= utf8_encode($aDadosSeguro['id_matricula']);
				$aFechamento[$h]['limite']	 			= utf8_encode($aDadosSeguro['vl_limite']);
				$aFechamento[$h]['fone']	 			= utf8_encode($aDadosSeguro['tx_fone']);
				$aFechamento[$h]['celular']	 			= utf8_encode($aDadosSeguro['tx_celular']);
				$aFechamento[$h]['email']	 			= utf8_encode($aDadosSeguro['tx_email']);
				$aFechamento[$h]['datacompra'] 			= utf8_encode('N/A');
				$aFechamento[$h]['dataparcela'] 		= utf8_encode('N/A');
				$aFechamento[$h]['conveniada'] 			= utf8_encode('Angelus Capemisa');
				$aFechamento[$h]['associacao'] 			= utf8_encode($aDadosSeguro['cd_siglaassociacao']);
				$aFechamento[$h]['codigoliberacao'] 	= utf8_encode($aDadosSeguro['cd_liberacao']);
				$aFechamento[$h]['valorparcela'] 		= utf8_encode(number_format($aDadosSeguro['valorparcela'], 2, ',', '.'));
				$aFechamento[$h]['valorparcelacalculo'] = $aDadosSeguro['valorparcela'];
				$aFechamento[$h]['numeroparcela'] 		= 1;
				$h++;
			}
		}
		
		// Calcular mensalidade
		$k = count($aFechamento);
		if (!empty($aCalculaMensalidade)) {
			
			foreach ($aCalculaMensalidade as $iKeyMensalidade => $aDadosMensalidade) {
				$aFechamento[$k]['associado'] 			= utf8_encode($aDadosMensalidade['nm_associado']);
				$aFechamento[$k]['matricula'] 			= utf8_encode($aDadosMensalidade['id_matricula']);
				$aFechamento[$k]['limite']	 			= utf8_encode($aDadosMensalidade['vl_limite']);
				$aFechamento[$k]['fone']	 			= utf8_encode($aDadosMensalidade['tx_fone']);
				$aFechamento[$k]['celular']	 			= utf8_encode($aDadosMensalidade['tx_celular']);
				$aFechamento[$k]['email']	 			= utf8_encode($aDadosMensalidade['tx_email']);
				$aFechamento[$k]['datacompra'] 			= utf8_encode('N/A');
				$aFechamento[$k]['dataparcela'] 		= utf8_encode('N/A');
				$aFechamento[$k]['conveniada'] 			= utf8_encode('Mensalidade');
				$aFechamento[$k]['associacao'] 			= utf8_encode($aDadosMensalidade['cd_siglaassociacao']);
				$aFechamento[$k]['codigoliberacao'] 	= utf8_encode($aDadosMensalidade['cd_liberacao']);
				$aFechamento[$k]['valorparcela'] 		= utf8_encode(number_format($aDadosMensalidade['valorparcela'], 2, ',', '.'));
				$aFechamento[$k]['valorparcelacalculo'] = $aDadosMensalidade['valorparcela'];
				$aFechamento[$k]['numeroparcela'] 		= 1;
				$k++;
			}
		}
		return $aFechamento;
	}
	
	function reportFechamentoConveniadas($iAssociacao, $sDiaCorte, $sMesComp, $sAno, $sLojasProprias, $sBloqueados, $sRescindidos) {
		$sDiaIni = $sDiaCorte + 1;
		$sMesIni = $sMesComp - 1;
		if ($sMesIni < 1 ) {
			$sMesIni = 12 + $sMesIni;
			$sAnoIni = $sAno - 1;
		} else {
			$sAnoIni = $sAno;
		}
		$sDataIni = $sMesIni.'/'.$sDiaIni.'/'.$sAnoIni;
		$sDataFim = $sMesComp.'/'.$sDiaCorte.'/'.$sAno;
		if ($sLojasProprias == 'sim') {
			$sWhere = "AND ((IsNull(TB_Conveniadas.Loja_Assoc, Cast('0' as bit)) = Cast('1' as Bit)) OR IsNull(TB_Conveniadas.Loja_Assoc, Cast('0' as bit)) = Cast('0' as Bit))";
		} else {
			$sWhere = " AND IsNull(TB_Conveniadas.Loja_Assoc, Cast('0' as bit)) = Cast('0' as Bit)";
		}
		
		if ($sBloqueados == 'sim') {
			$sWhere .= "AND ((IsNull(TB_Clientes.Bloq, Cast('0' as bit)) = Cast('1' as Bit)) OR IsNull(TB_Clientes.Bloq, Cast('0' as bit)) = Cast('0' as Bit))";
		} else {
			$sWhere .= "AND IsNull(TB_Clientes.Bloq, Cast('0' as bit)) = Cast('0' as Bit)";
		}
		
		if ($sRescindidos == 'sim') { 
			$sWhere .= "AND ((IsNull(TB_Clientes.Rescisao, Cast('0' as bit)) = Cast('1' as Bit)) OR IsNull(TB_Clientes.Rescisao, Cast('0' as bit)) = Cast('0' as Bit))";
		} else {
			$sWhere .= " AND IsNull(TB_Clientes.Rescisao, Cast('0' as bit)) = Cast('0' as Bit)";
		}
		 		
		$oParcelas 		= $this->getParcelas('AND (TB_Parcelas.PK_NroParc > 0)', $sDataIni, $sDataFim, $iAssociacao, $sWhere);
		setlocale(LC_MONETARY,"pt_BR", "ptb");
		
		$i=0;
		foreach ($oParcelas as $iKeyParcelas => $aDadosParcelas){
			$aFechamentoConveniadas[$aDadosParcelas->id_conveniada][$i] = $aDadosParcelas;
			$i++;
		}
		
		
		/*echo '<pre>';
			print_r($aFechamentoConveniadas);
		echo '</pre>';
		die();*/
		
		return $aFechamentoConveniadas;
	}
	
}
?>