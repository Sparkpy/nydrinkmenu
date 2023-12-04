<?php
    setcookie("Name", "", time() - 3600);
    header("Location: ./index.php");
?>