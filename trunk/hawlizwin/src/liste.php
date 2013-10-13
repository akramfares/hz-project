<?php
// on vérifie l'existance de l'un des variables envoyé par index.html
if(isset($_GET['debut']) || isset($_GET['id'])) {
 
    $json = array();
 
    if(isset($_GET['debut'])) {// lorsq'on n'a pas la liste des régions
        // requête qui récupère les régions
        $requete = "SELECT id, region AS data FROM region ORDER BY region";
    } else if(isset($_GET['id'])) { // lorsq'on demande les villes d'une région
        $id = htmlentities(intval($_GET['id'])); //Convertir tous les caractères éligibles en entités HTML
        // requête qui récupère les villes selon la région
        $requete = "SELECT id, ville AS data FROM ville WHERE region = ". $id ." ORDER BY ville";
    }
 
    // connexion à la base de données
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=abdelgha_hawlizwin', 'abdelgha_pricyme', 'mamane12x');
    } catch(Exception $e) {
        exit('Impossible de se connecter à la base de données.');
    }
    // exécution de la requête
    $resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));
 
    // résultats
    while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
        // je remplis un tableau et mettant l'id en index (que ce soit pour les régions ou les villes)
        $json[$donnees['id']][] = utf8_encode($donnees['data']); // data ici peut être les noms des régions ou bien des villes vérifier l'ordre SQL utilisé
    }
 
    // envoi du résultat au success
    echo json_encode($json);
}
?>