<?php
require_once ('templates/layout/header.php');
?>
<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="top-login fadeIn first">

        </div>

        <!-- Login Form -->
        <form action="?action=doLoginShip" method="post">
            <input type="text" id="login" class="fadeIn second" name="username" placeholder="login">
            <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
            <input type="submit" class="fadeIn fourth" value="Log In">
            <?php
                $error =isset($error)?$error:"";

            ?>

        </form>

        <!-- Remind Passowrd -->
        <div id="formFooter">
              <b><?php echo $error; ?></b>
        </div>

    </div>
</div>
<?php
    require_once ('templates/layout/footer.php');
?>