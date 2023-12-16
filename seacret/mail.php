<?php
session_start();

$name    = $_POST['name'];
$email   = $_POST['email'];
$phone   = $_POST['phone'];
$message = $_POST['message'];
$captcha = filter_var($_POST['captcha'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

$fields = serialize(array('name' => $name, 'email' => $email, 'phone' => $phone, 'message' => $message));

if( (isset($_POST['name']) && $_POST['name'] != '') && (isset($_POST['email']) && $_POST['email'] != '') &&
    (isset($_POST['message']) && $_POST['message'] != '') && (isset($_POST['captcha']) && $_POST['captcha'] != '') )
{
    // CONVERTIMOS A MAYUSCULAS
    $captcha = strtoupper($captcha);

    if(!empty($captcha))
    {
        if($captcha != $_SESSION['captcha']['red'])
        {
            header('Location: contact.php?error=captcha&fields='.base64_encode($fields));
            die('error');
        }
    }

    $formcontent=" From: $name \n Phone: $phone \n email: $email \n Message: $message";

    $recipient = "sergio@sergiojimenez.com";
    $subject = "Contact Form";
    $mailheader = "From: $email \r\n";
    mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");

    header('Location: contact.php?success');
    die();
}
else
{
    header('Location: contact.php?error=fields&fields='.base64_encode($fields));
    die();
}