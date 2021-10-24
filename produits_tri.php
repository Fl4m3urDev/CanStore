<?php 
header("Content-type: application/json; charset=utf-8");
// On se  connecte, voir cours
try {
  $dns = 'mysql:host=localhost;dbname=jardin'; // dbname : nom de la base
  $utilisateur = 'root'; // root sur vos postes
  $motDePasse = ''; // pas de mot de passe sur vos postes
  $connexion = new PDO( $dns, $utilisateur, $motDePasse );
  $connexion->exec('SET NAMES utf8');
} catch (Exception $e) {
  echo "Connexion à MySQL impossible : ", $e->getMessage();
  die();
}
//print_r($_POST['category']);
$requete = "SELECT * FROM produits";   

if($_POST['category']!='Tous')
{
    $requete .= " WHERE  type = '".strtolower($_POST['category'])."'"; 
}

// Envoi de la requête vers MySQL
$select = $connexion->query($requete);
$produits = json_encode($select->fetchAll( PDO::FETCH_ASSOC ));

print_r($produits);

?>

