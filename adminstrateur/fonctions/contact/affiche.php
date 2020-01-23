<?php
session_start();
require "../../../class/contact.php";
$contacts=new Contact();
$select="";
if(isset($_GET["id"]))
{
	$select=" where contact.id=".$_GET["id"];
}
$table_contacts=$contacts->afficher_contact('contact.*,CONCAT(contact.nom," ",contact.prenom) as nom_contact,prospect.nom as nom_prospect,prospect.id as id_prospect,CONCAT(utilisateur.nom," ",utilisateur.prenom) as nom_utilisateur',' inner join utilisateur on contact.id_utilisateur=utilisateur.id inner join prospect on contact.id_prospect=prospect.id '.$select);
echo json_encode($table_contacts);