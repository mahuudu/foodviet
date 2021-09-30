<?php
require_once ('templates/layout/header.php');
$error =isset($error)?$error:"";
if(!isset($_SESSION))
{
    session_start();
}
?>
    <div class="main container">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12 col-12 col-sm-12">
                <form action="?action=doOrder" method="post" id="fileForm" role="form">
                    <fieldset><legend class="text-center">Thông tin đặt hàng <span class="req"></span></legend>

                        <div class="form-group">
                            <label for="lastname"><span class="req">* </span> Họ và tên: </label>

                            <?php   if (isset($_SESSION['current_user'])) { ?>
                                    <input class="form-control" type="text" name="fullname" id ="txt"  value="<?php echo $_SESSION['current_user']['fullname'] ?>" placeholder="Name" required />
                            <?php
                                }else{ ?>
                                    <input class="form-control" type="text" name="fullname" id = "txt" onkeyup = "Validate(this)" placeholder="Name" required />
                            <?php
                                }
                                ?>

                        </div>

                        <div class="form-group">
                            <label for="email"><span class="req">* </span> Email : </label>
                            <?php   if (isset($_SESSION['current_user'])) { ?>
                                <input class="form-control" placeholder="email"  required type="text" name="email" id = "email"  value="<?php echo $_SESSION['current_user']['email'] ?>"  onchange="email_validate(this.value);" />
                                <?php
                            }else{ ?>
                                <input class="form-control" placeholder="email"  required type="text" name="email" id = "email"  onchange="email_validate(this.value);" />
                                <?php
                            }
                            ?>
                            <div class="status" id="status"></div>
                        </div>
                        <div class="form-group">
                            <label for="phonenumber"><span class="req">* </span> Số điện thoại: </label>
                            <?php   if (isset($_SESSION['current_user'])) { ?>
                                <input required type="text" name="phonenumber" id="phone" value="<?php echo $_SESSION['current_user']['phonenumber'] ?>" class="form-control phone" maxlength="28" onkeyup="validatephone(this);" placeholder="phone"/>
                                <?php
                            }else{ ?>
                                <input required type="text" name="phonenumber" id="phone" class="form-control phone" maxlength="28" onkeyup="validatephone(this);" placeholder="phone"/>
                                <?php
                            }
                            ?>

                        </div>
                        <div class="form-group">
                            <label for="lastname"><span class="req">* </span> Địa chỉ: </label>
                            <input class="form-control" type="text" name="fullname" id = "txt"  placeholder="địa chỉ" required />
                            <div id="errLast"></div>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-success" type="submit" name="submit_reg" value="Đặt hàng">
                        </div>

                        <b><?php echo $error; ?></b>
                    </fieldset>
                </form><!-- ends register form -->
            </div><!-- ends col-12 -->



        </div>
    </div>
<?php
require_once ('templates/layout/footer.php');
?>