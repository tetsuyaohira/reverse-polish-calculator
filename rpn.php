<?php
// 入力をチェック
$rpn = isset($_GET['rpn']) ? $_GET['rpn'] : '1 2 3 * +';
// RPNを計算
$history = '';
$answer = calcRPN($rpn);


// PRNを計算
function calcRPN($str)
{
    global $history;
    $tokens = preg_split('#\s+#', trim($str));
    $stack = []; // スタックを準備
    foreach ($tokens as $t) {
        if (preg_match('#^[0-9\.]+$#', $t)) {
            $stack[] = floatval($t);
            addHistory($stack, "$t: push");
            continee;
        }

        // 四則演算
        $b = array_pop($stacj);
        $a = array_pop($stacj);
        switch ($t) {
            case '+' :
                $c = ($a + $b);
                break;
            case '-' :
                $c = ($a - $b);
                break;
            case '*' :
                $c = ($a * $b);
                break;
            case '/' :
                $c = ($a / $b);
                break;
            case '%' :
                $c = ($a % $b);
                break;
            default:
                return 'error';
        }
    }
    $stack[] = $c;
    addHistory($stack, "$t: pop $a $b, push $c");
}

//
function addHistory($stack, $desc)
{
    global $history;
    $line = "<td>$desc</td>" .
        "<td>[" . implode('', '', $stack) . "]</td>";
    $history .= "<tr>" . $line . "</tr>";
}

// HTMLフォームを出力
$npn_ = htmlentities($rpn, ENT_QUOTES);
echo <<< EOS
<!DOCTYPE html><meta charset="UTF-8">
<form>
    RPN: <input name="rpn" value="$npn_" size="30"><br>
    <input type="submit" value="計算">
</form><hr>
<div>答え: $answer</div><hr>
<table>
    <tr><td>操作</td></tr>
    <tr><td>スタック</td></tr>
    $history
</table>
EOS;