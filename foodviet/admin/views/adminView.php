<?php 
		class adminView{


			function loginAdmin(){
				require_once('templates/pages/loginAdmin.php');
			}

			function showAdmin(){
				require_once('templates/layout/homeAdmin.php');
			}
            function showChangePass(){
                    require_once('templates/pages/content/change-pass.php');
            }
            function throwChangePass($error){
                  require_once('templates/pages/content/change-pass.php');
              }
            function showDashBoard($countOrder,$countProduct,$countUser,$countNews,$countContact,$countCategory,$coutProducer, $arrayMoneyTotal,$investmentMoney){
                require_once ('templates/pages/dashboard/dashboard.php'); 
            }
			function throwShowAdmin($error){
			    require_once ('templates/pages/loginAdmin.php');
            }

            function showListAdminProduct($result){
            	require_once('templates/pages/product/listProductAdmin.php');
            }
            function showFormAddProductAdmin($result_category,$result_producer){
                   require_once ('templates/pages/product/addProductAdmin.php');
            }

            function showListCategoryAdmin($result){
			    require_once ('templates/pages/category-product/listCategoryProductAdmin.php');
            }
            function showListProducerADmin($result){
			    require_once ('templates/pages/producer/listProducerAdmin.php');
            }
            function showFormAddCategoryProductAdmin(){
			    require_once ('templates/pages/category-product/addCategoryProductAdmin.php');
            }
            function throwFormAddCategoryProductAdmin($error){
                require_once ('templates/pages/category-product/addCategoryProductAdmin.php');
            }
            function showFormEditCategoryProductAdmin($result){
			    require_once ('templates/pages/category-product/editCategoryProductAdmin.php');
            }
            function throwFormEditCategoryProductAdmin($error,$result){
                require_once ('templates/pages/category-product/editCategoryProductAdmin.php');
            }
            function showFormAddProducerAdmin(){
                    require_once ('templates/pages/producer/addProducerAdmin.php');
            }
            function throwFormAddProducerAdmin($error){
                require_once ('templates/pages/producer/addProducerAdmin.php');
            }
            function showFormEditProducertAdmin($result){
                require_once ('templates/pages/producer/editProducerAdmin.php');
            }
            function throwFormEditProducerAdmin($error,$result){
                require_once ('templates/pages/producer/editProducerAdmin.php');
            }
            function throwFormAddProductAdmin($error,$result_category,$result_producer){
                require_once ('templates/pages/product/addProductAdmin.php');
            }
            function showFormEditProductAdmin($result_product,$result_category,$result_producer){
			    require_once ('templates/pages/product/editProductAdmin.php');
            }
            function showListAdminOrder($error,$result){
                require_once ('templates/pages/order/listOrder.php');
            }
            function showListOrderDetail($arrayOrderdetail,$arrayOrder){
                 require_once ('templates/pages/order/listOrderDetail.php');
            }
            function showListOrderStatus($array,$arrayShipDetails){
                require_once ('templates/pages/order/showListOrderStatus.php');
            }
            function showListSlide($arrayVals){
                require_once ('templates/pages/slide/listslide.php');
            }
            function showFormAddSlide(){
                require_once ('templates/pages/slide/addSlide.php');
            }
            function throwFormAddSlide($error){
                require_once ('templates/pages/slide/addSlide.php');
            }
            function showFormEditSlide($result){
                 require_once ('templates/pages/slide/editSlide.php');
            }
            function showFormAddNews(){
                require_once ('templates/pages/news/addNews.php');
            }
            function showListNews($arrayVals){
                require_once ('templates/pages/news/listNews.php');
            }
            function showFormEditNews($result){
                require_once ('templates/pages/news/editNews.php');
            }
            function throwFormEditNews($error, $result){
                require_once ('templates/pages/news/editNews.php');
            }
            function showListUser($result){
                 require_once ('templates/pages/user/listUser.php');
            }
            function showEditUser($result){
                   require_once ('templates/pages/user/EditUser.php');
            }
            function throwFormEditUser($result,$error){
                require_once ('templates/pages/user/EditUser.php');
            }
            function showListContact($arrayVals){
                 require_once ('templates/pages/contact/listContact.php');
            }
            function showListContactDetail($array){
                 require_once ('templates/pages/contact/list-Contact-Details.php');
            }
            function showLogo($result){
                 require_once ('templates/pages/logo/logo.php');   
            }
            function showInfo($result){
                require_once ('templates/pages/info/info.php');   
            }
            function throwShowInfo($error,$result){
                 require_once ('templates/pages/info/info.php');   
            }
		}
 ?>