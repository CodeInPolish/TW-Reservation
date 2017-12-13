<?php
//Shows a summary of the reservation

$CurrentReservation = unserialize($_SESSION['reservation']);

require "SummaryView.php";
?>