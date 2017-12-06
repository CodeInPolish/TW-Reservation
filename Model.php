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

    public function DeleteLastTraveler()
    {
        return array_splice($this->TravelerArray, -1);
    }

    public function CheckDestination($destination)
    {
        return in_array($destination, $this->DestList);
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

    public function GetFirstName()
    {
        return $this->FirstName;
    }

    public function SetLastName($lastname)
    {
        $this->LastName = $lastname;
    }

    public function GetLastName()
    {
        return $this->LastName;
    }

    public function SetAge($age)
    {
        $this->Age = $age;
    }

    public function GetAge()
    {
        return $this->Age;
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

class ShowError
{
    private $TravelerNumberError = TRUE;
    private $DestinationError = TRUE;

    public function BuildErrorMessage()
    {
        $string = "";
        
        if($this->TravelerNumberError)
        {
            $string = $string.$this->SpaceoutMessages("Veuillez entrer un nombre entre 1 et 10");
        }
        
        if($this->DestinationError)
        {
            $string = $string.$this->SpaceoutMessages("Veuillez sélectionner une destination valide");
        }
        
        return $string;
    }

    private function SpaceoutMessages($message)
    {
        return "<br>".$message."<br>";
    }

    public function ResetTravelerNumberError()
    {
        $this->TravelerNumberError = FALSE;
    }

    public function ResetDestinationError()
    {
        $this->DestinationError = FALSE;
    }

    private function SetErrors()
    {
        $this->DestinationError = TRUE;
        $this->TravelerNumberError = TRUE;
    }

    public function CheckIfErrors()
    {
        if($this->DestinationError or $this->TravelerNumberError)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
}
?>