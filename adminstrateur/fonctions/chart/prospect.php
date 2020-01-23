<?php session_start();
require "../../class/prospect.php";
$prospect=new prospect();
$liste_prospect=$prospect->affiche_prospect('COUNT(id) as nombre');
print_r($liste_prospect);