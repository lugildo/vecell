<?php

if ($_GET) {
	include_once('class.crud.php');

	$oCrud = new Crud();
	$oAssociacoes = $oCrud->getAssociacoes();
	$i = 0;
	foreach ( $oAssociacoes as $aAssociacao ) { 
		
		$oAssociacoes[$i]->Nome = utf8_encode($oAssociacoes[$i]->Nome);
		$oAssociacoes[$i]->Sigla = utf8_encode($oAssociacoes[$i]->Sigla);
		$oAssociacoes[$i]->Endereco = utf8_encode($oAssociacoes[$i]->Endereco);
		$oAssociacoes[$i]->Bairro = utf8_encode($oAssociacoes[$i]->Bairro);
		$oAssociacoes[$i]->Cidade = utf8_encode($oAssociacoes[$i]->Cidade);
		$oAssociacoes[$i]->FK_UF = utf8_encode($oAssociacoes[$i]->FK_UF);
		$oAssociacoes[$i]->Site = utf8_encode($oAssociacoes[$i]->Site);
		$oAssociacoes[$i]->Email = utf8_encode($oAssociacoes[$i]->Email);
		$oAssociacoes[$i]->Ag = utf8_encode($oAssociacoes[$i]->Ag);
		$oAssociacoes[$i]->Cta = utf8_encode($oAssociacoes[$i]->Cta);
		$oAssociacoes[$i]->Nome_Presid = utf8_encode($oAssociacoes[$i]->Nome_Presid);
		$oAssociacoes[$i]->RG_Presid = utf8_encode($oAssociacoes[$i]->RG_Presid);
		$oAssociacoes[$i]->Nome_Vice = utf8_encode($oAssociacoes[$i]->Nome_Vice);
		$oAssociacoes[$i]->RG_Vice = utf8_encode($oAssociacoes[$i]->RG_Vice);
		$oAssociacoes[$i]->Nome_Tes = utf8_encode($oAssociacoes[$i]->Nome_Tes);
		$oAssociacoes[$i]->RG_Tes = utf8_encode($oAssociacoes[$i]->RG_Tes);
		$oAssociacoes[$i]->Nome_Contato = utf8_encode($oAssociacoes[$i]->Nome_Contato);
		$oAssociacoes[$i]->Contato_Adm = utf8_encode($oAssociacoes[$i]->Contato_Adm);
		$oAssociacoes[$i]->Contato_Fin = utf8_encode($oAssociacoes[$i]->Contato_Fin);
		$oAssociacoes[$i]->Link_Rede = utf8_encode($oAssociacoes[$i]->Link_Rede);
		$oAssociacoes[$i]->VetorSecretarias = utf8_encode($oAssociacoes[$i]->VetorSecretarias);
		$i++;

	}	
	echo json_encode($oAssociacoes);
}

if ($_POST) {
	// edit
	// insert
	// delete
}

?>
