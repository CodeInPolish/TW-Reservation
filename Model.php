<?php

class Reservation
{
    private $TravelerNumber = 0;
    private $Destination = "";
    private $Insurance = FALSE;
    private $DestList = array("Bruxelles","Paris","Monaco","Tokyo","Istanbul","Corfu");
    private $TravelerList = [];

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

    public function AddTravelerInfo($traveler)
    {
        $this->TravelerList[] = $traveler;
    }

    public function GetTravelers()
    {
        return $this->TravelerList;
    }

    public function GetDestList()
    {
        return $this->DestList;
    }

    public function CheckGotAllTravelersInfo()
    {
        /*
        if($this->TravelerNumber > count($this->TravelerList))
            return FALSE;
        else
            return TRUE;
            */
        return FALSE;
    }
}

class Person
{
    private $FirstName = "";
    private $LastName = "";
    private $Age = 0;

    public function SetFirstName($firstname)
    {
        $this->FirstName = $firstname;
    }

    public function SetLastName($lastname)
    {
        $this->LastName = $lastname;
    }

    public function SetAge($age)
    {
        $this->Age = $age;
    }

    public function SetAllVars($firstname, $lastname, $age)
    {
        $this->SetFirstName($firstname);
        $this->SetLastName($lastname);
        $this->SetAge($age);
    }

    public function GetInfo()
    {
        $ageString = "".$this->Age;
        return array($this->$FirstName, $this->$LastName, $ageString);
    }
}
?>