<?php 
    session_start();
    unset($_SESSION["username"]);
    unset($_SESSION["id_customer"]);
    unset($_SESSION["fullname"]);
    header("location: ../user/index.php");