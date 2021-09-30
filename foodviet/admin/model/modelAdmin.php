    <?php 

	 require_once('../config/DbModel.php');

	class ModelAdmin extends DbModel{

	

		public function is_Admin($username,$password)
		{
			$sql = "SELECT * FROM `admin` WHERE username = '" .$username. "'  AND password = '".$password."'";
            $results =	$this->conn->query($sql);
            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }
		}
        function checkOldPassword($id,$old_password){
            $sql = "SELECT * FROM `admin` WHERE id = '" .$id. "' AND password = '" .$old_password. "'";
        
            $results =  $this->conn->query($sql);

            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }

        }
        function setNewPassword($id,$old_password,$new_password){
            $sql = "UPDATE `admin` SET `password` = '".$new_password."' WHERE (`id` = " . $id . " AND `password` = '" . $old_password . "')";
            $results =  $this->conn->query($sql);
            if ($results) {
                return $results;
            }else{
                return null;
            }
        }


		public function getListProductAdmin(){
		    $sql = "SELECT * FROM `category_product` , `producer`,`product`  WHERE category_product.cat_id = product.category_id and producer.id = product.producer_id ";
            $results =	$this->conn->query($sql);
            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }

        }

        public function getListCategoryadmin(){
            $sql = "SELECT * FROM `category_product`";
            $results =	$this->conn->query($sql);
            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }
        }

        public function getListProducerAdmin(){
            $sql = "SELECT * FROM `producer`";
            $results =	$this->conn->query($sql);
            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }
        }


        // public function CheckListCategoryadminByID($id){
        //     $sql = "SELECT * FROM `category_product`,`product` WHERE category_product.cat_id = product.category_id and cat_id = '".$id."'";
        //      $results = $this->conn->query($sql);
        //     if ($results->num_rows>0) {
        //         return $results;
        //     }else{
        //         return null;
        //     }
        // } 

        // public function CheckListProduceradminByID($id){
        //     $sql = "SELECT * FROM `producer`,`product` WHERE producer.id = product.producer_id and product.producer_id = '".$id."'";
        //     var_dump($sql);
        //     exit();
        //      $results = $this->conn->query($sql);
        //     if ($results->num_rows>0) {
        //         return $results;
        //     }else{
        //         return null;
        //     }
            
        // }
        //SELECT * FROM `category_product`,`product` WHERE category_product.cat_id = product.category_id and cat_id = 1//
        public function insertCategory($category_name,$new_file_name){
		    $sql ="INSERT INTO `category_product`(`cat_id`, `category_name`, `category_image`) VALUES (Null,'".$category_name."','".$new_file_name."')";
		    $results =	$this->conn->query($sql);
            if ($results) {
                return $results;
            }else{
                return null;
            }
        }

        public function CheckExistsCategory($id){
		    $sql = "SELECT * FROM `category_product` WHERE `cat_id` = $id";
            $results =	$this->conn->query($sql);
            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }
        }
        public function updateCategory($id,$category_name,$new_file_name){
		   $sql ="UPDATE `category_product` SET `category_name`= '".$category_name."', `category_image`='".$new_file_name."' WHERE cat_id = $id";

            $results =	$this->conn->query($sql);

            if ($results) {
                return $results;
            }else{
                return null;
            }
        }

         public function updateCategoryNoImg($id,$category_name){
           $sql ="UPDATE `category_product` SET `category_name`= '".$category_name."' WHERE cat_id = $id";

            $results =  $this->conn->query($sql);

            if ($results) {
                return $results;
            }else{
                return null;
            }
        }

        public function deleteCategory($id){
		    $sql = "DELETE FROM `category_product` WHERE cat_id = $id";
            $results =	$this->conn->query($sql);
            if ($results) {
                return $results;
            }else{
                return null;
            }
        }

        public function insertProducer($producer_name){
		    $sql = "INSERT INTO `producer`(`id`, `producer_name`) VALUES (null,'".$producer_name."')";
            $results =	$this->conn->query($sql);
            if ($results) {
                return $results;
            }else{
                return null;
            }
        }

        public function CheckExistsProducer($id){
            $sql = "SELECT * FROM `producer`  WHERE `id` = $id";
            $results =	$this->conn->query($sql);
            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }
        }

        public function updateProducer($id, $producer_name){
		    $sql ="UPDATE `producer` SET `producer_name`= '".$producer_name."' WHERE id = $id";

            $results =	$this->conn->query($sql);
            if ($results) {
                return $results;
            }else{
                return null;
            }
        }

        public function deleteProducer($id){
            $sql = "DELETE FROM `producer` WHERE id = $id";
            $results =	$this->conn->query($sql);
            if ($results) {
                return $results;
            }else{
                return null;
            }
        }

        public function insertProduct($product_name,$category_id,$producer_id,$describe,$des_short,$price,$discount,$total,$new_file_name){
		    $sql = "INSERT INTO product(id,name_product,category_id,producer_id,des,des_short,price,discount,total,image_link) 
            VALUES (null,'".$product_name."','".$category_id."','".$producer_id."','$describe','".$des_short."','".$price."','".$discount."',
            '".$total."','".$new_file_name."')";

		      $results =  $this->conn->query($sql);
            if ($results) {
                return $results;
            }else{
                return null;
            }
        }

        public function deleteProduct($id){
		    $sql = "DELETE FROM `product` WHERE id = $id";
           
            $results =  $this->conn->query($sql);
            if ($results) {
                return $results;
            }else{
                return null;
            }
        }

        public function getProductId($id){
		    $sql = "SELECT * FROM `product` WHERE id=$id";

            $results =	$this->conn->query($sql);
            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }

        }

       

     
        public function updateProduct($id,$product_name,$category_id,$producer_id,$investment_money,$describe,$des_short,$price,$discount,$total,$new_file_name){
		    $sql= "UPDATE `product` SET `name_product`='".$product_name."',`category_id`='".$category_id."',`producer_id`='".$producer_id."',
		    `des`='".$describe."',`des_short`='".$des_short."',`investment_money`='".$investment_money."',`price`='".$price."',`discount`='".$discount."',`total`='".$total."',`image_link`='".$new_file_name."' WHERE id = $id";

            $results =  $this->conn->query($sql);
            if ($results) {
                return $results;
            }else{
                return null;
            }
        }

         public function updateProductNoImg($id,$product_name,$category_id,$producer_id,$investment_money,$describe,$des_short,$price,$discount,$total){
            $sql= "UPDATE `product` SET `name_product`='".$product_name."',`category_id`='".$category_id."',`producer_id`='".$producer_id."',
            `des`='".$describe."',`des_short`='".$des_short."',`investment_money`='".$investment_money."',`price`='".$price."',`discount`='".$discount."',`total`='".$total."' WHERE id = $id";

            $results =  $this->conn->query($sql);
            if ($results) {
                return $results;
            }else{
                return null;
            }
        }

        public function getListOrder(){
            $sql = "SELECT * FROM `orders` ORDER BY id DESC";
            $results =  $this->conn->query($sql);
            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }
        }

        public function updateHandleCart($id,$status){
            $sql = "UPDATE `orders` SET `status`= $status WHERE id = $id";
            $results =  $this->conn->query($sql);
            if ($results) {
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

        public function getProductIdIn($product_id){
            $sql = "SELECT * FROM `order_detail` WHERE `order_id` IN (".$product_id.")";
            $results =  $this->conn->query($sql);
                if ($results->num_rows>0) {
                    return $results;
                }else{
                    return null;
                }
            }

            //SELECT * FROM `order_detail`,`product` WHERE order_detail.product_id = product.idate(format) and order_id = 34


        public function deleteOrder($id){
            $sql = "DELETE FROM `orders` WHERE id = $id";
             $results =  $this->conn->query($sql);
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

        public function insertSlide($new_file_name){

            $sql = "INSERT INTO slide(id,slide_link) VALUES (null,'".$new_file_name."')";

            $results =  $this->conn->query($sql);
            if ($results) {
                return $results;
            }else{
                return null;
            }
        }

        public function selectSlideId($id){
            $sql = "SELECT * FROM `slide` WHERE id = $id";

             $results =  $this->conn->query($sql);
            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }
        }

        public function updateSlide($new_file_name,$id){
            $sql= "UPDATE `slide` SET `slide_link` = '".$new_file_name."' WHERE id = '".$id."'";

            $results =  $this->conn->query($sql);
            if ($results) {
                return $results;
            }else{
                return null;
            }
        }

        public function deleteSlide($id){
             $sql = "DELETE FROM `slide` WHERE id = $id";
             $results =  $this->conn->query($sql);
            if ($results) {
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

        public function insertNews($title,$content,$new_file_name,$created_time,$last_updated){
            $sql = "INSERT INTO `news` (`id`, `title`, `content`, `image_link`, `created_at`, `last_updated`)
             VALUES (null,'".$title."','".$content."','".$new_file_name."','".$created_time."','".$last_updated."')";
            $results =  $this->conn->query($sql);
            if ($results) {
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

        public function updateNews($id,$title,$content,$new_file_name,$last_updated){

            $sql= "UPDATE `news` SET `title`='".$title."', `content`='".$content."', `image_link`='".$new_file_name."', `last_updated`='".$last_updated."' WHERE id = '".$id."'";
            
            $results =  $this->conn->query($sql);
            if ($results) {
                return $results;
            }else{
                return null;
            }
        }

        public function updateNewsNoImg($id,$title,$content,$last_updated){
            $sql= "UPDATE `news` SET `title`='".$title."', `content`='".$content."', `last_updated`='".$last_updated."'  WHERE id = '".$id."'";

            $results =  $this->conn->query($sql);
            if ($results) {
                return $results;
            }else{
                return null;
            }
        }

        public function deleteNews($id){
              $sql = "DELETE FROM `news` WHERE id = $id";
             $results =  $this->conn->query($sql);
            if ($results) {
                return $results;
            }else{
                return null;
            }
        }

        public function getListUser(){
            $sql = "SELECT * FROM `users`";
            $results =  $this->conn->query($sql);
            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }
        }
        public function getUserById($id){
            $sql = "SELECT * FROM `users` WHERE id = '".$id."'";
            $results =  $this->conn->query($sql);
            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }
        }

          public function checkUserExist($username,$email){
            $sql = "SELECT `Email`, `username` FROM `users` WHERE `username`='".$username."' OR `email`='".$email."'";

            $result =   $this->conn->query($sql);

            if($result->num_rows >= 1) {
                return $result;
            } else {
                // ....
                return null;
            }

        }

        public function updateUser($id,$password,$email,$phonenumber,$fullname){
            $sql = "UPDATE `users` SET `password`='".$password."',`fullname`='".$fullname."',`email`='".$email."',`phonenumber`='".$phonenumber."' WHERE id = '".$id."'";
               
             $result =   $this->conn->query($sql);   
            if ($results) {
                    return $results;
                }else{
                    return null;
                }

        }

        public function updateUserNoPass($id,$email,$phonenumber,$fullname){
             $sql = "UPDATE `users` SET `fullname`='".$fullname."',`email`='".$email."',`phonenumber`='".$phonenumber."' WHERE id = '".$id."'";
               
             $result =   $this->conn->query($sql);   
            if ($results) {
                    return $results;
                }else{
                    return null;
                }
        }

        public function deleteUserByid($id){
            $sql = "DELETE FROM `users` WHERE id = $id";
            $results =  $this->conn->query($sql);
            if ($results) {
                return $results;
            }else{
                return null;
            }
        }

        public function getlistContact(){
            $sql = "SELECT * FROM `contact`";
            $results =  $this->conn->query($sql);
            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }
        }
        public function getlistContactById($id){
            $sql = "SELECT * FROM `contact` WHERE id = $id";

            $results =  $this->conn->query($sql);
            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }
        }
        public function deleteContact($id){
            $sql = "DELETE FROM `contact` WHERE id = $id";
            $results =  $this->conn->query($sql);
            if ($results) {
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
        public function updateLogo($id,$image_link){
            $sql = "UPDATE `logo` SET `image_link` = '".$image_link."' WHERE id = $id ";
            $results =  $this->conn->query($sql);
            if ($results) {
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
        public function updateInfo($id,$content){
            $sql = "UPDATE `info` SET `content` = '".$content."' WHERE id = $id";
             $results =  $this->conn->query($sql);
            if ($results) {
                return $results;
            }else{
                return null;
            }
        }

        public function getMoneyByMonth($i){
            $sql = "SELECT total FROM orders WHERE month(created)='$i'  AND status = 1";

            $results =  $this->conn->query($sql);
            $data = array();
            if ($results) {
                 while ($row = mysqli_fetch_assoc($results)) {
                         $data[] = $row;
                 }
            }else{
                 $data[] = 0;
            }
            return $data;
        }
        public function getInvestmentMoney(){
            $sql = "SELECT investment_money FROM product";

            $results =  $this->conn->query($sql);
            if ($results->num_rows>0) {
                return $results;
            }else{
                return null;
            }
        }

        public function getListCartUser($idUser){

        $sql = "SELECT * FROM `orders`,`users` WHERE orders.id = users.id and orders = '".$idUser."'";

    
        $results =  $this->conn->query($sql);
            if ($results->num_rows>0) {
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