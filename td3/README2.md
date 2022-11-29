Sara Lyna OUYAHIA - Melissa ATMANI
Groupe:8

Affichage d'une horloge en php,
dans ce TP on a créé deux fonctions:
1- function checkUnsignedInt(string $name, int $defaultValue) : int
c'est une fonction qui sert à vérifier les paramètres, 
si jamais l'une  des valeurs des paramètres n'est pas définie ou contient une chaine vide,
 on renvoie une valeur par défaut
 si la valeur n'est pas un entier sans signe, une exception est déclenchée et une page d'erreur est affichée.

2- function checkColor(string $name, string $defaultValue) : string
cette fonction a le meme principe que checkUnsignedInt(...),
la seule différence c'est que c'est une fonction pour changer de couleur.




Formulaire:
 Puis, on a complété la page formHorloge.html, pour créer un formulaire qui prend trois paramètres en saisie,
 et qui a pour page destinataire horloge.php.

