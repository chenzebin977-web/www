<?php
return [
    'labels' => [
        'HouseOrder' => '房产领取记录',
        'project-management' => '项目管理',
        'house-order' => '房产领取记录',
    ],
    'fields' => [
        'member_id' => '用户',
        'realname' => '姓名',
        'cardno' => '身份证号',
        'phone' => '手机号',
        'address' => '住址',
        'note' => '领取房产理由',
        'type' => '证件类型',
        'zm_image' => '证件正面照',
        'fm_image' => '证件反面照',
        'cl_type' => '材料证明类型',
        'cl_image' => '材料照',
        'status' => '状态',
        'createtime' => '申请时间',
        'audittime' => '审核时间',
        'auditnote' => '审核备注',
        'jn_time' => '缴纳时间',
        'jn_price' => '缴纳金额',
        'pro_id' => '购买产品',
        'pro_time' => '购买时间',
    ],
    'options' => [
        'status' => [
            0 => '待审核',
            1 => '审核通过',
            2 => '审核失败',
            3 => '缴费成功',
            4 => '购买成功',
        ],
        'status_color' => [
            0 => 'gray',
            1 => 'warning',
            2 => 'danger',
            3 => 'teal',
            4 => 'success',
        ],
        'type' => [
            1 => '身份证',
            2 => '护照'
        ],
        'cl_type' => [
            1 => '收入证明',
            2 => '贫困证明',
        ]
    ],
];
