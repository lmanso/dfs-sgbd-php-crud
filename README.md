# dfs-sgbd-php-crud
[DFS16] - Evaluation project CRUD, using native php.

## Sujet :

Vous allez devoir réaliser une application web qui devra être
liée à une DB qui devra également être créée. Cette DB devra
comporter plusieurs tables et plusieurs colonnes, et il sera de
votre ressort de vous occuper des noms des tables, des
colonnes, etc. Votre supérieur technique étant très occupé à
enchaîner les réunions, vous allez devoir vous débrouiller, en
sachant qu’il fera quelques hâtes pour voir si vous arrivez à
bien avancer.

Votre application devra permettre de C.R.U.D des produits.
Vous êtes libres sur le thème à choisir, mais vous devrez
respecter quelques règles :

- Les produits ont un nom, une description, un timestamps et
(optionnel), même une image.
- Vous devrez créer un système d’authentifcation. Ainsi,
l’utilisateur pourra soit rester en guest, soit se connecter. Pour
pouvoir créer un compte, seul l’administrateur du site a ce
pouvoir. Vous devrez donc attribuer un rôle pour chaque
utilisateur, qui donnera divers accès au site, tout ou partie.
- En plus de cela, vous devrez donc créer au minimum 4 actions
: une qui permet de créer des articles, une qui permet de les
afficher, une qui permet de les modifer et une autre qui
permet de les supprimer. Seule l’action d’afficher les articles
sera accessible à tous, les 3 autres n’était accessibles que pour
l’administrateur. Les guest, eux, n’auront que la page d’accueil
de disponible et la page de connexion.
- En bonus, vous devrez créer une page qui affiche les 10
derniers articles créés.
- Votre application sera un minimum responsive et vous devrez
opter pour un joli UX design.- N’étant encore pas très certains de vos capacités et étant en
apprentissage, vous n’utiliserez pas d’objet, vous ferez ceci en
PHP procédural (malgré le fait que vous allez utiliser PDO).
- Vous devrez être capable de lancer une Vagrant avec L.A.M.P
installé dessus, donc également de brancher un MySQL.
- Pour vos requêtes SQL, vous ferez attention à bien les penser
pour qu’elles soient optimales et surtout sécurisées.
- Vous utiliserez des clefs étrangères et bien entendu des
Triggers. Certains termes vous étant inconnus, vous allez
devoir RTFM et trouver un moyen de vous en sortir.
- Le code que vous allez écrire doit être le plus propre et le plus
à jour possible par rapport aux normes. Par exemple, tentez de
regarder ce qu’est le typehint.
- En cours de semaine, vous aurez de nouvelles tâches à
accomplir, étant en attente du retour du client.

En bonus, vous pourrez tenter de mettre en place un système
de panier, où l’utilisateur pourra voir ce que son panier
contient, ou bien le gérer (enlever des articles) et vous devrez
pouvoir afficher le prix total des articles. Il pourra également le
valider pour pouvoir générer une facture (par exemple, vous
créez un document y faisant office, récapitulant ce qu’il a
acheté, le prix de chaque article et le prix total.