<?php
session_start();
require "../../class/utilisateur.php";
$id=$_SESSION["id"];
$utilisateur=new utilisateur();
$liste=$utilisateur->Affiche_utilisteur('COUNT(DISTINCT rdv.id) as somme_rdv,COUNT(DISTINCT produit.id) as somme_produit,COUNT(DISTINCT contact.nom) as somme_contact,COUNT(DISTINCT prospect.nom)as somme_prospect,COUNT(DISTINCT appel.commentaire)as somme_appel',' inner join produit inner join rdv on rdv.user_id='.$id.' inner join appel on appel.user_id='.$id.' inner join contact on contact.id_utilisateur='.$id.' inner join prospect on prospect.user_creature='.$id);
echo json_encode($liste);

