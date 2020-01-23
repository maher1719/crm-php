<?php
session_start();
$id=$_SESSION["id"];
require "../../class/rdv.php";
$select="";
if(isset($_GET["id"]))
{
	$select=" where rdv.id=".$_GET["id"];
}

$appelles=new rdv();
$liste_rdv=$appelles->afficher_rdv('rdv.*,resultat.libelle, CONCAT(contact.prenom," ",contact.nom) as nom_contact, prospect.nom as nom_prospect',' inner join utilisateur on rdv.user_id = utilisateur.id and rdv.user_id='.$id.' inner join resultat on rdv.resultat=resultat.id inner join prospect on prospect.id=rdv.id_prospect inner join contact on contact.id=rdv.id_contact '.$select);
echo json_encode($liste_rdv);