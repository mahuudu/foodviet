    <div class="container">
     <div class="row">
        <?php foreach($array as $value)  { ?>
         <div class="col-lg-6 col-md-6">
            <label> Họ tên : </label>   <?php echo $value['name'] ?> 
         </div>
         <div class="col-lg-6 col-md-6">
           <label> Số điện thoại : </label>    <?php echo $value['phonenumber'] ?> 
         </div>
         <div class="col-lg-6 col-md-6">
            <label> Email :  </label>  <?php echo $value['email'] ?> 
         </div>
         <div class="col-lg-6 col-md-6">
            <label> Địa chỉ : </label>   <?php echo $value['address'] ?> 
         </div>
          <div class="col-lg-6 col-md-6">
            <label> Ngày gửi : </label>   <?php echo date("d-m-Y h:i:sa", $value['created_at']) ?>
         </div>
         <div class="col-lg-12 col-md-12 col-12 col-xl-12 col-sm-12">
             <label> Tiêu đề : </label> <?php echo $value['title'] ?>
         </div>
         <div class="col-lg-12 col-md-12 col-12 col-xl-12 col-sm-12 ">
             <label> Nội Dung : </label> 
             <?php echo htmlspecialchars($value['content'], ENT_QUOTES, 'UTF-8');
                 ?>
         </div>
        <?php } ?>
     </div>
   </div>
  