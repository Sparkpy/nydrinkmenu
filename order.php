<?php
    $db = mysqli_connect("127.0.0.1", "root", "", "nydrinkmenu");

    if (!isset($_COOKIE["Name"])) {
        $name = "Guest";
    } else {
        $name = $_COOKIE["Name"];
    }

    $order_id = rand(1000, 10000);

    if (isset($_POST['order_coffee'])) {
        $drink_id = $_POST['order_coffee'];
        $sugar = $_POST['sugar'];

        $query = "INSERT INTO orderlist (order_id, drink_id, sugar, username, type) VALUES ('".$order_id."','".$drink_id."','".$sugar."','".$name."', 'coffee')";

    }
    else if (isset($_POST['order_alcohol'])) {
        $drink_id = $_POST['order_alcohol'];

        $query = "INSERT INTO orderlist (order_id, drink_id, username, type) VALUES ('".$order_id."','".$drink_id."','".$name."', 'alcohol')";
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

