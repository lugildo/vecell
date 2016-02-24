<?php

class Crud {
	var $sHost = "127.0.0.1";
	var $sPort = "3306";
	var $sUser = "root";
	var $sPass = "3378854";
	var $sBase = "espacopier";
	var $oCon;
		
	function __construct() {
        $this->connect();		
	}
	
	// No contrutor da classe faremos a conexão ao banco de dados
	function connect() {
		$this->oCon = new PDO("mysql:host=$this->sHost; dbname=$this->sBase", $this->sUser, $this->sPass, array(PDO::SQLSRV_ENCODING_UTF8));
	}
	//PDO::SQLSRV_ENCODING_UTF8
	// Função para listar centro de custo
	function getCentroCusto() {
		try {
			$oResult = $this->oCon->query(" SELECT * 
											  FROM centrodecusto 
										     ORDER BY nm_ccusto"); 

			if($oResult)
				{
					//percorre os resultados via o fetch()
					$oCentroCusto = $oResult->fetchAll(PDO::FETCH_OBJ);
				}

		} catch(PDOException $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}
		
		return $oCentroCusto;
	}
	
	// Função para atualizar centro de custo
	function updateCentroCusto($aUpdateCentroCusto) {
		try {
			$oUpdateCentroCusto = $this->oCon->prepare(" UPDATE centrodecusto 
													        SET cd_ccusto = :cd_ccusto,
														        nm_ccusto = :nm_ccusto,
														        cd_status = :cd_status
							  						      WHERE id_ccusto = :id_ccusto "); 
			$oUpdateCentroCusto->bindParam(":cd_ccusto", $aUpdateCentroCusto['cd_ccusto'] , PDO::PARAM_STR);
			$oUpdateCentroCusto->bindParam(":nm_ccusto", $aUpdateCentroCusto['nm_ccusto'] , PDO::PARAM_STR);
			$oUpdateCentroCusto->bindParam(":cd_status", $aUpdateCentroCusto['cd_status'] , PDO::PARAM_STR);
			$oUpdateCentroCusto->bindParam(":id_ccusto", $aUpdateCentroCusto['id_ccusto'] , PDO::PARAM_INT);
			$oUpdateCentroCusto->execute();
		} catch(PDOException $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}

		return true;
	}
	
	// Função para inserir centro de custo
	function insertCentroCusto($aInsertCentroCusto) {
		try {
			$oInsertCentroCusto = $this->oCon->prepare(" INSERT INTO centrodecusto 
													                 (cd_ccusto, nm_ccusto, cd_status)
															  VALUES (:cd_ccusto, :nm_ccusto, :cd_status) "); 
			$oInsertCentroCusto->bindParam(":cd_ccusto", $aInsertCentroCusto['cd_ccusto'] , PDO::PARAM_STR);
			$oInsertCentroCusto->bindParam(":nm_ccusto", $aInsertCentroCusto['nm_ccusto'] , PDO::PARAM_STR);
			$oInsertCentroCusto->bindParam(":cd_status", $aInsertCentroCusto['cd_status'] , PDO::PARAM_STR);
			//$oInsertCentroCusto->bindParam(":id_ccusto", $aInsertCentroCusto['id_ccusto'] , PDO::PARAM_INT);
			$oInsertCentroCusto->execute();
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
	
	// Função para listar pessoas
	function getPessoas($sCdTipo) {
		try {
			$oPessoas = $this->oCon->prepare(" SELECT * 
												     FROM pessoas 
													WHERE cd_tipo IN (:cd_tipo) " ); 

			$oPessoas->bindParam(":cd_tipo", $sCdTipo, PDO::PARAM_STR);
			$oPessoas->execute();

		} catch(PDOException $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}

		return $oPessoas;
	}
	
	
	// Função para atualizar pessoas
	function updatePessoas($aUpdatePessoas) {
		try {
			$oUpdatePessoas = $this->oCon->prepare(" UPDATE pessoas 
													        SET nm_pessoa   = :nm_pessoa,
														        tx_fone     = :tx_fone,
														        tx_celular  = :tx_celular,
														        tx_email    = :tx_email,
														        tx_endereco = :tx_endereco,
														        cd_status   = :cd_status,
														        tx_funcao   = :tx_funcao,
														        tx_banco    = :tx_banco,
														        cd_tipo     = :cd_tipo
							  						      WHERE id_ccusto   = :id_pessoa
														    AND cd_tipo     = :cd_tipo "); 
			$oUpdatePessoas->bindParam(":nm_pessoa",   $aUpdatePessoas['nm_pessoa'], PDO::PARAM_STR);
			$oUpdatePessoas->bindParam(":tx_fone",     $aUpdatePessoas['tx_fone'], PDO::PARAM_STR);
			$oUpdatePessoas->bindParam(":tx_celular",  $aUpdatePessoas['tx_celular'], PDO::PARAM_STR);
			$oUpdatePessoas->bindParam(":tx_email",    $aUpdatePessoas['tx_email'], PDO::PARAM_STR);
			$oUpdatePessoas->bindParam(":tx_endereco", $aUpdatePessoas['tx_endereco'], PDO::PARAM_STR);
			$oUpdatePessoas->bindParam(":cd_status",   $aUpdatePessoas['cd_status'], PDO::PARAM_STR);
			$oUpdatePessoas->bindParam(":tx_funcao",   $aUpdatePessoas['tx_funcao'], PDO::PARAM_STR);
			$oUpdatePessoas->bindParam(":tx_banco",    $aUpdatePessoas['tx_banco'], PDO::PARAM_STR);
			$oUpdatePessoas->bindParam(":cd_tipo",     $aUpdatePessoas['cd_tipo'], PDO::PARAM_STR);
			$oUpdatePessoas->bindParam(":id_pessoa",   $aUpdatePessoas['id_pessoa'], PDO::PARAM_INT);
			$oUpdatePessoas->execute();
		} catch(PDOException $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}

		return true;
	}
	
	// Função para inserir pessoas
	function insertPessoas($aInsertPessoas) {
		try {
			$oInsertPessoas = $this->oCon->prepare(" INSERT INTO pessoas 
													                 (  nm_pessoa, tx_fone,  tx_celular,  tx_email,  tx_endereco,  cd_status,   tx_funcao,  tx_banco,  cd_tipo)
															  VALUES (:nm_pessoa, :tx_fone, :tx_celular, :tx_email, :tx_endereco, :cd_status, :tx_funcao, :tx_banco, :cd_tipo) "); 
			$oInsertPessoas->bindParam(":nm_pessoa",   $aInsertPessoas['nm_pessoa'], PDO::PARAM_STR);
			$oInsertPessoas->bindParam(":tx_fone",     $aInsertPessoas['tx_fone'], PDO::PARAM_STR);
			$oInsertPessoas->bindParam(":tx_celular",  $aInsertPessoas['tx_celular'], PDO::PARAM_STR);
			$oInsertPessoas->bindParam(":tx_email",    $aInsertPessoas['tx_email'], PDO::PARAM_STR);
			$oInsertPessoas->bindParam(":tx_endereco", $aInsertPessoas['tx_endereco'], PDO::PARAM_STR);
			$oInsertPessoas->bindParam(":cd_status",   $aInsertPessoas['cd_status'], PDO::PARAM_STR);
			$oInsertPessoas->bindParam(":tx_funcao",   $aInsertPessoas['tx_funcao'], PDO::PARAM_STR);
			$oInsertPessoas->bindParam(":tx_banco",    $aInsertPessoas['tx_banco'], PDO::PARAM_STR);
			$oInsertPessoas->bindParam(":cd_tipo",     $aInsertPessoas['cd_tipo'], PDO::PARAM_STR);
			$oInsertPessoas->execute();
		} catch(PDOException $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}

		return true; 
	}
	
	// Função para excluir pessoas
	function deletePessoas($iIdPessoa) {
		try {
			$oDeletePessoas = $this->oCon->prepare(" DELETE FROM pessoas 
							  						      WHERE id_pessoa = :id_pessoa "); 
			$oDeletePessoas->bindParam(":id_pessoa", $iIdPessoa, PDO::PARAM_INT);
			$oDeletePessoas->execute();
		} catch(PDOException $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}

		return true;
	}
	
	
	
	
}


?>