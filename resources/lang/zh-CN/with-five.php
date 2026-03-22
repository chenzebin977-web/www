<?php
return [
    'labels' => [
        'WithFive' => '提现新增五',
        'financial-management' => '财务管理',
        'with-five' => '提现新增五',
    ],
    'fields' => [
        'member_id' => '用户',
        'dwid' => '档位id',
        'title' => '档位',
        'money' => '金额',
        'realname' => '姓名',
        'phone' => '手机号',
        'cardno' => '身份证号',
        'z_image' => '证件正面照',
        'f_image' => '证件反面照',
        'jn_money' => '缴纳手续费',
        'status' => '状态',
        'createtime' => '申请时间',
        'audittime' => '审核时间',
        'jn_time' => '缴纳时间',
        'adminid' => '审核人',
        'adminname' => '审核人',
        'is_inside' => '用户类型',
    ],
    'options' => [
        'status' => [
            0 => '待审核',
            1 => '审核通过',
            2 => '审核失败',
            3 => '已缴纳',
        ],
    ],
];
