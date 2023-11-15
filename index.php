<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Year Drinks</title>
    <link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
          <div class="container">
            <a class="navbar-brand" href="#">Drinks</a>
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
                    <li class="nav-item">
                        <button class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalId">Sign In</a>
                    </li>
                </ul>
            </div>
      </div>
    </nav>
    <div class="title" style="margin-top: 25px;">
        <p class="display-2 text-center">
            <?php
                if (isset($_COOKIE["Name"])) {
                    echo "Welcome, ".$_COOKIE["Name"]. "!";
                }
                else {
                    echo "Welcome, Guest!";
                }
            ?>
        </p>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script>
    const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
</script>
<script src="./bootstrap/bootstrap.min.js"></script>

