<?php

class CrudFinan {
	var $sHost = "104.236.0.195";
	var $sUser = "root";
	var $sPass = "htmnet11281253";
	var $sBase = "vecell";
	var $oCon;
		
	function __construct() {
        $this->connect();		
	}
	
	// No contrutor da classe faremos a conexão ao banco de dados
	function connect() {
		try { 
			$this->oCon = new PDO("mysql:host=$this->sHost; dbname=$this->sBase", $this->sUser, $this->sPass); 
		} 
		catch(PDOException $ex){ 
			die("Failed to connect to the database: " . $ex->getMessage());
		} 
		$this->oCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		$this->oCon->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
	}
	
	// Função para listar contas a pagar
	function getCtaPagar() {
		try {
			$oResult = $this->oCon->query(" SELECT 	*
											FROM 	cta_pagar 
											ORDER BY dt_vencimento ASC" ); 
										  
			if($oResult)
				{
					//percorre os resultados via o fetch()
					$oCtaPagar = $oResult->fetchAll(PDO::FETCH_OBJ);
				}

		} catch(PDOException $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}

		return $oCtaPagar;
	}
	
	// Função para atualizar contas a pagar
	function updateCtaPagar($aUpdateCtaPagar) {
		try {
			$oUpdateCtaPagar = $this->oCon->prepare(" UPDATE cta_pagar 
														 SET nm_favorecido  	= :nm_favorecido, 
															 dt_vencimento  	= :dt_vencimento, 
															 vl_pagar  			= :vl_pagar, 
															 dt_pago  			= :dt_pago, 
															 cd_status 			= :cd_status, 
															 nm_ccusto 			= :nm_ccusto, 
															 nm_classificacao	= :nm_classificacao, 
															 tx_obs 			= :tx_obs, 
															 nm_formapgto 		= :nm_formapgto, 
															 vl_pago	 		= :vl_pago
													   WHERE ( idcta_pagar  	= :idcta_pagar) "); 
			$oUpdateCtaPagar->bindParam(":nm_favorecido", 		$aUpdateCtaPagar['nm_favorecido'], 		PDO::PARAM_STR);
			$oUpdateCtaPagar->bindParam(":dt_vencimento", 		$aUpdateCtaPagar['dt_vencimento'], 		PDO::PARAM_STR);
			$oUpdateCtaPagar->bindParam(":vl_pagar", 	 		$aUpdateCtaPagar['vl_pagar'], 	 		PDO::PARAM_STR);
			$oUpdateCtaPagar->bindParam(":dt_pago", 	 		$aUpdateCtaPagar['dt_pago'], 	 		PDO::PARAM_STR);
			$oUpdateCtaPagar->bindParam(":cd_status", 	 	 	$aUpdateCtaPagar['cd_status'], 			PDO::PARAM_STR);
			$oUpdateCtaPagar->bindParam(":nm_ccusto", 	 	 	$aUpdateCtaPagar['nm_ccusto'], 			PDO::PARAM_STR);
			$oUpdateCtaPagar->bindParam(":nm_classificacao",	$aUpdateCtaPagar['nm_classificacao'], 	PDO::PARAM_STR);
			$oUpdateCtaPagar->bindParam(":tx_obs", 	 			$aUpdateCtaPagar['tx_obs'], 	 		PDO::PARAM_STR);
			$oUpdateCtaPagar->bindParam(":nm_formapgto", 		$aUpdateCtaPagar['nm_formapgto'], 	 	PDO::PARAM_STR);
			$oUpdateCtaPagar->bindParam(":vl_pago", 			$aUpdateCtaPagar['vl_pago'], 	 		PDO::PARAM_STR);
			$oUpdateCtaPagar->bindParam(":idcta_pagar",   		$aUpdateCtaPagar['idcta_pagar'],	   	PDO::PARAM_INT);
			$oUpdateCtaPagar->execute();
		} catch(PDOException $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}

		return true;
	}
	
	// Função 
	function insertCtaPagar($aInsertCtaPagar) {
		try {
			$oInsertCtaPagar = $this->oCon->prepare(" INSERT INTO cta_pagar 
													                 (nm_favorecido, dt_vencimento, vl_pagar, dt_pago, cd_status, nm_ccusto, nm_classificacao, tx_obs, nm_formapgto, vl_pago)
															  VALUES (:nm_favorecido, :dt_vencimento, :vl_pagar, :dt_pago, :cd_status, :nm_ccusto, :nm_classificacao, :tx_obs, :nm_formapgto, :vl_pago) "); 
			$oUpdateCtaPagar->bindParam(":nm_favorecido", 		$aUpdateCtaPagar['nm_favorecido'], 		PDO::PARAM_STR);
			$oUpdateCtaPagar->bindParam(":dt_vencimento", 		$aUpdateCtaPagar['dt_vencimento'], 		PDO::PARAM_STR);
			$oUpdateCtaPagar->bindParam(":vl_pagar", 	 		$aUpdateCtaPagar['vl_pagar'], 	 		PDO::PARAM_STR);
			$oUpdateCtaPagar->bindParam(":dt_pago", 	 		$aUpdateCtaPagar['dt_pago'], 	 		PDO::PARAM_STR);
			$oUpdateCtaPagar->bindParam(":cd_status", 	 	 	$aUpdateCtaPagar['cd_status'], 			PDO::PARAM_STR);
			$oUpdateCtaPagar->bindParam(":nm_ccusto", 	 	 	$aUpdateCtaPagar['nm_ccusto'], 			PDO::PARAM_STR);
			$oUpdateCtaPagar->bindParam(":nm_classificacao",	$aUpdateCtaPagar['nm_classificacao'], 	PDO::PARAM_STR);
			$oUpdateCtaPagar->bindParam(":tx_obs", 	 			$aUpdateCtaPagar['tx_obs'], 	 		PDO::PARAM_STR);
			$oUpdateCtaPagar->bindParam(":nm_formapgto", 		$aUpdateCtaPagar['nm_formapgto'], 	 	PDO::PARAM_STR);
			$oUpdateCtaPagar->bindParam(":vl_pago", 			$aUpdateCtaPagar['vl_pago'], 	 		PDO::PARAM_STR);
			$oInsertCtaPagar->execute();
		} catch(PDOException $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}

		return true; 
	}
	
	// Função para excluir centro de custo
	function deleteCentroCusto($iIdCentroCusto) {
		try {
			$oDeleteCentroCusto = $this->oCon->prepare(" DELETE FROM centrodecusto 
							  						      WHERE id_ccusto = :id_ccusto "); 
			$oDeleteCentroCusto->bindParam(":id_ccusto", $iIdCentroCusto, PDO::PARAM_INT);
			$oDeleteCentroCusto->execute();
		} catch(PDOException $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}

		return true;
	}
}


?>