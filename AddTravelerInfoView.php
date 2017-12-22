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

<h1>Passenger <?php echo $currentIndex+1;?> information</h1>

<?php
if(isset($maxAge))
{
    if($maxAge < 18)
    {
        echo "Attention! Au moins une personne doit être majeure.<br><br>";
    }
}
?>

<form action=/TW-Reservation/router.php?page=AddTravelerInfo method="POST">
    <label>Prénom :</label>
    <input type="text" name="Firstname" value="<?php if(isset($PreviousTraveler)){echo $PreviousTraveler->GetFirstName();}?>"/>
    <label>Nom :</label>
    <input type="text" name="Lastname" value="<?php if(isset($PreviousTraveler)){echo $PreviousTraveler->GetLastName();}?>"/>
    <label>Age :</label>
    <input type="number" name="Age" value="<?php if(isset($PreviousTraveler)){echo $PreviousTraveler->GetAge();}?>"/>

    <div class="button">
        <button type="submit">Valider passager</button>
        <button type="submit" name="back">Retour</button>
        <button type="submit" formaction="/TW-Reservation/router.php?page=unset">Annuler la réservation</button>
    </div>
    
</form>
</BODY>

</HTML5>