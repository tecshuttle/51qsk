//首页焦点图
$(function() {
	$(".site-slides").slidesjs({
		width: 1920,
		height: 498,
		navigation: {
			active: true,
			effect: "fade",
		},
		play: {
			auto: true,
			effect: "fade",
			interval: 5000,
			pauseOnHover: false,
			pauseOnHover: true,
			restartDelay: 3000,
		},
		pagination: {
			active: false,
		}
	});
});

//亚洲字符竖排版
//<![CDATA[
(new Taketori()).set({
	lang: 'zh-cn',
	fontFamily: 'Microsoft YaHei',
	togglable: true,
	multiColumnEnabled: false
}).element('p.vertical-rl').toVertical();
//]]>