<?php 
	/**
	 * 
	 * by Isai Aleman Calderon
	 */
	if (@$_GET['code']!="") {
		echo desencriptar(@$_GET['code']);
	}
	function desencriptar($password){
		$letras="ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz0123456789_.,*@";
		$lenFinal=strlen($password);
		$encriptacion=$password;
		//echo "<br>Encripcion terminda";
	    //echo "<br>Separando encriptacion<br>";
	    $final="";
	    $tmp="";
	    $posChar="";
	    for ($i=0; $i < $lenFinal; $i++) { 
	    	//echo "valor de $i: ".$i."<br>";
	    	if($encriptacion[$i]=='&'){
	        	//echo "valor &: $i <br>";
	        	$tmp=$encriptacion[$i].$encriptacion[$i+1].$encriptacion[$i+2];
	        	$i=$i+2;
	        	$final.=$tmp[1];

	        }else{
	        	$tmp=$encriptacion[$i].$encriptacion[$i+1].$encriptacion[$i+2].$encriptacion[$i+3];
	    		$i=$i+3;
	    		$posChar=strpos($letras,$tmp[0]);
	    		$posChar.=strpos($letras, $tmp[1]);
	        	//echo $posChar;
	        	$final.=$letras[$posChar];
	        }
	       
		}
		return $final;
	}
   
 ?>