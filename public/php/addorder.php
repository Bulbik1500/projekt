<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz Zamówień</title>
    <script>
        var dataToSend = "variableName=" + encodeURIComponent(variableValue);

        // Prepare the data to send
        var xhr = new XMLHttpRequest();

        // Create a new XMLHttpRequest object
        xhr.open("POST", "../../private/addneworder.php", true);

        // Specify the request method, PHP script URL, and asynchronous
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Set the content type
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {

                // Check if the request is complete
                if (xhr.status === 200) {

                    // Check if the request was successful
                    console.log(xhr.responseText);
                    // Output the response from the PHP script
                } else {
                    console.error("Error:", xhr.status);
                    // Log an error if the request was unsuccessful
                }

            }

        };

        xhr.send(document.getElementById("product").value);
        // Send the data to the PHP script
    </script>

</head>

<body>
    <h1>Formularz Zamówień</h1>
    <form action="../../private/addneworder.php" method="POST">
        <label for="product" Wybierz produkt:</label>
            <select id="product" name="product" onchange="getvalue();">
                <?php
                session_start();
                include "../../private/db.php";
                $conn = new mysqli($DB_servername, $DB_username, $DB_password, $DB_name);
                $sql = 'SELECT * FROM  services ';
                $result = @$conn->query($sql);

                for ($i = 1; $result->num_rows >= $i; $i++) {
                    $row = $result->fetch_assoc();
                    echo '<option value="' . $row['servicename'] . '">' . $row['servicename'] . " " . $row['cost'] . '</option>';
                }
                $conn->close();
                ?>
            </select>
            <br><br>
            <label for="description"> Dodaj opis </label>
            <input type="text" name="description" class="description">
            <br><br>

            <button type="submit">Dodaj nowe zamówienie </button>
    </form>

</body>

</html>