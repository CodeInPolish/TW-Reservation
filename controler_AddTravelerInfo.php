<?php

if($CurrentReservation->CheckGotAllTravelersInfo())
{
    //aller à la page récapitulative
    require "TestView.php";
}
else
{
    //remettre la page avec ajout d'infos

    if( !empty($_POST['Firstname']) & !empty($_POST['Lastname']) & !empty($_POST['Age']) )
    {
        /*
       $Traveler = new Person();
       $Firstname = $_POST['Firstname'];
       $Lastname = $_POST['Lastname'];
       $Age = $_POST['Age'];
    
       $Traveler->SetAllVars($Firstname, $Lastname, $Age);
        */
        $Traveler = 1;
       $CurrentReservation->AddTravelerInfo($Traveler);
    }

    require "AddTravelerInfoView.php";
}

?>