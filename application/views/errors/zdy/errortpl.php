<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8"/>
    <title>信息提示</title>
    <style type="text/css">
        .halt-body{
            display:block;position:absolute;top:0;
            left:50%;
            top: 50%;
            margin-left:-175px!important;
            margin-top:-70px!important;margin-top:0;position:fixed!important;
            position:absolute;
            _top:   expression(eval(document.compatMode &&
                    document.compatMode=='CSS1Compat') ?
                    documentElement.scrollTop + (document.documentElement.clientHeight-this.offsetHeight)/2 :/*IE6*/
                    document.body.scrollTop + (document.body.clientHeight - this.clientHeight)/2);/*IE5 IE5.5*/
        }
        .halt-box {margin:50px auto;width:350px;height:145px; border:1px solid #E1E1E1;font-size:12px;}
        .halt-box h2 {margin:0; padding:0; background:#F5F5F5; height:30px; line-height:30px; font-size:14px; font-weight:normal; padding-left:10px;}
        .halt-content {width:330px;margin:0 auto;}
        .halt-left {float:left;margin-top:35px; width:60px;height:60px;text-align:center;}
        .halt-left span {display:block;width:32px;height:32px;margin-left:10px;}
        .halt-right {float:right;width:260px;padding-top:10px;}
        .halt-ok {background: url("../images/ok.png") center no-repeat;}
        .halt-fail {background: url("../images/attention.png") center no-repeat;}
        .p-text {font-size:12px;color:#666666; line-height:20px;margin:0;padding:0;padding-top:10px;}
        .p-refresh {font-size:12px;color:#666666;line-height:20px;}
        .p-refresh a {color:#333333;}
    </style>
</head>
<body>
    <div class="halt-body halt-box">
        <h2>信息提示</h2>
        <div class="halt-content">
            <div class="halt-left">
                <span class="halt-fail"></span>
            </div>
            <div class="halt-right">
                <p class="p-text"><?php echo $message; ?></p>
                <p class="p-refresh">
                    【<a href="javascript:history.back();">点击返回上一页</a>】
                </p>
            </div>
            <div style="clear:both;"></div>
        </div>
    </div>
</body>
</html>