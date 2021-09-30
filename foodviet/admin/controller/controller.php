<?php 

class AdminController{

	function __construct(){
		require_once("model/modelAdmin.php");
	}

	public function index(){
			if (!isset($_SESSION["current_admin"])) {
				require_once('views/adminView.php');
				$adminView = new adminView();
                $adminView->loginAdmin();
			}else{
			     $this->dashBoard();
			}
		}
    public function dashBoard(){

        $adminModel = new ModelAdmin();
        //count order
        $countOrder = $adminModel->getListOrder();
        $countOrder = $countOrder->num_rows;
        //count product
        $countProduct = $adminModel->getListProductAdmin();
        $countProduct = $countProduct->num_rows;
        //countCategory
        $countCategory = $adminModel->getListCategoryadmin();
        $countCategory = $countCategory->num_rows;
        //count producer
        $coutProducer  = $adminModel->getListProducerAdmin();
        $coutProducer = $coutProducer->num_rows;
        //count user
        $countUser    = $adminModel->getListUser();
        $countUser    = $countUser->num_rows;
        //count newspost 
        $countNews    = $adminModel->getlistNews();
        $countNews     =  $countNews->num_rows;
        //count contact
        $countContact   = $adminModel->getlistContact();
         $countContact  =   $countContact->num_rows;

        $arrayMoneyTotal = $this->getAllMoney();

        $investmentMoney = $this->getAllInvestmentMoney();
        if (!isset($_SESSION["current_admin"])) {
                require_once('views/adminView.php');
                $adminView = new adminView();
                $adminView->loginAdmin();
            }else{
                require_once('views/adminView.php');
                $adminView = new adminView();
                $adminView->showDashBoard($countOrder,$countProduct,$countUser,$countNews,$countContact,$countCategory,$coutProducer,$arrayMoneyTotal,$investmentMoney);
            }

    }

    public function getAllMoney(){
        $array = array();
        $adminModel = new ModelAdmin();


        for($i=1; $i<13; $i++){
            $array[$i] = $adminModel->getMoneyByMonth($i);
        }
        // var_dump($array);
        // exit();
        $arrayTotal = array();
        $num = 0;

        foreach ($array as $key => $value) {
            $num++;
           if(array_key_exists($key, $array) && !is_null($array[$key])) {
                $arrayTotal[$num] = 0;
                foreach ($value as $keys => $values) {
                     $arrayTotal[$num] += $values['total'];
                }
            }
        }
        return $arrayTotal;

    }

    public function getAllInvestmentMoney(){
        $array = array();
        $investmentMoney = 0;
        $adminModel = new ModelAdmin();
        $results = $adminModel->getInvestmentMoney();
        if ($results) {
            while ($row = mysqli_fetch_assoc($results)) {
                $investmentMoney += $row['investment_money'];
            }
        }else{
             $investmentMoney = 0;
        }

        return $investmentMoney;
    }


    /******************************** Acount *************************************** */
	public function doLoginAdmin(){
		 if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password']))
            {
            	 $adminModel = new ModelAdmin();

            	$username = mysqli_real_escape_string($adminModel->conn,htmlspecialchars(addslashes($_POST['username'])));
                $password = mysqli_real_escape_string($adminModel->conn,htmlspecialchars(addslashes(md5($_POST['password']))));
             
                $result = $adminModel->is_Admin($username,$password);


                if (!empty($result)){
                    $admin = mysqli_fetch_assoc($result);
                    $_SESSION['current_admin'] = $admin;
                    require_once('views/adminView.php');
                    $adminView = new adminView();
                    $adminView->showAdmin();
                }else{
                    $error = "username or password not vlid";
                    require_once('views/adminView.php');
                    $adminView = new adminView();
                    $adminView->throwShowAdmin($error);
                }

            }
	}
    public function doLogOutAdmin(){
        unset($_SESSION['current_admin']);
        header('location: http://localhost:8080/foodviet/admin');
    }


    public function changePass(){
           if (isset($_GET['action']) && $_GET['action'] == 'changePass') {
              if ($_SESSION['current_admin'] != null){
                    require_once('views/adminView.php');
                    $adminView = new adminView();
                    $adminView->showChangePass();
                }
           }
    }

