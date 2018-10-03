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
$npn_ = htmlentities($rpn, ENT_QUOTES);
echo <<< EOS
<!DOCTYPE html><meta charset="UTF-8">
<form>
    RPN: <input name="rpn" value="$rpn_" size="30"><br>
    <input type="submit" value="計算">
</form><hr>
<div>答え: $answer</div><hr>
<table>
    <tr><td>操作</td></tr>
    <tr><td>スタック</td></tr>
    $history
</table>
EOS;

