<?php require_once "../views/templates/header.php"; ?>

<div class="container py-5">
    <div class="row">
        <!-- Book Image -->
        <div class="col-md-4">
            <img src="https://placehold.co/400x500" class="img-fluid rounded shadow" alt="Book cover">
        </div>
        
        <!-- Book Details -->
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Books</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= htmlspecialchars($book['title']) ?></li>
                </ol>
            </nav>

            <h1 class="mb-4"><?= htmlspecialchars($book['title']) ?></h1>
            
            <div class="mb-4">
                <h5 class="text-muted">By <?= htmlspecialchars($book['author']) ?></h5>
                <span class="badge <?= $book['status'] === 'available' ? 'bg-success' : 'bg-secondary' ?> mb-2">
                    <?= ucfirst(htmlspecialchars($book['status'])) ?>
                </span>
                <span class="ms-2 text-muted">Category: <?= htmlspecialchars($category['name'] ?? 'Uncategorized') ?></span>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Summary</h5>
                    <p class="card-text"><?= nl2br(htmlspecialchars($book['summary'])) ?></p>
                </div>
            </div>

            <?php if($book['status'] === 'available'): ?>
            <button class="btn btn-primary btn-lg">
                <i class="bi bi-book me-2"></i>Borrow this Book
            </button>
            <?php else: ?>
            <button class="btn btn-secondary btn-lg" disabled>
                Currently Unavailable
            </button>
            <?php endif; ?>
            
            <a href="/" class="btn btn-outline-secondary btn-lg ms-2">
                <i class="bi bi-arrow-left me-2"></i>Back to Books
            </a>
        </div>
    </div>
</div>

<?php require_once "../views/templates/footer.php"; ?>