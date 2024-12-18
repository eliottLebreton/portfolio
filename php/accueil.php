<section id="accueil">
    <div class="accueil">

<?php
require_once("yaml\yaml.php");
$data=yaml_parse_file('fichieryaml/Accueil.yaml');

echo "<h2>Présentation</h2>\n";
$Accueil=$data["Accueil"] ;
echo "<p>".ucfirst($Accueil["prenom"])."  ".$Accueil["nom"]."</p>\n";
echo "<p>".ucfirst($Accueil["accroche"])." ".ucfirst($Accueil["présentation"])."</p>\n";

?>

</section>
</div>