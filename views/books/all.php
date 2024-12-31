<?php
require_once "../views/templates/header.php";
?>
</body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">BooksStore</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="/user/books" >My Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/user/reserve">My Reservations</a>
        </li>
      </ul>
      <ul class="navbar-nav">
      <?php if (isset($_SESSION['user_id'])): ?>
            <div class="col-md-3 text-end">
                <a href="/logout" class="btn btn-danger rounded-pill px-4 shadow-sm hover-shadow">
                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                </a>
            </div>
        <?php else: ?>
            <div class="col-md-3 text-end">
                <a href="/login" class="btn btn-primary rounded-pill px-4 shadow-sm hover-shadow">
                    <i class="bi bi-person-circle me-2"></i>Login
                </a>
            </div>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
<!-- for filter&&search  -->
<section class="container py-4">
    <div class="row align-items-center g-3">
        <!-- Categories Filter -->
        <div class="col-md-3">
            <select class="form-select" name="categories" id="categories" aria-label="Select category">
                <option value="All">All Categories</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                <?php endforeach; ?>
                <!--<option value="Fiction">Fiction</option>                 
                <option value="Non-Fiction">Non-Fiction</option>                 
                <option value="Educational">Educational</option>                 
                <option value="Children's Books">Children's Books</option>                 
                <option value="Graphic Novels and Comics">Graphic Novels and Comics</option>                 
                <option value="Mystery and Crime">Mystery and Crime</option>                 
                <option value="Fantasy and Mythology">Fantasy and Mythology</option>                 
                <option value="Poetry and Drama">Poetry and Drama</option>                 
                <option value="Health and Wellness">Health and Wellness</option>                 
                <option value="Religious and Spiritual">Religious and Spiritual</option>  -->
            </select>
        </div>

        <!-- Status Filter -->
        <div class="col-md-3">
            <select class="form-select" name="status" id="status" aria-label="Select status">
                <option value="All">All Status</option>
                <option value="available">Available</option>
                <option value="borrowed">Borrowed</option>
                <option value="reserved">Reserved</option>
            </select>
        </div>

        <!-- Search Input -->
        <div class="col-md-3">
            <div class="input-group">
                <input type="text" class="form-control" id="search" placeholder="Search books..." aria-label="Search books">
                <button class="btn btn-outline-secondary" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>

    </div>
</section>
<!-- books bib  -->
<section class="books-container container py-4">
    <?php if (empty($books)): ?>
        <div class="alert alert-warning">No books found.</div>
    <?php else: ?>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            <?php foreach ($books as $book): ?>
                <div class="col">
                    <div class="card h-100 shadow-sm">
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
    <?php endif; ?>
</section>
<!-- Ajax with jquery category filtering -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function() {
        function filterBooks() {
            const category = $('#categories').val();
            const status = $('#status').val();
            const search = $('#search').val();

            $.ajax({
                url: '/books/filter',
                method: 'POST',
                data: {
                    category: category,
                    status: status,
                    search: search
                },
                success: function(response) {
                    $('.books-container').html(response);
                }
            });
        }

        $('#categories, #status').on('change', filterBooks);
        $('#search').on('keyup', debounce(filterBooks, 500));

        function debounce(func, wait) {
            let timeout;
            return function() {
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(this, arguments), wait);
            };
        }
    });
</script>

<?php require_once "../views/templates/footer.php"; ?>