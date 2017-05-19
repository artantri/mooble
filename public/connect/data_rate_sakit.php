
<?php
session_start();
require_once('connect.php');

$bagTubuh = $_SESSION["bagTubuh"];

$idPasien = $_SESSION["idPasien"];

//ga bisa
//if(isset($_SESSION['bagTubuh']) && !empty($_SESSION['bagTubuh'])) {
//    $bagTubuh = $_SESSION["bagTubuh"];
//    $_SESSION["bagTubuh"] = null;
//}
//else{
//    $bagTubuh = "kepala";
//}


$sql = "SELECT health_profile.pain_rate as pain, health_profile.timestamp as time, body_part.name as name FROM ((`health_profile` INNER JOIN body_part on health_profile.body_id = body_part.body_id) INNER JOIN patient on health_profile.patient_id = patient.patient_id) WHERE patient.patient_id = '$idPasien' AND body_part.name = 'gigi' ORDER BY health_profile.timestamp;";

$query = mysqli_query($connection, $sql);


while($result = mysqli_fetch_array($query))
{
    $timestamp = strtotime($result['time']. "-5hours") * 1000;
    $data[] = array($timestamp, (int)$result['pain']);
}


echo json_encode($data, JSON_NUMERIC_CHECK);
?>













