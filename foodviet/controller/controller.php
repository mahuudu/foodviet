<?php


class Controller{

  function __construct(){
    require_once("model/model.php");
  }



  public function index()
  {	

   $myModel = new Model();
   $posts = $myModel->getListProduct();
   require_once('views/postview.php');
   $myPostView = new Postview();

   $arrayproduct= $this->getProductNews();
   // $side_bar = $this->sideBar();


   $slide  = $this->slide();
   $arrayproduct2 = $this->loopProduct();
   $news   = $this->loopNews();




   $myPostView->showIndex($posts,$slide,$news,$arrayproduct,$arrayproduct2);

 }

 public function sideBar()
 {
  $myModel = new Model();
  $result = $myModel->getlistCategory();
  if (!empty($result)) {
    return $result;
  }
}


public function loopProduct(){
  $myModel = new Model();
  $array = array();
  $array2 = array();
  $arrayCategory = $this->getlistCategory();

  $data = [];
  foreach ($arrayCategory as $value) {
          // echo "<pre>";
          // var_dump($myModel->getProductByCat($value['cat_id']));exit();
   $data[$value['category_name']] = $myModel->getProductByCat($value['cat_id']);
 }
 return $data;
}

public function getProductNews(){
  $myModel = new Model();
  $array = array();
      $item_per_page = 10; //Tong so item tren 1 page
      $current_page = 1; //trang

      $offset = ($current_page - 1) * $item_per_page; //Tinh vi tri cua offset
      $result= $myModel->getlistNewProduct($item_per_page,$offset);
      //Lay tong so records ra
      $totalRecords = $myModel->getListProduct();
      $totalRecords = $totalRecords->num_rows;

      //Tinh so trang
      $totalPages = ceil($totalRecords / $item_per_page);
      $array = $this->fectchArray($result);

      return $array;
    }



public function categoryProductNews(){
      $myModel = new Model();
      $array = array();

      $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:4; //Tong so item tren 1 page
      $current_page = !empty($_GET['page'])?$_GET['page']:1; //trang

      $offset = ($current_page - 1) * $item_per_page; //Tinh vi tri cua offset

      $result= $myModel->getlistNewProduct($item_per_page,$offset);

      //Lay tong so records ra
      $totalRecords = $myModel->getListProduct();
      $totalRecords = $totalRecords->num_rows;

      //Tinh so trang
      $totalPages = ceil($totalRecords / $item_per_page);

      if (!empty($result)) {
       while($row = mysqli_fetch_assoc($result)){
         $array[] = $row;  
       }
     } 
     if (!empty($array)) {
       require_once ('views/postview.php');
       $myPostView = new Postview();
       $myPostView->showCategoryProductNews($array,$item_per_page,$totalPages,$current_page);
     }else{
      $array = array();
      require_once ('views/postview.php');
      $myPostView = new Postview();
      $myPostView->showCategoryProductNews($array,$item_per_page,$totalPages,$current_page);
    }
  }

  //news

public function getlistCategory(){
    $myModel = new Model();
    $arrayCategory = array();
    $result = $myModel->getListCategory();

    if (!empty($result)) {
     while($row = mysqli_fetch_assoc($result)){
       $arrayCategory[] = $row;  
     }

     return $arrayCategory;

   }

 }

