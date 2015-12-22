function lessonJoin(btn, lessonId, userId, joinUrl) {
    console.log(btn, joinUrl);

    $.ajax({
        url: joinUrl,
        data: {
            lessonId: lessonId,
            userId: userId
        },
        type: "POST",
        dataType: "json",
        success: function (result) {
            if (result.success) {
				alert('付款成功！');
				console.log(result);
				window.location.href="?r=student/lesson/list";
            } else {
				alert(result.errMsg);
                console.log(result);
            }
        }
    });
}


//end file