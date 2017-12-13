<?php

$CurrentReservation = unserialize($_SESSION['reservation']);

if(isset($_SESSION['TravelerIndex']))
{
    $currentIndex = unserialize($_SESSION['TravelerIndex']);
}
else
{
    $currentIndex = 0;
}

if(isset($_SESSION['maxAge']))
{
    $maxAge = unserialize($_SESSION['maxAge']);
}
else
{
    $maxAge = 0;
}

if(isset($_POST['back']))
{
    if($currentIndex>0)
    {
        $currentIndex = $currentIndex-1;
        $_SESSION['TravelerIndex'] = serialize($currentIndex);
    }
    unset($_POST['back']);
    unset($_POST['Firstname']);
    unset($_POST['Lastname']);
    unset($_POST['Age']);
}

if( !empty($_POST['Firstname']) & !empty($_POST['Lastname']) & !empty($_POST['Age']) )
{
    
    $Traveler = new Person();
    $Firstname = htmlspecialchars($_POST['Firstname']);
    $Lastname = htmlspecialchars($_POST['Lastname']);
    $Age = intval(htmlspecialchars($_POST['Age']));
    
    $Traveler->SetAllVars($Firstname, $Lastname, $Age);
    $maxAge = max($maxAge, $Age);

    $CurrentReservation->AddTravelerInfoByIndex($Traveler, $currentIndex);

    $currentIndex = $currentIndex + 1;

    $_SESSION['reservation'] = serialize($CurrentReservation);
    $_SESSION['TravelerIndex'] = serialize($currentIndex);
    $_SESSION['maxAge'] = serialize($maxAge);
}

if($CurrentReservation->GetTravelersNumber() == $currentIndex)
{
    //aller à la page récapitulative
    require "controler_Summary.php";
}
else
{
    $Travelers = $CurrentReservation->GetTravelers();
    
    if(isset($Travelers[$currentIndex]))
    {
        $PreviousTraveler = $Travelers[$currentIndex];
    }
    else
    {
        unset($PreviousTraveler);
    }
    
    require "AddTravelerInfoView.php";
}

?>