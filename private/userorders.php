<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/styles/userorder.css">
    <title>User Orders</title>
    <style>
        /* Internal CSS styles for the document */
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
        <!-- Main container for orders -->
        <h1>Your Orders</h1>
        <table>
            <thead>
                <!-- Table header -->
                <tr>
                    <th>Status</th>
                    <th>Description</th>
                    <th>Service Name</th>
                    <th>Cost</th>
                </tr>
            </thead>
            <tbody>
                <?php
                session_start();  // Start PHP session to access session variables
                include "./db.php";  // Include database connection file
                $email = $_SESSION['email'];  // Get email from session
                $conn = new mysqli($DB_servername, $DB_username, $DB_password, $DB_name);  // Create new MySQLi connection
                $sql = 'SELECT orders.orderID, orders.email, orders.status, orders.description, orders.servicename, users.name, services.cost FROM orders LEFT JOIN users ON orders.email = users.email LEFT JOIN services ON orders.servicename = services.servicename WHERE orders.email = "' . $email . '" ORDER BY orders.orderID DESC';  // SQL query to fetch orders for the logged-in user
                $result = $conn->query($sql);  // Execute the query
                while ($row = $result->fetch_assoc()) {
                    // Loop through each row of the result set
                    echo '<tr>';
                    echo '<td>' . $row['status'] . '</td>';  // Display order status
                    echo '<td>' . $row['description'] . '</td>';  // Display order description
                    echo '<td>' . $row['servicename'] . '</td>';  // Display service name
                    echo '<td>' . $row['cost'] . ' PLN</td>';  // Display cost with currency
                    echo '</tr>';
                }
                $conn->close();  // Close the database connection
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
