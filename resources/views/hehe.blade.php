<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>
        <script src="{{ asset('js/axios.min.js') }}"></script>
    </head>
    <body>
        <button onClick="test();">支付宝</button>
        <button onClick="wxtest();">微信</button>
    </body>
    <script>
        function test(){
            var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            axios.post('/admin/gift/give', {
                name: "dd",
                gifts: ["2"],
                _token:token
            })
            .then(function (response) {
                var data = response.data;
                if(data.code == 0) {	
                    window.location.href = data.msg + '/' +data.result.id+'/'+data.result.totle;
                }else {
                    $(function(){
                        $.message({
                            message:data.msg,
                            type:'warning'
                        });
                    })
                    
                }
                
            })
            .catch(function (error) {
                console.log(error);
            });
        }
        function wxtest(){
            window.location.href = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx2fffc402a50e03a5&redirect_uri=http://jk.mrwangqi.com//wechat&response_type=code&scope=snsapi_base&state=STATE#wechat_redirect";
        }
        window.onload = function () {
            callpay();
        }
        function callpay()
        {
            if (typeof WeixinJSBridge == "undefined"){
                if( document.addEventListener ){
                    document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
                }else if (document.attachEvent){
                    document.attachEvent('WeixinJSBridgeReady', jsApiCall); 
                    document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
                }
            }else{
                jsApiCall();
            }
        }
        function jsApiCall()
        {
            alert("dasda");
            WeixinJSBridge.invoke(
                'getBrandWCPayRequest',
                { $result },
                function(res){
                    WeixinJSBridge.log(res.err_msg);
                    document.write(res);
                    alert(res);
                }
            );
        }
    </script>
</html>
