<?php
class utilisateur
{
	public $id;
	public $nom;
	public $prenom;
	public $login;
	public $email;
	public $password;
	public $adresse;
	public $telephone;
	private function acces_base_donne()
		{
			$host='localhost';
			$utilisateur='root';
			$mdp='';
			$bd='crm';
			return mysqli_connect($host,$utilisateur,$mdp,$bd);
		}
	public function connecte()
	{
		$login=$this->login;
		$password=$this->password;
			$requ="select id, CONCAT(nom,' ',prenom) as nom_utilisateur from utilisateur where (login='$login' or email='$login') and password='$password' ";
			//echo $requ;
			$cxn=$this->acces_base_donne();
			$resultat=mysqli_query($cxn, $requ);
			$num= mysqli_num_rows($resultat);
			if($num)
			{
				if($ligne=mysqli_fetch_assoc($resultat));
				//$this->id=$ligne["id"];
				$_SESSION['id']=$ligne["id"];
				return $ligne["id"];
			}
			else
			{
				return false;
			}

	}
	public function inscription ()
	{
		$nom=$this->nom;
		$prenom=$this->prenom;
		$login=$this->login;
		$password=$this->password;
		$email=$this->email;
		$telephone=$this->telephone;
		$adresse=$this->adresse;
		$cxn=$this->acces_base_donne();
		$requette_verification="SELECT id,email,login,telephone from utilisateur where login='$login' or email='$email'";
		$resultat_verification=mysqli_query($cxn, $requette_verification)or die(mysqli_error($cxn));
		$champ_double="";
		if(mysqli_num_rows($resultat_verification))
		{
			if($ligne=mysqli_fetch_assoc($resultat_verification))
			{
				if($ligne["login"]==$login)
				{
					$champ_double=$champ_double." login";
				}
				if($ligne["email"]==$email)
				{
					$champ_double=$champ_double." email";
				}
				if($ligne["telephone"]==$telephone)
				{
					$champ_double=$champ_double." telephone";
				}
				echo $champ_double." déja existe";
			}
		}
		else
		{
			$requ="INSERT INTO utilisateur VALUES(NULL,'$nom','$prenom','$login','$adresse',$telephone,'$password','$email',NULL)";
				mysqli_query($cxn, $requ)or die(mysqli_error($cxn));
				return true;
		}
	}
	public function deconnexion()
	{
		//session_destroy();
	}

	public function Affiche_utilisteur($selecteurs,$condition=null)
	{
		$requette="SELECT DISTINCT $selecteurs from utilisateur ".$condition;
		$resultat=mysqli_query($this->acces_base_donne(), $requette)or die(mysqli_error($this->acces_base_donne()));
		$resultat_requette = array();
		while ($ligne=mysqli_fetch_assoc($resultat)) {
			$resultat_requette[]=$ligne;

		}
		//print_r($resultat_requette);
		return $resultat_requette;
	}

}