<?php
return [
    'labels' => [
        'WithNew' => '提现新增',
        'financial-management' => '财务管理',
        'with-new' => '提现新增',
    ],
    'fields' => [
        'member_id' => '用户',
        'first_sxf' => '审计费缴纳',
        'sxf' => '审计费',
        'first_time' => '审计费缴纳时间',
        'qm_image' => '签名图片',
        'is_qm' => '是否签名',
        'first_sxf_xy' => '保证金缴纳',
        'sxf_xy' => '保证金',
        'first_time_xy' => '保证金缴纳时间',
        'is_tx' => '已提现',
        'tx_time' => '提现时间',
        'createtime' => '添加时间',
        'is_inside' => '用户类型'
    ],
    'options' => [
        'first_sxf' => [
            0 => '未缴纳',
            1 => '已缴纳',
        ],
        'is_qm' => [
            0 => '否',
            1 => '是',
        ],
        'first_sxf_xy' => [
            0 => '未缴纳',
            1 => '已缴纳',
        ],
        'is_tx' => [
            0 => '否',
            1 => '是',
        ],
    ],
];
