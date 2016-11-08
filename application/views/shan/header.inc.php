<?php 
if(!defined('STATICPATH')){

	define('STATICPATH', (base_url() == '') ? '../' : trim(base_url(), '/').'/');
}
?>
<title>ChaoDong的个人网站</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="ChaoDong的个人网站" />
<meta name="keywords" content="ChaoDong的个人网站 PHP">
<meta name="HandheldFriendly" content="True" />

<link rel="stylesheet" type="text/css" href="<?php echo STATICPATH; ?>static/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo STATICPATH; ?>static/css/basic.css">
<link rel="stylesheet" href="http://cdn.bootcss.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://cdn.bootcss.com/highlight.js/9.0.0/styles/vs.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo STATICPATH; ?>static/css/screen.css" />
<script>
  var _hmt = _hmt || [];
</script>

</head>
<body class="home-template">
    <!-- start header -->
    <header class="main-header">
    <!-- style="background-image: url(<?php echo STATICPATH; ?>static/images/main-header.jpg)" -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 style="color: #FFF; font-size: 48px;">ChaoRoom</h1>
                    <h2 style="color: #FFF; font-size: 30px;">成功总是偏爱那些执着于梦想的人</h2>
                </div>
            </div>
        </div>
    </header>
    <!-- end header -->