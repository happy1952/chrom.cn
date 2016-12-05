<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="chrom">
    <meta name="description" content="chrom">
    <title>Chrom Admin</title>
    <link href="static/css/bootstrap.min.css" rel="stylesheet">
    <link href="static/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="static/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="static/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="static/css/style.css" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" id="LoginForm">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="username" autofocus datatype="s2-16" nullmsg="请输入用户名！" errormsg="请输正确的用户名！">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" datatype="*6-20" nullmsg="请输入用户密码！" errormsg="请输入用户密码！">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="1">Remember Me
                                    </label>
                                </div>
                                <a href="javascript:;" class="btn btn-lg btn-success btn-block" id="submitForm">Login</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="static/js/jquery.3.1.1.min.js"></script>
    <script src="static/js/bootstrap.min.js"></script>
    <script src="static/vendor/metisMenu/metisMenu.min.js"></script>
    <script src="static/js/sb-admin-2.js"></script>
    <script src="static/vendor/Validform/Validform_v5.3.2_min.js"></script>
    <script src="static/vendor/layer/layer.js"></script>
    <script src="static/js/test.js"></script>
</body>

</html>