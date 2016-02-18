<?php
//Check du post
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $prenom_nom = strip_tags(trim($_POST["prenom_nom"]));
  $prenom_nom = str_replace(array("\r","\n"),array(" "," "),$prenom_nom);
  $mail = filter_var(trim($_POST["mail"]), FILTER_SANITIZE_EMAIL);
  $message = trim($_POST["message"]);
  $object = trim($_POST["object"]);

  //Check des datas
  if ( empty($prenom_nom) OR empty($object) OR empty($message) OR !filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo "Les champs doivent êtres remplis.";
    exit;
  }

  $recipient = "locationporsgrouen@gmail.com";
  $subject = "Contact depuis votre site de $prenom_nom";
  $email_content = "Nom Prénom: $prenom_nom\n";
  $email_content .= "Mail: $mail\n\n";
  $email_content .= "Objet: $object\n";
  $email_content .= "Message:\n$message\n";
  $email_headers = "From: Maison de Vacances Baie d'Audierne <$recipient>";

  //envoi du mail
  if (mail($recipient, $subject, $email_content, $email_headers)) {
    http_response_code(200);
    echo "Merci! Votre message a été envoyé.";
  } else {
    http_response_code(500);
    echo "Oups! Il y a eu un problème lors de l'envoi du formulaire.";
  }
}
else{
  http_response_code(403);
  echo "Il y avait un problème avec la soumission du formulaire, veuillez essayer à nouveau.";
}