<?php

$CurrentReservation = unserialize($_SESSION['reservation']);

if( !empty($_POST['Firstname']) & !empty($_POST['Lastname']) & !empty($_POST['Age']) )
{
    
    $Traveler = new Person();
    $Firstname = $_POST['Firstname'];
    $Lastname = $_POST['Lastname'];
    $Age = $_POST['Age'];
    
    $Traveler->SetAllVars($Firstname, $Lastname, $Age);

    $CurrentReservation->AddTravelerInfo($Traveler);

    $_SESSION['reservation'] = serialize($CurrentReservation);
}

if($CurrentReservation->CheckGotAllTravelersInfo())
{
    //aller à la page récapitulative
    require "controler_Confirmation.php";
}
else
{
    //remettre la page avec ajout d'infos
    require "AddTravelerInfoView.php";
}

?>