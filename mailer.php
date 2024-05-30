<?php
require 'PHPMailer/PHPMailerAutoload.php'; // Adjust the path to the PHPMailer library

function sendEmail($name, $email, $phoneNumber, $date, $remarks) {

/*
* SMTP SERVER CONGFIGURATIONS FOR SENDING EMAIL
 */


 $host="";     // <<<<<<<<   EDIT THIS
 $port=587; //<<<<<<<<   EDIT THIS
 
 // Credentials for SMTP SERVER
  
 $ID="";    //<<<<<<<<   EDIT THIS
 $pass="";        //<<<<<<<<   EDIT THIS
 
 // sender details 
 
 // sender email is set as same as the SMTP Server credentials
 $sender=$ID;
 $senderName="";     //<<<<<<<<   EDIT THIS
 
 //reciever 
 /*
 specify the email that would be getting the mail
 */
 
 $reciever=""; //<<<<<<<<   EDIT THIS
 $reciever_name=""; // OPTIONAL    //<<<<<<<<   EDIT THIS






    $mail = new PHPMailer(true); // Passing true enables exceptions
    try {
        // Set SMTP configuration
        $mail->isSMTP();
        $mail->Host = $host; // Replace with your SMTP server address
        $mail->Port = $port; // Use the appropriate port (e.g., 587 for TLS)
        $mail->SMTPAuth = true;
        $mail->Username = $ID; // Replace with your email address
        $mail->Password = $pass; // Replace with your email password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption

        // Recipients
        $mail->setFrom($sender, $ID);
        $mail->addAddress($reciever, $reciever_name); // Replace with recipient's email and name

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Appointment from ' . $name;
        $mail->Body = "A customer of the following details booked the appointment: <br>name : $name<br>Email: $email ,<br><br>Your appointment details:<br>Date: $date<br>Remarks: $remarks";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent successfully.';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// Example usage
sendEmail("test", "test@gmail.com", '9876543210', "2021", "aalu");
?>
