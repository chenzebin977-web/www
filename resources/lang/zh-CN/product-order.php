<?php
return [
    'labels' => [
        'ProductOrder' => '申购记录',
        'project-management' => '项目管理',
        'product-order' => '申购记录',
    ],
    'fields' => [
        'type' => '类型',
        'order_sn' => '订单号',
        'member_id' => '用户',
        'pro_cate_id' => '分类',
        'pro_name' => '名称',
        'pro_id' => '项目id',
        'pro_note' => '存款额度',
        'days' => '周期(天)',
        'price' => '申购金额',
        'sy_config' => '收益配置%',
        'sy_licai_rate' => '我的财产收益%',
        'sy_jintie_rate' => '国民保障金收益%',
        'sy_pro' => '我的财产',
        'sy_jintie' => '国民保障金',
        'sy_price' => '已发放收益-无用',
        'status' => '状态',
        'status_sf' => '释放状态',
        'pay_type' => '支付类型',
        'createtime' => '申请时间',
        'endtime' => '结束时间',
        'successtime' => '完成时间',
        'lastsy_time' => '收益最后发放时间',
        'lastyue_time' => '月收益最后发放时间',
        'lastsf_time' => '释放最后执行时间',
        'config_sy' => '收益',
        'member_info' => [
            'is_inside' => '用户类型',
            'share_id' => '上级用户',
        ],
        'price_member_info' => [
            'recharge_leiji' => '充值金额',
        ]
    ],
    'options' => [
        'status' => [
            1 => '持仓中',
            2 => '已结束'
        ],
        'is_card' => [
            1 => '是',
            0 => '否'
        ],
    ],
];
