<?php 
$sBinIni = '6375 8100 0001 1234';

$sBin = explode(' ', $sBinIni); 




for ($i = 1; $i <= 10000; $i++) {
	if ($sBin[3] <= 9999) {
		$sBin[3]++;
		if ($sBin[3] > 10) {
			$sBin[3] = '000'.$sBin[3]; 
		} elseif($sBin[3] >100){
			$sBin[3] = '00'.$sBin[3];
		} elseif($sBin[3] >1000) {
			$sBin[3] = '0'.$sBin[3];
		}
		$sBinNovo[$i]= $sBin[0].' '.$sBin[1].' '.$sBin[2].' '.$sBin[3];
	} else {
		$sBin[3] = 0000;
		$sBin[3]++;
		$sBin[2]++;
		if ($sBin[3] > 10) {
			$sBin[3] = '000'.$sBin[3]; 
		} elseif($sBin[3] >100){
			$sBin[3] = '00'.$sBin[3];
		} elseif($sBin[3] >1000) {
			$sBin[3] = '0'.$sBin[3];
		}
		if ($sBin[2] > 10) {
			$sBin[2] = '000'.$sBin[3]; 
		} elseif($sBin[2] >100){
			$sBin[2] = '00'.$sBin[3];
		} elseif($sBin[2] >1000) {
			$sBin[2] = '0'.$sBin[3];
		}
		$sBinNovo[$i]= $sBin[0].' '.$sBin[1].' '.$sBin[2].' '.$sBin[3];
	}
	
}
echo '<pre>';
    print_r($sBinNovo);
echo '</pre>';
?>