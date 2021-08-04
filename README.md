# test_php
Voici les étapes pour lancer cet projet :
1-Placer le projet sous le dossier racine de wampserver C:\wamp64\www
2-Ouvrez-le avec serveur localhost et taper le lien http://localhost/test/login.php avec la navigateur
3-Apres lancement : le base des données nommé 'db_test' et les tables nommées 'test_utilisateur' et 'table_url' sont crées
automatiquement dans le phpmyadmin
4-Saisir un donnée dans le table utilisateur pour faire un login sous le formulaire de login
5-Faire un login
6-Saisir un lien sur le champ lien comme : http://www.facebook.com, http://www.twitter.com puis clicker sur 
le bouton valider.
Après la validation, tous les url dans cet lien un copeir dans la base des données sous la table url.
7-Actualiser la page index.php pour qu'elle affiche tous les liens enregistrer dans la base des données.
