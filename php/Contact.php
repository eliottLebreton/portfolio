<head>
    <link rel="stylesheet" href="css/contact.css">
</head>

<section id="Contact">
    <div class="accueil">

<?php
$data = yaml_parse_file('fichieryaml/Contact.yaml');

$recaptcha_site_key = '6LcB-6QqAAAAADsWl8oqaxNwwb7Hg78WqNBMqT4O';
$recaptcha_secret_key = '6LcB-6QqAAAAAFp1bAJi9fQltbDnHCb6vSfp7CzT';



echo "<div class='wrapper'>";
echo "<div class='container-contact'>";
echo "<h1>Contact</h1>";

echo "<form method='POST' action=''>";

echo "<label for='nom'>Nom :</label>";
echo "<input type='text' id='nom' name='nom' placeholder='" . $data[0]['nom'] . "' required>";

echo "<label for='adresse'>Adresse e-mail :</label>";
echo "<input type='email' id='adresse' name='adresse' placeholder='" . $data[0]['adresse'] . "' required>";

echo "<label for='objet'>Objet :</label>";
echo "<input type='text' id='objet' name='objet' placeholder='" . $data[0]['objet'] . "' required>";

echo "<label for='contenu-message'>Message :</label>";
echo "<textarea id='contenu-message' name='contenu-message' placeholder='" . $data[0]['contenu-message'] . "' required></textarea>";

echo "<div class='g-recaptcha' data-sitekey='" . $recaptcha_site_key . "'></div>";

echo "<button type='submit'>Envoyer</button>";
echo "</form>";

echo "</div>";
echo "</div>";
?>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

    </div>
</section>