 public function singleProduct(){
  if (isset($_GET['action']) && $_GET['action'] == 'singleProduct'){
    if (!empty($_GET['id'])) {

      $id = isset($_GET['id'])?(string)(int)$_GET['id']:false;


      $myModel = new Model();
      $result = $myModel->getProductById($id);
      $side_bar = $this->sideBar();

      if (!empty($result)) {
       require_once ('views/postview.php');
       $myPostView = new Postview();
       $myPostView->showSingleProduct($result,$side_bar);
     }
   }
 }
}


public  function categoryProduct(){
 if (isset($_GET['action']) && $_GET['action'] == 'categoryProduct'){
   if (!empty($_GET['id'])) {
    $array = array();
    $id = $_GET['id'];
    $myModel = new Model();

    $orderby = 'id';


              $item_per_page = !empty($_POST['per_page'])?$_POST['per_page']:4; //Tong so item tren 1 page
              
              $current_page = !empty($_POST['page'])?$_POST['page']:1; //trang



              $offset = ($current_page - 1) * $item_per_page; //Tinh vi tri cua offset

              $result= $myModel->getCategoryProductById($id,$item_per_page,$offset);

                  //Lay tong so records ra
              $totalRecords = $myModel->getallCategoryProductById($id);



              if (isset($totalRecords)) {

                $totalRecords = $totalRecords->num_rows;
                         //Tinh so trang
                $totalPages = ceil($totalRecords / $item_per_page);



                if (isset($result)) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    $array[] = $row;
                  }

                  if (!empty($array)) {
                   $slide  = $this->slide();
                   require_once ('views/postview.php');
                   $myPostView = new Postview();
                   $myPostView->showCategoryProduct($array,$item_per_page,$totalPages,$current_page,$orderby,$slide);
                 }
               }else{
                $array = array();
                require_once ('views/postview.php');
                $totalPages = 0;
                $myPostView = new Postview();
                $myPostView->showCategoryProduct($array,$item_per_page,$totalPages,$current_page,$orderby);
              }
            }else{
             $slide  = $this->slide();
             $array = array();
             require_once ('views/postview.php');
             $totalPages = 0;
             $myPostView = new Postview();
             $myPostView->showCategoryProduct($array,$item_per_page,$totalPages,$current_page,$orderby,$slide);
           }


         }
       }
     }

     public function ajaxloadMoreProduct(){
      if (isset($_GET['action']) && $_GET['action'] == 'ajaxloadMoreProduct'){

      }
    }


  // **********************ACOUNT***********************************
    public function login(){
     require_once('views/postview.php');
     $myPostView = new Postview();
     $myPostView->showFormLogin();
   }

   public  function  doLogin(){
    if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password']))
    {
     $myModel = new Model();

     $username = mysqli_real_escape_string($myModel->conn,htmlspecialchars(addslashes($_POST['username'])));
     $password = mysqli_real_escape_string($myModel->conn,htmlspecialchars(addslashes(($_POST['password']))));

     $result = $myModel->checkLogin($username,$password);



     if ($result & isset($result)){
      session_start();
      $user = mysqli_fetch_assoc($result);
      $_SESSION['current_user'] = $user;
      header('location: http://localhost:8080/foodviet/');
    }else{
      $error = "Username or password Wrong ! ";
      require_once ('views/postview.php');
      $myPostView = new Postview();
      $myPostView->throwShowFormlogin($error);
    }


  }else{
    require_once('views/postview.php');
    $myPostView = new Postview();
    $myPostView->showFormLogin();
  }
}


function doLogOut(){
  session_start();
  unset($_SESSION['current_user']);
  header('location: http://localhost:8080/foodviet/');
}

function doLogOutShip(){
  session_start();
  unset($_SESSION['ship']);
  header('location: http://localhost:8080/foodviet/');
}
public function register(){
  require_once('views/postview.php');
  $myPostView = new Postview();
  $myPostView->ShowFormRegister();
}

