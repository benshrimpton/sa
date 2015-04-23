// @codekit-prepend "bootstrap.min.js"; 
// @codekit-prepend "royalslider/jquery.royalslider.min.js"; 
// @codekit-prepend "pjax-standalone.min.js"; 
// Royal slider for homepage

function goRoyalHomepage() {
	
    if ($('#homepage-gallery').length) {
    
    			$(this).remove();
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
		            	$('.header').attr('id',tone);
				});
				
       }//end if
  
} //end function







function pjaxComplete() {
	$('#loader').hide();
	goRoyalHomepage(); 
}

pjax.connect({
    'container': 'pjax-content',
    'beforeSend': function(e) {
        $('#loader').show();
    },
    'complete': function() {
        pjaxComplete();
    }
});
