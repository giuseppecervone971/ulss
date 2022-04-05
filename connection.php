<?php
    $link = mysqli_connect("localhost", "ada10", "Juventus.1992", "Biblioteca");

        if (!$link) {
            echo "Failed connection with DB...";
            echo "Error code...", mysqli_connect_errno(), PHP_EOL;
            echo "Error message...", mysqli_connect_error(), PHP_EOL;
            exit(-1);
        }
?>