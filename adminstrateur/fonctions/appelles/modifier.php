<?php
require "../../../class/connexion.php";
require "../../../class/appelles.php";
require "../../../class/contact.php";
if(isset($_POST["id"])&&isset($_POST["user_id"])&&isset($_POST["commentaire"])&&isset($_POST["date"])&&isset($_POST["id_contact"])&&isset($_POST["commentaire"])&&isset($_POST["resultat"]))
{	
	$appel=new Appelle();
	$id_contact=$_POST["id_contact"];
	$appel->id=$_POST["id"];
	$appel->user_id=$_POST["user_id"];
	//$id_prospect=$_POST["id_prospect"];
	$appel->commentaire=$_POST["commentaire"];
	$appel->date=$_POST["date"];
	$appel->resultat=$_POST["resultat"];
	$appel->id_contact=$_POST["id_contact"];
	$prospect=new Contact();
	$appel->id_prospect=$prospect->select_prospect($id_contact);
	$appel->modifier_appel();
	echo json_encode(array('resultat' =>'true'));
}
else
{
	echo json_encode(array('resultat' =>'pas enregistrer'));
	print_r($_POST);
}
