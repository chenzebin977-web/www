<?php
return [
    'labels' => [
        'Meeting' => '会议管理',
        'routine-management' => '常规管理',
        'meeting' => '会议管理',
    ],
    'fields' => [
        'title' => '标题',
        'url' => '参会链接',
        'image' => '奖品图片',
        'speaker' => '演讲人',
        'time' => '会议时间',
        'playback_url' => '回放链接地址',
        'participation_code' => '参会码',
        'code_expired' => '参会码过期时间',
        'min_reward_amount' => '最小奖励金额',
        'max_reward_amount' => '最大奖励金额',
        'reward_wallet' => '奖励钱包',
        'status' => '状态',
        'createtime' => '添加时间',
        'listorder' => '排序',
    ],
    'options' => [
        'status' => [
           0 => '会议中',
           1 => '已结束'
        ],
        'status_color' => [
            1 => 'warning',
            0 => 'success'
        ]
    ],
];
