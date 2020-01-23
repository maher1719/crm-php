<?php
require '../../class/utilisateur.php';

$verife=new utilisateur();
if(isset($_POST["login"])&&isset($_POST["password"]))
{
	$verife->login=$_POST["login"];
	$verife->password=$_POST["password"];
	$resultat_id=$verife->connecte();
//echo $verife->id;
	if(!$resultat_id)
	{
		 echo json_encode(array("validation"=>"voulez-vous entrez votre email, ou login et mot de passe correct ?"));
	}
	else
	{
		$resultat = array('validation' =>'true','id'=>$resultat_id );
		echo json_encode($resultat);
	}
}
else
{
	echo json_encode(array("validation"=>"voulez-vous entrez votre email, ou login et mot de passe correct ?"));
}

