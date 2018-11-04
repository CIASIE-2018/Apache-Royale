# Apache-Royale

Apache Royale

Deux joueurs qui contrôlent chacun une équipe de six hélicoptères de combat Apache, qu'ils peuvent placer et orienter librement dans les 3 premières lignes de leur camp.

Trois plateaux de jeu de 20 par 15 cases.

Chaque plateau correspond à une altitude : tous les hélicoptères commencent au niveau 3, puis en se prenant des dégâts, ils descendent d’un niveau. Quand ils arrivent au sol (niveau 0), ils sont éliminés.

Déplacement des hélicoptères : on sélectionne une direction, en pouvant se tourner jusqu’à 90° max en un tour (donc on a accès, par rapport à là où on regarde au début du tour, à la diagonale gauche avant, droite avant, et aux axes gauche et droite). Ensuite, on choisit le nombre de cases de déplacement : 1, 2 ou 3 (déplacement obligatoire). 

On sélectionne le déplacement de ses trois hélicoptères, puis tous les hélicoptères des deux joueurs se déplacent simultanément. Si il y a une collision, les deux hélicoptères sont éliminés. 

Ensuite, après les déplacements, on peut choisir de tirer sur n’importe quel hélicoptère ennemi qui se trouve dans un angle de 90° vers l’avant : la chance de toucher dépend de la distance entre les hélicoptères et de la différence d’altitude (plus on est haut par rapport à un autre hélicoptère plus on a de chance de toucher, et inversement) : Lancer un D6 et faire plus que distance - différence d'altitude. (La distance est calculée comme étant le chemin le plus court en prenant en compte les diagonales).

La première équipe qui a perdu tous ses hélicoptères a perdu la partie.

On pourra éventuellement ajouter d’autres fonctionnalités : gestion du carburant pour limiter les déplacements, différents hélicoptères avec des statistiques différents (résistance, précision, taille, carburant…), ou des objectifs différents (vaincre un hélicoptère “roi”, atteindre un territoire précis…).


3 version :
    1. salon joignable, affichage de salon public (et autres apres reflection) Dev: Alexis, Jordan; Tests: Antoine.
    2. jeu jouable en php (integralement) Dev: Alexis, Antoine; Tests: Jordan.
    3. convertion en javascript, utilisation d'API... (pas optionnel mais pas obligatoire non plus) Dev: Antoine, Jordan; Tests: Alexis.

Diagramme de classes : https://www.lucidchart.com/invitations/accept/648f2497-0958-46fb-a6a5-98080d754c0b 

Pour l'installation saisir en ligne de commande a la racine du projet : make install

puis rendez-vous sur la page http://localhost ou pour Windows : 192.168.99.100
