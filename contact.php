<?php
// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$subject = "CoreTech-MENA - " . $_POST['subject'];
$message = $_POST['message'];

// Email recipient
$to = "abd.alrahman.olabi@gmail.com";

// Email headers
$headers = "From: $name <$email>\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// Email content
$email_content = "<p><strong>Name:</strong> $name</p>";
$email_content .= "<p><strong>Email:</strong> $email</p>";
$email_content .= "<p><strong>Subject:</strong> $subject</p>";
$email_content .= "<p><strong>Message:</strong> $message</p>";

// Send email
if (mail($to, $subject, $email_content, $headers)) {
  // If mail sent successfully
  echo "<script>alert('Your Message Has Been Sent Successfully.'); window.location.href = 'index.html';</script>";
} else {
  // If mail sending failed
  echo "<script>alert('Failed To Send Your Message. Please Try Again Later.'); window.location.href = 'index.html';</script>";
}
