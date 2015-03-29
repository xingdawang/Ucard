<?php
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require 'PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "wxd598113636@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "xingda598113636";

//Set who the message is to be sent from
$mail->setFrom('no-reply@UcardStore.com', 'Ucard Store');

//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');
$mail->addCC("wxd598113636@gmail.com");

//Set who the message is to be sent to
//$mail->addAddress('wxd598113636@gmail.com', 'Ucard Store');
$mail->addAddress('0804908@gmail.com');

//Set the subject line
$mail->Subject = 'Ucard 2015';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
$msg="静雯，你现在正在看的这样邮件是兴达敲的程序发送出来的，所有的小组建功能，除了生成pdf模块外，功能均已实现。"."\r\n"."facebook的登录在：http://xingdawang.me/loginFacebook.html，现在可能还不完善，但是经过快速迭代的修改和优化，咱们可以做的更好!";
$mail->msgHTML("$msg");

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';

//Attach an image file
$mail->addAttachment('/media/psf/Home/Downloads/ucard.jpg');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}