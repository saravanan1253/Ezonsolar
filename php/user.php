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

    // Handle file upload
    $upload_dir = 'uploads/';
    $pdf_attachment = $_FILES['pdf_attachment'];
    $upload_file = $upload_dir . basename($pdf_attachment['name']);
    
    // Valid file extensions
    $valid_extensions = array('pdf');
    
    // Check if the file is a PDF
    if ($pdf_attachment['type'] != 'application/pdf') {
        die("Only PDF files are allowed");
    }

    // Move the uploaded file to the destination directory
    if (!move_uploaded_file($pdf_attachment['tmp_name'], $upload_file)) {
        die("Error uploading file");
    }

    // Prepare and bind SQL statement
    $stmt = $mysqli->prepare("INSERT INTO contact_user_data (first_name, last_name, company_name, email, phone, additional_info, pdf_attachment, date, added_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $first_name, $last_name, $company_name, $email, $phone, $additional_info, $upload_file, $date, $added_date);

    // Get current date
    $date = date('Y-m-d');
    $added_date = date('Y-m-d');

    // Execute SQL statement
    if ($stmt->execute()) {
        // Send email notification
        $to = "saravananp5567@gmail.com"; // Replace with recipient's email
        $subject = "New Contact Form Submission";
        $message = "Name: $first_name $last_name\nCompany: $company_name\nEmail: $email\nPhone: $phone\nAdditional Info: $additional_info\nAttached PDF: $upload_file";
        $headers = "From: yourwebsite@example.com"; // Replace with sender's email

        // Send email
        if (mail($to, $subject, $message, $headers)) {
            echo "Message sent successfully";
        } else {
            echo "Error sending email.";
        }
    } else {
        echo "Error: " . $mysqli->error;
    }

    // Close statement
    $stmt->close();
}

// Close database connection
$mysqli->close();

// Function to sanitize input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
