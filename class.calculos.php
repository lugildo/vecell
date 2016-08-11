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
	
	// Função para listar regras
	function getRegras() {
		try {
			$oResult = $this->oCon->query(" SELECT *
											  FROM TB_Regras " ); 
										  
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
		
	// Função para listar incidencias
	function getIncidencias() {
		try {
			$oResult = $this->oCon->query(" SELECT *
											  FROM TB_Incidencias " ); 
										  
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
		
	// Função para listar Produtos
	function getProdutos() {
		try {
			$oResult = $this->oCon->query(" SELECT *
											  FROM TB_Produtos " ); 
										  
			if($oResult)
				{
					//percorre os resultados via o fetch()
					$oProdutos = $oResult->fetchAll(PDO::FETCH_OBJ);
				}

		} catch(PDOException $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}

		return $oProdutos;
	}
	
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
	function getParcelas($sWhereParc, $dDtCorteIni, $dDtCorteFim, $iFkAssociacao) {
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
													AND (TB_Conveniadas.Loja_Assoc = Cast('0' as bit))
													".$sWhereParc."
											 ORDER BY TB_Ordens_Compra.PK_CtOrdem ASC, TB_Parcelas.PK_NroParc ASC;
										" ); 
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
}
?>