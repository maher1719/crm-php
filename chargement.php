<?php
session_start();
require "class/utilisateur.php";
$_SESSION["id"]=$_GET['id'];
$user=new utilisateur();
$utilisateur=$user->Affiche_utilisteur('CONCAT(utilisateur.nom," ",utilisateur.prenom) as nom_utilisateur ,utilisateur.image as image_utilisateur,images.image as image_anonyme,etat','inner join images where utilisateur.id='.$_GET['id']);
$_SESSION["type_utilisateur"]=$utilisateur[0]["etat"];
$_SESSION["utilisateur"]=$utilisateur[0]['nom_utilisateur'];
if($utilisateur[0]['image_utilisateur']!=NULL)
{
	$image=$utilisateur[0]['image_utilisateur'];
}
else
{
	$image=$utilisateur[0]['image_anonyme'];
}
$_SESSION["image_160"]='<img class="img-circle" title="'.$_SESSION["utilisateur"].'" alt="'.$_SESSION["utilisateur"].'" src="data:image/png;base64,'.base64_encode($image).'">';
if($_SESSION["type_utilisateur"]=="admin")
{
	header("location:adminstrateur/accueil.php");
}
else
{
	header('location:accueil.php');
}