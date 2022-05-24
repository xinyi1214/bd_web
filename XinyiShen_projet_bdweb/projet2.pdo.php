<?php

	//Ce php s'occupe la partie ajout

	//connecter le sql
	$serveur = "localhost" ;
	$bd = "projet" ;
	$login = "root" ;
	$mdp = "root" ;
	try {
		$sql = new PDO('mysql:host='.$serveur.';dbname='.$bd, $login, $mdp,
    	array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")) ;

    	$nom_fr = $_POST['nom_fr'];
    	$nom_ch = $_POST['nom_ch'];
        $auteur_fr = $_POST['auteur_fr'];
        $auteur_ch = $_POST['auteur_ch'];
        $terme_fr = $_POST['terme_fr'];
        $terme_ch = $_POST['terme_ch'];
        $poeme_fr = $_POST['poeme_fr'];
        $poeme_ch = $_POST['poeme_ch'];
        if (!($nom_ch && $nom_fr && $auteur_fr && $auteur_ch && $terme_fr && $terme_ch && $poeme_fr && $poeme_ch)){
        	exit;
        }
 
        $statement1 = $sql->prepare("INSERT INTO poeme_ch(nom_ch, auteur_ch, poeme_ch, terme_ch) VALUES (?,?,?,?)");
        $statement1->bindParam(1, $nom_ch);
        $statement1->bindParam(2, $auteur_ch);
        $statement1->bindParam(3, $poeme_ch);
        $statement1->bindParam(4, $terme_ch);
        $resultat1 = $statement1 -> execute();

        $statement2 = $sql ->prepare("INSERT INTO poeme_fr(nom_fr, auteur_fr, poeme_fr, terme_fr) VALUES (?,?,?,?)") ;      
        $statement2->bindParam(1, $nom_fr);
        $statement2->bindParam(2, $auteur_fr);
        $statement2->bindParam(3, $poeme_fr);
        $statement2->bindParam(4, $terme_fr);
        $resultat2 = $statement2 -> execute();

   		if ($resultat1 && $resultat2){
   			echo '<style>
    			.headerimage {
   				position:relative;
   				text-align:center;
    			color:black;
							}

				.centered-text {
				    position: absolute;
				    top: 50%;
				    left: 50%;
				    transform: translate(-50%, -50%);
				}
    		</style>

    		<header>
            <div class="headerimage">
                <img src="img/header.jpg" alt="Show" Style="width:100%">
                <div class="centered-text">
                <h1>Résultats d\'ajout/h1>
                </div>
            </div>
        </header>';
        		echo '<style>
  						footer {
  							background: #f5f3f0;
  							text-align: center;
  							padding:10px;
        				}
        				
        			</style>';
                echo '<main style="background-color: #f5f3f0;">Vous avez bien ajouté les données.</main>';
                echo '<footer>
            <p>Copyright : Xinyi Shen 2021</p>
        </footer>';
            }  		
   		}

    catch(PDOException $e) {
        echo "Erreur de connexion à la base de données " . $e->getMessage() ;
        die();
        }
?>
