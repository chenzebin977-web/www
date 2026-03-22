<?php
return [
    'labels' => [
        'SignReward' => '扎金蛋记录',
        'user-management' => '用户管理',
        'sign-reward' => '扎金蛋记录',
    ],
    'fields' => [
        'member_id' => '用户',
        'pro_type' => '类型',
        'pro_id' => '奖品ID',
        'pro_name' => '奖品名称',
        'pro_image' => '奖品图片',
        'pro_price' => '奖品价格',
        'tips' => '提示语',
        'status' => '状态',
        'createtime' => '获得时间',
    ],
    'options' => [
        'pro_type' => [
            1 => '实物',
            2 => '数字人民币',
        ],
        'status' => [
            0 => '未中奖',
            1 => '已中奖'
        ]
    ],
];