public function doRegister(){
  if (isset($_POST['submit_reg']))
  {
    $myModel = new Model();
    $username = mysqli_real_escape_string($myModel->conn,htmlspecialchars(addslashes($_POST['username'])));
    $password = mysqli_real_escape_string($myModel->conn,htmlspecialchars(addslashes(($_POST['password']))));

    $email=isset($_POST['email'])?$_POST['email']:"";
    $phonenumber=isset($_POST['phonenumber'])?$_POST['phonenumber']:"";
    $fullname=isset($_POST['fullname'])?$_POST['fullname']:"";


    if (isset($username) && isset($password)){

      $result= $myModel->checkUserExist($username,$email);

                if (!$result){ //check if username and email does not exist .
                  $result = $myModel->registerAcount($username,$password,$fullname,$email,$phonenumber);
                  if ($result){
                    require_once ('views/postview.php');
                    $myPostView = new Postview();
                    $notice = "register";
                    $myPostView->showNotice($notice);
                  }else{
                    $eror = "some thing went wrong ! ";
                    require_once ('views/postview.php');
                    $myPostView = new Postview();
                    $myPostView->throwShowFormRegister($eror);
                  }
                }else{
                  $eror = "Email or Username already exist, try something else.";
                  require_once ('views/postview.php');
                  $myPostView = new Postview();
                  $myPostView->throwShowFormRegister($eror);
                }
              }else{
                require_once ('views/postview.php');
                $myPostView = new Postview();
                $myPostView->ShowFormRegister();
              }
            }else{
              require_once ('views/postview.php');
              $myPostView = new Postview();
              $myPostView->ShowFormRegister();
            }
          }

          public function registerShip(){
            require_once('views/postview.php');
            $myPostView = new Postview();
            $myPostView->ShowFormRegisterShip();
          }

          public function doRegisterShip(){
            if (isset($_POST['submit_reg']))
            {
              $myModel = new Model();
              $username = mysqli_real_escape_string($myModel->conn,htmlspecialchars(addslashes($_POST['username'])));
              $password = mysqli_real_escape_string($myModel->conn,htmlspecialchars(addslashes(($_POST['password']))));

              $email=isset($_POST['email'])?$_POST['email']:"";
              $phonenumber=isset($_POST['phonenumber'])?$_POST['phonenumber']:"";
              $fullname=isset($_POST['fullname'])?$_POST['fullname']:"";


              if (isset($username) && isset($password)){

                $result= $myModel->checkShiperExist($username,$email);

                if (!$result){ //check if username and email does not exist .
                  $result = $myModel->registerAcountShiper($username,$password,$fullname,$email,$phonenumber);
                  if ($result){
                    require_once ('views/postview.php');
                    $myPostView = new Postview();
                    $notice = "register";
                    $myPostView->showNotice($notice);
                  }else{
                    $eror = "some thing went wrong ! ";
                    require_once ('views/postview.php');
                    $myPostView = new Postview();
                    $myPostView->throwShowFormRegister($eror);
                  }
                }else{
                  $eror = "Email or Username already exist, try something else.";
                  require_once ('views/postview.php');
                  $myPostView = new Postview();
                  $myPostView->throwShowFormRegister($eror);
                }
              }else{
                require_once ('views/postview.php');
                $myPostView = new Postview();
                $myPostView->ShowFormRegister();
              }
            }else{
              require_once ('views/postview.php');
              $myPostView = new Postview();
              $myPostView->ShowFormRegister();
            }
          }


          public function loginShip(){
           require_once('views/postview.php');
           $myPostView = new Postview();
           $myPostView->showFormLoginShip();
         }

         public  function  doLoginShip(){
          if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password']))
          {
           $myModel = new Model();

           $username = mysqli_real_escape_string($myModel->conn,htmlspecialchars(addslashes($_POST['username'])));
           $password = mysqli_real_escape_string($myModel->conn,htmlspecialchars(addslashes(($_POST['password']))));

           $result = $myModel->checkLoginShip($username,$password);



           if ($result & isset($result)){
            session_start();
            $user = mysqli_fetch_assoc($result);
            $_SESSION['ship'] = $user;
            header('location: http://localhost:8080/foodviet/');
          }else{
            $error = "Username or password Wrong ! ";
            require_once ('views/postview.php');
            $myPostView = new Postview();
            $myPostView->throwShowFormloginShip($error);
          }


        }else{
          require_once('views/postview.php');
          $myPostView = new Postview();
          $myPostView->showFormLoginShip();
        }
      }

      public function detailAcount(){

       if (isset($_SESSION['current_user'])) {

        $idUser =  $_SESSION['current_user']['id'];

        require_once ('views/postview.php');
        $myModel = new Model();

        $result = $myModel->getListCartUser($idUser);
        $result2 = $myModel->getListCarOnhiptUser($idUser);

        if (!empty($result) && isset($result)){
          require_once('views/postview.php');
          $myPostView = new Postview();
          $myPostView->showDetailAcount($result,$result2);

        }else{
         $result = "";
         $result2 = "";
         require_once('views/postview.php');
         $myPostView = new Postview();
         $myPostView->showDetailAcount($result,$result2);
       }
     }else{
      header('location: http://localhost:8080/foodviet/?action=login');
    }
  }

  public function detailAcountShip(){
    if (isset($_SESSION['ship'])) {
      require_once ('views/postview.php');
      $myPostView = new Postview();
      $myModel = new Model();

      if (isset($_SESSION['ship'])) {
        $idShiper =  $_SESSION['ship']['id'];
      }

      $result = $myModel->getCartOnPrepare();
      $result2 = $myModel->getCartOnShip($idShiper);



      if ($result || $result2){
        require_once('views/postview.php');
        $myPostView = new Postview();
        $myPostView->showDetailAcountShip($result,$result2);

      }else{
        $result2 = "";
        $result = "";
        require_once('views/postview.php');
        $myPostView = new Postview();
        $myPostView->showDetailAcountShip($result,$result2);
      }
    }else{
     header('location: http://localhost:8080/foodviet/?action=loginShip');
   }

 }

 public  function doChangePass(){
  if (isset($_POST['submit_change_pass'])){
    $id = $_POST['user_id'];
    $old_password = md5($_POST['oldpassword']);
    $new_password = md5($_POST['password']);

    $myModel = new Model();
    $result = $myModel->checkOldPassword($id,$old_password);
    require_once('views/postview.php');
    $myPostView = new Postview();

    if (isset($result)) {

      $result = $myModel->setNewPassword($id,$old_password,$new_password);

      if ($result) {

        $alert = "Update password ok";
        $myPostView->throwChangePass($alert);
      }else{
        $error = "Some thing went wrong !";
        $myPostView->throwChangePass($error);
      }
    }else{
      $error = "Old Password Wrong !";
      $myPostView->throwChangePass($error);
    }
  }
}
public  function doChangePassShip(){
  if (isset($_POST['submit_change_pass'])){
    $id = $_POST['user_id'];
    $old_password = md5($_POST['oldpassword']);
    $new_password = md5($_POST['password']);

    $myModel = new Model();
    $result = $myModel->checkOldPasswordShip($id,$old_password);
    require_once('views/postview.php');
    $myPostView = new Postview();

    if (isset($result)) {

      $result = $myModel->setNewPasswordShip($id,$old_password,$new_password);

      if ($result) {
        $alert = "Update password ok";
        $myPostView->throwChangePassShip($alert);
      }else{
        $error = "Some thing went wrong !";
        $myPostView->throwChangePassShip($error);
      }
    }else{
      $error = "Old Password Wrong !";
      $myPostView->throwChangePassShip($error);
    }
  }
}


 // *********************************cart******************************************
