<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Email recipient
    $to = "pankajtza@gmail.com";  // Replace with the email address to send to

    // Email subject
    $subject = "Contact Form Submission from " . $name;

    // Construct the email message
    $messageBody = "You have received a new message from the contact form:\n\n";
    $messageBody .= "Name: " . $name . "\n";
    $messageBody .= "Email: " . $email . "\n\n";
    $messageBody .= "Message:\n" . $message;

    // Email headers
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send email
    if (mail($to, $subject, $messageBody, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send message. Please try again later.";
    }
} else {
    echo "Invalid request.";
}
?>
