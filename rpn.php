<?php
// 入力をチェック
$rpn = isset($_GET['rpn']) ? $_GET['rpn'] : '1 2 3 * +';
// RPNを計算
$history = '';
$answer = calcRPN($rpn);


// PRNを計算
function calcRPN($str)
{

}

//
function addHistory($stack, $desc)
{

}

// HTMLフォームを出力

