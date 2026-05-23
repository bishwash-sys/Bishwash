<?php
// Database credentials
$servername = "localhost";
$username = "root"; // Default for XAMPP
$password = "";     // Default for XAMPP is empty
$dbname = "school_db";

// 1. Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 2. Check if form is submitted
if (isset($_POST['submit'])) {
    
    // Sanitize inputs
    $name  = htmlspecialchars($_POST['student_name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $grade = htmlspecialchars($_POST['grade']);

    // 3. Use Prepared Statements for security (Prevent SQL Injection)
    $stmt = $conn->prepare("INSERT INTO admissions (student_name, email, phone, grade) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $phone, $grade);

    if ($stmt->execute()) {
        echo "<script>alert('Application submitted successfully!'); window.location='admission.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>