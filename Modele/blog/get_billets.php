<?php
function get_billets($offset, $limit){
	/**
	 * La connexion � la base de donn�es aura �t� faite pr�c�demment.
	 *  On r�cup�re l'objet $bdd global repr�sentant la connexion � 
	 *  la base et on l'utilise pour effectuer notre requ�te SQL
	 * 
	 * */
    global $bdd;
    $offset = (int) $offset;
    $limit = (int) $limit;
        
    $req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y � %Hh%imin%ss\') 
    		              AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT :offset, :limit');
    $req->bindParam(':offset', $offset, PDO::PARAM_INT);
    $req->bindParam(':limit', $limit, PDO::PARAM_INT);
    $req->execute();
    $billets = $req->fetchAll();
    
    
    return $billets;
}