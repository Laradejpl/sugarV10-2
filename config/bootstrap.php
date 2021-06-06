<?php
/**
 * Ce fichier est le fichier de configuration principal
 * (n'a rien à voir avec Bootstrap CSS)
 * 
 * Il sera le 1er fichier chargé sur chacune des pages.
 * Il doit contenir toute la configuration nécessaire avant de traiter la requête
 */

// Paramètres de l'application
require_once __DIR__ . '/parametres.php';

// Connexion à la base de données
require_once __DIR__ . '/pdo.php';

// Fichier des fonctions
require_once __DIR__ . '/fonctions.php';

// Démarrage de la session
session_start();




