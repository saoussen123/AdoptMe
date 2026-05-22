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
    public static function create($pdo, $name, $email, $password, $phone = null)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password, phone) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$name, $email, $hash, $phone]);
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

    /**
     * Save a password reset token for the given email
     */
    public static function saveResetToken($pdo, $email, $token, $expires)
    {
        $stmt = $pdo->prepare("UPDATE users SET reset_token = ?, token_expires = ? WHERE email = ?");
        return $stmt->execute([$token, $expires, $email]);
    }

    /**
     * Find a user by a valid (non-expired) reset token
     */
    public static function findByResetToken($pdo, $token)
    {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE reset_token = ? AND token_expires > NOW()");
        $stmt->execute([$token]);
        return $stmt->fetch();
    }

    /**
     * Update a user's password and clear the reset token
     */
    public static function updatePassword($pdo, $email, $newPassword)
    {
        $hash = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("UPDATE users SET password = ?, reset_token = NULL, token_expires = NULL WHERE email = ?");
        return $stmt->execute([$hash, $email]);
    }
}
