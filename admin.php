<?php
    session_start();

        if(isset($_SESSION['useruid'])) {
            include_once "parts/header.php";
            include_once "includes/destination_upload.php";
            include_once "includes/dbh.php";

            echo '<br><a href="index.php" class="btn btn-primary" >Home</a>';
            echo '<a href="includes/logout.inc..php" class="btn btn-primary" >LogOut</a><br><hr>';

            echo '<div class="upload">
                <form action="includes/destination_upload.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="filename" placeholder="Nazov suboru…">
                    <input type="text" name="filetitle" placeholder="Nazov obrazku…">
                    <input type="text" name="filedesc" placeholder="Popis obrazku…">
                    <input type="file" name="file">
                    <button type="submit" name="submit">Upload</button>
        
                </form>
        
            </div>';


            echo "<br><hr><br>";

            $sql = "SELECT * FROM destinations ORDER BY orderDestination DESC";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "SQL error";
            } else {
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="tm-home-box-1 tm-home-box-1-2 tm-home-box-1-right">
                            <img src="img/newDestination/'.$row["imgFullNameDestination"].'" alt="image" class="img-responsive">
                            <a href="#">
                                <div class="tm-red-gradient-bg tm-city-price-container">
                                    <span>' . $row["titleDestination"] . '</span>
                                    <span>' . $row["descDestination"] . '</span>
                                </div>
                            </a>
                            <form action="includes/destination_delete.php" method="post">
                                <input type="hidden" name="id" value="' . $row["idDestination"] . '">
                                <button type="submit" class="btn btn-primary" name="delete">Delete</button>
                            </form>
                            <form action="admin_update.php" method="post">
                            <input type="hidden" name="id" value="' . $row['idDestination'] . '">
                            <button type="submit" class="btn btn-primary" name="update">Update</button>
                            </form>
                        </div>
                    </div>';
                }
            }

        }

    ?>










