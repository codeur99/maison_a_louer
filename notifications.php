<?php
session_start();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Notifications</h2>
        <div id="notifications">
            <?php
            if (isset($_SESSION['messages']) && !empty($_SESSION['messages'])) {
                foreach ($_SESSION['messages'] as $message) {
                    echo '<div class="alert alert-info">' . $message . '</div>';
                }
                // Effacer les messages après les avoir affichés
                unset($_SESSION['messages']);
            } else {
                echo '<p>Aucune notification pour le moment.</p>';
            }
            ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
