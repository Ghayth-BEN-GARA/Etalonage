<?php
    function envoyerEmail($email){
        require_once 'PhpMailer/PHPMailer.php';
        require_once 'PhpMailer/SMTP.php';
        require_once 'PhpMailer/POP3.php';
        require_once 'PhpMailer/OAuth.php';
        require_once 'PhpMailer/Exception.php';

        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail ->IsSmtp();
        $mail ->SMTPDebug = 0;
        $mail ->SMTPAuth = true;
        $mail ->SMTPSecure = 'ssl';
        $mail ->Host = 'smtp.gmail.com';
        $mail ->Port = 465;
        $mail ->Timeout = 5;
        $mail ->IsHTML(true);
        $mail ->Username = "Oussemabahri43@gmail.com";
        $mail ->Password = "*66706Puk*";
        $mail ->SetFrom($email,"Eleonetech Company");
        $mail ->Subject = "Confirmation";
        $mail->AddEmbeddedImage('img/logo_societe.jpg', 'logo_societe','img/logo_societe.jpg');
        $mail ->Body = "<div style = 'border:1px dotted #496b91; padding:5px;margin-right:50px;margin-top:10px;'>
                            <h3>Objet : Confirmation de création de compte</h3>
                                <p style = 'color: #496b91;'>Bonjour, </p>
                                <p>Suite à votre demande de <b>la création d'un nouveau compte</b>, nous souhaitons par le présente message, confirmer par écrit la création de votre compte.</p>
                        </div>
                        <br>
                        <p>Envoyé de : 
                            <br>
                            <div style = 'display:inline-block;'>
                                <img src = 'cid:logo_societe' style = 'max-width: 100px;width: 100px;'></img>
                            </div> 
                        </p>";
        $mail ->AddAddress($email);
        $mail ->CharSet = 'UTF-8';
        if($mail->send()){
            echo "Email envoyé";
        }

        else{
            echo "Email non envoyé";
        }
    }
    envoyerEmail($_POST['email']);
?>