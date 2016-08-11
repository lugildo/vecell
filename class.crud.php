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
			$oResult = $this->oCon->query(" SELECT 	z.PK_Codigo, z.Sigla, z.Nome, 
													z.CNPJ, z.Bco, z.Ag, z.Cta, 
													z.Endereco, z.Bairro, z.CEP, z.Cidade, z.FK_UF, 
													z.Site, z.Email, z.Fone, z.Fax, z.Celular, 
													IsNull(z.Bloq, Cast('0' as Bit)) As Bloq, Motivo, 
													IsNull(z.Bloq_Assoc, Cast('0' as Bit)) As Bloq_Assoc, 
													IsNull(z.Bloq_Limite, Cast('0' as Bit)) As Bloq_Limite, 
													z.Dia_Corte, z.Dia_relatorio, z.Dia_Pagto, z.Dia_Repasse, 
													z.Dia_Envio, z.Endereco_Envio, 
													z.Nome_Presid, z.RG_Presid, z.CPF_Presid, 
													z.Nome_Vice, z.RG_Vice, z.CPF_Vice, 
													z.Nome_Tes, z.RG_Tes, z.CPF_Tes, 
													z.Nome_Contato, z.Fone_Contato, 
													z.Contato_Adm, z.Fone_Adm, 
													z.Contato_Fin, z.Fone_Fin, 
													IsNull(z.Feira, Cast('0' as Bit)) As Feira, z.Fone_Feira, 
													z.Link_Rede, z.VetorSecretarias,
													z.Adm, z.Bonus, 
													z.FK_Consultor, z.Consultor,
													z.Mensalidade, z.TUC,
													z.MaxParc, z.NPLCP,
													z.Nro_Contrato, z.Data_Contrato, z.Dt_Cadastro, 
													IsNull(z.Desc_Folha, Cast('0' as Bit)) As Desc_Folha, 
													IsNull(z.Automotivo, Cast('0' as Bit)) As Automotivo,
													IsNull(z.Desconto, Cast('0' as Bit)) As Desconto, 
													IsNull(z.OptInNews, Cast('0' as Bit)) As OptInNews, 
													IsNull(z.Invisivel_Btn_Ass, Cast('0' as Bit)) As Invisivel_Btn_Ass,
													a.Nome as Banco,
													b.Nome as NomeConsultor, b.Email as EmailConsultor, b.FK_Usuario as UsuarioConsultor,
													c.Nome as Estado
											FROM 	TB_Associacoes As z
										 LEFT  JOIN TB_Bancos      As a ON (a.PK_Codigo = z.Bco)
										 LEFT  JOIN TB_Consultores As b ON (b.PK_Codigo = z.FK_Consultor)
										INNER  JOIN TB_Estados     As c ON (c.PK_Sigla  = z.FK_UF)
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
		
		$sSQL = " UPDATE TB_Associacoes 
															SET Nome        		= '".$aUpdateAssociacoes['Nome']."', 
																CNPJ        		= ".$aUpdateAssociacoes['CNPJ'].", 
																Site        		= '".$aUpdateAssociacoes['Site']."', 
																Email       		= '".$aUpdateAssociacoes['Email']."', 
																Endereco    		= '".$aUpdateAssociacoes['Endereco']."', 
																Bairro      		= '".$aUpdateAssociacoes['Bairro']."', 
																Cidade      		= '".$aUpdateAssociacoes['Cidade']."', 
																Cep         		= ".$aUpdateAssociacoes['CEP'].", 
																FK_UF       		= '".$aUpdateAssociacoes['FK_UF']."', 
																Fone        		= ".$aUpdateAssociacoes['Fone'].", 
																Fax         		= ".$aUpdateAssociacoes['Fax'].", 
																Celular     		= ".$aUpdateAssociacoes['Celular'].", 
																Bco         		= ".$aUpdateAssociacoes['Bco'].", 
																Ag          		= '".$aUpdateAssociacoes['Ag']."', 
																Cta         		= '".$aUpdateAssociacoes['Cta']."', 
																Nome_Presid 		= '".$aUpdateAssociacoes['Nome_Presid']."', 
																CPF_Presid  		= ".$aUpdateAssociacoes['CPF_Presid'].", 
																RG_Presid   		= '".$aUpdateAssociacoes['RG_Presid']."', 
																Nome_Vice   		= '".$aUpdateAssociacoes['Nome_Vice']."', 
																CPF_Vice    		= ".$aUpdateAssociacoes['CPF_Vice'].", 
																RG_Vice     		= '".$aUpdateAssociacoes['RG_Vice']."', 
																Nome_Tes			= '".$aUpdateAssociacoes['Nome_Tes']."', 
																CPF_Tes				= ".$aUpdateAssociacoes['CPF_Tes'].", 
																RG_Tes				= '".$aUpdateAssociacoes['RG_Tes']."', 
																Alt					= Cast ('0' as Bit), 
																Sigla				= '".$aUpdateAssociacoes['Sigla']."', 
																Bloq				= Cast (".$aUpdateAssociacoes['Bloq']." as Bit), 
																Motivo				= '".$aUpdateAssociacoes['Motivo']."', 
																TUC					= Cast(".$aUpdateAssociacoes['TUC']." as Money), 
																Dia_Corte			= ".$aUpdateAssociacoes['Dia_Corte'].", 
																Dia_Pagto			= ".$aUpdateAssociacoes['Dia_Pagto'].", 
																Link_Rede			= '".$aUpdateAssociacoes['Link_Rede']."', 
																Desconto			= Cast(".$aUpdateAssociacoes['Desconto']." as Bit), 
																Nome_Contato		= '".$aUpdateAssociacoes['Nome_Contato']."', 
																Fone_Contato    	= ".$aUpdateAssociacoes['Fone_Contato'].", 
																Feira				= Cast(".$aUpdateAssociacoes['Feira']." as Bit), 
																Dia_Envio			= ".$aUpdateAssociacoes['Dia_Envio'].", 
																Endereco_Envio		= '".$aUpdateAssociacoes['Endereco_Envio']."', 
																Dia_relatorio		= ".$aUpdateAssociacoes['Dia_relatorio'].", 
																Dia_Repasse			= ".$aUpdateAssociacoes['Dia_Repasse'].", 
																Contato_Adm			= '".$aUpdateAssociacoes['Contato_Adm']."', 
																Contato_Fin			= '".$aUpdateAssociacoes['Contato_Fin']."', 
																Fone_Adm			= ".$aUpdateAssociacoes['Fone_Adm'].", 
																Fone_Fin			= ".$aUpdateAssociacoes['Fone_Fin'].", 
																Fone_Feira			= ".$aUpdateAssociacoes['Fone_Feira'].", 
																Mensalidade			= Cast(".$aUpdateAssociacoes['Mensalidade']." as Money),
																Bloq_Assoc			= Cast(".$aUpdateAssociacoes['Bloq_Assoc']." as Bit),
																MaxParc				= ".$aUpdateAssociacoes['MaxParc'].", 
																Invisivel_Btn_Ass	= Cast(".$aUpdateAssociacoes['Invisivel_Btn_Ass']." as Bit),
																Bloq_Limite			= Cast(".$aUpdateAssociacoes['Bloq_Limite']." as Bit), 
																NPLCP				= ".$aUpdateAssociacoes['NPLCP'].", 
																VetorSecretarias	= '".$aUpdateAssociacoes['VetorSecretarias']."', 
																Adm					= '".$aUpdateAssociacoes['Adm']."', 
																Bonus				= '".$aUpdateAssociacoes['Bonus']."', 
																Consultor			= '".$aUpdateAssociacoes['Consultor']."', 
																Desc_Folha			= Cast(".$aUpdateAssociacoes['Desc_Folha']." as bit)
														   FROM TB_Associacoes 
														  WHERE ( PK_Codigo = ".$aUpdateAssociacoes['PK_Codigo'].") ";
														  
			
											  
		try {
			$oUpdateAssociacoes = $this->oCon->prepare($sSQL); 

			
			$oUpdateAssociacoes->execute();
		} catch(PDOException $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}

		return true;
	}
	

	// Função para listar associados
	function getAssociados($iFK_Assoc) {
		try {
			$oResult = $this->oCon->query(" SELECT 	z.PK_Matricula, z.FK_Assoc, 
			                                        z.Nome, z.Lim_Credito, z.Bloq, z.Motivo,
			                                        z.Endereco, z.Bairro, z.CEP, z.Cidade, z.FK_UF,
													z.Fone, z.Celular, z.Email, z.Email2, z.OptInNews, 
													z.Cargo, z.Secretaria, 
													z.RG, z.CPF, z.Bco, z.Ag, z.Cta,
													z.Rescisao, z.Dt_Rescisao, 
													z.Dt_Cadastro, z.Dt_Nasc,
													z.Dt_Mensalidade, z.Mensalidade, 
													z.Dt_Mensal_Cartao, z.Mensal_Cartao, 
													z.Dt_Seguro, z.Seguro, z.Nome_Seguro, 
													z.Dt_Assist_Jurid, z.Assist_Juridica, z.Nome_Ass_Jur, 
													z.Dt_Colombo_Virt, z.Colombo_Virtual,
													z.Dt_Extrato, z.Extrato,
													z.Dt_Plano_Sta_Casa, z.Plano_Santa_Casa,
													z.Dt_Angelus, z.Angelus,
													z.Dt_Clube_Desc, z.Clube_Descontos
													a.Nome as Banco,
													b.Nome as Estado
											FROM 	TB_Clientes As z 
										 LEFT  JOIN TB_Bancos   As a ON (a.PK_Codigo = z.Bco)
										INNER  JOIN TB_Estados  As b ON (b.PK_Sigla  = z.FK_UF)
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

	/*
	// Função para atualizar associados
	function updateAssociados($aUpdateAssociados) {
		try {
			$oUpdateAssociados = $this->oCon->prepare(" UPDATE TB_Clientes 
															SET PK_Matricula		= ".$aUpdateAssociacoes['']PK_Matricula, 
																FK_Assoc			= ".$aUpdateAssociacoes['']FK_Assoc,
																Nome				= ".$aUpdateAssociacoes['']Nome, 
																Lim_Credito			= Cast(:Lim_Credito as Money), 
																Bloq				= Cast(:Bloq as bit), 
																OptInNews			= Cast(:OptInNews as bit), 
																Email				= ".$aUpdateAssociacoes['']Email, 
																Endereco			= ".$aUpdateAssociacoes['']Endereco, 
																Fone				= ".$aUpdateAssociacoes['']Fone,
																Celular				= ".$aUpdateAssociacoes['']Celular, 
																CPF					= ".$aUpdateAssociacoes['']CPF, 
																Bairro				= ".$aUpdateAssociacoes['']Bairro,
																Cep					= ".$aUpdateAssociacoes['']Cep, 
																Cidade				= ".$aUpdateAssociacoes['']Cidade, 
																FK_UF				= ".$aUpdateAssociacoes['']FK_UF, 
																RG					= ".$aUpdateAssociacoes['']RG,
																Bco					= ".$aUpdateAssociacoes['']Bco, 
																Ag					= ".$aUpdateAssociacoes['']Ag, 
																Cta					= ".$aUpdateAssociacoes['']Cta, 
																Motivo				= ".$aUpdateAssociacoes['']Motivo,
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
																Nome_Seguro			= ".$aUpdateAssociacoes['']Nome_Seguro, 
																Nome_Ass_Jur		= ".$aUpdateAssociacoes['']Nome_Ass_Jur,
																Dt_Mensalidade		= Cast(:Dt_Mensalidade as Datetime), 
																Dt_Mensal_Cartao	= Cast(:Dt_Mensal_Cartao as Datetime), 
																Dt_Seguro			= Cast(:Dt_Seguro as Datetime), 
																Dt_Assist_Jurid		= Cast(:Dt_Assist_Jurid as Datetime), 
																Dt_Colombo_Virt		= Cast(:Dt_Colombo_Virt as Datetime), 
																Dt_Extrato			= Cast(:Dt_Extrato as Datetime), 
																Dt_Plano_Sta_Casa	= Cast(:Dt_Plano_Sta_Casa as Datetime), 
																Dt_Angelus			= Cast(:Dt_Angelus as Datetime), 
																Dt_Clube_Desc		= Cast(:Dt_Clube_Desc as Datetime), 
																Email2				= ".$aUpdateAssociacoes['']Email2, 
																Cargo				= ".$aUpdateAssociacoes['']Cargo, 
																Secretaria			= ".$aUpdateAssociacoes['']Secretaria 
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
	    	echo 'ERROR: ' . $e->getMessage($oUpdateAssociados);
		}

		return true;
	}
	
	
	
	
	// Função para listar conveniadas
	function getConveniadas() {
		try {
			$oResult = $this->oCon->query(" SELECT 	z.PK_Codigo, 
													IsNull(z.Logotipo, '') AS Logotipo,
													z.Razao, z.Nome,
													z.CNPJ, z.Insc_Est, 
													z.Email, z.Site, 
													z.Bco, z.Ag, z.Cta, 
													z.Bco2, z.Ag2, z.Cta2, 
													z.Endereco, z.Bairro, z.Cep, z.Cidade, z.FK_UF, 
													z.Fone, z.Fax, z.Celular, 
													z.FK_Segmento, 
													z.Condicoes, 
													IsNull(z.Bloq, Cast('0' AS bit)) AS Bloq, 
													z.Motivo, 
													IsNull(z.OptInNews, Cast('0' AS bit)) AS OptInNews, 																Alt=Cast('0' as Bit), 
													z.FK_Grupo, 
													z.Contato, z.Fone_Contato, 
													z.Dt_Cadastro, 
													z.Tx_Adm_CDC, 
													IsNull(z.Loja_Assoc, Cast('0' AS bit)) AS Loja_Assoc, 
													z.Pessoa, 
													z.Nro_Contrato, z.Data_Contrato, z.Consultor, 
													z.Valor_Contrato, z.Anuidade_Contrato, z.Forma_Pgto, 
													z.Data_Pgto1, z.Valor_Pgto1, z.Situacao_Pg1, 
													z.Data_Pgto2, z.Valor_Pgto2, z.Situacao_Pg2, 
													z.Data_Pgto3, z.Valor_Pgto3, z.Situacao_Pg3, 
													z.TEF, z.TEF_Observacao, z.TEF_Data_Inst,
													z.POS_Modelo, z.POS_Serial, z.POS_Data_Inst, 
													z.POS_Valor, z.POS_Mensal, z.POS_Condicao, z.POS_Data_Mensal1, 
													z.Latitude, z.Longitude,
													a.Nome as Banco1, b.Nome as Banco2,
													c.Segmento, c.Icone,
													d.Nome as Estado,
													e.Nome as Grupo, f.Nome as BancoGrupo, e.Ag as AgGrupo, e.Cta as CtaGrupo, e.Contato as ContatoGrupo, e.Fone as FoneGrupo, e.Email as EmailGrupo
											  FROM  TB_Conveniadas as z
											  LEFT  JOIN TB_Bancos    As a ON (a.PK_Codigo = z.Bco)
											  LEFT  JOIN TB_Bancos    As b ON (b.PK_Codigo = z.Bco2)
											 INNER  JOIN TB_Segmentos As c ON (c.PK_Codigo = z.FK_Segmento)
											 INNER  JOIN TB_Estados   As d ON (d.PK_Sigla  = z.FK_UF)
											  LEFT  JOIN TB_Grupos    As e ON (e.PK_Codigo = z.FK_Grupo)
											  LEFT  JOIN TB_Bancos    AS f ON (f.PK_Codigo = e.Bco)
											 ORDER BY z.Nome ASC "); 

											  
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
	
	
	
	// Função para atualizar conveniadas	
	function updateConveniadas($aUpdateConveniadas) {
		try {
			$oUpdateConveniadas = $this->oCon->prepare(" UPDATE TB_Conveniadas 
															SET Razao					= ".$aUpdateAssociacoes['']Razao, 
																Nome					= ".$aUpdateAssociacoes['']Nome, 
																CNPJ					= ".$aUpdateAssociacoes['']CNPJ, 
																Insc_Est				= ".$aUpdateAssociacoes['']Insc_Est, 
																Email					= ".$aUpdateAssociacoes['']Email, 
																Site					= ".$aUpdateAssociacoes['']Site, 
																Bco						= ".$aUpdateAssociacoes['']Bco, 
																Ag						= ".$aUpdateAssociacoes['']Ag, 
																Cta						= ".$aUpdateAssociacoes['']Cta, 
																Bco2					= ".$aUpdateAssociacoes['']Bco2,
																Ag2						= ".$aUpdateAssociacoes['']Ag2, 
																Cta2					= ".$aUpdateAssociacoes['']Cta2, 
																Endereco				= ".$aUpdateAssociacoes['']Endereco, 
																Bairro					= ".$aUpdateAssociacoes['']Bairro, 
																Cep						= ".$aUpdateAssociacoes['']Cep, 
																Cidade					= ".$aUpdateAssociacoes['']Cidade, 
																FK_UF					= ".$aUpdateAssociacoes['']FK_UF, 
																Fone					= ".$aUpdateAssociacoes['']Fone, 
																Fax						= ".$aUpdateAssociacoes['']Fax, 
																Celular					= ".$aUpdateAssociacoes['']Celular, 
																FK_Segmento				= ".$aUpdateAssociacoes['']FK_Segmento, 
																Condicoes				= ".$aUpdateAssociacoes['']Condicoes, 
																Bloq					= Cast(:Bloq as bit), 
																Motivo					= ".$aUpdateAssociacoes['']Motivo, 
																OptInNews				= Cast(:OptInNews as bit), 																Alt=Cast('0' as Bit), 
																FK_Grupo				= ".$aUpdateAssociacoes['']FK_Grupo, 
																Contato					= ".$aUpdateAssociacoes['']Contato, 
																Fone_Contato			= ".$aUpdateAssociacoes['']Fone_Contato, 
																Dt_Cadastro				= Cast(:Dt_Cadastro as Datetime), 
																Tx_Adm_CDC				= Cast(:Tx_Adm_CDC as Numeric(4,3)), 
																Loja_Assoc				= Cast(:Loja_Assoc as bit), 
																Pessoa					= ".$aUpdateAssociacoes['']Pessoa, 
																Nro_Contrato			= ".$aUpdateAssociacoes['']Nro_Contrato, 
																Data_Contrato			= Cast(:Data_Contrato as Datetime), 
																Consultor				= ".$aUpdateAssociacoes['']Consultor, 
																Valor_Contrato			= Cast(:Valor_Contrato as Money), 
																Anuidade_Contrato		= Cast(:Anuidade_Contrato as Money),
																Forma_Pgto				= ".$aUpdateAssociacoes['']Forma_Pgto, 
																Data_Pgto1				= Cast(:Data_Pgto1 as Datetime), 
																Valor_Pgto1				= Cast(:Valor_Pgto1 as Money), 
																Situacao_Pg1			= ".$aUpdateAssociacoes['']Situacao_Pg1, 
																Data_Pgto2				= Cast(:Data_Pgto2 as Datetime), 
																Valor_Pgto2				= Cast(:Valor_Pgto2 as Money), 
																Situacao_Pg2			= ".$aUpdateAssociacoes['']Situacao_Pg2, 
																Data_Pgto3				= Cast(:Data_Pgto3 as Datetime), 
																Valor_Pgto3				= Cast(:Valor_Pgto3 as Money),
																Situacao_Pg3			= ".$aUpdateAssociacoes['']Situacao_Pg3, 
																TEF						= ".$aUpdateAssociacoes['']TEF, 
																TEF_Observacao			= ".$aUpdateAssociacoes['']TEF_Observacao,
																POS_Modelo				= ".$aUpdateAssociacoes['']POS_Modelo, 
																POS_Serial				= ".$aUpdateAssociacoes['']POS_Serial, 
																POS_Data_Inst			= Cast(:POS_Data_Inst as Datetime), 
																TEF_Data_Inst			= Cast(:TEF_Data_Inst as Datetime), 
																POS_Valor				= Cast(:POS_Valor as Money), 
																POS_Mensal				= Cast(:POS_Mensal as Money), 
																POS_Condicao			= ".$aUpdateAssociacoes['']POS_Condicao, 
																POS_Data_Mensal1		= Cast(:POS_Data_Mensal1 as Datetime), 
																Latitude				= ".$aUpdateAssociacoes['']Latitude, 
																Longitude				= ".$aUpdateAssociacoes['']Longitude
														FROM TB_Conveniadas 
														WHERE (PK_Codigo = ".$aUpdateAssociacoes['']PK_Codigo) "); 
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
	*/
	
	// Função para buscar bancos	
	function getBancos($sKey) {
		try {
			$oResult = $this->oCon->query(" SELECT PK_Codigo,
				 									 Nome
				                                FROM TB_Bancos 
			                                   WHERE $sKey 
											   order by Nome ASC");
			if($oResult)
				{
					$oBancos = $oResult->fetchAll(PDO::FETCH_OBJ);
				}
		} catch(PDOException $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}

		return $oBancos;
	}
		
	// Função para buscar estados	
	function getEstados($sKey) {
		try {
			$oResult = $this->oCon->query(" SELECT PK_Sigla,
				 									  Nome
				                                 FROM TB_Estados
												 WHERE $sKey ");
			if($oResult)
				{
					$oEstados = $oResult->fetchAll(PDO::FETCH_OBJ);
				}
		} catch(PDOException $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}
		return $oEstados;
	}
	
	// Função para buscar segmentos	
	function getSegmentos($sKey) {
		try {
			$oSegmentos = $this->oCon->prepare(" SELECT PK_Codigo,
				 									    Segmento,
													 	Icone
				                                   FROM TB_Segmentos 
			                                      WHERE PK_Codigo = '".$sKey."' ");
			
		} catch(PDOException $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}

		return true;
	}
	
	// Função para buscar grupos	
	function getGrupos($sKey) {
		try {
			$oGrupos = $this->oCon->prepare(" SELECT PK_Codigo,
				 									    Segmento,
													 	Icone
				                                   FROM TB_Grupos 
			                                      WHERE PK_Codigo = '".$sKey."' ");
			
		} catch(PDOException $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}

		return true;
	}

	
	// Função para buscar consultores	
	function getConsultores($sKey) {
		try {
			$oConsultores = $this->oCon->prepare(" SELECT   PK_Codigo,
															Nome,
															Email,
															FK_Usuario
				                                      FROM  TB_Consultores 
													WHERE   PK_Codigo = '".$sKey."' ");
			
		} catch(PDOException $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}

		return true;
	}
	
	
	// Função 
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
/*	
	// Função para excluir centro de custo
	function deleteCentroCusto($iIdCentroCusto) {
		try {
			$oDeleteCentroCusto = $this->oCon->prepare(" DELETE FROM centrodecusto 
							  						      WHERE id_ccusto = ".$aUpdateAssociacoes['id_ccusto']."); 
			$oDeleteCentroCusto->bindParam(":id_ccusto", $iIdCentroCusto, PDO::PARAM_INT);
			$oDeleteCentroCusto->execute();
		} catch(PDOException $e) {
	    	echo 'ERROR: ' . $e->getMessage();
		}

		return true;
	}
	*/
}


?>