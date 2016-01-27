<?php
  if(isset($_SESSION['id_user'])){$isConnecte=true;}else{$isConnecte=false;}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="./css/foundation.min.css" />
        <link rel="stylesheet" href="./css/foundation.css" />
        <link rel="stylesheet" href="./css/style.css" />
        <script type="text/javascript" src="./js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="./js/appelJq.js"></script>
        <script type="text/javascript" src="./js/foundation.js"></script>
        <script type="text/javascript" src="./js/foundation.min.js"></script>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
        <style scoped> </style>

        <title>Gestionnaire CV</title>
    </head>

    <body>

<header>
<!-- <a href="./" class="titrelien">Gestionnaire de CV</a> -->
<?php
if($isConnecte){
    echo "<p> Mon compte : " . $_SESSION['identifiant'] . "</p> ";
    echo '<a href="index.php?uc=user&action=toDisconnect"><button type="button" class="button-error pure-button">Deconnexion</button></a> ';
    echo '<a href="index.php?uc=user&action=toConnect"><button type="button" class="success-button pure-button">Accueil </button></a><br><br>';

    echo'
    <form method="post" action="index.php?uc=cv&action=recherche">
        <div class="medium-2 columns rechercher"> <input type="text" placeholder="Rechercher" name="rechercher"> </div>
        <div class="medium-1 columns"> <button class="warning button" type="submit">></button> </div>
    </form>';

}else{
    include('user/v_formConnection.html');
}
?>

</header>
