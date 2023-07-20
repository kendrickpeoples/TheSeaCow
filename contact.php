<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $mailFrom = $_POST['mail'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $mailTo = "kendrickpeoples07@gmail.com";
    $headers = "From: ".$mailFrom;
    $txt = "You have received a message from ".$name.".\n\n".$message;

    mail($mailTo, $subject, $txt, $headers);
    header("Location: contact.html?mailsend");
}