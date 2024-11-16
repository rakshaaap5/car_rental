<?php
$conn = new mysqli('localhost', 'root', '', 'car_rental', 3307); // Updated to port 3307

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve POST data
$carId = isset($_POST['car_id']) ? intval($_POST['car_id']) : 0; // Ensure it's an integer
$user = 'John Doe'; // Placeholder; replace with dynamic user authentication

// Validate input
if ($carId <= 0) {
    die("Invalid car ID provided.");
}

// Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO bookings (car_id, user) VALUES (?, ?)");
$stmt->bind_param("is", $carId, $user);

if ($stmt->execute()) {
    echo "Car booked successfully! <br>";
    echo "<a href='booking_status.php'>View Booking Status</a>"; // Link to booking status page
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
