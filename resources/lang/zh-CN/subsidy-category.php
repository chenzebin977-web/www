<?php
return [
    'labels' => [
        'SubsidyCategory' => '类目管理',
        'subsidy-management' => '国家政务补贴',
        'subsidy-category' => '类目管理',
    ],
    'fields' => [
        'name' => '名称',
        'status' => '状态',
         'toindex' => '是否跳转个人中心',
        'listorder' => '排序',
        'createtime' => '添加时间',
        'registration_fee' => '登记费用',
        'subsidy_period' => '补贴周期',
        'subsidy_amount' => '每月金额',
        'policy_department' => '政策部门',
        'subsidy_wallet' => '补贴发放钱包',
        'issue_time' => '每月发放时间',
        'detail' => '发放明细',
        'subsidy_total_amount' => '补贴总额',
    ],
    'options' => [
        'status' => [
            0 => '下架',
            1 => '正常'
        ],
        'toindex' => [
            0 => '否',
            1 => '是'
        ]
    ],
];
