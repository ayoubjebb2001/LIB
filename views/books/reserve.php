<!-- hadi lRESERVATION -->
<?php
require_once "../views/templates/header.php";
?>
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