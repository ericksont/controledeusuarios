function init_sidebar() {
	
    var a = function () {
        $RIGHT_COL.css("min-height", $(window).height());
        var	a = $BODY.outerHeight(), 
			b = $BODY.hasClass("footer_fixed") ? -10 : $FOOTER.height(), 
			c = $LEFT_COL.eq(1).height() + $SIDEBAR_FOOTER.height(), 
			d = a < c ? c : a;
			
        d -= $NAV_MENU.height() + b, 
		$RIGHT_COL.css("min-height", d)
    };

    $SIDEBAR_MENU.find("a").on("click", function (b) {
        var c = $(this).parent();
        c.is(".active") ? 
			(c.removeClass("active active-sm"), $("ul:first", c).slideUp(function () {a()})) : 
			(c.parent().is(".child_menu") ? 
				$BODY.is(".nav-sm") && ($SIDEBAR_MENU.find("li").removeClass("active active-sm"), 
				$SIDEBAR_MENU.find("li ul").slideUp()) : 
				($SIDEBAR_MENU.find("li").removeClass("active active-sm"), 
				$SIDEBAR_MENU.find("li ul").slideUp()), 
				c.addClass("active"), 
				$("ul:first", c).slideDown(
					function () { 
						a() 
					}
				)
			)
    }),
    $MENU_TOGGLE.on("click", function () { 
		$BODY.hasClass("nav-md") ? 
			($SIDEBAR_MENU.find("li.active ul").hide(), 
			$SIDEBAR_MENU.find("li.active").addClass("active-sm").removeClass("active")) : 
			($SIDEBAR_MENU.find("li.active-sm ul").show(), 
			$SIDEBAR_MENU.find("li.active-sm").addClass("active").removeClass("active-sm")), 
			$BODY.toggleClass("nav-md nav-sm"), 
			a() 
	}), 
	$SIDEBAR_MENU.find(
		'a[href="' + CURRENT_URL + '"]').parent("li").addClass("current-page"), 
		$SIDEBAR_MENU.find("a").filter(
			function () { 

                var session = CURRENT_URL.split("/")[3];
                
				if(this.href.split("/").length == 5)
					return this.href == SGC+session+'/'+CURRENT_URL.split("/")[4];
								
				var href = this.href.split("/")[3];
				
                return href == session; 
                
			}
		).parent("li").addClass("current-page").parents("ul").slideDown(
			function () { 
				a() 
			}
        ).parent().addClass("active");
        
		// recompute content when resizing
        $(window).smartresize(function(){  
            setContentHeight();
        });
    
        setContentHeight();
        
		// fixed sidebar
        if ($.fn.mCustomScrollbar) {
            $('.menu_fixed').mCustomScrollbar({
                autoHideScrollbar: true,
                theme: 'minimal',
                mouseWheel:{ preventDefault: true }
            });
        }
} 