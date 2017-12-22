<?php

$CurrentReservation = unserialize($_SESSION['reservation']);

//if the index is not set in the session variables, set it at 0
//if the index is set in the session variable, unserialize it
if(isset($_SESSION['TravelerIndex']))
{
    $currentIndex = unserialize($_SESSION['TravelerIndex']);
}
else
{
    $currentIndex = 0;
}


//if the user click on the 'back' button
if(isset($_POST['back']))
{
    //check if current index is greater than 0
    //if it is, currentIndex-- (we want to go back)
    //then unset all the POSTS
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

//Managing POSTS, adding/modifying a traveler
if( !empty($_POST['Firstname']) & !empty($_POST['Lastname']) & !empty($_POST['Age']) )
{
    //creating a new Person from POSTS input
    $Traveler = new Person();
    $Firstname = htmlspecialchars($_POST['Firstname']);
    $Lastname = htmlspecialchars($_POST['Lastname']);
    $Age = intval(htmlspecialchars($_POST['Age']));
    
    $Traveler->SetAllVars($Firstname, $Lastname, $Age);

    //if maxAge is still not set, set it to 0
    //maxAge is set here to not display an error when there is no travelers added yet

    //taking the max between $maxAge and $Age. $maxAge is the previous max
    //$Age is the age of the currently added/modified person

    $CurrentReservation->AddTravelerInfoByIndex($Traveler, $currentIndex);

    //we just added a person so we increment the index
    $currentIndex = $currentIndex + 1;

    $_SESSION['reservation'] = serialize($CurrentReservation);
    $_SESSION['TravelerIndex'] = serialize($currentIndex);
}

//Retrieving the max age of the travelers
$travelers = $CurrentReservation->GetTravelers();

if(count($travelers)>0)
{
    $maxAge = 0;
    foreach($travelers as $traveler)
    {
        $maxAge = max($traveler->GetAge(), $maxAge);
    }
}

//if the currentIndex is equal to the number of the travelers in the reservation =>show summary
//otherwise, keep adding/modifying the travelers
if($CurrentReservation->GetTravelersNumber() == $currentIndex)
{
    if($maxAge>17)
        require "controler_Summary.php";
    else
    {
        $currentIndex = $currentIndex - 1;
        $_SESSION['TravelerIndex'] = serialize($currentIndex);
        $Travelers = $CurrentReservation->GetTravelers();
        $PreviousTraveler = $Travelers[$currentIndex];
        require "AddTravelerInfoView.php";
    }
        
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