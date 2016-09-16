<?php
/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

date_default_timezone_set('Europe/London');

/** PHPExcel_IOFactory */
require_once dirname(__FILE__) . '/../Classes/PHPExcel/IOFactory.php';

$objReader = PHPExcel_IOFactory::createReader('Excel5');
$objPHPExcel = $objReader->load("templates/assoc.xls");

$iPK_Codigo = $_POST['id'];
include_once('../../class.calculos.php');
$oCrud = new Calculos();
$oProdutos = $oCrud->getProdutos();
$oIncidencias = $oCrud->getIncidencias();
$oRegras = $oCrud->getRegras();
$oParcelas = $oCrud->getParcelas('AND (TB_Parcelas.PK_NroParc > 0)', '08/11/2016', '09/10/2016', $iPK_Codigo);
echo '<pre>';
print_r($oParcelas);
echo '<pre>';

$data = array(array('title'		=> 'SEVERO ROTH | ZAMPIERON E DALACORTE LTDA',
					'price'		=> 53.46,
					'quantity'	=> 0.8
				   ),
			  array('title'		=> 'POSTO TROPICAL | COMERCIAL DE COMBUSTIVEIS TROPICAL LTDA',
					'price'		=> 442.25,
					'quantity'	=> 2.21
				   ),
			  array('title'		=> 'VECELL - TAUC | VECELL - TUC',
					'price'		=> 8.5,
					'quantity'	=> 0
				   )
			 );
			 
$objPHPExcel->getActiveSheet()->setCellValue('D1', 'Período de 20/06/2016 a 19/07/2016');
$objPHPExcel->getActiveSheet()->setCellValue('D2', PHPExcel_Shared_Date::PHPToExcel(time()));
$objPHPExcel->getActiveSheet()->setCellValue('A4', 'Resumo por Credenciada - VECELLCARD - ASFADES');
$baseRow = 7;
foreach($data as $r => $dataRow) {
	$row = $baseRow + $r;
	$objPHPExcel->getActiveSheet()->insertNewRowBefore($row,1);

	$objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $dataRow['title'])
	                              ->setCellValue('B'.$row, $dataRow['price'])
	                              ->setCellValue('C'.$row, $dataRow['quantity'])
	                              ->setCellValue('D'.$row, '=B'.$row. '- C'.$row);
}
$objPHPExcel->getActiveSheet()->removeRow($baseRow-1,1);


$objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
ob_start();
$objWriter->save("php://output");
$xlsData = ob_get_contents();
ob_end_clean();

$response =  array(
        'op' => 'ok',
        'file' => "data:application/vnd.ms-excel;base64,".base64_encode($xlsData)
    );

die(json_encode($response));

//$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
//$objWriter->save(str_replace('.php', '.xls', __FILE__));
//echo '<a href="http://104.236.0.195/PHPExcel/Examples/30template.xls"> Baixar  </a>';
