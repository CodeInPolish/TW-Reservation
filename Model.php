<?php

class Reservation
{
    private $TravelerNumber = 0;
    private $Destination = "";
    private $Insurance = FALSE;
    private $DestList = array("Bruxelles","Paris","Monaco","Tokyo","Istanbul","Corfu");
    private $TravelerArray = array();

    public function SetBasics($TravelerNumber, $Destination, $Insurance)
    {
        $this->TravelerNumber = $TravelerNumber;
        $this->Destination = $Destination;
        $this->Insurance = $Insurance;
    }

    public function GetBasics()
    {
        $PrintBool = $this->Insurance ? "TRUE" : "FALSE";
      
        return "Destination: ".$this->Destination."<br>".
                "Nombre de voyageurs: ".$this->TravelerNumber."<br>".                
                "Assurance: ".$PrintBool;
    }

    public function AddTravelerInfo($traveler)
    {
        $this->TravelerArray[] = $traveler;
    }

    public function GetTravelers()
    {
        return $this->TravelerArray;
    }

    public function CountTravelers()
    {
        return count($this->TravelerArray);
    }

    public function GetTravelersNumber()
    {
        return $this->TravelerNumber;
    }

    public function GetDestList()
    {
        return $this->DestList;
    }

    public function CheckGotAllTravelersInfo()
    {
        if($this->TravelerNumber > $this->CountTravelers())
        {
            return FALSE;
        }
        else
        {
            return TRUE; 
        }     
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

    public function GetPrettyInfo()
    {
        $ageString = "".$this->Age;

        return "Nom: ".$this->LastName."<br>".
                "Prénom: ".$this->FirstName."<br>".
                "Age: ".$ageString;
    }
}
?>