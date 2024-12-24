<?php
class Borrowing extends Database {
    private $table = 'borrowings';
    
    public function borrowBook($user_id, $book_id) {
        $sql = "INSERT INTO {$this->table} (user_id, book_id, borrow_date, due_date) 
                VALUES (:user_id, :book_id, CURDATE(), DATE_ADD(CURDATE(), INTERVAL 14 DAY))";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([
            'user_id' => $user_id,
            'book_id' => $book_id
        ]);
    }

    public function returnBook($borrowing_id) {
        $sql = "UPDATE {$this->table} SET return_date = CURDATE() WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute(['id' => $borrowing_id]);
    }
}