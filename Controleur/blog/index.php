<?php

	// On demande les 5 derniers billets (modèle)
	include_once('Modele/blog/get_billets.php');
	
	//$billets contient tout la resultats de requete
	$billets = get_billets(0, 5);
	
	// On effectue du traitement sur les données (contrôleur)
	// Ici, on doit surtout sécuriser l'affichage
	
	foreach($billets as $key => $billet){
	    $billets[$key]['titre'] = htmlspecialchars($billet['titre']);
	    $billets[$key]['contenu'] = nl2br(htmlspecialchars($billet['contenu']));
	}
	/***
	 * 
	 *   Vous noterez qu'on opère sur les clés du tableau plutôt que sur
	 *   $billet (sans s) directement. En effet, $billet est une copie 
	 *   du tableau $billets créée par le foreach. $billet n'existe qu'à
	 *   l'intérieur du foreach, il est ensuite supprimé. Pour éviter
	 *   les failles XSS, il faut agir sur le tableau utilisé à l'affichage,
	 *   c'est-à-dire $billets.
	 */
	// On affiche la page (vue)
	include_once('Vue/blog/vue1.php');