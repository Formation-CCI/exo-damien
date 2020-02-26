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

	//	Si le filtre sur le titre a été renseigné…
	if(array_key_exists('title', $_GET) && !empty($_GET['title']))
	{
		// $movies = array_filter($movies, function($movie)
		// {
		// 	return stripos($movie['title'], $_GET['title']) !== false;
		// });

		foreach($movies as $key => $movie)
		{
			if(stripos($movie['title'], $_GET['title']) === false)
			{
				unset($movies[$key]);
			}
		}
	}

	//	Si le filtre de la durée maximale a été renseigné…
	if(array_key_exists('maximumDuration', $_GET) && !empty($_GET['maximumDuration']))
	{
		// $movies = array_filter($movies, function($movie)
		// {
		// 	return $movie['duration'] <= $_GET['maximumDuration'];
		// });

		foreach($movies as $key => $movie)
		{
			if($movie['duration'] > $_GET['maximumDuration'])
			{
				unset($movies[$key]);
			}
		}
	}

	//	Inclusion du HTML
	include 'index.phtml';