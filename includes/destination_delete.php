<?php

if (isset($_POST['delete'])) {

    include_once "dbh.php";

    $idToDelete = $_POST['id'];

    $sql = "DELETE FROM destinations WHERE idDestination = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL error";
    } else {
        mysqli_stmt_bind_param($stmt, "s", $idToDelete);
        mysqli_stmt_execute($stmt);

        header("Location: ../admin.php?delete=success");
    }
} else {
    header("Location: ../admin.php");
}
