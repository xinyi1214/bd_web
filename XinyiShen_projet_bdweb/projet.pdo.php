<?php

	//Ce php s'occupe la partie recherche pour le site web

	//connecter le sql
	$serveur = "localhost" ;
	$bd = "projet" ;
	$login = "root" ;
	$mdp = "root" ;
	try {
		$sql = new PDO('mysql:host='.$serveur.';dbname='.$bd, $login, $mdp,
    	array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")) ;

   		//afficher les résultats
		
		//Si tous les champs de la recheche sont vides
		if (empty($_POST["nomauteur"]) && empty($_POST["nompoeme"]) && empty($_POST["terme"])) {
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
				footer {
  							background: #f5f3f0;
  							text-align: center;
  							padding:10px;
  						
        				}
        		h2 {
        			background:#f5f3f0;
        			padding: 10px;
        		}
    		</style>

    		<header>
            <div class="headerimage">
                <img src="img/header.jpg" alt="Show" Style="width:100%">
                <div class="centered-text">
                <h1>Résultats de recherche</h1>
                </div>
            </div>
        </header>';
			echo "<h2>Il faut remplir au moins un champ!</h2>";
			echo "<footer>
            <p>Copyright : Xinyi Shen 2021</p>
        </footer>";
			}
		// Si le champ terme est rempli
		elseif (empty($_POST["nomauteur"]) && empty($_POST["nompoeme"])) {
			$statement1 = $sql->prepare("SELECT poeme_fr.nom_fr, poeme_fr.auteur_fr, poeme_fr.poeme_fr, poeme_fr.terme_fr, poeme_ch.nom_ch, poeme_ch.auteur_ch, poeme_ch.poeme_ch, poeme_ch.terme_ch FROM poeme_ch JOIN poeme_fr ON poeme_ch.id_poeme = poeme_fr.id_poeme WHERE poeme_fr.terme_fr= :terme_fr ") ;
    		$statement1->execute(array(
    		":terme_fr" => $_POST['terme']
    		));
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
                <h1>Résultats de recherche</h1>
                </div>
            </div>
        </header>';
    		if ($_POST){
        		echo '
        			<style>
        				table {
        					border-collapse: collapse;
        					background : #f5f3f0;
        				}
        				td, th {
        					border: 1px solid #f5f3f0;
  							text-align: left;
  							padding: 8px;
  							}
  						footer {
  							background: #f5f3f0;
  							text-align: center;
  							padding:10px;
        				}        				
        			</style>

        			<table>
               			 <tr>
                    		<th>nom en français</th>
                    		<th>nom en chinois</th>
                    		<th>auteur en français</th>
                    		<th>auteur en chinois</th>
                    		<th>poème en français</th>
                    		<th>poème originale</th>
                    		<th>terme en français</th>
                    		<th>terme en chinois</th>
                		</tr>';
        		foreach($statement1 as $row){
            		echo '<tr>
                   			<td>'.$row["nom_fr"].'</td>
                    		<td>'.$row["nom_ch"].'</td>
                    		<td>'.$row["auteur_fr"].'</td>
                    		<td>'.$row["auteur_ch"].'</td>
                    		<td>'.$row["poeme_fr"].'</td>
                    		<td>'.$row["poeme_ch"].'</td>
                    		<td>'.$row["terme_fr"].'</td>
                    		<td>'.$row["terme_ch"].'</td>
                		</tr>';
        					}
        		echo '</table>
        	<footer>
            <p>Copyright : Xinyi Shen 2021</p>
        </footer>';}
    		}

    	//Si le champ nom de la poème est rempli
		elseif (empty($_POST["nomauteur"]) && empty($_POST["terme"])) {
			$statement2 = $sql->prepare("SELECT poeme_fr.nom_fr, poeme_fr.auteur_fr, poeme_fr.poeme_fr, poeme_fr.terme_fr, poeme_ch.nom_ch, poeme_ch.auteur_ch, poeme_ch.poeme_ch, poeme_ch.terme_ch FROM poeme_ch JOIN poeme_fr ON poeme_ch.id_poeme = poeme_fr.id_poeme WHERE poeme_fr.nom_fr = :nompoeme");
			$statement2->execute(array(
				":nompoeme" => $_POST['nompoeme']));
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
                <h1>Résultats de recherche</h1>
                </div>
            </div>
        </header>';
			if ($_POST){
        		echo '<style>
        				table {
        					border-collapse: collapse;
        					background : #f5f3f0;
        				}
        				td, th {
        					border: 1px solid #f5f3f0;
  							text-align: left;
  							padding: 8px;
  							}
  						footer {
  							background: #f5f3f0;
  							text-align: center;
  							padding:10px;
  						
        				}		
        				}
        				
        			</style>
       				
        		<table>
               			 <tr>
                    		<th>nom en français</th>
                    		<th>nom en chinois</th>
                    		<th>auteur en français</th>
                    		<th>auteur en chinois</th>
                    		<th>poème en français</th>
                    		<th>poème originale</th>
                    		<th>terme en français</th>
                    		<th>terme en chinois</th>
                		</tr>';
        		foreach($statement2 as $row){
            		echo '<tr>
                   			<td>'.$row["nom_fr"].'</td>
                    		<td>'.$row["nom_ch"].'</td>
                    		<td>'.$row["auteur_fr"].'</td>
                    		<td>'.$row["auteur_ch"].'</td>
                    		<td>'.$row["poeme_fr"].'</td>
                    		<td>'.$row["poeme_ch"].'</td>
                    		<td>'.$row["terme_fr"].'</td>
                    		<td>'.$row["terme_ch"].'</td>
                		</tr>';

        					}
        		echo '</table>
        		<footer>
            <p>Copyright : Xinyi Shen 2021</p>
        </footer>';}
			}

		//Si le champ auteur est rempli
		elseif (empty($_POST["terme"]) && empty($_POST["nompoeme"])) {
			$statement3 = $sql->prepare("SELECT poeme_fr.nom_fr, poeme_fr.auteur_fr, poeme_fr.poeme_fr, poeme_fr.terme_fr, poeme_ch.nom_ch, poeme_ch.auteur_ch, poeme_ch.poeme_ch, poeme_ch.terme_ch FROM poeme_ch JOIN poeme_fr ON poeme_ch.id_poeme = poeme_fr.id_poeme WHERE poeme_fr.auteur_fr = :nomauteur");
			$statement3->execute(array(
				":nomauteur" => $_POST['nomauteur']));
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
                <h1>Résultats de recherche</h1>
                </div>
            </div>
        </header>';
			if ($_POST){
        		echo '<style>
        				table {
        					border-collapse: collapse;
        					background : #f5f3f0;
        				}
        				td, th {
        					border: 1px solid #f5f3f0;
  							text-align: left;
  							padding: 8px;
  							}
  						footer {
  							background: #f5f3f0;
  							text-align: center;
  							padding:10px;
  						
        				}        				
       				}
        				
        			</style>        			
        		<table>
               			 <tr>
                    		<th>nom en français</th>
                    		<th>nom en chinois</th>
                    		<th>auteur en français</th>
                    		<th>auteur en chinois</th>
                    		<th>poème en français</th>
                    		<th>poème originale</th>
                    		<th>terme en français</th>
                    		<th>terme en chinois</th>
                		</tr>';
        		foreach($statement3 as $row){
            		echo '<tr>
                   			<td>'.$row["nom_fr"].'</td>
                    		<td>'.$row["nom_ch"].'</td>
                    		<td>'.$row["auteur_fr"].'</td>
                    		<td>'.$row["auteur_ch"].'</td>
                    		<td>'.$row["poeme_fr"].'</td>
                    		<td>'.$row["poeme_ch"].'</td>
                    		<td>'.$row["terme_fr"].'</td>
                    		<td>'.$row["terme_ch"].'</td>
                		</tr>';

        					}
        		echo '</table>
        		<footer>
            <p>Copyright : Xinyi Shen 2021</p>
        </footer>';}

			}

		//Si les champ auteur est le nom de la poème sont remplis
		elseif (empty($_POST["terme"])) {
			$statement4 = $sql->prepare("SELECT poeme_fr.nom_fr, poeme_fr.auteur_fr, poeme_fr.poeme_fr, poeme_fr.terme_fr, poeme_ch.nom_ch, poeme_ch.auteur_ch, poeme_ch.poeme_ch, poeme_ch.terme_ch FROM poeme_ch JOIN poeme_fr ON poeme_ch.id_poeme = poeme_fr.id_poeme WHERE poeme_fr.auteur_fr = :nomauteur and poeme_fr.nom_fr = :nompoeme");
			$statement4->execute(array(
				":nomauteur" => $_POST['nomauteur'],
				":nompoeme"=> $_POST["nompoeme"]));
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
                <h1>Résultats de recherche</h1>
                </div>
            </div>
        </header>';
			if ($_POST){
        		echo '<style>
        				table {
        					border-collapse: collapse;
        					background : #f5f3f0;
        				}
        				td, th {
        					border: 1px solid #f5f3f0;
  							text-align: left;
  							padding: 8px;
  							}
  						footer {
  							background: #f5f3f0;
  							text-align: center;
  							padding:10px;
  						
        				}        				        			 						
        				}
        				
        			</style>
        			
        		<table>
               			 <tr>
                    		<th>nom en français</th>
                    		<th>nom en chinois</th>
                    		<th>auteur en français</th>
                    		<th>auteur en chinois</th>
                    		<th>poème en français</th>
                    		<th>poème originale</th>
                    		<th>terme en français</th>
                    		<th>terme en chinois</th>
                		</tr>';
        		foreach($statement4 as $row){
            		echo '<tr>
                   			<td>'.$row["nom_fr"].'</td>
                    		<td>'.$row["nom_ch"].'</td>
                    		<td>'.$row["auteur_fr"].'</td>
                    		<td>'.$row["auteur_ch"].'</td>
                    		<td>'.$row["poeme_fr"].'</td>
                    		<td>'.$row["poeme_ch"].'</td>
                    		<td>'.$row["terme_fr"].'</td>
                    		<td>'.$row["terme_ch"].'</td>
                		</tr>';

        					}
        		echo '</table>
        		<footer>
            <p>Copyright : Xinyi Shen 2021</p>
        </footer>';}
			}

		//Si les champs auteur et terme sont rempli
		elseif (empty($_POST["nompoeme"])) {
			$statement5 = $sql->prepare("SELECT poeme_fr.nom_fr, poeme_fr.auteur_fr, poeme_fr.poeme_fr, poeme_fr.terme_fr, poeme_ch.nom_ch, poeme_ch.auteur_ch, poeme_ch.poeme_ch, poeme_ch.terme_ch FROM poeme_ch JOIN poeme_fr ON poeme_ch.id_poeme = poeme_fr.id_poeme WHERE poeme_fr.auteur_fr = :nomauteur and poeme_fr.terme_fr = :terme_fr");
			$statement5->execute(array(
				":nomauteur" => $_POST['nomauteur'],
				":terme_fr" => $_POST["terme"]));
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
                <h1>Résultats de recherche</h1>
                </div>
            </div>
        </header>';
			if ($_POST){
        		echo '<style>
        				table {
        					border-collapse: collapse;
        					background : #f5f3f0;
        				}
        				td, th {
        					border: 1px solid #f5f3f0;
  							text-align: left;
  							padding: 8px;
  							}
  						footer {
  							background: #f5f3f0;
  							text-align: center;
  							padding:10px;
  						
        				}        				 						
        				}
        				
        			</style>        			
        		<table>
               			 <tr>
                    		<th>nom en français</th>
                    		<th>nom en chinois</th>
                    		<th>auteur en français</th>
                    		<th>auteur en chinois</th>
                    		<th>poème en français</th>
                    		<th>poème originale</th>
                    		<th>terme en français</th>
                    		<th>terme en chinois</th>
                		</tr>';
        		foreach($statement5 as $row){
            		echo '<tr>
                   			<td>'.$row["nom_fr"].'</td>
                    		<td>'.$row["nom_ch"].'</td>
                    		<td>'.$row["auteur_fr"].'</td>
                    		<td>'.$row["auteur_ch"].'</td>
                    		<td>'.$row["poeme_fr"].'</td>
                    		<td>'.$row["poeme_ch"].'</td>
                    		<td>'.$row["terme_fr"].'</td>
                    		<td>'.$row["terme_ch"].'</td>
                		</tr>';

        					}
        		echo '</table>
        		<footer>
            <p>Copyright : Xinyi Shen 2021</p>
        </footer>';}
			}

		//Si le champ nom de la poème et terme sont remplis
		elseif (empty($_POST["nomauteur"])) {
			$statement6 = $sql->prepare("SELECT poeme_fr.nom_fr, poeme_fr.auteur_fr, poeme_fr.poeme_fr, poeme_fr.terme_fr, poeme_ch.nom_ch, poeme_ch.auteur_ch, poeme_ch.poeme_ch, poeme_ch.terme_ch FROM poeme_ch JOIN poeme_fr ON poeme_ch.id_poeme = poeme_fr.id_poeme WHERE poeme_fr.nom_fr = :nompoeme and poeme_fr.terme_fr = :terme_fr");
			$statement6->execute(array(
				":nompoeme" => $_POST['nompoeme'],
				":terme_fr" => $_POST["terme"]));
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
                <h1>Résultats de recherche</h1>
                </div>
            </div>
        </header>';
			if ($_POST){
        		echo '<style>
        				table {
        					border-collapse: collapse;
        					background : #f5f3f0;
        				}
        				td, th {
        					border: 1px solid #f5f3f0;
  							text-align: left;
  							padding: 8px;
  							}
  						footer {
  							background: #f5f3f0;
  							text-align: center;
  							padding:10px;
  						
        				}        				        			  						
        				}
        				
        			</style>        			
        		<table>
               			 <tr>
                    		<th>nom en français</th>
                    		<th>nom en chinois</th>
                    		<th>auteur en français</th>
                    		<th>auteur en chinois</th>
                    		<th>poème en français</th>
                    		<th>poème originale</th>
                    		<th>terme en français</th>
                    		<th>terme en chinois</th>
                		</tr>';
        		foreach($statement6 as $row){
            		echo '<tr>
                   			<td>'.$row["nom_fr"].'</td>
                    		<td>'.$row["nom_ch"].'</td>
                    		<td>'.$row["auteur_fr"].'</td>
                    		<td>'.$row["auteur_ch"].'</td>
                    		<td>'.$row["poeme_fr"].'</td>
                    		<td>'.$row["poeme_ch"].'</td>
                    		<td>'.$row["terme_fr"].'</td>
                    		<td>'.$row["terme_ch"].'</td>
                		</tr>';

        					}
        		echo '</table>
        		<footer>
            <p>Copyright : Xinyi Shen 2021</p>
        </footer>';}
			}

		//Si tous les champs sont remplis
		else {
			$statement7 = $sql->prepare("SELECT poeme_fr.nom_fr, poeme_fr.auteur_fr, poeme_fr.poeme_fr, poeme_fr.terme_fr, poeme_ch.nom_ch, poeme_ch.auteur_ch, poeme_ch.poeme_ch, poeme_ch.terme_ch FROM poeme_ch JOIN poeme_fr ON poeme_ch.id_poeme = poeme_fr.id_poeme WHERE poeme_fr.nom_fr = :nompoeme AND poeme_fr.terme_fr = :terme_fr AND poeme_fr.auteur_fr = :nomauteur");
			$statement7->execute(array(
				":nompoeme" => $_POST['nompoeme'],
				":terme_fr" => $_POST["terme"],
				":nomauteur" => $_POST["nomauteur"]));
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
                <h1>Résultats de recherche</h1>
                </div>
            </div>
        </header>';
			if ($_POST){
        		echo '<style>
        				table {
        					border-collapse: collapse;
        					background : #f5f3f0;
        				}
        				td, th {
        					border: 1px solid #f5f3f0;
  							text-align: left;
  							padding: 8px;
  							}
  						footer {
  							background: #f5f3f0;
  							text-align: center;
  							padding:10px;
  						
        				}
        					        				}
        				
        			</style>
        			
        		<table>
               			 <tr>
                    		<th>nom en français</th>
                    		<th>nom en chinois</th>
                    		<th>auteur en français</th>
                    		<th>auteur en chinois</th>
                    		<th>poème en français</th>
                    		<th>poème originale</th>
                    		<th>terme en français</th>
                    		<th>terme en chinois</th>
                		</tr>';
        		foreach($statement7 as $row){
            		echo '<tr>
                   			<td>'.$row["nom_fr"].'</td>
                    		<td>'.$row["nom_ch"].'</td>
                    		<td>'.$row["auteur_fr"].'</td>
                    		<td>'.$row["auteur_ch"].'</td>
                    		<td>'.$row["poeme_fr"].'</td>
                    		<td>'.$row["poeme_ch"].'</td>
                    		<td>'.$row["terme_fr"].'</td>
                    		<td>'.$row["terme_ch"].'</td>
                		</tr>';

        					}
        		echo '</table>
        		<footer>
            <p>Copyright : Xinyi Shen 2021</p>
        </footer>';}
		}		

	}
		catch(PDOException $e) {
        echo "Erreur de connexion à la base de données " . $e->getMessage() ;
        die();
        }
?>