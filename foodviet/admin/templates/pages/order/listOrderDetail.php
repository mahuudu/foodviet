     <div class="row">
        <?php foreach($arrayOrder as $value)  { ?>
         <div class="col-lg-3 col-md-3">
            <label> Họ tên : </label>   <?php echo $value['name'] ?> 
         </div>
         <div class="col-lg-3 col-md-3">
           <label> Số điện thoại : </label>    <?php echo $value['phone'] ?> 
         </div>
         <div class="col-lg-3 col-md-3">
            <label> Email :  </label>  <?php echo $value['email'] ?> 
         </div>
         <div class="col-lg-3 col-md-3">
            <label> Địa chỉ : </label>   <?php echo $value['address'] ?> 
         </div>
        </div>
        <div class="row">
             <div class="col-lg-12 col-md-12 col-12">
             <label> Ghi chú : </label> <?php echo $value['note'] ?>
         </div>
        </div>
                 <?php $priceShip = $value['priceShip']; ?>
        <?php } ?>
     </div>
    <table class="table table-striped" width="100%" border="1px">
        <thead>
        <tr>
            <th>STT</th>
            <th>Mã Đơn hàng</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Số tiền </th>
        </tr>
    </thead>

      <?php $stt=1; $total_price_cart = 0;  foreach($arrayOrderdetail as $value)  { ?>
                <tr>
                    <td><?= $stt++ ?></td>
                    <td> <?php echo $value['order_id'] ?></td>
                    <td> <?php echo $value['name_product'] ?></td>
                    <td> <?php echo $value['quantity'] ?></td>
                    <td>
                       <?php if ($value['discount'] > 0) { ?>
                                            <p class="discount_sg"><?php echo number_format($value['discount']); ?> VNĐ</p>

                                            <?php
                                        }else{?>
                                            <p class="sg_price"><?php echo number_format($value['price']); ?> VNĐ</p>
                                        <?php }?>
                    </td>
                     <td class="tongtien*dongia"> 
                           <?php if ($value['discount'] > 0) { ?>
                                            <p class="discount_sg"><?php echo number_format($value['discount']* $value['quantity']); ?> VNĐ</p>

                                            <?php
                                        }else{?>
                                            <p class="sg_price"><?php echo number_format($value['price']* $value['quantity']); ?> VNĐ</p>
                                        <?php }?>
                  
                            
                    </td>
                       <?php if ($value['discount'] > 0) {   
                                              $total_price_cart+=$value['discount']* $value['quantity'];       
                                  }else{ 
                                              $total_price_cart+=$value['price']* $value['quantity'];  
                         }?>   

                        
                         <?php $totalPricenew = $total_price_cart+$priceShip; ?>
                </tr>
               
     <?php 
         }
         $id = $value['order_id'];
     ?> 
 </table>
      <div class="footer-table">
            <ul class="list-group">
                <li class="list-group-item">Thanh toán</li>
                <li class="list-group-item">
                    <p class="total-price"> Ship :  <?php echo number_format($priceShip).' VNĐ'; ?>  </p>
                </li>
                <li class="list-group-item">
                    <p class="total-price"> Tổng : <?php echo number_format($totalPricenew).' VNĐ'; ?>  </p>
                </li>
                <li class="list-group-item">
                    <form class="form-group"  method="POST" action="?action=handleCart&id=<?php echo $id  ?>">
                        <select class="form-control" name="order_status" id="select-cart">
                            <option value="0"> Đang xử lý </option>
                            <option value="4"> Chuẩn bị hàng </option>
                            <option value="1"> Đã Hoàn thành </option>
                            <option value="2"> Đang giao </option>
                            <option value="3"> Đã hủy </option>
                        </select>
                        <input class="btn btn-success" type="submit" name="submit" value="Cập nhật">
                    </form>
                   
                </li>
            </ul>

        </div>
 