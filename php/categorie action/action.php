<?php
session_start();
require'../bdd sql/PDOcinema.php';
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="keywords" content="HTML,CSS,PHP,videotheque,film,acteur,realisateur,action">
		<meta name="description" content="page contenant les films de la catégorie action">
		<meta name="author" content="Tommy Brisset,Orlann Ferreira">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="action.css">
		<title>catégorie film action du site CINE ADDICT</title>
	</head>
<body>

	<header>
        <div class="navbar">
            <div class="nav-header">
                <div class="nav-logo">
                    <h1 id="neon">Cine addict</h1>
                </div>
            </div>
            <input type="checkbox" id="nav-check">
            <div class="nav-btn">
                <label for="nav-check">
                    <span></span>
                    <span></span>
                    <span></span>
                </label>
            </div>
            <div class="nav-links">
                <a href="../index.php" title="lien vers page d'accueil">Accueil</a>
                <div class="dropdown">
                    <a class="dropBtn" href="#" title="Titre menu catégorie">Catégorie
                        <i class="fas fa-angle-down"></i>
                    </a>
                    <div class="drop-content">
                        <a href="../categorie comedie/comedie.php" title="lien vers page de la catégorie Comédie ">Comédie</a>
                        <a href="action.php" title="lien vers la page de la catégorie Action">Action</a>
                    </div>
                </div>
                <?php
                if (!isset($_SESSION['IsLog']) OR $_SESSION['IsLog'] == False){
                    ?>
                    <a href="../login/login.php" title="lien vers page de connexion" class="loginBtn">Connexion</a>
                    <?php
                }
                else { ?>
                    <a href="../login/logout.php" title="lien vers page de déconnexion" class="loginBtn">Déconnexion</a>
                    <?php
                }
                ?>
                <a href="../register/register.php" title="lien vers page d'enregistrement" class="loginBtn">Inscription</a>
                <a href="../panier/panier.php" title="lien vers page du panier">Panier</a>
                <form id="case" method="POST" action="../resultat/resultat.php">
                    <input id="search" name="search" type="text" placeholder="titre ou réalisateur">
                    <input type="submit" value="recherche" title="lancez votre recherche" id="buttonsearch">
                </form>
            </div>
        </div>
    </header>
	
	<main>
		<div class="h1-effect">
			<h1>Voici le top 10 des films dans la catégorie Action</h1>
		</div>
		<div class="container">
			<div>
				<p>try to hover me 
					<div id="divdescendre">
						<img id="descendre"  src="https://storage.googleapis.com/material-icons/external-assets/v4/icons/svg/ic_arrow_downward_black_48px.svg" alt="fleche" height="42" width="42"/>
					</div>
				</p>
                <?php

                $requetesql = "SELECT ID,TITRE FROM FILMS WHERE CATEGORIE = 'ACTION'AND ID=1";

                $filmaction=$bdd->query($requetesql);

                while ($donnee = $filmaction->fetch()) {
                    ?>
                    <div>
                        <img src="../images/<?= $donnee['ID']?>.jpg" alt="affiche de film">
                        <p><?= $donnee['TITRE'] ?> </p>
                        <a href='../presentation%20video/presentation.php?id=<?=$donnee['ID']?>' title="plus d'information sur le film">Plus d'informations</a>
                    </div>
                    <?php
                }
                $filmaction->closeCursor();
                ?>
			</div>

            <?php

            $requetesql = "SELECT ID,TITRE FROM FILMS WHERE CATEGORIE = 'ACTION'AND ID>1";

            $filmaction=$bdd->query($requetesql);

            while ($donnee = $filmaction->fetch()) {
                ?>
			<div>
				<img src="../images/<?= $donnee['ID']?>.jpg" alt="affiche de film">
				<p><?= $donnee['TITRE'] ?> </p>
				<a href='../presentation%20video/presentation.php?id=<?=$donnee['ID']?>' title="plus d'information sur le film">Plus d'informations</a>
			</div>
                <?php
            }
            $filmaction->closeCursor();
            ?>
	</main>

	<footer>
        <div class="footer">
        <div class="row">
                <a href="#" title="lien vers facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" title="lien vers instagram"><i class="fa fa-instagram"></i></a>
                <a href="#" title="lien vers linkedin"><i class="fa-brands fa-linkedin"></i></a>
                <a href="#" title="lien vers discord"><i class="fa-brands fa-discord"></i></a>
                <a href="#" title="lien vers youtube"><i class="fa fa-youtube"></i></a>
                <a href="#" title="lien vers twitter"><i class="fa fa-twitter"></i></a>
            </div>
            <div class="row">
                <ul>
                    <li><a href="../index.php" title="liens vers accueil">Accueil</a></li>
                    <li><a href="action.php" title="liens vers film d'action">Film d'action</a></li>
                    <li><a href="../categorie comedie/comedie.php" title="liens vers film de comédie">Film de comédie</a></li>
                    <?php
                    if (!isset($_SESSION['IsLog']) OR $_SESSION['IsLog'] == False){
                        ?>
                        <li><a href="../login/login.php" title="page de connexion">Connexion</a></li>
                        <?php
                    }
                    else { ?>
                        <li><a href="../login/logout.php" title="page de déconnexion">Déconnexion</a></li>
                        <?php
                    }
                    ?>
                    <li><a href="../register/register.php" title="page d'enregistrement">Inscription</a></li>
                </ul>
            </div>
            <div class="row">
                CINE ADDICT WEBSITE Copyright © 2023 - All rights reserved || Designed By: Tommy Brisset
            </div>
        </div>
    </footer>
	
</body>
</html>