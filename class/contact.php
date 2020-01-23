<?php
/**
*
*/
class Contact
{
	
	public $id;
	public $nom;
	public $prenom;
	public $id_utilisateur;
	public $email;
	public $tel;
	public $post;
	public $id_prospect;
	
			private function acces_base_donne()
		{
			$host='localhost';
			$utilisateur='root';
			$mdp='';
			$bd='crm';
			return mysqli_connect($host,$utilisateur,$mdp,$bd);
		}
	public function ajouter_contact()
	{
		$nom=$this->nom;
		$prenom=$this->prenom;
		$id_utilisateur=$this->id_utilisateur;
		$email=$this->email;
		$tel=$this->tel;
		$post=$this->post;
		$id_prospect=$this->id_prospect;
		$requette="INSERT INTO contact VALUES(NULL,$id_utilisateur,'$nom','$prenom','$email',$tel,'$post',$id_prospect)";
		$cxn=$this->acces_base_donne();
		mysqli_query($cxn, $requette)or die(mysqli_error($cxn));
	}
		public function modifier_contact()
		{
			$id=$this->id;
			$nom=$this->nom;
			$prenom=$this->prenom;
			$email=$this->email;
			$tel=$this->tel;
			$post=$this->post;
			$id_prospect=$this->id_prospect;
			$cxn=$this->acces_base_donne();
			$requette="UPDATE contact SET nom='$nom',prenom='$prenom',email='$email',tel='$tel',poste='$post',id_prospect='$id_prospect' where id=$id";
			mysqli_query($cxn, $requette)or die(mysqli_error($cxn));
		}
		public function supprimer_contact()
		{
			$cxn=$this->acces_base_donne();
			$id=$this->id;
			$requette="DELETE FROM contact where id=$id";
			mysqli_query($cxn, $requette)or die(mysqli_error($cxn));
			$requettee="DELETE from appel where id_contact=".$id;
			$requette2="DELETE from rdv where id_contact=".$id;
			mysqli_query($cxn,$requettee);
			mysqli_query($cxn,$requette2);
		}
		public function afficher_contact($selectors,$condition=null)
		{
			$cxn=$this->acces_base_donne();
			$requette="SELECT $selectors from contact ".$condition;
			//mysqli_query($cxn, $requette);
			$resultat=mysqli_query($cxn, $requette)or die (mysqli_error($cxn));
			$resultat_requette = array();
			while ($ligne=mysqli_fetch_assoc($resultat)) {
				$resultat_requette[]=$ligne;
				//echo $ligne["id"];
			}
			return $resultat_requette;
		}
		public function select_prospect($id)
		{
			$cxn=$this->acces_base_donne();
			$requette="SELECT id_prospect from contact where id=$id";
			$resultat_select=mysqli_query($cxn,$requette);
			if($ligne=mysqli_fetch_assoc($resultat_select))
			{
				return $ligne["id_prospect"];
			}
		}
	}