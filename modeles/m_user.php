<?php
include_once('./fct/Connection.php');

class User{

	public static function toConnect($identifiant,$motDePasse)
	{
		$bdd = Connection::db_connect();
		$req = $bdd->query('SELECT * FROM user
			WHERE identifiant ="' .$identifiant . '"
			AND mot_de_passe = "'.sha1($motDePasse).'"  ');
		$reponse = $req->fetchAll();
	//	return $reponse ? $reponse : "Erreur connexion";
		return $reponse;
	}

	// affiche tous les users
	public static function index()
	{
		$bdd = Connection::db_connect();
		$req = $bdd->query('SELECT * FROM user');
		$reponse = $req->fetchAll();
		return $reponse ? $reponse : "erreur ou liste d'user vide.";
	}

	// affiche un user particulier
	public static function view($idUser)
	{
		$bdd = Connection::db_connect();
		$req = $bdd->query('SELECT * FROM user WHERE id_user ="' .$idUser  . '"');
		$reponse = $req->fetchAll();
		return $reponse ? $reponse : "erreur ou utilisateur non trouvé.";
	}

	// ajoute un user (inscription)
	public static function add($nom, $prenom, $adresse_rue, $adresse_cp, $adresse_ville, $email, $date_de_naissance, $identifiant, $motDePasse)
	{
		$bdd = Connection::db_connect();
		$req = $bdd->prepare('INSERT INTO user(nom, prenom, adresse_rue, adresse_cp, adresse_ville, email, date_de_naissance, identifiant, mot_de_passe)
												VALUES (:nom, :prenom, :adresse_rue, :adresse_cp, :adresse_ville, :email, :date_de_naissance, :identifiant, :mot_de_passe)');

								$req->bindParam(':nom', $nom);
								$req->bindParam(':prenom', $prenom);
								$req->bindParam(':adresse_rue', $adresse_rue);
								$req->bindParam(':adresse_cp', $adresse_cp);
								$req->bindParam(':adresse_ville', $adresse_ville);
								$req->bindParam(':email', $email);
								$req->bindParam(':date_de_naissance', $date_de_naissance);
								$req->bindParam(':identifiant', $identifiant);
								$req->bindParam(':mot_de_passe', sha1($motDePasse));

								$req->execute();
	}

	// modifie un user
	public static function edit($nom, $prenom, $adresse_rue, $adresse_cp, $adresse_ville, $email, $date_de_naissance, $identifiant, $motDePasse, $id)
	{
		$bdd = Connection::db_connect();
		$req = $bdd->prepare('UPDATE user
												SET nom = "' . $nom . '", prenom = "' . $prenom . '", adresse_rue = "' . $adresse_rue . '" , adresse_cp = "' . $adresse_cp . '",
														adresse_ville = "' . $adresse_ville . '", email = "' . $email . '",
														date_de_naissance = "' . $date_de_naissance . '", identifiant = "' . $identifiant . '", mot_de_passe = "' . sha1($motDePasse) . '"
												WHERE id_user ="' . $id . '"');

							$req->execute();

	}

	// supprime un user
	public static function delete($id)
	{
		$bdd = Connection::db_connect();
		$req = $bdd->prepare('DELETE FROM user WHERE id_user = "' . $id . '"');
		$req->execute();
	}

	  ///// CV PUBLIC / PRIVE

	  public static function addVisiblite ($isVisible, $id_user)
	  {
			$bdd = Connection::db_connect();
			$req = $bdd->prepare('UPDATE user
													SET isVisible = "' . $isVisible . '"
													WHERE id_user = "' . $id_user . '"');

								$req->execute();
	  }

		public static function recupVisibilite ()
	  {
	      $bdd = Connection::db_connect();
	      $req = $bdd->query('SELECT isVisible FROM user');
	      $reponse = $req->fetchAll();

	      return $reponse;
	  }

		public static function recupIDUser ()
	  {
	      $bdd = Connection::db_connect();
	      $req = $bdd->query('SELECT id_user FROM user');
	      $reponse = $req->fetchAll();

	      return $reponse;
	  }

		public static function recupMaxIDUser ()
	  {
	      $bdd = Connection::db_connect();
	      $req = $bdd->query('SELECT MAX(id_user) FROM user');
	      $reponse = $req->fetchAll();

	      return $reponse;
	  }

}

?>
