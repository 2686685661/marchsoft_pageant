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
        function updateOrder(id){
            var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            axios.post('/updateOrder', {
                id : id,
                _token:token
            })
            .then(function (response) {
                alert(response.data.result);
            })
            .catch(function (error) {
                alert(error);
            });        
        }
        function wxtest(){
            var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            axios.post('/wechat', {
                name: "dd",
                gifts: ["2"],
                _token:token
            })
            .then(function (response) {
                if(response.data.code==1){
                    callpay(response.data.result);
                }else{
                    alert(response.data.msg);
                }
            })
            .catch(function (error) {
                console.log(error);
            });        
        }
        function callpay(result)
        {
            if (typeof WeixinJSBridge == "undefined"){
                if( document.addEventListener ){
                    document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
                }else if (document.attachEvent){
                    document.attachEvent('WeixinJSBridgeReady', onBridgeReady); 
                    document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
                }
             }else{
                onBridgeReady(result);
             }
        }
        function onBridgeReady(result){    
            WeixinJSBridge.invoke(
                'getBrandWCPayRequest',{
                    "appId":result.appId,     //公众号名称，由商户传入     
                    "timeStamp":result.timeStamp,         //时间戳，自1970年以来的秒数     
                    "nonceStr":result.nonceStr, //随机串     
                    "package":result.package,     
                    "signType":"MD5",         //微信签名方式：     
                    "paySign":result.paySign //微信签名 
                }  ,
                function(res){   
                    if(res.err_msg == "get_brand_wcpay_request:ok" ) {
                        alert("感谢");
                        updateOrder(result.payId);
                    }     // 使用以上方式判断前端返回,微信团队郑重提示：res.err_msg将在用户支付成功后返回    ok，但并不保证它绝对可靠。 
                }
            ); 
        }
    </script>
</html>
