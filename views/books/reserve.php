<!-- hadi lRESERVATION -->
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
</section>
<!-- books bib  -->
<section class="books-container container py-4">

    <?php if (empty($sthM)): ?>
        <div class="alert alert-warning">No books found.</div>
    <?php else: ?>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            <?php
             foreach ($sthM as $borow): 
                ?>
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="https://placehold.co/400x300" class="card-img-top" alt="Book cover">
                        <div class="card-body">
                            <h5 class="card-title"><?= $borow['title'] ?></h5>
                            <p class="card-text text-muted mb-1"><?= htmlspecialchars($borow['author']) ?></p>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                            </div>
                            <p class="card-text"><?= htmlspecialchars($borow['summary']) ?></p>
                        </div>
                        <div class="card-footer bg-transparent border-top-0">
                            <div class="d-grid">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>

<?php require_once "../views/templates/footer.php"; ?>