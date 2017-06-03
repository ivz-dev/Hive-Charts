<?php
require_once("../config/db.php");
require_once("../models/SensorModel.php");

if(isset($_GET['type']) && isset($_GET['date1']))
{
    $type = $_GET['type'];
    $date1 = $_GET['date1'];
    isset($_GET['date2']) ? $date2 = $_GET['date2'] : $date2 = date("Y-m-d H:i:s");

    $sensor = new SensorModel($type, $date1, $date2, $dbh);
    $data = $sensor->getSensorsValue();

    if($data){
        echo $data;
    }
}