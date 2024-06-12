<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles/Accueil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .footer-green {
            background-color: #25d366;
            color: white;
            text-transform: uppercase;
        }

        .social a {
            margin: 0 10px;
        }

        header {
            background-color: #25d366;
        }

        /* Ajustement du padding pour éviter le chevauchement */
        .custom-longueur {
            height: 20%;
        }
    </style>
</head>

<body>

    <header class="navbar navbar-expand-lg navbar-dark bg-success" id="Accueil">
        <div class="container">
            <a class="navbar text-white" href="#">
                <h1>Maison à louer à Moanda</h1>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                    <a class="nav-link text-white" href="#Accueil">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="add_appart.php">Ajouter un appartement</a>
                    </li>
                    <li class="nav-item">
                        <a id="notificationsBtn" class="nav-link text-white" href="#notification">Notifications
                            (<?php echo isset($_SESSION['notifications']) ? $_SESSION['notifications'] : '0'; ?>)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>


    <div class="container" style="margin-top: 30px;">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-10 col-sm-12">
                <div class="card text-center">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="images/appart_1.png" class="d-block w-100" alt="image maison 1">
                            </div>
                            <div class="carousel-item">
                                <img src="images/image.png" class="d-block w-100" alt="image maison 2">
                            </div>
                            <div class="carousel-item">
                                <img src="images/appart_1.png" class="d-block w-100" alt="image maison 3">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <h2 class="card-title">Appart Meublé</h2>
                        <p class="card-text">Wifi, télé connecté, 3 chambres, 1 douche, 1 wc, salon équipé, cuisine
                            équipé, douche</p>
                        <p class="card-text">Prix: 25.000F / Jour</p>
                        <a href="https://wa.me/241065881636" class="btn btn-success">Contacter sur WhatsApp</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Liste des appartements ajoutés -->
        <div class="row justify-content-center">
            <?php
            if (isset($_SESSION['appartements']) && count($_SESSION['appartements']) > 0) {
                foreach ($_SESSION['appartements'] as $index => $appartement) {
                    echo '<div class="col-lg-12 col-md-10 col-sm-12">';
                    echo '<div class="card text-center">';
                    echo '<div id="carouselExampleControls' . $index . '" class="carousel slide" data-ride="carousel">';
                    echo '<div class="carousel-inner">';
                    foreach ($appartement['images'] as $key => $image) {
                        echo '<div class="carousel-item ' . ($key === 0 ? 'active' : '') . '">';
                        echo '<img src="' . $image . '" class="d-block w-100" alt="image maison ' . ($key + 1) . '">';
                        echo '</div>';
                    }
                    echo '</div>';
                    echo '<a class="carousel-control-prev" href="#carouselExampleControls' . $index . '" role="button" data-slide="prev">';
                    echo '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
                    echo '<span class="sr-only">Previous</span>';
                    echo '</a>';
                    echo '<a class="carousel-control-next" href="#carouselExampleControls' . $index . '" role="button" data-slide="next">';
                    echo '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
                    echo '<span class="sr-only">Next</span>';
                    echo '</a>';
                    echo '</div>';

                    echo '<div class="card-body">';
                    echo '<h2 class="card-title">' . $appartement['nom'] . '</h2>';
                    echo '<p class="card-text">' . $appartement['details'] . '</p>';
                    echo '<p class="card-text">Prix: ' . $appartement['prix'] . 'F / Mois</p>';
                    echo '<a href="https://wa.me/' . $appartement['proprietaire'] . '" class="btn btn-success">Contacter sur WhatsApp</a>';
                    echo '<form action="delete_appart.php" method="POST" style="display:inline-block; margin-top:10px;">';
                    echo '<input type="hidden" name="index" value="' . $index . '">';
                    echo '<button type="submit" class="btn btn-danger">Supprimer</button>';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p class="text-center">Aucun appartement n\'a été ajouté pour le moment. Ajoutez vous-même un appartement <a href="add_appart.php" class="btn btn-success">Ajouter appartement</a></p>';
            }
            ?>
        </div>

    </div>

    <footer class="text-white bg-success mt-5 py-3" id="contact">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center">
                    <p>&copy; 2024 MAISON À LOUER</p>
                </div>
                <div class="col-12 text-center">
                    <p>CONTACTEZ CI-DESSOUS LE DÉVELOPPEUR QUI A DÉVELOPPÉ CE SITE</p>
                </div>
                <div class="col-12 text-center">
                    <div class="social">
                        <a class="text-white" href="https://www.linkedin.com/in/jessy-christopher-lebomo-9544b513a/"
                            target="_blank">
                            <i class="fab fa-linkedin fa-2x"></i>
                        </a>
                        <a class="text-white" href="https://wa.me/+241065881636" target="_blank">
                            <i class="fab fa-whatsapp fa-2x"></i>
                        </a>
                        <a class="text-white" href="mailto:Lebomojessy63@gmail.com">
                            <i class="far fa-envelope fa-2x"></i>
                        </a>
                        <a class="text-white" href="tel:+24165881636">
                            <i class="fas fa-phone fa-2x"></i>
                        </a>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <p class="mt-3">DÉVELOPPÉ PAR SOLUTIONS STARTUP</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="ajax.js"></script>
</body>

</html>