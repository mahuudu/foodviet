
<?php
if (isset($_SESSION['ship'])) {
    ?>
    <script type="text/javascript">
        $(document).ready(function(){

            var isCart = 1;
        
            var refreshId = setInterval(function(){

            $.ajax({
                url : "?action=prepareGetCart",
                method : "POST",
                data :
                {
                    isCart    : isCart,
                },
                success: function(data){
                
                   if (data == "have") {
                    toastr.options.closeButton = true;

                    toastr.success('Shiper ơi, có đơn hàng mới nè');
                    toastr.options.onclick = function() { 
                        window.location.replace("http://localhost:8080/foodviet/?action=detailAcountShip"); 
                    } 
                        
                   }else{
                        console.log("not");
                   }
                } 
            });

        }, 10000);

})


    </script>

    <?php } ?>