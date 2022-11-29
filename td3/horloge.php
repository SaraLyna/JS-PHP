<?php
  
  require("lib/ParmsException.class.php");

  require("lib/fonctions_parms.php");
  require("lib/fonctions_clock.php");
  require("formHorloge.html");
  
/**
 * IMPORTANT : 
 * Ce script n'est qu'une ébauche.
 * 
 * En l'état actuel son fonctionnement n'est pas satisfaisant
 *
 * 
 * Utiliser directement les variable du tableau $_GET peut être dangereux
 *
 * Ce script est à modifier et compléter au cours de l'exercice
 * 
 */

 
  try{
   // hours doit être un entier sans signe
   //$hours = $_GET['hours'];
   //$hours=4;

   $hours = checkUnsignedInt('hours',0);
   // minutes doit être un entier sans signe
   //$minutes = $_GET['minutes'];
   //$minutes=42;
   $minutes = checkUnsignedInt('minutes',0);


   // seconds doit être un entier sans signe
   //$seconds = $_GET['seconds'];
   //$seconds=16;

   $seconds = checkUnsignedInt('seconds',0);
    //if (!isset ($seconds) || strlen($seconds) == 0){                              //strcmp(trim($seconds , "")){
    //  $seconds=0;
    //}
    //if (!ctype_digit($seconds)){
      //throw new ParmsException;
 //}

 $hands = checkColor('hands', 'blue');
   
 $markers = checkColor('markers', 'grey');

 $bg = checkColor('bg', 'Transparent');
      
   // la fonction angles est définie dans lib/fonctions_clock.php
   // elle calcule les angles des 3 aiguilles à partir des valeurs fournies
   // le résultat est un tableau de 3 angles associées aux clés 'hours', 'minutes' et 'seconds'
   // par exemple ['hours' => 190, 'minutes' => 270, 'seconds' =>  90]
   $angles = angles($hours, $minutes, $seconds);
 
   // inclusion de la page template :
   require('views/page.php');

  } catch (ParmsException $e){
    require('views/pageErreur.html');
 
  }
 

 
 
?>