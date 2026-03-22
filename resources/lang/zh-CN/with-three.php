<?php
return [
    'labels' => [
        'WithThree' => '提现新增三',
        'financial-management' => '财务管理',
        'with-three' => '提现新增三',
    ],
    'fields' => [
        'member_id' => '用户',
        'house_id' => '房产信息',
        'realname' => '姓名',
        'phone' => '手机号',
        'cardno' => '身份证号',
        'address' => '地址',
        'zichan' => '资产',
        'status' => '状态',
        'createtime' => '申请时间',
        'jiaona_money' => '缴纳金额',
        'jiaona_time' => '缴纳时间',
        'shouxu_money' => '手续费金额',
        'shouxu_time' => '手续费时间',
        'with_price' => '提现金额',
        'with_ids' => '提现ID集合',
        'jujue_time' => '拒绝时间',
        'member_info' => [
            'is_inside' => '用户类型',
        ]
    ],
    'options' => [
        'status' => [
            0 => '未缴纳',
            -1 => '拒绝',
            1 => '已缴纳',
            2 => '已缴纳手续费',
        ],
    ],
];
