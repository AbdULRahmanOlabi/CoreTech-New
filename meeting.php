<?php
// Get form data
$cname = $_POST['cname'];
$cemail = $_POST['cemail'];
$msubject = "CoreTech-MENA - " . $_POST['msubject'];
$startDate = $_POST['startDate'];

// Email recipient
$to = "abd.alrahman.olabi@gmail.com";

// Email headers
$headers = "From: $cname <$cemail>\r\n";
$headers .= "Reply-To: $cemail\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// Email content
$email_content = "<p><strong>Company Name:</strong> $cname</p>";
$email_content .= "<p><strong>Company Email:</strong> $cemail</p>";
$email_content .= "<p><strong>Meeting Subject:</strong> $msubject</p>";
$email_content .= "<p><strong>Meeting Date:</strong> $startDate</p>";

// Send email
if (mail($to, $msubject, $email_content, $headers)) {
    // If mail sent successfully
    echo "<script>alert('Your Meeting Has Been Scheduled Successfully.'); window.location.href = 'index.html';</script>";
} else {
    // If mail sending failed
    echo "<script>alert('Failed To Schedule Your Meeting. Please Try Again Later.'); window.location.href = 'index.html';</script>";
}
