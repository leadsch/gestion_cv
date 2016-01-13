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
      $date_debut = $_POST['date_debut'];
      $date_fin = $_POST['date_fin'];
      $intitule = $_POST['intitule'];
      $description = $_POST['description'];

      $id_user = $_SESSION['id_user'];

      $req = CV::modifExperience($date_debut, $date_fin, $intitule, $description, $id_user);
    //  header('Location: ./index.php');

      break;
  }

  case 'deleteContact' :{
    $contact = $_POST['id_contact'];
    $id_user = $_SESSION['id_user'];
    $rep = CV::deleteContact($contact, $id_user);

    break;
  }

  default:
  	header('Location: ./index.php');
  	break;
}

?>
