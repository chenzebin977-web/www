<?php
return [
    'labels' => [
        'QuestionRecord' => '问答记录',
        'user-management' => '用户管理',
        'question-record' => '问答记录',
    ],
    'fields' => [
        'member_id' => '用户',
        'question_id' => '问题',
        'date' => '日期',
        'answer' => '选择答案',
        'correct_answer' => '正确答案',
        'reward_amount' => '奖励金额',
        'reward_wallet' => '奖励钱包',
        'status' => '状态',
        'createtime' => '回答时间',
    ],
    'options' => [
        'status' => [
            0 => '回答错误',
            1 => '回答正确',
        ]
    ],
];
