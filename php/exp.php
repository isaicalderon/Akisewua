<?php 
	
	
	//lexico($exp5, $matriz);
	//echo "<br>Token: ".$token;
	
	function lexico($exp){
		// definimos la matriz
		$matriz = array();
		$matriz[0][0] = "500";
		$matriz[0][1] = "1";
		$matriz[1][0] = "-1";
		$matriz[1][1] = "1";
		$len = strlen($exp);
		$char = '';
		$token = "";
		$cont = 0;
		$estado = 0;

		do {
			$char = $exp[$cont];
			$col = getCol($char, $matriz);
			$estado = getEstado($estado, $col, $matriz);
			$cont++;
			if ($estado < 0) {
				break;
			}else{
				if ($estado < 500) {  
					$token = $token."".$char;
				}else{
					$estado = 0;
				}
			}
			if ($cont == $len) {
				break;
			}
		} while ($cont != $len);
		return $token;
	}
	
	function getCol($char, $array){
		$col = 0;
		switch ($char) {
			case '0':
			case '1':
			case '2':
			case '3':
			case '4':
			case '5':
			case '6':
			case '7':
			case '8':
			case '9':
				$col = 1;
				break;
			default:
				$col = 0;
				break;
		}
		return $col;
	}

	function getEstado($estado, $col, $matriz){
		return $matriz[$estado][$col];
	}
?>