<?php
session_start();
$_SESSION['ma_variable'] = False;
$_SESSION['ma_variable1'] = False;
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="keywords" content="HTML,CSS,PHP,javascript,videotheque,film,acteur,realisateur,cine addict,cinéma,production,comédie,action,video,partenaire">
		<meta name="description" content="page d'accueil de la vidéothèque CINE ADDICT">
		<meta name="author" content="Tommy Brisset,Orlann Ferreira">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="style.css">
		<title>Page d'accueil de la vidéothèque CINE ADDICT</title>
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
                <a href="#" title="lien vers page d'accueil">Accueil</a>
                <div class="dropdown">
                    <a class="dropBtn" href="#" title="Titre menu catégorie">Catégorie
                        <i class="fas fa-angle-down"></i>
                    </a>
                    <div class="drop-content">
                        <a href="categorie comedie/comedie.php" title="lien vers page de la catégorie Comédie ">Comédie</a>
                        <a href="categorie action/action.php" title="lien vers la page de la catégorie Action">Action</a>
                    </div>
                </div>

                <?php
                if (!isset($_SESSION['IsLog']) OR $_SESSION['IsLog'] == False){
                    ?>
                    <a href="login/login.php" title="lien vers page de connexion" class="loginBtn">Connexion</a>
                <?php
                }
                else { ?>
                    <a href="login/logout.php" title="lien vers page de déconnexion" class="loginBtn">Déconnexion</a>
                <?php
                }
                ?>

                <a href="register/register.php" title="lien vers page d'enregistrement" class="loginBtn">Inscription</a>
                <a href="panier/panier.php" title="lien vers page du panier">Panier</a>
                <form id="case" method="POST" action="resultat/resultat.php">
                    <input id="search" name="search" type="text" placeholder="titre ou réalisateur">
                    <input type="submit" value="recherche" title="Lancez votre recherche" id="buttonsearch">
                </form>
            </div>
        </div>
    </header>

    <main>

        <h2><span>Bienvenue</span> <span>sur</span> <span>le</span> <span>meilleur</span> <span>site</span> <span>pour</span>
	    <span>louer</span> <span>les</span> <span>films</span> <span>les</span> <span>plus</span> <span>célèbres</span> <span>de</span>
        <span>tous</span> <span>les</span> <span>temps</span></h2>

        <section>
            <div class="slider">
                <div class="img-div div1">
                    <p class="slider-txt">AVATAR : la voie de l'eau</p>
                    <p class="slider-rea">réalisateur : <a href="resultat/resultat.php?search=James Cameron" title="lien vers tout les films de James Cameron">James Cameron</a></p>
                    <p class="slider-prix">Prix : 21€</p>
                    <section>
                        <a class="button" type="button" href="./panier/Insertpanier.php?id=8" title="ajout panier ">Ajouter au panier</a>
                    </section>
                </div>
                <div class="img-div div2">
                    <p class="slider-txt">Black Panter : Wakanda forever</p>
                    <p class="slider-rea">réalisateur : <a href="resultat/resultat.php?search=Ryan Coogler" title="lien vers tout les films de Ryan Coogler">Ryan Coogler</a></p>
                    <p class="slider-prix">Prix : 18€</p>
                    <section>
                        <a class="button" type="button" href="./panier/Insertpanier.php?id=10" title="ajout panier ">Ajouter au panier</a>
                    </section>
                </div>
                <div class="img-div div3">
                    <p class="slider-txt">Les cyclades</p>
                    <p class="slider-rea">réalisateur : <a href="resultat/resultat.php?search=Marc Fitoussi" title="lien vers tout les films de Marc Fitoussi">Marc Fitoussi</a></p>
                    <p class="slider-prix">Prix : 15€</p>
                    <section>
                        <a class="button" type="button" href="./panier/Insertpanier.php?id=16" title="ajout panier ">Ajouter au panier</a>
                    </section>
                </div>
                <div class="img-div div4">
                    <p class="slider-txt">Un petit miracle</p>
                    <p class="slider-rea">réalisateur : <a href="resultat/resultat.php?search=Sophie Boudre" title="lien vers tout les films de Sophie Boudre">Sophie Boudre</a></p>
                    <p class="slider-prix">Prix : 19€</p>
                    <section>
                        <a class="button" type="button" href="./panier/Insertpanier.php?id=20" title="ajout panier ">Ajouter au panier</a>
                    </section>
                </div>
                <div class="img-div div5" >
                    <p class="slider-txt">Valérian et la cité des milles planètes</p>
                    <p class="slider-rea">réalisateur : <a href="resultat/resultat.php?search=Luc Besson" title="lien vers tout les films de Luc Besson">Luc Besson</a></p>
                    <p class="slider-prix">Prix : 9€</p>
                    <section>
                        <a class="button" type="button" href="./panier/Insertpanier.php?id=2" title="ajout panier ">Ajouter au panier</a>
                    </section>
                </div>
                <div class="img-div div6">
                    <p class="slider-txt">X-Men : Dark Phoenix</p>
                    <p class="slider-rea">réalisateur : <a href="resultat/resultat.php?search=Simon Kinberg" title="lien vers tout les films de Simon Kinberg">Simon Kinberg</a></p>
                    <p class="slider-prix">Prix : 16€</p>
                    <section>
                        <a class="button" type="button" href="./panier/Insertpanier.php?id=1" title="ajout panier ">Ajouter au panier</a>
                    </section>
                </div>
                <div class="img-div div7">
                    <p class="slider-txt">Zodi et Téhu, frères du desert</p>
                    <p class="slider-rea">réalisateur : <a href="resultat/resultat.php?search=Eric Barbier" title="lien vers tout les films de Eric Barbier">Eric Barbier</a></p>
                    <p class="slider-prix">Prix : 17€</p>
                    <section>
                        <a class="button" type="button" href="./panier/Insertpanier.php?id=13" title="ajout panier ">Ajouter au panier</a>
                    </section>
                </div>
            </div>
        </section>

        <section>
            <h3>Bienvenue sur CINE ADDICT WEBSITE </h3>
            <div class="textepresentation">
                <p> 
                    <i class="fa-solid fa-clapperboard"></i> 
                    <strong>CINE ADDICT</strong> est <strong>LA</strong> vidéothèque en ligne qui va nourrir votre passion pour le cinéma !
                    <i class="fa-solid fa-clapperboard"></i>
                    <br><br> Préparez-vous à plonger dans un océan de films 
                    du genre actions et comédies de toutes les époques, prêts à être loués et appréciés depuis le confort de votre propre canapé. Que vous soyez un fan de n'importe quelle oeuvre, notre sélection de films de qualité répondra à toutes vos envies. <br> 
                    Nous avons rassemblé les titres les plus populaires et les plus acclamés ainsi que des joyaux moins connus qui méritent d'être découvert... <br>
                    Notre interface conviviale et facile à utiliser vous permettra de naviguer rapidement entre les genres, les réalisateurs et les titres pour vos soirée cinéma. <br>
                    Que vous cherchiez à organiser une soirée cinéma entre amis, à organiser une projection en famille ou simplement à vous détendre seul avec un bon film, "cine addict" à tout ce qu'il vous faut. <br>
                    Rejoignez dès maintenant notre communauté de cinéphiles passionnés et commencez à explorer notre vaste collections de films à louer. <br>
                    <strong>Avec "CINE ADDICT", chaque soirée peut devenir une aventure cinématographique ...</strong> 
                </p>
            </div>
        </section>

        <section>
            <h4>Nouveautés : prochainement disponible sur notre site</h4>
            <div class="divyoutube">
                <div class="video-container">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/eHp3MbsCbMg" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
            <div class="divyoutube">
                <div class="video-container">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/TNvXaQrS-e0" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
            <h5>Nos partenaires : </h5>
            <div class="slider1">
                <div class="img-div1 div10"></div>
                <div class="img-div1 div11"></div>
                <div class="img-div1 div12"></div>
                <div class="img-div1 div13"></div>
                <div class="img-div1 div14"></div>
                <div class="img-div1 div15"></div>
                <div class="img-div1 div16"></div>
                <div class="img-div1 div17"></div>
                <div class="img-div1 div18"></div>
                <div class="img-div1 div19"></div>
                <div class="img-div1 div20"></div>
                <div class="img-div1 div21"></div>
                <div class="img-div1 div22"></div>
                <div class="img-div1 div23"></div>
                <div class="img-div1 div24"></div>
            </div>
        </section>

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
                    <li><a href="#" title="liens vers accueil">Accueil</a></li>
                    <li><a href="categorie action/action.php" title="liens vers film d'action">Film d'action</a></li>
                    <li><a href="categorie comedie/comedie.php" title="liens vers film de comédie">Film de comédie</a></li>
                    <?php
                    if (!isset($_SESSION['IsLog']) OR $_SESSION['IsLog'] == False){
                        ?>
                        <li><a href="login/login.php" title="page de connexion">Connexion</a></li>
                        <?php
                    }
                    else { ?>
                        <li><a href="login/logout.php" title="page de déconnexion">Déconnexion</a></li>
                        <?php
                    }
                    ?>
                    <li><a href="register/register.php" title="page d'enregistrement">Inscription</a></li>
                </ul>
            </div>
            <div class="row">
                CINE ADDICT WEBSITE Copyright © 2023 - All rights reserved || Designed By: Tommy Brisset
            </div>
        </div>
    </footer>
    
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.0.0.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.3.2.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
	<script src="effet.js"></script>
    <script src="effet1.js"></script>
</body>
</html>