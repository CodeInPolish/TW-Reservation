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
<h1>Reservation</h1>
<div>
Le prix d'une place est de 10€ pour les moins de 12 ans </br>
Le prix d'une place est de 15€ pour les plus de 12 ans </br>

Le prix de l'assurance annulation est de 20€ quel que soit le nombre de voyageurs
</div>

<form action=/TW-Reservation/router.php?page=BasicInfo method="POST">
		<div>
            <select name="Destination">
            <?php
            $output = "";
            foreach($CurrentReservation->GetDestList() as $value)
                {
                    $output = $output."<option>".$value;
                }
            echo $output;
            ?>            
            </select>
			<label>Nombre de places :</label>
			<input type="number" name="TravelerNumber"/>
            <label>Assurance annulation :</label>
            <input type="checkbox" name="Insurance"/>
		</div>
		
		<div class="button">
			<button type="submit">Passer à l'étape suivante</button>
            <button type="reset">Annuler la réservation</button>
		</div>
</form>

</BODY>

</HTML5>