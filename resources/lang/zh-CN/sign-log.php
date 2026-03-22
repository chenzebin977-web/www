<?php
return [
    'labels' => [
        'SignLog' => '签到记录',
        'user-management' => '用户管理',
        'sign-log' => '签到记录',
    ],
    'fields' => [
        'member_id' => '用户',
        'reward' => '奖励金额',
        'money_type' => '奖励钱包',
        'reward_jintie' => '奖励幸福津贴',
        'reward_lxmy' => '连续签到奖励',
        'cj_nums' => '奖励抽奖次数',
        'is_buqian' => '是否补签',
        'createdate' => '签到日期',
        'createtime' => '签到时间',
        'last_lxcnt' => '连续签到奖励天数',
        'lx_reward' => '连续签到奖励信息',
        'sign_reward' => '用户签到奖励信息',
        'is_prize' => '是否中奖',
        'is_lx_reward' => '是否连续签到奖励',
        'is_admin' => '是否后台补签',
        'is_shipment' => '是否发货',
    ],
    'options' => [
        'is_buqian' => [
            0 => '否',
            1 => '是'
        ],
        'is_prize' => [
            0 => '未中奖',
            1 => '中奖'
        ],
        'is_lx_reward' => [
            0 => '否',
            1 => '是'
        ],
        'is_admin' => [
            0 => '否',
            1 => '是'
        ],
        'is_shipment' => [
            0 => '否',
            1 => '是'
        ]
    ],
];
