<?php
class dbAuth {
    private PDO $pdo;

    public function __construct(string $user = 'web', string $pass = 'sicheresPasswort') {
        $this->pdo = new PDO('mysql:host=localhost;dbname=fun', $user, $pass);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function checkLogin(string $email, string $password): bool {
        $stmt = $this->pdo->prepare("SELECT checkLogin(:email, :password) AS result");
        $stmt->execute(['email' => $email, 'password' => $password]);
        return $stmt->fetchColumn() == 1;
    }

    public function addUser(string $email, string $password): bool {
        $stmt = $this->pdo->prepare("CALL addUser(:email, :password)");
        return $stmt->execute(['email' => $email, 'password' => $password]);
    }

    public function changePassword(string $email, string $oldPassword, string $newPassword): bool {
        if (!$this->checkLogin($email, $oldPassword)) return false;
        $stmt = $this->pdo->prepare("CALL changePassword(:email, :old, :new)");
        return $stmt->execute([
            'email' => $email,
            'old' => $oldPassword,
            'new' => $newPassword
        ]);
    }

    public function removeUser(string $email, string $password): bool {
        if (!$this->checkLogin($email, $password)) return false;
        $stmt = $this->pdo->prepare("CALL removeUser(:email, :password)");
        return $stmt->execute(['email' => $email, 'password' => $password]);
    }
}
?>
