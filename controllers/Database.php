<?php
    class Database {
        private $connection;

        public function connect(){
            try {
                $this->connection = new PDO('mysql:host=localhost;dbname=Bibliotheque', 'root', '');
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->connection;
            } catch (PDOException $e) {
                echo 'Erreur de connexion: ' . $e->getMessage();
                die();
            }
        }
    }
