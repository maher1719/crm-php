<?php
session_start();
require "../../../class/prospect.php";
$prospet=new prospect();
$id=$_SESSION['id'];
$select_prospet="";
if(isset($_GET['id']))
{
	$select_prospet=" where prospect.id=".$_GET['id'];
}
$table_prospects=$prospet->affiche_prospect('distinct prospect.*,CONCAT(utilisateur.nom," ",utilisateur.prenom) as nom_utilisateur',' inner join utilisateur on user_creature=utilisateur.id'.$select_prospet);
echo json_encode($table_prospects);