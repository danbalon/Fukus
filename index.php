<?php
  require 'vendor/autoload.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  $name = $_POST['name'];
  $email = $_POST['email'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $party = $_POST['party'];

  $mail = new PHPMailer(true);

  try {
    //Server settings
    $mail->isSMTP();
    $mail->Host = 'https://www.gmail.com/';
    $mail->SMTPAuth = true;
    $mail->Username = 'shofuku582@gmail.com';
    $mail->Password = 'zNBCkwmLRqtZP58';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    //Recipients
    $mail->setFrom('your-email@example.com', 'Your Name');
    $mail->addAddress('recipient-email@example.com', 'Recipient Name');

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'New Reservation Request';
    $mail->Body    = "Name: $name<br>Email: $email<br>Date: $date<br>Time: $time<br>Party Size: $party";

    $mail->send();
    echo 'Message has been sent';
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
  header('Location: thank-you.html');
?>
