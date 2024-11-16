<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'car_rental', 3307); // Updated to port 3307

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch booking details
$sql = "SELECT b.id AS booking_id, b.car_id, b.user, c.name AS car_name, c.price 
        FROM bookings b
        JOIN cars c ON b.car_id = c.id";

$result = $conn->query($sql);

header('Content-Type: text/html'); // Set content type for HTML
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Booking Status</h1>
    <table>
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Car Name</th>
                <th>Price</th>
                <th>User</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['booking_id']}</td>
                            <td>{$row['car_name']}</td>
                            <td>{$row['price']}</td>
                            <td>{$row['user']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No bookings found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
<?php
$conn->close(); // Close the database connection
?>
