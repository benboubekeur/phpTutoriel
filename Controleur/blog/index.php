<?php

	// On demande les 5 derniers billets (mod�le)
	include_once('Modele/blog/get_billets.php');
	
	//$billets contient tout la resultats de requete
	$billets = get_billets(0, 5);
	
	// On effectue du traitement sur les donn�es (contr�leur)
	// Ici, on doit surtout s�curiser l'affichage
	
	foreach($billets as $key => $billet){
	    $billets[$key]['titre'] = htmlspecialchars($billet['titre']);
	    $billets[$key]['contenu'] = nl2br(htmlspecialchars($billet['contenu']));
	}
	/***
	 * 
	 *   Vous noterez qu'on op�re sur les cl�s du tableau plut�t que sur
	 *   $billet (sans s) directement. En effet, $billet est une copie 
	 *   du tableau $billets cr��e par le foreach. $billet n'existe qu'�
	 *   l'int�rieur du foreach, il est ensuite supprim�. Pour �viter
	 *   les failles XSS, il faut agir sur le tableau utilis� � l'affichage,
	 *   c'est-�-dire $billets.
	 */
	// On affiche la page (vue)
	include_once('Vue/blog/vue1.php');