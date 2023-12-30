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
                        <a class="nav-link" href="./steven.php">Stefan's Alcohol</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./usual.php">The Usual</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./pendingorders.php">Orders</a>
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
    <form action="./order.php" method="post">
        <div class="sugar-slider">
            <label for="customRange2" class="form-label">Sugar (0-2 spoons)</label>
            <input type="range" name="sugar" class="form-range" min="0" max="2" id="customRange2">
        </div>
        <div class="brand d-flex justify-content-left" style="margin: 0 auto; margin-bottom: 0px; width:80%">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">Lactose Intolerant</label>
            </div>
        </div>
        <div class="brand d-flex justify-content-center" style="margin-bottom: 30px;">
            <div class="btn-group brand" role="group" aria-label="Basic radio toggle button group" style="width: 80%;">
                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                <label class="btn btn-outline-primary" for="btnradio1">Nescafe</label>

                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                <label class="btn btn-outline-primary" for="btnradio2">Nescafe Gold</label>

                <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                <label class="btn btn-outline-primary" for="btnradio3">Goldcafe</label>
            </div>
        </div>
        <div class="card-group" id="cardGroup">
        <?php
            $db = mysqli_connect("127.0.0.1", "root", "", "nydrinkmenu");
            $result = $db->query("SELECT * FROM `coffee` ORDER BY `id`;");
            for ($row_no = 0; $row_no < $result->num_rows; $row_no++) {
                $result->data_seek($row_no);
                $row = $result->fetch_assoc();
                echo
                "<div class='card ".$row['brand']." milk-".$row['lactose']."'>".
                "<img class='card-img-top' src='./images/coffee/".$row['imagepath']."'/>".
                "<div class='card-body'>".
                "<h4 class='card-title'>".$row['name']."<span class='text-muted fs-6' style='margin-left: 6px;'>".$row['volume']."ml</span></h4>".
                "<p class='card-text'>".$row['description']."</p>".
                "<button type='submit' class='btn btn-primary' name='order_coffee' value='".$row['id']."'>Order ".$row['name']."</button>".
                "</div></div>";
            }
            mysqli_close($db);
        ?>
        </div>
    </form>
</body>
</html>
<script>
    // Declare constants for the radio buttons
    const brandRadios = document.querySelectorAll('input[name="btnradio"]');
    const lactoseCheckbox = document.getElementById('flexSwitchCheckDefault');

    const nescafe = Array.from(document.getElementsByClassName("Nescafe"));
    const nescafegold = Array.from(document.getElementsByClassName("NescafeGold"));
    const goldcafe = Array.from(document.getElementsByClassName("Goldcafe"));
    const cards = Array.from(document.getElementsByClassName("card"));

    function updateDisplayedDrinks() {
        let selectedBrand = Array.from(brandRadios).find(radio => radio.checked)?.nextElementSibling.textContent;
        let isLactoseIntolerant = lactoseCheckbox.checked;

        if (selectedBrand == "Nescafe") {
            nescafe.forEach(card => {
                if (card.classList.contains("d-none")) {
                    card.classList.remove("d-none");
                }
            });
            nescafegold.forEach(card => {
                if (!card.classList.contains("d-none")) {
                    card.classList.add("d-none");
                }
            });
            goldcafe.forEach(card => {
                if (!card.classList.contains("d-none")) {
                    card.classList.add("d-none");
                }
            });
        }
        else if (selectedBrand == "Nescafe Gold") {
            nescafe.forEach(card => {
                if (!card.classList.contains("d-none")) {
                    card.classList.add("d-none");
                }
            });
            nescafegold.forEach(card => {
                if (card.classList.contains("d-none")) {
                    card.classList.remove("d-none");
                }
            });
            goldcafe.forEach(card => {
                if (!card.classList.contains("d-none")) {
                    card.classList.add("d-none");
                }
            });
        }
        else if (selectedBrand == "Goldcafe") {
            nescafe.forEach(card => {
                if (!card.classList.contains("d-none")) {
                    card.classList.add("d-none");
                }
            });
            nescafegold.forEach(card => {
                if (!card.classList.contains("d-none")) {
                    card.classList.add("d-none");
                }
            });
            goldcafe.forEach(card => {
                if (card.classList.contains("d-none")) {
                    card.classList.remove("d-none");
                }
            });
        }
        
        if (isLactoseIntolerant) {
            cards.forEach(card => {
                if (card.classList.contains("milk-1") && !card.classList.contains("d-none")) {
                    card.classList.add("d-none");
                }
            });
        }
    }

    // Add event listeners to the radio buttons
    brandRadios.forEach(radio => {
        radio.addEventListener('change', updateDisplayedDrinks);
    });
    lactoseCheckbox.addEventListener('change', updateDisplayedDrinks)
    

    // Initial Update
    updateDisplayedDrinks();


</script>
<script src="./bootstrap/bootstrap.min.js"></script>