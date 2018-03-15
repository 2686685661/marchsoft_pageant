<?php

// return [

// 	// The default gateway to use
// 	'default' => 'paypal',

// 	// Add in each gateway here
// 	'gateways' => [
// 		'paypal' => [
// 			'driver'  => 'PayPal_Express',
// 			'options' => [
// 				'solutionType'   => '',
// 				'landingPage'    => '',
// 				'headerImageUrl' => '',

// 			]
// 		]
// 	]

// ];


return [

    // 默认支付网关
    'default' => 'alipay',

    // 各个支付网关配置
    'gateways' => [
        'paypal' => [
            'driver' => 'PayPal_Express',
            'options' => [
                'solutionType' => '',
                'landingPage' => '',
                'headerImageUrl' => ''
            ]
        ],

        'alipay' => [
            'driver' => 'Alipay_Express',
            'options' => [
                'partner' => '2088521734409292',
                'key' => 'za5uhkj2d9rz1vaycdlkv69cw3en5up3',
                'sellerEmail' =>'your alipay account here',
                'returnUrl' => 'your returnUrl here',
				'notifyUrl' => 'your notifyUrl here',
				'seller_id' => '2088521734409292'
            ]
        ]
    ]

];