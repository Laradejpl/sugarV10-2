-- Ceci est un commentaire SQL

-- Pour créer une BDD
CREATE DATABASE nom_de_la_bdd; 
CREATE DATABASE entreprise;

-- Pour voir les BDD présentent sur le serveur
SHOW DATABASES;

-- Pour utiliser une BDD
USE entreprise;

-- Pour supprimer une BDD
DROP DATABASE entreprise;
-- Pour une table
DROP TABLE nom_de_la_table;

-- Pour vider une table (on garde la structure mais on efface les données)
TRUNCATE nom_de_la_table;

-- Pour voir la structure d'une table (les colonnes qui la composent)
DESC nom_de_la_table;


----------------------------------------------------
----------------------------------------------------
----------------------------------------------------
-- REQUETE DE SELECTION (Question)
----------------------------------------------------
----------------------------------------------------
----------------------------------------------------

CREATE DATABASE entreprise;
USE entreprise;

-- Pour voir l'intégralité des données d'une table
SELECT id_employes, nom, prenom, sexe, service, date_embauche, salaire FROM employes;
-- même chose avec * (ALL)
SELECT * FROM employes;
-- Affiche moi toutes les données de la table employes

-----------

-- Quels sont les noms et prénoms de la table employes
SELECT nom, prenom FROM employes;

-- Exercice: Afficher les différents services de la table employes
SELECT service FROM employes;
-- DISTINCT
SELECT DISTINCT service FROM employes;
-- DISTINCT pour éviter les doublons
+---------------+
| service       |
+---------------+
| direction     |
| commercial    |
| production    |
| secretariat   |
| comptabilite  |
| informatique  |
| communication |
| juridique     |
| assistant     |
+---------------+

-----------------------
-- CONDITION
-----------------------

-- WHERE = à la condition que

-- Affichage des employés du service informatique
SELECT nom, prenom, service FROM employes WHERE service = 'informatique';
+--------+---------+--------------+
| nom    | prenom  | service      |
+--------+---------+--------------+
| Vignal | Mathieu | informatique |
| Durand | Damien  | informatique |
| Chevel | Daniel  | informatique |
+--------+---------+--------------+

-- BETWEEN
-- Affichage des employes ayant été recruté entre 2010 et aujourd'hui
SELECT nom, prenom, service, date_embauche FROM employes WHERE date_embauche BETWEEN '2010-01-01' AND '2019-07-30';

-- CURDATE() -- renvoie la date du jour
SELECT CURDATE();
+------------+
| CURDATE()  |
+------------+
| 2019-07-30 |
+------------+
SELECT nom, prenom, service, date_embauche FROM employes WHERE date_embauche BETWEEN '2010-01-01' AND CURDATE();

-- LIKE valeur approchante
-- les prénoms qui commencent par la lettre "s"
SELECT prenom FROM employes WHERE prenom LIKE 's%';
+-----------+
| prenom    |
+-----------+
| Stephanie |
+-----------+
-- les prénoms qui se terminent par "ie"
SELECT prenom FROM employes WHERE prenom LIKE '%ie';
+-----------+
| prenom    |
+-----------+
| Elodie    |
| Melanie   |
| Nathalie  |
| Emilie    |
| Stephanie |
+-----------+
-- les prénoms contenant ie au début ou à la fin ou à l'intérieur
SELECT prenom FROM employes WHERE prenom LIKE '%ie%';
+-------------+
| prenom      |
+-------------+
| Jean-pierre |
| Elodie      |
| Melanie     |
| Julien      |
| Mathieu     |
| Thierry     |
| Damien      |
| Daniel      |
| Nathalie    |
| Emilie      |
| Stephanie   |
+-------------+

-- Pour une exclusion, NOT LIKE

----------

-- Affichage des employes sauf ceux du service informatique
SELECT prenom, nom, service FROM employes WHERE service != 'informatique';
-- != "différent de"

-- Opérateurs de comparaison
-- Affichage des employés ayant un salaire supérieur à 3000
SELECT nom, prenom, service, salaire FROM employes WHERE salaire > 3000;
+----------+-------------+------------+---------+
| nom      | prenom      | service    | salaire |
+----------+-------------+------------+---------+
| Laborde  | Jean-pierre | direction  |    5000 |
| Winter   | Thomas      | commercial |    3550 |
| Collier  | Melanie     | commercial |    3100 |
| Blanchet | Laura       | direction  |    4500 |
| Martin   | Nathalie    | juridique  |    3200 |
+----------+-------------+------------+---------+

