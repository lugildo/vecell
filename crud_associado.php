<?php

if ($_GET) {
	include_once('class.crud.php');

	$oCrud = new Crud();
	$oAssociados = $oCrud->getAssociados($_GET['FK_Assoc']);
	$i = 0;
	foreach ( $oAssociados as $aAssociado ) { 
		
		$oAssociados[$i]->PK_Matricula 			= utf8_encode($oAssociados[$i]->PK_Matricula);
		$oAssociados[$i]->FK_Assoc 				= utf8_encode($oAssociados[$i]->FK_Assoc);
		$oAssociados[$i]->Nome 					= utf8_encode($oAssociados[$i]->Nome);
		$oAssociados[$i]->Bloq 					= utf8_encode($oAssociados[$i]->Bloq);
		$oAssociados[$i]->Motivo 				= utf8_encode($oAssociados[$i]->Motivo);
		$oAssociados[$i]->Endereco 				= utf8_encode($oAssociados[$i]->Endereco);
		$oAssociados[$i]->Bairro 				= utf8_encode($oAssociados[$i]->Bairro);
		$oAssociados[$i]->CEP 					= utf8_encode($oAssociados[$i]->CEP);
		$oAssociados[$i]->Cidade 				= utf8_encode($oAssociados[$i]->Cidade);
		$oAssociados[$i]->FK_UF 				= utf8_encode($oAssociados[$i]->FK_UF);
		$oAssociados[$i]->Fone 					= utf8_encode($oAssociados[$i]->Fone);
		$oAssociados[$i]->Celular 				= utf8_encode($oAssociados[$i]->Celular);
		$oAssociados[$i]->Email 				= utf8_encode($oAssociados[$i]->Email);
		$oAssociados[$i]->Email2 				= utf8_encode($oAssociados[$i]->Email2);
		$oAssociados[$i]->OptInNews 			= utf8_encode($oAssociados[$i]->OptInNews);
		$oAssociados[$i]->Cargo 				= utf8_encode($oAssociados[$i]->Cargo);
		$oAssociados[$i]->Secretaria 			= utf8_encode($oAssociados[$i]->Secretaria);
		$oAssociados[$i]->RG 					= utf8_encode($oAssociados[$i]->RG);
		$oAssociados[$i]->CPF 					= utf8_encode($oAssociados[$i]->CPF);
		$oAssociados[$i]->Bco 					= utf8_encode($oAssociados[$i]->Bco);
		$oAssociados[$i]->Ag 					= utf8_encode($oAssociados[$i]->Ag);
		$oAssociados[$i]->Cta 					= utf8_encode($oAssociados[$i]->Cta);
		$oAssociados[$i]->Rescisao 				= utf8_encode($oAssociados[$i]->Rescisao);
		$oAssociados[$i]->Dt_Rescisao 			= utf8_encode($oAssociados[$i]->Dt_Rescisao);
		$oAssociados[$i]->Dt_Cadastro 			= utf8_encode($oAssociados[$i]->Dt_Cadastro);
		$oAssociados[$i]->Dt_Nasc 				= utf8_encode($oAssociados[$i]->Dt_Nasc);
		$oAssociados[$i]->Dt_Mensalidade 		= utf8_encode($oAssociados[$i]->Dt_Mensalidade);
		$oAssociados[$i]->Mensalidade 			= utf8_encode($oAssociados[$i]->Mensalidade);
		$oAssociados[$i]->Dt_Mensal_Cartao 		= utf8_encode($oAssociados[$i]->Dt_Mensal_Cartao);
		$oAssociados[$i]->Dt_Mensal_Cartao 		= utf8_encode($oAssociados[$i]->Dt_Mensal_Cartao);
		$oAssociados[$i]->Mensal_Cartao 		= utf8_encode($oAssociados[$i]->Mensal_Cartao);
		$oAssociados[$i]->Dt_Seguro 			= utf8_encode($oAssociados[$i]->Dt_Seguro);
		$oAssociados[$i]->Seguro 				= utf8_encode($oAssociados[$i]->Seguro);
		$oAssociados[$i]->Nome_Seguro 			= utf8_encode($oAssociados[$i]->Nome_Seguro);
		$oAssociados[$i]->Dt_Assist_Jurid 		= utf8_encode($oAssociados[$i]->Dt_Assist_Jurid);
		$oAssociados[$i]->Assist_Juridica 		= utf8_encode($oAssociados[$i]->Assist_Juridica);
		$oAssociados[$i]->Nome_Ass_Jur 			= utf8_encode($oAssociados[$i]->Nome_Ass_Jur);
		$oAssociados[$i]->Dt_Colombo_Virt    	= utf8_encode($oAssociados[$i]->Dt_Colombo_Virt);
		$oAssociados[$i]->Colombo_Virtual    	= utf8_encode($oAssociados[$i]->Colombo_Virtual);
		$oAssociados[$i]->Dt_Extrato 			= utf8_encode($oAssociados[$i]->Dt_Extrato);
		$oAssociados[$i]->Extrato 				= utf8_encode($oAssociados[$i]->Extrato);
		$oAssociados[$i]->Dt_Plano_Sta_Casa 	= utf8_encode($oAssociados[$i]->Dt_Plano_Sta_Casa);
		$oAssociados[$i]->Plano_Santa_Casa 		= utf8_encode($oAssociados[$i]->Plano_Santa_Casa);
		$oAssociados[$i]->Dt_Angelus 			= utf8_encode($oAssociados[$i]->Dt_Angelus);
		$oAssociados[$i]->Angelus 				= utf8_encode($oAssociados[$i]->Angelus);
		$oAssociados[$i]->Dt_Clube_Desc 		= utf8_encode($oAssociados[$i]->Dt_Clube_Desc);
		$oAssociados[$i]->Clube_Descontos 		= utf8_encode($oAssociados[$i]->Clube_Descontos);
		$i++;

	}	
	echo json_encode($oAssociados);
}

if ($_POST) {
	// edit
	// insert
	// delete
}

?>
