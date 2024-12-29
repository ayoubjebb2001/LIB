<?php

class BookController extends BaseController
{
    private $model;
    private $categoryModel;
    public function __construct()
    {
        $this->model = new Book();
        $this->categoryModel = new Category();
    }
    public function index()
    {
        $this->render('books/all', [
            'books' => $this->model->getAll(),
            'categories' => $this->categoryModel->getAll(),
        ]);
    }

    public function filter()
    {
        if (!isset($_POST['category']) || !isset($_POST['status'])) {
            return;
        }

        $category = $_POST['category'];
        $status = $_POST['status'];
        $search = $_POST['search'] ?? '';

        $books = $this->model->getFiltered($category, $status, $search);

        // Return only the books HTML partial
        ob_start();
        if (empty($books)): ?>
            <div class="alert alert-warning">No books found.</div>
        <?php else: ?>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                <?php foreach ($books as $book): ?>
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <!-- Existing book card HTML -->
                            <img src="https://placehold.co/400x300" class="card-img-top" alt="Book cover">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($book['title']) ?></h5>
                                <p class="card-text text-muted mb-1"><?= htmlspecialchars($book['author']) ?></p>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <?php
                                    switch ($book['status']) {
                                        case 'available':
                                            echo '<span class="badge bg-success">Available</span>';
                                            break;
                                        case 'borrowed':
                                            echo '<span class="badge bg-warning">Borrowed</span>';
                                            break;
                                        default:
                                            echo '<span class="badge bg-danger">Reserved</span>';
                                    }
                                    ?>
                                    <small class="text-muted"><?= htmlspecialchars($book['category_name']) ?></small>
                                </div>
                                <p class="card-text"><?= htmlspecialchars($book['summary']) ?></p>
                            </div>
                            <div class="card-footer bg-transparent border-top-0">
                                <div class="d-grid">
                                    <?php if ($book['status'] == 'available' && isset($_SESSION['user_id'])): ?>
                                        <a href="/borrow?id=<?= $book['id'] ?>" class="btn btn-primary">Borrow Book</a>
                                    <?php elseif (!isset($_SESSION['user_id'])): ?>
                                        <a href="/login" class="btn btn-outline-primary">Login to Borrow</a>
                                    <?php else: ?>
                                        <button class="btn btn-secondary" disabled>Not Available</button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
<?php endif;
        echo ob_get_clean();
        exit;
    }
}
