<?php
return [
    'labels' => [
        'RealAuth' => '实名认证管理',
        'user-management' => '用户管理',
        'real-auth' => '实名认证管理',
    ],
    'fields' => [
        'member_id' => '用户',
        'sfzz_image' => '身份证正面',
        'sfzf_image' => '身份证反面',
        'realname' => '姓名',
        'cardno' => '身份证号',
        'country' => '国籍(地区)',
        'sex' => '性别',
        'start_date' => '身份证有效期开始时间',
        'end_date' => '身份证有效期结束时间',
        'phone_ex' => '区号',
        'phone' => '手机号',
        'status' => '状态',
        'create_time' => '申请时间',
        'audit_time' => '审核时间',
        'audit_note' => '审核备注',
        'adminid' => '审核人',
        'adminname' => '审核人',
    ],
    'options' => [
        'status' => [
            0 => '待审核',
            1 => '审核通过',
            2 => '审核失败',
        ]
    ],
];
