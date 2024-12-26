<?php
class Book extends Database {
    private $table = 'books';
    
    public function getAll() {
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addBook($title, $author, $category_id, $summary) {
        $sql = "INSERT INTO {$this->table} (title, author, category_id, summary) 
                VALUES (:title, :author, :category_id, :summary)";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([
            'title' => $title,
            'author' => $author,
            'category_id' => $category_id,
            'summary' => $summary
        ]);
    }
}