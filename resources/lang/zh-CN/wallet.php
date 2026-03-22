<?php
return [
    'labels' => [
        'Wallet' => '收款钱包',
        'user-management' => '用户管理',
        'wallet' => '收款钱包',
    ],
    'fields' => [
        'member_id' => '会员ID',
        'type' => '类型',
        'name' => '姓名',
        'cardno' => '银行卡号/支付宝账号',
        'bankname' => '银行名称',
        'bank' => '开户行',
        'userphone' => '手机号',
        'usercardno' => '身份证号',
        'image' => '收款码',
        'create_time' => '创建时间',
    ],
    'options' => [
        'type' => [
            1 => '微信',
            2 => '支付宝',
            3 => '银行卡'
        ],
        'type_color' => [
            1 => 'success',
            2 => 'primary',
            3 => 'pink',
        ],
    ],
];
