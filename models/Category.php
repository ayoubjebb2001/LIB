<?php
    class Category extends Database {
        public function getAll() {
            $sql = "SELECT * FROM categories";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }