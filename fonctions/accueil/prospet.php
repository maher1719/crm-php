<?php session_start();
require "../../class/prospect.php";
$id=$_SESSION["id"];
$prospet=new prospect();
$liste_prospect=$prospet->affiche_prospect(" nom "," order by id desc limit 8");
echo json_encode($liste_prospect);