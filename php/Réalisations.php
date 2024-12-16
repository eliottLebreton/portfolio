<section id="Réalisations">
    <div class="accueil">   
        <div class="realisations-container">
    <?php
    // Charger le fichier YAML
    require_once("YAML/yaml.php");

    // Lire et analyser le fichier YAML
    $data = yaml_parse_file('fichieryaml/Réalisation.yaml');

    // Vérification si le fichier contient des réalisations
    if (isset($data['realisations']) && is_array($data['realisations'])) {
       
        echo "<h2>Réalisation</h2>"; // Titre de la section

        foreach ($data['realisations'] as $realisation) {
            echo "<div class='realisation'>";
            // Afficher le titre
          
            echo "<h3>" . htmlspecialchars($realisation['titre']) . "</h3>";
            // Afficher la description
            echo "<p>" . htmlspecialchars($realisation['description']) . "</p>";
        
            // Afficher les images dans un conteneur flex
            echo "<div class='realisation-images'>";
        
            // Afficher l'image 1
            if (!empty($realisation['illustration'])) {
                echo "<img src='" . htmlspecialchars($realisation['illustration']) . "' alt='" . htmlspecialchars($realisation['titre']) . "'>";
            }
        
            // Afficher l'image 2
            if (!empty($realisation['illustration2'])) {
                echo "<img src='" . htmlspecialchars($realisation['illustration2']) . "' alt='" . htmlspecialchars($realisation['titre']) . " - Image 2'>";
            }

            echo "</div>";  // Fermeture du div.realisation-images
            
            echo "</div>";  // Fermeture du div.realisation
        }
    } else {
        echo "<p>Aucune réalisation trouvée.</p>";
    }
    ?>
    </div>
</div>
</section>
