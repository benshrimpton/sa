function goRoyalHomepage() {

if ($('#homepage-gallery').length) {
	var $royalSlider = $('#homepage-gallery');
  $royalSlider.royalSlider({
  	addActiveClass: true,
    imageScaleMode: 'fill',
    //slidesOrientation: 'vertical',
    //controlNavigation: 'none',
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
  	// triggers after slide change
  	var tone = $('.rsActiveSlide > .slide').data('tone');
  	console.log("changed", tone);
  	$('.header').attr('id',tone);
  });
  slider.slides[0].holder.on('rsAfterContentSet', function() {
    // fires when first slide content is loaded and added to DOM
    var tone = $('.rsActiveSlide > .slide').data('tone');
    console.log(tone);
    $('body').attr('id',tone);
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

  var slider = $royalSlider.data('royalSlider');
  slider.slides[0].holder.on('rsAfterContentSet', function() {
    $('#ajax-folio .inner').addClass('loaded');
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
      goRoyalFolio();
    });
  });
});

$(document).on('click', '.ajax-folio-closer',function(e){
  $('#ajax-folio').fadeOut(200, function(){
    $('#ajax-folio .inner').empty();
  });
 });



// PJAX COMPLETE

function pjaxComplete() {
  $('#loader').hide();
  goRoyalHomepage(); 
  goRoyalFolio();
  goMasonry();
}
pjax.connect({
  'useClass' : 'pjax',
  'container': 'pjax-content',
  'beforeSend': function(e) {
    $('#loader').show();
  },
  'complete': function() {
    pjaxComplete();
  }
});

//call it all on DOM ready
pjaxComplete(); 