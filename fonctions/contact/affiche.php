<?php
session_start();
require "../../class/contact.php";
$contacts=new Contact();
$id=$_SESSION['id'];
$select="";
if(isset($_GET["id"]))
{
	$select=" where contact.id=".$_GET["id"];
}
$table_contacts=$contacts->afficher_contact('distinct contact.*,CONCAT(contact.nom," ",contact.prenom) as nom_contact,prospect.nom as nom_prospect,prospect.id as id_prospect',' inner join utilisateur on id_utilisateur= '. $id .' and id_utilisateur=utilisateur.id and id_utilisateur='.$_SESSION["id"].' inner join prospect on id_prospect=prospect.id '.$select);
echo json_encode($table_contacts);