     public  function doChangePass(){
        if (isset($_GET['action']) && $_GET['action'] == 'doChangePass') {
            if (isset($_POST['submit_change_pass'])){
                $id = $_POST['user_id'];
                $old_password = md5($_POST['oldpassword']);
                $new_password = md5($_POST['password']);

                $adminModel = new ModelAdmin();
                $result =   $adminModel->checkOldPassword($id,$old_password);
                


                if (isset($result) && !empty($result)) {
                    require_once('views/adminView.php');
                    $adminView = new adminView();
                    $resultx =   $adminModel->setNewPassword($id,$old_password,$new_password);

                    if (isset($resultx) && !empty($resultx)) {
                        $alert = "Update password susscess";
                        $adminView->throwChangePass($alert);
                    }else{
                        $alert = "Some thing went wrong !";
                       $adminView->throwChangePass($alert);
                    }
                }else{
                    require_once('views/adminView.php');
                    $adminView = new adminView();
                    $alert = "Old Password is Wrong !";
                    $adminView->throwChangePass($alert);
                }
            }
        }
        }

    public function listUser(){
           if (isset($_GET['action']) && $_GET['action'] == 'listUser') {
                $adminModel = new ModelAdmin();
                $result = $adminModel->getListUser();

                if (!empty($result) && isset($result)){
                    require_once('views/adminView.php');
                    $adminView = new adminView();
                    $adminView->showListUser($result);
                }else{
                     $result = "";
                    require_once('views/adminView.php');
                    $adminView = new adminView();
                    $adminView->showListUser($result);
                }

           }
    }

    public function editUser(){
          if (isset($_GET['action']) && $_GET['action'] == 'editUser') {
                $id = $_GET['id'];
                $adminModel = new ModelAdmin();
                $result = $adminModel->getUserById($id);
                if (!empty($result)){
                    require_once('views/adminView.php');
                    $adminView = new adminView();
                    $adminView->showEditUser($result);
            }

           }
    }
    public function doEditUser(){
         if (isset($_GET['action']) && $_GET['action'] == 'doEditUser') {
            require_once('views/adminView.php');
            $adminView = new adminView();
            $adminModel = new ModelAdmin();
            $id = $_GET['id'];
            $username = $_POST['username'];
            $password =  md5($_POST['password']);
            $email=isset($_POST['email'])?$_POST['email']:"";
            $phonenumber=isset($_POST['phonenumber'])?$_POST['phonenumber']:"";
            $fullname=isset($_POST['fullname'])?$_POST['fullname']:"";


            
            $result= $adminModel->checkUserExist($username,$email);

            if ($result) {
                if (isset($password) && !empty($password)){
                    $adminModel->updateUser($id,$password,$email,$phonenumber,$fullname);
                     header('location: http://localhost:8080/foodviet/admin?action=listUser');
                }else{
                      $adminModel->updateUserNoPass($id,$email,$phonenumber,$fullname);
                     header('location: http://localhost:8080/foodviet/admin?action=listUser');
                }
              
            }else{
                    $result = (object) [
                    ];
                    $error = "username or email đã tồn tại";
                    $adminView->throwFormEditUser($result,$error);
            }

        }
    }

    public function deleteUser(){
          if (isset($_GET['action']) && $_GET['action'] == 'deleteUser') {
                $id = $_GET['id'];
                $adminModel = new ModelAdmin();
                $result = $adminModel->deleteUserByid($id);
                if (!empty($result)){
                    header('location: http://localhost:8080/foodviet/admin/?action=listUser');
                }
          }
    }

    // *******************************Product *************************************
    public function listProductAdmin(){
        if (isset($_GET['action']) && $_GET['action'] == 'listProductAdmin') {
            $adminModel = new ModelAdmin();
            $result = $adminModel->getListProductadmin();
            if (!empty($result) && isset($result)){
                require_once('views/adminView.php');
                $adminView = new adminView();
                $adminView->showListAdminProduct($result);
            }
        }
    }

    public function listCategoryAdmin(){
        if (isset($_GET['action']) && $_GET['action'] == 'listCategoryAdmin') {
            $adminModel = new ModelAdmin();
            $result = $adminModel->getListCategoryadmin();
            if (!empty($result) && isset($result)){
                require_once('views/adminView.php');
                $adminView = new adminView();
                $adminView->showListCategoryAdmin($result);
            }
        }
    }
    public function listProducerAdmin(){
        if (isset($_GET['action']) && $_GET['action'] == 'listProducerAdmin') {
            $adminModel = new ModelAdmin();
            $result = $adminModel->getListProducerAdmin();
            if (!empty($result) && isset($result)){
                require_once('views/adminView.php');
                $adminView = new adminView();
                $adminView->showListProducerADmin($result);
            }
        }
    }

