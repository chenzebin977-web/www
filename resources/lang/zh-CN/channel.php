<?php
return [
    'labels' => [
        'Channel' => '支付渠道配置',
        'financial-management' => '财务管理',
        'channel' => '支付渠道配置',
    ],
    'fields' => [
        'pay_type' => '支付类型',
        'qd_type' => '支付渠道',
        'keys' => '通道标识',
        'name' => '支付名称',
        'price_min' => '单笔支付最小金额',
        'price_max' => '单笔支付最大金额',
        'price_list' => '固定支付金额',
        'price_total' => '总支付金额上限',
        'bank' => '银行名称',
        'bankcardno' => '银行卡号',
        'bankname' => '持卡人',
        'bankcode' => '分行名称',
        'status' => '状态',
        'listorder' => '排序',
        'htorder' => '后台排序',
        'pay_price' => '已支付金额',
        'today_income' => '今日充值',
        'all_income' => '总充值',
        'createtime' => '添加时间',
    ],
    'options' => [
        'status' => [
            1 => '开启',
            0 => '关闭'
        ],
        'pay_type' => [
            1 => '微信',
            2 => '支付宝',
            3 => '线上银联',
            4 => '银行卡',
            5 => '云闪付',
            6 => '快捷支付',
             7 => '纷享生活',
        ],
        'pay_type_color' => [
            1 => 'success',
            2 => 'primary',
            3 => 'warning',
            4 => 'pink',
            5 => 'indigo',
            6 => 'danger',
        ],
    ],
];
