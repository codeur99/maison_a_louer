<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['index'])) {
    $index = $_POST['index'];
    if (isset($_SESSION['appartements'][$index])) {
        unset($_SESSION['appartements'][$index]);
        $_SESSION['appartements'] = array_values($_SESSION['appartements']); // Réindexe le tableau
    }
}

header('Location: index.php');
exit();
?>