    public function addCategoryProductAdmin(){
        if (isset($_GET['action']) && $_GET['action'] == 'addCategoryProductAdmin') {
            require_once('views/adminView.php');
            $adminView = new adminView();
            $adminView->showFormAddCategoryProductAdmin();
        }
    }
    public function doAddCategoryProductAdmin(){
        if (isset($_GET['action']) && $_GET['action'] == 'doAddCategoryProductAdmin') {
            if (isset($_POST['add_category']))
            {
                if (isset($_POST['category_name']) && !empty($_POST['category_name']))
                {
                    $category_name = $_POST['category_name'];
                     $image_link=$_FILES['image_link']['name'];
                    $image_link_tmp=$_FILES['image_link']['tmp_name'];


                    $new_file_name =  date('Y-m-d-H-i-s') .'_' . uniqid().$image_link;   
                    $adminModel = new ModelAdmin();

                    $result = $adminModel->insertCategory($category_name,$new_file_name);
                if (!empty($result)){
                        move_uploaded_file($image_link_tmp,'../uploads/category/'.$new_file_name);
                        $error = "Thêm thành công";
                        require_once('views/adminView.php');
                        $adminView = new adminView();
                        $adminView->throwFormAddCategoryProductAdmin($error);
                    }

                }else{
                    $error = " Nhập thiếu thông tin";
                    require_once('views/adminView.php');
                    $adminView = new adminView();
                    $adminView->throwFormAddCategoryProductAdmin($error);
               }
            }
        }
    }


    public function editCategoryProductAdmin(){
        if (isset($_GET['action']) && $_GET['action'] == 'editCategoryProductAdmin') {
            if (isset($_GET['id']) && !empty($_GET['id'])){
                $id = $_GET['id'];
                $adminModel = new ModelAdmin();
                $result = $adminModel->CheckExistsCategory($id);
                if (!empty($result)){
                    require_once('views/adminView.php');
                    $adminView = new adminView();
                    $adminView->showFormEditCategoryProductAdmin($result);
                }
            }
        }
    }

    public function doEditCategoryProductAdmin(){
        if (isset($_GET['action']) && $_GET['action'] == 'doEditCategoryProductAdmin') {
            if (isset($_POST['name']) && !empty($_POST['name'])  ){
                $id = $_POST['id'];
                $category_name = $_POST['name'];
                $adminModel = new ModelAdmin();
                $image_link = $_FILES['image_link']['name'];
                $image_link_tmp=$_FILES['image_link']['tmp_name'];
                $new_file_name =  date('Y-m-d-H-i-s') .'_' . uniqid().$image_link;


                $adminModel = new ModelAdmin();  
                if (isset($image_link) && !empty($image_link)) {
                    $result = $adminModel->updateCategory($id,$category_name,$new_file_name);
                        move_uploaded_file($image_link_tmp,'../uploads/category/'.$new_file_name);
                }else{
                    $result = $adminModel->updateCategoryNoImg($id,$category_name);
                }    

             
                $result_2 = $adminModel->CheckExistsCategory($id);

                if (!empty($result)){
                    $error = "Sửa thành công";
                    require_once('views/adminView.php');
                    $adminView = new adminView();
                    $adminView->throwFormEditCategoryProductAdmin($error,$result_2);
                }else{
                    $error = "Nhập thiếu thông tin";
                    require_once('views/adminView.php');
                    $adminView = new adminView();
                    $adminView->throwFormEditCategoryProductAdmin($error,$result_2);
                }
            }
        }
    }

    public function deleteCategoryProductAdmin(){
        if (isset($_GET['action']) && $_GET['action'] == 'deleteCategoryProductAdmin') {
            if (isset($_GET['id']) && !empty($_GET['id'])){
                $id = $_GET['id'];
                $url = $_GET['url'];
                $adminModel = new ModelAdmin();
                $result = $adminModel->deleteCategory($id);
                if (!empty($result)){
                    unlink('../uploads/category/'.$url);
                    header('location: http://localhost:8080/foodviet/admin/?action=listCategoryAdmin');
                }
            }
        }
    }

    public function addProducerAdmin(){
        if (isset($_GET['action']) && $_GET['action'] == 'addProducerAdmin') {
            require_once('views/adminView.php');
            $adminView = new adminView();
            $adminView->showFormAddProducerAdmin();
        }
    }

