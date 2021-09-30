<?php 
require_once('templates/layout/headerAdmin.php');
?>  
<?php
$error =isset($error)?$error:"";

?>

<div id="login-row" class="row justify-content-center align-items-center">

    <div id="login-column" class="col-md-6">
        <div id="login-box" class="col-md-12">
            <form id="login-form" class="form" action="?action=doChangePass" method="post">
                <h3 class="text-center text-info">Change Password</h3>
                <div class="form-group">
                    <label for="oldpassword" class="req">Old password:</label><br>
                    <input type="password" name="oldpassword" id="oldpassword" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password"><span class="req">* </span> New Password: </label>
                    <input required name="password" type="password" class="form-control inputpass" minlength="4" maxlength="16"  id="pass1" /> </p>

                    <label for="password"><span class="req">* </span> Password Confirm: </label>
                    <input required name="password" type="password" class="form-control inputpass" minlength="4" maxlength="16" placeholder="Enter again to validate"  id="pass2" onkeyup="checkPass(); return false;" />
                    <span id="confirmMessage" class="confirmMessage"></span>
                </div>
                <input type="hidden" value=" <?php echo $_SESSION['current_admin']['id'];
                ?>" name="user_id">
                <div class="form-group">
                    <input class="btn btn-success" type="submit" name="submit_change_pass" value="submit">
                </div>
            </form>
        </div>
    </div>

</div>
<div class="container">
<div class="modal-footer text-center">
  <button type="button" class="btn btn-danger" data-dismiss="modal">

    <a href="?action=dashBoard">   Hủy</a>
</button>
</div>
</div>

<div class="container">

    <?php
    if ($error != ""){
        ?>
        <input id="error" type="hidden" value="<?php echo $error ?>">
        <?php
    }
    ?>
</div>
<?php 
require_once('templates/layout/footerAdmin.php');
?>