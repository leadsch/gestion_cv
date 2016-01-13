<?php
if(isset($_SESSION['id_user'])){$isConnecte=true;}else{$isConnecte=false;}

if (!$isConnecte) { ?>
  <div class="panel panel-primary content">
    <div class="panel-body">
          <h1 class="titreAccueil">Gestion de CV </h1>
          <h4 class="bienvenue">Bonjour et bienvenue !</h4>

          <br> <br> <br>
              <p id="test"><span class="span6">Nos membres :</span>
              	<br><a href="index.php?uc=user&action=index"
          	    	class="success button">Utilisateurs inscrits
              	</a>
            	</p>

            <p id="test"><span class="span6">Pas encore inscrit ?</span>
            <br><a href="index.php?uc=user&action=add"
              class="success button">Inscription
            </a>
          </p>
      </div>
  </div>

<?php } else { ?>

  <div class="">
    <div class="">
      <br>
          <h4 class="bienvenue">Bonjour et bienvenue !</h4>

          <div class="row">
            <br><br>
            <div class="medium-8 columns">

              <div class="medium-12 columns monCV">
                  <h4> MODIFICATION CV </h4>
              </div>

              <div class="medium-12 columns contenuCV" >

                <nav>
                  <ul>
                    <li class="experience">Expériences</li>
                    <li class="competence">Compétences</li>
                    <li class="formation">Formations</li>
                    <li class="contact">Contact</li>
                  </ul>
                </nav>

              </div>

              <div class="medium-12 columns contenuCV" >
                  <div id="experienceContenu">
                    <form id="exp" method="post" action="index.php?uc=cv&action=addExperience">
                      <input type="text" name="intitule" placeholder="Ajouter une expérience">
                      <input type="text" name="date_debut" placeholder="Date de début">
                      <input type="text" name="date_fin" placeholder="Date de fin">
                      <input type="text" name="description" placeholder="Description">
                      <button type="submit" class="warning button" id="boutonPlus"> Ajouter </button>
                    </form>
                  </div>

                  <div id="formationContenu">
                    <form id="exp" method="post" action="index.php?uc=cv&action=addFormation">
                      <input type="text" name="intitule" placeholder="Ajouter une formation">
                      <input type="text" name="date_debut" placeholder="Date de début">
                      <input type="text" name="date_fin" placeholder="Date de fin">
                      <input type="text" name="description" placeholder="Description">
                      <button type="submit" class="warning button" id="boutonPlus"> Ajouter </button>
                    </form>
                  </div>

                  <div id="competenceContenu">
                    <form id="exp" method="post" action="index.php?uc=cv&action=addCompetence">
                      <input type="text" name="competence" placeholder="Ajouter une compétence">
                      <button type="submit" class="warning button" id="boutonPlus"> Ajouter </button>
                    </form>
                  </div>

                  <div id="contactContenu">
                    <form id="exp" method="post" action="index.php?uc=cv&action=addContact">
                      <input type="text" name="contact" placeholder="Ajouter un moyen de contact">
                      <button type="submit" class="warning button" id="boutonPlus"> Ajouter </button>
                    </form>
                  </div>
              </div>

              <div class="medium-12 columns contenuCV" >

              </div>




            </div>
            <div class="medium-3 columns">
              <br>
              <a href="index.php?uc=user&action=index"
          	    	class="success button"> Utilisateurs inscrits </a>
              <a href="index.php?uc=user&action=index"
                  class="success button">  Informations perso. </a>
              <a href="index.php?uc=cv&action=view"
                  class="secondary button"> Aperçu CV </a>
              <br>
            </div>
          </div>
      </div>
    </div>
  </div>

<?php } ?>
