<?php
require "../../class/appelles.php";
if(isset($_POST["resultat"]))
{
	$resultat_communication=new Appelle();
	echo $resultat_communication->libelle_resultat($_POST["resultat"]);
}