-- > strictement supérieur
-- < strictement inférieur
-- >= supérieur ou égal à
-- <= inférieur ou égal à
-- = est égal à
-- != est différent de

-----------------------
-- ORDER BY

-- Affichage des employés dans l'ordre alphabétique
SELECT * FROM employes ORDER BY nom ASC; -- ASC pour ascendant (par défaut)
SELECT * FROM employes ORDER BY nom DESC; -- DESC pour déscendant
-- Affichage selon leur salaire
SELECT nom, prenom, salaire FROM employes ORDER BY salaire DESC;
SELECT nom, prenom, salaire FROM employes ORDER BY salaire DESC, prenom ASC;

--------------

-- LIMIT

-- Affichage des employes 3 par 3
SELECT prenom FROM employes LIMIT 0, 3; 
SELECT prenom FROM employes LIMIT 3, 3; 
SELECT prenom FROM employes LIMIT 6, 3; 
-- LIMIT position_de_départ, nb_de_ligne


---------------

-- Opération numérique
-- Affichage des employes avec leur salaire annuel
SELECT prenom, salaire * 12 FROM employes;
-- avec un alias
SELECT prenom, salaire * 12 AS salaire_annuel FROM employes LIMIT 5;
SELECT prenom, salaire * 12 AS 'Salaire annuel' FROM employes LIMIT 5;
+-------------+----------------+
| prenom      | Salaire annuel |
+-------------+----------------+
| Jean-pierre |          60000 |
| Clement     |          27600 |
| Thomas      |          42600 |
| Chloe       |          22800 |
| Elodie      |          19200 |
+-------------+----------------+

-- SUM() -- somme
-- Affichage de la masse salariale annuelle de la table employes
SELECT SUM(salaire * 12) AS 'Masse salariale annuelle' FROM employes;
+--------------------------+
| Masse salariale annuelle |
+--------------------------+
|                   577380 |
+--------------------------+

-- AVG() -- moyenne
-- Le salaire moyenne
SELECT AVG(salaire) FROM employes;
+--------------+
| AVG(salaire) |
+--------------+
|    2405.7500 |
+--------------+
-- ROUND() -- arrondir
SELECT ROUND(AVG(salaire)) FROM employes; -- arrondi à l'entier
SELECT ROUND(AVG(salaire), 2) FROM employes; -- arrondi avec 2 décimales
-- ROUND() permier argument: ce que l'on veut arrondir, s'il y a un deuxième argument, c'est le nombre de décimales acceptées.

-- COUNT() le nombre de ligne correspondant à la requete
-- Affichage du nombre de femme dans l'entreprise
SELECT COUNT(*) FROM employes WHERE sexe = 'f';
+----------+
| COUNT(*) |
+----------+
|        9 |
+----------+

-- MIN() ou MAX()
-- Affichage du salaire minimum ou maximum
SELECT MIN(salaire) FROM employes;
+--------------+
| MIN(salaire) |
+--------------+
|         1390 |
+--------------+
SELECT MAX(salaire) FROM employes;
+--------------+
| MAX(salaire) |
+--------------+
|         5000 |
+--------------+

-- Exercice: afficher le prenom et le salaire de l'employé ayant le salaire minimum
SELECT prenom, MIN(salaire) FROM employes; -- incohérent
+-------------+--------------+
| prenom      | MIN(salaire) |
+-------------+--------------+
| Jean-pierre |         1390 |
+-------------+--------------+

-- Avec une requete imbriquée
SELECT prenom, salaire FROM employes WHERE salaire = (SELECT MIN(salaire) FROM employes);
+--------+---------+
| prenom | salaire |
+--------+---------+
| Julien |    1390 |
+--------+---------+

--------------------

-- IN
-- Affichage des employes des services informatique et comptabilite
SELECT nom, prenom, service FROM employes WHERE service IN ('informatique', 'comptabilite');
+--------+---------+--------------+
| nom    | prenom  | service      |
+--------+---------+--------------+
| Grand  | Fabrice | comptabilite |
| Vignal | Mathieu | informatique |
| Durand | Damien  | informatique |
| Chevel | Daniel  | informatique |
+--------+---------+--------------+
-- IN permet d'inclure plusieurs valeurs
-- = permet d'inclure une seule valeur.

