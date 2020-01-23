<?php
session_start();
require "../class/rdv.php";
$id=$_SESSION['id'];
$rdv_contact=new rdv();
$liste_rdv=$rdv_contact->afficher_rdv(" CONCAT('rdv avec ',contact.nom,' ',contact.prenom) as title,rdv.date_rdv as start, CONCAT('à ',rdv.lieu_rdv) as description"," inner join contact on rdv.id_contact=contact.id inner join utilisateur on rdv.user_id=".$id." and rdv.user_id=utilisateur.id");
//print_r($liste_rdv);

echo json_encode($liste_rdv);