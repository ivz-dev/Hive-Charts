<?php

class SensorModel
{
    public $type;
    public $date1;
    public $date2;
    public $dbObject;


    function __construct($type,$date1,$date2,$dbObject)
    {
        $this->type = $type;
        $this->date1 = $date1;
        $this->date2 = $date2;
        $this->dbObject = $dbObject;
    }

    public function getSensorsValue()
    {
        $rangeQuery = "SELECT `value`, `date` FROM $this->type WHERE `date`>=:date1 && `date`<=:date2";
        $select = $this->dbObject->prepare($rangeQuery);
        $select->bindParam(":date1", $this->date1);
        $select->bindParam(":date2", $this->date2);
        $select->execute();
        $result = $select->fetchAll(PDO::FETCH_ASSOC);

        if(!$result){
            return false;
        }

        $returnArr = [];
        foreach ($result as $item)
        {
            $datetime = new DateTime($item['date']);
            $date = $item['date'];
            $year = $datetime->format("Y");
            $month = $datetime->format("m");
            $day = $datetime->format("d");

            $hour = $datetime->format("H");
            $minute = $datetime->format("i");

            $val = $item['value'];

            $returnArr[] = [
                "date"=>$date,
                "year"=>$year,
                "month"=>$month,
                "day"=>$day,
                "hour"=>$hour,
                "minute"=>$minute,
                "val"=>$val
            ];
        }

        return json_encode($returnArr);
    }
}