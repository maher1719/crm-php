<?php
require "../../../class/connexion.php";
require "../../../class/rdv.php";
require "../../../class/contact.php";
require "../../../class/prospect.php";
if(isset($_POST["user_id"])&&isset($_POST["commentaire"])&&isset($_POST["date"])&&($_POST["date_rdv"])&&isset($_POST["id_contact"])&&isset($_POST["lieu_rdv"])&&isset($_POST["resultat"]))
{
	$rdv=new rdv();
	$prospet=new Contact();
	$rdv->id_prospect=$prospet->select_prospect($_POST["id_contact"]);
	$rdv->user_id=$_POST["user_id"];
	//$id_prospect=$_POST["id_prospect"];
	$rdv->resultat=$_POST["resultat"];
	$rdv->commentaire=$_POST["commentaire"];
	$rdv->date=$_POST["date"];
	$rdv->lieu_rdv=$_POST["lieu_rdv"];
	$rdv->id_contact=$_POST["id_contact"];
	$rdv->date_rdv=$_POST["date_rdv"];
	$rdv->ajouter_rdv();
}
else
{
	print_r($_POST);
}