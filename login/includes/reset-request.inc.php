<?php
if(isset($_POST['reset-request-submit'])){
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "localhost/forgottenpwd/create-new-password.php?selector="
            .$selector
            ."&validator="
            .bin2hex($token);

    $expires = date("U") + 1800;

    require 'dbh.inc.php';

    $userEmail = $_POST["email"];

    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "There was an error1";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdRestSelector, pwdResetToken, pweResetExpires) VALUES(?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "There was an error2";
        exit();
    } else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail,$selector,$hashedToken,$expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    $to = $userEmail;

    $subject = "Reset your password for localhost";

    $message = '<p>We receviewd a password reset request. The link to reset your password
                </p>';
    $message .= '<p>Here is your password reset link: </br>';
    $message .= '<a href="'.$url.'">'.$url.'</a></p>';

    
    
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer(true);
    try{
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host ='smtp.gmail.com';
        $mail->Port = '465';
        $mail->Username = 'wogur0505@gmail.com';
        $mail->Password = 'ChuckJang!9';
    
        $mail->SetFrom('no-reply@j.com');
    
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->AddAddress($to);
    
        $mail->Send();

    } catch(Exception $e){
        echo "Message could not be sent. ",$mail->ErrorInfo;
    }

    header("Location: ../reset-password.php?reset=success");
} else {
    header("Location: ../index.php");
}