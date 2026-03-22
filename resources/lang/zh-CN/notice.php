<?php
return [
    'labels' => [
        'Notice' => '公告管理',
        'routine-management' => '常规管理',
        'notice' => '公告管理',
    ],
    'fields' => [
        'images' => '图片',
        'name' => '标题',
        'content' => '内容',
        'listorder' => '排序',
         'status' => '是否发布',
        'is_popup' => '类型',
        'createtime' => '添加时间',
    ],
    'options' => [
        'is_popup' => [
            1 => '首页弹窗',
            2 => '首页滚动',
            3 => '普通公告',
            4 => '会议滚动',
        ],
          'status' => [
            0 => '下架',
            1 => '正常',
        ]
    ],
];
