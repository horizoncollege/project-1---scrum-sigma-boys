<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $to = $_POST['email'];
  $subject = "Inlog gegevens";
  $user = $_POST['user'];
  $pass = $_POST['pass'];

  $message = "Wat fijn dat u bij ons een account heb aangemaakt
  Hierbij verzenden wij uw contact gegevens" . $user . $pass;

  $headers = "From: sigmamedia1@outlook.com";

  $success = mail($to, $subject, $message, $headers);

  if ($success) {
    echo "Email sent successfully.";
  } else {
    echo "Failed to send email.";
  }
}


?>
