<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>文件上传</title>
	<style type="text/css">
		.btn{position: relative;overflow: hidden;margin-right: 0px;display:inline-block;*display:inline;padding:5px 10px;font-size:12px;line-height:1.5;*line-height:1.5;color:#fff;text-align:center;vertical-align:middle;cursor:pointer;background-color:#79c447;border:1px solid #79c447;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;}
		.btn:hover{color: #fff; background-color:#47a447;border-color:#398439;}
		.btn input{position: absolute;top: 0; right: 0;margin: 0;border: solid transparent;opacity: 0;filter:alpha(opacity=0); cursor: pointer;}
		.uploadfiles .progress {position:relative; margin-left:100px; margin-top:-24px; width:200px;padding: 1px; border-radius:3px; display:none}
		.uploadfiles .bar{background-color: green;display: block;width: 0%;height: 20px;border-radius: 3px; }
		.uploadfiles .percent {position:absolute;height:20px;display:inline-block;top:2px;text-indent:1%;color:#fff}
	</style>
</head>
<body>
	<div id="main" class="uploadfiles">
		<div class="btn">
			<span><i class="fa fa-location-arrow"></i> 选择文件</span>
			<input class="fileupload" type="file" name="myfile[]" multiple="multipart">
		</div>
		<div class="progress">
			<span class="bar"></span>
			<span class="percent">0%</span>
		</div>
	</div>
	<script type="text/javascript" src="//cdn.bootcss.com/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript" src="//cdn.bootcss.com/jquery.form/3.50/jquery.form.js"></script>
	<script>
		$(function () {
			var htmls = "<form id='myupload' action='/Fileupload/uploadFile' method='post' enctype='multipart/form-data'></form>";
			$(".fileupload").wrap(htmls);
			$(".fileupload").change(function(){	
				var bar = $(this).parent().parent().siblings(".progress").children().first();
				var percent = $(this).parent().parent().siblings(".progress").children().last();
				var progress = $(this).parent().parent().siblings(".progress");
				var btn = $(this).parent().siblings().first();
				var myupload = $(this).parent("#myupload");

				myupload.ajaxSubmit({
					dataType:  'json',
					beforeSend: function() {
						progress.show();
						var percentVal = '0%';
						bar.width(percentVal);
						percent.html(percentVal);
						btn.html("<i class=\"fa fa-location-arrow\"></i> 正在上传");
					},
					uploadProgress: function(event, position, total, percentComplete) {
						var percentVal = percentComplete + '%';
						bar.width(percentVal);
						percent.html(percentVal);
					},
					success: function(data){
						var json = eval(data);
						if(json.isOk == 'error'){
							alert(json.message, {icon:5});
						}else{
							var img = json.message;
							progress.hide();
							btn.html("<i class=\"fa fa-location-arrow\"></i> 上传成功");
						}
					},
					error:function(xhr){
						btn.html("上传失败");
						bar.width('0');
						progress.hide();
						alert('上传失败，请稍后再试~', {icon:5});
					}
				});
			});
		});
	</script>
</body>
</html>