    public function doAddProducerAdmin(){
        if (isset($_GET['action']) && $_GET['action'] == 'doAddProducerAdmin') {
            if (isset($_POST['producer_name']) && !empty($_POST['producer_name'])  ){
                $producer_name = $_POST['producer_name'];
                $adminModel = new ModelAdmin();

                $result = $adminModel->insertProducer($producer_name);
                if (!empty($result)){
                    $error = "Thêm thành công";
                    require_once('views/adminView.php');
                    $adminView = new adminView();
                    $adminView->throwFormAddProducerAdmin($error);
                }else{
                    $error = "không thể thêm mới ";
                    require_once('views/adminView.php');
                    $adminView = new adminView();
                    $adminView->throwFormAddProducerAdmin($error);
                }
            }
        }
    }

    public  function editProducerAdmin(){
        if (isset($_GET['action']) && $_GET['action'] == 'editProducerAdmin') {
            if (isset($_GET['id']) && !empty($_GET['id'])){
                $id = $_GET['id'];
                $adminModel = new ModelAdmin();
                $result = $adminModel->CheckExistsProducer($id);
                if (!empty($result)){
                    require_once('views/adminView.php');
                    $adminView = new adminView();
                    $adminView->showFormEditProducertAdmin($result);
                }
            }
        }
    }

    public function doEditProducerAdmin(){
        if (isset($_GET['action']) && $_GET['action'] == 'doEditProducerAdmin') {
            if (isset($_POST['name']) && !empty($_POST['name'])) {
                $id = $_POST['id'];
                $producer_name = $_POST['name'];
                $adminModel = new ModelAdmin();

                $result = $adminModel->updateProducer($id, $producer_name);
                $result_2 = $adminModel->CheckExistsProducer($id);

                if (!empty($result)) {
                    $error = "Sửa thành công";
                    require_once('views/adminView.php');
                    $adminView = new adminView();
                    $adminView->throwFormEditProducerAdmin($error, $result_2);
                } else {
                    $error = "Nhập thiếu thông tin";
                    require_once('views/adminView.php');
                    $adminView = new adminView();
                    $adminView->throwFormEditProducerAdmin($error, $result_2);
                }
            }
        }

    }

    public function deleteProducerAdmin(){
        if (isset($_GET['action']) && $_GET['action'] == 'deleteProducerAdmin') {
            if (isset($_GET['id']) && !empty($_GET['id'])){
                $id = $_GET['id'];
                $adminModel = new ModelAdmin();
                $result = $adminModel->deleteProducer($id);
                if (!empty($result)){
                    header('location: http://localhost:8080/foodviet/admin/?action=listProducerAdmin');
                }
            }
        }
    }

    public function addProductAdmin(){
        if (isset($_GET['action']) && $_GET['action'] == 'addProductAdmin') {
            //query take 2 value send to option, category_name and producer_name
            $adminModel = new ModelAdmin();
            $result_category = $adminModel->getListCategoryadmin();
            $result_producer = $adminModel->getListProducerAdmin();

            if (!empty($result_producer) && !empty($result_producer)){
                require_once('views/adminView.php');
                $adminView = new adminView();
                $adminView->showFormAddProductAdmin($result_category,$result_producer);
            }
        }
    }

    public function doAddproductAdmin(){
        if (isset($_GET['action']) && $_GET['action'] == 'doAddproductAdmin') {
            if (isset($_POST['add_product'])) {
                if (isset($_POST['product_name']) && !empty($_POST['product_name'])){
                    $product_name  =$_POST["product_name"];
                    $category_id =$_POST['category_name'];
                    $producer_id =$_POST['producer_name'];
                    $describe=$_POST['describe'];
                    $des_short =$_POST['des_short'];
                    $price=$_POST['price'];
                    


                    if ($_POST['discount'] == "") {
                         $discount = 0;
                    }else{
                       $discount =  $_POST['discount'];
                    }
                    

                    if ($_POST['total']  == "") {
                            $total=  0;
                    }else{
                         $total =  $_POST['total'];
                    }


                    $image_link=$_FILES['image_link']['name'];
                    $image_link_tmp=$_FILES['image_link']['tmp_name'];


                    $new_file_name =  date('Y-m-d-H-i-s') .'_' . uniqid().$image_link;

                    $adminModel = new ModelAdmin();
                    $result_category = $adminModel->getListCategoryadmin();
                    $result_producer = $adminModel->getListProducerAdmin();



                    $adminModel = new ModelAdmin();
                    $result = $adminModel->insertProduct( $product_name,$category_id,$producer_id,$describe,$des_short,$price,$discount,$total,$new_file_name);
                    
                    if (!empty($result)){
                         if(isset($_FILES['image_link']) && !empty($_FILES['image_link'])) {
                              move_uploaded_file($image_link_tmp,'../uploads/image/'.$new_file_name);
                              $error= "thêm sản phẩm thành công";
                              require_once('views/adminView.php');
                              $adminView = new adminView();
                              $adminView->throwFormAddProductAdmin($error,$result_category,$result_producer);
                         }
                    }else{
                                $error = "Thêm sản phẩm thất bại";
                                require_once('views/adminView.php');
                                $adminView = new adminView();
                                $adminView->throwFormAddProductAdmin($error,$result_category,$result_producer);
                         }

                }
            }
        }
    }

