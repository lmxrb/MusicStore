<?php

    require '../php/vendor/autoload.php';

    use Mailgun\Mailgun;

    $mgClient = new Mailgun('apikey');

    $domain = "https://api.eu.mailgun.net/v3/musicstoreportugal.pt";

    include '../php/setReset.php';

    $userEmail = $_POST["email"];

    $html = ('
        <!doctype html>
        <html lang="pt-PT">
        <head>
            <meta charset="UTF-8">
            <title>Reset Password | MusicStore</title>
            <link rel="icon" href="http://www.musicstoreportugal.pt/hotlink-ok/vinyl.png">
            <meta name="description" content="Reset Password Email Template.">
            <style type="text/css">
                a:hover {text-decoration: underline !important;}
            </style>
        </head>
        
        <body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #717171;" leftmargin="0">
        
        <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#717171">
            <tr>
                <td>
                    <table style="background-color: #404040; max-width:670px;  margin:0 auto;" width="100%" border="0"
                           align="center" cellpadding="0" cellspacing="0">
                        <tr>
                            <td style="height:80px;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="text-align:center;">
                                <a href="https://musicstoreportugal.pt" title="Logo" target="_blank">
                                    <img width="300" src="https://musicstoreportugal.pt/hotlink-ok/logo.png" title="logo" alt="logo">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td style="height:20px;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                       style="max-width:670px;background:#717171; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                    <tr>
                                        <td style="height:40px;">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td style="padding:0 35px;">
                                            <h1 style="color:#ffffff; font-weight:500; margin:0;font-size:32px;">Você pediu para fazer um reset à sua password.</h1>
                                            <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width: 280px;"></span>
                                            <br>
                                            <a href="https://musicstoreportugal.pt/changePassword.php?resetID='.$resetID.'" style="background:#333333;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">
                                               Redefinir Password</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="height:40px;">&nbsp;</td>
                                    </tr>
                                </table>
                            </td>
                        <tr>
                            <td style="height:20px;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="text-align:center;">
                                <p style="font-size:14px; color:rgba(255,255,255,0.74); line-height:18px; margin:0 0 0;"><strong>http://www.musicstoreportugal.pt</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="height:363px;">&nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        
        </body>
        
        </html>
    ');

    $result = $mgClient->sendMessage($domain, array(

        'content-type' => 'text/html\r\n',

        'from'	=> 'MusicStore <mailgun@musicstoreportugal.pt>',

        'to'	=> 'User <' . $userEmail . '>',

        'subject' => 'Password Reset',

        'html'	=>  $html

    ));

    echo('<script>alert("Email sent with success!"); window.location.href = "../index.php";</script>');

?>