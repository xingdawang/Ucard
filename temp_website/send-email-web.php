<?php
    /**
     * This example shows settings to use when sending via Google's Gmail servers.
     */
    $name = $_POST[name];
    $email = $_POST[email];
    $message = $_POST[message];
    
    // re-set
    $name = $email;
    $email = "support@ucardstore.com";
    function sendEmail($emailAddress, $topic, $content) {
        //SMTP needs accurate times, and the PHP time zone MUST be set
        //This should be done in your php.ini, but this is how to do it if you don't have access to that
        date_default_timezone_set('Etc/UTC');
        
        require '../php-mailer/PHPMailerAutoload.php';
        
        //Create a new PHPMailer instance
        $mail = new PHPMailer;
        
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();
        
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        // $mail->SMTPDebug = 2;
        
        //Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';
        
        //Set the hostname of the mail server
        $mail->Host = 'hwsmtp.exmail.qq.com ';
        
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
        $mail->addAddress("$emailAddress");
        
        //Set the subject line
        $mail->Subject = "$topic";
        
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
        $msg="$content";
        $mail->msgHTML("$msg");
        
        //Replace the plain text body with one created manually
        $mail->AltBody = 'This is a plain-text message body';
        
        //Attach an image file
        //$mail->addAttachment('/media/psf/Home/Downloads/ucard.jpg');
        
        //UTF-8 encoding
        $mail->CharSet="UTF-8";
        $mail->send();
        /*
        //send the message, check for errors
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message sent!";
        }
        */
    }
    sendEmail($email, $name, $message);
    echo 'Email send successfully'.'<meta content="2;/index.html" http-equiv="Refresh" />';
?>
