<?php
    $name = $_POST["name"];

    # Name edgecases
    switch (strtolower($name)) {
        case "goober":
            $name = "Anastasija";
            break;
        case "princess":
            $name = "Anastasija";
            break;
        case "pumpkin":
            $name = "Anastasija";
            break;
        case "wifey":
            $name = "Anastasija";
            break;
        case "v1ism":
            $name = "Steven";
            break;
        case "cum":
            $name = "Steven";
            break;
        case "spark":
            $name = "Daniel";
            break;
        case "izbista":
            $name = "Petar";
            break;
        case "resen":
            $name = "Petar";
            break;
        default:
            $name = ucfirst($name);
    }

    # Special Github TOS Precaution
    if (str_starts_with(strtolower($name), "nig")) {
        $name = "Frosina";
    }

    setcookie("Name", $name, time() + 7200, "/");
    header("Location: ./index.php");
    exit();
?>