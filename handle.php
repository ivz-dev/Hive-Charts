<?php
require_once("config/db.php");
if(!empty($_GET['type']) && !empty($_GET['date1']) && !empty($_GET['date2']))
{
    $type = $_GET['type'];
    $date1 = $_GET['date1'];
    $date2 = $_GET['date2'];

    switch ($type){
        case "temp":
            $select = $dbh->prepare("SELECT `value`, `date` FROM `temp` WHERE `date`>=:date1 && `date`<=:date2");
            $select->bindParam(":date1", $date1);
            $select->bindParam(":date2", $date2);
            $select->execute();
            $result = $select->fetchAll(PDO::FETCH_ASSOC);

            $returnArr = [];

            foreach ($result as $item)
            {
                $date = explode(" ",$item['date'])[0];
                $year = explode("-",$date)[0];
                $month = explode("-",$date)[1];
                $day = explode("-",$date)[2];

                $time = explode(" ",$item['date'])[1];
                $hour = explode(":",$time)[0];
                $minute = explode(":",$time)[1];

                $val = $item['value'];

                $returnArr[] = array("date"=>$item['date'],"year"=>$year, "month"=>$month, "day"=>$day, "hour"=>$hour, "minute"=>$minute, "val"=>$val);
            }

            echo json_encode($returnArr);
            break;
        case "humidity":
            $select = $dbh->prepare("SELECT `value`, `date` FROM `humidity` WHERE `date`>=:date1 && `date`<=:date2");
            $select->bindParam(":date1", $date1);
            $select->bindParam(":date2", $date2);
            $select->execute();
            $result = $select->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
            break;
        case "weight":
            $select = $dbh->prepare("SELECT `value`, `date` FROM `weight` WHERE `date`>=:date1 && `date`<=:date2");
            $select->bindParam(":date1", $date1);
            $select->bindParam(":date2", $date2);
            $select->execute();
            $result = $select->fetchAll(PDO::FETCH_ASSOC);

            $returnArr = [];

            foreach ($result as $item)
            {
                $date = explode(" ",$item['date'])[0];
                $year = explode("-",$date)[0];
                $month = explode("-",$date)[1];
                $day = explode("-",$date)[2];

                $time = explode(" ",$item['date'])[1];
                $hour = explode(":",$time)[0];
                $minute = explode(":",$time)[1];

                $val = $item['value'];

                $returnArr[] = array("date"=>$item['date'],"year"=>$year, "month"=>$month, "day"=>$day, "hour"=>$hour, "minute"=>$minute, "val"=>$val);
            }

            echo json_encode($returnArr);
            break;
        case "pressure":
            $select = $dbh->prepare("SELECT `value`, `date` FROM `pressure` WHERE `date`>=:date1 && `date`<=:date2");
            $select->bindParam(":date1", $date1);
            $select->bindParam(":date2", $date2);
            $select->execute();
            $result = $select->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
            break;

    }







}


