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
			$oResult = $this->oCon->query(" SELECT 	PK_Codigo, Sigla, Nome, 
													CNPJ, Bco, Ag, Cta, 
													Endereco, Bairro, CEP, Cidade, FK_UF, 
													Site, Email, Fone, Fax, Celular, 
													IsNull(Bloq, Cast('0' as Bit)) As Bloq, Motivo, 
													IsNull(Bloq_Assoc, Cast('0' as Bit)) As Bloq_Assoc, 
													IsNull(Bloq_Limite, Cast('0' as Bit)) As Bloq_Limite, 
													Dia_Corte, Dia_relatorio, Dia_Pagto, Dia_Repasse, 
													Dia_Envio, Endereco_Envio, 
													Nome_Presid, RG_Presid, CPF_Presid, 
													Nome_Vice, RG_Vice, CPF_Vice, 
													Nome_Tes, RG_Tes, CPF_Tes, 
													Nome_Contato, Fone_Contato, 
													Contato_Adm, Fone_Adm, 
													Contato_Fin, Fone_Fin, 
													IsNull(Feira, Cast('0' as Bit)) As Feira, Fone_Feira, 
													Link_Rede, VetorSecretarias,
													Adm, Bonus, 
													FK_Consultor, Consultor,
													Mensalidade, TUC,
													MaxParc, NPLCP,
													Nro_Contrato, Data_Contrato, Dt_Cadastro, 
													IsNull(Desc_Folha, Cast('0' as Bit)) As Desc_Folha, 
													IsNull(Automotivo, Cast('0' as Bit)) As Automotivo,
													IsNull(Desconto, Cast('0' as Bit)) As Desconto, 
													IsNull(OptInNews, Cast('0' as Bit)) As OptInNews, 
													IsNull(Invisivel_Btn_Ass, Cast('0' as Bit)) As Invisivel_Btn_Ass
											FROM 	TB_Associacoes 
											ORDER BY Sigla ASC" ); 
										  
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
	function getAssociados($iFK_Assoc) {
		try {
			$oResult = $this->oCon->query(" SELECT 	TOP 10 
													PK_Matricula, FK_Assoc, 
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
											  WHERE FK_Assoc = $iFK_Assoc"); 


											  
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


	// Função para atualizar associações
	function updateAssociados($aUpdateAssociados) {
		try {
			$oUpdateAssociados = $this->oCon->prepare(" UPDATE TB_Clientes 
															SET PK_Matricula		= :PK_Matricula, 
																FK_Assoc			= :FK_Assoc,
																Nome				= :Nome, 
																Lim_Credito			= Cast(:Lim_Credito as Money), 
																Bloq				= Cast(:Bloq as bit), 
																OptInNews			= Cast(:OptInNews as bit), 
																Email				= :Email, 
																Endereco			= :Endereco, 
																Fone				= :Fone,
																Celular				= :Celular, 
																CPF					= :CPF, 
																Bairro				= :Bairro,
																Cep					= :Cep, 
																Cidade				= :Cidade, 
																FK_UF				= :FK_UF, 
																RG					= :RG,
																Bco					= :Bco, 
																Ag					= :Ag, 
																Cta					= :Cta, 
																Motivo				= :Motivo,
																Seguro				= Cast(:Seguro as Money), 
																Mensalidade			= Cast(:Mensalidade as Money),
																Dt_Cadastro			= Cast(:Dt_Cadastro as Datetime), 
																Dt_Nasc				= Cast(:Dt_Nasc as Datetime), 
																Plano_Santa_Casa	= Cast(:Plano_Santa_Casa as Money), 
																Angelus				= Cast(:Angelus as Money), 
																Assist_Juridica		= Cast(:Assist_Juridica as Money), 
																Extrato				= Cast(:Extrato as Money), 
																Colombo_Virtual		= Cast(:Colombo_Virtual as Money), 
																Clube_Descontos		= Cast(:Clube_Descontos as Money), 
																Mensal_Cartao		= Cast(:Mensal_Cartao as Money), 
																Nome_Seguro			= :Nome_Seguro, 
																Nome_Ass_Jur		= :Nome_Ass_Jur,
																Dt_Mensalidade		= Cast(:Dt_Mensalidade as Datetime), 
																Dt_Mensal_Cartao	= Cast(:Dt_Mensal_Cartao as Datetime), 
																Dt_Seguro			= Cast(:Dt_Seguro as Datetime), 
																Dt_Assist_Jurid		= Cast(:Dt_Assist_Jurid as Datetime), 
																Dt_Colombo_Virt		= Cast(:Dt_Colombo_Virt as Datetime), 
																Dt_Extrato			= Cast(:Dt_Extrato as Datetime), 
																Dt_Plano_Sta_Casa	= Cast(:Dt_Plano_Sta_Casa as Datetime), 
																Dt_Angelus			= Cast(:Dt_Angelus as Datetime), 
																Dt_Clube_Desc		= Cast(:Dt_Clube_Desc as Datetime), 
																Email2				= :Email2, 
																Cargo				= :Cargo, 
																Secretaria			= :Secretaria 
													From TB_Clientes Where (PK_Matricula=".cod_mat.") And (FK_Assoc=".p_codigo.");"); 
			$oUpdateAssociados->bindParam(":Nome", $aUpdateAssociados['Nome'] , PDO::PARAM_STR);
			$oUpdateAssociados->bindParam(":PK_Matricula", $aUpdateAssociados['PK_Matricula'] , PDO::PARAM_INT);
			$oUpdateAssociados->bindParam(":FK_Assoc", $aUpdateAssociados['FK_Assoc'] , PDO::PARAM_INT);
			$oUpdateAssociados->bindParam(":Lim_Credito", $aUpdateAssociados['Lim_Credito'] , PDO::PARAM_STR);
			$oUpdateAssociados->bindParam(":Bloq", $aUpdateAssociados['Bloq'] , PDO::PARAM_STR);
			$oUpdateAssociados->bindParam(":RG", $aUpdateAssociados['RG'] , PDO::PARAM_STR);
			$oUpdateAssociados->bindParam(":Email", $aUpdateAssociados['Email'] , PDO::PARAM_STR);
			$oUpdateAssociados->bindParam(":Endereco", $aUpdateAssociados['Endereco'] , PDO::PARAM_STR);
			$oUpdateAssociados->bindParam(":Fone", $aUpdateAssociados['Fone'] , PDO::PARAM_INT);
			$oUpdateAssociados->bindParam(":Celular", $aUpdateAssociados['Celular'] , PDO::PARAM_INT);
			$oUpdateAssociados->bindParam(":CPF", $aUpdateAssociados['CPF'] , PDO::PARAM_INT);
			$oUpdateAssociados->bindParam(":Bairro", $aUpdateAssociados['Bairro'] , PDO::PARAM_STR);
			$oUpdateAssociados->bindParam(":Cep", $aUpdateAssociados['Cep'] , PDO::PARAM_INT);
			$oUpdateAssociados->bindParam(":Cidade", $aUpdateAssociados['Cidade'] , PDO::PARAM_STR);
			$oUpdateAssociados->bindParam(":FK_UF", $aUpdateAssociados['FK_UF'] , PDO::PARAM_STR);
			$oUpdateAssociados->bindParam(":Bco", $aUpdateAssociados['Bco'] , PDO::PARAM_INT);
			$oUpdateAssociados->bindParam(":Ag", $aUpdateAssociados['Ag'] , PDO::PARAM_STR);
			$oUpdateAssociados->bindParam(":Cta", $aUpdateAssociados['Cta'] , PDO::PARAM_STR);
			$oUpdateAssociados->bindParam(":Motivo", $aUpdateAssociados['Motivo'] , PDO::PARAM_STR);
			$oUpdateAssociados->bindParam(":OptInNews", $aUpdateAssociados['OptInNews'] , PDO::PARAM_STR);
			$oUpdateAssociados->bindParam(":Seguro", $aUpdateAssociados['Seguro'] , PDO::PARAM_STR);
			$oUpdateAssociados->bindParam(":Mensalidade", $aUpdateAssociados['Mensalidade'] , PDO::PARAM_STR);
			$oUpdateAssociados->bindParam(":Mensal_Cartao", $aUpdateAssociados['Mensal_Cartao'] , PDO::PARAM_STR);
			$oUpdateAssociados->bindParam(":Dt_Nasc", $aUpdateAssociados['Dt_Nasc'] , PDO::PARAM_STR);
			$oUpdateAssociados->bindParam(":Plano_Santa_Casa", $aUpdateAssociados['Plano_Santa_Casa'] , PDO::PARAM_STR);
			$oUpdateAssociados->bindParam(":Assist_Juridica", $aUpdateAssociados['Assist_Juridica'] , PDO::PARAM_STR);
			$oUpdateAssociados->bindParam(":Angelus", $aUpdateAssociados['Angelus'] , PDO::PARAM_STR);
			$oUpdateAssociados->bindParam(":Extrato", $aUpdateAssociados['Extrato'] , PDO::PARAM_STR);
			$oUpdateAssociados->bindParam(":Colombo_Virtual", $aUpdateAssociados['Colombo_Virtual'] , PDO::PARAM_STR);
			$oUpdateAssociados->bindParam(":Clube_Descontos", $aUpdateAssociados['Clube_Descontos'] , PDO::PARAM_STR);
			$oUpdateAssociados->bindParam(":Dt_Mensalidade", $aUpdateAssociados['Dt_Mensalidade'] , PDO::PARAM_STR);
			$oUpdateAssociados->bindParam(":Dt_Mensal_Cartao", $aUpdateAssociados['Dt_Mensal_Cartao'] , PDO::PARAM_STR);
			$oUpdateAssociados->bindParam(":Dt_Seguro", $aUpdateAssociados['Dt_Seguro'] , PDO::PARAM_STR);
			$oUpdateAssociados->bindParam(":Dt_Assist_Jurid", $aUpdateAssociados['Dt_Assist_Jurid'] , PDO::PARAM_STR);
 			$oUpdateAssociados->bindParam(":Dt_Colombo_Virt", $aUpdateAssociados['Dt_Colombo_Virt'] , PDO::PARAM_STR);
 			$oUpdateAssociados->bindParam(":Dt_Extrato", $aUpdateAssociados['Dt_Extrato'] , PDO::PARAM_STR);
 			$oUpdateAssociados->bindParam(":Dt_Plano_Sta_Casa", $aUpdateAssociados['Dt_Plano_Sta_Casa'] , PDO::PARAM_STR);
 			$oUpdateAssociados->bindParam(":Dt_Angelus", $aUpdateAssociados['Dt_Angelus'] , PDO::PARAM_STR);
 			$oUpdateAssociados->bindParam(":Dt_Clube_Desc", $aUpdateAssociados['Dt_Clube_Desc'] , PDO::PARAM_STR);
 			$oUpdateAssociados->bindParam(":Nome_Seguro", $aUpdateAssociados['Nome_Seguro'] , PDO::PARAM_STR);
 			$oUpdateAssociados->bindParam(":Nome_Ass_Jur", $aUpdateAssociados['Nome_Ass_Jur'] , PDO::PARAM_STR);
 			$oUpdateAssociados->bindParam(":Email2", $aUpdateAssociados['Email2'] , PDO::PARAM_STR);
 			$oUpdateAssociados->bindParam(":Cargo", $aUpdateAssociados['Cargo'] , PDO::PARAM_STR);
 			$oUpdateAssociados->bindParam(":Secretaria", $aUpdateAssociados['Secretaria'] , PDO::PARAM_STR);

			$oUpdateAssociados->execute();
		} catch(PDOException $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}

		return true;
	}
	
	
	
	
	// Função para listar associaçoes
	function getConveniadas() {
		try {
			$oResult = $this->oCon->query(" SELECT 	TOP 10 
													PK_Codigo, 
													Nome AS Nome, 
													IsNull(Logotipo, '') AS Logotipo
											FROM TB_Conveniadas 
											ORDER BY TB_Conveniadas.Nome ASC "); 

											  
			if($oResult)
				{
					//percorre os resultados via o fetch()
					$oConveniadas = $oResult->fetchAll(PDO::FETCH_OBJ);
				}

		} catch(PDOException $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}

		return $oConveniadas;
	}
	
	
	
	
	function updateConveniadas($aUpdateConveniadas) {
		try {
			$oUpdateConveniadas = $this->oCon->prepare(" UPDATE TB_Conveniadas 
															SET Razao					= :Razao, 
																Nome					= :Nome, 
																CNPJ					= :CNPJ, 
																Insc_Est				= :Insc_Est, 
																Email					= :Email, 
																Site					= :Site, 
																Bco						= :Bco, 
																Ag						= :Ag, 
																Cta						= :Cta, 
																Bco2					= :Bco2,
																Ag2						= :Ag2, 
																Cta2					= :Cta2, 
																Endereco				= :Endereco, 
																Bairro					= :Bairro, 
																Cep						= :Cep, 
																Cidade					= :Cidade, 
																FK_UF					= :FK_UF, 
																Fone					= :Fone, 
																Fax						= :Fax, 
																Celular					= :Celular, 
																FK_Segmento				= :FK_Segmento, 
																Condicoes				= :Condicoes, 
																Bloq					= Cast(:Bloq as bit), 
																Motivo					= :Motivo, 
																OptInNews				= Cast(:OptInNews as bit), 																Alt=Cast('0' as Bit), 
																FK_Grupo				= :FK_Grupo, 
																Contato					= :Contato, 
																Fone_Contato			= :Fone_Contato, 
																Dt_Cadastro				= Cast(:Dt_Cadastro as Datetime), 
																Tx_Adm_CDC				= Cast(:Tx_Adm_CDC as Numeric(4,3)), 
																Loja_Assoc				= Cast(:Loja_Assoc as bit), 
																Pessoa					= :Pessoa, 
																Nro_Contrato			= :Nro_Contrato, 
																Data_Contrato			= Cast(:Data_Contrato as Datetime), 
																Consultor				= :Consultor, 
																Valor_Contrato			= Cast(:Valor_Contrato as Money), 
																Anuidade_Contrato		= Cast(:Anuidade_Contrato as Money),
																Forma_Pgto				= :Forma_Pgto, 
																Data_Pgto1				= Cast(:Data_Pgto1 as Datetime), 
																Valor_Pgto1				= Cast(:Valor_Pgto1 as Money), 
																Situacao_Pg1			= :Situacao_Pg1, 
																Data_Pgto2				= Cast(:Data_Pgto2 as Datetime), 
																Valor_Pgto2				= Cast(:Valor_Pgto2 as Money), 
																Situacao_Pg2			= :Situacao_Pg2, 
																Data_Pgto3				= Cast(:Data_Pgto3 as Datetime), 
																Valor_Pgto3				= Cast(:Valor_Pgto3 as Money),
																Situacao_Pg3			= :Situacao_Pg3, 
																TEF						= :TEF, 
																TEF_Observacao			= :TEF_Observacao,
																POS_Modelo				= :POS_Modelo, 
																POS_Serial				= :POS_Serial, 
																POS_Data_Inst			= Cast(:POS_Data_Inst as Datetime), 
																TEF_Data_Inst			= Cast(:TEF_Data_Inst as Datetime), 
																POS_Valor				= Cast(:POS_Valor as Money), 
																POS_Mensal				= Cast(:POS_Mensal as Money), 
																POS_Condicao			= :POS_Condicao, 
																POS_Data_Mensal1		= Cast(:POS_Data_Mensal1 as Datetime), 
																Latitude				= :Latitude, 
																Longitude				= :Longitude
														FROM TB_Conveniadas 
														WHERE (PK_Codigo = :PK_Codigo) "); 
 			$oUpdateConveniadas->bindParam(":PK_Codigo", $aUpdateConveniadas['PK_Codigo'] , PDO::PARAM_INT);
 			$oUpdateConveniadas->bindParam(":Razao", $aUpdateConveniadas['Razao'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":Nome", $aUpdateConveniadas['Nome'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":CNPJ", $aUpdateConveniadas['CNPJ'] , PDO::PARAM_INT);
 			$oUpdateConveniadas->bindParam(":Insc_Est", $aUpdateConveniadas['Insc_Est'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":Email", $aUpdateConveniadas['Email'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":Site", $aUpdateConveniadas['Site'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":Bco", $aUpdateConveniadas['Bco'] , PDO::PARAM_INT);
 			$oUpdateConveniadas->bindParam(":Ag", $aUpdateConveniadas['Ag'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":Cta", $aUpdateConveniadas['Cta'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":Bco2", $aUpdateConveniadas['Bco2'] , PDO::PARAM_INT);
 			$oUpdateConveniadas->bindParam(":Ag2", $aUpdateConveniadas['Ag2'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":Cta2", $aUpdateConveniadas['Cta2'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":Endereco", $aUpdateConveniadas['Endereco'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":Bairro", $aUpdateConveniadas['Bairro'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":Cep", $aUpdateConveniadas['Cep'] , PDO::PARAM_INT);
 			$oUpdateConveniadas->bindParam(":Cidade", $aUpdateConveniadas['Cidade'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":FK_UF", $aUpdateConveniadas['FK_UF'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":Fone", $aUpdateConveniadas['Fone'] , PDO::PARAM_INT);
 			$oUpdateConveniadas->bindParam(":Fax", $aUpdateConveniadas['Fax'] , PDO::PARAM_INT);
 			$oUpdateConveniadas->bindParam(":Celular", $aUpdateConveniadas['Celular'] , PDO::PARAM_INT);
 			$oUpdateConveniadas->bindParam(":FK_Segmento", $aUpdateConveniadas['FK_Segmento'] , PDO::PARAM_INT);
 			$oUpdateConveniadas->bindParam(":Condicoes", $aUpdateConveniadas['Condicoes'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":Bloq", $aUpdateConveniadas['Bloq'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":Motivo", $aUpdateConveniadas['Motivo'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":OptInNews", $aUpdateConveniadas['OptInNews'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":FK_Grupo", $aUpdateConveniadas['FK_Grupo'] , PDO::PARAM_INT);
 			$oUpdateConveniadas->bindParam(":Contato", $aUpdateConveniadas['Contato'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":Fone_Contato", $aUpdateConveniadas['Fone_Contato'] , PDO::PARAM_INT);
 			$oUpdateConveniadas->bindParam(":Dt_Cadastro", $aUpdateConveniadas['Dt_Cadastro'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":Tx_Adm_CDC", $aUpdateConveniadas['Tx_Adm_CDC'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":Loja_Assoc", $aUpdateConveniadas['Loja_Assoc'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":Pessoa", $aUpdateConveniadas['Pessoa'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":Nro_Contrato", $aUpdateConveniadas['Nro_Contrato'] , PDO::PARAM_INT);
 			$oUpdateConveniadas->bindParam(":Data_Contrato", $aUpdateConveniadas['Data_Contrato'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":Consultor", $aUpdateConveniadas['Consultor'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":Valor_Contrato", $aUpdateConveniadas['Valor_Contrato'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":Anuidade_Contrato", $aUpdateConveniadas['Anuidade_Contrato'] , PDO::PARAM_STR);
			$oUpdateConveniadas->bindParam(":Forma_Pgto", $aUpdateConveniadas['Forma_Pgto'] , PDO::PARAM_INT);
 			$oUpdateConveniadas->bindParam(":Data_Pgto1", $aUpdateConveniadas['Data_Pgto1'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":Valor_Pgto1", $aUpdateConveniadas['Valor_Pgto1'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":Situacao_Pg1", $aUpdateConveniadas['Situacao_Pg1'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":Data_Pgto2", $aUpdateConveniadas['Data_Pgto2'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":Valor_Pgto2", $aUpdateConveniadas['Valor_Pgto2'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":Situacao_Pg2", $aUpdateConveniadas['Situacao_Pg2'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":Data_Pgto3", $aUpdateConveniadas['Data_Pgto3'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":Valor_Pgto3", $aUpdateConveniadas['Valor_Pgto3'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":Situacao_Pg3", $aUpdateConveniadas['Situacao_Pg3'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":TEF", $aUpdateConveniadas['TEF'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":TEF_Observacao", $aUpdateConveniadas['TEF_Observacao'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":POS_Modelo", $aUpdateConveniadas['POS_Modelo'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":POS_Serial", $aUpdateConveniadas['POS_Serial'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":POS_Data_Inst", $aUpdateConveniadas['POS_Data_Inst'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":TEF_Data_Inst", $aUpdateConveniadas['TEF_Data_Inst'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":POS_Valor", $aUpdateConveniadas['POS_Valor'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":POS_Mensal", $aUpdateConveniadas['POS_Mensal'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":POS_Condicao", $aUpdateConveniadas['POS_Condicao'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":POS_Data_Mensal1", $aUpdateConveniadas['POS_Data_Mensal1'] , PDO::PARAM_STR);
 			$oUpdateConveniadas->bindParam(":Latitude", $aUpdateConveniadas['Latitude'] , PDO::PARAM_STR);
			$oUpdateConveniadas->bindParam(":Longitude", $aUpdateConveniadas['Longitude'] , PDO::PARAM_STR);
			$oUpdateConveniadas->execute();
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
}


?>