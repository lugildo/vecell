<?php
header('Content-type: text/plain');

include_once('class.crud.php');

$combobox = $_GET['lookup'];

if ($combobox == "estados") {
	//         class.crud.php
	//function getEstados($sKey) {}
	
	$oCrud = new Crud();
	//Sr. Luciano, tem que tirar esse parâmetro da função, se não retorna um estado só.
	$oEstados = $oCrud->getEstados("RS");
	$i = 0;
	echo "{";
	foreach ( $oEstados as $aEstado ) { 
		$oEstados[$i]->PK_Sigla			= utf8_encode($oEstados[$i]->PK_Sigla);
		$oEstados[$i]->Nome				= utf8_encode($oEstados[$i]->Nome);
		
		if (i != 1) {
			echo ",";
		}
		echo "\"".$oEstados[$i]->PK_Sigla."\": \"".$oEstados[$i]->Nome."\"";
		$i++;
	}	
	echo "}";
	
	//echo "{\"RS\": \"Rio Grande do Sul\", \"SP\": \"São Paulo\", \"RJ\": \"Rio de Janeiro\"}";
}

if ($combobox == "bancos") {
	echo "";
}

if ($combobox == "consultores") {
	echo "";
}

?>