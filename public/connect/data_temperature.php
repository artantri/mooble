<?php
session_start();
require_once('connect.php');

$idPasien = $_SESSION["idPasien"];


$sql ="SELECT sensor.temperature as temp, sensor.timestamp as time FROM `sensor` INNER JOIN patient on patient.patient_id = sensor.patient_id WHERE patient.patient_id = '$idPasien' ORDER BY sensor.timestamp"; 


$query = mysqli_query($connection, $sql);

while($result = mysqli_fetch_array($query))
{
    $timestamp = strtotime($result['time']. "-6hours") * 1000;
    $r = (int)$result['temp'];
    $data[] = array($timestamp, (float)$result['temp']);
}

echo json_encode($data);
?>











