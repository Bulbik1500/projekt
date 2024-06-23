<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz Zamówień</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        select, input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            margin-bottom: 15px;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
    <script>
        function getvalue() {
            var product = document.getElementById("product").value;
            console.log("Selected Product:", product);
        }
    </script>
</head>

<body>
    <div class="container">
        <h1>Formularz Zamówień</h1>
        <form action="../../private/addneworder.php" method="POST">
            <label for="product">Wybierz produkt:</label>
            <select id="product" name="product" onchange="getvalue();">
                <?php
                session_start();
                include "../../private/db.php";
                $conn = new mysqli($DB_servername, $DB_username, $DB_password, $DB_name);
                $sql = 'SELECT * FROM services';
                $result = @$conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['servicename'] . '">' . $row['servicename'] . ' ' . $row['cost'] . ' PLN</option>';
                    }
                } else {
                    echo '<option value="">No products available</option>';
                }
                $conn->close();
                ?>
            </select>
            <br><br>
            <label for="description">Dodaj opis:</label>
            <input type="text" id="description" name="description">
            <br><br>
            <button type="submit">Dodaj nowe zamówienie</button>
        </form>
    </div>
</body>

</html>
