<?php
header('Content-type: text/plain');

include_once('class.crud.php');

$combobox = $_GET['lookup'];

if ($combobox == "estados") {
	//         class.crud.php
	//function getEstados($sKey) {}
	
	$oCrud = new Crud();
	//Sr. Luciano, tem que tirar esse parâmetro da função, se não retorna um estado só.
	$oEstados = $oCrud->getEstados();
	echo json_encode($oEstados);
	
	/*$i = 0;
	echo "{";
	foreach ( $oEstados as $aEstado ) { 
		$oEstados[$i]->PK_Sigla			= utf8_encode($oEstados[$i]->PK_Sigla);
		$oEstados[$i]->Nome				= utf8_encode($oEstados[$i]->Nome);
		
		if ($i > 0) {
			echo ",";
		}
		echo "\"".$oEstados[$i]->PK_Sigla."\": \"".$oEstados[$i]->Nome."\"";
		$i++;
	}	
	echo "}";
	*/
}

if ($combobox == "bancos") {
	echo "";
}

if ($combobox == "consultores") {
	echo "";
}

?>