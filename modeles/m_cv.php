<?php
include_once('./fct/Connection.php');

class CV {

  public static function recupID ($prenom, $nom)
  {
    $bdd = Connection::db_connect();
    $req = $bdd->query('SELECT id_user FROM user
      WHERE prenom ="'  . $prenom .'"
          AND nom = "' . $nom . '"');
    $reponse = $req->fetchAll();

    return $reponse;
  }

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

  // modifie une formation
  public static function modifFormation ($date_debut, $date_fin, $intitule, $description, $id_user, $id_formation)
  {
    $bdd = Connection::db_connect();
    $req = $bdd->prepare('UPDATE cv_formation
                          SET intitule = "' . $intitule . '",
                              date_debut = "' . $date_debut . '",
                              date_fin = "' . $date_fin . '",
                              description = "' . $description . '"
                          WHERE id_user = "' . $id_user . '"
                          AND id_formation = "' . $id_formation . '"');

    $req->execute();
  }

  // supprime une formation
  public static function deleteFormation ($date_debut, $date_fin, $intitule, $description, $id_user)
  {
    $bdd = Connection::db_connect();
    $req = $bdd->prepare('DELETE FROM cv_formation
                          WHERE id_user = "' . $id_user . '" AND date_debut = "' . $date_debut . '" AND date_fin = "' . $date_fin . '" AND intitule = "' . $intitule . '" AND description = "' . $description . '"');
    $req->execute();
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

  // récupère une compétence
  public static function recupCompetence ($id_user)
  {
      $bdd = Connection::db_connect();
      $req = $bdd->query('SELECT * FROM cv_competences
        WHERE id_user ="'  . $id_user .'"  ');
      $reponse = $req->fetchAll();

      return $reponse;
  }

  // modifie une compétences
  public static function modifCompetence ($competence, $id_user, $id_competence)
  {
    $bdd = Connection::db_connect();
    $req = $bdd->prepare('UPDATE cv_competences
                          SET competence = "' . $competence . '"
                          WHERE id_competence = "' . $id_competence . '"
                          AND id_user = "' . $id_user . '"');
    $req->execute();
  }

  // supprime une compétence
  public static function deleteCompetence($competence, $id_user)
  {
    $bdd = Connection::db_connect();
    $req = $bdd->prepare('DELETE FROM cv_competences
                          WHERE id_user = "' . $id_user . '" AND competence = "' . $competence . '"');
    $req->execute();
  }


  ////// CONTACT

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

  // modifie un contact
  public static function modifContact ($contact, $id_user, $id_contact)
  {
    $bdd = Connection::db_connect();
    $req = $bdd->prepare('UPDATE cv_contact
                          SET contact = "' . $contact . '"
                          WHERE id_contact = "' . $id_contact . '"
                          AND id_user = "' . $id_user . '"');
    $req->execute();
  }

  // supprime un contact
  public static function deleteContact($contact, $id_user)
  {
    $bdd = Connection::db_connect();
    $req = $bdd->prepare('DELETE FROM cv_contact
                          WHERE id_user = "' . $id_user . '" AND contact = "' . $contact . '"');
    $req->execute();
  }

  public static function compteurVisite($nom)
  {
    $filename = 'nombreVisitesCV/visiteursCV_' . $nom . '.txt';

    if (file_exists($filename)) {
      $count = file($filename);
      $count[0] ++;
      $fp = fopen($filename, "w");
      fputs ($fp, "$count[0]");
      fclose ($fp);
    }

    else {
      $fh = fopen($filename, "w");
      if($fh==false)
          die("Impossible de créer le fichier");
      fputs ($fh, 1);
      fclose ($fh);
      $count = file($filename);
    }

    return $count[0];
  }

  //// BARRE RECHERCHER

  public static function rechercherCompetence($competenceRecherche)
  {
    $bdd = Connection::db_connect();
    $req = $bdd->query('SELECT id_user FROM cv_competences
                          WHERE competence LIKE "%' . $competenceRecherche . '%"');
    $reponse = $req->fetchAll();
    return $reponse;
  }

  public static function rechercherNom ($nom)
  {
    $bdd = Connection::db_connect();
    $req = $bdd->query('SELECT id_user, nom, prenom FROM user
                          WHERE nom LIKE "%' . $nom . '%"');
    $reponse = $req->fetchAll();

        var_dump($reponse);

    return $reponse;
  }

  public static function rechercherPrenom ($prenom)
  {
    $bdd = Connection::db_connect();
    $req = $bdd->query('SELECT id_user, nom, prenom FROM user
                          WHERE prenom LIKE "%' . $prenom . '%"');
    $reponse = $req->fetchAll();
    return $reponse;
  }

  public static function rechercherExperience ($experience)
  {
    $bdd = Connection::db_connect();
    $req = $bdd->query('SELECT id_user FROM cv_experience
                          WHERE intitule LIKE "%' . $experience . '%"');
    $reponse = $req->fetchAll();
    return $reponse;
  }

}

?>
