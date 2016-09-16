<?php

if ($_GET) {
	include_once('class.crud.php');

	$oCrud = new Crud();
	$oAssociacoes = $oCrud->getAssociacoes();
	
	$i = 0;
	foreach ( $oAssociacoes as $aAssociacao ) { 
		
		$oAssociacoes[$i]->PK_Codigo 			= utf8_encode($oAssociacoes[$i]->PK_Codigo);
		$oAssociacoes[$i]->Nome 				= utf8_encode($oAssociacoes[$i]->Nome);
		$oAssociacoes[$i]->Sigla 				= utf8_encode($oAssociacoes[$i]->Sigla);
		$oAssociacoes[$i]->CNPJ 				= utf8_encode($oAssociacoes[$i]->CNPJ);
		$oAssociacoes[$i]->Bco 					= utf8_encode($oAssociacoes[$i]->Bco);
		$oAssociacoes[$i]->Ag 					= utf8_encode($oAssociacoes[$i]->Ag);
		$oAssociacoes[$i]->Cta 					= utf8_encode($oAssociacoes[$i]->Cta);	
		$oAssociacoes[$i]->Endereco 			= utf8_encode($oAssociacoes[$i]->Endereco);
		$oAssociacoes[$i]->Bairro 				= utf8_encode($oAssociacoes[$i]->Bairro);
		$oAssociacoes[$i]->CEP 					= utf8_encode($oAssociacoes[$i]->CEP);
		$oAssociacoes[$i]->Cidade 				= utf8_encode($oAssociacoes[$i]->Cidade);
		$oAssociacoes[$i]->FK_UF 				= utf8_encode($oAssociacoes[$i]->FK_UF);
		$oAssociacoes[$i]->Site 				= utf8_encode($oAssociacoes[$i]->Site);
		$oAssociacoes[$i]->Email 				= utf8_encode($oAssociacoes[$i]->Email);
		$oAssociacoes[$i]->Fone 				= utf8_encode($oAssociacoes[$i]->Fone);
		$oAssociacoes[$i]->Fax 					= utf8_encode($oAssociacoes[$i]->Fax);
		$oAssociacoes[$i]->Celular 				= utf8_encode($oAssociacoes[$i]->Celular);
		$oAssociacoes[$i]->Bloq 				= utf8_encode($oAssociacoes[$i]->Bloq);
		$oAssociacoes[$i]->Motivo 				= utf8_encode($oAssociacoes[$i]->Motivo);
		$oAssociacoes[$i]->Bloq_Assoc 			= utf8_encode($oAssociacoes[$i]->Bloq_Assoc);
		$oAssociacoes[$i]->Bloq_Limite 			= utf8_encode($oAssociacoes[$i]->Bloq_Limite);
		$oAssociacoes[$i]->Dia_Corte 			= utf8_encode($oAssociacoes[$i]->Dia_Corte);
		$oAssociacoes[$i]->Dia_relatorio 		= utf8_encode($oAssociacoes[$i]->Dia_relatorio);
		$oAssociacoes[$i]->Dia_Pagto 			= utf8_encode($oAssociacoes[$i]->Dia_Pagto);
		$oAssociacoes[$i]->Dia_Repasse 			= utf8_encode($oAssociacoes[$i]->Dia_Repasse);
		$oAssociacoes[$i]->Dia_Envio 			= utf8_encode($oAssociacoes[$i]->Dia_Envio);
		$oAssociacoes[$i]->Endereco_Envio 		= utf8_encode($oAssociacoes[$i]->Endereco_Envio);
		$oAssociacoes[$i]->Nome_Presid 			= utf8_encode($oAssociacoes[$i]->Nome_Presid);
		$oAssociacoes[$i]->RG_Presid 			= utf8_encode($oAssociacoes[$i]->RG_Presid);
		$oAssociacoes[$i]->CPF_Presid 			= utf8_encode($oAssociacoes[$i]->CPF_Presid);
		$oAssociacoes[$i]->Nome_Vice 			= utf8_encode($oAssociacoes[$i]->Nome_Vice);
		$oAssociacoes[$i]->RG_Vice 				= utf8_encode($oAssociacoes[$i]->RG_Vice);
		$oAssociacoes[$i]->CPF_Vice 			= utf8_encode($oAssociacoes[$i]->CPF_Vice);
		$oAssociacoes[$i]->Nome_Tes 			= utf8_encode($oAssociacoes[$i]->Nome_Tes);
		$oAssociacoes[$i]->RG_Tes 				= utf8_encode($oAssociacoes[$i]->RG_Tes);
		$oAssociacoes[$i]->CPF_Tes 				= utf8_encode($oAssociacoes[$i]->CPF_Tes);
		$oAssociacoes[$i]->Nome_Contato 		= utf8_encode($oAssociacoes[$i]->Nome_Contato);
		$oAssociacoes[$i]->Fone_Contato 		= utf8_encode($oAssociacoes[$i]->Fone_Contato);
		$oAssociacoes[$i]->Contato_Adm 			= utf8_encode($oAssociacoes[$i]->Contato_Adm);
		$oAssociacoes[$i]->Fone_Adm 			= utf8_encode($oAssociacoes[$i]->Fone_Adm);
		$oAssociacoes[$i]->Contato_Fin 			= utf8_encode($oAssociacoes[$i]->Contato_Fin);
		$oAssociacoes[$i]->Fone_Fin 			= utf8_encode($oAssociacoes[$i]->Fone_Fin);
		$oAssociacoes[$i]->Feira 				= utf8_encode($oAssociacoes[$i]->Feira);
		$oAssociacoes[$i]->Fone_Feira 			= utf8_encode($oAssociacoes[$i]->Fone_Feira);
		$oAssociacoes[$i]->Link_Rede 			= utf8_encode($oAssociacoes[$i]->Link_Rede);
		$oAssociacoes[$i]->VetorSecretarias 	= utf8_encode($oAssociacoes[$i]->VetorSecretarias);
		$oAssociacoes[$i]->Adm 					= utf8_encode($oAssociacoes[$i]->Adm);
		$oAssociacoes[$i]->Bonus 				= utf8_encode($oAssociacoes[$i]->Bonus);
		$oAssociacoes[$i]->FK_Consultor 		= utf8_encode($oAssociacoes[$i]->FK_Consultor);
		$oAssociacoes[$i]->Consultor 			= utf8_encode($oAssociacoes[$i]->Consultor);
		$oAssociacoes[$i]->Mensalidade 			= utf8_encode($oAssociacoes[$i]->Mensalidade);
		$oAssociacoes[$i]->TUC 					= utf8_encode($oAssociacoes[$i]->TUC);
		$oAssociacoes[$i]->MaxParc 				= utf8_encode($oAssociacoes[$i]->MaxParc);
		$oAssociacoes[$i]->NPLCP 				= utf8_encode($oAssociacoes[$i]->NPLCP);
		$oAssociacoes[$i]->Nro_Contrato 		= utf8_encode($oAssociacoes[$i]->Nro_Contrato);
		$oAssociacoes[$i]->Data_Contrato 		= utf8_encode($oAssociacoes[$i]->Data_Contrato);
		$oAssociacoes[$i]->Dt_Cadastro 			= utf8_encode($oAssociacoes[$i]->Dt_Cadastro);
		$oAssociacoes[$i]->Desc_Folha 			= utf8_encode($oAssociacoes[$i]->Desc_Folha);
		$oAssociacoes[$i]->Automotivo 			= utf8_encode($oAssociacoes[$i]->Automotivo);
		$oAssociacoes[$i]->Desconto 			= utf8_encode($oAssociacoes[$i]->Desconto);
		$oAssociacoes[$i]->OptInNews 			= utf8_encode($oAssociacoes[$i]->OptInNews);
		$oAssociacoes[$i]->Invisivel_Btn_Ass	= utf8_encode($oAssociacoes[$i]->Invisivel_Btn_Ass);
		$oAssociacoes[$i]->Banco				= utf8_encode($oAssociacoes[$i]->Banco);
		$oAssociacoes[$i]->NomeConsultor		= utf8_encode($oAssociacoes[$i]->NomeConsultor);
		$oAssociacoes[$i]->EmailConsultor		= utf8_encode($oAssociacoes[$i]->EmailConsultor);
		$oAssociacoes[$i]->UsuarioConsultor		= utf8_encode($oAssociacoes[$i]->UsuarioConsultor);
		$oAssociacoes[$i]->Estado				= utf8_encode($oAssociacoes[$i]->Estado);
		
		$i++;

	}	
	echo json_encode($oAssociacoes);
}

