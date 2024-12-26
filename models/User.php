<?php


//require_once "x.php"; 
class User extends Database
{
    private $user_id;
    private $name;
    private $email;
    private $password;
    private $role;

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    function setName($name)
    {
        $this->name = $name;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }

    function setPassword($password)
    {
        $this->password = $password;
    }

    function setRole($role)
    {
        $this->role = $role;
    }
    
    public function register($username, $email, $password)
    {
        if($username == "admin")
        {
            $role = "admin";
        }
        else
        {
            $role = "user";
        }
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (name, email, password,role) VALUES (:name, :email, :password,:role)";
        $stmt = $this->connect()->prepare($sql);

        return $stmt->execute([
            'name' => $username,
            'email' => $email,
            'password' => $hashedPassword,
            'role' => $role
        ]);
    }

    public function login($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $user['role'];
            return true;
        }
        return false;
    }

    function logout()
    {
        session_start();
        session_destroy();
        header('Location: ../views/login.php');
    }
}
