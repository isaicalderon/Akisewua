<meta charset="utf-8">
<?php 
	/**
   	 * 
     * by Isai Aleman Calderon
     */
	function encriptar($password){
		$letras="ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz0123456789_.,*@";
		//$numeros="123456789";
		$l = strlen($letras);
		//$n=strlen($numeros);
		$j = 0; $k = 0;
		$num = strlen($password);
		$final = "";
		$letrasTemp = "";
		for ($i = 0; $i < $num; $i++) { 
			# Obetenemos la posicion en la caden $letras
			$pos = strpos($letras, $password[$i]);
			# contamos el numero de caracteres de la misma posicion
			$lenPos = strlen($pos);
			# Convertimos la posicion de int a String
			$pos.="";
			if ($lenPos > 1) {
				for ($r = 0; $r < 2; $r++) { 
			    	 $letrasTemp.=$letras[$pos[$r]];
				}
			}else{
				$letrasTemp.="&".$password[$i];
			}
			$final.=$letrasTemp.$pos."";
			$letrasTemp="";	
		}
		return $final;
	}
	//echo encriptar("");

 	
 ?>