<section id="Competence">
    <div class="accueil">

<?php
    // Charger le fichier YAML
    require_once("yaml/yaml.php");
    $data = yaml_parse_file('fichieryaml/Compétences.yaml');

    // Vérifier si le fichier YAML contient des compétences
    if (isset($data['Competence'])) {
        $Competences = $data['Competence'];

        echo "<h2>Mes Compétences</h2>"; // Titre de la section

        // Parcours des domaines de compétences
        foreach ($Competences as $Competence) {
            if (isset($Competence['domaine'])) {
                echo "<h3>" . ucfirst($Competence['domaine']) . "</h3>"; // Affichage du domaine

                // Parcours des items de compétences
                if (isset($Competence['item']) && is_array($Competence['item'])) {
                    foreach ($Competence['item'] as $item) {
                        if (isset($item['nom'], $item['niveau'])) {
                            $niveau = explode('/', $item['niveau']); // Séparer le niveau (ex: 3/5)
                            $niveauActuel = (int)$niveau[0]; // Niveau atteint (3)
                            $niveauMax = (int)$niveau[1]; // Niveau max (5)

                            echo "<div class='Competence-item'>";
                            echo "<p>" . ucfirst($item['nom']) . " (" . $item['niveau'] . ")</p>"; // Affichage du nom et du niveau

                            // Calcul de la largeur de la jauge en pourcentage
                            $width = ($niveauActuel / $niveauMax) * 100;

                            // Affichage de la jauge
                            echo "<div class='niveau-bar'>
                                    <div class='niveau' style='width: {$width}%;'></div>
                                  </div>";

                            echo "</div>"; // Fermeture du bloc de compétence
                        }
                    }
                }
            }
        }
    } else {
        echo "<p>Aucune compétence trouvée dans le fichier YAML.</p>";
    }
    ?>

</div>
</section>
