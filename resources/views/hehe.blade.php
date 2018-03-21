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
            var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            axios.post('/wechat', {
                name: "dd",
                gifts: ["2"],
                _token:token
            })
            .then(function (response) {
               callpay(response.data.result);
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
            alert(result.appId+result.timeStamp+result.nonceStr+result.package+result.paySign);
            WeixinJSBridge.invoke(
                'getBrandWCPayRequest',{
                    "appId":"wx2fffc402a50e03a5",     //公众号名称，由商户传入     
                    "timeStamp":"1395712655",         //时间戳，自1970年以来的秒数     
                    "nonceStr":"e61463f8efa94090b1f366cccfbbb434", //随机串     
                    "package":"prepay_id=u802345jgfjsdfgsdg888",     
                    "signType":"MD5",         //微信签名方式：     
                    "paySign":"70EA570631E4BB79628FBCA90534C63FF7FADD89" //微信签名 
                }  ,
                function(res){     
                    if(res.err_msg == "get_brand_wcpay_request:ok" ) {
                        
                    }     // 使用以上方式判断前端返回,微信团队郑重提示：res.err_msg将在用户支付成功后返回    ok，但并不保证它绝对可靠。 
                }
            ); 
        }
    </script>
</html>
