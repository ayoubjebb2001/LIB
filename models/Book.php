<?php
class Book extends Database {
    private $table = 'books';
    
    
    public function getAll() {
        $sql = "SELECT books.id as book_id, title,author,summary,status,categories.name as category_name FROM {$this->table} JOIN categories ON books.category_id = categories.id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBookById($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getBookByCategory($category_id){
        $sql = "SELECT * FROM {$this->table} WHERE category_id = :category_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['category_id' => $category_id]);
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

    public function getFiltered($category = 'All', $status = 'All', $search = '') {
        $sql = "SELECT b.*, c.name as category_name 
                FROM {$this->table} b 
                JOIN categories c ON b.category_id = c.id 
                WHERE 1=1";
        $params = [];
    
        if($category !== 'All') {
            $sql .= " AND b.category_id = :category";
            $params['category'] = $category;
        }
    
        if($status !== 'All') {
            $sql .= " AND b.status = :status";
            $params['status'] = $status;
        }
    
        if(!empty($search)) {
            $sql .= " AND (b.title LIKE :search OR b.author LIKE :search)";
            $params['search'] = "%{$search}%";
        }
    
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}