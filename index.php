<!DOCTYPE html>
<html lang="pl">

<head>
    <?php
    include "function/db.php";
    include "function/login.php";

    ?>
    <!-- UTF-8 jest potrzeby do polskich znaków  -->
    <meta charset="UTF-8">
    <title>Strona główna</title>
    <!-- wzuciłęm cały css do innego pliku  -->
    <!-- <link rel="stylesheet" href="styles/indexStyles.css"> -->

</head>

<body>
    <a href="Kontakt.html" class="button">Kontakt</a>
    <a href="Cennik.html" class="button">Cennik</a>
    <a href="login.html"><button> Login </button></a>
    <a href="konto.html" id="accountButton" class="button" style="display: none;">konto</a>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        login($_POST["getMail"], $_POST["getPassword"]);
    }
    ?>
</body>