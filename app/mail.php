<?php

$recepient = "alvi@mail.ua";
$sitename = "alexander-velichko.com";

$name = trim($_POST["name"]);
$phone = trim($_POST["email"]);
$text = trim($_POST["message"]);
$message = "Name: $name \nMail: $phone \nMessage: $text";

$pagetitle = "Новая заявка с сайта \"$sitename\"";
mail($recepient, $pagetitle, $message, "Content-type text/plain; charset=\"utf-8\"\n From: $recepient");