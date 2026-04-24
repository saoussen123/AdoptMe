<?php
class Animal
{
    /**
     * Get all animals from the database
     */
    public static function getAll($pdo)
    {
        $stmt = $pdo->query("
            SELECT a.*, 
                   (SELECT COUNT(*) FROM adoptions ad WHERE ad.animal_id = a.id) > 0 as is_adopted 
            FROM animals a
        ");
        return $stmt->fetchAll();
    }

    /**
     * Record an adoption
     */
    public static function adopt($pdo, $userId, $animalId)
    {
        $stmt = $pdo->prepare("INSERT INTO adoptions (user_id, animal_id) VALUES (?, ?)");
        return $stmt->execute([$userId, $animalId]);
    }
}