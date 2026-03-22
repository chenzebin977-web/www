<?php
return [
    'labels' => [
        'ProductRevenue' => '收益记录',
        'project-management' => '项目管理',
        'product-revenue' => '收益记录',
    ],
    'fields' => [
        'order_id' => '订单ID',
        'order_sn' => '订单号',
        'member_id' => '用户',
        'type' => '类型',
        'money_type' => '资金类型',
        'price' => '收益金额',
        'createtime' => '发放时间',
    ],
    'options' => [
        'type' => [
            1 => '每日收益',
            2 => '周期收益',
            3 => '到期收益',
            4 => '每月收益',
            5 => '每周收益',
            6 => '3天收益',
            7 => '5天收益',
            8 => '7天收益',
            9 => '14天收益',
            10 => '25天收益'
        ],
        'type_color' => [
            1 => 'primary',
            2 => 'danger',
            3 => 'success',
            4 => 'warning',
            5 => 'secondary'
        ],
    ],
];
