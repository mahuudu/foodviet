<?php
require_once ('templates/layout/header.php');
?>
<?php
$error =isset($error)?$error:"";

?>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12 col-12 col-sm-12">
            <form action="?action=doRegister" method="post" id="fileForm" role="form">
                <fieldset><legend class="text-center"> Register <span class="req"></span></legend>

                    

                    <div class="form-group">
                        <label for="lastname"><span class="req">* </span> Full name: </label>
                        <input class="form-control" type="text" name="fullname" id = "txt" onkeyup = "Validate(this)" placeholder="Name" required />
                        <div id="errLast"></div>
                    </div>

                    <div class="form-group">
                        <label for="email"><span class="req">* </span> Email Address: </label>
                        <input class="form-control" placeholder="email"  required type="text" name="email" id = "email"  onchange="email_validate(this.value);" />
                        <div class="status" id="status"></div>
                    </div>

                    <div class="form-group">
                        <label for="username"><span class="req">* </span> User name:  <small>This will be your login user name</small> </label>
                        <input class="form-control" type="text" name="username" id = "txt" onkeyup = "Validate(this)" placeholder="minimum 6 letters" required />
                        <div id="errLast"></div>
                    </div>

                    <div class="form-group">
                        <label for="password"><span class="req">* </span> Password: </label>
                        <input required name="password" type="password" class="form-control inputpass" minlength="4" maxlength="16"  id="pass1" /> </p>

                        <label for="password"><span class="req">* </span> Password Confirm: </label>
                        <input required name="password" type="password" class="form-control inputpass" minlength="4" maxlength="16" placeholder="Enter again to validate"  id="pass2" onkeyup="checkPass(); return false;" />
                        <span id="confirmMessage" class="confirmMessage"></span>
                    </div>
                    <div class="form-group">
                        <label for="phonenumber"><span class="req">* </span> Phone Number: </label>
                        <input required type="text" name="phonenumber" id="phone" class="form-control phone" maxlength="28" onkeyup="validatephone(this);" placeholder="not used for marketing"/>
                    </div>
                    <div class="form-group">

                        <?php //$date_entered = date('m/d/Y H:i:s'); ?>
                        <input type="hidden" value="<?php //echo $date_entered; ?>" name="dateregistered">
                        <input type="hidden" value="0" name="activate" />
                        <hr>

                        <input type="checkbox" required name="terms" onchange="this.setCustomValidity(validity.valueMissing ? 'Please indicate that you accept the Terms and Conditions' : '');" id="field_terms">   <label for="terms">I agree with the <a href="#" title="You may read our terms and conditions by clicking on this link">terms and conditions</a> for Registration.</label><span class="req">* </span>
                    </div>

                    <div class="form-group">
                        <input class="btn btn-success" type="submit" name="submit_reg" value="Register">
                    </div>

                    <b><?php echo $error; ?></b>
                </fieldset>
            </form><!-- ends register form -->
        </div><!-- ends col-12 -->

   

    </div>
</div>
<script type="text/javascript">
     function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
} 
// validate email
function email_validate(email)
{
var regMail = /^([_a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;

    if(regMail.test(email) == false)
    {
    document.getElementById("status").innerHTML    = "<span class='warning'>Email address is not valid yet.</span>";
    }
    else
    {
    document.getElementById("status").innerHTML = "<span class='valid'>Thanks, you have entered a valid Email address!</span>"; 
    }
}



</script>
<?php
require_once ('templates/layout/footer.php');
?>
