<?php
require_once "../config/database.php";

try {
    // Lire le contenu du fichier schema.sql
    $sql = file_get_contents(__DIR__ . "/../config/schema.sql");
    
    // Exécuter le SQL
    $pdo->exec($sql);
    
    echo "<div style='font-family: sans-serif; text-align: center; margin-top: 50px;'>";
    echo "<h1 style='color: #10b981;'>Base de données mise à jour avec succès ! 🎉</h1>";
    echo "<p>Les tables (users, adoption_forms, etc.) ont été créées ou mises à jour.</p>";
    echo "<a href='index.php' style='display: inline-block; margin-top: 20px; padding: 10px 20px; background: #847cec; color: white; text-decoration: none; border-radius: 8px;'>Retour à l'accueil</a>";
    echo "</div>";
    
} catch (\PDOException $e) {
    echo "<div style='font-family: sans-serif; padding: 20px;'>";
    echo "<h1 style='color: #ef4444;'>Erreur lors de la mise à jour ❌</h1>";
    echo "<pre style='background: #f4f4f4; padding: 15px; border-radius: 8px;'>" . $e->getMessage() . "</pre>";
    echo "</div>";
}
?>
