# Exercice - PHP Mode : medium

Fait avec PHP 8.1

## Ce qui a été constaté à la lecture du code

- La fonction receive est trop longue et traite beaucoup d'informations. De plus, le nombre de conditions, de boucles et de niveaux ne facilitent pas la lecture du code, ni la maintenance
- Aucune vérification est faite sur la direction (lors du __construct) ainsi que sur les instructions que nous recevons dans la fonction receive, ce qui donnerait un résultat inattendu par l'utilisateur.
- Aucune instruction spécifique est donnée si l'utilisateur veut faire reculer le rover, ce qui implique que n'importe quelle lettre autre que l (left),r (right) ou f (forward) peut être utilisée. Or, il est préférable, à mon avis, d'utiliser une lettre spécifique, comme b pour backward.

## Ce qui a été mis en place

- Restriction sur la direction donnée à l'initialisation d'un objet Rover, avec un message d'alerte si lettre inappropriée
- Alerte si, dans la liste des instructions lors du receive, nous avons une lettre inappropriée (avec la position de la lettre indiquée)
- Création de fonctions qui vont gérer les déplacements et la rotation du Rover. Elles sont au nombre de quatre : backward (reculer le rover), forward(avancer le Rover), left (tourner à gauche le Rover), right (tourner à droite le Rover). De cette manière, nous allégons la fonction receive et elle devient beaucoup plus lisible
- Les quatres fonctions citées précédemment utilisent un switch pour une meilleure lisibilité sur les actions possibles et au cas où nous voudrions, par exemple, ajouter de nouvelles directions (NW pour Nord Ouest par exemple). Elles sont également en private car la classe de base n'avait que la fonction receive de disponible à l'extérieur. Nous partirons du principe que c'est le cas également pour la nouvelle classe
- Utilisation de trim pour enlever les espaces en début et fin de caractères pour les instructions que l'on reçoit du receive
- La méthode __toString a été utilisée pour les tests et vérifier le bon fonctionnement du code

## Code fonctionnel

```

$rover = new Rover(0,0,"N");
$rover->receive("lfffbrf");
echo $rover;

```

## Test avec mauvaise direction

```

$rover = new Rover(0,0,"Z");
$rover->receive("lfff");
echo $rover;

```

## Test avec mauvaises instructions

```

$rover = new Rover(0,0,"E");
$rover->receive("lfaf");
echo $rover;

```