public function update($add = false){ 
        foreach ($_POST['quantity'] as $id => $quantity) { //key = id.
          if ($quantity == 0) {
            unset($_SESSION["cart"][$id]);
          }else{
            if ($add and isset($_SESSION["cart"][$id])) {
                    $_SESSION["cart"][$id] += $quantity; //array session += quantity
                  }else{
                    $_SESSION["cart"][$id] = $quantity; //array session = quantity
                  }
                }

              }
            }

            public function addToCart(){
              if (!isset($_SESSION["cart"])) {
                $_SESSION["cart"] = array();
              }
              if (isset($_GET['action']) && $_GET['action'] == 'addToCart'){
                $this->update(true);
                $this->listCart();
              }
            }

            public function listCart(){
              if (!empty($_SESSION['cart']) && isset($_SESSION["cart"])) {
                $myModel = new Model();
                    //implode array to string with 
                $StringId = implode(",", array_keys($_SESSION["cart"]));
                $result = $myModel->getProductIn($StringId);           
                $arrayVals = array();

                while($row = mysqli_fetch_assoc($result)){
                 $arrayVals[] = $row;  
               }
               require_once('views/postview.php');
               $myPostView = new Postview();
               $myPostView->showListCart($arrayVals);


               return $arrayVals;
             }else{
              $arrayVals = array();
              require_once('views/postview.php');
              $myPostView = new Postview();
              $myPostView->showListCart($arrayVals);
            }

          }

          public function deleteCart(){
           if (isset($_GET['action']) && $_GET['action'] == 'deleteCart'){
            if (isset($_GET['id'])) {
              $id = $_GET['id'];
              unset($_SESSION["cart"][$id]);
              header('location: http://localhost:8080/foodviet?action=listCart');
            }
          }
        }

        public function updateCart(){
          if (isset($_GET['action']) && $_GET['action'] == 'updateCart'){
            $this->update();
            header('location: http://localhost:8080/foodviet?action=listCart');
          }
        }

        public function order(){
          if (isset($_GET['action']) && $_GET['action'] == 'order'){
            if (isset($_POST['quantity']) && !empty($_POST['quantity'])) {
              $myModel = new Model();
              $StringId = implode(",", array_keys($_SESSION["cart"])); //implode array
              $result = $myModel->getProductIn($StringId);

              $insertString = "";
              $total = 0;
              $num = 0;
              $orderProduct = array();

              while ($row = mysqli_fetch_assoc($result)) {
                $orderProduct[] = $row;
                if ($row['discount'] > 0) {
                 $total += $row['discount']*$_POST['quantity'][$row['id']]; 
               }else{
                 $total += $row['price']*$_POST['quantity'][$row['id']]; 
               }

             }

             $id = "";
             $name = $_POST['fullname'];
             $phone = $_POST['phonenumber'];
             $email = $_POST['email'];
             $address = $_POST['address'];
             $phone = $_POST['phonenumber'];
             $note = $_POST['note'];
             $create_time = time();
             $last_update = time();
             $status = 0;
             $priceShipNew = $_POST['priceShipNew'];
             $totalPrice = $total + $priceShipNew;
             $lat = $_POST['lat'];
             $lng = $_POST['lng'];

             if (isset($_POST['idUser']) && !empty($_POST['idUser'])) {
              $idUser = $_POST['idUser'];
            }else{
             $idUser = '';
           }



              //insert to table order
           $myModel->insertOrder($name,$idUser,$phone,$email,$address,$note,$priceShipNew,$totalPrice,$status,$create_time,$last_update,$lat,$lng);
           $last_id = $myModel->getLastID();



              //foreach array give to string. 
           foreach ($orderProduct as $key => $value) {
            if ($value['discount'] > 0) {
             $price = $value['discount'];
           }else{
            if ($value['price'] != 0) {
              $price = $value['price'];
            }
            $price = 0;
          }



          $insertString .= "(NULL, '".$last_id."', '".$value['id']."', '".$_POST['quantity'][$value['id']]."', '".$price."', '".$create_time."', '".$last_update."')";
          if ($key != count($orderProduct) -1) {
            $insertString .= ",";
          }
        }


              //begin insert to table order detail
        $result = $myModel->insertOrderdetailModel($insertString);

        if ($result) {
          header('location: http://localhost:8080/foodviet/templates/pages/content/thank-cart.php');
        }


      }
    }
  }


  /*****************************END CART ***********************/

  // *************************slide*****************************
  public function slide(){
    $myModel = new Model();
    $arrayVals = array();
    $result = $myModel->getlistSlide();

    while($row = mysqli_fetch_assoc($result)){
     $arrayVals[] = $row;  
   }

   return $arrayVals;
 }

  // ***********************NEW**************************************

 public function archiveCategory(){
  if (isset($_GET['action']) && $_GET['action'] == 'archiveCategory'){   
    $myModel = new Model();
    $array = array();
    $result = $this->loopNews();

    if (!empty($result)) {
     require_once ('views/postview.php');
     $myPostView = new Postview();
     $myPostView->showArchiveCategory($result);
   }

 }
}


