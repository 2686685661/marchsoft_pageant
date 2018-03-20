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
            axios.get('/alipay/wxpay/', {
                _token:token
            })
            .then(function (response) {
                alert(response.data);
            })
            .catch(function (error) {
                console.log(error);
            });
        }
    </script>
</html>
