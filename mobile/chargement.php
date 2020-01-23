<?php
session_start();
require "../class/utilisateur.php";
$_SESSION["id"]=$_GET['id'];
$user=new utilisateur();
$utilisateur=$user->Affiche_utilisteur('CONCAT(utilisateur.nom," ",utilisateur.prenom) as nom_utilisateur ,utilisateur.image as image_utilisateur,images.image as image_anonyme','inner join images where utilisateur.id='.$_GET['id']);
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
$_SESSION["image_mobile"]='<img class="demo-avatar" style="width:112px;height:112px;-webkit-border-radius:50%;-moz-border-radius:50%;border-radius: 50%;" title="'.$_SESSION["utilisateur"].'" alt="'.$_SESSION["utilisateur"].'" src="data:image/png;base64,'.base64_encode($image).'">';


header('location: accueil.php');