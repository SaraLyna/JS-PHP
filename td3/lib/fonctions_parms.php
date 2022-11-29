<?php
require(__DIR__ . "/color_defs.php"); // definit la constante COLOR_KEYWORDS
/**
 *  prend en compte le paramètre $name passé en mode GET
 *   qui doit représenter une couleur CSS
 *  @return : valeur retenue
 *   - si le paramètre est absent ou vide, renvoie  $defaultValue
 *   - si le paramètre est incorrect, déclenche une exception ParmsException
 *
 */
// function checkColor(string $name, string $defaultValue): string
// {
//      if ($_GET[$name] === 'transparent')
//           return $_GET[$name];
//      if (empty($_GET[$name])) {
//           return $defaultValue;
//      } else if (!isset(COLOR_KEYWORDS[$_GET[$name]]) && preg_match(COLOR_REGEXP, $_GET[$name]) === 0) {
//           throw new ParmsException();
//      } else {
//           return $_GET[$name];
//      }
// }


function checkColor(string $name="", string $defaultValue) : string {
      if( !isset($_GET[$name]) || trim($_GET[$name]) === "" )
        return $defaultValue;
      $res = $_GET[$name];
      if(array_key_exists($res, COLOR_KEYWORDS) || $res === 'transparent' || preg_match(COLOR_REGEXP,$res))
          return $res;
      else
        throw new ParmsException;
  }
/**
 *  prend en compte le paramètre $name passé en mode GET
 *   qui doit représenter un entier sans signe
 *  @return : valeur retenue, convertie en int.
 *   - si le paramètre est absent ou vide, renvoie  $defaultValue
 *   - si le paramètre est incorrect, déclenche une exception ParmsException
 *
 */
function checkUnsignedInt(string $name, int $defaultValue): int
{
     if (empty($_GET[$name])) {
          return $defaultValue;
     } else if (!ctype_digit($_GET[$name])) {
          throw new ParmsException();
     } else {
          return (int) $_GET[$name];
     }
}
