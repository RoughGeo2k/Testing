<?php

// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Check if the script is accessed via a POST request
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST") {

    // Collect and sanitize form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit; // Stop execution if the email is not valid
    }

    // Where to send the email
    $to = "Georvanypierre@gmail.com";

    // Email subject
    $subject = "New Contact Us Message from " . $name;

    // Email body content
    $body = "Name: $name\n";
    $body .= "Email: $email\n\n";
    $body .= "Message:\n$message\n";

    // Email headers
    $headers = "From: $email";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you, your message has been sent.";
    } else {
        echo "Sorry, something went wrong. Please try again.";
    }
} else {
    // This part will run if the script is accessed without a POST request
    echo "Invalid access. Please submit the form properly.";
}
?>
