<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz Zamówień</title>

</head>

<body>
    <h1>Formularz Zamówień</h1>
    <form action="../../private/addneworder.php" method="POST">
        <label for="product">Wybierz produkt:</label>
        <select id="product" name="product">
            <?php
            session_start();
            include "../../private/db.php";
            $conn = new mysqli($DB_servername, $DB_username, $DB_password, $DB_name);
            $sql = 'SELECT * FROM  services ';
            $result = @$conn->query($sql);

            for ($i = 1; $result->num_rows >= $i; $i++) {
                $row = $result->fetch_assoc();
                $servicename = $row['servicename'];
                $servicprice = $row['cost'];
                echo '<option value="' . $servicename . '">' . $servicename . ' ' . $servicprice . ' PLN</option> ';
            }
                $conn->close();
            ?>
        </select>
        <br><br>
        <label for="description"> Dodaj opis </label>
        <input type="text" class="description">
        <br><br>
        
        <button type="submit">Dodaj nowe zamówienie </button>
    </form>
    <?php
        $email = $_SESSION['email'];


    ?>
</body>

</html>