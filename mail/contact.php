<?php
if(empty($_POST['name']) || empty($_POST['phone']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$to = "rickigheri@gmail.com"; // Change this email to your //
$subject = "$m_subject:  $name";
$body = "Vous avez reçu un nouveau message du formulaire de votre site internet SAZIRIS.\n\n"."En voici les details:\n\nNom: $name\n\n\nPhone: $phone\n\n\nEmail: $email\n\nSubject: $m_subject\n\nMessage: $message";
$header = "From: $email";
$header .= "Reply-To: $email";

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
