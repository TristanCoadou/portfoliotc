<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assurez-vous que les champs email, nom, et message ne sont pas vides
    if(isset($_POST['email']) && isset($_POST['name']) && isset($_POST['about-event-hosting']) &&
        !empty($_POST['email']) && !empty($_POST['name']) && !empty($_POST['about-event-hosting'])) {

        $name = strip_tags(trim($_POST['name']));
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
        $message = trim($_POST['about-event-hosting']);
        $object = trim($_POST['company-organization']);

        $to = 'tristan.coadou.2@gmail.com';
        $subject = "Nouveau message de: $name";
        $email_content = "Nom: $name\n";
        $email_content .= "Email: $email\n";
        $email_content .= "Objet: $object\n";
        $email_content .= "Message:\n$message\n";
        $headers = "From: $name <$email>";

        if(mail($to, $subject, $email_content, $headers)) {
            echo "Merci! Votre message a été envoyé.";
        } else {
            echo "Oops! Quelque chose s'est mal passé et nous n'avons pas pu envoyer votre message.";
        }
    } else {
        echo "Oops! Il semble qu'il y ait eu un problème avec le formulaire que vous avez soumis.";
    }
} else {
    echo "Il y a eu un problème avec votre soumission, veuillez réessayer.";
}
?>
