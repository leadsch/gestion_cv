<?php
include_once('./fct/Connection.php');

class CV {

  ///// EXPERIENCE

  // ajouter une expérience
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

  // récupère une expérience
  public static function recupExperience ($id_user)
  {
      $bdd = Connection::db_connect();
      $req = $bdd->query('SELECT * FROM cv_experience
        WHERE id_user ="'  . $id_user .'"  ');
      $reponse = $req->fetchAll();

      return $reponse;
  }

  // modifie une expérience
  public static function modifExperience ($date_debut, $date_fin, $intitule, $description, $id_user, $id_experience)
  {
    $bdd = Connection::db_connect();
    $req = $bdd->prepare('UPDATE cv_experience
                          SET intitule = "' . $intitule . '",
                              date_debut = "' . $date_debut . '",
                              date_fin = "' . $date_fin . '",
                              description = "' . $description . '"
                          WHERE id_user = "' . $id_user . '"
                          AND id_experience = "' . $id_experience . '"');

    $req->execute();
  }

  // supprime une expérience
  public static function deleteExperience ($date_debut, $date_fin, $intitule, $description, $id_user)
  {
    $bdd = Connection::db_connect();
    $req = $bdd->prepare('DELETE FROM cv_experience
                          WHERE id_user = "' . $id_user . '" AND date_debut = "' . $date_debut . '" AND date_fin = "' . $date_fin . '" AND intitule = "' . $intitule . '" AND description = "' . $description . '"');
    $req->execute();
  }


  ///// FORMATION

  // ajouter une formation
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

  // récupère une formation
  public static function recupFormation ($id_user)
  {
      $bdd = Connection::db_connect();
      $req = $bdd->query('SELECT * FROM cv_formation
        WHERE id_user ="'  . $id_user .'"  ');
      $reponse = $req->fetchAll();

      return $reponse;
  }


  ///// COMPETENCE

  // ajouter une compétence
  public static function addCompetence ($competence, $id_user)
	{
		$bdd = Connection::db_connect();
		$req = $bdd->prepare('INSERT INTO cv_competences(id_user, competence) VALUES (:id_user, :competence)');
	  $req->bindParam(":id_user", $id_user);
								$req->bindParam(":competence", $competence);

								$req->execute();
	}

  // récupère ue compétence
  public static function recupCompetence ($id_user)
  {
      $bdd = Connection::db_connect();
      $req = $bdd->query('SELECT * FROM cv_competences
        WHERE id_user ="'  . $id_user .'"  ');
      $reponse = $req->fetchAll();

      return $reponse;
  }


  ////// contact

  // ajouter un contact
  public static function addContact ($contact, $id_user)
  {
    $bdd = Connection::db_connect();
    $req = $bdd->prepare('INSERT INTO cv_contact(contact, id_user)
                          VALUES (:contact, :id_user)');
    $req->bindParam(":id_user", $id_user);
                $req->bindParam(":contact", $contact);

                $req->execute();
  }

  // récupère un contact
  public static function recupContact ($id_user)
  {
      $bdd = Connection::db_connect();
      $req = $bdd->query('SELECT * FROM cv_contact
        WHERE id_user ="'  . $id_user .'"  ');
      $reponse = $req->fetchAll();

      return $reponse;
  }

  // modifie un contat
  public static function modifContact ($contact, $id_user, $id_contact)
  {
    $bdd = Connection::db_connect();
    $req = $bdd->prepare('UPDATE cv_contact
                          SET contact = "' . $contact . '"
                          WHERE id_user = "' . $id_user . '"
                          AND id_contact = "' . $id_contact . '"');
    $req->execute();

    echo $contact;
    echo $id_user;
  }

  // supprime un contact
  public static function deleteContact($contact, $id_user)
  {
    $bdd = Connection::db_connect();
    $req = $bdd->prepare('DELETE FROM cv_contact
                          WHERE id_user = "' . $id_user . '" AND contact = "' . $contact . '"');
    $req->execute();
  }

}

?>
