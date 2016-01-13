<?php
include_once('./fct/Connection.php');

class CV {

  public static function addExperience ($date_debut, $date_fin, $intitule, $description, $id_user)
	{

		$bdd = Connection::db_connect();
		$req = $bdd->prepare('INSERT INTO cv_experience(date_debut, date_fin, intitule, description, id_user)
												VALUES (:date_debut, :date_fin, :intitule, :description, :id_user)');

								$req->bindParam(':date_debut', $date_debut);
								$req->bindParam(':date_fin', $date_fin);
								$req->bindParam(':intitule', $intitule);
								$req->bindParam(':description', $description);
								$req->bindParam(':id_user', $id_user);

								$req->execute();
	}

  public static function recupExperience ($id_user)
  {
      $bdd = Connection::db_connect();
      $req = $bdd->query('SELECT * FROM cv_experience
        WHERE id_user ="'  . $id_user .'"  ');
      $reponse = $req->fetchAll();

      return $reponse;
  }

  public static function modifExperience ()
  {

  }

  public static function addFormation ($date_debut, $date_fin, $intitule, $description, $id_user)
	{

		$bdd = Connection::db_connect();
		$req = $bdd->prepare('INSERT INTO cv_formation(date_debut, date_fin, intitule, description, id_user)
												VALUES (:date_debut, :date_fin, :intitule, :description, :id_user)');

								$req->bindParam(':date_debut', $date_debut);
								$req->bindParam(':date_fin', $date_fin);
								$req->bindParam(':intitule', $intitule);
								$req->bindParam(':description', $description);
								$req->bindParam(':id_user', $id_user);

								$req->execute();
	}

  public static function recupFormation ($id_user)
  {
      $bdd = Connection::db_connect();
      $req = $bdd->query('SELECT * FROM cv_formation
        WHERE id_user ="'  . $id_user .'"  ');
      $reponse = $req->fetchAll();

      return $reponse;
  }

  public static function addCompetence ($competence, $id_user)
	{
		$bdd = Connection::db_connect();
		$req = $bdd->prepare('INSERT INTO cv_competences(id_user, competence) VALUES (:id_user, :competence)');
	  $req->bindParam(":id_user", $id_user);
								$req->bindParam(":competence", $competence);


								$req->execute();

	}

  public static function recupCompetence ($id_user)
  {
      $bdd = Connection::db_connect();
      $req = $bdd->query('SELECT * FROM cv_competences
        WHERE id_user ="'  . $id_user .'"  ');
      $reponse = $req->fetchAll();

      return $reponse;
  }

  public static function addContact ($contact, $id_user)
  {
    $bdd = Connection::db_connect();
    $req = $bdd->prepare('INSERT INTO cv_contact(contact, id_user)
                          VALUES (:contact, :id_user)');
    $req->bindParam(":id_user", $id_user);
                $req->bindParam(":contact", $contact);

                $req->execute();

  }

  public static function recupContact ($id_user)
  {
      $bdd = Connection::db_connect();
      $req = $bdd->query('SELECT * FROM cv_contact
        WHERE id_user ="'  . $id_user .'"  ');
      $reponse = $req->fetchAll();

      return $reponse;
  }

  /*public static function deleteContact($contact, $id_user)
  {
    $bdd = Connection::db_connect();
    $req = $bdd->prepare('DELETE FROM cv_contact
                          WHERE id_user = "' . $id_user . '" AND id_contact = "' . $contact . '"');
    $req->execute();
  }*/

  public static function edit () {
    
  }

}

?>
