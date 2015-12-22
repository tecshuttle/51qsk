$('.rating').rating({
	min: '0',
	max: '5',
	step: '0.5',
	size: 'xs',
	glyphicon: false,
	defaultCaption: '{rating} 分',
	starCaptions: {
		0.5: '0.5分',
			1: '1分',
			1.5: '1.5分',
			2: '2分',
			2.5: '2.5分',
			3: '3分',
			3.5: '3.5分',
			4: '4分',
			4.5: '4.5分',
			5: '5分'
	},
	clearCaption: '未评分',
    clearButtonTitle: '重新评价',	
	hoverOnClear: false
});