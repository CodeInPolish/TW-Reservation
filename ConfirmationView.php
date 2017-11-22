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

foreach($TravalerArray as $traveler)
{
    echo $traveler->GetPrettyInfo()."<br><br>";
    
}
?>
</BODY>

</HTML5>