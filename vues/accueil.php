<?php
if(isset($_SESSION['id_user'])){$isConnecte=true;}else{$isConnecte=false;}

if (!$isConnecte) { ?>
  <div class="panel panel-primary content">
    <div class="panel-body">
          <h1 class="titreAccueil">Gestion de CV </h1>
          <h4 class="bienvenue">Bonjour et bienvenue !</h4>

          <div class="row">
            <div class="medium-3 columns"> </div>
            <div class="medium-3 columns">
              <p id="test"><span class="span6">Nos membres :</span>
              	<br><a href="index.php?uc=user&action=index"
          	    	class="success button">Utilisateurs inscrits
              	</a>
            	</p>
            </div>

          <div class="medium-3 columns">
            <p id="test"><span class="span6">Pas encore inscrit ?</span>
            <br><a href="index.php?uc=user&action=add"
              class="success button">Inscription
            </a>
          </p>
          </div>

          <div class="medium-3 columns"> </div>

        </div>
      </div>
  </div>

<?php } else { ?>

  <div class="panel panel-primary content">
    <div class="panel-body">
          <h1 class="titreAccueil">Gestion de CV </h1>
          <h4 class="bienvenue">Bonjour et bienvenue !</h4>

          <div class="row">
            <div class="medium-3 columns"> </div>
            <div class="medium-3 columns">
              <p id="test"><span class="span6">Nos membres :</span>
              	<br><a href="index.php?uc=user&action=index"
          	    	class="success button">Utilisateurs inscrits
              	</a>
            	</p>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php } ?>
