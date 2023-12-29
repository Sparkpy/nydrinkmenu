<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Year Menu</title>
    <link rel="icon" type="image/x-icon" href="./images/favicon.png">
    <link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+SC&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Alegreya+SC&family=Libre+Caslon+Display&display=swap" rel="stylesheet"> 
        
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="./images/navlogo.png" alt="Navbar Logo" class="nav-img"></a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" aria-current="page">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./daniel.php">Daniel's Coffee</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./steven.php">Steven's Alchocol</a>
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
    <?php
        if (isset($_GET['status'])) {
            $status = $_GET['status'];
            
            if ($status === 'success') {
                echo file_get_contents("./success.html");
            } else if ($status === 'error') {
                echo file_get_contents("./error.html");
            } else if ($status === 'cooldown') {
                echo file_get_contents("./cooldown.html");
            }
        }
    ?>
    
    <div class="title">
        <div class="title-image">
            <img src="./images/logo.png" alt="New Year Menu Logo">
        </div>
        <div class="title-text text-center">
            <p class="display-2">
                <?php
                    if (isset($_COOKIE["Name"])) {
                        echo "Welcome, ".$_COOKIE["Name"]. "!";
                    }
                    else {
                        echo "Welcome, Guest!";
                    }
                ?>
            </p>
            <p class="text-body-secondary title-subtext" data-bs-toggle="modal" data-bs-target="#modalId">
                <u>
                    <?php
                        if (!isset($_COOKIE["Name"])) {
                            echo "Please sign in.";
                        }
                    ?>
                </u>
            </p>
        </div>
    </div>
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
    <div class="cards">
        <div class="card card-1" style="width: 80%;">
            <img src="./images/danielcoffee.png" class="card-img-top" alt="Daniel's Coffee Logo">
            <div class="card-body">
                <!-- <h3 class="card-title daniel-title"><b>Daniel's Coffee</b></h3> -->
                <p class="card-text">Mixing milk and alcohol is not recommended, unless it's Irish coffee.</p>
                <a href="./daniel.php" class="btn btn-secondary card-button">Go to Page</a>
            </div>
        </div>
        <div class="card card-2" style="width: 80%;">
            <img src="./images/stevenalcohol.png" class="card-img-top" alt="Steven's Alcohol Logo">
            <div class="card-body">
                <!-- <h3 class="card-title"><b>Steven's Alcohol</b></h3> -->
                <p class="card-text">Steven's quote</p>
                <a href="./steven.php" class="btn btn-secondary card-button">Go to Page</a>
            </div>
        </div>
    </div>
</body>
</html>

<script>
    const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
</script>
<script src="./bootstrap/bootstrap.min.js"></script>

