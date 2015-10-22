<?php
function get_billets($offset, $limit){
	/**
	 * La connexion à la base de données aura été faite précédemment.
	 *  On récupère l'objet $bdd global représentant la connexion à 
	 *  la base et on l'utilise pour effectuer notre requête SQL
	 * 
	 * */
    global $bdd;
    $offset = (int) $offset;
    $limit = (int) $limit;
        
    $req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') 
    		              AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT :offset, :limit');
    $req->bindParam(':offset', $offset, PDO::PARAM_INT);
    $req->bindParam(':limit', $limit, PDO::PARAM_INT);
    $req->execute();
    $billets = $req->fetchAll();
    
    
    return $billets;
}