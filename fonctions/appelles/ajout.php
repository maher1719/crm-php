<?php
require "../../class/connexion.php";
require "../../class/appelles.php";
require "../../class/contact.php";
if(isset($_POST["user_id"])&&isset($_POST["commentaire"])&&isset($_POST["date"])&&isset($_POST["id_contact"])&&isset($_POST["commentaire"])&&isset($_POST["resultat"]))
{
	$user_id=$_POST["user_id"];
	//$id_prospect=$_POST["id_prospect"];
	$commentaire=$_POST["commentaire"];
	$date=$_POST["date"];
	$resultat=$_POST["resultat"];
	$id_contact=$_POST["id_contact"];
	$prospect=new Contact();
	$id_prospect=$prospect->select_prospect($id_contact);
	$appelles=new Appelle();
	$appelles->user_id=$user_id;
	$appelles->ajouter_appelle($user_id,$id_prospect,$date,$resultat,$commentaire,$id_contact);

	
}
else
{
	echo json_encode(array('resultat' =>'pas enregistrer'));
}
