<?php session_start();
require "../../class/contact.php";
$id=$_SESSION["id"];
$contact= new Contact();
$liste_contact=$contact->afficher_contact("CONCAT(nom,' ',prenom) as nom_contact ",'limit 8');
echo json_encode($liste_contact);