<?php
/**
 * Indique au navigateur qu'il doit afficher du texte ordinaire, sans l'interpréter comme de l'HTML :
*/
header("Content-Type: text/plain;charset=UTF-8");

/**
 * Inclusion du fichier de définitions de fonctions :
 */
require("lib/BookReader.class.php");
require("lib/FileBookReader.class.php");
require_once("lib/fonctionsLivre.php");    // inclusion de fichier

/* Test question 1.1
 */

/* fonction de test
 *  reçoit comme argument un nom de fichier et affiche le résultat de readBook sur ce fichier
 */
function testReadBook($fileName){
    $dl = new FileBookReader($fileName);
    $book = $dl->readBook();
    echo "Resultat pour $fileName \n";
    print_r($book);
}
function testElementBuilder($elementType,$content,$elementClass=""){
    $res=elementBuilder($elementType,$content,$elementClass);
    echo "Resultat pour $elementType, $content,$elementClass  \n";
    print_r($res);
}
//var_dump(elementBuilder('h2','La marque du diable','titre'));
//var_dump(authorsToHTML('aaa - bbb'));

/*
 * Lancement des tests :
 */
 echo "lancement des tests de la fonction elementBuilder : \n";
 echo("*********Fonction elementBuilder :************** \n");
 echo elementBuilder('p','bla bla')."\n";
 echo elementBuilder('h2','La marque du diable','titre')."\n\n";

 echo("*********Fonction authorsToHTML : ********* \n\n");
 echo authorsToHTML('Marini - Desberg')."\n\n";

 echo("*********Fonction coverToHTML :********* \n\n");
 echo coverToHTML('scorpion.jpg')."\n\n" ;

 echo("*********Fonction propertyToHTML : *********\n\n");
 echo propertyToHTML('titre', 'La marque du diable')."\n" ;
 echo propertyToHTML('auteurs', 'Marini - Desberg')."\n\n" ;

 echo("*********La fonction bookToHtml *********\n\n" );
 $dl = new FileBookReader('data/exempleLivre.txt');
 $book = $dl->readBook();
 echo bookToHTML($book)."\n\n";

 echo "*********La fonction librayToHTML : *********\n\n";
 $read = new FileBookReader('data/livres.txt');
 echo libraryToHTML($read)."\n\n";

 
// une description corretce de livre suivie de la fin de fichier
// doit produire un résultat correct
testReadBook('data/exempleLivre.txt');

// une description de livre,(avec des espaces inutiles) suivie d'une ligne vide puis d'un autre texte à ignorer
// doit produire un résultat correct
testReadBook('data/exempleLivre2.txt');

// une description de livre incorrecte (manque ':' en ligne 2)
// doit déclencher une exception
testReadBook('data/exempleLivreErrone.txt');



/**
Voilà ce qui devrait s'afficher :
=================================

Résultat pour data/exempleLivre.txt 
Array
(
    [couverture] => scorpion.jpg
    [titre] => La marque du diable
    [serie] => Le Scorpion
    [auteurs] => Marini - Desberg
    [année] => 2000
    [catégorie] => bandes-dessinées
)
Résultat pour data/exempleLivre2.txt 
Array
(
    [couverture] => scorpion.jpg
    [titre] => La marque du diable
    [serie] => Le Scorpion
    [auteurs] => Marini - Desberg
    [année] => 2000
    [catégorie] => bandes-dessinées
)
<br />
<b>Fatal error</b>:  Uncaught Exception: .....etc ....
 

*/

?>