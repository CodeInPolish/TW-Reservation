<HTML5>
<!--
/*
Created and edited by 
Krasowski Marcin
13169
*/
-->

<HEAD>
<title>ECAM AIRLINES</title>
</HEAD> 

<BODY>
<?php 
echo $CurrentReservation->GetBasics();

$TravalerArray = $CurrentReservation->GetTravelers();

echo "<br>";

foreach($TravalerArray as $traveler)
{
    echo $traveler->GetPrettyInfo()."<br><br>";
    
}

?>

<form action=/TW-Reservation/router.php?page=AddTravelerInfo method="POST">

    <div class="button">
        <button type="submit">Valider</button>
        <button type="submit" name="back" formaction="/TW-Reservation/router.php?page=AddTravelerInfo">Retour</button> 
        <button type="submit" formaction="/TW-Reservation/router.php?page=unset">Annuler la réservation</button>
    </div>

    
</BODY>

</HTML5>