<?php
	/**
	 * Controleur Globale De Site
	 */
	 //On va faire une connection avec notre BDD
	include_once('Modele/connexion_sql.php');

	if (!isset($_GET['section']) OR $_GET['section'] == 'index'){
		include_once('Controleur/blog/index.php');
	}