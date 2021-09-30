$( document).ready(function(){
/*	$('.slid').slick({
		dots: true,
		infinite: true,
		slidesToShow: 3,
    slidesToScroll: 1,
		autoplay: true,
    speed: 600,
		autoplayspeed: 500,
    nextArrow: '<button type="button" class="slick-next slick-nav"><i class="fa fa-angle-right"></i></button>',
    prevArrow: '<button type="button" class="slick-prev slick-nav"><i class="fa fa-angle-left"></i></button>',
	}); // slick*/

  $('.slick-product').slick({
    dots: false,
    infinite: true,
    slidesToShow: 4,
    autoplay: true,
    speed: 1000,
    slidesToScroll: 1,
    autoplaySpeed: 1000,
    nextArrow: '<button type="button" class="slick-next slick-nav"><i class="fa fa-angle-right"></i></button>',
    prevArrow: '<button type="button" class="slick-prev slick-nav"><i class="fa fa-angle-left"></i></button>',
    responsive: [
    {  breakpoint: 767,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      },
    }
    ],
  }); // slick
  $('.widget-product ul').slick({
    dots: false,
    speed: 1500,
    slidesToShow: 5,
    vertical: true,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    arrows: false,
    centerMode: false,
    variableWidth: false,

  });

var $st = $('.pagination');
var $slickEl = $('.center');

$slickEl.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
  var i = (currentSlide ? currentSlide : 0) + 1;
});

$slickEl.slick({
  centerMode: true,
  centerPadding: '10px',
  slidesToShow: 3,
  focusOnSelect: true,
  dots: false,
  infinite: true,
  responsive: [
      {
      breakpoint: 1200,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '310px',
        slidesToShow: 1
      }
    },
     {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    },
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ]
});

  
  $('.btn-bar i.show').click(function() {
    $('.list-category').css('left','0');
     $(this).hide();
      $('.btn-bar i.close,.over-category').show();
       $('.over-category').css('left','0');
  })
  $('.btn-bar i.close').click(function() {
    $('.list-category').css('left','-50%');
    $(this).hide();
      $('.btn-bar i.show').show();
      $('.over-category').css('left','-100%');
  })
  function scrollToTop() {
    var $window = $(window),
    $button = $('.scroll-to-top');
    $window.scroll(function() {
     $button[$window.scrollTop() > 100 ? 'removeClass' : 'addClass']('hidden');
   });
    $button.on('click', function(e) {
     e.preventDefault();
     $('body, html').animate({
      scrollTop: 0
    }, 500);
   });
  }

  function stickyHeader() {
    var stick=$( '.top-header').height() + $( '.content-header ').height();
    $(window).scroll(function(){
     if ( $(window).scrollTop() > stick ) {
      $( '.menu ').css({ 'top' : '0', 'position': 'fixed' });
    }else {
      $( '.menu ').css( 'position','unset' );
    }
  })
  }

 
  function ajax_search() {
    $('.page-search .pagination a').click(function(){
      $('.page-search .pagination a').removeClass('active-pag');
      $(this).addClass('active-pag');
      var url = $(this).attr('href');
      var pag = $(this).attr('stt');
      var txt_search = $('#txtsearch').val();
      var category = $('#category').val();
      $.get("tpl/ajax-search.php",{pag:pag,txt_search:txt_search,category:category},function(data){
        $(".product").html(data);
      })
      window.history.pushState({path:url},'',url);
      return false;
    })
  }
  function ajax_product_type() {
    $('.page-product-type .pagination a').click(function(){

      $('.page-product-type .pagination a').removeClass('active-pag');
      $(this).addClass('active-pag');
      var url = $(this).attr('href');
      var pag = $(this).attr('stt');
      var name_product_type= $('#name_product_type').val();
        var id= $('#id').val();
      $.get("tpl/ajax-product-type.php",{pag:pag,name_product_type:name_product_type,id:id},function(data){
        $(".product").html(data);
      })
      window.history.pushState({path:url},'',url);
      return false;
    })
  }
 function menuMobile() {
  $('.menu .container >i').click(function() {
    $('.mobile-menu ').slideToggle();
  })
 }
 function dropdown() {

    $( '.mobile-menu .sub-menu >i' ).on( 'click', function( e ) {
      $('.mobile-menu .sub-menu ul').slideToggle();
      e.preventDefault();
    } );
  }
$("#scanButton").click(function(){
    $("#change-pass").toggle();
  });


  dropdown();
  menuMobile();
  ajax_product_type();
  ajax_search();
  stickyHeader()
  scrollToTop();






})