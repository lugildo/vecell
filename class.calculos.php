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
}
?>