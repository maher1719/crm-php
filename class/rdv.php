<?php
class rdv
{
		public $id;
	public $user_id;
	public $date;
	public $resultat;
	public $commentaire;
	public $id_contact;
	public $id_prospect;
	public $date_rdv;
	public $lieu_rdv;
				private function acces_base_donne()
		{
			$host='localhost';
			$utilisateur='root';
			$mdp='';
			$bd='crm';
			return mysqli_connect($host,$utilisateur,$mdp,$bd);
		}
	public function ajouter_rdv()
		{
			$user_id=$this->user_id;
			$date=$this->date;
			$resultat=$this->resultat;
			$commentaire=$this->commentaire;
			$id_contact=$this->id_contact;
			$lieu_rdv=$this->lieu_rdv;
			$date_rdv=$this->date_rdv;
			$id_prospect=$this->id_prospect;

			$cxn=$this->acces_base_donne();
			$requette="INSERT INTO rdv VALUES(NULL,$user_id,'$date','$resultat','$commentaire',$id_contact,'$lieu_rdv','$date_rdv',$id_prospect)";
			mysqli_query($cxn, $requette)or die(mysqli_error($cxn));
		}

		public function modifier_rdv()
		{
			$id=$this->id;
			$user_id=$this->user_id;
			$id_prospect=$this->id_prospect;
			$date=$this->date;
			$resultat=$this->resultat;
			$commentaire=$this->commentaire;
			$id_contact=$this->id_contact;
			$lieu_rdv=$this->lieu_rdv;
			$date_rdv=$this->date_rdv;
			$cxn=$this->acces_base_donne();
			$requette="UPDATE rdv SET user_id=$user_id,id_prospect=$id_prospect,date= '$date',resultat='$resultat',commentaire='$commentaire',id_prospect=$id_prospect,lieu_rdv='$lieu_rdv',date_rdv='$date_rdv' where id=$id";
			mysqli_query($cxn, $requette)or die(mysqli_error($cxn));
		}

		public function supprimer_rdv($id)
		{
			$id=$this->id;
			$cxn=$this->acces_base_donne();
			$requette="DELETE FROM rdv where id=$id";
			mysqli_query($cxn, $requette);
		}

		public function afficher_rdv($selectors,$condition=null)
		{
			$cxn=$this->acces_base_donne();
			$requette="SELECT $selectors from rdv ".$condition;
			$resultat_rdvs=mysqli_query($cxn, $requette)or die(mysqli_error($cxn));
			$resultat_requette = array();
			while ($ligne=mysqli_fetch_assoc($resultat_rdvs)) {
				$resultat_requette[]=$ligne;

			}
			return $resultat_requette;
		}

}