public function singleNews(){
 if (isset($_GET['action']) && $_GET['action'] == 'singleNews'){  
   if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $myModel = new Model();
    $result = $myModel->selectNewsId($id);
    if (!empty($result)) {
     require_once ('views/postview.php');
     $myPostView = new Postview();
     $myPostView->showSingleNews($result);
   }
 }

} 
}
public function loopNews(){
  $myModel = new Model();
  $arrayNews = array();
  $result = $myModel->getListNews();

  if (!empty($result)) {
   while($row = mysqli_fetch_assoc($result)){
     $arrayNews[] = $row;  
   }

   return $arrayNews;

 }
}

  // *****************************************

public function fectchArray($result){
  $array = array();
  while($row = mysqli_fetch_assoc($result)){
   $array[] = $row;  
 }

 return $array;
}

public function ajaxOrderProduct(){
  if (isset($_GET['action']) && $_GET['action'] == 'ajaxOrderProduct'){
    $orderby = $_POST['orderby'];
    $cat_id  = $_POST['cat_id'];
    $myModel = new Model();
    $array = array();

    if (!empty($_POST['orderby'])) {
      $orderby = $_POST['orderby'];
    }else{
      $orderby = $_GET['orderby'];
    }

                  $item_per_page = !empty($_POST['per_page'])?$_POST['per_page']:4; //Tong so item tren 1 page
                  
                  $current_page = !empty($_POST['page'])?$_POST['page']:1; //trang



                  $offset = ($current_page - 1) * $item_per_page; //Tinh vi tri cua offset

                  $result= $myModel->getCategoryProductById($cat_id,$item_per_page,$offset);

                      //Lay tong so records ra
                  $totalRecords = $myModel->getallCategoryProductById($cat_id);
                  $totalRecords = $totalRecords->num_rows;


                      //Tinh so trang
                  $totalPages = ceil($totalRecords / $item_per_page);


                  switch ($orderby) {
                    case 'priceASC':
                    $value = 'price';
                    $condition = 'ASC';
                    $result = $myModel->getListProductOrderByCondition($cat_id,$value,$condition,$item_per_page,$offset);  
                    break;
                    case 'priceDESC':
                    $value = 'price';
                    $condition = 'DESC';
                    $result = $myModel->getListProductOrderByCondition($cat_id,$value,$condition,$item_per_page,$offset);   
                    break;
                    case 'nameASC':
                    $value = 'name_product';
                    $condition = 'ASC';
                    $result = $myModel->getListProductOrderByCondition($cat_id,$value,$condition,$item_per_page,$offset); 
                    break;
                    case 'nameDESC':
                    $value = 'name_product';
                    $condition = 'DESC';
                    $result = $myModel->getListProductOrderByCondition($cat_id,$value,$condition,$item_per_page,$offset);  
                    break;
                    default:
                    $result = $myModel->getCategoryProductById($cat_id,$item_per_page,$offset);   
                    break;
                  }

                  while($row = mysqli_fetch_assoc($result)){
                   $array[] = $row;  
                 }

                 if (!empty($array)) {
                   require_once ('views/postview.php');
                   $myPostView = new Postview();
                   $myPostView->ajaxShowCategoryProduct($array,$item_per_page,$totalPages,$current_page,$orderby);
                 }   
               }   
}
               public function ajaxOrderProductNews(){
                if (isset($_GET['action']) && $_GET['action'] == 'ajaxOrderProductNews'){
                  $myModel = new Model();
                  $array = array();

                  if (!empty($_POST['orderby'])) {
                    $orderby = $_POST['orderby'];
                  }else{
                    $orderby = $_GET['orderby'];
                  }


                  $item_per_page = !empty($_POST['per_page'])?$_POST['per_page']:4; //Tong so item tren 1 page

                  $current_page = !empty($_POST['page'])?$_POST['page']:1; //trang



                  $offset = ($current_page - 1) * $item_per_page; //Tinh vi tri cua offset

                  $result= $myModel->getlistNewProduct($item_per_page,$offset);

                  //Lay tong so records ra
                  $totalRecords = $myModel->getListProduct();
                  $totalRecords = $totalRecords->num_rows;

                  //Tinh so trang
                  $totalPages = ceil($totalRecords / $item_per_page);


                  switch ($orderby) {
                    case 'priceASC':
                    $value = 'price';
                    $condition = 'ASC';
                    $result = $myModel->getlistNewProductCondition($value,$condition,$item_per_page,$offset);
                    break;
                    case 'priceDESC':
                    $value = 'price';
                    $condition = 'DESC';
                    $result = $myModel->getlistNewProductCondition($value,$condition,$item_per_page,$offset);  
                    break;
                    case 'nameASC':
                    $value = 'name_product';
                    $condition = 'ASC';
                    $result = $myModel->getlistNewProductCondition($value,$condition,$item_per_page,$offset);
                    break;
                    case 'nameDESC':
                    $value = 'name_product';
                    $condition = 'DESC';
                    $result = $myModel->getlistNewProductCondition($value,$condition,$item_per_page,$offset);  
                    break;
                    default:
                    $value = 'id';
                    $condition = 'ASC';
                    $result = $myModel->getlistNewProductCondition($value,$condition,$item_per_page,$offset);
                    break;
                  }


                  while($row = mysqli_fetch_assoc($result)){
                   $array[] = $row;  
                 }

                 if (!empty($array)) {
                   require_once ('views/postview.php');
                   $myPostView = new Postview();
                   $myPostView->ajaxShowCategoryProductNews($array,$item_per_page,$totalPages,$current_page,$orderby);
                 }   
               }   
             }
             

