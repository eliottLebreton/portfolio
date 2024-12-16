<?php

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    // Validation des entrées
    if (!$email) {
        echo "L'adresse email est invalide.";
        exit;
    }
    if (strlen($message) > 1000) {
        echo "Le message est trop long.";
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        // Configuration du serveur SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = getenv('SMTP_USERNAME'); // Variables d'environnement
        $mail->Password = getenv('SMTP_PASSWORD');
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Destinataire et expéditeur
        $mail->setFrom($email, "$prenom $nom");
        $mail->addAddress('destinataire@example.com');

        // Contenu de l'email
        $mail->isHTML(true);
        $mail->Subject = "Message de $prenom $nom";
        $mail->Body = "<p>Message : " . nl2br(htmlspecialchars($message)) . "</p>
                       <p>De : $prenom $nom</p>
                       <p>Email : $email</p>";
        $mail->AltBody = "Message : $message\n\nDe : $prenom $nom\nEmail : $email";

        // Envoi du message
        $mail->send();
        echo 'Le message a été envoyé avec succès.';
    } catch (Exception $e) {
        error_log("Erreur d'envoi de mail : {$mail->ErrorInfo}");
        echo "Une erreur s'est produite. Veuillez réessayer plus tard.";
    }
}
?>
