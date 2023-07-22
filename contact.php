<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $mailFrom = $_POST['mail'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $captcha = $_POST['g-recaptcha-response'];

    $secretKey = '6LeC-0UnAAAAAMje7IEQ0rMcB5AmkabNcSctjeL4';

    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array('secret' => $secretKey, 'response' => $captcha);
    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data),
        ),
    );
    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
    $jsonResponse = json_decode($response);

    // Check if reCAPTCHA verification was successful
    if ($jsonResponse->success) {
        // reCAPTCHA verification passed, proceed with sending the email

        $mailTo = "business@theseacowfl.com,";
        $headers = "From: " . $mailFrom;
        $txt = "You have received a message from " . $name . ".\n\n" . $message;

        mail($mailTo, $subject, $txt, $headers);
        header("Location: contact.html?mailsend");
    } else {
        // reCAPTCHA verification failed, redirect back to the form with an error message
        header("Location: contact.html?recaptchaerror");
    }
}
?>
