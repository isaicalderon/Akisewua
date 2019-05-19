<?php
	# Algoritmo por Isai aleman Calderon
	date_default_timezone_set('America/Tijuana');
	$dia = date('l');
	$numdia = date('d');
	$mes = date('F');
	$año = date('Y');
	$horas = date('h:i:s a');
	$nummes = date('F');
	//$fechausuario=$numdia."/".$nummes."/".$año;
	# Cambiaremos el dia y el mes del ingles al español con un switch
	switch ($dia) {
		case 'Sunday':   $dia="Domingo";break;
		case 'Monday':   $dia="Lunes";break;
		case 'Tuesday':  $dia="Martes";break;	
		case 'Wednesday':$dia="Miercoles";break;
		case 'Thursday': $dia="Jueves";break;
		case 'Friday':   $dia="Viernes";break;
		case 'Saturday': $dia="Sabado";break;
	}
	switch ($mes) {
		case 'January':$mes="Enero";break;
		case 'February':$mes="Febrero";break;
		case 'March':$mes="Marzo";break;
		case 'April':$mes="Abril";break;
		case 'May':$mes="Mayo";break;
		case 'June':$mes="Junio";break;
		case 'July':$mes="Julio";break;
		case 'August':$mes="Agosto";break;
		case 'September':$mes="Septiembre";break;
		case 'October':$mes="Octubre";break;
		case 'November':$mes="Noviembre";break;
		case 'December':$mes="Diciembre";break;
	}
	switch ($nummes) {
		case 'January':$nummes="01";break;
		case 'February':$nummes="02";break;
		case 'March':$nummes="03";break;
		case 'April':$nummes="04";break;
		case 'May':$nummes="05";break;
		case 'June':$nummes="06";break;
		case 'July':$nummes="07";break;
		case 'August':$nummes="08";break;
		case 'September':$nummes="09";break;
		case 'October':$nummes="10";break;
		case 'November':$nummes="11";break;
		case 'December':$nummes="12";break;
	}
	$fechafinal= $dia." ".$numdia." de ".$mes." de ".$año." a las ".$horas;
	$fechausuario = $año."-".$nummes."-".$numdia;

	//echo $fechafinal;
	//echo "<br>".$fechausuario;

?>

