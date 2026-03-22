<?php
return [
    'labels' => [
        'Recharge' => '充值订单',
        'financial-management' => '财务管理',
        'recharge' => '充值订单',
    ],
    'fields' => [
        'member_id' => '会员',
        'order_sn' => '订单ID',
        'pay_sn' => '三方订单',
        'money' => '下单金额',
        'money_fee' => '手续费金额',
        'read_price' => '到账金额',
        'pay_money' => '到账金额',
        'type' => '支付类型',
        'status' => '状态',
        'create_time' => '创建时间',
        'pay_time' => '支付时间',
        'result' => '返回内容',
        'abnormal' => '异常',
        'admin_price' => '后台操作金额',
        'admin_msg' => '后台备注',
        'admin_id' => '操作管理员',
        'admin_name' => '操作管理员',
        'pay_image' => '付款截图',
        'pay_address' => '付款地址',
        'channel_id' => '支付通道ID',
        'channel_value' => '支付通道值',
        'bankcardno' => '银行卡号',
        'after_price' => '卡余额',
        'is_frist' => '是否首充',
        'qdname' => '支付通道',
        'channel_value' => '支付通道',
        'is_inside' => '用户类型',
        'share_id' => '上级用户',
        'member_info' => [
            'is_inside' => '用户类型',
            'share_id' => '上级用户',
        ]
    ],
    'options' => [
        'type' => [
            1 => '微信',
            2 => '支付宝',
            3 => '线上银联',
            4 => '银行卡',
            5 => '云闪付',
            6 => '快捷支付',
            9 => '专属充值',
        ],
        'type_color' => [
            1 => 'success',
            2 => 'primary',
            3 => 'warning',
            4 => 'pink',
            5 => 'indigo',
            6 => 'danger',
            9 => 'teal',
        ],
        'status' => [
            0 => '未支付',
            1 => '已下单',
            2 => '超时关闭',
            3 => '订单失败',
            4 => '订单成功',
            5 => '后台人工放款'
        ],
        'status_color' => [
            0 => 'warning',
            1 => 'pink',
            2 => 'indigo',
            3 => 'danger',
            4 => 'teal',
            5 => 'success',
        ],
        'abnormal' => [
            0 => '否',
            1 => '是'
        ]
    ],
];
