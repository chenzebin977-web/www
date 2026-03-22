<?php
return [
    'labels' => [
        'Withdrawal' => '提现订单',
        'financial-management' => '财务管理',
        'withdrawal' => '提现订单',
    ],
    'fields' => [
        'member_id' => '会员',
        'order_sn' => '订单号',
        'money_type' => '资金类型',
        'wallet_id' => '钱包id',
        'wallet_data' => '钱包详情',
        'price' => '申请提现金额',
        'receipt_peice' => '实际到账金额',
        'pay_type' => '支付类型',
        'create_time' => '申请时间',
        'create_at' => '提交时间',
        'complete_time' => '订单完成时间',
        'status' => '状态',
        'examine_id' => '审核人员',
        'examine_name' => '审核人员姓名',
        'ip' => 'IP',
        'msg' => '拒绝原因',
        'pay_sn' => '订单号',
        'result' => '支付返回内容',
        'is_auto_success' => '自动审核',
        'auto_success_time' => '自动审核时间',
        'name' => '姓名',
        'cardno' => '银行卡号/支付宝账号',
        'bankname' => '开户行',
        'member_info' => [
            'sign_lxcnt' => '连续签到天数',
            'share_id' => '上级用户',
            'is_inside' => '用户类型',
            'team_biaoji' => '团队标记',
        ],
        'review_status' => '状态',
        'review_msg' => '备注',
    ],
    'options' => [
        'pay_type' => [
            1 => '微信',
            2 => '支付宝',
            3 => '银行卡',
        ],
        'pay_type_color' => [
            1 => 'success',
            2 => 'primary',
            3 => 'warning',
        ],
        'status' => [
            0 => '未处理',
            1 => '已下单',
            2 => '超时关闭',
            3 => '订单失败',
            4 => '订单成功',
            9 => '审核通过(不放款)',
            10 => '拒绝'
        ],
        'status_color' => [
            0 => 'warning',
            1 => 'pink',
            2 => 'indigo',
            3 => 'danger',
            4 => 'teal',
            9 => 'success',
            10 => 'cyan'
        ],
        'review_status' => [
            9 => '审核通过(不放款)',
            4 => '审核通过人工放款',
            10 => '拒绝'
        ],
         'team_biaoji' => [
            1 => '显示',
            0 => '隐藏',
        ],
    ],
];
