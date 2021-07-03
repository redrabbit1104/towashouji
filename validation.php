<?php

function validation($filter_value)
{   //$_POST 連想配列

    $messages = [];

    if (
        empty($filter_value['your_name']) ||
        16 < mb_strlen($filter_value['your_name'])   // 追記
    ) {
        $messages[] = '8文字以下の「氏名」を入力してください。'; //修正
    }

    if (!isset($filter_value['licence'])) {
        $messages[] = '「免許」のチェックは必須です。';
    }

    if (empty($filter_value['email']) || !filter_var($filter_value['email'], FILTER_VALIDATE_EMAIL)) {
        $messages[] = '正しい形式のメールアドレスを入力してください。';
    }

    if (!empty($filter_value['url'])) {
        if (!filter_var($filter_value['url'], FILTER_VALIDATE_URL)) {
            $messages[] = '正しい形式のホームページを入力してください。';
        }
    }

    return $messages;
}