-- Pour exclure plusieurs valeurs: NOT IN
SELECT nom, prenom, service FROM employes WHERE service NOT IN ('informatique', 'comptabilite') ORDER BY service;

-----------------------------------
-- PLUSIEURS CONDITIONS - AND et OR
-----------------------------------

-- AND
-- Affichage des employes du service commercial gagnant un salaire inférieur ou égal à 2000
SELECT nom, service, salaire FROM employes WHERE service = 'commercial' AND salaire <= 2000;
+---------+------------+---------+
| nom     | service    | salaire |
+---------+------------+---------+
| Miller  | commercial |    1900 |
| Sennard | commercial |    1800 |
+---------+------------+---------+

-- OR
-- les employes du service commercial ayant un salaire égal à 1900 ou 2300
SELECT nom, service, salaire FROM employes WHERE service = 'commercial' AND salaire = 1500 OR salaire = 1900; -- erreur czr le OR prend la priorité sur le AND
+--------+--------------+---------+
| nom    | service      | salaire |
+--------+--------------+---------+
| Dubar  | production   |    1900 |
| Grand  | comptabilite |    1900 |
| Miller | commercial   |    1900 |
+--------+--------------+---------+
SELECT nom, service, salaire FROM employes WHERE service = 'commercial' AND (salaire = 1500 OR salaire = 1900); -- avec les parenthèse, le résultat est correct.
+--------+------------+---------+
| nom    | service    | salaire |
+--------+------------+---------+
| Miller | commercial |    1900 |
+--------+------------+---------+

------------------------

-- GROUP BY pour regrouper des informations

-- Affichage du nombre d'employé(s) par service
SELECT service, COUNT(*) AS 'nombre employé' FROM employes GROUP BY service;
+---------------+----------------+
| service       | nombre employé |
+---------------+----------------+
| assistant     |              1 |
| commercial    |              6 |
| communication |              1 |
| comptabilite  |              1 |
| direction     |              2 |
| informatique  |              3 |
| juridique     |              1 |
| production    |              2 |
| secretariat   |              3 |
+---------------+----------------+
-- Pour mettre une condition sur le GROUP BY: HAVING
SELECT service, COUNT(*) AS 'nombre employé' FROM employes GROUP BY service HAVING COUNT(*) >= 2;
+--------------+----------------+
| service      | nombre employé |
+--------------+----------------+
| commercial   |              6 |
| direction    |              2 |
| informatique |              3 |
| production   |              2 |
| secretariat  |              3 |
+--------------+----------------+

----------------------------------------------------
----------------------------------------------------
----------------------------------------------------
-- REQUETE D'ENREGISTREMENT (Action)
----------------------------------------------------
----------------------------------------------------
----------------------------------------------------
-- INSERT INTO
INSERT INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire) VALUES (NULL, 'Mathieu', 'Quittard', 'm', 'informatique', '2019-07-30', 2000);
SELECT * FROM employes;

-- sans préciser les colonnes, dans ce cas on doit respecter le nombre de valeur (autant qu'il y a de colonnes) et l'ordre de la table.
INSERT INTO employes VALUES (NULL, 'Mathieu', 'Quittard', 'm', 'informatique', '2019-07-30', 2000);

-- sans fournir la clé primaire
INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('Mathieu', 'Quittard', 'm', 'informatique', '2019-07-30', 2000);
SELECT * FROM employes;

----------------------------------------------------
----------------------------------------------------
----------------------------------------------------
-- REQUETE DE MODIFICATION (Action)
----------------------------------------------------
----------------------------------------------------
----------------------------------------------------
SELECT * FROM employes;
UPDATE employes SET salaire = 5001 WHERE id_employes = 350;
SELECT * FROM employes;

UPDATE employes SET salaire = 2500, service = 'Developpeur' WHERE id_employes = 991;
SELECT * FROM employes;

-- REPLACE peut agir comme un INSERT ou un UPDATE mais il faut privilégier un INSERT simple ou un UPDATE simple !

----------------------------------------------------
----------------------------------------------------
----------------------------------------------------
-- REQUETE DE SUPPRESSION (Action)
----------------------------------------------------
----------------------------------------------------
----------------------------------------------------
SELECT * FROM employes;
DELETE FROM employes WHERE id_employes = 991;
SELECT * FROM employes;

DELETE FROM employes WHERE service != 'informatique';

DELETE FROM employes; -- même chose que TRUNCATE (supprime toutes les données mais conserve la structure)
















 
