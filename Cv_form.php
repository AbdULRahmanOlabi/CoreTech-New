<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file is uploaded
    if(isset($_FILES["cv"])) {
        // Set recipient email address
        $to = "abd.alrahman.olabi@gmail.com";

        // Set sender email address
        $from = "abd.alrahman.olabi@gmail.com"; 

        // Email subject
        $subject = "CoreTech-MENA - CV Submission";

        // Initial message body
        $message = "A CV has been submitted.\n";

        // Get file details
        $file = $_FILES["cv"]["tmp_name"];
        $filename = $_FILES["cv"]["name"];
        $filetype = $_FILES["cv"]["type"];

        // Check if file is not empty
        if (!empty($file)) {
            // Prepare email headers
            $headers = "From: $from" . "\r\n";
            $headers .= "Reply-To: $from" . "\r\n";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-Type: multipart/mixed; boundary=\"boundary\"" . "\r\n";

            // Encode file attachment
            $attachment = chunk_split(base64_encode(file_get_contents($file)));

            // Construct message with file attachment
            $message .= "--boundary\r\n";
            $message .= "Content-Type: $filetype; name=\"$filename\"\r\n";
            $message .= "Content-Disposition: attachment; filename=\"$filename\"\r\n";
            $message .= "Content-Transfer-Encoding: base64\r\n\r\n";
            $message .= $attachment . "\r\n";
            $message .= "--boundary--";

            // Attempt to send email
            if (mail($to, $subject, $message, $headers)) {
                echo "<script>alert('CV Sent Successfully.'); window.location.href = 'index.html';</script>";
            } else {
                echo "<script>alert('Failed To Send CV.'); window.location.href = 'index.html';</script>";
            }
        } else {
            echo "<script>alert('No File Uploaded.'); window.location.href = 'index.html';</script>";
        }
    } else {
        echo "<script>alert('No File Uploaded.'); window.location.href = 'index.html';</script>";
    }
}
?>
