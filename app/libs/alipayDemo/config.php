<?php

// namespace App\libs\alipayDemo\config;

$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2017012005273465",

		//商户私钥，您的原始格式RSA私钥
		'merchant_private_key' => "MIIEpAIBAAKCAQEArMGmVy+fmG2g2NJGMKKdF0Zpq/sdbTTcAL/PETVljeAaKFEqkfABGL4i9HEa9ErpAWiBUbIEezMwaNLng+chByFz7wcAdBLdG+Lp3os3HGaaGVmJF2Z5x6j0KWNxHjiLFRgKaPXCoZDDTGZrSw98XscG8ptiN1hMt6z7kEIEBVBWdTOLR49haIQmsRC2IXOtAOkJOyasP2129J8TORFlTwRRhqT97uTb/UUytwmCiekpSxRHEchJBGK5DkuCERW075O/qPKP4ldLu9GZG/zyHXsGacl9ujckqh5C83s0zdZCYy8rVHSZAMc52syFrl/jOpN41KLVPt+OhMcisfGEHQIDAQABAoIBABBpbTYHLjA66fbvMv/X0vitFcji2E7RoLzpe/B0lCtASPvfih3HITOKjKOQQzFGFJCvrull8gsKN+UddCURxg95XBwvHBnq2NqXWgRsUVX/YVBbMyzn7VXMdTWhXtOyJ3Rfjk2eW1kh+Yu+hx7gX75ZRg2yOUhsuQ0R/+waeWtPqI1dKKrWh0CVX4nVXYbYEf4RgRgX0uMUDgG1+QJTVk4FvokvK43lWloTo5r64Q7Vlz3jo8PoevniujJ0x/avactQOfq8VRIE9SHkZiNo1L2sZux9yLhsby+hdj59CDzX+QZ8muOjy/7Nr70mrdjuq2JbBoIl6sP4PtkE3r+Yd4ECgYEA2LEAcwGxbwHtPj6olYVbKHC6llTOcrPO/f1etEXUcIJXtNR0VO4/mmsl/kjNpye7K3UUwX9G+Nn4pwlP4kJCKbT59RFzJiz+Yqk1ikiDN9W+naCK3PiU+SR3pgcxnux0DQxA4a2cGkcz8y4tLoOII3l2SzYkFg5C1cAaRCiyso0CgYEAzBhWs53PYy65xV1mQyPiNTMxhqcmWX993M9JI/mOWACQIrPDv+cIbBwyNt9JwNVId+Us7hzQzH27O9QtRwPk4DsX404hbOawCHOqxuCs9FFkjpPtPzdY/wejk02vMvSzTFjBVJQ7cI5AB/noKQyPCiK2BN05OFPumFC8Ap5Ue9ECgYEAwTMPc3rO+Gp/XEABj06XODdKJT730sz+gPamuZSJFMch69iA4DiL/OILveyrb529A8If/2W7oaS2Tje/QbxRwV3afuZQBHmZVd4IHoMIe3/XtDKvnNUF/hzFkQJY+5lW30tNjel8hPF3IBrLre0YNIjXL7fV9NRCQtJEmQCwUwECgYBTOH1qAihFVhEz9BC1wdUEQlqogFG33q+QsQku3Rx4r8oWDFz+TBN4Gcsz6rplIdLJ6K34bdGKAJ6vF6ZatbDG6fGkowAoKqyO1bNGIukDOokZRiJQS55DZ3cAooWU7oiJ0gsLFOJj0+0yE2niCxfsVxkHRLmHSVoZy5nOK4dhcQKBgQCykj7QGN4W6LxaO0t4HpiFD2Hv8jZB0JiSORhdqfeYC9GTxBiBnZAU05yqE5as0EoTcLpqOrM0M6HG7guBNP7tAmbc0TbSXH2BMi4Oplvfki9oOSeRX2dH4eAEUOtQMI+ghJS7hm+AjmU5FmeCSgw4ZabNRIBXj10iWx152iYS+Q==",
		
		//异步通知地址
		'notify_url' => "http://localhost/laravel_pageant/app/libs/alipayDemo/notify_url.php",
		//http://工程公网访问地址/alipay.trade.wap.pay-PHP-UTF-8/notify_url.php

		//同步跳转
		'return_url' => "http://localhost/alipay/return",
		//http://mitsein.com/alipay.trade.wap.pay-PHP-UTF-8/return_url.php

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEArMGmVy+fmG2g2NJGMKKdF0Zpq/sdbTTcAL/PETVljeAaKFEqkfABGL4i9HEa9ErpAWiBUbIEezMwaNLng+chByFz7wcAdBLdG+Lp3os3HGaaGVmJF2Z5x6j0KWNxHjiLFRgKaPXCoZDDTGZrSw98XscG8ptiN1hMt6z7kEIEBVBWdTOLR49haIQmsRC2IXOtAOkJOyasP2129J8TORFlTwRRhqT97uTb/UUytwmCiekpSxRHEchJBGK5DkuCERW075O/qPKP4ldLu9GZG/zyHXsGacl9ujckqh5C83s0zdZCYy8rVHSZAMc52syFrl/jOpN41KLVPt+OhMcisfGEHQIDAQAB",
		
	
);