<?php

$CurrentReservation = unserialize($_SESSION['reservation']);

$total = 0;

$Travelers = $CurrentReservation->GetTravelers();

foreach($Travelers as $traveler)
{
    if($traveler->GetAge()>12)
    {
        $total = $total + 15;
    }
    else
    {
        $total = $total + 10;
    }
}

if($CurrentReservation->CheckInsurance() == TRUE)
{
    $total = $total + 20;
}

require "PaymentView.php";
?>