<section id="Formation">
    <div class="accueil">

<style>
        /* Conteneur principal des formations */
        .formations-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between; /* Espace égal entre les blocs */
            gap: 20px; /* Espacement entre les blocs */
            padding: 20px;
        }

        /* Bloc individuel de chaque formation */
        .formation {
            flex: 1 1 calc(30% - 20px); /* Taille flexible : environ 30% de la largeur */
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
            min-width: 250px;
            text-align: center;
        }

        .formation h3 {
            font-size: 1.2em;
            color: #333;
        }

        .formation p {
            font-size: 0.9em;
            color: #000000;
            margin: 10px 0;
        }

        .formation a {
            text-decoration: none;
            color: #000000;
            font-weight: bold;
        }

        .formation a:hover {
            text-decoration: underline;
        }

        /* Responsivité */
        @media (max-width: 768px) {
            .formation {
                flex: 1 1 100%; /* Occupe toute la largeur sur les écrans étroits */
            }
        }
    </style>

    <div class="formations-container">
    <?php
    // Charger le fichier YAML
    require_once("YAML\yaml.php");
    
    // Lire et analyser le fichier YAML
    $data = yaml_parse_file('fichieryaml/Formation.yaml');

    
    // Vérification si le fichier contient des formations
    if (isset($data['Formation']) && is_array($data['Formation'])) {
       
        foreach ($data['Formation'] as $Formation) {
           
            
           
            echo "<div class='formation'>";

            // Affichage du nom et de l'établissement
            echo "<h3>" . htmlspecialchars(ucfirst($Formation['nom'])) . "</h3>";
            echo "<p><strong>Établissement:</strong> " . htmlspecialchars(ucfirst($Formation['etablissement'])) . "</p>";

            // Affichage des dates
            echo "<p><strong>Dates:</strong> " . htmlspecialchars($Formation['date_debut']) . " - " . htmlspecialchars($Formation['date_fin']) . "</p>";

            // Affichage du lieu (si présent)
            if (!empty($Formation['lieu'])) {
                echo "<p><strong>Lieu:</strong> " . htmlspecialchars(ucfirst($Formation['lieu'])) . "</p>";
            }

            // Affichage du contenu (si présent)
            if (!empty($Formation['contenu'])) {
                echo "<p><strong>Contenu:</strong> " . htmlspecialchars(ucfirst($Formation['contenu'])) . "</p>";
            }

            // Lien vers le CV PDF (si présent)
            if (!empty($Formation['lien_cv_pdf'])) {
                echo "<p><a href='" . htmlspecialchars($Formation['lien_cv_pdf']) . "' target='_blank'>Voir le CV (PDF)</a></p>";
            }

            echo "</div>";
        }
    } else {
        echo "<p>Aucune formation trouvée dans le fichier YAML.</p>";
    }
    ?>
    </div>

</div>  
</section>