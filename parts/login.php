<?php
include_once "../parts/header.php";

?>

<section class="login-form">
    <h2>Log in</h2>
    <form action="../includes/login.inc.php" method="post">
        <input type="text" name="uid" placeholder="Username/Email…">
        <input type="password" name="pwd" placeholder="Password…">
        <button type="submit" name="submit">Log in</button>
    </form>
    <?php
    if (isset($_GET["error"])){
        if ($_GET["error"] == "emptyinput"){
            echo "<p>Nezadali ste vsetky hodnoty</p>";
        }else if ($_GET["error"] == "wronglogin"){
            echo "<p>Zle zadane udaje</p>";
        }
    }
    ?>
</section>