public function searchProduct(){
               if (isset($_GET['action']) && $_GET['action'] == 'searchProduct'){
                if (isset($_POST['key']) && !empty($_POST['key'])) {

                 $oldkey = $_POST['key'];

                 $key = $this->xss_clean($oldkey);
                 $str = filter_var($key, FILTER_SANITIZE_STRING);

                 $array = array();
                 $myModel = new Model();
                 $result = $myModel->searchProduct($str);
                 if (!empty($result) && isset($result)) {
                   while($row = mysqli_fetch_assoc($result)){
                     $array[] = $row;  
                   }

                   require_once ('views/postview.php');
                   $myPostView = new Postview();
                   $myPostView->showSearchProduct($array,$str);
                 }else{

                  require_once ('views/postview.php');
                  $myPostView = new Postview();
                  $myPostView->showSearchProduct($array,$str);
                }
              }else{
               header('location: http://localhost:8080/foodviet?action=index');
             }
           }
}
public function searchCategory(){
           if (isset($_GET['action']) && $_GET['action'] == 'searchCategory'){
            if (isset($_POST['key']) && !empty($_POST['key'])) {
             $key = $_POST['key'];
             $array = array();
             $item_per_page = 5;
             $offset  = 0;
             require_once ('views/postview.php');
             $myModel = new Model();
             $myPostView = new Postview();
             $result = $myModel->searchBycategory($key);
             if (isset($result) && !empty($result)) {
              while($row = mysqli_fetch_assoc($result)){
                $cat_id = $row['cat_id'];  
              }   

              $result2 = $myModel->getCategoryProductById($cat_id,$item_per_page,$offset);

              while($row = mysqli_fetch_assoc($result2)){
               $array[] = $row;  
             }

             if (!empty($array) & isset($array)) {
               require_once ('views/postview.php');
               $myPostView->showSearchProduct($array,$key);
             } 
           }else{
            $array = array();
            $myPostView->showSearchProduct($array,$key);
          }

        }else{
         header('location: http://localhost:8080/foodviet?action=index');
       }
     }
   }

   public function contact(){
     if (isset($_GET['action']) && $_GET['action'] == 'contact'){
      $name = $_POST['fullname']; 
      $phone = $_POST['phonenumber'];
      $email = $_POST['email'];
      $address = $_POST['address'];
      $title = $_POST['title'];
      $content = $_POST['content'];
      $created_at = time();

      $myModel = new Model();
      $result = $myModel->insertContact($name,$phone,$email,$address,$title,$content,$created_at);
      if (isset($result)) {
       header('location: http://localhost:8080/foodviet/templates/pages/content/thank-contact.php');
     }else{
       header('location: http://localhost:8080/foodviet?action=index');
     }
   }
 }


 public function logo(){
  $array = array();
  $myModel = new Model();
  $result = $myModel->getLogo(); 

  while($row = mysqli_fetch_assoc($result)){
   $array[] = $row;  
 }

 foreach ($array as $key => $value) {
  $link = $value['image_link'];
}

return $link;
}
public function getInfoFooter(){
  $array = array();
  $myModel = new Model();
  $result = $myModel->getInfo(); 

  while($row = mysqli_fetch_assoc($result)){
   $array[] = $row;  
 }

 foreach ($array as $key => $value) {
  $value = $value['content'];
}

return $value;
}


