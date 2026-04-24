<?php
class User
{
    /**
     * Find a user by their email
     */
    public static function findByEmail($pdo, $email)
    {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    /**
     * Create a new user
     */
    public static function create($pdo, $name, $email, $password)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $email, $hash]);
    }

    /**
     * Get all animals adopted by a user
     */
    public static function getAdoptions($pdo, $userId)
    {
        $stmt = $pdo->prepare("
            SELECT a.*, ad.adoption_date 
            FROM adoptions ad
            JOIN animals a ON ad.animal_id = a.id
            WHERE ad.user_id = ?
            ORDER BY ad.adoption_date DESC
        ");
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }
}
