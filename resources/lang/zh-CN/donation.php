<?php
return [
    'labels' => [
        'Donation' => '捐款列表',
        'donation-management' => '捐款管理',
        'donation' => '捐款列表',
    ],
    'fields' => [
        'cate_id' => '类目',
        'member_id' => '用户',
        'realname' => '捐款人',
        'phone' => '手机号',
        'price' => '捐款金额',
        'niming' => '是否匿名',
        'status' => '状态',
        'createtime' => '捐款时间',
        'member_info' => [
            'is_inside' => '用户类型'
        ],
    ],
    'options' => [
        'status' => [
            0 => '待审核',
            1 => '审核成功',
        ],
        'niming' => [
            1 => '是',
            2 => '否',
        ]
    ],
];
