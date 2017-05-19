<?php
session_start();
require_once('connect.php');

$idPasien = $_SESSION["idPasien"];



$sql ="SELECT sensor.heart_rate as HR, sensor.timestamp as time FROM `sensor` INNER JOIN patient on patient.patient_id = sensor.patient_id WHERE patient.patient_id = '$idPasien' ORDER BY sensor.timestamp"; 


$query = mysqli_query($connection, $sql);


while($result = mysqli_fetch_array($query))
{
    $timestamp = strtotime($result['time']. "-6hours") * 1000;
    $data[] = array($timestamp, (int)$result['HR']);
}

echo json_encode($data, JSON_NUMERIC_CHECK);
?>