public function prepareGetCart(){
  if (isset($_GET['action']) && $_GET['action'] == 'prepareGetCart'){
   $isCart = $_POST['isCart'];

   if ($isCart == 1) {

     $myModel = new Model();  
     $result = $myModel->getCartOnPrepare(); 

     if (!is_null($result)) {
      echo "have";
    }else{
      echo "none";
    }

  }else{
    echo "none";
  }
}

}

public function listOrderDetail(){
  if (isset($_GET['action']) && $_GET['action'] == 'listOrderDetail') {
    $myModel = new Model();
    $id = $_POST['id'];

    $arrayOrderdetail = array();
    $arrayOrder = array();

              //begin get list id product of any cart;
    $result = $myModel->getListOrderId($id);
    $result2 = $myModel->getListOrderDetail($id);


              //array detail guess
    while($row1 = mysqli_fetch_assoc($result)){
     $arrayOrder[] = $row1;  
   }

              //array detail product of cart
   while($row2 = mysqli_fetch_assoc($result2)){
     $arrayOrderdetail[] = $row2;  
   }

   if (!empty($arrayOrderdetail)){
    require_once ('views/postview.php');
    $myPostView = new Postview();
    $myPostView->showListOrderDetail($arrayOrderdetail,$arrayOrder);
  }

}
}

public function listOrderDetailUser(){
  if (isset($_GET['action']) && $_GET['action'] == 'listOrderDetailUser') {
    $myModel = new Model();
    $id = $_POST['id'];

    $arrayOrderdetail = array();
    $arrayOrder = array();

              //begin get list id product of any cart;
    $result = $myModel->getListOrderId($id);
    $result2 = $myModel->getListOrderDetail($id);


              //array detail guess

    while($row1 = mysqli_fetch_assoc($result)){
     $arrayOrder[] = $row1;  
   }

              //array detail product of cart
   if ($result2) {
     while($row2 = mysqli_fetch_assoc($result2)){
       $arrayOrderdetail[] = $row2;  
     }
   }


   if (!empty($arrayOrderdetail)){
    require_once ('views/postview.php');
    $myPostView = new Postview();
    $myPostView->showListOrderDetailUser($arrayOrderdetail,$arrayOrder);
  }

}
}


