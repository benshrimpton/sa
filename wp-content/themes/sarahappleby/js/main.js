//add bkg image support
$.waitForImages.hasImgProperties = ['backgroundImage'];
function fadeBkgImg(){
  var imgWrap = $('.bio-img');
  if(imgWrap .length){
    imgWrap.waitForImages(function(){
      console.log("loaded");
      $(this).css({
        'opacity':'1'
      });
    });
  }
}

function clearEmptySpans() {
  $('span').each(function() {
    var $this = $(this);
    if($this.html().replace(/\s|&nbsp;/g, '').length == 0)
      $this.remove();
  });
}

function goOwl(){
  if ($("#owl-demo").length) {
    $("#owl-demo").owlCarousel({
        autoPlay: 3000, //Set AutoPlay to 3 seconds
        items : 8,
        navigation:true,
    });
  }
}
function resizeHomeSlide() {
  console.log("resizeHomeSlide")
  if ($('#homepage-gallery').length) {
    var theWidth = $('#homepage-gallery').width();
    var theHeight = theWidth / 2.4;
    $('#homepage-gallery').height(theHeight);
  } 
}
function resizeMainFolioAjax() {
  if ( $('#single-folio').length ) {
    console.log("resizeMainFolioAjax")
    var rsHeight = $(window).height() - 80;
    $('#single-folio').height(rsHeight);
    goRoyalFolio();
  }
}
function resizeMainFolioSolo() { 
  if ( $('#single-folio').length ) {
    console.log("resizeMainFolioSolo")
    var pageHeight = $(window).height();
    var headHeight = $('.main-header').height() + 0;
    var dif = pageHeight - headHeight;
    console.log(pageHeight,headHeight,dif)
    $('#single-folio').height(dif);
  } 
}




function goRoyalHomepage() {
  if ($('#homepage-gallery').length) {
    resizeHomeSlide();
  	var $royalSlider = $('#homepage-gallery');
    $royalSlider.royalSlider({
    	addActiveClass: true,
      imageScaleMode: 'fill',
      //autoScaleSlider: true,
      //slidesOrientation: 'vertical',
      controlNavigation: 'none',
      //imageScalePadding: 40,
      slidesSpacing: 0,
      navigateByClick: false,
      numImagesToPreload: 2,
      //arrowsNav: false,
      arrowsNavAutoHide: true,
      arrowsNavHideOnTouch: true,
      keyboardNavEnabled: true,
      fadeinLoadedSlide: true,
      globalCaption: false,
      globalCaptionInside: false,
      transitionSpeed: 300,
      sliderDrag: false,
      autoPlay: {
        // autoplay options go gere
        pauseOnHover: false,
        enabled: true,
        delay: 3000
        }
    });
    var slider = $royalSlider.data('royalSlider');
    slider.ev.on('rsAfterSlideChange', function(event) {
      console.log("rsAfterSlideChange")
    });
    slider.slides[0].holder.on('rsAfterContentSet', function() {
      console.log("rsAfterContentSet")
    });
 }//end if
} //end function



function goRoyalFolio() {
  var $royalSlider = $('#single-folio');
  $royalSlider.royalSlider({
    addActiveClass: true,
    //imageScaleMode: 'fill',
    //slidesOrientation: 'vertical',
    controlNavigation: 'none',
    //imageScalePadding: 40,
    slidesSpacing: 0,
    //navigateByClick: false,
    numImagesToPreload: 2,
    //arrowsNav: false,
    //arrowsNavAutoHide: true,
    arrowsNavHideOnTouch: true,
    keyboardNavEnabled: true,
    fadeinLoadedSlide: true,
    globalCaption: false,
    globalCaptionInside: false,
    transitionSpeed: 300,
    //sliderDrag: false,
    autoPlay: {
      // autoplay options go gere
      pauseOnHover: false,
      enabled: true,
      delay: 3000
      }
  });
} //end function

function goRoyalFolioAfterAjax() {
  //resizeMainFolioSolo();
  var $royalSlider = $('#single-folio');
  $royalSlider.royalSlider({
    addActiveClass: true,
    //imageScaleMode: 'fill',
    //slidesOrientation: 'vertical',
    controlNavigation: 'none',
    //imageScalePadding: 40,
    slidesSpacing: 0,
    //navigateByClick: false,
    numImagesToPreload: 2,
    //arrowsNav: false,
    //arrowsNavAutoHide: true,
    arrowsNavHideOnTouch: true,
    keyboardNavEnabled: true,
    fadeinLoadedSlide: true,
    globalCaption: false,
    globalCaptionInside: false,
    transitionSpeed: 300,
    //sliderDrag: false,
    autoPlay: {
      // autoplay options go gere
      pauseOnHover: false,
      enabled: true,
      delay: 3000
      }
  });
} //end function


function goMasonry(){
  var $container = $("#portfolio-grid");
  $container.imagesLoaded(function(){
    $container.masonry({
      columnWidth: '.folio-thumb',
      itemSelector: '.folio-thumb'
    });
  }); 
}
function goMasonryArticles(){
  var $container = $("#article-grid");
  $container.imagesLoaded(function(){
    $container.masonry({
      columnWidth: '.post-masonry-item',
      itemSelector: '.post-masonry-item'
    });
  }); 
}



//do all event handler here
$(document).on('click', '.toggle-search',function(e){
  e.preventDefault();
  $('.search-wrap').toggleClass('open');
  $('.search-wrap input[type="search"]').trigger('focus')
});

//Ajax loaded galleries
$(document).on('click', '.folio-thumb a',function(e){
  e.preventDefault();
  var newUrl = $(this).attr('href');
  $('#ajax-folio').fadeIn(200, function(){
    $('#ajax-folio .inner').load(newUrl+' #single-folio', function(){
      //resizeMainFolioSolo();
      //goRoyalFolio();
      resizeMainFolioAjax()
      $(this).addClass('loaded');
    });
  });
});

$(document).on('click', '.ajax-folio-closer',function(e){
  $('#ajax-folio').fadeOut(200, function(){
    $('#ajax-folio .inner').empty().removeClass('loaded');
  });
 });

$(window).on('resize', function(){
   resizeHomeSlide();
   resizeMainFolioSolo()
   resizeMainFolioAjax();
});

// PJAX COMPLETE

function pjaxComplete() {
  NProgress.done();
  goRoyalHomepage();
  goMasonry();
  goMasonryArticles();
  goOwl();
  goRoyalFolio();
  clearEmptySpans();
  fadeBkgImg();
}
pjax.connect({
  //'useClass' : 'pjax',
  'container': 'pjax-content',
  'beforeSend': function(e) {
    //$('#loader').show();
    NProgress.start();
  },
  'complete': function() {
    pjaxComplete();
    //$('#loader').hide();
     
  }
});
//$(document).on('pjax:start', function() { NProgress.start(); });
//$(document).on('pjax:end',   function() { NProgress.done();  });

//call it all on DOM ready
pjaxComplete(); 