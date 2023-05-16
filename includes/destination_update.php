<?php
include_once 'dbh.php';

if (isset($_POST['update'])) {
    $newFileName = isset($_POST['filename']) ? $_POST['filename'] : '';
    if (empty($newFileName)) {
        $newFileName = "destination";
    } else {
        $newFileName = strtolower(str_replace(" ", "_", $newFileName));
    }
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $imageTitle = isset($_POST['filetitle']) ? $_POST['filetitle'] : '';
    $imageDesc = isset($_POST['filedesc']) ? $_POST['filedesc'] : '';

    $file = isset($_FILES['file']) ? $_FILES['file'] : null;

    if ($file !== null) {
        $fileName = $file['name'];
        $fileType = $file['type'];
        $fileTempName = $file['tmp_name'];
        $fileError = $file['error'];
        $fileSize = $file['size'];

        $fileExtension = explode(".", $fileName);
        $fileExt = strtolower(end($fileExtension));

        $allowedExtensions = array("jpg", "jpeg", "png");

        if (in_array($fileExt, $allowedExtensions)) {
            if ($fileError === 0) {
                if ($fileSize < 200000) {
                    $imageFullName = $newFileName . "." . uniqid("", true) . "." . $fileExt;
                    $fileDestination = "../img/newDestination/" . $imageFullName;

                    if (empty($imageTitle) || empty($imageDesc)) {
                        header("Location: ../admin.php?upload=empty");
                        exit();
                    } else {
                        $sql = "UPDATE destinations SET titleDestination = ?, descDestination = ?, imgFullNameDestination = ? WHERE idDestination = ?";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "Chyba v SQL dotaze";
                        } else {
                            mysqli_stmt_bind_param($stmt, "sssi", $imageTitle, $imageDesc, $imageFullName, $id);
                            mysqli_stmt_execute($stmt);
                            echo "Data updated successfully";
                            move_uploaded_file($fileTempName, $fileDestination);

                            header("Location: ../admin.php?upload=success");
                            exit();
                        }
                    }
                } else {
                    echo "Subor prilis velky";
                    exit();
                }
            } else {
                echo "Nastala chyba";
                exit();
            }
        } else {
            echo "Nepodporovany format";
            exit();
        }
    }
}
?>
