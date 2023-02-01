# Exercice - JavaScript

## Ce qui a été constaté à la lecture du code

- Confusion au niveau des noms des variables
- kudos n'est pas modifié à l'intérieur de ce code, il n'a aucune raison d'être une variable
- Conventions de nommage non respectées pour les constantes (tout en majuscules avec underscore)

## Ce qui a été corrigé

- Les variables kudos ont été renommées correctement
- kudos devient une constante et se nomme également MAX_KUDOS
- Respect des conventions de nommage JavaScript pour le nom des constantes


## Questionnement

- La première phrase du document.write indique un nombre maximal de kudos qu'un article peut avoir. Est-ce que cela impliquait le fait de ne pas prendre en compte les articles ayant dépassé cette limite ou alors de forcer le nombre de kudos à la valeur maximale pour les articles? Si premier cas, utiliser la méthode filter sur la liste des articles pour ne garder que celles respectant la condition. Si deuxième cas, une condition à mettre en place dans la boucle for pour respecter le nombre maximal.