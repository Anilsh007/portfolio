<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Validate the email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit();
    }

    // Set up email headers
    $to = "anilsconcept@gmail.com"; // Replace with the recipient's email address
    $headers = "From: " . $name . " <" . $email . ">\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Compose the email content
    $email_content = "Name: " . $name . "<br>";
    $email_content .= "Email: " . $email . "<br>";
    $email_content .= "Subject: " . $subject . "<br>";
    $email_content .= "Message: " . nl2br($message) . "<br>";

    // Send the email
    if (mail($to, $subject, $email_content, $headers)) {
        echo "Email sent successfully";
    } else {
        echo "Failed to send email";
    }
}
?>
