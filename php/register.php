<?php
$uname1 = $_POST['uname1'];
$email = $_POST['email'];
$upswd1 = $_POST['upswd1'];
$upswd2 = $_POST['upswd2'];

if (!empty($uname1) && !empty($email) && !empty($upswd1) && !empty($upswd2)) {
    // Check if passwords match
    if ($upswd1 !== $upswd2) {
        die("Passwords do not match.");
    }

    $hostname = 'localhost:3306';
    $username = 'solartracker_solartracker';
    $password = 'LPyeKFPa%[+3';
    $databasename = 'solartracker_ezonsolartracker';

    // Create connection
    $conn = new mysqli($hostname, $username, $password, $databasename);

    if ($conn->connect_error) {
        die('Connect Error ('. $conn->connect_errno .') '. $conn->connect_error);
    } else {
        $SELECT = "SELECT email FROM register WHERE email = ? LIMIT 1";
        $INSERT = "INSERT INTO register (uname1, email, upswd1) VALUES (?, ?, ?)";

        // Prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if ($rnum == 0) {
            $stmt->close();

            // Hash the password before inserting it into the database
            $hashedPassword = password_hash($upswd1, PASSWORD_DEFAULT);

            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sss", $uname1, $email, $hashedPassword);
            $stmt->execute();
            echo "New record inserted successfully";
        } else {
            echo "Someone already registered using this email";
        }
        $stmt->close();
        $conn->close();
    }
} else {
    echo "All fields are required";
    die();
}
?>
