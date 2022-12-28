<?php
//données du formulaire  
$prenom = $_POST['prenom'];
$nom = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];
$activity = $_POST['activity'];
$pays = $_POST['pays'];
$gender = $_POST['gender'];
$accept_secteur = $_POST['ML_Form'];
$comment = $_POST['comment'];
if($_POST['gender'] == "homme"){
    $gender = 1;
} else{
    $gender =0;
}
$secteurlist = null;
foreach ($accept_secteur as $ML_Form){
  $secteurlist = $secteurlist." ".$ML_Form ;
} 

// insertion dans ta table MySQL
$link = new mysqli("127.0.0.1", "root", "20032006", "users_database"); 
// connection avec la base de données
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
} else{
  echo "connected to database" ."<br>"."";
}
 
// tentative d'écriture dans la table
$sql = "INSERT INTO users (prenom,nom,email,age,activity, pays, gender,secteurlist,comment) VALUES ('$prenom','$nom','$email','$age','$activity','$pays','$gender','$secteurlist','$comment')";
if(mysqli_query($link, $sql)){
    header("Location:../form/success/index.html");
  
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);

// envoi de mails
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$mail_to_me = new PHPMailer(true);

try {
    //Server settings
    
    $mail->SMTPDebug = $mail_to_me->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();$mail_to_me->isSMTP();                                          //Send using SMTP
    $mail->Host = $mail_to_me->Host  = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth = $mail_to_me->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username  = $mail_to_me->Username ='noreply.project20212363@gmail.com';                     //SMTP username
    $mail->Password = $mail_to_me->Password   = 'gqryhqqkhdgqcxez';                               //SMTP password
    $mail->SMTPSecure = $mail_to_me->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port = $mail_to_me->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    $mail->addAddress($email); 
    $mail_to_me->addAddress('naheriahamada@gmail.com');


    //Content
    $mail->isHTML(true);   
    $mail_to_me->isHTML(true);                               //Set email format to HTML
    $mail->Subject = 'Mail de remerciement';
    $mail_to_me->Subject = "Quelqu'un a rempli le formulaire de contact";
    $mail_to_me->Body = 'Un utilisateur ('.$nom.' '.$prenom.') a rempli le formulaire de contact. Ouvrez MySQLWorkbench pour voir les détails';
    $mail->Body    = '<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>mail</title>
        <style>
    .button {
      appearance: none;
      background-color: #000000;
      border: 2px solid #1A1A1A;
      border-radius: 15px;
      box-sizing: border-box;
      color: #FFFFFF;
      cursor: pointer;
      margin: 0 auto;
      display: flex;
      justify-content: center;
      font-family: Roobert,-apple-system,BlinkMacSystemFont,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
      font-size: 16px;
      font-weight: 600;
      line-height: normal;
      min-height: 60px;
      min-width: 0;
      outline: none;
      padding: 16px 24px;
      text-align: center;
      text-decoration: none;
      transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
      user-select: none;
      -webkit-user-select: none;
      touch-action: manipulation;
      width: 15rem;
      will-change: transform;
    }
    
    .button:disabled {
      pointer-events: none;
    }
    
    .button:hover {
      box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
      transform: translateY(-2px);
    }
    
    .button:active {
      box-shadow: none;
      transform: translateY(0);
    }
    body{
        font-family: system-ui, -apple-system, "system-ui", ".SFNSText-Regular", sans-serif;;
    }
    
        </style>
    </head>
    <body>
        <img src="https://upload.wikimedia.org/wikipedia/commons/d/d5/Hey_Machine_Learning_Logo.png" alt="logo" style="display: block;
        margin-left: auto;
        margin-right: auto;width: 5rem;">
        <h1 style="text-align: center;">Merci pour votre visite</h1>
        <p>Cher '.$nom.' '.$prenom.', on espère de tout coeur que votre visite aura été agréable. </p>
        <p>Revenez faire un tour sur notre site quand vous voudrez !</p>
        <!-- HTML !-->
    <button class="button" onclick="location.href="http://localhost:8889/projet20212363/start/index.html"; role="button">Revenir sur le site</button>
    
    </body>
    </html>';
    $mail->AltBody = 'Merci pour votre visite on espère de tout coeur que votre visite aura été agréable. Revenez faire un tour sur notre site quand vous voudrez !';

    $mail->send();
    $mail_to_me->send();
    
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
<script src="https://smtpjs.com/v3/smtp.js"></script>
<script src="/contact/form/sendmail.js"></script>
