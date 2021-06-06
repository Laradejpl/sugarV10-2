<?php


function getMembre() : ?array
{
    return $_SESSION['membre'] ?? null;
}

/**
 * Vérifier que l'utilisateur courant a un certain rôle/statut
 * @param int $role
 * @return bool
 */
function role(int $role) : bool
{
    // S'il n'y a pas d'utilisateur connecté, il ne possède pas le rôle
    if (getMembre() === null) {
        return false;
    }

    // Pas de comparaison stricte car les superglobales ne contienent que des stings
    return getMembre()['statut'] == $role;
}






function getMembreBy(PDO $pdo, string $colonne, $valeur) : ?array
{
    $req = $pdo->prepare(sprintf(
        'SELECT *
        FROM membre
        WHERE %s = :valeur',
        $colonne
    ));
    $req->bindParam(':valeur', $valeur);
    $req->execute();

    $utilisateur = $req->fetch(PDO::FETCH_ASSOC);
    return $utilisateur ?: null;
}


function get_distance_m($lat1, $lng1, $lat2, $lng2) {
    $earth_radius = 6378137;   // Terre = sphère de 6378km de rayon
    $rlo1 = deg2rad($lng1);
    $rla1 = deg2rad($lat1);
    $rlo2 = deg2rad($lng2);
    $rla2 = deg2rad($lat2);
    $dlo = ($rlo2 - $rlo1) / 2;
    $dla = ($rla2 - $rla1) / 2;
    $a = (sin($dla) * sin($dla)) + cos($rla1) * cos($rla2) * (sin($dlo) * sin(
  $dlo));
    $d = 2 * atan2(sqrt($a), sqrt(1 - $a));
    return ($earth_radius * $d);
   
  }


  /**
 * Ajouter un message flash
 * @param string $type      erreur, succes, etc
 * @param string $message   le message à afficher
 * @return void
 */
function ajouterFlash(string $type, string $message) : void
{
    // Enregistrement du message dans un tableau en session
    // $tableau[] =     insère en fin de tableau et créée le tableau s'il n'existe pas
    $_SESSION['flash'][] = [
        'type' => $type,
        'message' => $message,
    ];
}

/**
 * Récupérer les messages flash
 * @return array
 */
function recupererFlash() : array
{
    // Récupération des messages en session s'il y en a
    $messages = $_SESSION['flash'] ?? [];
    
    // Suppression des messages en session (pas d'erreur si déjà inexistant)
    unset($_SESSION['flash']);

    // Renvoi des messages
    return $messages;
}

/**
 * Récupérer 1 post
 * @param PDO $pdo
 * @param mixed $id
 * @return array|null
 */
function getPost(PDO $pdo, $id) : ?array
{
    // Vérification de la valeur de $id
    if (!ctype_digit($id)) {
        return null;
    }

    $req = $pdo->prepare(
        'SELECT *
        FROM post
        WHERE id = :id'
    );
    $req->bindParam(':id', $id, PDO::PARAM_INT);
    $req->execute();

    $post = $req->fetch(PDO::FETCH_ASSOC);
    // Récupérer la première valeur truthy: $val1 ?: $val2 ?: $val3
    // return $post ? $post : null;
    return $post ?: null;
}
/**
 * Récupérer les commentaires associés à un post
 * @param PDO $pdo
 * @param int $post_id
 * @return array
 */
function getCommentairesByPost(PDO $pdo, int $post_id) : array
{
    $req = $pdo->prepare(
        'SELECT *
        FROM commentaire
        WHERE post = :post
        ORDER BY date_publication DESC'
    );
    $req->bindParam(':post', $post_id, PDO::PARAM_INT);
    $req->execute();

    return $req->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Récupérer un commentaire par son identifiant
 */
function getCommentaire(PDO $pdo, $id) : ?array
{
    // Si $id n'est pas un entier (en chaine de caractères)
    if (!ctype_digit($id)) {
        return null;
    }

    $req = $pdo->prepare(
        'SELECT *
        FROM commentaire
        WHERE id = :id'
    );
    $req->bindParam(':id', $id, PDO::PARAM_INT);
    $req->execute();

    return $req->fetch(PDO::FETCH_ASSOC) ?: null;
}

/**
 * Récupérer les réponses (commentaires) d'un commentaire
 */
function getReponsesByCommentaire(PDO $pdo, int $commentaire) : array
{
    $req = $pdo->prepare(
        'SELECT *
        FROM commentaire
        WHERE commentaire = :commentaire
        ORDER BY date_publication ASC'
    );
    $req->bindParam(':commentaire', $commentaire, PDO::PARAM_INT);
    $req->execute();

    return $req->fetchAll(PDO::FETCH_ASSOC);
}



