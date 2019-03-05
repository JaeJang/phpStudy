<?php
    require "header.php";
?>
    <main>
        <h1>Reset your password</h1>
        <p>An e-mail will be send to you with blahblah</p>
        <form action="includes/reset-request.inc.php" method="post">
            <input type="text" name="email" placeholder="Enter your email">
            <button type="submit" name="reset-request-submit">New password</button>
        </form>
        <?php 
        if(isset($_GET['reset'])){
            if($_GET['reset'] == "success"){
                echo '<p>Check your email</p>';
            }
        }
        ?>
    </main>

<?php
    require "footer.php";
?>