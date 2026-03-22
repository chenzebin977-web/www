<?php
return [
    'labels' => [
        'Subsidy' => '登记管理',
        'subsidy-management' => '国家政务补贴',
        'subsidy' => '登记管理',
    ],
    'fields' => [
        'member_id' => '用户',
        'category_id' => '分类',
        'real_name' => '姓名',
        'card_number' => '身份证号码',
        'location' => '居住所在地',
        'age' => '年龄',
        'phone' => '手机号码',
        'status' => '状态',
        'payment_amount' => '缴费金额',
        'createtime' => '登记时间',
        'payment_time' => '缴费时间',
        'review_time' => '审核时间',
        'reviewer_name' => '审核人',
        'remark' => '备注',
        'subsidy_period' => '补贴周期',
        'subsidy_amount' => '每月金额',
        'subsidy_wallet' => '补贴发放钱包',
        'issue_time' => '每月发放时间',
        'is_pension' => '是否开通养老金账户',
        'member_info' => [
            'is_pension' => '是否开通养老金账户',
        ]
    ],
    'options' => [
        'status' => [
            0 => '待缴纳',
            1 => '待审核',
            2 => '审核通过',
            3 => '审核拒绝'
        ],
        'is_pension' => [
           0 => '否',
           1 => '是'
        ],
    ],
];
