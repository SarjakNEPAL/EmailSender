<?php
function sendEmail($name, $email, $phoneNumber,$date,$remarks) {
    
    // Set your email configuration
    $to = 'bhandarisarjak@gmail.com'; // Replace with the recipient's email address
    $subject = 'Appointment from' . $name;
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Load the template from template.html
    $templatePath = 'template.html'; // Adjust the path to your template file
    $templateContent = file_get_contents($templatePath);

    // Replace placeholders in the template
    $placeholders = [
        '{{name}}' => $name,
        '{{email}}' => $email,
        '{{phone}}' => $phoneNumber,
        '{{date}}' => $date,
        '{{remarks}}' => $remarks,
    ];
    $emailBody = strtr($templateContent, $placeholders);

    // Send the email
    if (mail($to, $subject, $emailBody, $headers)) {
        return true; // Email sent successfully
    } else {
        return false; // Email sending failed
    }
}
sendEmail("Yudip","Yudip@gmail.com",9876543210,"2021","aalu");
?>
