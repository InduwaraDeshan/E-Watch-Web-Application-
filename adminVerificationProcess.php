<?php

require "connection.php";
require "Exception.php";
require "PHPMailer.php";
require "SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST["em"])) {

    if (empty($_POST["em"])) {

        echo "Please Enter you Email Address";
    } else {

        $email = $_POST["em"];

        $adminrs = Database::search("SELECT * FROM `admin` WHERE `email`='" . $email . "' ");
        $admin_num = $adminrs->num_rows;

        $resultset = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
        $n = $resultset->num_rows;

        if ($admin_num == 1) {
            $name_data = $resultset->fetch_assoc();
            $name = $name_data["fname"];
            $lname = $name_data["lname"];

            $code = uniqid();

            Database::iud("UPDATE `admin` SET `code`='" . $code . "' WHERE `email`='" . $email . "'");

            

            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'induwarade005@gmail.com';
            $mail->Password = 'password';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('induwarade005@gmail.com', 'DarkLook');
            $mail->addReplyTo('induwarade005@gmail.com', 'DarkLook');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Admin Verification Code';
            $bodyContent = '
            <head>
            <meta http-equiv="content-type" content="text/html; charset=utf-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0;">
             <meta name="format-detection" content="telephone=no"/>
        
        
        
            <style>
        
        body { margin: 0; padding: 0; min-width: 100%; width: 100% !important; height: 100% !important;}
        body, table, td, div, p, a { -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%; }
        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse !important; border-spacing: 0; }
        img { border: 0; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }
        #outlook a { padding: 0; }
        .ReadMsgBody { width: 100%; } .ExternalClass { width: 100%; }
        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }
        
         
        @media all and (max-width: 600px) {
            .floater { width: 320px; }
        }
        
        
        a, a:hover {
            color: #030303;
        }
        .footer a, .footer a:hover {
            color: #999999;
        }
        
             </style>
        
        
        
        </head>
        
        
        <body topmargin="0" rightmargin="0" bottommargin="0" leftmargin="0" marginwidth="0" marginheight="0" width="100%" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
            background-color: #FFFFFF;
             color: #ffffff;"
            bgcolor="#FFFFFF"
            text="#000000">
        
        <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;" class="background"><tr><td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;"
            bgcolor="#050303">
        
        <table border="0" cellpadding="0" cellspacing="0" align="center"
            width="600" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
            max-width: 600px;" class="wrapper">
        
            <tr>
            </tr>
        
            <tr>
                <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 24px; font-weight: bold; line-height: 130%;
                    padding-top: 20px;
                    color: #FFFFFF;
                    font-family: sans-serif;" class="header">
                        Welcome To DarkLook Web site.
                </td>
            </tr>
        
                <tr>
                <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-bottom: 3px; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 18px; font-weight: 300; line-height: 150%;
                    padding-top: 5px;
                    color: #FFFFFF;
                    font-family: sans-serif;" class="subheader">
                    Dear ' . $name . ' ' . $lname . '
                </td>
            </tr>
        
                <tr>
                <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;
                    padding-top: 20px;" class="hero"><a target="_blank" style="text-decoration: none;"
                    href="">
                    <img border="0" vspace="0" hspace="0"
                    src="https://raw.githubusercontent.com/InduwaraDeshan/project_img/main/5843872.jpg"
                    alt="Please enable images to view this content" title="Hero Image"
                    width="530" style="
                    width: 88.33%;
                    max-width: 530px;
                    color: #FFFFFF; font-size: 13px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;"/></a></td>
            </tr>
            <tr>
                <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
                    padding-top: 25px; 
                    color: #FFFFFF;
                    font-family: sans-serif;" class="paragraph">
                        
                    Get your account PIN here.
                </td>
            </tr>
        
                <tr>
                <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                    padding-top: 25px;
                    padding-bottom: 35px;" class="button"><a
                    href="" target="_blank" style="text-decoration: underline;">
                        <table border="0" cellpadding="0" cellspacing="0" align="center" style="max-width: 240px; min-width: 120px; border-collapse: collapse; border-spacing: 0; padding: 0;"><tr><td align="center" valign="middle" style="padding: 12px 24px; margin: 0; text-decoration: underline; border-collapse: collapse; border-spacing: 0; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; -khtml-border-radius: 4px;"
                            bgcolor="#0B5073"><a target="_blank" style="text-decoration: underline;
                            color: #FFFFFF; font-family: sans-serif; font-size: 17px; font-weight: 400; line-height: 120%;"
                            href="">
                            ' . $code . '
                            </a>
                            
                    </td></tr></table></a>
                </td>
            </tr>
        
        
        </table>
        
        
        </td></tr><tr><td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;"
            bgcolor="#F0F0F0">
        
        
        <table border="0" cellpadding="0" cellspacing="0" align="center"
            width="600" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
            max-width: 600px;" class="wrapper">
        
                <tr>
                <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                    padding-top: 25px;" class="social-icons"><table
                    width="256" border="0" cellpadding="0" cellspacing="0" align="center" style="border-collapse: collapse; border-spacing: 0; padding: 0;">
                    <tr>
        
                    
                        <td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;"><a target="_blank"
                            href=""
                        style="text-decoration: none;"><img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
                             color: #ffffff;"
                            alt="F" title="Facebook"
                            width="44" height="44"
                            src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/facebook.png"></a></td>
        
                    
                        <td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;"><a target="_blank"
                            href=""
                        style="text-decoration: none;"><img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
                             color: #ffffff;"
                            alt="T" title="Twitter"
                            width="44" height="44"
                            src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/twitter.png"></a></td>				
        
                        
                        <td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;"><a target="_blank"
                            href=""
                        style="text-decoration: none;"><img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
                             color: #ffffff;"
                            alt="G" title="Google Plus"
                            width="44" height="44"
                            src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/googleplus.png"></a></td>		
        
                        
                        <td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 10px; padding-right: 10px; border-collapse: collapse; border-spacing: 0;"><a target="_blank"
                            href=""
                        style="text-decoration: none;"><img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;
                            color: #ffffff;"
                            alt="I" title="Instagram"
                            width="44" height="44"
                            src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/instagram.png"></a></td>
        
                    </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 13px; font-weight: 400; line-height: 150%;
                    padding-top: 20px;
                    padding-bottom: 20px;
                    color: #494848;
                    font-family: sans-serif;" class="footer">
        
                        
        Copyright ©2022 ZEAMAC Solution, Inc. All rights reserved. <br> Kurunegala,Narammala <br>
        <a href="" target="_blank" style="text-decoration: underline; color: #999999; font-family: sans-serif; font-size: 13px; font-weight: 400; line-height: 150%;">subscription settings</a> anytime.
        <img width="1" height="1" border="0" vspace="0" hspace="0" style="margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;"
                        src="https://raw.githubusercontent.com/konsav/email-templates/master/images/tracker.png" />
        
                </td>
            </tr>
        
        
        </table>
        
        
        </td></tr></table>
        
        </body>
        </html>
        
    ';
            $mail->Body    = $bodyContent;

            if (!$mail->send()) {
                echo 'Verification code sending failed';
            } else {
                echo 'success';
            }
        } else {
            echo "You are not a valid user";
        }
    }
}
