<?php

	//	Récupération des films
	$movies = json_decode(file_get_contents('movies.json'), true);

	//	Formate une durée (ex. : 90 -> 1 h 30 min)
	function formatDuration($duration)
	{
		$hours = intval($duration / 60);
		$minutes = $duration % 60;

		if($hours > 0)
		{
			$formattedDuration = $hours.' h '.$minutes.' min';
		}
		else
		{
			$formattedDuration = $minutes.' min';
		}

		return $formattedDuration;
	}

	//	Récupération du film
	$movie = $movies[$_GET['key']];

	//	Inclusion du HTML
	include 'movie.phtml';