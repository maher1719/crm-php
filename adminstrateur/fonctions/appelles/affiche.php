<?php
session_start();
require "../../../class/appelles.php";

$appelles=new Appelle();
$liste_appelles=$appelles->afficher_appelle('appel.*,prospect.nom as nom_prospect,appel.id as appel_id,CONCAT(contact.nom," ",contact.prenom)  as nom_contact,resultat.libelle as resultat_libelle,CONCAT(utilisateur.nom," ",utilisateur.prenom) as nom_utilisateur ',' inner join utilisateur on appel.user_id = utilisateur.id inner join resultat on appel.resultat=resultat.id inner join prospect on appel.id_prospect = prospect.id inner join contact on contact.id=appel.id_contact ');
echo json_encode($liste_appelles);