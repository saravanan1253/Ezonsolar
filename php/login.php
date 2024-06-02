<?php
session_start();

$uname = $_POST['uname'] ?? '';
$upswd = $_POST['upswd'] ?? '';

if (!empty($uname) && !empty($upswd)) {
    // Database connection variables
    $hostname = 'localhost:3306';
    $username = 'solartracker_solartracker';
    $password = 'LPyeKFPa%[+3';
    $databasename = 'solartracker_ezonsolartracker';

    // Create connection
    $conn = new mysqli($hostname, $username, $password, $databasename);

    // Check connection
    if ($conn->connect_error) {
        die('Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
    }

    if ($stmt = $conn->prepare("SELECT uname, upswd FROM login WHERE uname1 = ? LIMIT 1")) {
        $stmt->bind_param("s", $uname);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($unameFromDB, $stored_password);
            $stmt->fetch();

            // Verify the password using password_verify
            if (password_verify($upswd, $stored_password)) {
                $_SESSION['username'] = $uname;
                header("Location: admin.php");
                exit();
            } else {
                echo "Invalid username or password.";
            }
        } else {
            echo "Invalid username or password.";
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    $conn->close();
} else {
    echo "All fields are required.";
}
?>
