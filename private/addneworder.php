<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Order</title>
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
            font-weight: bold;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        .pass {
            color: green;
        }

        .fail {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Add New Order</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="product">Select Product:</label>
            <select id="product" name="product">
                <option value="Product A">Product A</option>
                <option value="Product B">Product B</option>
                <option value="Product C">Product C</option>
                <!-- Add more options as needed -->
            </select><br><br>
            <label for="description">Description:</label><br>
            <textarea id="description" name="description" rows="4" cols="50"></textarea><br><br>
            <input type="submit" value="Submit">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["product"])) {
            $receivedVariable = $_POST["product"];
            session_start();
            include "db.php";
            $email = $_SESSION['email'];
            $description = $_POST['description'];

            $conn = new mysqli($DB_servername, $DB_username, $DB_password, $DB_name);
            $sql = 'INSERT INTO orders (orderID, email, status, description, servicename) VALUES (NULL, "' . $email . '", "Pending", "' . $description . '", "' . $receivedVariable . '")';

            if ($conn->query($sql) === TRUE) {
                echo '<p class="pass">Order created successfully</p>';
            } else {
                echo '<p class="fail">Error: ' . $sql . '<br>' . $conn->error . '</p>';
            }
            $conn->close();
        }
        ?>
    </div>
</body>

</html>

