
<?php
$conn = new mysqli('localhost', 'root', '', 'car_rental', 3307); 

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM cars";
$result = $conn->query($sql);

$cars = [];
while ($row = $result->fetch_assoc()) {
    $cars[] = $row;
}

header('Content-Type: application/json');
echo json_encode($cars);

$conn->close(); 
?>
