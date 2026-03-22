<?php
return [
    'labels' => [
        'WithFour' => '提现新增四',
        'financial-management' => '财务管理',
        'with-four' => '提现新增四',
    ],
    'fields' => [
        'member_id' => '用户',
        'qm_image' => '签名',
        'status' => '状态',
        'createtime' => '签署时间',
        'jn_price' => '缴纳金额',
        'jn_time' => '缴纳时间',
        'price' => '项目资产',
        'with_ids' => '提现ID集合',
        'member_info' => [
            'is_inside' => '用户类型',
        ]
    ],
    'options' => [
        'status' => [
            1 => '已签合同',
            2 => '已缴纳',
        ],
    ],
];
