<?php

class Crud {
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
	
	// Função para listar associaçoes
	function getAssociacoes() {
		try {
			$oResult = $this->oCon->query(" SELECT 	PK_Codigo, Sigla, Nome, CNPJ, Endereco, Bairro, CEP, Cidade, FK_UF, Site, Email, Fone, Fax, Celular, Ag, Cta, Nome_Presid, RG_Presid, CPF_Presid, Nome_Vice, RG_Vice, CPF_Vice, Nome_Tes, RG_Tes, CPF_Tes, Nome_Contato, Fone_Contato, Contato_Adm, Fone_Adm, Contato_Fin, Fone_Fin, Link_Rede, VetorSecretarias,
													IsNull(Invisivel_Btn_Ass, Cast('0' as Bit)) As Oculto
											  FROM 	TB_Associacoes "); 

/*											SELECT 	PK_Codigo, 
									 				Nome, 
													Sigla,
													CNPJ,
													IsNull(Invisivel_Btn_Ass, Cast('0' as Bit)) As Oculto
											  FROM 	TB_Associacoes */
											  
			if($oResult)
				{
					//percorre os resultados via o fetch()
					$oAssociacoes = $oResult->fetchAll(PDO::FETCH_OBJ);
				}

		} catch(PDOException $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}

		return $oAssociacoes;
	}
	
	// Função para atualizar associações
	function updateAssociacoes($aUpdateAssociacoes) {
		try {
			$oUpdateAssociacoes = $this->oCon->prepare(" UPDATE TB_Associacoes 
															SET Nome        		= :Nome, 
																CNPJ        		= :CNPJ, 
																Site        		= :Site, 
																Email       		= :Email, 
																Endereco    		= :Endereco, 
																Bairro      		= :Bairro, 
																Cidade      		= :Cidade, 
																Cep         		= :Cep, 
																FK_UF       		= :FK_UF, 
																Fone        		= :Fone, 
																Fax         		= :Fax, 
																Celular     		= :Celular, 
																Bco         		= :Bco, 
																Ag          		= :Ag, 
																Cta         		= :Cta, 
																Nome_Presid 		= :Nome_Presid, 
																CPF_Presid  		= :CPF_Presid, 
																RG_Presid   		= :RG_Presid, 
																Nome_Vice   		= :Nome_Vice, 
																CPF_Vice    		= :CPF_Vice, 
																RG_Vice     		= :RG_Vice, 
																Nome_Tes			= :Nome_Tes, 
																CPF_Tes				= :CPF_Tes, 
																RG_Tes				= :RG_Tes, 
																Alt					= Cast ('0' as Bit), 
																Sigla				= :Sigla, 
																Bloq				= Cast (:Bloq as Bit), 
																Motivo				= :Motivo, 
																TUC					= Cast(:TUC as Money), 
																Dia_Corte			= :Dia_Corte, 
																Dia_Pagto			= :Dia_Pagto, 
																Link_Rede			= :Link_Rede, 
																Desconto			= Cast(:Desconto as Bit), 
																Nome_Contato		= :Nome_Contato, 
																Fone_Contato    	= :Fone_Contato, 
																Feira				= Cast(:Feira as Bit), 
																Dia_Envio			= :Dia_Envio, 
																Endereco_Envio		= :Endereco_Envio, 
																Dia_relatorio		= :Dia_relatorio, 
																Dia_Repasse			= :Dia_Repasse, 
																Contato_Adm			= :Contato_Adm, 
																Contato_Fin			= :Contato_Fin, 
																Fone_Adm			= :Fone_Adm, 
																Fone_Fin			= :Fone_Fin, 
																Fone_Feira			= :Fone_Feira, 
																Mensalidade			= Cast(:Mensalidade as Money),
																Dt_Cadastro			= :Dt_Cadastro, 
																Bloq_Assoc			= Cast (:Bloq_Assoc as Bit),
																FK_Consultor		= :FK_Consultor,
																Automotivo			= Cast(:Automotivo as Bit), 
																MaxParc				= :MaxParc, 
																Invisivel_Btn_Ass	= Cast(:Invisivel_Btn_Ass as Bit),
																Bloq_Limite			= Cast(:Bloq_Limite as Bit), 
																NPLCP				= :NPLCP, 
																VetorSecretarias	= :VetorSecretarias, 
																Nro_Contrato		= :Nro_Contrato, 
																Data_Contrato		= :Data_Contrato, 
																Adm					= :Adm, 
																Bonus				= :Bonus, 
																Consultor			= :Consultor, 
																Desc_Folha			= Cast(:Desc_Folha as bit)
														   FROM TB_Associacoes 
														  WHERE ( PK_Codigo = :PK_Codigo) "); 
			$oUpdateAssociacoes->bindParam(":Nome", $aUpdateAssociacoes['Nome'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":CNPJ", $aUpdateAssociacoes['CNPJ'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Site", $aUpdateAssociacoes['Site'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Email", $aUpdateAssociacoes['Email'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Endereco", $aUpdateAssociacoes['Endereco'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Bairro", $aUpdateAssociacoes['Bairro'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Cidade", $aUpdateAssociacoes['Cidade'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Cep", $aUpdateAssociacoes['Cep'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":FK_UF", $aUpdateAssociacoes['FK_UF'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Fone", $aUpdateAssociacoes['Fone'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Fax", $aUpdateAssociacoes['Fax'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Celular", $aUpdateAssociacoes['Celular'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Bco", $aUpdateAssociacoes['Bco'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Ag", $aUpdateAssociacoes['Ag'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Cta", $aUpdateAssociacoes['Cta'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Nome_Presid", $aUpdateAssociacoes['Nome_Presid'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":CPF_Presid", $aUpdateAssociacoes['CPF_Presid'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":RG_Presid", $aUpdateAssociacoes['RG_Presid'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Nome_Vice", $aUpdateAssociacoes['Nome_Vice'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":CPF_Vice", $aUpdateAssociacoes['CPF_Vice'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":RG_Vice", $aUpdateAssociacoes['RG_Vice'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Nome_Tes", $aUpdateAssociacoes['Nome_Tes'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":CPF_Tes", $aUpdateAssociacoes['CPF_Tes'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":RG_Tes", $aUpdateAssociacoes['RG_Tes'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Sigla", $aUpdateAssociacoes['Sigla'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Bloq", $aUpdateAssociacoes['Bloq'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Motivo", $aUpdateAssociacoes['Motivo'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":TUC", $aUpdateAssociacoes['TUC'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Dia_Corte", $aUpdateAssociacoes['Dia_Corte'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Dia_Pagto", $aUpdateAssociacoes['Dia_Pagto'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Link_Rede", $aUpdateAssociacoes['Link_Rede'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Desconto", $aUpdateAssociacoes['Desconto'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Nome_Contato", $aUpdateAssociacoes['Nome_Contato'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Fone_Contato", $aUpdateAssociacoes['Fone_Contato'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Feira", $aUpdateAssociacoes['Feira'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Dia_Envio", $aUpdateAssociacoes['Dia_Envio'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Endereco_Envio", $aUpdateAssociacoes['Endereco_Envio'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Dia_relatorio", $aUpdateAssociacoes['Dia_relatorio'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Dia_Repasse", $aUpdateAssociacoes['Dia_Repasse'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Contato_Adm", $aUpdateAssociacoes['Contato_Adm'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Contato_Fin", $aUpdateAssociacoes['Contato_Fin'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Fone_Adm", $aUpdateAssociacoes['Fone_Adm'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Fone_Fin", $aUpdateAssociacoes['Fone_Fin'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Fone_Feira", $aUpdateAssociacoes['Fone_Feira'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Mensalidade", $aUpdateAssociacoes['Mensalidade'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Dt_Cadastro", $aUpdateAssociacoes['Dt_Cadastro'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Bloq_Assoc", $aUpdateAssociacoes['Bloq_Assoc'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":FK_Consultor", $aUpdateAssociacoes['FK_Consultor'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Automotivo", $aUpdateAssociacoes['Automotivo'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":MaxParc", $aUpdateAssociacoes['MaxParc'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Invisivel_Btn_Ass", $aUpdateAssociacoes['Invisivel_Btn_Ass'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Bloq_Limite", $aUpdateAssociacoes['Bloq_Limite'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":NPLCP", $aUpdateAssociacoes['NPLCP'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":VetorSecretarias", $aUpdateAssociacoes['VetorSecretarias'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Nro_Contrato", $aUpdateAssociacoes['Nro_Contrato'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Data_Contrato", $aUpdateAssociacoes['Data_Contrato'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Adm", $aUpdateAssociacoes['Adm'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Bonus", $aUpdateAssociacoes['Bonus'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Consultor", $aUpdateAssociacoes['Consultor'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":Desc_Folha", $aUpdateAssociacoes['Desc_Folha'] , PDO::PARAM_STR);
			$oUpdateAssociacoes->bindParam(":PK_Codigo", $aUpdateAssociacoes['PK_Codigo'] , PDO::PARAM_INT);
			$oUpdateAssociacoes->execute();
		} catch(PDOException $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}

		return true;
	}
	
	
	// Função para listar associaçoes
	function getAssociados() {
		try {
			$oResult = $this->oCon->query(" SELECT 	PK_Matricula, FK_Assoc, 
			                                        Nome, Lim_Credito, Bloq, Motivo,
			                                        Endereco, Bairro, CEP, Cidade, FK_UF,
													Fone, Celular, Email, Email2, OptInNews, 
													Cargo, Secretaria, 
													RG, CPF, Bco, Ag, Cta,
													Rescisao, Dt_Rescisao, 
													Dt_Cadastro, Dt_Nasc,
													Dt_Mensalidade, Mensalidade, 
													Dt_Mensal_Cartao, Mensal_Cartao, 
													Dt_Seguro, Seguro, Nome_Seguro, 
													Dt_Assist_Jurid, Assist_Juridica, Nome_Ass_Jur, 
													Dt_Colombo_Virt, Colombo_Virtual,
													Dt_Extrato, Extrato,
													Dt_Plano_Sta_Casa, Plano_Santa_Casa,
													Dt_Angelus, Angelus,
													Dt_Clube_Desc, Clube_Descontos
											  FROM 	TB_Clientes 
											  WHERE FK_Assoc NOT IN (10)"); 

											  
			if($oResult)
				{
					//percorre os resultados via o fetch()
					$oAssociados = $oResult->fetchAll(PDO::FETCH_OBJ);
				}

		} catch(PDOException $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}

		return $oAssociados;
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
}


?>