<?php
    class Postview{
        public function showIndex($posts,$slide,$news,$arrayproduct,$arrayproduct2){
            require_once('templates/layout/home.php');
        }

        public function showFormLogin(){
        	    require_once ('templates/pages/login.php');
        }
        public function showFormLoginShip(){
                require_once ('templates/pages/loginShip.php');
        }
        public function throwShowFormlogin($error){
            require_once ('templates/pages/login.php');
        }
        public function throwShowFormloginShip($error){
            require_once ('templates/pages/loginShip.php');
        }
        public function ShowFormRegister(){
            require_once ('templates/pages/register.php');
        }
        public function ShowFormRegisterShip(){
            require_once ('templates/pages/registerShip.php');
        }
        public function throwShowFormRegister($error){
            require_once ('templates/pages/register.php');
        }
        public function showNotice($notice){
            require_once ('templates/pages/notice.php');
        }
        public function showDetailAcount($result,$result2){
            require_once('templates/pages/acount.php');
        }
        public function showDetailAcountShip($result,$result2){
            require_once('templates/pages/acountShip.php');
        }

        public function showChangePass(){
            require_once('templates/pages/acount.php');
        }
        public function throwChangePass($error){
            require_once('templates/pages/acount.php');
        }
        public function throwChangePassShip($error){
            require_once('templates/pages/acountShip.php');
        }
        public function showSingleProduct($result,$side_bar){
            require_once('templates/pages/content/single-product.php');
        }

        public function showCategoryProduct($array,$item_per_page,$totalPages,$current_page,$orderby,$slide){
         require_once('templates/pages/content/category-product.php');   
        }
        public function ajaxShowCategoryProduct($array,$item_per_page,$totalPages,$current_page,$orderby){
         require_once('templates/pages/content/ajax-product.php');   
        }
        public function showCategoryProductNews($array,$item_per_page,$totalPages,$current_page){
            require_once('templates/pages/content/category-product-news.php');
        }
         public function ajaxShowCategoryProductNews($array,$item_per_page,$totalPages,$current_page,$orderby){
         require_once('templates/pages/content/ajax-product-news.php');   
        }
        public function showsideBar($result_side){
            require_once ('templates/pages/sidebar.php');
        }
        public function showListCart($arrayVals){
            require_once ('templates/pages/content/listCart.php');
        }
        public function showOrder(){
            require_once ('templates/pages/content/order.php');
        }
        public function showListCartNone($notice){
            require_once ('templates/pages/content/listCart.php');
        }
        public function showArchiveCategory($result){
             require_once ('templates/pages/news/category-news.php');
        }
        public function showSingleNews($result){
            require_once ('templates/pages/news/single-news.php');
        }
        public function showSearchProduct($array,$key){
            require_once ('templates/pages/content/search-product.php');
        }
        public function showListOrderDetail($arrayOrderdetail,$arrayOrder){
                 require_once ('templates/pages/content/listOrderDetail.php');
        }
        public function showListOrderDetailUser($arrayOrderdetail,$arrayOrder){
                 require_once ('templates/pages/content/listOrderDetailUser.php');
        }
         public function showListOrderStatus($array,$arrayShipDetails){
                 require_once ('templates/pages/content/showListOrderStatus.php');
        }
    }

?>