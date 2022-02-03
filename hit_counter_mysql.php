<?php

$user = "juanma-prueba";
$password = "1234";
$database = "juanma";
$table = "contador";

try {
  	$db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);	
	$siteVisitsMap = 'siteStats';
	$visitorHashKey = '';

	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {

           $visitorHashKey = $_SERVER['HTTP_CLIENT_IP'];

        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

           $visitorHashKey = $_SERVER['HTTP_X_FORWARDED_FOR'];

        } else {

           $visitorHashKey = $_SERVER['REMOTE_ADDR'];
        }

        $totalVisits = 0;
	$query = $db->prepare("SELECT ip, visitas_total FROM contador WHERE ip = :dir_ip1");
	$query->bindParam(":dir_ip1",$visitorHashKey);
/*	$query->setFetchMode(PDO::FETCH_ASSOC);*/
	$query->execute();
	$fila = $query->fetch(PDO::FETCH_ASSOC);
	
/*	echo "Tu ip es: ".$visitorHashKey;*/
	if ($fila){
//		$resultado1 = $query->fetch(PDO::FETCH_ASSOC);
		$totalVisits = $fila['visitas_total']+1;
		$sql = "UPDATE contador SET visitas_total = :visitas WHERE ip = :dir_ip";
		echo "Tu IP es ".$visitorHashKey." y el número total de visitas es de: ".$totalVisits.".";
	} else {
		$totalVisits = 1;
		$sql = "INSERT INTO contador (ip, visitas_total) VALUES (:dir_ip,:visitas)";
		echo "IP ".$visitorHashKey." añadida. Total visitas: ".$totalVisits.".";
	}
	$stmt = $db->prepare($sql);
	$stmt->bindParam(":dir_ip",$visitorHashKey);
	$stmt->bindParam(":visitas", $totalVisits);
	$stmt->execute();

} catch (Exception $e) {
	echo $e->getMessage();
}
