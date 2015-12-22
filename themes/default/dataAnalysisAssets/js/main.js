//main.js Document
//***********************************
//在文档载入完成后空连接替换为href="javascript:void(0)"
$(function() {
	$(document).find("a[href=#]").attr("href", "javascript:void(0)");
});

//jquery.scrollUp.min.js
//返回顶端
$(function() {
	$.scrollUp({
		scrollName: "scrollUp",
		topDistance: "300",
		topSpeed: 300,
		animation: "fade",
		animationInSpeed: 200,
		animationOutSpeed: 200,
		scrollText: '<i class="fa fa-angle-up"></i>', //Default: 'Scroll to top'
		activeOverlay: !1
	});
});

//jquery.circliful.min.js
$(function() {
	//学员活跃度
	$('#canvas-visit-student').circliful();
	//1-12月份
	$('#canvas-visit-1-student').circliful();
	$('#canvas-visit-2-student').circliful();
	$('#canvas-visit-3-student').circliful();
	$('#canvas-visit-4-student').circliful();
	$('#canvas-visit-5-student').circliful();
	$('#canvas-visit-6-student').circliful();
	$('#canvas-visit-7-student').circliful();
	$('#canvas-visit-8-student').circliful();
	$('#canvas-visit-9-student').circliful();
	$('#canvas-visit-10-student').circliful();
	$('#canvas-visit-11-student').circliful();
	$('#canvas-visit-12-student').circliful();
});