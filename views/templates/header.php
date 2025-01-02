<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.6.2/css/all.min.css">
    <title>LIBooK</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">LIBooK</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarContent">
      <?php if (isset($_SESSION['user_id'])): ?>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="/user/books" >My Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/user/reserve">My Reservations</a>
        </li>
      </ul>
      <ul class="navbar-nav">
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