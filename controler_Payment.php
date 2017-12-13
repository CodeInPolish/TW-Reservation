<?php
//Shows the total to be paid by the user for his reservation

$CurrentReservation = unserialize($_SESSION['reservation']);

$total = 0;

$Travelers = $CurrentReservation->GetTravelers();

//15€ = price of ticket for a person that is older than 12 years old
//10€ = price of ticket for a person that is younger than 12 years old
//20€ = price of insurance

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