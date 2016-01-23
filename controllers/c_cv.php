<?php

//controller user
if(!isset($_REQUEST['action']) ){
     $_REQUEST['action'] = 'default';
}
$action = $_REQUEST['action'];
require_once('modeles/m_cv.php');

switch($action){

	case 'addExperience' :{
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $intitule = $_POST['intitule'];
    $description = $_POST['description'];

    $id_user = $_SESSION['id_user'];
    CV::addExperience($date_debut, $date_fin, $intitule, $description, $id_user);

    $listAllExperience = CV::recupExperience($id_user);
    $listAllFormations = CV::recupFormation($id_user);
    $listAllCompetences = CV::recupCompetence($id_user);
    $listAllContact = CV::recupContact($id_user);

    include ('./vues/cv/view.html');
    break;
  }

  case 'addFormation' :{
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $intitule = $_POST['intitule'];
    $description = $_POST['description'];

    $id_user = $_SESSION['id_user'];
    CV::addFormation($date_debut, $date_fin, $intitule, $description, $id_user);

    $listAllExperience = CV::recupExperience($id_user);
    $listAllFormations = CV::recupFormation($id_user);
    $listAllCompetences = CV::recupCompetence($id_user);
    $listAllContact = CV::recupContact($id_user);

    include ('./vues/cv/view.html');
    break;
  }

  case 'addCompetence' :{
    $competence = $_POST['competence'];

    $id_user = $_SESSION['id_user'];
    CV::addCompetence($competence, $id_user);

    $listAllExperience = CV::recupExperience($id_user);
    $listAllFormations = CV::recupFormation($id_user);
    $listAllCompetences = CV::recupCompetence($id_user);
    $listAllContact = CV::recupContact($id_user);

    include ('./vues/cv/view.html');
    break;
  }

  case 'addContact' :{
    $contact = $_POST['contact'];

    $id_user = $_SESSION['id_user'];
    CV::addContact($contact, $id_user);

    $listAllExperience = CV::recupExperience($id_user);
    $listAllFormations = CV::recupFormation($id_user);
    $listAllCompetences = CV::recupCompetence($id_user);
    $listAllContact = CV::recupContact($id_user);

    include ('./vues/cv/view.html');
    break;
  }

  case 'view' :{
    $id_user = $_SESSION['id_user'];
    $listAllExperience = CV::recupExperience($id_user);
    $listAllFormations = CV::recupFormation($id_user);
    $listAllCompetences = CV::recupCompetence($id_user);
    $listAllContact = CV::recupContact($id_user);

    include ('./vues/cv/view.html');
    break;
  }

  case 'modifCV' :{
    $id_user = $_SESSION['id_user'];
    $listAllExperience = CV::recupExperience($id_user);
    $listAllFormations = CV::recupFormation($id_user);
    $listAllCompetences = CV::recupCompetence($id_user);
    $listAllContact = CV::recupContact($id_user);

    include ('./vues/cv/formModification.html');
    break;
  }


  case 'modifExperience' :{

    if (isset($_POST['modification'])) {
      // modification d'une expérience

      $date_debut = $_POST['date_debut'];
      $date_fin = $_POST['date_fin'];
      $intitule = $_POST['intitule'];
      $description = $_POST['description'];
      $id_experience = $_POST['id_experience'];

      $id_user = $_SESSION['id_user'];

      $req = CV::modifExperience($date_debut, $date_fin, $intitule, $description, $id_user, $id_experience);

    } else {
      // suppresion d'une expérience

      $date_debut = $_POST['date_debut'];
      $date_fin = $_POST['date_fin'];
      $intitule = $_POST['intitule'];
      $description = $_POST['description'];

      $id_user = $_SESSION['id_user'];

      $rep = CV::deleteExperience($date_debut, $date_fin, $intitule, $description, $id_user);
    }

    //  header('Location: ./index.php');

    include ('./vues/cv/view.html');
    break;
  }

  case 'modifCompetence' :{
    if (isset($_POST['modification'])) {
      // modification d'une compétence

      $competence = $_POST['competence'];
      $id_competence = $_POST['id_competence'];

      $id_user = $_SESSION['id_user'];

      $req = CV::modifCompetence($competence, $id_user, $id_competence);

    } else {
      // suppression d'une compétence

      $competence = $_POST['competence'];
      $id_user = $_SESSION['id_user'];

      $rep = CV::deleteCompetence($competence, $id_user);
    }

    include ('./vues/cv/view.html');
    break;
  }

  case 'modifFormation' :{

    if (isset($_POST['modification'])) {
      // modification d'une expérience

      $date_debut = $_POST['date_debut'];
      $date_fin = $_POST['date_fin'];
      $intitule = $_POST['intitule'];
      $description = $_POST['description'];
      $id_formation = $_POST['id_formation'];

      $id_user = $_SESSION['id_user'];

      $req = CV::modifFormation($date_debut, $date_fin, $intitule, $description, $id_user, $id_formation);

    } else {
      // suppresion d'une expérience

      $date_debut = $_POST['date_debut'];
      $date_fin = $_POST['date_fin'];
      $intitule = $_POST['intitule'];
      $description = $_POST['description'];

      $id_user = $_SESSION['id_user'];

      $rep = CV::deleteFormation($date_debut, $date_fin, $intitule, $description, $id_user);
    }

    include ('./vues/cv/view.html');
    break;
  }

  case 'modifContact' :{
    if (isset($_POST['modification'])) {
      // modification d'une expérience

      $contact = $_POST['contact'];
      $id_contact = $_POST['id_contact'];

      $id_user = $_SESSION['id_user'];

      $req = CV::modifContact($contact, $id_user, $id_contact);

    } else {
      // suppression d'une expérience

      $contact = $_POST['contact'];
      $id_user = $_SESSION['id_user'];

      $rep = CV::deleteContact($contact, $id_user);
    }

    include ('./vues/cv/view.html');
    break;
  }

  default:
  	header('Location: ./index.php');
  	break;
}

?>
