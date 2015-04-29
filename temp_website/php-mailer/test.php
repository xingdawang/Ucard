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
$mail->Host = 'smtp.exmail.qq.com ';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 465;//gamil 587

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'ssl';//gmail tls

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "info@ucardstore.com";

//Password to use for SMTP authentication
$mail->Password = "ucard@2014";

//Set who the message is to be sent from
$mail->setFrom('info@ucardstore.com', 'Ucard Store');

//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');
//$mail->addCC("wxd598113636@gmail.com");


//Set who the message is to be sent to
//$mail->addAddress('wxd598113636@gmail.com', 'Ucard Store');
$mail->addAddress('wxd598113636@gmail.com');

//Set the subject line
$mail->Subject = 'Ucard 2015';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
$msg="Hi 磊磊，

请查看原型反馈0330文档。大概功能都没有什么问题了，挺好的，
大型改动：去掉了2个界面；明信片搜索导航换到用户界面。
然后我们又提供了一下设计上的参考意见。

但文档里面的图片均为设想图，均非设计图。具体排版，如何美观好看，还需要美工好好研究，然后在美工给我们效果图后，最终确定的那个原型才能定稿开发。

里面如果表述不清的地方，欢迎随时给我留言答疑！";
$mail->msgHTML("$msg");

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';

//Attach an image file
$mail->addAttachment('/media/psf/Home/Downloads/ucard.jpg');

//UTF-8 encoding
$mail->CharSet="UTF-8";
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}