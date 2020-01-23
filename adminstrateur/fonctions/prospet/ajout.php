<?php
require '../../class/prospect.php';
if(isset($_POST["user_id"])&&isset($_POST["email"])&&isset($_POST["raison_social"])&&isset($_POST["nom"])&&isset($_POST["date_contrat"])&&isset($_POST["tel"])&&isset($_POST["fax"])&&isset($_POST["domaine"])&&isset($_POST["adresse"]))
{
	$prospet=new prospect();
	$prospet->raison_social=$_POST["raison_social"];
	$prospet->tel=$_POST["tel"];
	$prospet->fax=$_POST["fax"];
	$prospet->email=$_POST["email"];
	$prospet->statu=1;
	$prospet->adresse=$_POST["adresse"];
	$prospet->user_creator=$_POST["user_id"];
	$prospet->date_contrat=$_POST["date_contrat"];
	$prospet->domaine=$_POST["domaine"];	
	$prospet->nom=$_POST["nom"];
	$prospet->ajouter_prospect();
	echo json_encode(array("ajout"=>"true"));
}
else
{
	echo json_encode(print_r($_POST));
}