<?php
  
  require 'vendor/autoload.php';
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;


//require 'vendor/PHPMailer/PHPMailer/src/PHPMailer.php';
//require 'vendor/PHPMailer/PHPMailer/src/SMTP.php';


  $name = $_POST['name'];
  $email = $_POST['email'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $party = $_POST['party'];

  $mail = new PHPMailer(true);

  try {
    //Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = getenv('DB_USERNAME');
    $mail->Password = getenv('DB_PASSWORD');
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;



    //Recipients
    $mail->setFrom('shofuku582@gmail.com', 'Ken');
    $mail->addAddress('shofuku582@gmail.com', 'Ken');

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'New Reservation Request';
    $mail->Body    = "Name: $name<br>Email: $email<br>Date: $date<br>Time: $time<br>Party Size: $party";

    $mail->send();
    echo 'Message has been sent';
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
?>
