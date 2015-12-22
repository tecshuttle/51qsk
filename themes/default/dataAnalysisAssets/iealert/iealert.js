/*
 * IE Alert! jQuery plugin
 * version 1
 * author: David Nemes http://nmsdvid.com
 * http://nmsdvid.com/iealert/
 */

(function($){
function initialize($obj, support, title, text){

		var panel = "<h4>"+ title +"</h4>"
				  + "<p> "+ text +"</p>"				  
				  + "<p>注意：XP环境下，IE的最高版本为IE8。&nbsp;&nbsp;在此建议您将系统升级至win7环境。</p>"				  
				  + "<p>以下浏览器列表均为官网网站，请放心下载并安装使用。</p>"
				  + "<p class='text-right'>推荐火狐浏览器</p>"
			      + "<div class='browser'>"
			      + "<ul>"
			      + "<li><a class='firefox' href='http://www.firefox.com.cn/' target='_blank'></a></li>"
			      + "<li><a class='opera' href='http://www.opera.com/zh-cn/computer/windows' target='_blank'></a></li>"	 
			      + "<li><a class='qihoo360' href='http://se.360.cn/' target='_blank'></a></li>"
			      + "<li><a class='sogou' href='http://ie.sogou.com/' target='_blank'></a></li>"			      
			      + "<li class='last'><a class='liebao' href='http://www.liebao.cn/' target='_blank'></a></li>"
			      + "<ul>"
			      + "</div>"; 

		var overlay = $("<div id='ie-alert-overlay' class='pngFix'></div>");
		var iepanel = $("<div id='ie-alert-panel' class='pngFix'>"+ panel +"</div>");

		var docHeight = $(document).height();

		overlay.css("height", docHeight + "px");
			     		
		if (support === "ie8") { 			// shows the alert msg in IE8, IE7, IE6
			
			if ($.browser.msie  && parseInt($.browser.version, 10) < 9) {
				
				$obj.prepend(iepanel);
				$obj.prepend(overlay);
				
			}

			if ($.browser.msie  && parseInt($.browser.version, 10) === 6) {

				
				$("#ie-alert-panel").css("background-position","-626px -116px");
				$obj.css("margin","0");
  
			}
						
		} else if (support === "ie7") { 	// shows the alert msg in IE7, IE6
			
			if ($.browser.msie  && parseInt($.browser.version, 10) < 8) {
				
				$obj.prepend(iepanel);
				$obj.prepend(overlay);
			}
			
			if ($.browser.msie  && parseInt($.browser.version, 10) === 6) {
				
				$("#ie-alert-panel").css("background-position","-626px -116px");
				$obj.css("margin","0");
  
			}
			
		} else if (support === "ie6") { 	// shows the alert msg only in IE6
			
			if ($.browser.msie  && parseInt($.browser.version, 10) < 7) {
				
				$obj.prepend(iepanel);
				$obj.prepend(overlay);
				
  				$("#ie-alert-panel").css("background-position","-626px -116px");
				$obj.css("margin","0");
				
			}
		}

}; //end initialize function


	$.fn.iealert = function(options){
		var defaults = { 
			support: "ie7",  // ie8 (ie6,ie7,ie8), ie7 (ie6,ie7), ie6 (ie6)
			title: "尊敬的IE浏览器用户，您的浏览器版本过低！", // title text
			text: "为了正常浏览我们的网站，我们建议您升级到IE的最新版本，或选择其他现代浏览器以便获得最好的浏览阅读体验。"
		};
				
		var option = $.extend(defaults, options);
		
			return this.each(function(){
				if ( $.browser.msie ) {
					var $this = $(this);  
					initialize($this, option.support, option.title, option.text);
				} //if ie	
			});		       
	
	};
})(jQuery);
