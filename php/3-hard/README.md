# Exercice - PHP Mode : hard

Fait avec PHP 8.1

## Ce qui a été constaté à la lecture du code

### Général

- Dans les classes Customer et Rental, les attributs ont été écrits en bas. Il vaut mieux les mettre en haut de la classe

### Dans Customer

- La fonction statement contient la logique de calcul des points et de ce que doit l'utilisateur, alors qu'idéalement, il faudra séparer cela et faire en sorte que statement se concentre uniquement sur l'affichage
- La fonction addRental n'a pas besoin de retourner de valeurs, seul le fait d'ajouter une location suffit amplement
- Il n'est pas nécessaire de créer getName, name étant uniquement utilisé à l'intérieur de la classe Customer (principe YAGNI)
- la variable $each peut être mal comprise à première lecture du code
- la fonction statement a son accolade d'entrée dans la même ligne que son nom

### Dans Movie

- L'ordre des constantes n'est pas adapté selon leurs valeurs
- La fonction setPriceCode n'est pas du tout utilisée dans le code (principe YAGNI)

## Ce qui a été mis en place

- Déplacement des attributs des classes Customer et Rental vers le haut
- Remise en ordre des constantes de la classe Movie
- La logique de calcul des points et du prix est faite en fonction du type de location ainsi que du nombre de jours louées. Comme ces deux dernières sont des informations de type Rental, il est donc préférable de mettre cela dans la classe Rental avec deux fonctions : calculateRentalAmount et calculateRenterPoints. De cette manière, la fonction statement n'a plus qu'à récupérer les informations et les afficher.
- Transformation de $each en $rental
- Suppression de setPriceCode dans la classe Movie
- Remise en forme des fonctions (accolade, nom de fonction)