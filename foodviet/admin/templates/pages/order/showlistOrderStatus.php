<div class="row">
 
    <?php if($arrayShipDetails){ ?>
        <?php foreach ($arrayShipDetails as $key => $value1): ?>
           <div class="col-md-6 col-6 col-xl-6">
              <p class="p-stt badge badge-info"> Người giao : <?php echo $value1['fullname'] ?></p>
            </div>
            <div class="col-md-6 col-6 col-xl-6">
                <p class="p-stt badge badge-info"> Số điện thoại : <?php echo $value1['phonenumber'] ?></p>
            </div>
        <?php endforeach ?>
    <?php }else{
        echo "";
    } ?>
 
</div>
<div class="row">
    <div class="col-md-12">
        <ul class="timeline">

      <?php if($array){ ?>
      <?php $stt=1; $total_price_cart = 0;  foreach($array as $value)  { ?>

                    <li>
                    <a href="#" class="time-sstt"><?php echo date("d-m-Y h:i:sa", $value['created_time'])  ?></a>
                    <p class="p-stt"><?php echo $value['address'] ?></p>
                </li>
              
        <?php   
          }
        ?>

        <?php   
          }else{
            echo "Chưa cập nhật";
          }
        ?>
        </ul>

 </div>
</div>