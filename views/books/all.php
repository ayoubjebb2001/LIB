<?php
    require_once "../views/templates/header.php";
?>
</body>
<!-- for filter&&search  -->
<section class="container py-4">     
    <div class="row align-items-center g-3">         
        <!-- Categories Filter -->         
        <div class="col-md-3">             
            <select class="form-select" name="categories" id="categories" aria-label="Select category">                 
                <option value="All">All Categories</option>                 
                <option value="Fiction">Fiction</option>                 
                <option value="Non-Fiction">Non-Fiction</option>                 
                <option value="Educational">Educational</option>                 
                <option value="Children's Books">Children's Books</option>                 
                <option value="Graphic Novels and Comics">Graphic Novels and Comics</option>                 
                <option value="Mystery and Crime">Mystery and Crime</option>                 
                <option value="Fantasy and Mythology">Fantasy and Mythology</option>                 
                <option value="Poetry and Drama">Poetry and Drama</option>                 
                <option value="Health and Wellness">Health and Wellness</option>                 
                <option value="Religious and Spiritual">Religious and Spiritual</option>             
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
                <input type="text" class="form-control" placeholder="Search books..." aria-label="Search books">
                <button class="btn btn-outline-secondary" type="button">
                    <i class="bi bi-search"></i>Search
                </button>
            </div>
        </div>

        <!-- Login Button -->
        <div class="col-md-3 text-end">
            <a href="/login" class="btn btn-primary rounded-pill px-4 shadow-sm hover-shadow">
                <i class="bi bi-person-circle me-2"></i>Login
            </a>
        </div>
    </div>
</section>
<!-- books bib  -->
 <section class="container py-4">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="https://placehold.co/400x300" class="card-img-top" alt="Book cover">
                <div class="card-body">
                    <h5 class="card-title">Book Title</h5>
                    <p class="card-text text-muted mb-1">Author Name</p>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge bg-success">Available</span>
                        <small class="text-muted">Fiction</small>
                    </div>
                    <p class="card-text"> A brief summary of the book goes here. This engaging story takes readers on a journey through imagination and adventure, perfect for readers of all ages.</p>
                </div>
                <div class="card-footer bg-transparent border-top-0">
                    <div class="d-grid">
                        <button class="btn btn-outline-primary">Borrow Book</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="https://placehold.co/400x300" class="card-img-top" alt="Book cover">
                <div class="card-body">
                    <h5 class="card-title">Another Book</h5>
                    <p class="card-text text-muted mb-1">Second Author</p>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge bg-warning text-dark">Reserved</span>
                        <small class="text-muted">Non-Fiction</small>
                    </div>
                    <p class="card-text">An insightful exploration of modern science and its implications for our future. This book challenges readers to think differently about the world around them.</p>
                </div>
                <div class="card-footer bg-transparent border-top-0">
                    <div class="d-grid">
                        <button class="btn btn-outline-primary" disabled>Reserved</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="https://placehold.co/400x300" class="card-img-top" alt="Book cover">
                <div class="card-body">
                    <h5 class="card-title">Third Book</h5>
                    <p class="card-text text-muted mb-1">Third Author</p>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge bg-danger">Borrowed</span>
                        <small class="text-muted">Mystery</small>
                    </div>
                    <p class="card-text">A thrilling mystery that keeps readers guessing until the very end. Full of unexpected twists and turns, this book is impossible to put down.</p>
                </div>
                <div class="card-footer bg-transparent border-top-0">
                    <div class="d-grid">
                        <button class="btn btn-outline-primary" disabled>Borrowed</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="https://placehold.co/400x300" class="card-img-top" alt="Book cover">
                <div class="card-body">
                    <h5 class="card-title">Third Book</h5>
                    <p class="card-text text-muted mb-1">Third Author</p>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge bg-danger">Borrowed</span>
                        <small class="text-muted">Mystery</small>
                    </div>
                    <p class="card-text">A thrilling mystery that keeps readers guessing until the very end. Full of unexpected twists and turns, this book is impossible to put down.</p>
                </div>
                <div class="card-footer bg-transparent border-top-0">
                    <div class="d-grid">
                        <button class="btn btn-outline-primary" disabled>Borrowed</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3 row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="https://placehold.co/400x300" class="card-img-top" alt="Book cover">
                <div class="card-body">
                    <h5 class="card-title">Book Title</h5>
                    <p class="card-text text-muted mb-1">Author Name</p>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge bg-success">Available</span>
                        <small class="text-muted">Fiction</small>
                    </div>
                    <p class="card-text"> A brief summary of the book goes here. This engaging story takes readers on a journey through imagination and adventure, perfect for readers of all ages.</p>
                </div>
                <div class="card-footer bg-transparent border-top-0">
                    <div class="d-grid">
                        <button class="btn btn-outline-primary">Borrow Book</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="https://placehold.co/400x300" class="card-img-top" alt="Book cover">
                <div class="card-body">
                    <h5 class="card-title">Another Book</h5>
                    <p class="card-text text-muted mb-1">Second Author</p>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge bg-warning text-dark">Reserved</span>
                        <small class="text-muted">Non-Fiction</small>
                    </div>
                    <p class="card-text">An insightful exploration of modern science and its implications for our future. This book challenges readers to think differently about the world around them.</p>
                </div>
                <div class="card-footer bg-transparent border-top-0">
                    <div class="d-grid">
                        <button class="btn btn-outline-primary" disabled>Reserved</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="https://placehold.co/400x300" class="card-img-top" alt="Book cover">
                <div class="card-body">
                    <h5 class="card-title">Third Book</h5>
                    <p class="card-text text-muted mb-1">Third Author</p>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge bg-danger">Borrowed</span>
                        <small class="text-muted">Mystery</small>
                    </div>
                    <p class="card-text">A thrilling mystery that keeps readers guessing until the very end. Full of unexpected twists and turns, this book is impossible to put down.</p>
                </div>
                <div class="card-footer bg-transparent border-top-0">
                    <div class="d-grid">
                        <button class="btn btn-outline-primary" disabled>Borrowed</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="https://placehold.co/400x300" class="card-img-top" alt="Book cover">
                <div class="card-body">
                    <h5 class="card-title">Third Book</h5>
                    <p class="card-text text-muted mb-1">Third Author</p>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge bg-danger">Borrowed</span>
                        <small class="text-muted">Mystery</small>
                    </div>
                    <p class="card-text">A thrilling mystery that keeps readers guessing until the very end. Full of unexpected twists and turns, this book is impossible to put down.</p>
                </div>
                <div class="card-footer bg-transparent border-top-0">
                    <div class="d-grid">
                        <button class="btn btn-outline-primary" disabled>Borrowed</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
<?php require_once "../views/templates/footer.php"; ?>