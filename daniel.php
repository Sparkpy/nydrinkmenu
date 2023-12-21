<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daniel's Coffee</title>
    <link rel="icon" type="image/x-icon" href="./images/favicon.png">
    <link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+SC&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
          <div class="container">
          <a class="navbar-brand" href="./index.php"><img src="./images/navlogo.png" alt="Navbar Logo" height="56px"></a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php" aria-current="page">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Daniel's Coffee</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./steven.php">Steven's Alchocol</a>
                    </li>
                    <li class='nav-item'>
                    <?php
                        // Sign In / Sign Out
                        if (isset($_COOKIE["Name"])) {
                            echo "<a class='nav-link link-underline link-underline-opacity-0 text-secondary' href='./logout.php'>Sign Out</a></li>";
                        }
                        else {
                            echo "<button class='nav-link' href='#' data-bs-toggle='modal' data-bs-target='#modalId'>Sign In</button>
                            </li>";
                        }
                    ?>
                </ul>
            </div>
      </div>
    </nav>
    <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Sign In</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="./login.php" method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="InputName" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">This will be used to identify you when you order drinks.</small>
                            <div class="buttons" style="margin-top:25px;">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</input>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <img src="./images/danielcoffee.png" alt="Daniel's Coffee Logo" width="100%">
    <!-- The actual drinks -->
    <div class="sugar-slider">
        <label for="customRange2" class="form-label">Sugar</label>
        <input type="range" class="form-range" min="0" max="3" id="customRange2">
    </div>
    <div class="card-group">
        <div class="card">
            <img
                class="card-img-top"
                src="./images/coffee/americano.webp"
                alt="Americano"
            />
            <div class="card-body">
                <h4 class="card-title">Americano</h4>
                <p class="card-text">150ml</p>
            </div>
        </div>
        <div class="card">
            <img
                class="card-img-top"
                src="./images/coffee/espresso.webp"
                alt="Espresso"
            />
            <div class="card-body">
                <h4 class="card-title">Espresso</h4>
                <p class="card-text"></p>
            </div>
        </div>
    </div>
    
</body>
</html>
<script src="./bootstrap/bootstrap.min.js"></script>