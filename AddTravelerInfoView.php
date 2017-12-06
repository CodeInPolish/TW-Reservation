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

<h1>Passenger <?php echo ($CurrentReservation->CountTravelers()+1)?> information</h1>
<form action=/TW-Reservation/router.php?page=AddTravelerInfo method="POST">
    <label>Prénom :</label>
    <input type="text" name="Firstname"/>
    <label>Nom :</label>
    <input type="text" name="Lastname"/>
    <label>Age :</label>
    <input type="number" name="Age"/>

    <div class="button">
        <button type="submit">Valider passager</button>
        <button type="submit" formaction="/TW-Reservation/router.php?page=unset">Annuler la réservation</button>
    </div>
</form>

</BODY>

</HTML5>