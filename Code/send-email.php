<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $to = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  $headers = "From: sender@example.com";

  $success = mail($to, $subject, $message, $headers);

  if ($success) {
    echo "Email sent successfully.";
  } else {
    echo "Failed to send email.";
  }
}
?>
