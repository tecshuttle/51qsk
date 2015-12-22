<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<!--[if IE 8]>
<script src="//cdn.bootcss.com/selectivizr/1.0.2/selectivizr-min.js"></script>
<![endif]-->
<script type="text/javascript" src="<?php echo $this->_baseUrl?>/static/js/uploadify/jquery.uploadify.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.bootcss.com/normalize/3.0.3/normalize.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo $this->_baseUrl?>/static/js/uploadify/uploadify.css">
<link rel="stylesheet" type="text/css" href="//cdn.bootcss.com/font-awesome/4.4.0/css/font-awesome.min.css">
<style>
body { background: #E7EDEF }
.clearfix:before,
.clearfix:after {
    content: "";
    display: table;
  }
.clearfix:after {clear: both;}
.list-unstyled{
    padding-left: 0;
    list-style: none;
}
.center-block{
	display: block;
	margin-left: auto;
	margin-right: auto;
}
.fileListWarp {
	margin: 0 0 0 -20px;
}
.fileListWarp li:not(:first-child):not(:nth-child(2)):not(:nth-child(3)) {
	margin-top: 10px;
}
.fileListWarp li:nth-child(even), .fileListWarp li:nth-child(2n+1) {
	margin-left: 20px;
}

.fileListWarp .icon-remove{
  display: inline-block;
	margin-top: 2px;
	color: #888;
	text-decoration: none;
	font-size: 14px;
}

.fileListWarp .icon-remove .fa{
	margin-right: 3px;
}

</style>

<form>
  <input id="uploadify" name="uploadify" type="file" multiple="true">
  <ul id="fileListWarp" class="clearfix list-unstyled fileListWarp">
  </ul>
  <div id="fileQueue" style="clear:both"></div>
</form>
<script type="text/javascript">

$(function() {
    $('#uploadify').uploadify({
        'buttonText': '选择文件..',
        'fileObjName': 'imgFile',
        'method': 'post',
        'multi': true,
		'queueID': 'fileQueue',
        /*'uploadLimit': 6,*/
        'fileTypeExts': '*.gif;*.png;*.jpg;*.bmp;',
        'buttonImage': "<?php echo $this->_baseUrl?>/static/js/uploadify/select.png",
        'formData': {
            'sessionId'   : '<?php echo session_id(); ?>',
			'timestamp'   : '<?php echo time();?>',
			'token'       : '<?php echo md5('unique_salt'.time()); ?>'
        },
        'swf': '<?php echo $this->_baseUrl?>/static/js/uploadify/uploadify.swf',
        'uploader': '<?php echo $this->createUrl('uploadify/basicExecute')?>',
        'onUploadStart': function(file) {
            $('#uploadify').uploadify('settings', 'formData', {
                'iswatermark': $("#iswatermark").attr("checked")
            });
        },
        'onUploadSuccess': function(file, data, response) {
            var json = $.parseJSON(data);
            if (json.state == 'success') {
                $("#fileListWarp").append('<li class="pull-left" id="image_' + json.fileId + '"><a class="center-block" href="<?php echo $this->_baseUrl?>/' + json.file + '" target="_blank"><img src="<?php echo $this->_baseUrl?>/'+json.file+'"  width="150" height="100" /></a><a class="icon-remove" href="javascript:uploadifyRemove(&quot;' + json.fileId + '&quot;,&quot;image_&quot;)"><i class="fa fa-trash-o"></i>删除</a></a><input name="imageList[fileId][]" type="hidden" value="'+json.fileId+'" /><input name="imageList[file][]" type="hidden" value="'+json.file+'"/></li>');
            } else {
                alert(json.message);
            }
        }
    });
});


</script>

<script type="text/javascript">
function uploadifyRemove(fileId,attrName){
	if(confirm('本操作不可恢复，确定继续？')){
		$.post("<?php echo $this->createUrl('uploadify/remove')?>",{imageId:fileId},function(res){
			$("#"+attrName+fileId).remove();
		},'json');
	}
}
</script>