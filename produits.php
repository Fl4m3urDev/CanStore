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

// Envoi de la requête vers MySQL
$select = $connexion->query("SELECT * FROM produits");
$produits = json_encode($select->fetchAll( PDO::FETCH_ASSOC ));
//$produits = json_encode( $array );

print_r($produits);
// $produits = array (
//   0 => 
//   array (
//     'nom' => 'Soupe de carottes et coriandre',
//     'prix' => 1.49,
//     'image' => 'carrotcoriander.jpg',
//     'type' => 'soupe',
//     'nutriscore' => 'D',
//   ),
//   1 => 
//   array (
//     'nom' => 'Soupe de nouilles au poulet',
//     'prix' => 1.89,
//     'image' => 'chickennoodle.jpg',
//     'type' => 'soupe',
//     'nutriscore' => 'D',
//   ),
//   2 => 
//   array (
//     'nom' => 'bœuf salé',
//     'prix' => 2.39,
//     'image' => 'cornedbeef.jpg',
//     'type' => 'viande',
//     'nutriscore' => 'E',
//   ),
//   3 => 
//   array (
//     'nom' => 'fèves au lard',
//     'prix' => 0.4,
//     'image' => 'beans.jpg',
//     'type' => 'legumes',
//     'nutriscore' => 'B',
//   ),
//   4 => 
//   array (
//     'nom' => 'hot-dogs',
//     'prix' => 1.99,
//     'image' => 'hotdogs.jpg',
//     'type' => 'viande',
//     'nutriscore' => 'E',
//   ),
//   5 => 
//   array (
//     'nom' => 'purée de pois',
//     'prix' => 0.58,
//     'image' => 'mushypeas.jpg',
//     'type' => 'legumes',
//     'nutriscore' => 'B',
//   ),
//   6 => 
//   array (
//     'nom' => 'Soupe à la tomate',
//     'prix' => 1.4,
//     'image' => 'tomatosoup.jpg',
//     'type' => 'soupe',
//     'nutriscore' => 'C',
//   ),
//   7 => 
//   array (
//     'nom' => 'haricots rouges',
//     'prix' => 0.58,
//     'image' => 'kidney.jpg',
//     'type' => 'legumes',
//     'nutriscore' => 'C',
//   ),
//   8 => 
//   array (
//     'nom' => 'tomates hachées',
//     'prix' => 0.45,
//     'image' => 'tomato.jpg',
//     'type' => 'legumes',
//     'nutriscore' => 'A',
//   ),
//   9 => 
//   array (
//     'nom' => 'petits pois',
//     'prix' => 0.52,
//     'image' => 'gardenpeas.jpg',
//     'type' => 'legumes',
//     'nutriscore' => 'A',
//   ),
//   10 => 
//   array (
//     'nom' => 'Spam',
//     'prix' => 2.85,
//     'image' => 'spam.jpg',
//     'type' => 'viande',
//     'nutriscore' => 'E',
//   ),
//   11 => 
//   array (
//     'nom' => 'haricots frits',
//     'prix' => 0.99,
//     'image' => 'refried.jpg',
//     'type' => 'legumes',
//     'nutriscore' => 'E',
//   ),
// );
//echo json_encode($produits);
// echo'
// [
//     {
//       "nom" : "fèves au lard",
//       "prix" : 0.40,
//       "image" : "beans.jpg",
//       "type" : "legumes",
//       "nutriscore" : "B"
//     },
//     {
//       "nom" : "hot-dogs",
//       "prix" : 1.99,
//       "image" : "hotdogs.jpg",
//       "type" : "viande",
//       "nutriscore" : "E"
//     },
//     {
//       "nom" : "Spam",
//       "prix" : 2.85,
//       "image" : "spam.jpg",
//       "type" : "viande",
//       "nutriscore" : "E"
//     },
//     {
//       "nom" : "haricots frits",
//       "prix" : 0.99,
//       "image" : "refried.jpg",
//       "type" : "legumes",
//       "nutriscore" : "E"
//     },
//     {
//       "nom" : "haricots rouges",
//       "prix" : 0.58,
//       "image" : "kidney.jpg",
//       "type" : "legumes",
//       "nutriscore" : "C"
//     },
//     {
//       "nom" : "petits pois",
//       "prix" : 0.52,
//       "image" : "gardenpeas.jpg",
//       "type" : "legumes",
//       "nutriscore" : "A"
//     },
//     {
//       "nom" : "purée de pois",
//       "prix" : 0.58,
//       "image" : "mushypeas.jpg",
//       "type" : "legumes",
//       "nutriscore" : "B"
//     },
//     {
//       "nom" : "bœuf salé",
//       "prix" : 2.39,
//       "image" : "cornedbeef.jpg",
//       "type" : "viande",
//       "nutriscore" : "E"
//     },
//     {
//       "nom" : "Soupe à la tomate",
//       "prix" : 1.40,
//       "image" : "tomatosoup.jpg",
//       "type" : "soupe",
//       "nutriscore" : "C"
//     },
//     {
//       "nom" : "tomates hachées",
//       "prix" : 0.45,
//       "image" : "tomato.jpg",
//       "type" : "legumes",
//       "nutriscore" : "A"
//     },
//     {
//       "nom" : "Soupe de nouilles au poulet",
//       "prix" : 1.89,
//       "image" : "chickennoodle.jpg",
//       "type" : "soupe",
//       "nutriscore" : "D"
//     },
//     {
//       "nom" : "Soupe de carottes et coriandre",
//       "prix" : 1.49,
//       "image" : "carrotcoriander.jpg",
//       "type" : "soupe",
//       "nutriscore" : "D"
//     }
//   ]
//   ';
?>

