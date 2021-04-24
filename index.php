<?php

	/* Charge le fichier de configuration */
	require_once __DIR__ . '/config.php';

	/* Connexion à la base de données */
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD);
	/* Vérification de la connexion */
	if ($mysqli->connect_errno) {
		printf("Échec de la connexion : %s\n", $mysqli->connect_error);
		exit();
	}

	/* Change la base de données courante */
	$mysqli->select_db(DB_NAME);
	
	/* Retourne le nom de la base de données courante
	if ($result = $mysqli->query("SELECT DATABASE()")) {
		$row = $result->fetch_row();
		printf($row[0]);
		$result->close();
	}*/
	
	/* Charge la liste des utilisateurs de WP */
	/* Lancement de la requete des utilisateurs */
	$sql="SELECT * FROM membres_club";
	if (($result = $mysqli->query($sql))===false ) {
		printf("Requête invalide: %s\nWhole query: %s\n", $mysqli->error, $sql);
		exit();
	}
?>

<!doctype html>
<html>
	<head>
		<title>TEST PHP</title>
		<link rel="stylesheet" href="http://192.168.1.22/test/test.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto|Montserrat|Ubuntu|New+Tegomin">
		<!--link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet"-->
	</head>
	<body>
		<div class="tophead">
			Voici mon premier site web, avec php, MySQL et CSS !
		</div>
		<div class="container">
			<div class="data-list">
				<div class="part-title">Liste des utilisateurs : </div>
				<span class="divider"></span>
			</div>
			<div class="container">
				<table>
				<tr>
					<th>Login</th>
					<th>Nom</th>
					<th>Prénom</th>
					<th>Nom</th>
					<th>Rôle</th>
				</tr>
				<?php while ($row = $result->fetch_array()) { ?>
				<tr>
					<td><?php echo $row["LOGIN"]; ?></td>
					<td><?php echo $row["NOM COMPLET"]; ?></td>
					<td><?php echo $row["PRENOM"]; ?></td>
					<td><?php echo $row["NOM"]; ?></td>
					<td><?php echo $row["ROLE"]; ?></td>
				</tr>
				<?php } ?>
				</table>
			</div>
		</div>

		<div class="container">
			<h3>Ajouter une banque :</h3>
			<form action = "traitement.php" method="post">
				<div class="row">
					<div class="col-25">
						<label for="fname">Code banque :</label>
					</div>
					<div class="col-75">
						<input type="text" id="banque_code" name="banque_code" placeholder="Entrez le code de la banque ici">
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="fname">Nom de la banque :</label>
					</div>
					<div class="col-75">
						<input type="text" id="banque_nom" name="banque_nom" placeholder="Entrez le nom de la banque ici">
					</div>
				</div>
				<input type = "submit" value = "Envoyer">
			</form>
		</div>
	</body>
</html>
