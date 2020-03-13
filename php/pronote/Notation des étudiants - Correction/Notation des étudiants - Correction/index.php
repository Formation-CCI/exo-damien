<?php

	//	Connexion à la base de données

	$connexionBDD = new PDO
	(
		'mysql:host=localhost;dbname=Cours;charset=utf8',
		'root',
		'',
		[
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		]
	);

	// var_dump($connexionBDD);


	//	Récupération des étudiants

	$requete =
	'
		SELECT
			id,
			prenom,
			nom
		FROM
			Etudiants
		ORDER BY
			nom ASC,
			prenom ASC
	';

	$resultatRequete = $connexionBDD->query($requete);

	$etudiants = $resultatRequete->fetchAll();

	// var_dump($etudiants);


	//	Récupération des matières

	$requete =
	'
		SELECT
			id,
			libelle
		FROM
			Matieres
		ORDER BY
			libelle ASC
	';

	$resultatRequete = $connexionBDD->query($requete);

	$matieres = $resultatRequete->fetchAll();

	// var_dump($matieres);


	//	Ajout d'une note (traitement du formulaire soumis le cas échéant)

	if(!empty($_POST))
	{
		$requete =
		'
			INSERT INTO
				Notes
				(valeur, idEtudiant, idMatiere)
			VALUES
				(?, ?, ?)
		';

		$resultatRequete = $connexionBDD->prepare($requete);

		$resultatRequete->execute([$_POST['note'], $_POST['idEtudiant'], $_POST['idMatiere']]);

		$ajoutEffectue = $resultatRequete->rowCount() == 1;

		// var_dump($ajoutEffectue);
	}

	include 'index.phtml';