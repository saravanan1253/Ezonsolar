<?php
// Database connection details
$hostname = 'localhost:3306';
$username = 'solartracker_solartracker';
$password = 'LPyeKFPa%[+3';
$databasename = 'solartracker_ezonsolartracker';

// Establish database connection
$mysqli = new mysqli($hostname, $username, $password, $databasename);

// Check database connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Function to sanitize input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Extract and sanitize form data
    $first_name = sanitize_input($_POST['first_name']);
    $last_name = sanitize_input($_POST['last_name']) ?? null;
    $company_name = sanitize_input($_POST['company_name']) ?? null;
    $email = sanitize_input($_POST['email']);
    $phone = sanitize_input($_POST['phone']);
    $additional_info = sanitize_input($_POST['additional_info']) ?? null;
    
    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // Prepare and bind SQL statement
    $stmt = $mysqli->prepare("INSERT INTO user_details (first_name, last_name, company_name, email, phone, additional_info) VALUES (?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die("Error preparing statement: " . $mysqli->error);
    }
    $stmt->bind_param("ssssss", $first_name, $last_name, $company_name, $email, $phone, $additional_info);

    // Execute SQL statement
    if ($stmt->execute()) {
        // Send email notification
        $to = "saravananp5567@gmail.com"; // Replace with recipient's email
        $subject = "New Contact Form Submission";
        $message = "Name: $first_name $last_name\nCompany: $company_name\nEmail: $email\nPhone: $phone\nAdditional Info: $additional_info";
        $headers = "From: yourwebsite@example.com\r\n"; // Replace with sender's email
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Send email
        if (mail($to, $subject, $message, $headers)) {
            echo "Message sent successfully";
        } else {
            echo "Error sending email.";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close database connection
$mysqli->close();
?>
