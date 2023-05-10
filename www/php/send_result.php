<?php
// ajout de l'instruction de démarrage de session
session_start();

if (isset($_POST['email'])) {
    if(isset($_SESSION)){ // vérification que $_SESSION est initialisée
        // Récupération des données du formulaire
        $questions = $_SESSION['questions'];
        $score = $_SESSION['score'];
        $lang = $_SESSION['lang'];
    
        // Construction du message à envoyer par mail
        $message = '<h2>Résultats du QCM</h2>';
        $message .= '<p>Voici vos résultats :</p>';
        $message .= '<ol>';
        if(is_array($questions)){ // vérification que $questions est un tableau
            foreach ($questions as $question) {
                $message .= '<li>';
                $message .= '<h4>' . (isset($question['question' . $lang]) ? $question['question' . $lang] : $question['question_fr']) . '</h4>'; // Affichage de la question posée en fonction de la langue sélectionnée
                $message .= '<p>Votre réponse: ' . (isset($question['rep_' . $question['id_rep'] . $lang]) ? $question['rep_' . $question['id_rep'] . $lang] : '') . '</p>'; // Affichage de la réponse de l'utilisateur en fonction de la langue sélectionnée
                $message .= '<p>Réponse correcte: ' . (isset($question['rep_' . $question['rep_true'].$lang]) ? $question['rep_' . $question['rep_true'] . $lang] : '') . '</p>'; // Affichage de la réponse correcte en fonction de la langue sélectionnée
                if ($question['id_rep'] == $question['rep_true']) { // Si la réponse de l'utilisateur est correcte
                    $message .= '<p>Résultat: <span style="color:green">Correct</span></p>';
                } else { // Si la réponse de l'utilisateur est incorrecte
                    $message .= '<p>Résultat: <span style="color:red">Incorrect</span></p>';
                }
                $message .= '</li>';
            }
        }
        $message .= '</ol>';
        $message .= '<p>Score: ' . $score . '/' . count($questions) . '</p>'; // Ajout de la vérification que $questions est un tableau
    }
  
    // Envoi du mail
    $to = $_POST['email'];
    $subject = 'Résultats du QCM';
    $headers = 'From: monadresse@mail.com' . "\r\n" .
      'Content-type: text/html; charset=utf-8' . "\r\n" .
      'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);

    // Affichage d'un message de confirmation
    echo '<p>Les résultats ont été envoyés à l\'adresse ' . $to . '.</p>';
}
?>
