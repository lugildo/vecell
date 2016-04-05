<?php

if ($_GET) {
	include_once('class.crud.php');

	$oCrud = new Crud();
	$oConveniadas = $oCrud->getConveniadas();

	$i = 0;
	foreach ( $oConveniadas as $aConveniada ) { 

		$oConveniadas[$i]->PK_Codigo 			= utf8_encode($oConveniadas[$i]->PK_Codigo);
		$oConveniadas[$i]->Logotipo				= utf8_encode($oConveniadas[$i]->Logotipo);
		$oConveniadas[$i]->Razao				= utf8_encode($oConveniadas[$i]->Razao);
		$oConveniadas[$i]->Nome					= utf8_encode($oConveniadas[$i]->Nome);
		$oConveniadas[$i]->CNPJ					= utf8_encode($oConveniadas[$i]->CNPJ);
		$oConveniadas[$i]->Insc_Est				= utf8_encode($oConveniadas[$i]->Insc_Est);
		$oConveniadas[$i]->Email				= utf8_encode($oConveniadas[$i]->Email);
		$oConveniadas[$i]->Site					= utf8_encode($oConveniadas[$i]->Site);
		$oConveniadas[$i]->Bco					= utf8_encode($oConveniadas[$i]->Bco);
		$oConveniadas[$i]->Ag					= utf8_encode($oConveniadas[$i]->Ag);
		$oConveniadas[$i]->Cta 					= utf8_encode($oConveniadas[$i]->Cta);
		$oConveniadas[$i]->Bco2					= utf8_encode($oConveniadas[$i]->Bco2);
		$oConveniadas[$i]->Ag2					= utf8_encode($oConveniadas[$i]->Ag2);
		$oConveniadas[$i]->Cta2					= utf8_encode($oConveniadas[$i]->Cta2);
		$oConveniadas[$i]->Endereco				= utf8_encode($oConveniadas[$i]->Endereco);
		$oConveniadas[$i]->Bairro				= utf8_encode($oConveniadas[$i]->Bairro);
		$oConveniadas[$i]->Cep					= utf8_encode($oConveniadas[$i]->Cep);
		$oConveniadas[$i]->Cidade				= utf8_encode($oConveniadas[$i]->Cidade);
		$oConveniadas[$i]->FK_UF				= utf8_encode($oConveniadas[$i]->FK_UF);
		$oConveniadas[$i]->Fone					= utf8_encode($oConveniadas[$i]->Fone);
		$oConveniadas[$i]->Fax					= utf8_encode($oConveniadas[$i]->Fax);
		$oConveniadas[$i]->Celular				= utf8_encode($oConveniadas[$i]->Celular);
		$oConveniadas[$i]->FK_Segmento			= utf8_encode($oConveniadas[$i]->FK_Segmento);
		$oConveniadas[$i]->Condicoes			= utf8_encode($oConveniadas[$i]->Condicoes);
		$oConveniadas[$i]->Bloq					= utf8_encode($oConveniadas[$i]->Bloq);
		$oConveniadas[$i]->Motivo				= utf8_encode($oConveniadas[$i]->Motivo);
		$oConveniadas[$i]->OptInNews			= utf8_encode($oConveniadas[$i]->OptInNews);
//		$oConveniadas[$i]->Alt					= utf8_encode($oConveniadas[$i]->Alt);
		$oConveniadas[$i]->FK_Grupo				= utf8_encode($oConveniadas[$i]->FK_Grupo);
		$oConveniadas[$i]->Contato				= utf8_encode($oConveniadas[$i]->Contato);
		$oConveniadas[$i]->Fone_Contato			= utf8_encode($oConveniadas[$i]->Fone_Contato);
		$oConveniadas[$i]->Dt_Cadastro			= utf8_encode($oConveniadas[$i]->Dt_Cadastro);
		$oConveniadas[$i]->Tx_Adm_CDC			= utf8_encode($oConveniadas[$i]->Tx_Adm_CDC);
		$oConveniadas[$i]->Loja_Assoc			= utf8_encode($oConveniadas[$i]->Loja_Assoc);
		$oConveniadas[$i]->Pessoa				= utf8_encode($oConveniadas[$i]->Pessoa);
		$oConveniadas[$i]->Nro_Contrato			= utf8_encode($oConveniadas[$i]->Nro_Contrato);
		$oConveniadas[$i]->Data_Contrato		= utf8_encode($oConveniadas[$i]->Data_Contrato);
		$oConveniadas[$i]->Consultor			= utf8_encode($oConveniadas[$i]->Consultor);
		$oConveniadas[$i]->Valor_Contrato		= utf8_encode($oConveniadas[$i]->Valor_Contrato);
		$oConveniadas[$i]->Anuidade_Contrato	= utf8_encode($oConveniadas[$i]->Anuidade_Contrato);
		$oConveniadas[$i]->Forma_Pgto			= utf8_encode($oConveniadas[$i]->Forma_Pgto);
		$oConveniadas[$i]->Data_Pgto1			= utf8_encode($oConveniadas[$i]->Data_Pgto1);
		$oConveniadas[$i]->Valor_Pgto1			= utf8_encode($oConveniadas[$i]->Valor_Pgto1);
		$oConveniadas[$i]->Situacao_Pg1			= utf8_encode($oConveniadas[$i]->Situacao_Pg1);
		$oConveniadas[$i]->Data_Pgto2			= utf8_encode($oConveniadas[$i]->Data_Pgto2);
		$oConveniadas[$i]->Valor_Pgto2			= utf8_encode($oConveniadas[$i]->Valor_Pgto2);
		$oConveniadas[$i]->Situacao_Pg2			= utf8_encode($oConveniadas[$i]->Situacao_Pg2);
		$oConveniadas[$i]->Data_Pgto3			= utf8_encode($oConveniadas[$i]->Data_Pgto3);
		$oConveniadas[$i]->Valor_Pgto3			= utf8_encode($oConveniadas[$i]->Valor_Pgto3);
		$oConveniadas[$i]->Situacao_Pg3			= utf8_encode($oConveniadas[$i]->Situacao_Pg3);
		$oConveniadas[$i]->TEF					= utf8_encode($oConveniadas[$i]->TEF);
		$oConveniadas[$i]->TEF_Observacao		= utf8_encode($oConveniadas[$i]->TEF_Observacao);
		$oConveniadas[$i]->TEF_Data_Inst		= utf8_encode($oConveniadas[$i]->TEF_Data_Inst);
		$oConveniadas[$i]->POS_Modelo			= utf8_encode($oConveniadas[$i]->POS_Modelo);
		$oConveniadas[$i]->POS_Serial			= utf8_encode($oConveniadas[$i]->POS_Serial);
		$oConveniadas[$i]->POS_Data_Inst		= utf8_encode($oConveniadas[$i]->POS_Data_Inst);
		$oConveniadas[$i]->POS_Valor			= utf8_encode($oConveniadas[$i]->POS_Valor);
		$oConveniadas[$i]->POS_Mensal			= utf8_encode($oConveniadas[$i]->POS_Mensal);
		$oConveniadas[$i]->POS_Condicao			= utf8_encode($oConveniadas[$i]->POS_Condicao);
		$oConveniadas[$i]->POS_Data_Mensal1		= utf8_encode($oConveniadas[$i]->POS_Data_Mensal1);
		$oConveniadas[$i]->Latitude				= utf8_encode($oConveniadas[$i]->Latitude);
		$oConveniadas[$i]->Longitude			= utf8_encode($oConveniadas[$i]->Longitude);
		$oConveniadas[$i]->Banco1			    = utf8_encode($oConveniadas[$i]->Banco1);
		$oConveniadas[$i]->Banco2			    = utf8_encode($oConveniadas[$i]->Banco2);

		$i++;
 
	}	
	echo json_encode($oConveniadas);
}

if ($_POST) {
	// edit
	// insert
	// delete
}

?>
