<?php

class Reservation
{
    private $TravelerNumber = 0;
    private $Destination = "";
    private $Insurance = FALSE;
    private $DestList = array("Bruxelles","Paris","Monaco","Tokyo","Istanbul","Corfu");

    public function SetBasics($TravelerNumber, $Destination, $Insurance)
    {
        $this->TravelerNumber = $TravelerNumber;
        $this->Destination = $Destination;
        $this->Insurance = $Insurance;
    }

    public function GetBasics()
    {
        $PrintBool = $this->Insurance ? "TRUE" : "FALSE";
      
        return "Nombre de voyageurs: ".$this->TravelerNumber."<br>".
                "Destination: ".$this->Destination."<br>".
                "Assurance: ".$PrintBool;
    }

    public function GetDestList()
    {
        return $this->DestList;
    }
}
?>