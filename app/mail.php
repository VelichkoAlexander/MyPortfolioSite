<?php

$recepient = "alvi@mail.ua";
$sitename = "alexander-velichko.com";

$name = trim($_POST["name"]);
$phone = trim($_POST["email"]);
$text = trim($_POST["message"]);
$message = "Name: $name \nMail: $phone \nMessage: $text";
$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$pagetitle = "Новая заявка с сайта \"$sitename\"";
mail($recepient, $pagetitle, $message, $headers);