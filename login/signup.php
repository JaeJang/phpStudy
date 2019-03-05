<?php
    require "header.php";
?>
    <main>
        <h1>Signup</h1>
        <?php 
        if(isset($_GET['error'])){
            if($_GET['error'] = "emptyfields"){
                echo "<p>Fill in all fields</p>";
            } else if($_GET['error'] = "invinvaildmailuidalid"){
                echo "<p>Invalid username and email</p>";
            } else if($_GET['error'] = "invaildmail"){
                echo "<p>Invalid mail</p>";
            } else if($_GET['error'] = "invailduid"){
                echo "<p>Invalid username</p>";
            } else if($_GET['error'] = "passwordcheck"){
                echo "<p>Passwords do not match</p>";
            } else if($_GET['error'] = "usertaken"){
                echo "<p>Username is alreay taken!</p>";
            }
        } else if($_GET['error'] = "success"){
            echo "<p>Signup Successful</p>";

        }
        ?>
        <form action="includes/signup.inc.php" method="post">
            <input type="text" name="uid" placeholder="Username">
            <input type="text" name="mail" placeholder="Email">
            <input type="password" name="pwd" placeholder="Password">
            <input type="password" name="pwd-repeat" placeholder="Repeat password">
            <button type="submit" name="signup-submit">Signup</button>
        </form>
        <?php 
        if(isset($_GET['newPwd'])){
            if($_GET['newPwd'] = "passwordupdated"){
                echo '<p>your password has been updated</p>';
            }
        }
        ?>
        <a href="reset-password.php">Forgot your password?</a>
    </main>

<?php
    require "footer.php";
?>