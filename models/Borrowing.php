<?php
class Borrowing extends Database {
    private $table = 'borrowings';
    
    public function borrowBook($user_id, $book_id) {
        $borrow_date = date('Y-m-d');
        $due_date = date('Y-m-d', strtotime('+1 day'));
        $sql = "INSERT INTO {$this->table} (user_id, book_id, borrow_date, due_date) 
                VALUES (:user_id, :book_id,:borrow_date,:due_date)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([
            'user_id' => $user_id,
            'book_id' => $book_id,
            'borrow_date' => $borrow_date,
            'due_date' => $due_date
        ]);
        $sql = "UPDATE books SET status = 'borrowed' WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['id' => $book_id]);
    }

    public function reserveBook($user_id, $book_id) {
        $borrow_date = $this->getBookDueDate($book_id);
        if ($borrow_date) {
            $borrow_date = date('Y-m-d', strtotime($borrow_date));
        } else {
            $borrow_date = date('Y-m-d');
        }
        $sql = "INSERT INTO {$this->table} (user_id, book_id, borrow_date, due_date,notification_sent) 
                VALUES (:user_id, :book_id, :borrow_date, DATE_ADD(:borrow_date, INTERVAL 1 DAY),0)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([
            'user_id' => $user_id,
            'book_id' => $book_id,
            'borrow_date' => $borrow_date
        ]);
        $sql = "UPDATE books SET status = 'reserved' WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['id' => $book_id]);
    }

    public function getBookDueDate($book_id) {
        $sql = "SELECT MAX(due_date) as due_date FROM {$this->table} WHERE book_id = :book_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['book_id' => $book_id]);
        return $stmt->fetch()['due_date'];
    }

    public function getBookBorrower($book_id) {
        $sql = "SELECT user_id FROM {$this->table} WHERE book_id = :book_id AND return_date IS NULL";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['book_id' => $book_id]);
        return $stmt->fetch();
    }

    public function returnBook($user_id,$book_id) {
        $sql = "UPDATE {$this->table} SET return_date = CURDATE() WHERE user_id = :user_id AND book_id = :book_id AND return_date IS NULL";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([
            'user_id' => $user_id,
            'book_id' => $book_id
        ]);
        // Check if the book is reserved or borrowed
        $sql = "SELECT status FROM books WHERE id = :book_id";
        $stmt = $this->connect()->prepare($sql);
        $status = $stmt->execute(['book_id' => $book_id]);
        if ($status == 'borrowed') {
            $sql = "UPDATE books SET status = 'available' WHERE id = :book_id";
            
        }else{
            $sql = "UPDATE books SET status = 'borrowed' WHERE id = :book_id";
        }
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['book_id' => $book_id]);
    }
}