    public function editProductAdmin(){
        if (isset($_GET['action']) && $_GET['action'] == 'editProductAdmin') {
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $id = $_GET['id'];
                $adminModel = new ModelAdmin();
                $result_product = $adminModel->getProductId($id);
                $result_category = $adminModel->getListCategoryadmin($id);

                $result_producer = $adminModel->getListProducerAdmin($id);
                
               

                require_once('views/adminView.php');
                $adminView = new adminView();
                $adminView->showFormEditProductAdmin($result_product,$result_category,$result_producer);
            }
        }
    }

    public function doEditProductAdmin(){
        if (isset($_GET['action']) && $_GET['action'] == 'doEditProductAdmin') {
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                if (isset($_POST['edit_product'])) {
                    $adminModel = new ModelAdmin();
                    $id = $_GET['id'];
                    $product_name  =$_POST["product_name"];
                    $category_id =$_POST['category_name'];
                    $producer_id =$_POST['producer_name'];
                    $investment_money = $_POST['investment_money'];
                    $describe=$_POST['describe'];
                    $des_short =$_POST['des_short'];
                    $price=$_POST['price'];
                    $discount=$_POST['discount'];
                    $total=$_POST['total'];
                    $image_link = $_FILES['image_link']['name'];
                    $image_link_tmp=$_FILES['image_link']['tmp_name'];
                    $new_file_name =  date('Y-m-d-H-i-s') .'_' . uniqid().$image_link;


                  
                    if (isset($image_link) && !empty($image_link)) {
                        $result = $adminModel->updateProduct($id,$product_name,$category_id,$producer_id,$investment_money,$describe,$des_short,$price,$discount,$total,$new_file_name);
                        move_uploaded_file($image_link_tmp,'../uploads/image/'.$new_file_name);
                    }else{
                         $result = $adminModel->updateProductNoImg($id,$product_name,$category_id,$producer_id,$investment_money,$describe,$des_short,$price,$discount,$total,$new_file_name);
                        }


                    
                    if (!empty($result)){
                        require_once('views/adminView.php');
                        $adminView = new adminView();
                        $adminModel = new ModelAdmin();
                       /* $result = $adminModel->getListProducerAdmin();*/
                        header('location: http://localhost:8080/foodviet/admin/?action=listProductAdmin');
                    }else{
                        $error = "có lỗi";

                    }
                }
            }else{
                echo "chua co bien id";
            }
        }
    }

    public function deleteProductAdmin(){
        if (isset($_GET['action']) && $_GET['action'] == 'deleteProductAdmin') {
            if (isset($_GET['id']) && !empty($_GET['id'])){
                $id = $_GET['id'];
                $url = $_GET['url'];
                $adminModel = new ModelAdmin();
                $result = $adminModel->deleteProduct($id);
                
                if (isset($result)){
                    unlink('../uploads/image/'.$url);
                    header('location: http://localhost:8080/foodviet/admin/?action=listProductAdmin');
                }
            }
        }
    }


    // ************************ORDER***************************************************
    
    public function listOrder(){
         if (isset($_GET['action']) && $_GET['action'] == 'listOrder') {
             $adminModel = new ModelAdmin();
            $result = $adminModel->getListOrder();
            if (!empty($result) && isset($result)){
                require_once('views/adminView.php');
                $error = "";
                $adminView = new adminView();
                $adminView->showListAdminOrder($error,$result);
            }else{
                require_once('views/adminView.php');
                $error = "Đơn hàng trống";
                $adminView = new adminView();
                $adminView->showListAdminOrder($error,$result);
            }
         }
    }

    public function listOrderDetail(){
         if (isset($_GET['action']) && $_GET['action'] == 'listOrderDetail') {
            $adminModel = new ModelAdmin();
            $id = $_POST['id'];
            
            $arrayOrderdetail = array();
            $arrayOrder = array();

            //begin get list id product of any cart;
            $result = $adminModel->getListOrderId($id);
            $result2 = $adminModel->getListOrderDetail($id);
            

            //array detail guess
            while($row1 = mysqli_fetch_assoc($result)){
                   $arrayOrder[] = $row1;  
            }

            //array detail product of cart
            while($row2 = mysqli_fetch_assoc($result2)){
                   $arrayOrderdetail[] = $row2;  
            }

            if (!empty($arrayOrderdetail)){
                require_once('views/adminView.php');
                $adminView = new adminView();
                $adminView->showListOrderDetail($arrayOrderdetail,$arrayOrder);
            }
    
        }
    }

    public function deleteOrder(){
        if (isset($_GET['action']) && $_GET['action'] == 'deleteOrder') {
            $adminModel = new ModelAdmin();
            $id = $_GET['id'];

            $result = $adminModel->deleteOrder($id);
            if ($result) {
                 header('location: http://localhost:8080/foodviet/admin/?action=listOrder');
            }
        }
    }

    public function handleCart(){
        if (isset($_GET['action']) && $_GET['action'] == 'handleCart') {
            $status = $_POST['order_status'];
            $id = $_GET['id'];
            $adminModel = new ModelAdmin();

            $result = $adminModel->updateHandleCart($id,$status);


            if (isset($result) && !empty($result)) {
                 header('location: http://localhost:8080/foodviet/admin/?action=listOrder');
            }else{
                 header('location: http://localhost:8080/foodviet/admin/?action=listOrder');
            }

        }
    }


    // ************************************** SLIDE ************************************

    public function slide(){
        if (isset($_GET['action']) && $_GET['action'] == 'slide') {
             $adminModel = new ModelAdmin();
             $arrayVals = array();
            $result = $adminModel->getlistSlide();

            while($row = mysqli_fetch_assoc($result)){
                   $arrayVals[] = $row;  
            }

        if ($result && isset($result)) {
            require_once('views/adminView.php');
            $adminView = new adminView();
            $adminView->showListSlide($arrayVals);
        }
    }
    }

    public function addSlide(){
        if (isset($_GET['action']) && $_GET['action'] == 'addSlide') {
            require_once('views/adminView.php');
            $adminView = new adminView();
            $adminView->showFormAddSlide();
        }
    }

    public function doAddSlide(){
         if (isset($_GET['action']) && $_GET['action'] == 'doAddSlide') {
            $image_link = $_FILES['image_link']['name'];
            $image_link_tmp=$_FILES['image_link']['tmp_name'];
            $new_file_name =  date('Y-m-d-H-i-s') .'_' . uniqid().$image_link;

             if (isset($image_link) && !empty($image_link)) {
                $adminModel = new ModelAdmin();
                $result = $adminModel->insertSlide($new_file_name);
                
                  if (!empty($result)){
                        move_uploaded_file($image_link_tmp,'../uploads/slide/'.$new_file_name);
                        $error = "Thêm thành công";
                        require_once('views/adminView.php');
                        $adminView = new adminView();
                        $adminView->throwFormAddSlide($error);

                  }else{
                    $error = " có lỗi Xảy ra";
                    require_once('views/adminView.php');
                    $adminView = new adminView();
                    $adminView->throwFormAddSlide($error);
                 }
            }
         }
    }

    public function editSlide(){
        if (isset($_GET['action']) && $_GET['action'] == 'editSlide') {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                 $adminModel = new ModelAdmin();
                 $result =  $adminModel->selectSlideId($id);

                    if(isset($result)) {
                        require_once('views/adminView.php');
                        $adminView = new adminView();
                        $adminView->showFormEditSlide($result);
                    }

            }
            
        }
    }

    public function doEditSlide(){
        if (isset($_GET['action']) && $_GET['action'] == 'doEditSlide') {
            $image_link = $_FILES['image_link']['name'];
            $image_link_tmp=$_FILES['image_link']['tmp_name'];
            $new_file_name =  date('Y-m-d-H-i-s') .'_' . uniqid().$image_link;
            $id = $_POST['id'];




            if (isset($image_link) && !empty($image_link)) {
                $adminModel = new ModelAdmin();
                $result = $adminModel->updateSlide($new_file_name,$id);
                
                  if (!empty($result)){
                        move_uploaded_file($image_link_tmp,'../uploads/slide/'.$new_file_name);
                        header('location: http://localhost:8080/foodviet/admin/?action=slide'); 
                  }
            }
        }
    }

    public function deleteSlide(){
        if (isset($_GET['action']) && $_GET['action'] == 'deleteSlide') {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $adminModel = new ModelAdmin();
                $resultfilename =  $adminModel->selectSlideId($id);

                while($row = mysqli_fetch_assoc($resultfilename)){
                   $filename = $row['slide_link']; 
                 }

              


                $result = $adminModel->deleteSlide($id);
                if ($result) {
                     unlink( "../uploads/slide/".$filename );
                     header('location: http://localhost:8080/foodviet/admin/?action=slide');
                }
            }
            
            
        }
    }
    // *********************************** NEW *******************************
    public function addNews(){
         if (isset($_GET['action']) && $_GET['action'] == 'addNews') {
            require_once('views/adminView.php');
            $adminView = new adminView();
            $adminView->showFormAddNews();
         }
    }

    public function listNews(){
             if (isset($_GET['action']) && $_GET['action'] == 'listNews') {
                $adminModel = new ModelAdmin();
                $arrayVals = array();
                $result = $adminModel->getlistNews();

                if (!empty($result) && isset($result)) {
                    while($row = mysqli_fetch_assoc($result)){
                       $arrayVals[] = $row;  
                  }
                   require_once('views/adminView.php');
                    $adminView = new adminView();
                    $adminView->showListNews($arrayVals);
                }else{
                    $arrayVals = "";
                    require_once('views/adminView.php');
                    $adminView = new adminView();
                    $adminView->showListNews($arrayVals);
                }
                

         }
    }
    public function doAddNews(){
         if (isset($_GET['action']) && $_GET['action'] == 'doAddNews') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $image_link = $_FILES['image_link']['name'];
            $image_link_tmp=$_FILES['image_link']['tmp_name'];
            $new_file_name =  date('Y-m-d-H-i-s') .'_' . uniqid().$image_link;
            $created_time = time();
            $last_updated = time();

            if (isset($image_link) && !empty($image_link)) {
                $adminModel = new ModelAdmin();
                $result = $adminModel->insertNews($title,$content,$new_file_name,$created_time,$last_updated);
                
                  if (!empty($result)){
                        move_uploaded_file($image_link_tmp,'../uploads/news/'.$new_file_name);
                         header('location: http://localhost:8080/foodviet/admin/?action=listNews');

                  }else{
                    $error = " có lỗi Xảy ra";
                    require_once('views/adminView.php');
                    
                 }
            }
         }
    }

    public function editNews(){
          if (isset($_GET['action']) && $_GET['action'] == 'editNews') {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                 $adminModel = new ModelAdmin();
                 $result =  $adminModel->selectNewsId($id);

                    if(isset($result)) {
                        require_once('views/adminView.php');
                        $adminView = new adminView();
                        $adminView->showFormEditNews($result);
                    }

            }
            
        }
    }

    public function doEditNews(){
        if (isset($_GET['action']) && $_GET['action'] == 'doEditNews') {
            $adminModel = new ModelAdmin();
            $id = $_GET['id'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $image_link = $_FILES['image_link']['name'];
            $image_link_tmp=$_FILES['image_link']['tmp_name'];
            $new_file_name =  date('Y-m-d-H-i-s') .'_' . uniqid().$image_link;
            $last_updated = time();

            if (isset($image_link) && !empty($image_link)) {
                        $results = $adminModel->updateNews($id,$title,$content,$new_file_name,$last_updated);
                        move_uploaded_file($image_link_tmp,'../uploads/news/'.$new_file_name);

                    }else{
                         $results = $adminModel->updateNewsNoImg($id,$title,$content,$last_updated);
                    }

                    //load content again
                    $result =  $adminModel->selectNewsId($id);

                    if (!empty($results)) {
                        $error = "Sửa thành công";
                        require_once('views/adminView.php');
                        $adminView = new adminView();
                        $adminView->throwFormEditNews($error, $result);
                    } else {
                        $error = "Có lỗi";
                        require_once('views/adminView.php');
                        $adminView = new adminView();
                        $adminView->throwFormEditNews($error, $result);
                    }
        }
    }

    public function deleteNews(){
          if (isset($_GET['action']) && $_GET['action'] == 'deleteNews') {
                if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $adminModel = new ModelAdmin();
                $resultfilename =  $adminModel->selectNewsId($id);

                while($row = mysqli_fetch_assoc($resultfilename)){
                   $filename = $row['image_link']; 
                 }
                $result = $adminModel->deleteNews($id);
                if ($result) {
                     unlink( "../uploads/news/".$filename );
                     header('location: http://localhost:8080/foodviet/admin/?action=listNews');
                }
            }
          }
    }
    // ******************** Contact **************

    public function listContact(){
           if (isset($_GET['action']) && $_GET['action'] == 'listContact') {
                $adminModel = new ModelAdmin();
                $arrayVals = array();
                $result = $adminModel->getlistContact();

                if (!empty($result) && isset($result)) {
                    while($row = mysqli_fetch_assoc($result)){
                       $arrayVals[] = $row;  
                  }
                   require_once('views/adminView.php');
                    $adminView = new adminView();
                    $adminView->showListContact($arrayVals);
                }else{
                    $arrayVals = "";
                    require_once('views/adminView.php');
                    $adminView = new adminView();
                    $adminView->showListContact($arrayVals);
                }
                

         }
    }

    public function listContactDetails(){
         if (isset($_GET['action']) && $_GET['action'] == 'listContactDetails') {
            $adminModel = new ModelAdmin();
            $id = $_POST['id'];
            $array = array();

            $result = $adminModel->getlistContactById($id);
            

            //array detail guess
            while($row = mysqli_fetch_assoc($result)){
                   $array[] = $row;  
            }

            if (!empty($array) && isset($array)){
                require_once('views/adminView.php');
                $adminView = new adminView();
                $adminView->showListContactDetail($array);
            }else{
                 header('location: http://localhost:8080/foodviet/admin/?action=dashBoard');
            }
    
        }
    }
    public function deleteContact(){
         if (isset($_GET['action']) && $_GET['action'] == 'deleteContact') {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $adminModel = new ModelAdmin();
                $result = $adminModel->deleteContact($id);
                if (isset($result) && !empty($result)) {
                     header('location: http://localhost:8080/foodviet/admin/?action=listContact');
                }else{
                    header('location: http://localhost:8080/foodviet/admin/?action=listContact');
                }
            }
         }
    }


    public function changeLogo(){
        if (isset($_GET['action']) && $_GET['action'] == 'changeLogo') {
                require_once('views/adminView.php');
                $adminModel = new ModelAdmin();
                $result = $adminModel->getLogo();

                if (isset($result)) {
                    $adminView = new adminView();
                    $adminView->showLogo($result);
                }
        }
    }

    public function doChangeLogo(){
         if (isset($_GET['action']) && $_GET['action'] == 'doChangeLogo') {
            $image_link = $_FILES['image_link']['name'];
            $image_link_tmp=$_FILES['image_link']['tmp_name'];
            $id = $_POST['id'];
            if (isset($image_link) && !empty($image_link)) {
                   $adminModel = new ModelAdmin();
                    $result2 = $adminModel->getLogo();

                    while($row = mysqli_fetch_assoc($result2)){
                                  $oldname = $row['image_link'];  
                     }
                   $result = $adminModel->updateLogo($id,$image_link);

                   if (isset($result)) {
                    
                       move_uploaded_file($image_link_tmp,'../uploads/logo/'.$image_link);
                       unlink('../uploads/logo/'.$oldname);
                        header('location: http://localhost:8080/foodviet/admin/?action=changeLogo');
                   }else{
                        header('location: http://localhost:8080/foodviet/admin/?action=changeLogo');
                   }
            }else{
                header('location: http://localhost:8080/foodviet/admin/?action=changeLogo');
            }
        }
    }

    public function changefooter(){
            if (isset($_GET['action']) && $_GET['action'] == 'changefooter') {
                require_once('views/adminView.php');
                $adminModel = new ModelAdmin();
                $result = $adminModel->getInfo();

                if (isset($result)) {
                    $adminView = new adminView();
                    $adminView->showInfo($result);
                }
            }
    }
    public function doChangefooter(){
         if (isset($_GET['action']) && $_GET['action'] == 'doChangefooter') {
                $id = $_POST['id'];
                $content = $_POST['content'];
                $adminModel = new ModelAdmin();
                $result = $adminModel->updateInfo($id,$content);
                $result2 = $adminModel->getInfo();


                if (isset($result)) {
                    require_once('views/adminView.php');
                    $alert = "update thành công";
                     $adminView = new adminView();
                    $adminView->throwShowInfo($alert,$result2);
                }
         }
    }

    public function load_order_status(){
       if (isset($_GET['action']) && $_GET['action'] == 'load_order_status') {
          $id = $_POST['id'];
          $adminModel = new ModelAdmin();

        $shiperDetails = $adminModel->getdetailsShiper($id);
        $result = $adminModel->load_order_status($id);
          
          

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
            require_once('views/adminView.php');
            $adminView = new adminView();
            $adminView->showListOrderStatus($array,$arrayShipDetails);
        }else{
           $array = "";
           $arrayShipDetails = "";
           require_once('views/adminView.php');
           $adminView = new adminView();
           $adminView->showListOrderStatus($array,$arrayShipDetails);
       }
   }
} 




}

	?>