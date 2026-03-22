<?php
return [
    'labels' => [
        'SignProduct' => '奖品管理',
        'routine-management' => '常规管理',
        'sign-product' => '奖品管理',
    ],
    'fields' => [
        'date' => '日期',
        'type' => '类型',
        'name' => '奖品名称',
        'image' => '奖品图片',
        'price' => '奖品价格',
        'wallet' => '奖品钱包',
        'rate' => '中奖率%',
        'tips' => '中奖提示语',
        'member_ids' => '指定中奖用户',
        'createtime' => '添加时间',
    ],
    'options' => [
        'type' => [
           1 => '实物',
           2 => '数字人民币'
        ],
        'type_color' => [
            1 => 'warning',
            2 => 'success'
        ]
    ],
];
