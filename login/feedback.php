<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    uploadData();
}

function uploadData() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "finalfeedback";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO userinput (username, email, usertext) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    $name = $_POST['username'];
    $email = $_POST['email'];
    $message = $_POST['usertext'];

    if ($stmt->execute()) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Feedback submitted from ' . $email . '. Thank you!
                </div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error uploading data:</strong> ' . $stmt->error . '
                </div>';
    }

    $stmt->close();
    $conn->close();
}
?>
