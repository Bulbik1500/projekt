<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/styles/userorder.css">
    <title>User Orders</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td {
            color: #555;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Your Orders</h1>
        <table>
            <thead>
                <tr>
                    <th>Status</th>
                    <th>Description</th>
                    <th>Service Name</th>
                    <th>Cost</th>
                </tr>
            </thead>
            <tbody>
                <?php
                session_start();
                include "./db.php";
                $email = $_SESSION['email'];
                $conn = new mysqli($DB_servername, $DB_username, $DB_password, $DB_name);
                $sql = 'SELECT orders.orderID, orders.email, orders.status, orders.description, orders.servicename, users.name, services.cost FROM orders LEFT JOIN users ON orders.email = users.email LEFT JOIN services ON orders.servicename = services.servicename WHERE orders.email = "' . $email . '" ORDER BY orders.orderID DESC';
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['status'] . '</td>';
                    echo '<td>' . $row['description'] . '</td>';
                    echo '<td>' . $row['servicename'] . '</td>';
                    echo '<td>' . $row['cost'] . ' PLN</td>';
                    echo '</tr>';
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
