<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

require_once "database.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM users WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: index.php"); // Redirect back to the dashboard after successful deletion
        exit();
    } else {
        die("Error: " . mysqli_error($conn));
    }
}
