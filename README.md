# Apache-Royale

Apache Royale

Deux joueurs qui contrôlent chacun une équipe de cinq (peut-être plus) hélicoptères de combat Apache.

Trois plateaux de jeu de 15 par 15 cases (ou peut-être plus ou moins après avoir testé).

Chaque plateau correspond à une altitude : tous les hélicoptères commencent au niveau 3, puis en se prenant des dégâts, ils descendent d’un niveau. Quand ils arrivent au sol (niveau 0), ils sont éliminés.

Déplacement des hélicoptères : on sélectionne une direction, en pouvant se tourner jusqu’à 90° max en un tour (donc on a accès, par rapport à là où on regarde au début du tour, à la diagonale gauche avant, droite avant, et aux axes gauche et droite). Ensuite, on choisit le nombre de cases de déplacement : 1, 2 ou 3 (déplacement obligatoire). 

Tour par tour : on sélectionne le déplacement de ses trois hélicoptères, puis tous se déplacent simultanément. Si il y a une collision, les deux hélicoptères sont éliminés. 

Ensuite, après les déplacements, on peut choisir de tirer sur n’importe quel hélicoptère ennemi qui se trouve dans un angle de 90° vers l’avant : la chance de toucher dépend de la distance entre les hélicoptères et de la différence d’altitude (plus on est haut par rapport à un autre hélicoptère plus on a de chance de toucher, et inversement).

Puis c’est au tour du joueur suivant (ou alors les deux tours en même temps, il faudra tester).

La première équipe qui a perdu tous ses hélicoptères a perdu la partie.

On pourra éventuellement ajouter d’autres fonctionnalités : gestion du carburant pour limiter les déplacements, différents hélicoptères avec des statistiques différents (résistance, précision, taille, carburant…), ou des objectifs différents (vaincre un hélicoptère “roi”, atteindre un territoire précis…).

 


