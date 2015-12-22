//======================
//site.js Document
//======================

// 在文档载入完成后空链接替换为href="javascript:void(0)"
$(function() {
	$(document).find("a[href=#]").attr("href", "javascript:void(0)");
});

//jquery.placeholder.min.js
$(function() {
	$('input, textarea').placeholder();
});

//jquery.scrollUp.min.js
//返回顶端
$(function() {
	$.scrollUp({
		scrollName: "scrollUp",
		animation: "fade",
		scrollText: '<i class="fa fa-angle-up"></i>', //Default: 'Scroll to top'
	});
});

//jquery.matchHeight.min.js
//等高
$(function() {
	$('.match-height').each(function() {
		$(this).children('.match-item').matchHeight();
	});
});

//选项卡
$(function() {
	$('#myTab a:last').tab('show');
	//登录
	$('#loginRegTab a').click(function(e) {
		e.preventDefault()
		$(this).tab('show')
	})

});