$ = jQuery.noConflict();

$(document).ready(function() 
{
    "use strict";
	
	$(".wp-caption").attr("style", "");
	
	$('.instagram-slider, .dribbble-slider, .instagram-widget-slider, .dribbble-widget-slider').iosSlider({
		desktopClickDrag: true,
		snapToChildren: true,
		infiniteSlider: true,
		responsiveSlideContainer: true,
		onSliderLoaded: sliderResize,
		onSliderResize: sliderResize
	});
	
	function sliderResize (args)
	{
		$(args.currentSlideObject).height($(args.currentSlideObject).find("img").height());
		$(args.sliderContainerObject).height($(args.currentSlideObject).find("img").height());		
	}
	
	function zoneBars() 
	{
		// animate progress bars
		$(".zone-progress-bar-container").each(function () 
		{
			var bar = $(this).find(".zone-progress-bar-amount"),
			amount = $(this).data("barValue"),
			label = $(this).find(".zone-progress-bar-percentage"),
			delay = 1000;
			
			bar.css("width", "0px");
			
			bar.delay(delay).animate({"width": amount + "%"}, 2500, "easeOutExpo");	
						
			$({percentage: 0}).stop(true).delay(delay).animate({percentage: amount}, 
			{
		        duration : 2500,
		        easing: "easeOutExpo",
		        step: function () 
		        {
		           label.text(Math.round(this.percentage) + '%');
		        },
		        complete: function ()
		        {
		           label.text(Math.round(this.percentage) + '%');
		        }
		    })
					
		});
	}
	
	function zoneCounters()
	{
		$(".zone-counter").each(function () 
		{
			var amount = parseFloat( $(this).data("amount") ),
			label = $(this).find("span");
						
			$({number: 0}).stop(true).delay(2000).animate({number: amount}, 
			{
		        duration : 2000,
		        step: function () 
		        {
		           label.text(Math.round(this.number));
		        },
		        complete: function ()
		        {
		           label.text(Math.round(this.number));
		        }
		    })
		});
	}
	
	function zoneTestimonials()
	{
		$('.zone-testimonial-slider').slick({
			adaptiveHeight: true,
			autoplay: true
		});		
	}
	
	function zoneMainMenu ()
	{
		var header_template = $('header').clone(), 
		offset = $('header').outerHeight() + 25;

		header_template.addClass("zone-header-sticky");

		$("body").on({
		mouseenter: function () 
		{
			var menu_item = $(this).find("ul").eq(0);
			
			menu_item.css("display", "block");	
			menu_item.addClass("animated fadeIn");		
			menu_item.removeClass("fadeOut");	
		}, 
		mouseleave: function () 
		{
			var menu_item = $(this).find("ul").eq(0);

			menu_item.addClass("fadeOut");						
			menu_item.removeClass("fadeIn");						
			
			menu_item.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () 
			{
				if (!menu_item.hasClass("fadeIn")) menu_item.css("display", "none");					
			});	
		}}, 'nav ul li');
						
		//apply sticky functionality to menu
		$('header').waypoint(function(direction) 
		{			
			if(direction == "down")
			{
				//remove any previous sticky headers
				$("body").find("header.zone-header-sticky").remove();
				
				//add sticky header to dom
				$("body").append(header_template.outerHTML());
				$("body").find("header.zone-header-sticky").addClass("animated fadeInDown");
			} else 
			{
				$("body").find("header.zone-header-sticky").addClass("fadeOutUp");
			}
		},
		{
			offset: function () 
			{
				return -offset;
			}
		});
	}

	function zoneImageCarousels()
	{
		
	}
		
	function zoneImageGalleries()
	{
		$(".zone-gallery").magnificPopup({
			delegate: 'a',
			mainClass: 'my-mfp-zoom-in',
			gallery:{
		    	enabled: true,
		    	preload: [1,6]
		    },
		    removalDelay: 300
		});	
		
		$(".zone-gallery.masonry").each(function () 
		{
			if( $(this).hasClass("gutter") == true )
			{
				$(this).masonry({
				"gutter": ".gutter-sizer"
				});
				$(this).masonry('bindResize');
				$(window).resize();

			} else 
			{
				$(this).masonry();	
				$(this).masonry('bindResize');	
				$(window).resize();
			}
		});
		
		$('.zone-gallery').imagesLoaded(function () 
		{
			$(window).resize(function () 
			{
				$(".gallery-item").each(function () 
				{				
					$(this).find(".zone-overlay p").css(
					{
						"left": (($(this).parent().width() / 2) - ($(this).find(".zone-overlay p").width() / 2)) + "px",
						"top": (($(this).parent().height() / 2) - ($(this).find(".zone-overlay p").height() / 2)) + "px"
					});
				});			
			}).resize();
			
			$(".zone-gallery.masonry").each(function () 
			{
				if( $(this).hasClass("gutter") == true )
				{
					$(window).resize();
					$(this).masonry({
					"gutter": ".gutter-sizer"
					});
					$(this).masonry('bindResize');
					$(window).resize();

				} else 
				{
					$(this).masonry();	
					$(window).resize();
				}
			});
		});
		
	}
	
	function zoneFolio()
	{
		var iframe = document.getElementById("zone-portfolio-showreel-video");	
		var player = $f(iframe);

		$('#zone-portfolio-grid-container').imagesLoaded(function () 
		{
			$('#zone-portfolio-grid-container').isotope(
			{
			  itemSelector: '.item',
			  layoutMode: 'fitRows'
			});		
		});
		
		$('body').on( 'click', '#zone-portfolio-grid-filters li:not(.zone-folio-showreel) a', function() 
		{
			$("#zone-portfolio-grid-filters li a").removeClass("active");
			$(this).addClass("active");
			
			var filterValue = $(this).attr('data-filter');
			$('#zone-portfolio-grid-container').isotope({ filter: filterValue });
			
			return false;
		});
		
		$("body").on("click", ".zone-portfolio-showreel-close", function () 
		{
			$(".zone-portfolio-showreel").removeClass("animated zoomIn");
			$(".zone-portfolio-showreel").fadeOut(200, function () 
			{
				player.api("unload");			
			});
						
			return false;
		});
				
		$("body").on("click", ".zone-folio-showreel", function () 
		{
			$(".zone-portfolio-showreel").css("display", "block");
			$(".zone-portfolio-showreel").addClass("animated zoomIn");
			
			player.api("play");
			
			return false;
		});		
	}
	
	function zoneTopScroll()
	{
		var scroller = $("#top-scroller");
				
		$(window).on("scroll", function () 
		{
			var offset = $(this).scrollTop();
			
			if (offset > 300)
			{
				scroller.addClass("animated fadeInUp").removeClass("fadeOutDown");
				scroller.css("display", "block");
			} else 
			{
				scroller.addClass("animated fadeOutDown").removeClass("fadeInUp");
				if(scroller.css("opacity") == 0) scroller.css("display", "none");
			}		
		});
		
		$("body").on("click", "#top-scroller", function () 
		{
			$("body").stop().scrollTo( '0px', 800, {axis: 'y', easing: 'easeInOutExpo'} );			
			return false;
		});
	}
	
	function zoneDribbbleGalleries()
	{
		
	}
	
	function zoneBanners()
	{
		
	}
	
	function zoneTabs()
	{
		var icons = 
		{
			header: "fa fa-plus-square-o",
			activeHeader: "fa fa-minus-square-o"
		}
		
		$(".zone-accordion").accordion({
	      heightStyle: "content",
	      icons: icons
	    });
	}
	
	function zoneWooCommerce()
	{
		$("body").on({mouseenter: function () 
		{
			$(this).find("#woocommerce-mini-cart").css("display", "block");
			$(this).find("#woocommerce-mini-cart").addClass("animated fadeIn").removeClass("fadeOut");
		}, mouseleave: function () 
		{
			$(this).find("#woocommerce-mini-cart").addClass("fadeOut").removeClass("fadeIn");
			$(this).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () 
			{
				if (!$(this).find("#woocommerce-mini-cart").hasClass("fadeIn")) $(this).find("#woocommerce-mini-cart").css("display", "none");					
			});	
		}
		}, "#zone-mini-cart");
	}
	
	function zoneAjaxSearch()
	{
		$("body").on("click", "#zone-search-toggle", function () 
		{
			if($(this).attr("data-open") == "true")
			{
				$(this).attr("data-open", "false");	
				$(this).parent().find("#zone-search-results").fadeOut();			
			} else 
			{
				$(this).attr("data-open", "true");								
				$(this).parent().find("#zone-search-results").fadeIn();			
			}
			return false;
		});
	}
	
	function zoneSideArea()
	{
		$("body").on("click", "#zone-side-area a", function () 
		{
			if($(this).attr("data-open") == "true")
			{
				$("body").animate({"right": "0px"}, 600, "easeOutExpo");
				$("#zone-side-area-wrapper").animate({"right": -$("#zone-side-area-wrapper").outerWidth() + "px"}, 600, "easeOutExpo");
				$(this).find("i").removeClass("bt-times").addClass("bt-bars");
				$(this).attr("data-open", "false");			
			} else 
			{
				$("#zone-side-area-wrapper").animate({"right": "0px"}, 600, "easeOutExpo");
				$("body").animate({"right": $("#zone-side-area-wrapper").outerWidth() + "px"}, 600, "easeOutExpo");
				$(this).find("i").removeClass("bt-bars").addClass("bt-times");
				$(this).attr("data-open", "true");			
			}
			
			return false;
		});
	}
	
	$.zoneGalleries = function()
	{
		zoneImageGalleries();
	}
	
	$.zoneCarousels = function()
	{
		zoneImageCarousels();
	}
	
	$.zoneMenus = function()
	{
		zoneMainMenu();
		zoneSideArea();
	}
	
	$.zoneSliders = function() 
	{
		zoneTestimonials();
	}

	$.zoneElements = function()
	{
		zoneBars();
		zoneCounters();
	}
	
	$.zoneScrollers = function()
	{
		zoneTopScroll();
	}

	$.zoneDribbble = function()
	{
		zoneDribbbleGalleries();
	}
	
	$.zoneBanners = function()
	{
		zoneBanners();
	}
	
	$.zoneWooCommerce = function()
	{
		zoneWooCommerce();
	}

	$.zoneFolios = function()
	{
		zoneFolio();
	}

	$.zoneAjax = function()
	{
		zoneAjaxSearch();
	}
	
	$.zoneTabs = function()
	{
		zoneTabs();
	}

	new $.zoneGalleries();
	new $.zoneFolios();
	new $.zoneCarousels();
	new $.zoneBanners();
	new $.zoneMenus();
	new $.zoneDribbble();
	new $.zoneElements();	
	new $.zoneSliders();
	new $.zoneScrollers();
	new $.zoneWooCommerce();
	new $.zoneAjax();
	new $.zoneTabs();
        
});

/*!
 * OuterHTML v2.1.0
 *
 * http://www.darlesson.com/
 *
 * Copyright 2012, Darlesson Oliveira
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 *
 * @requires jQuery v1.4.0 or above
 *
 * Reporting bugs, comments or suggestions: http://darlesson.com/contact/
 * Documentation and other jQuery plug-ins: http://darlesson.com/jquery/
 * Donations are welcome: http://darlesson.com/donate/
 */
// Examples and documentation at: http://darlesson.com/jquery/outerhtml/
// jQuery outerHTML
(function(a){a.fn.extend({outerHTML:function(b){if(!this.length)return null;else if(b===undefined){var c=this.length?this[0]:this,d;if(c.outerHTML)d=c.outerHTML;else d=a(document.createElement("div")).append(a(c).clone()).html();if(typeof d==="string")d=a.trim(d);return d}else if(a.isFunction(b)){this.each(function(c){var d=a(this);d.outerHTML(b.call(this,c,d.outerHTML()))})}else{var e=a(this),f=[],g=a(b),h;for(var i=0;i<e.length;i++){h=g.clone(true);e.eq(i).replaceWith(h);for(var j=0;j<h.length;j++)f.push(h[j])}return f.length?a(f):null}}})})(jQuery);