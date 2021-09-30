<?php 
    
    require_once('config/DbModel.php');

	class Model extends DbModel{


        private $last_id;

		public function getListProduct(){

			$sql = "select * from product";


			$results = $this->conn->query($sql);


            if ($results->num_rows>0) {
                return $results;
            }else{

                return null;
            }
		}

		public  function checkLogin($username,$password){
            $sql = "SELECT * FROM `users` WHERE username = '" .$username. "' AND password = md5('" .$password. "')";
            
            $results =	$this->conn->query($sql);

            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }
        }

        public  function checkLoginShip($username,$password){
            $sql = "SELECT * FROM `shiper` WHERE username = '" .$username. "' AND password = md5('" .$password. "')";
            
        
            $results =  $this->conn->query($sql);

            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }
        }

        public function checkUserExist($username,$email){
            $sql = "SELECT `Email`, `username` FROM `users` WHERE `username`='".$username."' OR `email`='".$email."'";

            $result =	$this->conn->query($sql);

            if($result->num_rows >= 1) {
                return $result;
            } else {
                // ....
                return null;
            }
        }

           public function checkShiperExist($username,$email){
            $sql = "SELECT `Email`, `username` FROM `shiper` WHERE `username`='".$username."' OR `email`='".$email."'";

            $result =   $this->conn->query($sql);

            if($result->num_rows >= 1) {
                return $result;
            } else {
                // ....
                return null;
            }
        }

        public  function  registerAcount($username,$password,$fullname,$email,$phonenumber){
            $sql = "INSERT INTO `users`(`id`, `username`,`password`, `fullname`, `email` ,`phonenumber`) VALUES (NULL,'".$username."',
				 MD5('" .$password. "'),'".$fullname."', '".$email."','".$phonenumber."');";

            $results =	$this->conn->query($sql);
            if ($results)
            {
                return $results;
            }else{
                return null;
            }
        }

        public  function  registerAcountShiper($username,$password,$fullname,$email,$phonenumber){
            $sql = "INSERT INTO `shiper`(`id`, `username`,`password`, `fullname`, `email` ,`phonenumber`) VALUES (NULL,'".$username."',
                 MD5('" .$password. "'),'".$fullname."', '".$email."','".$phonenumber."');";

            $results =  $this->conn->query($sql);
            if ($results)
            {
                return $results;
            }else{
                return null;
            }
        }

        function checkOldPassword($id,$old_password){
            $sql = "SELECT * FROM `users` WHERE id = '" .$id. "' AND password = '" .$old_password. "'";
            $results =	$this->conn->query($sql);

            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }

        }

        function checkOldPasswordShip($id,$old_password){
            $sql = "SELECT * FROM `shiper` WHERE id = '" .$id. "' AND password = '" .$old_password. "'";
            $results =  $this->conn->query($sql);

            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }

        }

        function setNewPassword($id,$old_password,$new_password){
            $sql = "UPDATE `users` SET `password` = '".$new_password."' WHERE (`id` = " . $id . " AND `password` = '" . $old_password . "')";
            $results =	$this->conn->query($sql);
            if ($results) {
                return $results;
            }else{
                return null;
            }
        }

          function setNewPasswordShip($id,$old_password,$new_password){
            $sql = "UPDATE `shiper` SET `password` = '".$new_password."' WHERE (`id` = " . $id . " AND `password` = '" . $old_password . "')";
            $results =  $this->conn->query($sql);
            if ($results) {
                return $results;
            }else{
                return null;
            }
        }


        function getProductById($id){

                 $stmt = $this->conn->prepare('SELECT * FROM `product` where product.id = ?');
                 $stmt->bind_param('s', $id); // 's' specifies the variable type => 'string'

                 $stmt->execute();

               /* $sql = 'SELECT * FROM `product` where product.id = ' . mysqli_real_escape_string($this->conn,htmlspecialchars(addslashes($id)));
                    
                $results =  $this->conn->query($sql);*/

                 $results = $stmt->get_result();


                if ($results->num_rows>0) 
                {
                    return $results;
                }else{

                    return null;
                }
             }

         function getProductByCat($id){
                $sql = "SELECT * FROM `product` WHERE `category_id` = '".$id."'   ";
                $results =  $this->conn->query($sql);

                $array = [];
                while($row = mysqli_fetch_assoc($results)){
                         $array[] = $row;  
                     }

                return $array;
             }


        // SELECT * FROM `category_product` , `producer`,`product`  WHERE category_product.cat_id = product.category_id and producer.id = product.producer_id
        function getCategoryProductById($id,$item_per_page,$offset){
            $sql = "SELECT * FROM `product`, `category_product` WHERE product.category_id = category_product.cat_id and  `category_id` = '".$id."' LIMIT $item_per_page OFFSET $offset";

               $results =  $this->conn->query($sql);

                if ($results->num_rows>0) 
                {
                    return $results;
                }else{

                    return null;
                }
        }

        function getallCategoryProductById($id){
              $sql = "SELECT * FROM `product`, `category_product` WHERE product.category_id = category_product.cat_id and  `category_id` = '".$id."'";

               $results =  $this->conn->query($sql);

                if ($results->num_rows>0) 
                {
                    return $results;
                }else{

                    return null;
                }
        }

        public function getListCategory(){
            $sql = "SELECT * FROM `category_product`";
            $results =	$this->conn->query($sql);
            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }
        }

        public function getlistNewProduct($item_per_page,$offset){

		    $sql = "SELECT * FROM product ORDER BY id DESC LIMIT $item_per_page OFFSET $offset";
      
            $results =	$this->conn->query($sql);
            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }

        }

        public function getProductIn($StringId){
            $sql = "SELECT * FROM `product` WHERE `id` IN (".$StringId.")";

            $results =    $this->conn->query($sql);
            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }
        }


        public function insertOrder($name,$idUser,$phone,$email,$address,$note,$priceShipNew,$total,$status,$create_time,$last_update,$lat,$lng){

            $sql = "INSERT INTO `orders` (`id`,`idUser`, `name`, `phone`,`email`, `address`, `note`,`priceShip`,`total`,`status`, `created_time`, `last_updated`,`lat`,`lng`) VALUES (null,'".$idUser."','".$name."', '".$phone."','".$email."', '".$address."','".$note."','".$priceShipNew."','".$total."','".$status."', '".$create_time."', '".$last_update."', '".$lat."', '".$lng."')";

           
            $results = $this->conn->query($sql); 

            $last_id = $this->conn->insert_id;   
            $this->setLastID($last_id);
       
            if ($results) {
                return $results;
            }else{
                return null;
            }
          
        }


        public function setLastID($last_id){
                 $this->last_id = $last_id;
        }

        public function getLastID(){
                 return $this->last_id;
        }

        public function insertOrderdetailModel($insertString){

        $sql = "INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_time`, `last_updated`) VALUES ".$insertString.";";
        
         $results = $this->conn->query($sql);
            if ($results) {
                return $results;
            }else{
                return null;
            }
        }

        public function getlistSlide(){
            $sql = "SELECT * FROM `slide`";
            $results =  $this->conn->query($sql);
            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }
        }

        public function getListProductWithCategory(){
            
            $sql = "SELECT * FROM `product`,`category_product` WHERE product.category_id = category_product.cat_id";
        

             $results =  $this->conn->query($sql);
            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }
        }
        public function getListProductOrderByCondition($cat_id,$value,$condition,$item_per_page,$offset){
         $sql = "SELECT * FROM `product`,`category_product` WHERE product.category_id = category_product.cat_id and `category_id` = '".$cat_id."'  ORDER BY `product`.`".$value."` ".$condition." LIMIT $item_per_page OFFSET $offset ";  
        
         $results =  $this->conn->query($sql);
            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }
        }


        public function getlistNewProductCondition($value,$condition,$item_per_page,$offset){
            $sql = "SELECT * FROM product ORDER BY ".$value." ".$condition." LIMIT $item_per_page OFFSET $offset  ";

            $results =  $this->conn->query($sql);
            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }

        }   




        public function getlistNews(){
            $sql = "SELECT * FROM `news`";
            $results =  $this->conn->query($sql);
            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }
        }

         public function selectNewsId($id){
            $sql = "SELECT * FROM `news` WHERE id = $id";

             $results =  $this->conn->query($sql);
            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }
        }


        public function searchProduct($key){


                $stmt = $this->conn->prepare("SELECT * from product where name_product like CONCAT('%',?,'%') ");

                $stmt->bind_param('s', $key); // 's' specifies the variable type => 'string'

                $stmt->execute();   

                $results = $stmt->get_result();

                if ($results->num_rows>0) 
                {
                    return $results;
                }else{
                    return null;
                }

                $stml->close(); 
             }
        public function searchBycategory($key){
             $sql = "SELECT * from category_product where category_name like '%$key%'";

               $results =  $this->conn->query($sql);

              if ($results->num_rows>0) 
                {
                    return $results;
                }else{
                    return null;
                }
        }

        public function insertContact($name,$phone,$email,$address,$title,$content,$created_at){
            $sql = "INSERT INTO `contact` (`id`, `name`, `phonenumber`, `email`, `address`, `title`, `content`, `created_at`)
             VALUES (NULL, '".$name."', '".$phone."', '".$email."', '".$address."', '".$title."', '".$content."', '".$created_at."')";

                 $results =  $this->conn->query($sql);
              if ($results) 
                {
                    return $results;
                }else{
                    return null;
                }
        }


        public function getLogo(){
            $sql = "SELECT * FROM `logo`";
     
            $results =  $this->conn->query($sql);
            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }
        }

        public function getInfo(){
            $sql = "SELECT * FROM `info`";
            $results =  $this->conn->query($sql);
            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }
        }

        public function getListCartUser($idUser){

        $sql = "SELECT * FROM `orders` WHERE `idUser` = '".$idUser."' ORDER BY id DESC";
    

        $results =  $this->conn->query($sql);

            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }
        }

          public function getListCarOnhiptUser($idUser){

        $sql = "SELECT * FROM `orders` WHERE `idUser` = '".$idUser."' AND `status` = 2  ORDER BY id DESC";

     
        
        $results =  $this->conn->query($sql);

            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }
        }

        public function getCartOnShip($idShiper){

        $sql = "SELECT * FROM `orders` WHERE `orders`.`idShiper` = '".$idShiper."' ORDER BY id DESC";

      
    
        $results =  $this->conn->query($sql);

            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }
        }

        public function getCartOnPrepare(){
            $sql = "SELECT * FROM `orders` WHERE `status` = 4";
     
            $results =  $this->conn->query($sql);

            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }
        }

               public function getListOrderId($id){
            $sql = "SELECT * FROM `orders` WHERE id=$id";

            $results =  $this->conn->query($sql);
            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }
        }

        public function getListOrderDetail($id){
            $sql = "SELECT * FROM `order_detail`,`product` WHERE order_detail.product_id = product.id and order_id = '".$id."'";
             $results =  $this->conn->query($sql);
            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }
        }

        public function ConfirmShip($id,$idShiper){
            $sql = "UPDATE `orders` SET `status`= 2,`idShiper`='".$idShiper."' WHERE `id` = '".$id."'";

            $results =  $this->conn->query($sql);

            if ($results) {
                return $results;
            }else{
                return null;
            }    

        }

        public function onComplete($id){
            $sql = "UPDATE `orders` SET `status`= 1 WHERE `id` = '".$id."'";

            $results =  $this->conn->query($sql);

            if ($results) {
                return $results;
            }else{
                return null;
            }    
        }

            public function on_cancle($id){
            $sql = "UPDATE `orders` SET `status`= 3 WHERE `id` = '".$id."'";

            $results =  $this->conn->query($sql);

            if ($results) {
                return $results;
            }else{
                return null;
            }   


        }

        public function addAddressToCart($id,$address,$lat,$lng,$create_time,$last_update){

            $sql = "INSERT INTO `order_status` (`id`, `id_cart_status`, `address`, `lat`, `lng`, `created_time`, `last_updated`) 
            VALUES (NULL, '".$id."', '".$address."', '".$lat."', '".$lng."', '".$create_time."', '".$last_update."')";


             $results =  $this->conn->query($sql);

            if ($results) {
                return $results;
            }else{
                return null;
            }  
        }

       



        public function  load_order_status($id){

            $sql = "SELECT * FROM `order_status` WHERE id_cart_status  = '".$id."'";
            
            $results =  $this->conn->query($sql);
            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }
        }

        public function getListCartUserOnPending($idUser){

        $sql = "SELECT * FROM `orders` WHERE `id` = '".$idUser."' AND `status` = 2";

       
        $results =  $this->conn->query($sql);

            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }
        }

        public function getLastLatLngCartPending($idCart){

        $sql = "SELECT * FROM `order_status` WHERE `id_cart_status` = '".$idCart."' ORDER BY ID DESC LIMIT 1 ";
    
        $results =  $this->conn->query($sql);

            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }
        }

        public function getdetailsShiper($id)
        {
            $sql = "SELECT * FROM `orders` INNER JOIN `shiper` ON `orders`.`idShiper` = shiper.id WHERE `orders`.`id` = '".$id."'";

            $results =  $this->conn->query($sql);

            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }


        }

	}

 ?>