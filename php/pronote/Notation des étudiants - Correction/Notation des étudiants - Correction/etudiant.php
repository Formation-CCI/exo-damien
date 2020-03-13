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


	/*//	Requête permettant de récupérer à la fois les informations de l'étudiant et sa moyenne générale
	$requete =
	'
		SELECT
			Etudiants.prenom,
			Etudiants.nom,
			ROUND(SUM(MoyennesParMatiere.moyenne * MoyennesParMatiere.coefficient) / SUM(MoyennesParMatiere.coefficient), 2) AS moyenneGenerale
		FROM
			Etudiants
		INNER JOIN
			(
				SELECT
					Notes.idEtudiant,
					Matieres.libelle,
					ROUND(AVG(Notes.valeur), 2) AS moyenne,
					Matieres.coefficient
				FROM
					Matieres
				INNER JOIN
					Notes
				ON
					Matieres.id = Notes.idMatiere
				WHERE
					Etudiants.id = ?
				GROUP BY
					Notes.idMatiere
			) AS MoyennesParMatiere
		ON
			Etudiants.id = MoyennesParMatiere.idEtudiant
	';*/


	//	Récupération de l'étudiant

	$requete =
	'
		SELECT
			prenom,
			nom
		FROM
			Etudiants
		WHERE
			id = ?
	';

	$resultatRequete = $connexionBDD->prepare($requete);

	$resultatRequete->execute([$_GET['id']]);

	$etudiant = $resultatRequete->fetch();

	// var_dump($etudiant);

	if($etudiant === false)
	{
		exit('Cet étudiant n\'est pas dans la base de données.');
	}


	//	Récupération des matières de l'étudiant (avec leur moyenne)

	$requete =
	'
		SELECT
			Matieres.libelle,
			ROUND(AVG(Notes.valeur), 2) AS moyenne,
			Matieres.coefficient
		FROM
			Matieres
		INNER JOIN
			Notes
		ON
			Matieres.id = Notes.idMatiere
		WHERE
			Notes.idEtudiant = ?
		GROUP BY
			Notes.idMatiere
	';

	$resultatRequete = $connexionBDD->prepare($requete);

	$resultatRequete->execute([$_GET['id']]);

	$matieres = $resultatRequete->fetchAll();

	// var_dump($matieres);


	//	Moyenne générale de l'étudiant

	if(count($matieres) > 0)
	{
		$sommeMoyennesAvecCoefficient = 0;
		$sommeCoefficients = 0;

		foreach($matieres as $matiere)
		{
			$sommeMoyennesAvecCoefficient += $matiere['moyenne'] * $matiere['coefficient'];
			$sommeCoefficients += $matiere['coefficient'];
		}

		$etudiant['moyenneGenerale'] = $sommeMoyennesAvecCoefficient / $sommeCoefficients;

		// var_dump($etudiant['moyenneGenerale']);
	}

	include 'etudiant.phtml';