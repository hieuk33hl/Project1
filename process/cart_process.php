<?php

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "add":
            foreach ($_POST['quantity'] as $id => $quantity) {
                $_SESSION["cart"][$id] = $quantity;
            }
            header('Location: ../user/cart.php');
            break;
        }
    }