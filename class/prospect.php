<?php
	/**
	*
	*/
	class prospect
	{
		
		public $id;
		public $nom;
		public $statu;
		public $raison_social;
		public $user_creator;
		public $tel;
		public $fax;
		public $email;
		public $adresse;
		public $date_contrat;
		public $domaine;
		private function acces_base_donne()
		{
			$host='localhost';
			$utilisateur='root';
			$mdp='';
			$bd='crm';
			return mysqli_connect($host,$utilisateur,$mdp,$bd);
		}
		public function ajouter_prospect()
		{
			$raison_social=$this->raison_social;
			$tel=$this->tel;
			$nom=$this->nom;
			$fax=$this->fax;
			$email=$this->email;
			$statu=$this->statu;
			$adresse=$this->adresse;
			$user_creator=$this->user_creator;
			$date_contrat=$this->date_contrat;
			$domaine=$this->domaine;
			$cxn=$this->acces_base_donne();
			$requette="INSERT INTO prospect VALUES(NULL,'$raison_social','$tel','$fax','$email','$adresse',$statu,$user_creator,'$date_contrat','$domaine','$nom')";
			mysqli_query($cxn, $requette)or die(mysqli_error($cxn));
		}
		public function modifier_prospect()
		{
			$id=$this->id;
			$raison_social=$this->raison_social;
			$tel=$this->tel;
			$fax=$this->fax;
			$email=$this->email;
			$statu=$this->statu;
			$adresse=$this->adresse;
			$user_creator=$this->user_creator;
			$date_contrat=$this->date_contrat;
			$domaine=$this->domaine;
			$nom=$this->nom;
			$cxn=$this->acces_base_donne();
			$requette="UPDATE prospect SET raison_social='$raison_social',tel=$tel,fax=$fax,email='$email',statu='$statu',adresse='$adresse',user_creature=$user_creator,date_contrat='$date_contrat',domaine='$domaine',nom='$nom' where id=$id";
			mysqli_query($cxn, $requette)or die(mysqli_error($cxn));
		}
		public function supprimer_prospect()
		{
			$id=$this->id;
			$cxn=$this->acces_base_donne();
			$requette="DELETE FROM prospect where id=$id";
			mysqli_query($cxn, $requette);
			$requette2="DELETE from contact where id_prospect=$id";
			mysqli_query($cxn,$requette2);
			$requette3="DELETE from appel where id_prospect=$id";
			mysqli_query($cxn,$requette3);
			$requette4="DELETE from rdv where id_prospect=$id";
			mysqli_query($cxn,$requette4);
		}
		public function affiche_prospect($selecteur,$condition=null)
		{
			$cxn=$this->acces_base_donne();
			$requette="SELECT $selecteur from prospect ".$condition; //echo $requette;
			$resultat=mysqli_query($this->acces_base_donne(), $requette) or die(mysqli_error($this->acces_base_donne()));
			$resultat_requette = array();
			while ($ligne=mysqli_fetch_assoc($resultat)) {
				$resultat_requette[]=$ligne;
			}
			//print_r($resultat_requette);
			return $resultat_requette;
		}
	}