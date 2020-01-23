<?php
require "../../../class/contact.php";
if(isset($_POST["user_id"])&&isset($_POST["email"])&&isset($_POST["email"])&&isset($_POST["nom"])&&isset($_POST["prenom"])&&isset($_POST["tel"])&&isset($_POST["post"])&&isset($_POST["prospect"]))
{
	$contact=new Contact();
	$contact->id_utilisateur=$_POST["user_id"];
	$contact->nom=$_POST["nom"];
	$contact->prenom=$_POST["prenom"];
	$contact->tel=$_POST["tel"];
	$contact->post=$_POST["post"];
	$contact->id_prospect=$_POST["prospect"];
	$contact->email=$_POST["email"];	
	$contact->ajouter_contact();
}