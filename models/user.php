<?php

class User
{


    public static function fetchUser($pdo, string $email)
    {
        $email = trim($email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ['error' => 'Invalid email format'];
        }

        try {
            $sql = "SELECT * FROM users WHERE email = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user ?: null;
        } catch (PDOException $e) {
            return ['error' => 'Query failed: ' . $e->getMessage()];
        }
    }

    // fetch all user
    public static function fetchallUser($pdo, string $email)
    {
        $email = trim($email);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ['error' => 'Invalid email format'];
        }

        try {
            $sql = "SELECT * FROM users WHERE email = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$email]);
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $user ?: null;
        } catch (PDOException $e) {
            return ['error' => 'Query failed: ' . $e->getMessage()];
        }
    }
}
