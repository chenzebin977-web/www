<?php
return [
    'labels' => [
        'PayQd' => '渠道配置',
        'financial-management' => '财务管理',
        'pay-qd' => '渠道配置',
    ],
    'fields' => [
        'name' => '渠道名称',
        'app_id' => '商户ID',
        'app_key' => '秘钥',
        'app_url' => '支付地址',
        'status' => '状态',
        'createtime' => '添加时间',
    ],
    'options' => [
        'status' => [
            1 => '开启',
            0 => '关闭'
        ],
    ],
];
