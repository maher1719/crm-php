<?php
session_start();
require "../../class/appelles.php";
$id=$_SESSION['id'];

$appelles=new Appelle();
$select_appel="";
//hello all
//this is life
if(isset($_GET["id_appel"]))
{
	$select_appel="where appel.id=".$_GET["id_appel"];
}
$liste_appelles=$appelles->afficher_appelle('appel.*,prospect.nom as nom_prospect,appel.id as appel_id,CONCAT(contact.nom," ",contact.prenom)  as nom_contact,resultat.libelle as resultat_libelle ',' inner join utilisateur on appel.user_id = utilisateur.id and appel.user_id = '.$id.' inner join resultat on appel.resultat=resultat.id inner join prospect on appel.id_prospect = prospect.id inner join contact on contact.id=appel.id_contact '.$select_appel);
echo json_encode($liste_appelles);