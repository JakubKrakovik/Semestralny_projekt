<?php
    include_once "../parts/header.php";

    ?>
<a href="../index.php" class="btn btn-primary" >Home</a><br><hr>
<section class="signup-form">
    <h2>Sign Up</h2>
    <form action="../includes/signup.inc.php" method="post">
        <input type="text" name="name" placeholder="Full name…">
        <input type="text" name="email" placeholder="Email…">
        <input type="text" name="uid" placeholder="Username…">
        <input type="password" name="pwd" placeholder="Password…">
        <input type="password" name="pwdrepeat" placeholder="Password confirm…">
        <button type="submit" name="submit">Sign Up</button>
    </form>
    <?php
    if (isset($_GET["error"])){
        if ($_GET["error"] == "emptyinput"){
            echo "<p>Nezadali ste vsetky hodnoty</p>";
        }else if ($_GET["error"] == "invaliduid"){
            echo "<p>Zle zadane meno</p>";
        }else if ($_GET["error"] == "invalidemail"){
            echo "<p>Nespravny email</p>";
        }else if ($_GET["error"] == "differentpwd"){
            echo "<p>Hesla sa nezhoduju</p>";
        }else if ($_GET["error"] == "stmtfailed"){
            echo "<p>OOOPS nieco sa pokazilo. Skuste znovu</p>";
        }else if ($_GET["error"] == "usernametaken"){
            echo "<p>Uzivatelske meno zabrane</p>";
        }else if ($_GET["error"] == "none"){
            echo "<p>Registracia prebehla uspesne!</p>";
        }

    }
    ?>
</section>