public function ConfirmShip(){
  if (isset($_GET['action']) && $_GET['action'] == 'ConfirmShip') {
    $id = $_GET['id'];
    $idShiper = $_POST['idShiper'];
    $myModel = new Model();


    $result = $myModel->ConfirmShip($id,$idShiper);

    if ($result) {
      $this->detailAcountShip();
    }

  }
}


public function onComplete(){
  if (isset($_GET['action']) && $_GET['action'] == 'onComplete') {
    $id = $_POST['id'];

    $myModel = new Model();

    $result = $myModel->onComplete($id);

    if ($result) {
      header("Location: http://localhost:8080/foodviet/?action=detailAcountShip");
    }
  }
}


public function on_cancle(){
  if (isset($_GET['action']) && $_GET['action'] == 'on_cancle') {
    $id = $_POST['id'];

    $myModel = new Model();

    $result = $myModel->on_cancle($id);

    if ($result) {
      header("Location: http://localhost:8080/foodviet/?action=detailAcountShip");
    }
  }
}

public function addAddressToCart(){
  if (isset($_GET['action']) && $_GET['action'] == 'addAddressToCart') {

    $id = $_POST['idCart'];
    $address = $_POST['address'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $create_time = time();
    $last_update = time();


    $myModel = new Model();

    $result = $myModel->addAddressToCart($id,$address,$lat,$lng,$create_time,$last_update);

    if ($result) {
      header("Location: http://localhost:8080/foodviet/?action=detailAcountShip");
    }
  }
}



public function load_order_status(){
  if (isset($_GET['action']) && $_GET['action'] == 'load_order_status') {

    $id = $_POST['id'];

    $myModel = new Model();

    $shiperDetails = $myModel->getdetailsShiper($id);
    $result = $myModel->load_order_status($id);



    if ($result) {
      while($row = mysqli_fetch_assoc($result)){
        $array[] = $row;  
      }
    }

    if ($shiperDetails) {
      while($row = mysqli_fetch_assoc($shiperDetails)){
        $arrayShipDetails[] = $row;  
      }
    }


    if (!empty($array)){
      require_once ('views/postview.php');
      $myPostView = new Postview();
      $myPostView->showListOrderStatus($array,$arrayShipDetails);
    }else{
      $arrayShipDetails = "";
      $array = "";
      require_once ('views/postview.php');
      $myPostView = new Postview();
      $myPostView->showListOrderStatus($array,$arrayShipDetails);
    }
  }
} 

public function getLatLngCartPending(){
  if (isset($_GET['action']) && $_GET['action'] == 'getLatLngCartPending') {
    $idUser = $_POST['id'];
    $myModel = new Model();

    $result = $myModel->getListCartUserOnPending($idUser);

    if ($result) {
      $json = array();
      while($row = mysqli_fetch_assoc($result))     
      {
        $array = array(
          'lat' => $row['lat'],
          'lng' => $row['lng']

        );
        array_push($json, $array);
      }

      $jsonstring = json_encode($json);
      echo $jsonstring;
    }
  }
}


//function này có tác vụ lấy last lng/lat của đơn hàng user
public function getLastLatLngCartPending(){
  if (isset($_GET['action']) && $_GET['action'] == 'getLastLatLngCartPending') {
    $idCart = $_POST['id'];
    $myModel = new Model();

    $result = $myModel->getLastLatLngCartPending($idCart);

    if ($result) {
      $json = array();
      while($row = mysqli_fetch_assoc($result))     
      {
        $array = array(
          'lat' => $row['lat'],
          'lng' => $row['lng']

        );
        array_push($json, $array);
      }

      $jsonstring = json_encode($json);
      echo $jsonstring;
    }
  }
}



function xss_clean($data)
{
    // Fix &entity\n;
    $data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
    $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
    $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
    $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

    // Remove any attribute starting with "on" or xmlns
    $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

    // Remove javascript: and vbscript: protocols
    $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
    $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
    $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

    // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

    // Remove namespaced elements (we do not need them)
    $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

    do
    {
        // Remove really unwanted tags
        $old_data = $data;
        $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
    }
    while ($old_data !== $data);

    // we are done...
    return $data;
}

}





?>