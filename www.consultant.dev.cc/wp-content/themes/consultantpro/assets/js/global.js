;(function($, window, document, undefined) {
	"use strict";

	$('body').fitVids();

	/*============================*/
	/*     01 GLOBAL VARIABLES    */
	/*============================*/
	
	 var swipers = [], winW, winH, winScr, 
	 _isresponsive, smPoint = 768, mdPoint = 992, 
	 lgPoint = 1200, addPoint = 1600, 
	 _ismobile = navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i), 
 	heightAdminBar = ( $('body').hasClass('admin-bar') )? 32 : 0;


	 /*========================*/
	 /* 02 - PAGE CALCULATIONS */
	 /*========================*/
	 function pageCalculations(){
		winW = $(window).width();
		winH = $(window).height();
	 }
	    
	 
	 /*=================================*/
	 /* 03 - FUNCTION ON DOCUMENT READY */
	 /*=================================*/
	 pageCalculations();
	 
	 
	 /*============================*/
	 /* 04 - RUN FUNCTION ON LOAD  */
	 /*============================*/
	 
	 $(window).load(function(){ 
	    initSwiper();
	    topWrapper();
	    // menuHeight();
	    consultantMobileMenu();
	     
	    if($(".lx-preloader").length) {
			$(".lx-preloader").fadeOut();
	    }
	 }); 




	 /*============================*/
	 /* 04 -      MENU             */
	 /*============================*/

 	function topWrapper() {
 		$(".lx-main-wrapper").each(function() {
			if($(this).offset().top==0) {
				$(this).addClass('top-wrapper');
			}
		});
 	}
 	
 	// Active class
 	$(".lx-main-menu .menu-item .sub-menu").addClass('active');

 	// Mobile Menu
 	function consultantMobileMenu() {
		if($(window).width() < 992) {
			$(".lx-main-menu .menu-item.menu-item-has-children > a").on("click", function() {
				$(this).next().toggleClass('active');
				return false;
			});
		}	
 	}

 	$(".lx-main-menu .menu-item:not(.menu-item-has-children) > a[href^='#']").on("click", function() {
 		setTimeout(function() {
 			$(".lx-btn-menu").trigger('click');
 		},1000)
 	});

 	$(".lx-header .menu-icon").on("click", function() {
 		$(".lx-main-menu.slide_menu").addClass('active');
		$(".lx-header .menu-icon").addClass('no');
 	});

 	$(".slide_menu .close-icon").on("click", function() {
 		$(this).closest('.slide_menu').removeClass('active');
		$(".lx-header .menu-icon").removeClass('no');
 	});

 
	/*==============================*/
	/* 05 - FUNCTION ON PAGE RESIZE */
	/*==============================*/

 	var swipers = [], winW, winH, winScroll, _isresponsive, smPoint = 768, mdPoint = 992, lgPoint = 1200, addPoint = 1600;
	function initSwiper(){
		var initIterator = 0;
		$('.swiper-container').each(function(){
			var $t = $(this);

			var index = 'swiper-unique-id-'+initIterator;

			$t.addClass('swiper-'+index + ' initialized').attr('id', index);
			$t.find('.pagination').addClass('pagination-'+index);

			var autoPlayVar = parseInt($t.attr('data-autoplay'));
			var centerVar = parseInt($t.attr('data-center'));
			var simVar = ($t.closest('.circle-description-slide-box').length)?false:true;
			var slidesPerViewVar = $t.attr('data-slides-per-view');
			if(slidesPerViewVar == 'responsive'){
				slidesPerViewVar = updateSlidesPerView($t);
			}
			else slidesPerViewVar = parseInt(slidesPerViewVar,10);
			var loopVar = parseInt($t.attr('data-loop'));
			var speedVar = parseInt($t.attr('data-speed'));



			swipers['swiper-'+index] = new Swiper('.swiper-'+index,{
				speed: speedVar,
				pagination: '.pagination-'+index,
				loop: loopVar,
				paginationClickable: true,
				autoplay: autoPlayVar,
				slidesPerView: slidesPerViewVar,
				keyboardControl: true,
				calculateHeight: true,
				simulateTouch: simVar,
				centeredSlides: centerVar,
				onInit: function(swiper){
					if($t.attr('data-slides-per-view')=='responsive')   updateSlidesPerView($t);
					if($t.find('.swiper-slide').length>swiper.params.slidesPerView) $t.removeClass('hide-pagination');
					else $t.addClass('hide-pagination');
					changeTeamSlides();
					equalSlideHeight();
				},
				onSlideChangeStart: function(swiper){
					var activeIndex = (loopVar===true)?swiper.activeIndex:swiper.activeLoopIndex;
					changeTeamSlides();
					var imageSrc = swiper.container.querySelector('.swiper-slide-active').querySelector('img').getAttribute('src');
					if( imageSrc !== undefined || imageSrc !== null ){
						document.querySelector('.big-image').style.backgroundImage = "url('" + imageSrc + "')";
					}
				},
				onSlideClick: function(swiper){
					if($t.closest('.circle-slide-box').length) swiper.swipeTo(swiper.clickedSlideIndex);
				}
			});
			swipers['swiper-'+index].reInit();

			//swipers['swiper-'+index].resizeFix();
			if($t.find('.default-active').length) swipers['swiper-'+index].swipeTo($t.find('.swiper-slide').index($t.find('.default-active')), 0);


			if($t.attr('data-slides-per-view')=='responsive'){
				var countSlides = $t.find(".swiper-slide:not(.swiper-slide-duplicate)").length;
				setTimeout(function(){
					$(".swiper-pagination-switch:nth-child(n+"+(countSlides+1)+")").remove();
				}, 0);
			}

			initIterator++;
		});
	}


	function updateSlidesPerView(swiperContainer) {
		if (winW >= addPoint) return parseInt(swiperContainer.attr('data-add-slides'), 10);
		else if (winW >= lgPoint) return parseInt(swiperContainer.attr('data-lg-slides'), 10);
		else if (winW >= mdPoint) return parseInt(swiperContainer.attr('data-md-slides'), 10);
		else if (winW >= smPoint) return parseInt(swiperContainer.attr('data-sm-slides'), 10);
		else return parseInt(swiperContainer.attr('data-xs-slides'), 10);
	}
	//swiper arrows
	$('.swiper-arrow.left, .swiper-arrow-left').click(function(){
		swipers['swiper-'+$(this).closest('.swiper-container').attr('id')].swipePrev();
	});

	$('.swiper-arrow.right, .swiper-arrow-right').click(function(){
		swipers['swiper-'+$(this).closest('.swiper-container').attr('id')].swipeNext();
	});

	$('.testimonials-arrow.left').click(function(){
		swipers['swiper-'+$(this).closest('.testimonials-wrapper').find('.fx-testimonials-container .swiper-container').attr('id')].swipePrev();
	});

	$('.testimonials-arrow.right').click(function(){
		swipers['swiper-'+$(this).closest('.testimonials-wrapper').find('.fx-testimonials-container .swiper-container').attr('id')].swipeNext();
	});

	$('.testimonials-arrow-wrap .left').click(function(){
		swipers['swiper-'+$(this).closest('.block.type-15.style-classic').find('.swiper-container').attr('id')].swipePrev();
	});

	$('.testimonials-arrow-wrap .right').click(function(){
		swipers['swiper-'+$(this).closest('.block.type-15.style-classic').find('.swiper-container').attr('id')].swipeNext();
	});


	/***********************************/
	/* BACKGROUND*/
	/**********************************/

	//sets child image as a background
	$('.s-back-switch').each(function(){
        var $img = $(this).find('.s-img-switch');
        var $imgSrc =  $img.attr('src');
        var $imgDataHidden =  $img.data('s-hidden');
        if($imgSrc) {
        	$(this).css('background-image' , 'url(' + $imgSrc + ')');
        }
        if($imgDataHidden){
        	$img.css('visibility', 'hidden');
        }else{
        	$img.hide();
        }

    });

	
	/***********************************/
	/*IZOTOPE*/
	/**********************************/

	function isotopeBarbershop() {
		if ($('.izotope-container').length) { 
			$('.izotope-container').each(function(index, el) {
				var self = $(this)
				var $container = self;
	        	$container.isotope({
		            itemSelector: '.item',
		            layoutMode: 'masonry',
		        });
				$(this).closest(".lx-portfolio").find('#filters').on('click', '.but', function() {
					// alert(1);
				 	var izotope_container = self;

				 	for (var i = izotope_container.length - 1; i >= 0; i--) {
				 		$(izotope_container[i]).find('.item').removeClass('animated');
					}

					$('#filters .but').removeClass('activbut');
					$(this).addClass('activbut');
					var filterValue = $(this).attr('data-filter');
					$container.isotope({filter: filterValue});

					return false;
				});
			});
	    }
	}




	/***********************************/
	/*ERROR PAGE MIN-HEIGHT*/
	/**********************************/
	function error_page_min_height() {
		var minheight = $('.not-found-title').outerHeight() + 300;
		if($('.error-page').length){
			$('footer.lx-footer').hide();

		}
		if($('.error-page.style2').length){
			var height = $(window).height() - $('header.lx-header').outerHeight();
			$('.error-page.style2').css({'height' : height});
		}
		$('.error-page').css({'min-height' : minheight});
	}

	// $("body").addClass($("body").attr("data-style"));


	/***********************************/
	/*COUNTERS
	/**********************************/

	var counters = function() {
		$(".wpc-counter.animation .counter").not('.animated').each(function(){
			if($(window).scrollTop() >= $(this).offset().top-$(window).height()*0.7 ) {
				$(this).addClass('animated').countTo();
			}
		});
	}

	$(".wpc-counter .counter").each(function() {
		if($(this).attr('data-to')=='') {
			$(this).remove();
		}
	});

	$(".wpc-counter.staff .title").each(function() {
		if($(this).text().length>18) {
			$(this).closest('.wpc-counter').addClass('long');
		}
	});

	
	counters();


	/*--------------------------------------*/
    /*               OVERLAY                */
    /*--------------------------------------*/

    $(".enable_overlay").parent().css("position", "relative");



    /*--------------------------------------*/
    /*               ICONS                 */
    /*--------------------------------------*/

    $(".text-icon").each(function() {
    	if($(this).length) {
    		$(this).closest('.lx-text-icon').addClass('label-icon');
    	}
    });


    // add wrapper z-index
	$(".lx-img-bg.absolute").closest('.lx-main-wrapper').css("z-index", "999");


	/***********************************/
	/*RUN FUNCTIONS ON SCROLL
	/**********************************/

	$(window).on('scroll',function(){
	 	counters();
	});



	/***********************************/
	/*RUN FUNCTIONS ON LOAD
	/**********************************/
	
	$(window).on('load', function(){
		isotopeBarbershop();

		$('#loading').hide();



	});


	/***********************************/
	/*LIMIT SLIDES/
	/**********************************/


	
	$(".lx-clients").each(function() {
		$(this).find(".swiper-slide:nth-child(n+"+(1+Number($(this).attr("data-lg-slides")))+")").remove();
	});



	/***********************************/
	/*TOGGLE ACTIVE CLASSES MENU
	/**********************************/

	$(".current-menu-item").prev().addClass('current-menu-item-prev');

	$(".lx-main-menu .menu-item").on("click", function() {
		$('current-menu-item-prev').each(function() {
			$(this).removeClass('current-menu-item-prev');
		});
		$(this).prev().addClass('current-menu-item-prev');
	});



	function bodyOverlow() {
		if($(".lx-btn-menu").hasClass('active') && $(window).width() < 992){
			$('body').addClass('bodyOverflow');
		}else{
			$('body').removeClass('bodyOverflow');
		}
	}



	$(".lx-btn-menu").on("click", function() {
		$(".lx-main-menu").toggleClass('active');
		$(".lx-btn-menu").toggleClass('active');

		bodyOverlow();
	});



	// Image popups
	$('.lx-gallery, .lx-product-image, .product .consultant_images').magnificPopup({
	  delegate: 'a',
	  type: 'image',
	  removalDelay: 500, //delay removal by X to allow out-animation
	  gallery: { enabled:true },
	  callbacks: {
	    beforeOpen: function() {
	      // just a hack that adds mfp-anim class to markup 
	       this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
	       this.st.mainClass = this.st.el.attr('data-effect');
	    }
	  },
	  closeOnContentClick: true,
	  midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
	});


	// Hinge effect popup
	$('#glink').magnificPopup({
	  mainClass: 'mfp-with-fade',
	  removalDelay: 1000, //delay removal by X to allow out-animation
	  callbacks: {
	    beforeClose: function() {
	        this.content.addClass('hinge');
	    }, 
	    close: function() {
	        this.content.removeClass('hinge'); 
	    }
	  },
	  midClick: true
	});



	/***********************************/
	/*VIDEO
	/**********************************/


	function videoBg() {
		if($('.lx-video iframe').length) {	

			$('.lx-video').each(function() {
				var iframe = $(this).find("iframe"),
				src = iframe.attr("src"),
				controls = $(this).attr("data-controls"),
				start = $(this).attr('data-start'),
				autoplay = $(this).attr('data-autoplay');

				if(controls==0) {
					controls='&controls=0&rell=0&showinfo=0';
				} else {
					controls='';
				}
				iframe.attr("src", src+"?&autoplay="+autoplay+controls+'&start='+start);
				$(this).find('.play-video').on('click', function() {
					$(this).closest('.lx-video').find('iframe').attr("src", src+"?&autoplay=1"+controls+'&start='+start);
					$(this).parent().fadeOut();
				});

			});


	
		}
	}

	videoBg();



	/***********************************/
	/*TABS
	/**********************************/


	$('.lx-nav-tabs').on('click', 'li:not(.active)', function() {

	    var index_el = $(this).index();

	    $(this).addClass('active').siblings().removeClass('active');
	    var selector = $(this).closest('.lx-tabs').find('.tab-pane').removeClass('active').removeClass("in").eq(index_el);
    	selector.addClass('active');
    	setTimeout( function() {
    		selector.addClass('in');
    	},300);

	});


	/***********************************/
	/*ACCORDION
	/**********************************/

	var wpcRemoveClass = function( el, _class ){
	    if (el.classList)
	        el.classList.remove( _class ? _class : 'active' );
	    else
	        el.className = panel.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
	}
	$('.wpc-accordion').on('click', '.panel-title', function(){
	    
	        var panel_parent = this.parentNode,
	            panel_container = panel_parent.parentNode,
	            panels_wrap = panel_container.querySelectorAll('.panel-wrap');
	 
	        Array.prototype.forEach.call(panels_wrap, function(panel, i){
	            if(panel !== panel_parent) {
	               wpcRemoveClass(panel);
	            }
	        });

	        if ( -1 !== this.parentNode.className.indexOf( 'active' ) ) {
	            wpcRemoveClass(panel_parent);
	        } else {
	            panel_parent.className += ' active';
	            // setTimeout( function() {
	            // 	panel_parent.className += ' in';
	            // } ,300);
	        }
	        
	});

	




	
	/***********************************/
	/*RESPONISVE FONT
	/**********************************/



	var attrs=[];

	function attrsData() {
		var i=0;
		$('.consultant_heading .title.custom').each(function() {
			attrs.push($(this).attr('style'));			
			if(i<attrs.length) {
				i++;
			} else {
				i=0;
			}
			
		});
		
	}
	attrsData();


	function responsiveFont() {

		if($(window).width()<1199) {
			$('.consultant_heading .title.custom').removeAttr('style');

			
		} else {

			var i=0;
			$('.consultant_heading .title.custom').each(function() {
				$(this).attr('style', attrs[i]);
					if(i<attrs.length) {
					i++;
				} else {
					i=0;
				}
			});
			
		}
		
	}


	/***********************************/
	/* TEAM SLIDER
	/**********************************/



	function activeTeamSlider() {
		$('.lx-team-slider').each(function () {
			$(this).find('.big-image').css("background-image", "url("+ $(this).find('.swiper-slide.swiper-slide-active .img-team').attr("src")+")");
		});
	}


	function changeTeamSlides() {
		$(".lx-team-slider").each(function () {
			var team = $(this);
			team.find(".swiper-slide").on("click", function() {

				if($(this).hasClass('swiper-slide-active')) {
					return false;
				}

				$(this).closest('.lx-team-slider').find('.big-image').css('opacity', '0').css("background-image", $(this).find('.img-wrap').css("background-image")).css('opacity', '1');

				var numbSlide = Number($(this).index());
				$(this).closest(".lx-team-slider").find(".info-wrap").each(function() {
					$(this).removeClass('active');
				});

				team.find(".swiper-slide").each(function() {
					$(this).removeClass('swiper-slide-active');
				});

				$(this).addClass('swiper-slide-active');

				$(this).closest('.lx-team-slider').find('.info-wrap:nth-child('+(1+numbSlide)+')').addClass('active');
				swipers['swiper-'+$(this).closest('.swiper-container').attr('id')].swipeTo(numbSlide);
			});
		});
	}


	/***********************************/
	/*HOVER ICONS
	/**********************************/
	

	
	if($(".small-hover .icon img").length) {
		var bigSrc = $(".small-hover .big-circle-wrap .bg-wrap").css("background-image");
		$(".small-hover .lx-text-icon").on("mouseenter", function() {
			$(".small-hover .big-circle-wrap .bg-wrap").css("background-image", $(this).find(".icon").css("background-image"));
		});
		$(".small-hover .lx-text-icon").on("mouseleave", function() {
			$(".small-hover .big-circle-wrap .bg-wrap").css("background-image", bigSrc);
		});
	}


	/***********************************/
	/*ADD CLASS BLOG SHORTCODE PAGE
	/**********************************/


    if(window.location.href.indexOf("blog")!=-1) {
        $("body").addClass("blog");
    }



    /***********************************/
	/*ANIMATE ON CLICK LINK
	/**********************************/



	$(".lx-button[href^='#']").click(function() {
	    $('html, body').animate({
	        scrollTop: $($(this).attr('href')).offset().top
	    }, 2000);
	});



	/***********************************/
	/*SPACE LEFT
	/**********************************/



	function spaceLeftToContainer() {
    	if($(".left-space-container").length) {
    		if($(window).width() >= 1199) {
	    		$(".left-space-container").css({
		    		"margin-left" : ($(window).width() - $(".container").width()) / 2 - 10
		    	});
	    	} else {
	    		$(".left-space-container").css({
		    		"margin-left" : 0
		    	});
	    	}
	    }
    }

    spaceLeftToContainer();


    // equal height slides
    function equalSlideHeight() {
    	$(".t-customer .lx-testimonials").equalHeights();
    }
    

    //add class style calendar for body 
    if($(".lx-calendar").length) {
    	$("body").addClass("booked-"+$(".lx-calendar").attr("data-style"));
    }


    /***********************************/
	/*ONE SCROLL PAGE
	/**********************************/


	var scrollSelector = '.menu-item a', // selector menu link
		active_class = 'current-menu-item',
		time = 1000,
		contentTop = {},
		heightHeader = ( $('.lx-header').length )? $('.lx-header').outerHeight() + heightAdminBar : 0,
		contentOffset = heightHeader,
		currentAnchor = window.location.hash,
		scrollFlag = 0;
	// Fill object with scroll blocks data (offset and height)
	window.setContentTopObject = function() {
		contentTop = {};
		if(scrollSelector.length) {
			$(scrollSelector).each(function(){
				if (this.hash && $(this.hash).length) {
					$(this).attr('data-hash', this.hash);
					self = $( this.hash );
					var offset_top = self.offset().top;
					contentTop[this.hash] = {'top': Math.round(offset_top - contentOffset), 'bottom': Math.round(offset_top  - contentOffset + self.outerHeight() )};
				}
			});
		}
	}
	
	$(window).on('load', function(){
		setContentTopObject();
	});

	$(window).on('resize', function(){
		setContentTopObject();
		bodyOverlow();
		consultantMobileMenu();
	});

	// Animate scroll after clicking menu link
	if( $('body').hasClass('consultant-one-page') && $('body').hasClass('home') ) {
		$( scrollSelector ).on('click', function(e){
			//check dom element
			if ( !this.hash && !$(this.hash).length ) { 
				return true; 
			}
			setImmediateAnchor(this, time);
			e.preventDefault();
		});
	}
	

	function setImmediateAnchor(anchor, time){
		if( anchor && $(anchor.hash).length){
			scrollFlag = 1;
			var link_hash = anchor.hash;

			$('html, body').stop().animate({ 'scrollTop' : contentTop[link_hash].top }, time, function(){

				if(history.pushState) {
				    history.pushState(null, null, link_hash);
				}
				else {
				    location.hash = link_hash;
				}

				currentAnchor = link_hash;
				scrollFlag = 0;
				$(scrollSelector).parent().removeClass(active_class);
				$(scrollSelector+'[data-hash="' + currentAnchor + '"]').parent().addClass(active_class);
			});			

		} 
	}

	$(window).on('load', function(){
		if ( $(window).scrollTop() > 0 && location.hash ) {
			setImmediateAnchor(location,1000);
		};
	});

	//setImmediateAnchor($(scrollSelector+'[href="'+location.href.split('#')[0]+currentAnchor+'"]')[0], 1);
	
	function setScrollAnchor(){
		if(!scrollFlag){
			var scrollPositionTop = $(window).scrollTop();
			for(var p in contentTop){
				if(contentTop[p].top <= scrollPositionTop && contentTop[p].bottom > scrollPositionTop && currentAnchor != p){

					$(scrollSelector).parent().removeClass(active_class);
					if(history.pushState) {
					    history.pushState(null, null, p);
					}
					else {
					    location.hash = p;
					}
					$(scrollSelector).parent().removeClass(active_class);
					$(scrollSelector+'[data-hash="' + p + '"]').parent().addClass(active_class);
					currentAnchor = p;
					break;
				}
			}
		}
	}

	$('html, body').on('scroll mousedown DOMMouseScroll mousewheel keyup', function(e){
			if ( (e.which > 0 || e.type == 'mousedown' || e.type == 'mousewheel') && scrollFlag ){
				//console.log(e);
				$('html,body').stop();
				scrollFlag = 0;
				setScrollAnchor();
			} else {
				if (!scrollFlag) {
					scrollFlag = 0;
					setScrollAnchor();
				};
			}
	});

	function fixedMenu() {
       if ($(window).scrollTop() > 75) {
           $('.lx-header').addClass('fixed');
       } else {
           $('.lx-header').removeClass('fixed');
       }
    }
    

    /***********************************/
	/*ANIMATION ON SCROLL
	/**********************************/

	AOS.init({
		easing: 'ease-out-cubic',
		offset: 50

	});
    

	$(window).on('resize', function() {
		pageCalculations();
		initSwiper();
		responsiveFont();
		// menuHeight();
		spaceLeftToContainer();
		error_page_min_height();
		bodypadd();
	});


	$(window).on("load", function() {
		responsiveFont();
		activeTeamSlider();
		error_page_min_height();
		bodypadd();
		fixedMenu();
	});


	$(window).on('scroll', function() {
		fixedMenu();
	});


	function bodypadd() {
		if($('.empty-banner').length || $('.no-vc-content').length){
			var height = $('header.lx-header').outerHeight();
			$('body').css('padding-top', height + 50 );
		}
	}

	$( window ).on( "orientationchange", function(  ) {
		bodyOverlow();
	});


})(jQuery, window, document);