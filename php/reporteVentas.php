<?php 

	$opcion = $_POST['opt'];
	$fecha = $_POST['fecha'];

	if ($opcion == 1) {
		//$date = new DateTime($fecha);
		//$fecha = $date->format('d/m/Y');
		$q = "AND Fecha_final = '$fecha' ";
		header("Location: ../admin.php?rep=1&data=".$opcion."&value=".$fecha."&date=".$q);
	}
	
	if ($opcion == 2) {
		$date = new DateTime($fecha);
	 	$fecha2 = $date->format('Y-m-d');
		$tmp = lastDay($fecha2);
	 	$fechaf = $fecha."-".$tmp;
		$q = "AND Fecha_final BETWEEN '$fecha2' AND '$fechaf' ";
		$tmp = getMes($fecha);
		header("Location: ../admin.php?rep=1&data=".$opcion."&value=".$tmp."&date=".$q);
	}

	if ($opcion == 3) {
		$fechatmp1 = $fecha."-01-01";
		$fechatmp2 = $fecha."-12-31";
		$q = "AND Fecha_final BETWEEN '$fechatmp1' AND '$fechatmp2' ";
		header("Location: ../admin.php?rep=1&data=".$opcion."&value=".$fecha."&date=".$q);
	}
	if ($opcion == 4) {
		header("Location: ../admin.php?rep=1");
	
	}

	function getMes($fecha){
		$tmp = substr($fecha, 5, 2); //mes
		$tmp2 = substr($fecha, 0, 4); // año
		switch ($tmp) {
			case '01':$tmp = "Enero";break;
			case '02':$tmp = "Febrero";break;
			case '03':$tmp = "Marzo";break;
			case '04':$tmp = "Abril";break;
			case '05':$tmp = "Mayo";break;
			case '06':$tmp = "Junio";break;
			case '07':$tmp = "Julio";break;
			case '08':$tmp = "Agosto";break;
			case '09':$tmp = "Septiembre";break;
			case '10':$tmp = "Octubre";break;
			case '11':$tmp = "Noviembre";break;
			case '12':$tmp = "Diciembre";break;
		}
		return $tmp." De ".$tmp2;
	}

 	function lastDay($fecha){
 		$tmp = substr($fecha, 5, 2);
 		$dia = "";
 		switch ($tmp) {
 			case '01':
 			case '03':
 			case '05':
			case '07':
			case '08':
			case '10':
			case '12':
				$dia="31";
 			break;
 			case '02':
 				$dia = "28";
 				break;
			case '04':
			case '06':
			case '09':
			case '11':
				$dia = "30";
				break;
 		}
 		return $dia;
 	}

 ?>