if ($_POST) {
	$oAssociacoes['PK_Codigo']			= utf8_decode($_POST['id']);
	$oAssociacoes['Nome'] 				= utf8_decode($_POST['Nome']);
	$oAssociacoes['Sigla'] 				= utf8_decode($_POST['Sigla']);
	$oAssociacoes['CNPJ'] 				= utf8_decode($_POST['CNPJ']);
	//$oAssociacoes['Bco'] 				= utf8_decode($_POST['Bco']);
	$oAssociacoes['Bco'] 				= 0;
	
	$oAssociacoes['Ag'] 				= utf8_decode($_POST['Ag']);
	$oAssociacoes['Cta'] 				= utf8_decode($_POST['Cta']);	
	$oAssociacoes['Endereco'] 			= utf8_decode($_POST['Endereco']);
	$oAssociacoes['Bairro'] 			= utf8_decode($_POST['Bairro']);
	$oAssociacoes['CEP'] 				= utf8_decode($_POST['CEP']);
	$oAssociacoes['Cidade'] 			= utf8_decode($_POST['Cidade']);
	$oAssociacoes['FK_UF'] 				= utf8_decode($_POST['FK_UF']);
	$oAssociacoes['Site'] 				= utf8_decode($_POST['Site']);
	$oAssociacoes['Email'] 				= utf8_decode($_POST['Email']);
	$oAssociacoes['Fone']				= utf8_decode($_POST['Fone']);
	$oAssociacoes['Fax'] 				= utf8_decode($_POST['Fax']);
	$oAssociacoes['Celular'] 			= utf8_decode($_POST['Celular']);
	$oAssociacoes['Bloq'] 				= utf8_decode($_POST['Bloq']);
	$oAssociacoes['Motivo'] 			= utf8_decode($_POST['Motivo']);
	$oAssociacoes['Bloq_Assoc'] 		= utf8_decode($_POST['Bloq_Assoc']);
	$oAssociacoes['Bloq_Limite']		= utf8_decode($_POST['Bloq_Limite']);
	$oAssociacoes['Dia_Corte'] 			= utf8_decode($_POST['Dia_Corte']);
	$oAssociacoes['Dia_relatorio']		= utf8_decode($_POST['Dia_relatorio']);
	$oAssociacoes['Dia_Pagto']			= utf8_decode($_POST['Dia_Pagto']);
	$oAssociacoes['Dia_Repasse']		= utf8_decode($_POST['Dia_Repasse']);
	$oAssociacoes['Dia_Envio']			= utf8_decode($_POST['Dia_Envio']);
	$oAssociacoes['Endereco_Envio']		= utf8_decode($_POST['Endereco_Envio']);
	$oAssociacoes['Nome_Presid']		= utf8_decode($_POST['Nome_Presid']);
	$oAssociacoes['RG_Presid']			= utf8_decode($_POST['RG_Presid']);
	$oAssociacoes['CPF_Presid']			= utf8_decode($_POST['CPF_Presid']);
	$oAssociacoes['Nome_Vice']			= utf8_decode($_POST['Nome_Vice']);
	$oAssociacoes['RG_Vice']			= utf8_decode($_POST['RG_Vice']);
	$oAssociacoes['CPF_Vice']			= utf8_decode($_POST['CPF_Vice']);
	$oAssociacoes['Nome_Tes']			= utf8_decode($_POST['Nome_Tes']);
	$oAssociacoes['RG_Tes']				= utf8_decode($_POST['RG_Tes']);
	$oAssociacoes['CPF_Tes']			= utf8_decode($_POST['CPF_Tes']);
	$oAssociacoes['Nome_Contato']		= utf8_decode($_POST['Nome_Contato']);
	$oAssociacoes['Fone_Contato']		= utf8_decode($_POST['Fone_Contato']);
	$oAssociacoes['Contato_Adm']		= utf8_decode($_POST['Contato_Adm']);
	$oAssociacoes['Fone_Adm']			= utf8_decode($_POST['Fone_Adm']);
	$oAssociacoes['Contato_Fin']		= utf8_decode($_POST['Contato_Fin']);
	$oAssociacoes['Fone_Fin']			= utf8_decode($_POST['Fone_Fin']);
	$oAssociacoes['Feira']				= utf8_decode($_POST['Feira']);
	$oAssociacoes['Fone_Feira']			= utf8_decode($_POST['Fone_Feira']);
	$oAssociacoes['Link_Rede']			= utf8_decode($_POST['Link_Rede']);
	$oAssociacoes['VetorSecretarias'] 	= utf8_decode($_POST['VetorSecretarias']);
	$oAssociacoes['Adm']				= utf8_decode($_POST['Adm']);
	$oAssociacoes['Bonus']				= utf8_decode($_POST['Bonus']);
	$oAssociacoes['FK_Consultor']		= utf8_decode($_POST['FK_Consultor']);
	$oAssociacoes['Consultor']			= utf8_decode($_POST['Consultor']);
	$oAssociacoes['Mensalidade']		= utf8_decode($_POST['Mensalidade']);
	$oAssociacoes['TUC']				= utf8_decode($_POST['TUC']);
	$oAssociacoes['MaxParc']			= utf8_decode($_POST['MaxParc']);
	$oAssociacoes['NPLCP']				= utf8_decode($_POST['NPLCP']);
	$oAssociacoes['Nro_Contrato']		= utf8_decode($_POST['Nro_Contrato']);
	$oAssociacoes['Data_Contrato']		= utf8_decode($_POST['Data_Contrato']);
	$oAssociacoes['Desc_Folha']			= utf8_decode($_POST['Desc_Folha']);
	//$oAssociacoes['OptInNews']			= utf8_decode($_POST['OptInNews']);
	$oAssociacoes['OptInNews']			= 0;
	
	$oAssociacoes['Desconto']			= utf8_decode($_POST['Desconto']);
	$oAssociacoes['Invisivel_Btn_Ass']	= utf8_decode($_POST['Invisivel_Btn_Ass']);
	
	
	
	
	
	if ($_POST['oper'] == 'add') {
	  	echo 'incluir';	
	} elseif ($_POST['oper'] == 'edit') {
	 	//echo 'editar';
		
		//echo '<pre>';
		//print_r($_POST);
		//echo '</pre>';
  		include_once('class.crud.php');

  		$oCrud = new Crud();
  	  	$oAssociacoes = $oCrud->updateAssociacoes($oAssociacoes) ;	
	}
	// edit
	// insert
	// delete
}

?>
