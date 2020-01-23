<?php
require '../../class/utilisateur.php';

/**
* 
*/
$inscrit=new utilisateur();
$inscrit->nom=$_POST["nom"];
$inscrit->prenom=$_POST["prenom"];
$inscrit->email=$_POST["email"];
$inscrit->password=$_POST["password"];
$inscrit->login=$_POST["login"];
$inscrit->adresse=$_POST["adresse"];
$inscrit->telephone=$_POST["telephone"];

echo $inscrit->inscription();
