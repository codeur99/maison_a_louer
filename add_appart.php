<?php
include 'notifications.php'; // Inclure le fichier de gestion des notifications
?>

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['nom']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $prix = htmlspecialchars($_POST['prix']);
    $details = htmlspecialchars($_POST['details']);
    $numero = htmlspecialchars($_POST['numero']);

    // Gestion de l'upload des images
    $images = $_FILES['images'];
    $imagePaths = array();
    foreach ($images['tmp_name'] as $key => $tmp_name) {
        $imagePath = 'uploads/' . basename($images['name'][$key]);
        if (move_uploaded_file($tmp_name, $imagePath)) {
            $imagePaths[] = $imagePath;
        }
    }

    $appartement = array(
        "nom" => $nom,
        "adresse" => $adresse,
        "prix" => $prix,
        "details" => $details,
        "images" => $imagePaths, // Stocke tous les chemins des images
        "numero" => $numero
    );

    if (!isset($_SESSION['appartements'])) {
        $_SESSION['appartements'] = array();
    }
    $_SESSION['appartements'][] = $appartement;

    // Ajouter une notification
    if (!isset($_SESSION['notifications'])) {
        $_SESSION['notifications'] = 1;
    } else {
        $_SESSION['notifications']++;
    }

    // Ajouter un message de notification
    if (!isset($_SESSION['messages'])) {
        $_SESSION['messages'] = array();
    }
    $message = "Un appartement vient d'être ajouté.";
    $_SESSION['messages'][] = $message;

    // Redirection vers la page d'accueil après l'ajout
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un appartement</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Ajouter un appartement</h2>
        <form action="add_appart.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="adresse">Adresse :</label>
                <input type="text" class="form-control" id="adresse" name="adresse" required>
            </div>
            <div class="form-group">
                <label for="prix">Prix :</label>
                <input type="number" class="form-control" id="prix" name="prix" required>
            </div>
            <div class="form-group">
                <label for="details">Détails :</label>
                <input type="text" class="form-control" id="details" name="details" required>
            </div>
            <div class="form-group">
                <label for="numero">Numéro de téléphone :</label>
                <input type="text" class="form-control" id="numero" name="numero" required>
            </div>
            <div class="form-group">
                <label for="images">Photos :</label>
                <input type="file" class="form-control-file" id="images" name="images[]" accept="image/*" multiple required>
                <small class="form-text text-muted">Vous pouvez sélectionner plusieurs images en maintenant la touche Ctrl (Cmd sur Mac) enfoncée tout en cliquant sur les images. Sur un téléphone mobile, appuyez longuement sur une image pour la sélectionner, puis sélectionnez d'autres images en appuyant dessus.</small>
            </div>
            <button type="submit" class="btn btn-success">Soumettre</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        var notificationsBtn = document.getElementById("notificationsBtn");
        <?php if (isset($_SESSION['notifications'])) : ?>
        notificationsBtn.innerHTML = "Notifications (<?php echo $_SESSION['notifications']; ?>)";
        <?php endif; ?>
    });
    </script>
</body>
</html>
