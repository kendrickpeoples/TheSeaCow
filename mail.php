<?php
if (isset($_POST['submit'])) {
    $to = 'kendrickpeoples07@gmail.com'; // Email address where you want to receive the message
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $email = $_POST['mail'];
    $message = $_POST['message'];

    // Compose the email message
    $email_message = "Name: $name\n";
    $email_message .= "Phone: $phone\n";
    $email_message .= "Subject: $subject\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Message:\n$message";

    // Additional headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    if (mail($to, $subject, $email_message, $headers)) {
        echo '<p>Your message has been sent successfully.</p>';
    } else {
        echo '<p>Sorry, there was an error sending your message. Please try again later.</p>';
    }
}
?>
