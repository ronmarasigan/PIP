/*
 	Title: scrollToView()

	Group: jQuery Plugin

	Function:	scrollToView
		jQuery plug-in, Scrolls the elememt into view area of page.

	Parameters:

		"scrollTo"	- [OPTIONAL] Specify where do you want scroll position set to with respect of element
					  
					> Different values accepted by this parameter
					> number -		a valid posative number for scrolling the page to
					> "top" -		scroll to top of the element
					> "bottom" -	scroll to bottom of the element
					> "auto" -		[Default] automatically detect the element position in the window and scroll accordingly
					> none -		if nothing passed or some wrong value passed, will fallback to 'auto'


		"edge"		- [OPTIONAL] If scroll position needs to set beyond element boundaries, default value set to 5 pixel

	Example:			

		> $(".element").scrollToView({ 
		>	"scrollTo" : "auto", 
		>	"edge" : 20 
		> });

	Events:			
		
		"onScrolledToView"	- This event will be fired once element is scrolled into view. If no scroll happens, it won't be triggered

		> $("#element").bind( "onScrolledToView", function() {
		>	//Do something here when element scrolled into view 
		> });


	TODO:	
		- Support for within element scroll
		- Currently it works in vertical direction. Make code changes to support horizontal direction too.
		- Use this plug-in for scrolling page for in-page(self) links.

	*Note:* This plug-in accepts multiple elements(Ex: $(".element1, "element2")) but will be applied on the first element from the result
*/

(function($){
	$.fn.scrollToView = function( options ){

		if(this.length == 0) {
			return this;
		}

		var defaults = {
			'scrollTo'	:	'auto',
			'edge'		:	5,
			'easing'	: 300
		};

		var settings 		= $.extend( {}, defaults, options ),
			scrollTo		= settings.scrollTo,
			edge			= settings.edge,
			easing 			= settings.easing,
			win				= $(window),
			elm 			= $(this[0]),
			scrollToPos		= 0;
			
		scrollTo 	= scrollTo?scrollTo.toString().toLowerCase():"auto";
		edge		= isNaN( parseInt( edge ) ) ? defaults.edge : edge;
		easing 		= isNaN( parseInt( easing ) ) ? defaults.easing : easing;

		var winScrlPos = new function(){
			this.top	= win.scrollTop();
			this.bottom	= this.top + win.height();
		};

		var elmPos = new function(){
			this.top	= elm.offset().top;
			this.bottom	= this.top + elm.outerHeight(true);
		};

		var posVals = [elmPos.top, elmPos.bottom, winScrlPos.top, winScrlPos.bottom];

		var minScrlVal	= Math.min.apply(null , posVals);
		var maxScrlVal 	= Math.max.apply(null, posVals);

		if( (minScrlVal == winScrlPos.top && maxScrlVal == winScrlPos.bottom) || elm.is(':hidden') ) {
			this.trigger({
				type:"onScrolledToView"
			});
			//If element is within viewport dimensions or is hidden, DO NOTHING
			return this;
		}
		
		if( !isNaN( parseInt(scrollTo) ) ) {
			scrolToPos = parseInt(scrollTo) - edge;
		} else if(scrollTo == "top") {
			scrollToPos = elmPos.top - edge;
		} else if(scrollTo == "bottom") {
			scrollToPos = elmPos.bottom + edge;
		} else { //auto
			if( (minScrlVal == elmPos.top && maxScrlVal == elmPos.bottom) || maxScrlVal == winScrlPos.bottom ) {
				scrollToPos = elmPos.top - edge;
			} else if( maxScrlVal == elmPos.bottom ) {
				scrollToPos = elmPos.bottom - win.height() + edge;
			} 							
		}
		
		var that = this,
			isEventFired = false;
		$('html, body').animate({scrollTop:scrollToPos},easing,"swing",function(){
			if(!isEventFired) {
				that.trigger({
					type:"onScrolledToView"
				});
				isEventFired = true;
			}
		});

		return this;
	};
})(jQuery);

/*
Experimental code for TODO item 3:

$("A[href^='#']").each(function(){
    var curElm = $(this);
    curElm.unbind('click').bind('click', function(){
        console.log( "a[name='" + curElm.attr('href').split("#")[1] + "']" );
        $( "[name='" + curElm.attr('href').split("#")[1] + "']" ).scrollToView({'scrollTo':'top'});
        return false;
    });
});

*/
