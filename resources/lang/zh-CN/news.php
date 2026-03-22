<?php
return [
    'labels' => [
        'News' => '新闻管理',
        'routine-management' => '常规管理',
        'news' => '新闻管理',
    ],
    'fields' => [
        'image' => '封面',
        'title' => '标题',
        'desc' => '描述',
        'content' => '内容',
        'is_content' => '是否有内容',
        'content_url' => '内容采集网址',
       
        'urlkey' => '内容key',
        'status' => '状态',
        'createtime' => '发布时间',
        'listorder' => '排序'
    ],
    'options' => [
        'status' => [
            0 => '下架',
            1 => '正常',
        ]
    ],
];
