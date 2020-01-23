<?php
/**
*
*/
class Appelle
{
	public $id;
	public $user_id;
	public $id_prospect;
	public $date;
	public $resultat;
	public $commentaire;
	public $id_contact;
			private function acces_base_donne()
		{
			$host='localhost';
			$utilisateur='root';
			$mdp='';
			$bd='crm';
			return mysqli_connect($host,$utilisateur,$mdp,$bd);
		}
	public function ajouter_appelle($user_id,$id_prospect,$date,$resultat,$commentaire,$id_contact)
		{
			$cxn=$this->acces_base_donne();
			$requette="INSERT INTO appel VALUES(NULL,$user_id,$id_prospect,'$date','$resultat','$commentaire',$id_contact)";
			$res=mysqli_query($this->acces_base_donne(), $requette) or die(mysqli_error($cxn));
			if($res)
			{
				echo json_encode(array('ajoute' =>'true' ));
			}
			else
			{
				echo json_encode(array('ajoute' =>'false' ));
			}
		}
		public function modifier_appel()
		{
			$cxn=$this->acces_base_donne();
			$id=$this->id;
			$user_id=$this->user_id;
			$id_prospect=$this->id_prospect;
			$date=$this->date;
			$resultat=$this->resultat;
			$commentaire=$this->commentaire;
			$id_contact=$this->id_contact;
			$requette="UPDATE appel SET user_id=$user_id,id_prospect=$id_prospect,date= '$date',resultat='$resultat',commentaire='$commentaire',id_contact=$id_contact where id=".$id;
			//echo $requette;
			mysqli_query($cxn, $requette)or die (mysqli_error($cxn));
		}
		public function supprimer_appel()
		{
			$cxn=$this->acces_base_donne();
			$id=$this->id;
			echo $id;
			$requette="DELETE FROM appel where id=$id";
			mysqli_query($cxn, $requette)or die(mysqli_error($cxn));
		}
		public function afficher_appelle($selectors,$condition=null)
		{
			$cxn=$this->acces_base_donne();
			$requette="SELECT $selectors from appel ".$condition;//echo $requette;
			$resultat_appelles=mysqli_query($cxn, $requette)or die(mysqli_error($cxn));
			$resultat_requette = array();
			while ($ligne=mysqli_fetch_assoc($resultat_appelles)) {
				$resultat_requette[]=$ligne;
			}
			//print_r($resultat_requette);
			return $resultat_requette;
		}
		public function libelle_resultat($resultat)
		{
			$requette="SELECT libelle from resultat where id=$resultat";
			$resultat_select=mysqli_query($this->acces_base_donne(),$requette)or die(mysqli_error($this->acces_base_donne()));
			if($ligne=mysqli_fetch_assoc($resultat_select))
			{
				return $ligne["libelle"];
			}
		}
}