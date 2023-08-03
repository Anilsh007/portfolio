<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data
  $name = $_POST["name"];
  $email = $_POST["email"];
  $subject = $_POST["subject"];
  $message = $_POST["message"];

  // Set up email headers
  $to = "anilsconcept@gmail.com"; // Change this to the recipient's email address
  $headers = "From: $name <$email>\r\n";
  $headers .= "Reply-To: $email\r\n";
  
  // Send the email
  $mailSent = mail($to, $subject, $message, $headers);

  if ($mailSent) {
    echo "Email sent successfully!";
  } else {
    echo "Failed to send the email.";
  }
}
?>
