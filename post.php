<?php
// Configuration
require_once __DIR__ . '/config/bootstrap.php';




// Traitement
if (isset($_POST['ajouter'])) {
    // Enregistrer l'image (fichier)
    // Enregistrer le post (SQL)

    // Vérifications du titre
    if (empty($_POST['titre']) || strlen($_POST['titre']) > 255) {
        ajouterFlash('danger', 'Le titre doit contenir entre 1 et 255 caractères.');

        // Vérification du contenu
    } elseif (empty($_POST['contenu'])) {
        ajouterFlash('danger', 'Contenu manquant.');
    
        // Vérification sur l'envoi du fichier
    } elseif ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        ajouterFlash('warning', 'Problème lors de l\'envoi du fichier. Code ' . $_FILES['image']['error']);

        // Vérification du type de l'image
        // la clé "type" de $_FILES n'est pas fiable, contrairement à exif_imagetype()
        // Un fichier doit faire minimum 12 octets pour être lu par exif_imagetype()
    } elseif ($_FILES['image']['size'] < 12 || exif_imagetype($_FILES['image']['tmp_name']) === false) {
        ajouterFlash('danger', 'Le fichier envoyé n\'est pas une image');

        // OK: enregistrement de l'image
    } else {
        // Récupération de l'extension du fichier d'origine
        $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        // Chemin jusqu'au dossier des images
        $path = __DIR__ . '/../assets/img';

        // Générer un nom de fichier aléatoire qui n'est pas déjà pris par une autre image
        do {
            // random_bytes() génère une chaîne d'octets
            // bin2hex convertit les octets (illisibles) en chaîne hexadécimale
            $filename = bin2hex(random_bytes(16));

            // Chemin complet = dossier_des_images/nom_fichier.extension
            $complete_path = $path . '/' . $filename . '.' . $extension;

            // Tant que le nom généré n'est pas disponible, on continue la boucle
        } while (file_exists($complete_path));

        // Enregistrement du fichier
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $complete_path)) {
            ajouterFlash('danger', 'L\'image n\'a pas pu être enregistrée.');

        } else {
            // Enregistrement en base de données
            $req = $pdo->prepare(
                'INSERT INTO post (auteur, titre, contenu, img, date_publication, est_publie)
                VALUES (:utilisateur, :titre, :contenu, :image, :date, :publie)'
            );

            $req->bindParam(':utilisateur', getMembre()['id_membre'], PDO::PARAM_INT);
            $req->bindParam(':titre', $_POST['titre']);
            $req->bindParam(':contenu', $_POST['contenu']);
            // Utiliser bindValue() lorsque l'on passe autre chose qu'une variable
            $req->bindValue(':image', $filename . '.' . $extension);
            // Instantiation à la volée (créer et utiliser un objet): (new Classe())->methode()
            $req->bindValue(':date', (new DateTime())->format('Y-m-d H:i:s'));
            // les cases à coser ne sont présentes dans les données de formulaire que si elles sont cochées
            $req->bindValue(':publie', isset($_POST['est_publie']), PDO::PARAM_BOOL);
            $req->execute();

            //Pour vider le formulaire
            unset($_POST);
            ajouterFlash('success', 'Post enregistré !');
        }

    }
}




// Affichage
$page_title = 'Ajouter un post';
include __DIR__ . '/config/header.php'; 
?>

    <div class="container border mt-4 p-4">
        <h1>Ajouter un post</h1>

        <?php include __DIR__ . '/../assets/includes/flash.php'; ?>

        <!-- Pour pouvoir envoyer des fichiers, il faut préciser enctype="multiplart/form-data" -->
        <form action="post_ajouter.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Titre</label>
                <input type="text" name="titre" class="form-control" value="<?= $_POST['titre'] ?? ''; ?>">
            </div>
            <div class="form-group">
                <label>Contenu</label>
                <textarea name="contenu" class="form-control"><?= $_POST['contenu'] ?? ''; ?></textarea>
            </div>

            <div class="custom-file">
                <input type="file" name="image" class="custom-file-input" id="customFile">
                <label for="customFile" class="custom-file-label">Image</label>
            </div>

            <!-- Si une case à cocher n'est pas cochée, sa clé n'apparaitra pas dans les données GET/POST -->
            <div class="form-group form-check">
                <input type="checkbox" name="est_publie" class="form-check-input" id="est_publie" <?= isset($_POST['est_publie']) ? 'checked' : '' ?>>
                <label for="est_publie" class="form-check-label">Publié</label>
            </div>

            <input type="submit" name="ajouter" value="Ajouter le post" class="btn btn-success">
        </form>
    </div>

<?php
include __DIR__ . '/../assets/includes/footer.php';