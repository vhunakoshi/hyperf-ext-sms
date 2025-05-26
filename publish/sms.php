<?php

declare(strict_types=1);
/**
 * This file is part of hyperf-ext/sms.
 *
 * @link     https://github.com/vhunakoshi/hyperf-ext-sms
 * @contact  eric@zhu.email
 * @license  https://github.com/vhunakoshi/hyperf-ext-sms/blob/master/LICENSE
 */
return [
    'timeout' => 5.0,

    'default' => [
        'strategy' => \Vhunakoshi\Sms\Strategies\OrderStrategy::class,
        'senders' => ['aliyun', 'tencent_cloud'],
    ],

    'senders' => [
        'aliyun' => [
            'driver' => \Vhunakoshi\Sms\Drivers\AliyunDriver::class,
            'config' => [
                'access_key_id' => '',
                'access_key_secret' => '',
                'sign_name' => '',
            ],
        ],

        'baidu_cloud' => [
            'driver' => \Vhunakoshi\Sms\Drivers\BaiduCloudDriver::class,
            'config' => [
                'ak' => '',
                'sk' => '',
                'invoke_id' => '',
                'domain' => '',
            ],
        ],

        'huawei_cloud' => [
            'driver' => \Vhunakoshi\Sms\Drivers\HuaweiCloudDriver::class,
            'config' => [
                'endpoint' => '',
                'app_key' => '',
                'app_secret' => '',
                'from' => [
                    'default' => '',
                    // 'another' => '',
                ],
            ],
        ],

        'juhe_data' => [
            'driver' => \Vhunakoshi\Sms\Drivers\JuheDataDriver::class,
            'config' => [
                'app_key' => '',
            ],
        ],

        'luosimao' => [
            'driver' => \Vhunakoshi\Sms\Drivers\LuosimaoDriver::class,
            'config' => [
                'api_key' => '',
            ],
        ],

        'qiniu' => [
            'driver' => \Vhunakoshi\Sms\Drivers\QiniuDriver::class,
            'config' => [
                'secret_key' => '',
                'access_key' => '',
            ],
        ],

        'rong_cloud' => [
            'driver' => \Vhunakoshi\Sms\Drivers\RongCloudDriver::class,
            'config' => [
                'app_key' => '',
                'app_secret' => '',
            ],
        ],

        'ronglian' => [
            'driver' => \Vhunakoshi\Sms\Drivers\RonglianDriver::class,
            'config' => [
                'app_id' => '',
                'account_sid' => '',
                'account_token' => '',
                'is_sub_account' => false,
            ],
        ],

        'send_cloud' => [
            'driver' => \Vhunakoshi\Sms\Drivers\SendCloudDriver::class,
            'config' => [
                'sms_user' => '',
                'sms_key' => '',
                'timestamp' => false,
            ],
        ],

        'sms_bao' => [
            'driver' => \Vhunakoshi\Sms\Drivers\SmsBaoDriver::class,
            'config' => [
                'user' => '',
                'password' => '',
            ],
        ],

        'tencent_cloud' => [
            'driver' => \Vhunakoshi\Sms\Drivers\TencentCloudDriver::class,
            'config' => [
                'sdk_app_id' => '',
                'secret_id' => '',
                'secret_key' => '',
                'sign' => null,
                'from' => [ // sender_id
                    'default' => '',
                    // 'another' => '',
                ],
            ],
        ],

        'twillo' => [
            'driver' => \Vhunakoshi\Sms\Drivers\TwilioDriver::class,
            'config' => [
                'account_sid' => '',
                'token' => '',
                'from' => [
                    'default' => '',
                    // 'another' => '',
                ],
            ],
        ],

        'ucloud' => [
            'driver' => \Vhunakoshi\Sms\Drivers\UCloudDriver::class,
            'config' => [
                'private_key' => '',
                'public_key' => '',
                'sig_content' => '',
                'project_id' => '',
            ],
        ],

        'yunpian' => [
            'driver' => \Vhunakoshi\Sms\Drivers\YunpianDriver::class,
            'config' => [
                'api_key' => '',
                'signature' => '',
            ],
        ],

        'yunxin' => [
            'driver' => \Vhunakoshi\Sms\Drivers\YunxinDriver::class,
            'config' => [
                'app_key' => '',
                'app_secret' => '',
                'code_length' => 4,
                'need_up' => false,
            ],
        ],

        'log' => [
            'driver' => \Vhunakoshi\Sms\Drivers\LogDriver::class,
            'config' => [
                'name' => 'sms.local',
                'group' => 'default',
            ],
        ],
    ],

    'default_mobile_number_region' => null,
];
