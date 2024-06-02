<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once "function/adduser.php";
    include_once "function/check.php";
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <form method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <p> Your email </p><br>
        <input type="email" name="email" id="email" placeholder="Email">
        <p> Reapet your email </p><br>
        <input type="email" name="Remail" id="remail" placeholder="Reapet email">
        <!-- sprawdzam czy email i remail są takie same funkcja z pliku chcek.php  -->
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $mail_check = check(@$_POST["email"], @$_POST["Remail"]);
        }
        ?>

        <p> input your password</p><br>
        <input type="password" name="password" id="password" placeholder="Hasło">
        <p> Reapet your password </p><br>
        <input type="password" name="Rpassword" id="Rpassword" placeholder="Reapet Hasło">

        <!-- sprawdzam czy hasła są takie same | funkcja z pliku chcek.php -->
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $pass_check = check(@$_POST["password"], @$_POST["Rpassword"]);
        }
        ?>

        <p> input your name </p><br>
        <input type="text" name="name" id="name" placeholder="name">
        <p> input your surname </p><br>
        <input type="text" name="surname" id="surname" placeholder="surname">

        <input type="submit" value="Sign in">
        <a href="index.php">Powrót</a>

    </form>

    <!-- jezeli oba check sa true, dodaje nowego użytkownika do bazy danych  -->
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($pass_check == 1 && $mail_check == 1) {
            add_user($_POST["email"], $_POST["password"], $_POST["name"], $_POST["surname"]);
        }
    }

    ?>


</body>

</html>