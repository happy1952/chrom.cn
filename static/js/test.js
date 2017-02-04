$(function(){

    document.onkeydown=function(event){

        var e = event || window.event || arguments.callee.caller.arguments[0];

        if(e && e.keyCode==13){ 
            
            $("#submitForm").click();
            return false;
        }
    }; 

    var vform = $("#LoginForm").Validform({
        tiptype:3,
        showAllError:true,
    });

    $("#submitForm").click(function(){

        if(!vform.check()) return false;

        var fm      = $("#LoginForm")[0];
        var data    = new FormData(fm);
        $.ajax({
            type:"POST",
            url:"AmLogin.html",
            processData:false,
            contentType:false, 
            data:data,
            dataType:"json",
            success:function(data){
                var json = eval(data);
                if(json.isOk == 'error'){
                    layer.alert(json.message, {icon:5});
                }else{
                    layer.alert('登录成功！', {icon:6}, function(){
                        window.location.href="Amwelcome.html";
                    });
                }
            },
            error:function(){
                layer.alert('网络不稳定，请稍后再试！', {icon:5});
            }
        });
    });
});