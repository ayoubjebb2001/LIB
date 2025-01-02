<?php
    class Category extends Database {
        private $table = 'categories';
        public function getAll() {
            $sql = "SELECT * FROM {$this->table}";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getCategoryById($id) {
            $sql = "SELECT * FROM {$this->table} WHERE id = :id";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    
        public function addCategory($name) {
            $sql = "INSERT INTO {$this->table} (name) VALUES (:name)";
            $stmt = $this->connect()->prepare($sql);
            return $stmt->execute(['name' => $name]);
        }

    }