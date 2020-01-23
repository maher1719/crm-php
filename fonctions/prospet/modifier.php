<?php
require "../../class/prospect.php";
if(isset($_POST["id"])&&isset($_POST["user_id"])&&/*isset($_POST["statu"])&&*/isset($_POST["nom"])&&isset($_POST["raison_social"])&&isset($_POST["tel"])&&isset($_POST["fax"])&&isset($_POST["email"])&&isset($_POST["adresse"])&&isset($_POST["date_contrat"])&&isset($_POST["domaine"]))
		{
			$prospet=new prospect();
			$prospet->id=$_POST["id"];
			$prospet->raison_social=$_POST["raison_social"];
			$prospet->tel=$_POST["tel"];
			$prospet->fax=$_POST["fax"];
			$prospet->email=$_POST["email"];
			$prospet->statu=1;
			$prospet->user_creator=$_POST["user_id"];
			$prospet->adresse=$_POST["adresse"];
			$prospet->date_contrat=$_POST["date_contrat"];
			$prospet->domaine=$_POST["domaine"];
			$prospet->nom=$_POST["nom"];
			$prospet->modifier_prospect();
			echo json_encode(array("resultat"=>"true"));
		}
		else
		{
				print_r($_POST);
		}