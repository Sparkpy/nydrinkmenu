<?php
    $db = mysqli_connect("127.0.0.1", "root", "", "nydrinkmenu");
    if (isset($_POST['order_coffee'])) {
        $order_id = rand(1000, 10000);
        $drink_id = $_POST['order_coffee'];
        $sugar = $_POST['sugar'];

        if (!isset($_COOKIE["Name"])) {
            $name = "Guest";
        } else {
            $name = $_COOKIE["Name"];
        }

        $query = "INSERT INTO orderlist (order_id, drink_id, sugar, username) VALUES ('".$order_id."','".$drink_id."','".$sugar."','".$name."')";

    }
    else if (isset($_POST['order_alcohol'])) {
        $drink_id = $_POST['order_alcohol'];
    }

    // Check if the cooldown cookie is set
    if (!isset($_COOKIE["QueryCooldown"])) {
        // Execute the query
        if(mysqli_query($db, $query)){
            // Set a cooldown cookie for, let's say, 1 hour (3600 seconds)
            setcookie("QueryCooldown", "1", time() + 300, "/");
            // Redirect with success status
            header("Location: ./index.php?status=success");
        } else {  
            // Redirect with error status
            header("Location: ./index.php?status=error");
        }
    } else {
        // Redirect with cooldown status
        header("Location: ./index.php?status=cooldown");
    }

    // Close the database connection
    mysqli_close($db);
?>

