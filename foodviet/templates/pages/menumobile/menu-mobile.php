<div id="mobile-nav">
  <div class="head only-mobile" id="btn-back-menu">
        <i class="fa fa-arrow-left"></i>
        <span>Quay lại</span>
    </div>
    <div class="user only-mobile">
        <i class="fa fa-user-circle-o"></i>
        <div>   

                      <a href="?action=login" >Đăng nhập</a>

                      <a href="?action=register">Đăng ký</a>
               
        </div>
    </div>
  <div id="mobile-menu">    
    <?php
                         require_once ('templates/pages/sidebar.php');
       ?> 
  </div>
    <div style="display:none"  id="10">
                <div role="tabpanel">
                  <!-- Nav tabs -->
                  
                
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                      
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab">
                      
                    </div>
                  </div>
                </div>
                
            </div>
</div>
<script>
  jQuery(function($){ 
    
    $('.btn-menu').click(function(){
      $('#mobile-nav').toggleClass( 'opened' );
         $('#btn-back-menu').click(function(){
             $('#mobile-nav').removeClass( 'opened' );
         });
    });



    $('#mobile-menu ._menu li.menu-item-has-children').click(function(event){
      event.stopPropagation();
      $(this).find('> .sub-menu').slideToggle('fast');
    });
    $('#mobile-menu ._menu a').click(function(event){
      event.stopPropagation();
    });
  });
</script>