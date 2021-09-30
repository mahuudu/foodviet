<?php
$error = isset($error) ? $error : "";

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
  <link rel="stylesheet" href="./dist/css/custom.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="./plugins/iCheck/square/blue.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../css/sweetalert2.min.css">
</head>
<body class="hold-transition login-page">

<div class="login-box">
  <div class="login-logo">
    <h1 class="glitch"> Admin</h1>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="?action=doLoginAdmin" method="post">
        <div class="form-group has-feedback">
          <input type=" text" name="username" class="form-control" placeholder="username">
        
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="password" class="form-control" placeholder="Password">
          
        </div>
        <div class="row" >
          
            <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
           
        </div>
      </form>

        <div class="err">

            <?php
            if ($error != ""){
                ?>
                <input id="errad" type="hidden" value="<?php echo $error ?>">
                <?php
            }
            ?>
        </div>
     
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- iCheck -->
<script src="./plugins/iCheck/icheck.min.js"></script>
    <script type="text/javascript" src="../js/sweetalert2.all.min.js"></script>

    <script>
        var title = document.getElementById("errad").value;
        function show_meage(title,type = 'sucess') {
            Swal.fire({
                position : 'top-center',
                icon: 'warning',
                type : type,
                title: title,
                timer: 6000,
                background: '#fff url(/images/trees.png)',
                backdrop: `
    rgba(0,0,123,0.4)
    url("/images/nyan-cat.gif")
    left top
    no-repeat
  `
            })
        }
        show_meage(title);
    </script>
</body>
</html>

