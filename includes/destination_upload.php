<?php


if (isset($_POST['submit'])){

    $newFileName = $_POST['filename'];
    if(empty($newFileName)) {
        $newFileName = "destination";
    }else{
        $newFileName = strtolower(str_replace(" ","_", $newFileName));
    }
    $imageTitle = $_POST['filetitle'];
    $imageDesc = $_POST['filedesc'];

    $file = $_FILES["file"];

    $fileName = $file["name"];
    $fileType = $file["type"];
    $fileTempName = $file["tmp_name"];
    $fileError = $file["error"];
    $fileSize = $file["size"];

    $fileExtention  = explode(".",$fileName);
    $fileExt = strtolower(end($fileExtention));

    $povolene = array("jpg","jpeg","png");

    if (in_array($fileExt, $povolene)){
        if ($fileError === 0){
               if ($fileSize<200000){
                   $imageFullName = $newFileName . "." . uniqid("",true) . "." . $fileExt;
                   $fileDestination = "../img/newDestination/" . $imageFullName;
                    /* ZLE ZAPISUJE CESTU ... */


                    include_once "dbh.php";



                   if(empty($imageTitle) || empty($imageDesc)){
                                header("Location: ../admin.php?upload=empty");
                                exit();
                            }else{
                                $sql = "SELECT * FROM destinations;";
                                $stmt = mysqli_stmt_init($conn);
                                if (!mysqli_stmt_prepare($stmt, $sql)){
                                    echo "Chyba v SQL dotaze";
                                }else{
                                    mysqli_stmt_execute($stmt);
                                    $result = mysqli_stmt_get_result($stmt);
                                    $rowCount = mysqli_num_rows($result);
                                    $setImageOrder = $rowCount +1;

                                    $sql = "Insert INTO destinations (titleDestination, descDestination, imgFullNameDestination, orderDestination) VALUES (?, ?, ?, ?)";
                                    if (!mysqli_stmt_prepare($stmt, $sql)){
                                        echo "Chyba v SQL dotaze";
                                    }else{
                                        mysqli_stmt_bind_param($stmt, "ssss", $imageTitle, $imageDesc, $imageFullName, $setImageOrder);
                                        mysqli_stmt_execute($stmt);

                                        move_uploaded_file($fileTempName, $fileDestination);



                                        header("Location: ../admin.php?upload=success");
                                    }
                                }
                            }


               }else{
                   echo "Subor prilis velky";
               }

        }else{
            echo "Nastala chyba";
        }


    }else{
        echo "Nepodporovany format";
        exit();
    }


}