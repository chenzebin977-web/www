<?php
return [
    'labels' => [
        'Message' => '站内信',
        'user-management' => '用户管理',
        'message' => '站内信',
    ],
    'fields' => [
        'member_id' => '用户',
        'title' => '标题',
        'content' => '内容',
        'status' => '状态',
        'admin_id' => '发送人',
        'admin_name' => '发送人',
        'createtime' => '发送时间',
        'readtime' => '读取时间',
    ],
    'options' => [
        'status' => [
            0 => '未读',
            1 => '已读'
        ]
    ],
];
