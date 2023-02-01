# Exercice - PHP Mode : easy

Fait avec PHP 8.1

## Ce qui a été constaté à la lecture du code

- Les arguments de fonction ainsi que la valeur de retour n'ont pas été typés
- Un grand nombre de variables est utilisé, ce qui nuit à la lecture du code et consomme de la mémoire inutilement
- Une fonction trop longue à cause de conditions similaires
- Quelques erreurs ont été aperçues, notamment sur l'unité de mesure (voir ligne 31 et 49 du code d'origine)

## Ce qui a été corrigé

- Mise en place des types pour les arguments ainsi que la variable de retour
- Utilisation d'une boucle pour éviter d'écrire la même condition plusieurs fois
- Gestion du cas où un utilisateur enverrait un nombre supérieur à 1024 HB
