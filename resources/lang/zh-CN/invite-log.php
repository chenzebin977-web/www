<?php
return [
    'labels' => [
        'InviteLog' => '邀请记录',
        'user-management' => '用户管理',
        'invite-log' => '邀请记录',
    ],
    'fields' => [
        'member_id' => '邀请人',
        'to_member_id' => '被邀请人',
        'money' => '奖励金额',
        'create_time' => '邀请时间',
        'is_active' => '是否激活',
        'is_active_time' => '激活时间',
        'recharge_leiji' => '充值金额',
        'team_total_count' => '三级总人数',
        'team_total_active_count' => '三级总激活',
        'total_count' => '伞下总人数',
        'total_active_count' => '伞下总激活',
        'pro_id' => '激活项目',
        'is_auth' => '是否实名',
        'team_size_id' => 'Id',
        'level' => '层级数',
    ],
    'options' => [
        'is_active' => [
            0 => '否',
            1 => '是'
        ],
        'is_auth' => [
            0 => '否',
            1 => '是'
        ],
        'level' => [
            1 => 'LV1',
            2 => 'LV2',
            3 => 'LV3'
        ]
    ],
];
