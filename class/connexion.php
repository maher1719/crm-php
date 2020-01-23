<?php
	/**
	*
	*/
	class connexion
	{
		protected $cxn;
		private function acces_base_donne()
		{
			$host='localhost';
			$utilisateur='root';
			$mdp='';
			$bd='crm';
			return mysqli_connect($host,$utilisateur,$mdp,$bd);
		}
		
	}