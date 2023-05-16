<?php
echo '<br><a href="index.php" class="btn btn-primary" >Home</a><br><hr>';
include_once "includes/destination_update.php";
$id = isset($_POST['id']) ? $_POST['id'] : '';

echo '<div class="update">
        <form action="includes/destination_update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="' . $id . '">
            <input type="text" name="filename" placeholder="Nazov suboru…"> 
            <input type="text" name="filetitle" placeholder="Nazov obrazku…">
            <input type="text" name="filedesc" placeholder="Popis obrazku…">
            <input type="file" name="file">
            <br><br>
            <button type="submit" name="update" value="update">Update</button>
        </form>
    </div>';
?>
