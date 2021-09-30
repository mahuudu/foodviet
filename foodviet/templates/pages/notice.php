<?php
require_once ('templates/layout/header.php');
?>

<div class="main-content container">
    <div class="text-center text-login-">
    <?php
    if ($notice == 'register') {
        ?>
        <h3 class="notice">Đăng ký thành công</h3>
        <a href="?action=login" class="button-login notice-login">Đăng nhập</a>
        <?php
    }elseif ($notice == 'order') {
        ?>
        <h3 class="notice">Đặt hàng thành công</h3>
        <?php session_destroy(); ?>
        <?php
    }
    ?>
</div>
</div>
<?php
require_once ('templates/layout/footer.php');
?>