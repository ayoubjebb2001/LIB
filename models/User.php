<?php 


//require_once "x.php"; 
class User {
    private $user_id;
    private $name;
    private $email;
    private $password;
    private $role;
    function __construct($user_id,$name,$email,$password,$role){
        $this -> user_id = $user_id++;
        $this -> name = $name;
        $this -> email = $email;
        $this -> password = $password;
        $this -> role = $role;
            }
    function getUserId(){
        return $this->user_id;
    } 
    function getName(){
        return $this->name;
    } 
    function getEmail(){
        return $this->email;
    } 
    function getPassword(){
        return $this->password;
    } 
    function getRole(){
        return $this->role;
    } 
    function setUserId($user_id){
        $this -> user_id =$user_id;
    }
    function setName($name){
        $this -> name =$name;
    }
    function setEmail($email){
        $this -> email =$email;
    }
    function setPassword($password){
        $this -> password =$password;
    }
    function setRole($role){
        $this -> role =$role;
    }
    function register($name, $email, $password){
                if (empty($name) || empty($email) || empty($password)) {
                    return "All fields are required.";
                }
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                
                $db = new Database();
                if($name === "admin" && $password === "Admin"){
                    $query = "INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, 'admin')";
                }else{
                    $query = "INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, 'User')";
                }
                $db->prepare($query);
                $db->bind(':name', $name);
                $db->bind(':email', $email);
                $db->bind(':password', $hashedPassword);
        
                if ($db->execute()) {
                    return "Registration successful.";
                } else {
                    return "Registration failed. Please try again.";
                }
        }
    function logIn($name,$password){
        if(empty($name) || empty($password)){
            return "All fields are required.";
        }
        $db = new Database();
        $queryPass = "SELECT name,password FROM users WHERE name=$name && password = $password";
        $res = $db->query($queryPass);
        if($res){
            if($name === "admin" && $password === "Admin"){
                header('Location: ../views/admin.php');
            }else{
                header('Location: ../views/user.php');
            }
        }
    } 
    function logout(){
        $db ->exit();
    }
    function reserveBook($books_id){
        if($books_id){
            if($status ==="available"){
                $status ="borrowed";
                return "the book is available";
            }else if($status==="borrowed"){
                return "the book is not available, but you can reserve it";
            }else {
                return "the book is not available, and the reservation queu is at $queu";
            }
        }
    }

    
        }



?>